<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendance';

    protected $fillable = [
        'id',
        'user_id',
        'attendance_date',
        'working_hours',
        'location',
        'attendance_history',
        'status',
        'created_at',
        'updated_at',
    ];
}
