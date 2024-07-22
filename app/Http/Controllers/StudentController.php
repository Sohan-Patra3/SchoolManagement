<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function login(){
        return view('student.dashboard');
    }

    public function list() {
        $data = User::where('user_type', 'student')->where('is_delete', 0)->paginate(5);
        $classes = ClassModel::all();
        return view('admin.student.list', compact('data', 'classes'));
    }


    public function add(){
        $class = ClassModel::all();
        return view('admin.student.add', compact('class'));
    }

    public function insert(Request $request){
        // dd($request->all());


        request()->validate([
            'email'=>'required|email|unique:users'
        ]);

        $student = new User;

        $student->name=$request->name;
        $student->last_name=$request->last_name;
        $student->addmission_number=$request->addmission_number;
        $student->roll_number=$request->roll_number;
        $student->class_id=$request->class_id;
        $student->gender=$request->gender;
        if(!empty(($request->date_of_birth))){
            $student->date_of_birth=$request->date_of_birth;
        }
        $student->caste=$request->caste;
        $student->religion=$request->religion;
        $student->mobile_number=$request->mobile_number;
        $student->addmission_date=$request->addmission_date;


      if($request->hasFile('profile_pic')){
        $image = $request->file('profile_pic');
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('products'), $imagename);
        $student->profile_pic = $imagename;
    }

        $student->blood_group=$request->blood_group;
        $student->height=$request->height;
        $student->weight=$request->weight;
        $student->status=$request->status;
        $student->email=$request->email;
        $student->password=Hash::make($request->password);

        $student->save();

        return redirect('admin/student/list')->with('success' , 'Student data inserted successfully');

    }

    public function edit($id){
        $student = User::find($id);
        $class = ClassModel::all();
        return view('admin.student.edit' , compact(['student' , 'class']));
    }

    public function editStudent(Request $request , $id){
        $student = User::find($id);

        $student->name=$request->name;
        $student->last_name=$request->last_name;
        $student->addmission_number=$request->addmission_number;
        $student->roll_number=$request->roll_number;
        $student->class_id=$request->class_id;
        $student->gender=$request->gender;
        if(!empty(($request->date_of_birth))){
            $student->date_of_birth=$request->date_of_birth;
        }
        $student->caste=$request->caste;
        $student->religion=$request->religion;
        $student->mobile_number=$request->mobile_number;
        $student->addmission_date=$request->addmission_date;


      if($request->hasFile('profile_pic')){
        $image = $request->file('profile_pic');
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('products'), $imagename);
        $student->profile_pic = $imagename;
    }

        $student->blood_group=$request->blood_group;
        $student->height=$request->height;
        $student->weight=$request->weight;
        $student->status=$request->status;
        $student->email=$request->email;
        $student->password=Hash::make($request->password);

        $student->save();

        return redirect('admin/student/list')->with('success' , 'Student data inserted successfully');

    }

    public function delete($id){
        // $student = User::destroy($id);
        // return redirect('admin/student/list')->with('success' , 'Student data successfully deleted');
        $student = User::find($id);
        $student->is_delete=1;
        $student->save();
        return redirect('admin/student/list')->with('success' , 'Student data successfully deleted');
    }

    public function search(Request $request)
    {
        $search = $request->search;

        // Use paginate() instead of get()
        $data = User::where('name', 'LIKE', '%' . $search . '%')
                    ->where('user_type', 'student')
                    ->paginate(5); // Adjust the number as per your requirement

        return view('admin.student.list', compact('data'));
    }

    public function account() {
        $student = User::find(Auth::user()->id);
        return view('student.myaccount', compact('student'));
    }

    public function updateMyAccount(Request $request, $id) {
        $student = User::find($id);

        // Updating the student's information
        $student->name = $request->name;
        $student->last_name = $request->last_name;
        $student->gender = $request->gender;

        if (!empty($request->date_of_birth)) {
            $student->date_of_birth = $request->date_of_birth;
        }

        $student->caste = $request->caste;
        $student->religion = $request->religion;
        $student->mobile_number = $request->mobile_number;

        if ($request->hasFile('profile_pic')) {
            $image = $request->file('profile_pic');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('products'), $imagename);
            $student->profile_pic = $imagename;
        }

        $student->blood_group = $request->blood_group;
        $student->height = $request->height;
        $student->weight = $request->weight;
        $student->email = $request->email;

        $student->save();

        return redirect()->back()->with('success', 'Account Updated Successfully');
    }

   

}
