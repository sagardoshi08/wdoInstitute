<?php

namespace App\Http\Livewire\ExampleLaravel;

use App\Http\Controllers\Controller;
use Livewire\Component;
use App\Models\User;
use App\Models\Holiday;
use App\Models\RoleStatus;
use Illuminate\Support\Facades\Hash;
use App\Models\States;
use Illuminate\Support\Str;
use App\Models\AssignTask;
use App\Models\User_data;
use App\Models\User_address;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Auth;


class UserSallery extends Controller
{
    public function userSallery()
    {
        $all_user = User::where('role','!=','super_admin')->where(function($query) {
            $query->where('job_status', Null)
                  ->orWhere('job_status','Approved');
        })->get();
        $user_admin = User::where('role','Admin')->where(function($query) {
            $query->where('job_status', Null)
                  ->orWhere('job_status','Approved');
        })->get();
        $user_manager = User::where('role','Manager')->where(function($query) {
            $query->where('job_status', Null)
                  ->orWhere('job_status','Approved');
        })->get();
        $user_teamlead = User::where('role','Team Leader')->where(function($query) {
            $query->where('job_status', Null)
                  ->orWhere('job_status','Approved');
        })->get();
        $user_employee = User::where('role','Employee')->where(function($query) {
            $query->where('job_status', Null)
                  ->orWhere('job_status','Approved');
        })->get();
        $user_data = User_data::where('user_id',Auth::id())->first();

        return view(
            'livewire.example-laravel.user-salary.user-sallery',
            [
                'alluser' => $all_user,
                'user_admin' => $user_admin,
                'user_manager' => $user_manager,
                'user_teamlead' => $user_teamlead,
                'user_employee' => $user_employee,
                'user_data' =>$user_data
            ]
        );
    }


}
