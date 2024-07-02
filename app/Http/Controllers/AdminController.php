<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\forgerpasswordmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function login(){
        return view('admin.dashboard');
    }

    public function list(){
        return view('admin.admin.list');
    }

    public function forget_password(){
        return view('auth.forget_password');
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

}
