<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function login(){
        return view('student.dashboard');
    }

    public function list(){
        $total = User::where('user_type' , 'student')->count();
        $user = User::where('user_type' , 'student')->paginate(2);
        return view('admin.student.list' , compact('user' , 'total'));
    }

    public function add(){
        return view('admin.student.add');
    }
}
