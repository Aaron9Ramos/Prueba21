<?php

namespace App\Http\Controllers;

use App\Models\Parents;
use Illuminate\Support\Facades\Auth;
use App\Models\Students;
use App\Models\User;
use App\Models\Autorizado;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Builder\Stub;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user_type = Auth::user()->user_type;
        $data['header_title'] = 'Dashboard';
        if ($user_type == 0) {
            return view('admin.dashboard', $data);
        } elseif ($user_type == 1) {
            return view('teacher.dashboard', $data);
        } else {
            // $parents = Parents::find(6);
            $user_id = Auth::user()->id;
            $parents = Parents::where('user_id', $user_id )->first();
            $cantAutorizados = Autorizado::where('user_id', $user_id)->count();
            $autorizados = Autorizado::where('user_id', $user_id)->get();
            return view('parent.dashboard', compact('parents', 'cantAutorizados','autorizados'));
        }
    }

    public function dirAgregarDocs(){
        return view('parent.documentos');
    }
    
    public function AgregarDocs(Request $request){
        
        $request->validate([
            'foto' => 'required|max:10240|image|mimes:jpeg,png,jpg',
            'ine' => 'required|max:10240|image|mimes:jpeg,png,jpg',
        ]);        
        
        $user_id = Auth::user()->id; 
        $parent = new Parents();
        $parent->user_id = Auth::user()->id;
        $parent->user_type = Auth::user()->user_type;
        //foto
        $photoName = time().'.'.$request->foto->extension();
        $request->foto->move(public_path('fotos'), $photoName);
        $parent->foto = 'fotos/'.$photoName;
        //ine
        $ineName = time().'.'.$request->ine->extension();
        $request->ine->move(public_path('ines'), $ineName);
        $parent->ine = 'ines/'.$ineName;
        //guardar
        $parent->save();     

        $this->generarPdfPadre();
        
        return redirect('parent/dashboard');    
    }

    public function generarPdfPadre(){
        //pdf        
        $user_id = Auth::user()->id; 
        $parents = Parents::where('user_id', $user_id )->first();
        $autorizados = Autorizado::where('user_id', $user_id)->get();
        $estudiantes = Students::where('user_id', $user_id)->get();
        $data = [
            'name' => Auth::user()->name,
            'foto' => public_path($parents->foto),
            'ine' => public_path($parents->ine),
            'autorizados' => $autorizados,
            'estudiantes' => $estudiantes,
        ];
        
        //generar_pdf
        $pdfPath = public_path('pdf/'.$user_id.time().'.pdf');
        \PDF::loadView('parent.pdf', $data )->save($pdfPath); 
        $parents->pdf = 'pdf/'.$user_id.time().'.pdf';
        //qr       
        $qrPath = public_path('qrcode/qr'.time().'.svg');
        QrCode::format('svg')->size(80)->errorCorrection('L')->margin(1)->generate($pdfPath, $qrPath);
        $parents->qr = 'qrcode/qr'.time().'.svg'; 
        //guardar
        $parents->save();
    }

    public function dirEditarDocs(){
        return view('parent.edit');
    }
    
    public function editarDocs(Request $request){
        
        $request->validate([
            'foto' => 'max:10240|image|mimes:jpeg,png,jpg',
            'ine' => 'max:10240|image|mimes:jpeg,png,jpg',
        ]);        
        
        $user_id = Auth::user()->id;
        $parent = Parents::where('user_id', $user_id )->first();
        //foto
        if(!$request->foto == null){
            $photoName = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('fotos'), $photoName);
            $parent->foto = 'fotos/'.$photoName;
        }
        //ine
        if(!$request->ine == null){
            $ineName = time().'.'.$request->ine->extension();
            $request->ine->move(public_path('ines'), $ineName);
            $parent->ine = 'ines/'.$ineName;
        }
        $parent->save();       
        
        $this->generarPdfPadre();
        
        return redirect('parent/dashboard');    
    }

    public function autorizar(){
        return view('autorizado.auto');
    }

    public function nuevoAutorizado(Request $request){
       
        $request->validate([
            'name' => 'required|min:5|max:255',
            'foto' => 'required|max:10240|image|mimes:jpeg,png,jpg',
            'ine' => 'required|max:10240|image|mimes:jpeg,png,jpg',
        ]);              
        
        $auto = new Autorizado();
        $auto->user_id = Auth::user()->id;
        $auto->nombre = $request->name;
        //foto
        $photoName = time().'.'.$request->foto->extension();
        $request->foto->move(public_path('fotos'), $photoName);
        $auto->foto = 'fotos/'.$photoName;
        //ine
        $ineName = time().'.'.$request->ine->extension();
        $request->ine->move(public_path('ines'), $ineName);
        $auto->ine = 'ines/'.$ineName;        
        //guardar
        $auto->save(); 

        $this->generarPdfAutorizado($auto);

        return redirect('parent/dashboard');        
    }

    public function generarPdfAutorizado($auto){
        //pdf
        $user_id = Auth::user()->id;        
        $parents = Parents::where('user_id', $user_id )->first();
        $estudiantes = Students::where('user_id', $user_id)->get();
        $cantAutorizados = Autorizado::where('user_id', $user_id)->count();
        
        if($cantAutorizados == 1){
            $autorizados = Autorizado::where('user_id', $user_id)->take(1)->get();
        }
        elseif($cantAutorizados == 2){
            $autorizados = Autorizado::where('user_id', $user_id)->skip(1)->take(1)->get();
        }
       
         $data = [
            'name' => Auth::user()->name,
            'foto' => public_path($parents->foto),
            'ine' => public_path($parents->ine),
            'autorizados' => $autorizados,
            'estudiantes' => $estudiantes,
        ];
        
        //pdf
        $pdfPath = public_path('pdf/'.$user_id.'.pdf');
        \PDF::loadView('autorizado.pdf', $data )->save($pdfPath); 
        $auto->pdf = 'pdf/'.$user_id.'.pdf';
        //qr       
        $qrPath = public_path('qrcode/qr'.time().'.svg');
        QrCode::format('svg')->size(80)->errorCorrection('L')->margin(1)->generate($pdfPath, $qrPath);
        $auto->qr = 'qrcode/qr'.time().'.svg'; 
        //guardar
        $auto->save();
        
    }
    
    public function editautorizado($id){

        $autorizado = Autorizado::find($id);

        return view('autorizado.edit', compact('autorizado'));
    }
    
    public function editarAutorizado(Request $request, $id){
       
        $request->validate([
            'name' => 'required|min:5|max:255',
            'foto' => 'max:10240|image|mimes:jpeg,png,jpg',
            'ine' => 'max:10240|image|mimes:jpeg,png,jpg',
        ]);              
        
            $auto = Autorizado::find($id);
            $auto->nombre = $request->name;
            //foto
            if(!$request->foto == null){
            $photoName = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('fotos'), $photoName);
            $auto->foto = 'fotos/'.$photoName;
            }
            //ine
            if(!$request->ine == null){
                $ineName = time().'.'.$request->ine->extension();
                $request->ine->move(public_path('ines'), $ineName);
                $auto->ine = 'ines/'.$ineName;
            }
            //guardar
            $auto->save(); 
        
            $this->generarPdfAutorizado($auto);

        return redirect('parent/dashboard');        
    }

    public function eliminarAutorizado($id){

        $auto = Autorizado::find($id);
        $auto->delete();

        return redirect('parent/dashboard'); 
    }


    public function crearpdf(){

        $user_id = Auth::user()->id;
        $parents = Parents::where('user_id', $user_id )->first();
        $autorizados = Autorizado::where('user_id', $user_id)->get();
        $estudiantes = Students::where('user_id', $user_id)->get();

        $data = [
            'name' => Auth::user()->name,
            'foto' => public_path($parents->foto),
            'ine' => public_path($parents->ine),
            'autorizados' => $autorizados,
            'estudiantes' => $estudiantes,
        ];
        
        $pdf = \PDF::loadView('parent.pdf', $data )->save(public_path('pdf/'.$user_id.'.pdf'));  
        
        return $pdf->stream('info.pdf');
    }

    public function descargarQr($file){
        $pathtoFile = public_path().$file;
        $filename = 'S3 FILE';
        return response()->download($pathtoFile, $filename);
    }
}
