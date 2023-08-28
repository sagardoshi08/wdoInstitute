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
use Session;


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
            echo User::select('name')->where('id', $data)->get()->first()->name.', ';
       }
    }

    public function updateBreakTime(Request $request){
  
        $mor_tea = Carbon::createFromFormat('H:i', $request->morning_tea_end)->diffInMinutes(Carbon::createFromFormat('H:i', $request->morning_tea_start));
        $lunch = Carbon::createFromFormat('H:i', $request->lunch_end)->diffInMinutes(Carbon::createFromFormat('H:i', $request->lunch_start));
        $eve_tea = Carbon::createFromFormat('H:i', $request->evening_tea_end)->diffInMinutes(Carbon::createFromFormat('H:i', $request->evening_tea_start));

        $data['mor_tea_start'] = $request->morning_tea_start;
        $data['mor_tea_end'] = $request->morning_tea_end;
        $data['mor_tea_break'] = $mor_tea;
        $data['lunch_start'] = $request->lunch_start;
        $data['lunch_end'] = $request->lunch_end;
        $data['lunch_break'] = $lunch;
        $data['eve_tea_start'] = $request->evening_tea_start;
        $data['eve_tea_end'] = $request->evening_tea_end;
        $data['eve_tea_break'] = $eve_tea;
        //echo '<pre>'; print_r($request->usrs_id);
        $ids = explode(',',$request->usrs_id);
        User::whereIn('id',$ids)->update(['break_time' => json_encode($data)]);
        return redirect()->route('userBreakTime')->with(session()->flash('message','Break time Updated Successfully'));
    }

}
