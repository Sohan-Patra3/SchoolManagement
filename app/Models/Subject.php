<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subject';

    public function user() {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function classes() {
        return $this->belongsToMany(ClassModel::class, 'class_subject', 'subject_id', 'class_id');
    }
}
