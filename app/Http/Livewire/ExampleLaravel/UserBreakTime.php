<?php

namespace App\Http\Livewire\ExampleLaravel;

use App\Http\Controllers\Controller;
use Livewire\Component;
use App\Models\User;
use App\Models\Attendance;
use App\Models\RoleStatus;
use Illuminate\Support\Facades\Hash;
use App\Models\States;
use Illuminate\Support\Str;
use App\Models\AssignTask;
use App\Models\User_data;
use App\Models\User_address;
use App\Models\Holiday;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use Auth;


class UserBreakTime extends Controller
{

    public function breaktime(Request $request)
    {

        $all_user = User::where(function($query) {
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
        
        return view(
            'livewire.example-laravel.user-salary.user-break-time',
            [
                'alluser' => $all_user,
                'user_admin' => $user_admin,
                'user_manager' => $user_manager,
                'user_teamlead' => $user_teamlead,
                'user_employee' => $user_employee,
            ]
        );
    }

    public function mintoHour($minutes){
        $hours = floor($minutes / 60);
        $min = $minutes - ($hours * 60);
        return round($hours) ." Hour(s) ". round($min)." Minute(s)";
    }

    public function getUserBreaktime(Request $request){
       //$id = explode(',',$request->id);
       //$user = User::select('name')->whereIn('id', $request->id)->get()->first();
       foreach($request->id as $data){
            echo User::select('name')->where('id', $data)->get()->first()->name.',';
       }
    }

}
