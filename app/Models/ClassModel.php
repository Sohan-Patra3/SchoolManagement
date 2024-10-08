<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    protected $table = "class";

    public function user(){
        return $this->hasOne('App\Models\User','id','created_by');
    }
    public function subjects() {
        return $this->belongsToMany(Subject::class, 'class_subject', 'class_id', 'subject_id');
    }

    public function students(){
        return $this->hasMany(User::class, 'class_id');
    }

    public function teachers() {
        return $this->hasMany(AssingClassTeacher::class, 'class_id');
    }
}


