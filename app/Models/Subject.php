<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table="subject";

    public function user(){
        return $this->hasOne('App\Models\User','id','created_by');
    }
}