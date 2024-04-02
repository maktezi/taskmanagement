<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'date_of_birth',
        'position',
        'salary',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function isAdmin()
    {
        return $this->is_admin === 1;
    }

    public function department(){
        return $this->hasMany(Department::class);
    }

    public function activity(){
        return $this->hasMany(Activity::class);
    }

    public function task(){
        return $this->hasMany(Task::class);
    }

    public function assigntask(){
        return $this->hasMany(AssignTask::class);
    }

}
