<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Students;

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
            $user_id = Auth::user()->id;
            $students = Students::where('user_id', $user_id )->get();  
            return view('parent.dashboard', $data, compact('students'));
        }
    }
}
