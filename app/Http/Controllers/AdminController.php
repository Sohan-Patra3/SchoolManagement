<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\forgerpasswordmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function login(){
        return view('admin.dashboard');
    }

    public function list(){
        $data = User::where('user_type' , 'admin')->paginate(1);
        return view('admin.admin.list',compact('data'));
    }

    public function add(){

        return view('admin.admin.add');
    }

    public function insert(Request $request){

        request()->validate([
            'email'=>'required|email|unique:users'
        ]);


        $user = new User;
        $user->name=trim($request->name);
        $user->email=trim($request->email);
        $user->password=Hash::make($request->password);
        $user->user_type = "admin";
        $user->save();

        return redirect('admin/admin/list')->with('success', "Admin successfully created");
    }

    public function edit($id){
        $user = User::find($id);
        return view('admin.admin.edit' , compact('user'));
    }

    public function editAdmin(Request $request,$id){
        $user = User::find($id);

        $user->name=$request->name;

        $user->email=$request->email;

        $user->save();

        return redirect('admin/admin/list');
    }

    public function deleteAdmin($id){
        $user = User::find($id);
        $user->delete();

        return redirect()->back();
    }

    public function search(Request $request){
        $search = $request->search;

        $data = User::where('name', 'LIKE', '%' . $search . '%' )->where('user_type' , 'admin')->paginate(5);

        return view('admin.admin.list', compact('data'));
    }


    public function forget_password(){
        $data['header_title']='Admin List';
        return view('auth.forget_password',$data);
    }

    public function postForgotPassword(Request $request) {
        // Validate the email input
        $request->validate(['email' => 'required|email']);

        $user = User::getEmailSingle($request->email);

        if ($user !== null) {
            $user->remember_token = Str::random(30);
            $user->save();
            Mail::to($user->email)->send(new forgerpasswordmail($user));

            return redirect()->back()->with('success', 'Please check your email to reset your password');
        } else {
            return redirect()->back()->with('error', 'Email not found');
        }
    }

    public function myAccount(){
        $user = User::find(Auth::user()->id);
        return view('admin.myaccount' , compact('user'));
    }

    public function updateAccount(Request $request , $id){
        $user = User::find($id);

        $user->name=$request->name;
        $user->email=$request->email;
        $user->save();

        return redirect()->back()->with('success', 'Account Updated Successfully');
    }

}
