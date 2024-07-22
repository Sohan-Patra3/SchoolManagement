<?php

namespace App\Http\Controllers;

use App\Models\AssingClassTeacher;
use App\Models\ClassModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssingClassTeacherController extends Controller
{
    public function list()
{
    $list = AssingClassTeacher::with(['user', 'class' ,'createdBy'])->where("is_delete" , '0')->get();
    return view('admin.assingClass.list', compact('list'));
}

    public function add(){
        $class = ClassModel::all();
        $teacher = User::where('user_type' , 'teacher')->get();
        return view('admin.assingClass.add',compact('class' , 'teacher'));
    }

    public function insert(Request $request){
       $class_id=$request->class_id;
       $status=$request->status;
       $created_by= Auth::user()->id;

       foreach($request->teacher_ids as $teacherId){
        $assingClass = new AssingClassTeacher;

        $assingClass->class_id=$class_id;
        $assingClass->status = $status;
        $assingClass->created_by = $created_by;
        $assingClass->teacher_id = $teacherId;

        $assingClass->save();
       }

       return redirect('admin/assing_class/list')->with('success' , 'Assing Class Teacher Data added Successfully');

    }

    public function delete($id){
        $delete = AssingClassTeacher::find($id);
        $delete -> is_delete = 1;
        $delete->save();

        return redirect('admin/assing_class/list')->with('success' , 'Assing Class Deleted');
    }

    public function edit($id){
        $assingClass = AssingClassTeacher::find($id);
        $class = ClassModel::all();
        $teacher = User::where('user_type' , 'teacher')->get();
        return view('admin.assingClass.edit' , compact(['assingClass' , 'class' , 'teacher']));
    }

    public function update(Request $request,$id){
        $assingClass = AssingClassTeacher::find($id);
        $class_id=$request->class_id;
        $status=$request->status;

        foreach($request->teacher_ids as $teacherId){
            $assingClass = AssingClassTeacher::find($id);

         $assingClass->class_id=$class_id;
         $assingClass->status = $status;
         $assingClass->teacher_id = $teacherId;

         $assingClass->save();
        }

        return redirect('admin/assing_class/list')->with('success' , 'Assing Class Teacher Data updated Successfully');

    }

    public function search(Request $request)
{
    $search = $request->search;

    $teacher = User::where('name', 'LIKE', '%' . $search . '%')
        ->where('user_type', 'teacher')
        ->get();

        $list = AssingClassTeacher::with(['user', 'class' ,'createdBy'])->where("is_delete" , '0')->get();

    return view('admin.assingClass.list', compact('teacher', 'list'));
}

}
