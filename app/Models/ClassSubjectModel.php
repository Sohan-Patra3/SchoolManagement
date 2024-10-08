<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSubjectModel extends Model
{
    use HasFactory;

    protected $table = "class_subject";

    public function user(){
        return $this->belongsTo('App\Models\User', 'created_by');
    }

    public function class(){
        return $this->belongsTo('App\Models\ClassModel', 'class_id');
    }

    public function subject(){
        return $this->belongsTo('App\Models\Subject', 'subject_id');
    }

}
