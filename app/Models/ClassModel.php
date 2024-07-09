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
}


