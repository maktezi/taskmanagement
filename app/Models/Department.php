<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function user(){
        return $this->hasOne(User::class);
    }

    public function assigntask(){
        return $this->hasMany(AssignTask::class);
    }
}
