<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'difficulty',
        'priority',
    ];

    public function user(){
        return $this->hasOne(User::class);
    }

    public function assigntask(){
        return $this->hasMany(AssignTask::class);
    }

}
