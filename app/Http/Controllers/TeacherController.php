<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function login(){
        return view('teacher.dashboard');
    }

    public function list(){
        $teacher = User::where('user_type' , 'teacher')->where('is_delete' , 0)->get();
        return view('admin.teacher.list' , compact('teacher'));
    }

    public function add(){
        return view('admin.teacher.add');
    }
    public function insert(Request $request){
        $teacher = new User;

        $teacher->name=$request->name;
        $teacher->last_name = $request->last_name;
        $teacher->gender=$request->gender;
        $teacher->date_of_birth=$request->date_of_birth;
        $teacher->date_of_joining=$request->date_of_joining;
        $teacher->mobile_number=$request->mobile_number;
        $teacher->marital_status=$request->marital_status;
        $teacher->address=$request->address;
        $teacher->qualification=$request->qualification;
        $teacher->note=$request->note;
        $teacher->work_experience=$request->work_experience;
        $teacher->status=$request->status;
        $teacher->user_type="teacher";
        $teacher->email=$request->email;
        $teacher->password=Hash::make($request->password);


        if($request->hasFile('profile_pic')){
            $image = $request->file('profile_pic');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('products'), $imagename);
            $teacher->profile_pic = $imagename;
        }

        $teacher->save();

        return redirect('admin/teacher/list')->with('success','Teacher data successfully added');
    }

    public function edit($id){
        $teacher = User::find($id);
        return view('admin.teacher.edit' , compact('teacher'));
    }

    public function update(Request $request , $id){
        $teacher = User::find($id);

        $teacher->name=$request->name;
        $teacher->last_name = $request->last_name;
        $teacher->gender=$request->gender;
        $teacher->date_of_birth=$request->date_of_birth;
        $teacher->date_of_joining=$request->date_of_joining;
        $teacher->mobile_number=$request->mobile_number;
        $teacher->marital_status=$request->marital_status;
        $teacher->address=$request->address;
        $teacher->qualification=$request->qualification;
        $teacher->note=$request->note;
        $teacher->work_experience=$request->work_experience;
        $teacher->status=$request->status;
        $teacher->user_type="teacher";
        $teacher->email=$request->email;


        if($request->hasFile('profile_pic')){
            $image = $request->file('profile_pic');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('products'), $imagename);
            $teacher->profile_pic = $imagename;
        }

        $teacher->save();

        return redirect('admin/teacher/list')->with('success','Teacher data successfully updated');
    }

    public function delete($id){
        $teacher = User::find($id);
        $teacher->is_delete=1;
        $teacher->save();
        return redirect('admin/teacher/list')->with('success','Teacher data deleted successfully');
    }

    public function search(Request $request){
        $search = $request->search;
        $teacher= User::where('name' , 'LIKE' , '%'.$search.'%')->where('user_type' , 'teacher')->get();
        return view('admin.teacher.list'  , compact('teacher'));
    }

    public function myAccount(){
        $teacher = User::find(Auth::user()->id);
        return view('admin.teacher.myaccount' , compact('teacher'));
    }

    public function updateMyAccount(Request $request , $id){
        $teacher = User::find($id);

        $teacher->name=$request->name;
        $teacher->last_name = $request->last_name;
        $teacher->gender=$request->gender;
        $teacher->date_of_birth=$request->date_of_birth;
        $teacher->date_of_joining=$request->date_of_joining;
        $teacher->mobile_number=$request->mobile_number;
        $teacher->marital_status=$request->marital_status;
        $teacher->address=$request->address;
        $teacher->qualification=$request->qualification;
        $teacher->work_experience=$request->work_experience;
        $teacher->user_type="teacher";
        $teacher->email=$request->email;


        if($request->hasFile('profile_pic')){
            $image = $request->file('profile_pic');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('products'), $imagename);
            $teacher->profile_pic = $imagename;
        }

        $teacher->save();

        return redirect()->back()->with('success' , 'Account Updated Successfully');
    }
}
