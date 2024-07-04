<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Models\ClassSubjectModel;
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

Route::get('admin/class/edit/{id}' , [ClassController::class , 'editClass'])->middleware(['auth' , 'admin']);

Route::post('insertEditClass/{id}' , [ClassController::class , 'insertEditClass'])->middleware(['auth' , 'admin']);

Route::get('admin/class/delete/{id}' , [ClassController::class , 'deleteClass'])->middleware(['auth' , 'admin']);

Route::get('admin/class/search' , [ClassController::class , 'classSearch'])->middleware(['admin' , 'auth']);

//subject url

Route::get('admin/subject/list' , [SubjectController::class , 'subjectList'])->middleware(['auth' , 'admin']);

Route::get('admin/subject/add' , [SubjectController::class , 'addSubject'])->middleware(['auth' , 'admin']);

Route::post('insertSubject' , [SubjectController::class , 'insertSubject'])->middleware(['admin' , 'auth']);

Route::get('admin/subject/edit/{id}' , [SubjectController::class , 'insertEditSubject'])->middleware(['auth' , 'admin']);

Route::post('insertEditSubject/{id}' , [SubjectController::class , 'editSubject'])->middleware(['auth' , 'admin']);

Route::get('admin/subject/delete/{id}' , [SubjectController::class , 'deleteSubject'])->middleware(['auth' , 'admin']);

Route::get('admin/subject/search' , [SubjectController::class , 'searchSubject'])->middleware(['auth' , 'admin']);

//Assing subject

Route::get('admin/assing_subject/list' , [ClassSubjectController::class , 'list'])->middleware(['auth' , 'admin']);

Route::get('admin/assing_subject/add' , [ClassSubjectController::class , 'add'])->middleware(['auth' , 'admin']);

Route::post('insertAssingSubject' , [ClassSubjectController::class , 'insert'])->middleware(['auth' , 'admin']);

Route::get('admin/assing_subject/edit/{id}' , [ClassSubjectController::class , 'editInsert'])->middleware(['auth' , 'admin']);

Route::post('editInsertAssingSubject/{id}' , [ClassSubjectController::class , 'editInsertAssingSub'])->middleware(['auth' , 'admin']);

Route::get('admin/assing_subject/delete/{id}' , [ClassSubjectController::class , 'deleteAssingSub'])->middleware(['auth' , 'admin']);

// Route::get('admin/assing_subject/search' , [ClassSubjectController::class , 'searchAssingSub'])->middleware(['auth' , 'admin']);

//change password

Route::get('admin/change_password' , [UserController::class , 'changePassword'])->middleware(['auth' , 'admin']);

Route::post('update_changePassword' , [UserController::class , 'update_changePassword']);

Route::get('teacher/change_password' , [UserController::class , 'changePassword'])->middleware(['auth' , 'teacher']);

Route::get('student/change_password' , [UserController::class , 'changePassword'])->middleware(['auth' , 'student']);

Route::get('parent/change_password' , [UserController::class , 'changePassword'])->middleware(['auth' , 'parent']);

Route::get('admin/student/list' , [StudentController::class, 'list'])->middleware(['admin' , 'auth']);

Route::get('admin/student/add' , [StudentController::class , 'add'])->middleware(['admin' , 'auth']);












Route::get('student/dashboard' , [StudentController::class , 'login'])->middleware(['auth' , 'student']);

Route::get('teacher/dashboard' , [TeacherController::class , 'login'])->middleware(['auth', 'teacher']);

Route::get('parent/dashboard' , [ParentController::class , 'login'])->middleware(['auth' , 'parent']);

Route::get('/forget-password' , [AdminController::class , 'forget_password']);

Route::post('forgot-password' , [AdminController::class , 'postForgotPassword']);
