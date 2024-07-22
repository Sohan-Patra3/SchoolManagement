<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassSubjectController extends Controller
{
    public function list(){
        $list = ClassSubjectModel::all();
        return view('admin.assing_subject.list' , compact('list'));
    }

    public function add(){
        $list = ClassSubjectModel::all();
        $class = ClassModel::all();
        $subject = Subject::all();
        return view('admin.assing_subject.add', compact(['list' , 'class' ,'subject']));
    }

    public function insert(Request $request)
    {
        // Validate request data
        $request->validate([
            'class_id' => 'required|integer',
            'subject_ids' => 'required|array',
            'subject_ids.*' => 'integer',  // Ensure each subject ID is an integer
            'status' => 'required|integer',
        ]);



        $classId = $request->class_id;
        $status = $request->status;
        $createdBy = Auth::user()->id;


        foreach ($request->subject_ids as $subjectId) {
            $classSubject = new ClassSubjectModel;

            $classSubject->class_id = $classId;
            $classSubject->subject_id = $subjectId;
            $classSubject->status = $status;
            $classSubject->created_by = $createdBy;

            $classSubject->save();
        }

        return redirect('admin/assing_subject/list')->with('success', 'Subjects assigned successfully.');
    }


    public function editInsert($id){
        $classSubject = ClassSubjectModel::find($id);
        $class = ClassModel::all();
        $subject = Subject::all();

        return view('admin.assing_subject.edit' , compact(['classSubject' , 'class' , 'subject']));
    }

    public function editInsertAssingSub(Request $request , $id){
        $classSubject = ClassSubjectModel::find($id);

        $classSubject->class_id=$request->class_id;
        $classSubject->subject_id=$request->subject_id;
        $classSubject->status=$request->status;

        $classSubject->save();

        return redirect('admin/assing_subject/list')->with('success', 'Subjects Updated Successfully.');
    }

    public function deleteAssingSub($id){
        $assingSub = ClassSubjectModel::find($id);
        $assingSub->delete();
        return redirect('admin/assing_subject/list')->with('success', 'Subjects Successfully Deleted.');
    }

    // public function searchAssingSub(Request $request){
    //     $search = $request->search;

    //     $class = ClassModel::where('name' , 'LIKE' , '%' .$search.'%')->get();

    //     return view('admin.assing_subject.list',compact('class'));
    // }
}
