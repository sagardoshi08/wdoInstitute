<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_address extends Model
{
    use HasFactory;

    protected $table = 'user_address';

    protected $fillable = [
        'id',
        'user_id',
        'uuid',
        'p_street',
        'p_landmark',
        'p_country',
        'p_city',
        'p_state',
        'p_zipcode',
        'c_street',
        'c_landmark',
        'c_country',
        'c_city',
        'c_state',
        'c_zipcode',
    ];
}
