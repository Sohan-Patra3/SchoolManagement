<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParentController extends Controller
{
    public function login(){
        return view('parent.dashboard');
    }
}
