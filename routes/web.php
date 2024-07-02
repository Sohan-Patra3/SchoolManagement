<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
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

Route::get('admin/admin/add' , [AdminController::class , 'add'])->middleware(['auth' , 'admin']);

Route::post('insert' , [AdminController::class , 'insert'])->middleware(['auth' , 'admin']);

Route::get('admin/admin/edit/{id}' , [AdminController::class , 'edit'])->middleware(['auth' , 'admin']);

Route::post('admin/admin/editAdmin/{id}' , [AdminController::class , 'editAdmin'])->middleware(['auth' , 'admin']);

Route::get('admin/admin/delete/{id}' , [AdminController::class , 'deleteAdmin'] )->middleware(['auth' , 'admin']);

Route::get('admin/admin/search' , [AdminController::class , 'search'])->middleware(['auth' , 'admin']);

///class url

Route::get('admin/class/list' , [ClassController::class , 'list'])->middleware(['auth' , 'admin']);

Route::get('admin/class/add' , [ClassController::class , 'addClass'])->middleware(['auth' , 'admin']);

Route::post('insertClass' , [ClassController::class , 'insertClass'])->middleware(['auth' , 'admin' ]);







Route::get('student/dashboard' , [StudentController::class , 'login'])->middleware(['auth' , 'student']);

Route::get('teacher/dashboard' , [TeacherController::class , 'login'])->middleware(['auth', 'teacher']);

Route::get('parent/dashboard' , [ParentController::class , 'login'])->middleware(['auth' , 'parent']);

Route::get('/forget-password' , [AdminController::class , 'forget_password']);

Route::post('forgot-password' , [AdminController::class , 'postForgotPassword']);
