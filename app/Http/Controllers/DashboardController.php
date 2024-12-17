<?php

namespace App\Http\Controllers;

use App\Models\Parents;
use Illuminate\Support\Facades\Auth;
use App\Models\Students;
use App\Models\User;
use App\Models\Autorizado;

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

    public function agregarDocumentos(){
        return view('parent.documentos');
    }
    
    public function documentos(Request $request){
        
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif',
            'ine' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);        
        
        $user_id = Auth::user()->id;
        $parent = Parents::where('user_id', $user_id )->first();
        
        if($parent == null){
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
        }else{
            $photoName = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('fotos'), $photoName);
            $parent->foto = 'fotos/'.$photoName;
            
            $ineName = time().'.'.$request->ine->extension();
            $request->ine->move(public_path('ines'), $ineName);
            $parent->ine = 'ines/'.$ineName;
            
            $parent->save();       
        }        
        
        return redirect('parent/dashboard');    
    }

    public function autorizar(){
        return view('autorizado.auto');
    }

    public function nuevoAutorizado(Request $request){
       
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif',
            'ine' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);              
        
            $auto = new Autorizado();
            $auto->user_id = Auth::user()->id;
            $auto->nombre = $request->nombre;
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
        

        return redirect('parent/dashboard');        
    }
    
    public function editautorizado($id){
        // $autorizado = Autorizado::where('id', $id)->get();
        $autorizado = Autorizado::find($id);
        return view('autorizado.edit', compact('autorizado'));
    }
    
    public function editarAutorizado(Request $request, $id){
       
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif',
            'ine' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);              
        
            $auto = Autorizado::find($id);
            $auto->nombre = $request->nombre;
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
        

        return redirect('parent/dashboard');        
    }

    public function eliminarAutorizado($id){

        $auto = Autorizado::find($id);
        $auto->delete();

        return redirect('parent/dashboard'); 
    }
}
