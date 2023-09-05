<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignTask extends Model
{
    use HasFactory;

    protected $table = 'assign_task';

    protected $fillable = [
        'id',
        'assigner_id',
        'employee_id',
        'student_id',
        'remarks',
        'contacts_permission',
        'aadhar_permission',
        'application_permission',
        'bank_permission',
        'task_status',
        'assigner_task_status',
    ];
}
