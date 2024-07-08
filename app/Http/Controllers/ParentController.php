<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ParentController extends Controller
{
    public function login(){
        return view('parent.dashboard');
    }

    public function list(){
        $parent = User::where('user_type' , 'parent')->where('is_delete' , '0')->get();
        return view('admin.parent.list',compact('parent'));
    }

    public function add(){
        return view('admin.parent.add');
    }

    public function insert(Request $request){
        $parent = new User;

        $parent->name=$request->name;
        $parent->last_name=$request->last_name;
        $parent->occupation=$request->occupation;
        $parent->address=$request->address;
        $parent->gender=$request->gender;
        $parent->mobile_number=$request->mobile_number;
        $parent->email=$request->email;
        $parent->status=$request->status;

        if($request->hasFile('profile_pic')){
            $image = $request->file('profile_pic');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('products'), $imagename);
            $parent->profile_pic = $imagename;
        }

        $parent->save();

        return redirect('admin/parent/list')->with('success' , 'Parent data uploaded successfully');
    }

    public function edit($id){
        $parent = User::find($id);
        return view('admin.parent.edit' , compact('parent'));
    }

    public function editParent(Request $request ,$id){
        $parent = User::find($id);

        $parent->name=$request->name;
        $parent->last_name=$request->last_name;
        $parent->occupation=$request->occupation;
        $parent->address=$request->address;
        $parent->gender=$request->gender;
        $parent->mobile_number=$request->mobile_number;
        $parent->email=$request->email;
        $parent->password=Hash::make($request->password);
        $parent->status=$request->status;
        $parent->user_type="parent";

        if($request->hasFile('profile_pic')){
            $image = $request->file('profile_pic');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('products'), $imagename);
            $parent->profile_pic = $imagename;
        }

        $parent->save();

        return redirect('admin/parent/list')->with('success' , 'Parent data updated successfully');
    }

    public function delete($id){
        $parent = User::find($id);
        $parent-> is_delete = 1;
        $parent->save();
        return redirect('admin/parent/list')->with('success' , 'Parent data deleted successfully');
    }

    public function search(Request $request){
        $search = $request->search;
        $parent = User::where('name' , 'LIKE' , '%' . $search . '%')->where('user_type' , 'parent')->get();

        return view('admin.parent.list' , compact('parent'));
    }

    public function mystudent($id){
        $student = User::where('user_type' , 'student')->get();
        return view('admin.parent.mystudent' , compact('student' , 'id'));
    }

    public function searchStudent(Request $request, $id){
        $search = $request->search;
        $student = User::where('name', 'LIKE', '%' . $search . '%')
                        ->where('user_type', 'student')
                        ->get();
        return view('admin.parent.mystudent', compact('student', 'id'));
    }


    public function addParent($pid ,$id){
        $student = User::find($id);
        $student-> parent_id = $pid;
        $student->save();
        return redirect('admin/parent/list')->with('success' , 'Parent data added successfully');
    }



}
