<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssingClassTeacherController extends Controller
{
    public function list(){
        return view('admin.assingClass.list');
    }
}
