<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    public function login(){
        return view('parent.dashboard');
    }

    public function list(){
        $parent = User::where('user_type' , 'parent')->get();
        return view('admin.parent.list',compact('parent'));
    }
}
