<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssingClassTeacher extends Model
{
    use HasFactory;

    protected $table = "assing_class_teachers";

    public function user(){
        return $this->belongsTo('App\Models\User', 'teacher_id'); // created_by is the foreign key
    }

    public function createdBy(){
        return $this->belongsTo('App\Models\User', 'created_by'); // created_by is the foreign key
    }

    public function class(){
        return $this->belongsTo('App\Models\ClassModel', 'class_id');
    }


}
