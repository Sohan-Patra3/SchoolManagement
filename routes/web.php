<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/dashboard', [AdminController::class , 'login'])->middleware(['auth' , 'admin']);

Route::get('admin/admin/list', [AdminController::class , 'list'])->middleware(['auth' , 'admin']);

Route::get('student/dashboard' , [StudentController::class , 'login'])->middleware(['auth' , 'student']);

Route::get('teacher/dashboard' , [TeacherController::class , 'login'])->middleware(['auth', 'teacher']);

Route::get('parent/dashboard' , [ParentController::class , 'login'])->middleware(['auth' , 'parent']);

Route::get('/forget-password' , [AdminController::class , 'forget_password']);

Route::post('forgot-password' , [AdminController::class , 'postForgotPassword']);
