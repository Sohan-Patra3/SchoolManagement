<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSubjectModel extends Model
{
    use HasFactory;

    protected $table="class_subject";

    public function user(){
        return $this->hasOne('App\Models\User','id','created_by');
    }

    public function class(){
        return $this->hasOne('App\Models\ClassModel' , 'id' , 'class_id');
    }

    public function subject(){
        return $this->hasOne('App\Models\Subject' , 'id' , 'subject_id');
    }

}
