<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{

    
    use HasFactory;
    public $timestamps = false; 
    protected $fillable = [
        'name',
        'status',
        'task_description',
        'duedate',
        'created_by',
        'assigned_to',

    ];
}
