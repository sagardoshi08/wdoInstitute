<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rolestatus extends Model
{
    use HasFactory;

    protected $table = 'role_status';

    protected $fillable = [
        'id',
        'all_user',
        'Admin',
        'Manager',
        'Team_Leader',
        'Employee',
    ];
}
