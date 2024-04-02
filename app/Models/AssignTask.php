<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'user_id',
        'task_id',
        'department_id',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function task(){
        return $this->belongsTo(Task::class, 'task_id');
    }
    public function department(){
        return $this->belongsTo(Department::class, 'department_id');
    }

}
