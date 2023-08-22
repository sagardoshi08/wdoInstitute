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


class UserSallery extends Controller
{

    public function userSallery()
    {
        if(Auth::user()->role == 'super_admin'){
            $all_user = User::where(function($query) {
                $query->where('job_status', Null)
                      ->orWhere('job_status','Approved');
            })->get();
        }else{
            $all_user = User::where('id',Auth::id())->where(function($query) {
                $query->where('job_status', Null)
                      ->orWhere('job_status','Approved');
            })->get();
        }
        foreach($all_user as $key=>$all){
            $offer_details = $all->offer_datils ? json_decode($all->offer_datils) : '';
            $all_user[$key]['year_salary'] = $all->offer_datils ? number_format($offer_details->basic * 12) : '-';
            $all_user[$key]['month_salary'] = $all->offer_datils ? number_format($offer_details->basic) : '-';
            $dt = Carbon::create(now()->startOfMonth());
            $dt2 = Carbon::create(now()->endOfMonth());
            $daysForExtraCoding = $dt->diffInDaysFiltered(function(Carbon $date) {
                return $date->isWeekend();
            }, $dt2);
            $holiday = Holiday::whereMonth('date', now()->month)->count();
            $month_working = Carbon::now()->daysInMonth - $daysForExtraCoding - $holiday;
            $all_user[$key]['working_ours'] = $all->offer_datils ? $month_working * intval($all->offer_datils ? $offer_details->days_working_hour : 1) : '-';
            $attendance = Attendance::where('user_id',$all->id)->whereMonth('attendance_date', now()->month)->get();
            $active_hours = 0;
            if(isset($attendance)){
                foreach($attendance as $all_attendance){
                    $active_hours += $all_attendance->working_hours;
                }
            }
            $all_user[$key]['active_ours'] = $this->mintoHour($active_hours);
            $all_user[$key]['due_ours'] = $all->offer_datils ? $this->mintoHour(abs($month_working * intval($all->offer_datils ? $offer_details->days_working_hour : 1) * 60 - (abs($active_hours)))): '-';
        }
         
        //echo '<pre>'; print_r($all_user->toArray()); die();
        $user_admin = User::where('role','Admin')->where(function($query) {
            $query->where('job_status', Null)
                  ->orWhere('job_status','Approved');
        })->get();
        foreach($user_admin as $key=>$admindata){
            $offer_details = $admindata->offer_datils ? json_decode($admindata->offer_datils) : '';
            $user_admin[$key]['year_salary'] = $admindata->offer_datils ? number_format($offer_details->basic * 12) : '-';
            $user_admin[$key]['month_salary'] = $admindata->offer_datils ? number_format($offer_details->basic) : '-';
            $dt = Carbon::create(now()->startOfMonth());
            $dt2 = Carbon::create(now()->endOfMonth());
            $daysForExtraCoding = $dt->diffInDaysFiltered(function(Carbon $date) {
                return $date->isWeekend();
            }, $dt2);
            $holiday = Holiday::whereMonth('date', now()->month)->count();
            $month_working = Carbon::now()->daysInMonth - $daysForExtraCoding - $holiday;
            $user_admin[$key]['working_ours'] = $admindata->offer_datils ? $month_working * intval($admindata->offer_datils ? $offer_details->days_working_hour : 1) : '-';
            $attendance = Attendance::where('user_id',$admindata->id)->whereMonth('attendance_date', now()->month)->get();
            $active_hours = 0;
            if(isset($attendance)){
                foreach($attendance as $admindata_attendance){
                    $active_hours += $admindata_attendance->working_hours;
                }
            }
            $user_admin[$key]['active_ours'] = $this->mintoHour($active_hours);
            $user_admin[$key]['due_ours'] = $admindata->offer_datils ? $this->mintoHour(abs($month_working * intval($admindata->offer_datils ? $offer_details->days_working_hour : 1) * 60 - (abs($active_hours)))): '-';
        }

        $user_manager = User::where('role','Manager')->where(function($query) {
            $query->where('job_status', Null)
                  ->orWhere('job_status','Approved');
        })->get();
        foreach($user_manager as $key=>$managerdata){
            $offer_details = $managerdata->offer_datils ? json_decode($managerdata->offer_datils) : '';
            $user_manager[$key]['year_salary'] = $managerdata->offer_datils ? number_format($offer_details->basic * 12) : '-';
            $user_manager[$key]['month_salary'] = $managerdata->offer_datils ? number_format($offer_details->basic) : '-';
            $dt = Carbon::create(now()->startOfMonth());
            $dt2 = Carbon::create(now()->endOfMonth());
            $daysForExtraCoding = $dt->diffInDaysFiltered(function(Carbon $date) {
                return $date->isWeekend();
            }, $dt2);
            $holiday = Holiday::whereMonth('date', now()->month)->count();
            $month_working = Carbon::now()->daysInMonth - $daysForExtraCoding - $holiday;
            $user_manager[$key]['working_ours'] = $managerdata->offer_datils ? $month_working * intval($managerdata->offer_datils ? $offer_details->days_working_hour : 1) : '-';
            $attendance = Attendance::where('user_id',$managerdata->id)->whereMonth('attendance_date', now()->month)->get();
            $active_hours = 0;
            if(isset($attendance)){
                foreach($attendance as $managerdata_attendance){
                    $active_hours += $managerdata_attendance->working_hours;
                }
            }
            $user_manager[$key]['active_ours'] = $this->mintoHour($active_hours);
            $user_manager[$key]['due_ours'] = $managerdata->offer_datils ? $this->mintoHour(abs($month_working * intval($managerdata->offer_datils ? $offer_details->days_working_hour : 1) * 60 - (abs($active_hours)))): '-';
        }

        $user_teamlead = User::where('role','Team Leader')->where(function($query) {
            $query->where('job_status', Null)
                  ->orWhere('job_status','Approved');
        })->get();
        foreach($user_teamlead as $key=>$teamleaddata){
            $offer_details = $teamleaddata->offer_datils ? json_decode($teamleaddata->offer_datils) : '';
            $user_teamlead[$key]['year_salary'] = $teamleaddata->offer_datils ? number_format($offer_details->basic * 12) : '-';
            $user_teamlead[$key]['month_salary'] = $teamleaddata->offer_datils ? number_format($offer_details->basic) : '-';
            $dt = Carbon::create(now()->startOfMonth());
            $dt2 = Carbon::create(now()->endOfMonth());
            $daysForExtraCoding = $dt->diffInDaysFiltered(function(Carbon $date) {
                return $date->isWeekend();
            }, $dt2);
            $holiday = Holiday::whereMonth('date', now()->month)->count();
            $month_working = Carbon::now()->daysInMonth - $daysForExtraCoding - $holiday;
            $user_teamlead[$key]['working_ours'] = $teamleaddata->offer_datils ? $month_working * intval($teamleaddata->offer_datils ? $offer_details->days_working_hour : 1) : '-';
            $attendance = Attendance::where('user_id',$teamleaddata->id)->whereMonth('attendance_date', now()->month)->get();
            $active_hours = 0;
            if(isset($attendance)){
                foreach($attendance as $teamleaddata_attendance){
                    $active_hours += $teamleaddata_attendance->working_hours;
                }
            }
            $user_teamlead[$key]['active_ours'] = $this->mintoHour($active_hours);
            $user_teamlead[$key]['due_ours'] = $teamleaddata->offer_datils ? $this->mintoHour(abs($month_working * intval($teamleaddata->offer_datils ? $offer_details->days_working_hour : 1) * 60 - (abs($active_hours)))): '-';
        }

        $user_employee = User::where('role','Employee')->where(function($query) {
            $query->where('job_status', Null)
                  ->orWhere('job_status','Approved');
        })->get();
        foreach($user_employee as $key=>$employeedata){
            $offer_details = $employeedata->offer_datils ? json_decode($employeedata->offer_datils) : '';
            $user_employee[$key]['year_salary'] = $employeedata->offer_datils ? number_format($offer_details->basic * 12) : '-';
            $user_employee[$key]['month_salary'] = $employeedata->offer_datils ? number_format($offer_details->basic) : '-';
            $dt = Carbon::create(now()->startOfMonth());
            $dt2 = Carbon::create(now()->endOfMonth());
            $daysForExtraCoding = $dt->diffInDaysFiltered(function(Carbon $date) {
                return $date->isWeekend();
            }, $dt2);
            $holiday = Holiday::whereMonth('date', now()->month)->count();
            $month_working = Carbon::now()->daysInMonth - $daysForExtraCoding - $holiday;
            $user_employee[$key]['working_ours'] = $employeedata->offer_datils ? $month_working * intval($employeedata->offer_datils ? $offer_details->days_working_hour : 1) : '-';
            $attendance = Attendance::where('user_id',$employeedata->id)->whereMonth('attendance_date', now()->month)->get();
            $active_hours = 0;
            if(isset($attendance)){
                foreach($attendance as $employeedata_attendance){
                    $active_hours += $employeedata_attendance->working_hours;
                }
            }
            $user_employee[$key]['active_ours'] = $this->mintoHour($active_hours);
            $user_employee[$key]['due_ours'] =  $employeedata->offer_datils ? $this->mintoHour(abs($month_working * intval($employeedata->offer_datils ? $offer_details->days_working_hour : 1) * 60 - (abs($active_hours)))): '-';
        }

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

    public function mintoHour($minutes){
        $hours = floor($minutes / 60);
        $min = $minutes - ($hours * 60);
        return round($hours) ." Hour(s) ". round($min)." Mintes(s)";
    }

    public function viewSalary(Request $request,$id){
        $filter = $request->all();
        $data = User::where('id',$id)->first();
        $user_data = User_data::where('user_id',$id)->first();
        $offer_letter = $data->offer_datils ? json_decode($data->offer_datils): '';
        $offer_details = $data->offer_datils ? json_decode($data->offer_datils) : '';
            $data['year_salary'] = $data->offer_datils ? number_format($offer_details->basic * 12) : '-';
            $data['month_salary'] = $data->offer_datils ? number_format($offer_details->basic) : '-';
            $dt = Carbon::create(now()->startOfMonth());
            $dt2 = Carbon::create(now()->endOfMonth());
            $daysForExtraCoding = $dt->diffInDaysFiltered(function(Carbon $date) {
                return $date->isWeekend();
            }, $dt2);
            $holiday = Holiday::whereMonth('date', now()->month)->count();
            $month_working = Carbon::now()->daysInMonth - $daysForExtraCoding - $holiday;
            $data['working_ours'] = $data->offer_datils ? $month_working * intval($data->offer_datils ? $offer_details->days_working_hour : 1) : '-';
            $attendance = Attendance::where('user_id',$data->id)->whereMonth('attendance_date', now()->month)->get();
            $active_hours = 0;
            if(isset($attendance)){
                foreach($attendance as $data_attendance){
                    $active_hours += $data_attendance->working_hours;
                }
            }
            $data['active_ours'] = $this->mintoHour($active_hours);


             $data['due_ours'] = $data->offer_datils && ($month_working * intval($data->offer_datils ? $offer_details->days_working_hour : 1) * 60 - (abs($active_hours))) > 0 ? $this->mintoHour(abs($month_working * intval($data->offer_datils ? $offer_details->days_working_hour : 1) * 60 - (abs($active_hours)))) : '-';

            $data['EXTRA_ours'] = $data->offer_datils && ($month_working * intval($data->offer_datils ? $offer_details->days_working_hour : 1) * 60 - (abs($active_hours))) < 0 ? $this->mintoHour(abs($month_working * intval($data->offer_datils ? $offer_details->days_working_hour : 1) * 60 - (abs($active_hours)))) : '-';

            $data['to_date']= Carbon::now()->endOfMonth()->format('Y/m/d');
            $data['form_date'] = Carbon::now()->startOfMonth()->format('Y/m/d');  


            //echo '<pre>'; print_r($data); die();
        return view('livewire.example-laravel.user-salary.salarymanagement',compact('user_data','data','filter','offer_letter'));
    }

}
