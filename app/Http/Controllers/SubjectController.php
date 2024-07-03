<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class SubjectController extends Controller
{
    public function subjectList(){
        $subject = Subject::all();
        return view('admin.subject.list',compact('subject'));
    }

    public function addSubject(){
        return View('admin.subject.add');
    }

    public function insertSubject(Request $request){
        $subject = new Subject;

        $subject->name=$request->name;
        $subject->type=$request->type;
        $subject->status=$request->status;
        $subject->created_by=Auth::user()->id;

        $subject->save();

        return redirect('admin/subject/list');
    }

    public function insertEditSubject($id){
        $subject = Subject::find($id);
        return view('admin.subject.edit' , compact('subject'));
    }

    public function editSubject(Request $request,$id){
        $subject = Subject::find($id);

        $subject->name=$request->name;
        $subject->type=$request->type;
        $subject->status=$request->status;

        $subject->save();

        return redirect('admin/subject/list');
    }

    public function deleteSubject($id){
        $subject = Subject::find($id);
        $subject->delete();
        return redirect()->back();
    }

    public function searchSubject(Request $request){
        $search = $request->search;
        $subject = Subject::where('name' , 'LIKE' , '%' . $search . '%')->get();
        return view('admin.subject.list' , compact('subject'));
    }
}
