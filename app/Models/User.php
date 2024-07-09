<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use GuzzleHttp\Psr7\Request;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public static function getEmailSingle($email) {
        return self::where('email', '=', $email)->first();
    }

    public static function getSingle($id) {
        return self::find($id);
    }

    public function class(){
        return $this->belongsTo('App\Models\ClassModel', 'class_id');
    }

    public function parent()
    {
        return $this->hasMany(User::class, 'id', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(User::class, 'parent_id', 'id');
    }
}


