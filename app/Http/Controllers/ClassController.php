<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    public function list(){
        $class = ClassModel::all();
        return view('admin.class.list' , compact('class'));
    }

    public function addClass(){
        return view('admin.class.add');
    }

    public function insertClass(Request $request){
        $class = new ClassModel;

        $class->name=$request->name;
        $class->status=$request->status;
        $class->created_by= Auth::user()->id;
        $class->save();

        return redirect('admin/class/list')->with('success' , 'Class successfully added');
    }
}
