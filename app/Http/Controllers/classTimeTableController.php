<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Subject;
use Illuminate\Http\Request;

class classTimeTableController extends Controller
{
    public function list() {
        $class=ClassModel::all();
        $subject=Subject::all();
        return view('admin.class_timetable.list',compact('class','subject'));
    }
}
