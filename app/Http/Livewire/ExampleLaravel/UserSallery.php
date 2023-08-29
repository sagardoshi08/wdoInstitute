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

    public function userSallery(Request $request)
    {
        $filter = $request->month_salary_inp;
        if(isset($filter)){
           $month = date("m",strtotime($filter));
           $year = date("Y",strtotime($filter));
        }else{
            $month =now()->month;
            $year = now()->year;
        }
        //echo '<pre>'; print_r($year); die();
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
            $all_user[$key]['year_salary'] = $year;
            $all_user[$key]['month_salary'] = $month;
            if(isset($all->offer_datils) && $offer_details->Days == 'Monday to Saturday'){
                Carbon::setWeekendDays([
                    Carbon::SUNDAY,
                ]);
            }else{
                Carbon::setWeekendDays([
                    Carbon::SATURDAY,
                    Carbon::SUNDAY,
                ]);
            }
            $dt = Carbon::create(now()->month($month)->startOfMonth());
            $dt2 = Carbon::create(now()->month($month)->endOfMonth());
            $daysForExtraCoding = $dt->diffInDaysFiltered(function(Carbon $date) {
                return $date->isWeekend();
            }, $dt2);
            //echo $daysForExtraCoding; die();
            $holiday = Holiday::whereMonth('date',$month)->whereYear('date', '=',$year)->count();
            $month_working = Carbon::now()->month($month)->daysInMonth - $daysForExtraCoding - $holiday;

            $break = $all->break_time ? json_decode($all->break_time) : '';
            $total_break = $all->break_time ? intval($break->mor_tea_break + $break->lunch_break + $break->eve_tea_break) * $month_working : 0;

            $all_user[$key]['working_ours'] = $all->offer_datils ?  $this->mintoHour($month_working * intval($all->offer_datils ? $offer_details->days_working_hour : 1)* 60 - $total_break): '-';

            $attendance = Attendance::where('user_id',$all->id)->whereMonth('attendance_date',$month)->whereYear('attendance_date', '=',$year)->get();
            $active_hours = 0;
            if(isset($attendance)){
                foreach($attendance as $all_attendance){
                    $active_hours += $all_attendance->working_hours;
                }
            }

            $houyr_amount = $all->offer_datils ? $offer_details->basic / $month_working / intval($offer_details->days_working_hour) : 1;
            $all_user[$key]['working_days'] = $month_working;
            $all_user[$key]['total_salary'] = $all->offer_datils ? number_format($offer_details->basic) : '-';

            $all_user[$key]['payable_amount'] = $all->offer_datils ? number_format(($active_hours/60) * $houyr_amount,'2') : '-';

            $all_user[$key]['deduted_amount'] = $all->offer_datils && $offer_details->basic - ($active_hours/60) * $houyr_amount > 0 ? number_format($offer_details->basic - ($active_hours/60) * $houyr_amount,'2') : '-';

            $all_user[$key]['active_ours'] = $this->mintoHour($active_hours);

            $all_user[$key]['due_ours'] = $all->offer_datils && ($month_working * intval($all->offer_datils ? $offer_details->days_working_hour : 1) * 60 - (abs($active_hours)) - $total_break) > 0 ? $this->mintoHour(abs($month_working * intval($all->offer_datils ? $offer_details->days_working_hour : 1) * 60 - (abs($active_hours)) - $total_break)): '-';
        }
       //die();
        //echo '<pre>'; print_r( $daysForExtraCoding ); die();
        $user_admin = User::where('role','Admin')->where(function($query) {
            $query->where('job_status', Null)
                  ->orWhere('job_status','Approved');
        })->get();
        foreach($user_admin as $key=>$admindata){
            $offer_details = $admindata->offer_datils ? json_decode($admindata->offer_datils) : '';
            $user_admin[$key]['year_salary'] = $year;
            $user_admin[$key]['month_salary'] = $month;
            if(isset($admindata->offer_datils) && $offer_details->Days == 'Monday to Saturday'){
                Carbon::setWeekendDays([
                    Carbon::SUNDAY,
                ]);
            }else{
                Carbon::setWeekendDays([
                    Carbon::SATURDAY,
                    Carbon::SUNDAY,
                ]);
            }
            $dt = Carbon::create(now()->month($month)->startOfMonth());
            $dt2 = Carbon::create(now()->month($month)->endOfMonth());
            $daysForExtraCoding = $dt->diffInDaysFiltered(function(Carbon $date) {
                return $date->isWeekend();
            }, $dt2);
            $holiday = Holiday::whereMonth('date',$month)->whereYear('date', '=',$year)->count();
            $month_working = Carbon::now()->month($month)->daysInMonth - $daysForExtraCoding - $holiday;

            $break = $admindata->break_time ? json_decode($admindata->break_time) : '';
            $total_break = $admindata->break_time ? intval($break->mor_tea_break + $break->lunch_break + $break->eve_tea_break) * $month_working : 0;

            $user_admin[$key]['working_ours'] = $admindata->offer_datils ?  $this->mintoHour($month_working * intval($admindata->offer_datils ? $offer_details->days_working_hour : 1)* 60 - $total_break): '-';

            $attendance = Attendance::where('user_id',$admindata->id)->whereMonth('attendance_date', $month)->whereYear('attendance_date', '=',$year)->get();
            $active_hours = 0;
            if(isset($attendance)){
                foreach($attendance as $admindata_attendance){
                    $active_hours += $admindata_attendance->working_hours;
                }
            }

            $houyr_amount = $admindata->offer_datils ? $offer_details->basic / $month_working / intval($offer_details->days_working_hour) : 1;

            $user_admin[$key]['working_days'] = $month_working;

            $user_admin[$key]['total_salary'] = $admindata->offer_datils ? number_format($offer_details->basic) : '-';

            $user_admin[$key]['payable_amount'] = $admindata->offer_datils ? number_format(($active_hours/60) * $houyr_amount,'2') : '-';

            $user_admin[$key]['deduted_amount'] = $admindata->offer_datils && $offer_details->basic - ($active_hours/60) * $houyr_amount > 0 ? number_format($offer_details->basic - ($active_hours/60) * $houyr_amount,'2') : '-'
            ;

            $user_admin[$key]['active_ours'] = $this->mintoHour($active_hours);
            $user_admin[$key]['due_ours'] = $admindata->offer_datils && ($month_working * intval($admindata->offer_datils ? $offer_details->days_working_hour : 1) * 60 - (abs($active_hours)) - $total_break) > 0 ? $this->mintoHour(abs($month_working * intval($admindata->offer_datils ? $offer_details->days_working_hour : 1) * 60 - (abs($active_hours)) - $total_break)): '-';
        }

        $user_manager = User::where('role','Manager')->where(function($query) {
            $query->where('job_status', Null)
                  ->orWhere('job_status','Approved');
        })->get();
        foreach($user_manager as $key=>$managerdata){
            $offer_details = $managerdata->offer_datils ? json_decode($managerdata->offer_datils) : '';
            $user_manager[$key]['year_salary'] = $year;
            $user_manager[$key]['month_salary'] = $month;
            if(isset($managerdata->offer_datils) && $offer_details->Days == 'Monday to Saturday'){
                Carbon::setWeekendDays([
                    Carbon::SUNDAY,
                ]);
            }else{
                Carbon::setWeekendDays([
                    Carbon::SATURDAY,
                    Carbon::SUNDAY,
                ]);
            }
            $dt = Carbon::create(now()->month($month)->startOfMonth());
            $dt2 = Carbon::create(now()->month($month)->endOfMonth());
            $daysForExtraCoding = $dt->diffInDaysFiltered(function(Carbon $date) {
                return $date->isWeekend();
            }, $dt2);
            $holiday = Holiday::whereMonth('date',$month)->whereYear('date', '=',$year)->count();
            $month_working = Carbon::now()->month($month)->daysInMonth - $daysForExtraCoding - $holiday;
            $break = $managerdata->break_time ? json_decode($managerdata->break_time) : '';
            $total_break = $managerdata->break_time ? intval($break->mor_tea_break + $break->lunch_break + $break->eve_tea_break) * $month_working : 0;

            $user_manager[$key]['working_ours'] = $managerdata->offer_datils ?  $this->mintoHour($month_working * intval($managerdata->offer_datils ? $offer_details->days_working_hour : 1)* 60 - $total_break): '-';
            $attendance = Attendance::where('user_id',$managerdata->id)->whereMonth('attendance_date',$month)->whereYear('attendance_date', '=',$year)->get();
            $active_hours = 0;
            if(isset($attendance)){
                foreach($attendance as $managerdata_attendance){
                    $active_hours += $managerdata_attendance->working_hours;
                }
            }

            $houyr_amount = $managerdata->offer_datils ? $offer_details->basic / $month_working / intval($offer_details->days_working_hour) : 1;
            $user_manager[$key]['working_days'] = $month_working;
            $user_manager[$key]['total_salary'] = $managerdata->offer_datils ? number_format($offer_details->basic) : '-';

            $user_manager[$key]['payable_amount'] = $managerdata->offer_datils ? number_format(($active_hours/60) * $houyr_amount,'2') : '-';

            $user_manager[$key]['deduted_amount'] = $managerdata->offer_datils && $offer_details->basic - ($active_hours/60) * $houyr_amount > 0  ? number_format($offer_details->basic - ($active_hours/60) * $houyr_amount,'2') : '-'
            ;

            $user_manager[$key]['active_ours'] = $this->mintoHour($active_hours);
            $user_manager[$key]['due_ours'] = $managerdata->offer_datils && ($month_working * intval($all->offer_datils ? $offer_details->days_working_hour : 1) * 60 - (abs($active_hours)) - $total_break) > 0 ? $this->mintoHour(abs($month_working * intval($managerdata->offer_datils ? $offer_details->days_working_hour : 1) * 60 - (abs($active_hours)) - $total_break)): '-';
        }

        $user_teamlead = User::where('role','Team Leader')->where(function($query) {
            $query->where('job_status', Null)
                  ->orWhere('job_status','Approved');
        })->get();
        foreach($user_teamlead as $key=>$teamleaddata){
            $offer_details = $teamleaddata->offer_datils ? json_decode($teamleaddata->offer_datils) : '';
            $user_teamlead[$key]['year_salary'] = $year;
            $user_teamlead[$key]['month_salary'] = $month;
            if(isset($teamleaddata->offer_datils) && $offer_details->Days == 'Monday to Saturday'){
                Carbon::setWeekendDays([
                    Carbon::SUNDAY,
                ]);
            }else{
                Carbon::setWeekendDays([
                    Carbon::SATURDAY,
                    Carbon::SUNDAY,
                ]);
            }
            $dt = Carbon::create(now()->month($month)->startOfMonth());
            $dt2 = Carbon::create(now()->month($month)->endOfMonth());
            $daysForExtraCoding = $dt->diffInDaysFiltered(function(Carbon $date) {
                return $date->isWeekend();
            }, $dt2);
            $holiday = Holiday::whereMonth('date',$month)->whereYear('date', '=',$year)->count();
            $month_working = Carbon::now()->month($month)->daysInMonth - $daysForExtraCoding - $holiday;

            $break = $teamleaddata->break_time ? json_decode($teamleaddata->break_time) : '';
            $total_break = $teamleaddata->break_time ? intval($break->mor_tea_break + $break->lunch_break + $break->eve_tea_break) * $month_working : 0;

            $user_teamlead[$key]['working_ours'] = $teamleaddata->offer_datils ?  $this->mintoHour($month_working * intval($teamleaddata->offer_datils ? $offer_details->days_working_hour : 1)* 60 - $total_break): '-';

            $attendance = Attendance::where('user_id',$teamleaddata->id)->whereMonth('attendance_date',$month)->whereYear('attendance_date', '=',$year)->get();
            $active_hours = 0;
            if(isset($attendance)){
                foreach($attendance as $teamleaddata_attendance){
                    $active_hours += $teamleaddata_attendance->working_hours;
                }
            }

            $houyr_amount = $teamleaddata->offer_datils ? $offer_details->basic / $month_working / intval($offer_details->days_working_hour) : 1;
            $user_teamlead[$key]['working_days'] = $month_working;
            $user_teamlead[$key]['total_salary'] = $teamleaddata->offer_datils ? number_format($offer_details->basic) : '-';

            $user_teamlead[$key]['payable_amount'] = $teamleaddata->offer_datils ? number_format(($active_hours/60) * $houyr_amount,'2') : '-';

            $user_teamlead[$key]['deduted_amount'] = $teamleaddata->offer_datils && $offer_details->basic - ($active_hours/60) * $houyr_amount > 0  ? number_format($offer_details->basic - ($active_hours/60) * $houyr_amount,'2') : '-'
            ;

            $user_teamlead[$key]['active_ours'] = $this->mintoHour($active_hours);
            $user_teamlead[$key]['due_ours'] = $teamleaddata->offer_datils && ($month_working * intval($teamleaddata->offer_datils ? $offer_details->days_working_hour : 1) * 60 - (abs($active_hours)) - $total_break) > 0 ? $this->mintoHour(abs($month_working * intval($teamleaddata->offer_datils ? $offer_details->days_working_hour : 1) * 60 - (abs($active_hours)) - $total_break)): '-';
        }

        $user_employee = User::where('role','Employee')->where(function($query) {
            $query->where('job_status', Null)
                  ->orWhere('job_status','Approved');
        })->get();
        foreach($user_employee as $key=>$employeedata){
            $offer_details = $employeedata->offer_datils ? json_decode($employeedata->offer_datils) : '';
            $user_employee[$key]['year_salary'] = $year;
            $user_employee[$key]['month_salary'] = $month;
            if(isset($employeedata->offer_datils) && $offer_details->Days == 'Monday to Saturday'){
                Carbon::setWeekendDays([
                    Carbon::SUNDAY,
                ]);
            }else{
                Carbon::setWeekendDays([
                    Carbon::SATURDAY,
                    Carbon::SUNDAY,
                ]);
            }
            $dt = Carbon::create(now()->month($month)->startOfMonth());
            $dt2 = Carbon::create(now()->month($month)->endOfMonth());
            $daysForExtraCoding = $dt->diffInDaysFiltered(function(Carbon $date) {
                return $date->isWeekend();
            }, $dt2);
            $holiday = Holiday::whereMonth('date',$month)->whereYear('date', '=',$year)->count();
            $month_working = Carbon::now()->month($month)->daysInMonth - $daysForExtraCoding - $holiday;

            $break = $employeedata->break_time ? json_decode($employeedata->break_time) : '';
            $total_break = $employeedata->break_time ? intval($break->mor_tea_break + $break->lunch_break + $break->eve_tea_break) * $month_working : 0;

            $user_employee[$key]['working_ours'] = $employeedata->offer_datils ?  $this->mintoHour($month_working * intval($employeedata->offer_datils ? $offer_details->days_working_hour : 1)* 60 - $total_break): '-';

            $attendance = Attendance::where('user_id',$employeedata->id)->whereMonth('attendance_date',$month)->whereYear('attendance_date', '=',$year)->get();
            $active_hours = 0;
            if(isset($attendance)){
                foreach($attendance as $employeedata_attendance){
                    $active_hours += $employeedata_attendance->working_hours;
                }
            }

            $houyr_amount = $employeedata->offer_datils ? $offer_details->basic / $month_working / intval($offer_details->days_working_hour) : 1;
            $user_employee[$key]['working_days'] = $month_working;
            $user_employee[$key]['total_salary'] = $employeedata->offer_datils ? number_format($offer_details->basic) : '-';

            $user_employee[$key]['payable_amount'] = $employeedata->offer_datils ? number_format(($active_hours/60) * $houyr_amount,'2') : '-';

            $user_employee[$key]['deduted_amount'] = $employeedata->offer_datils && $offer_details->basic - ($active_hours/60) * $houyr_amount > 0  ? number_format($offer_details->basic - ($active_hours/60) * $houyr_amount,'2') : '-'
            ;

            $user_employee[$key]['active_ours'] = $this->mintoHour($active_hours);
            $user_employee[$key]['due_ours'] =  $employeedata->offer_datils  && ($month_working * intval($all->offer_datils ? $offer_details->days_working_hour : 1) * 60 - (abs($active_hours)) - $total_break) > 0 ? $this->mintoHour(abs($month_working * intval($employeedata->offer_datils ? $offer_details->days_working_hour : 1) * 60 - (abs($active_hours)) - $total_break)): '-';
        }

        $user_data = User_data::where('user_id',Auth::id())->first();
        $filter_date = isset($filter) ? $filter : date("Y-m");
        return view(
            'livewire.example-laravel.user-salary.user-sallery',
            [
                'alluser' => $all_user,
                'user_admin' => $user_admin,
                'user_manager' => $user_manager,
                'user_teamlead' => $user_teamlead,
                'user_employee' => $user_employee,
                'user_data' =>$user_data,
                'filter_date' => $filter_date
            ]
        );
    }

    public function mintoHour($minutes){
        $hours = floor($minutes / 60);
        $min = $minutes - ($hours * 60);
        return round($hours) ." Hour(s) ". round($min)." Minute(s)";
    }

    public function viewSalary(Request $request,$id,$month){
        $filter = $request->all();
        if(isset($month)){
           $month1 = date("m",strtotime($month));
           $year = date("Y",strtotime($month));
        }else{
            $month1 =now()->month;
            $year = now()->year;
        }

        $data = User::where('id',$id)->first();
        $user_data = User_data::where('user_id',$id)->first();
        $offer_letter = $data->offer_datils ? json_decode($data->offer_datils): '';
        $offer_details = $data->offer_datils ? json_decode($data->offer_datils) : '';
            $data['year_salary'] = $data->offer_datils ? number_format($offer_details->basic * 12) : '-';
            $data['month_salary'] = $data->offer_datils ? number_format($offer_details->basic) : '-';
            if(isset($data->offer_datils) && $offer_details->Days == 'Monday to Saturday'){
                Carbon::setWeekendDays([
                    Carbon::SUNDAY,
                ]);
            }else{
                Carbon::setWeekendDays([
                    Carbon::SATURDAY,
                    Carbon::SUNDAY,
                ]);
            }
            $dt = Carbon::create(now()->month($month1)->startOfMonth());
            $dt2 = Carbon::create(now()->month($month1)->endOfMonth());
            $daysForExtraCoding = $dt->diffInDaysFiltered(function(Carbon $date) {
                return $date->isWeekend();
            }, $dt2);
            $holiday = Holiday::whereMonth('date', $month1)->whereYear('date', '=', $year);
            $holidayList = $holiday->get();
            $holiday = $holiday->count();

            $month_working = Carbon::now()->month($month1)->daysInMonth - $daysForExtraCoding - $holiday;

            $break = $data->break_time ? json_decode($data->break_time) : '';
            $total_break = $data->break_time ? intval($break->mor_tea_break + $break->lunch_break + $break->eve_tea_break) * $month_working : 0;

            $data['working_ours'] = $data->offer_datils ?  $this->mintoHour($month_working * intval($data->offer_datils ? $offer_details->days_working_hour : 1)* 60 - $total_break): '-';

            $attendance = Attendance::where('user_id',$data->id)->whereMonth('attendance_date', $month1)->whereYear('attendance_date', '=', $year)->get();
            $active_hours = 0;
            if(isset($attendance)){
                foreach($attendance as $data_attendance){
                    $active_hours += $data_attendance->working_hours;
                }
            }
            $data['active_ours'] = $this->mintoHour($active_hours);

            $houyr_amount = $data->offer_datils ? $offer_details->basic / $month_working / intval($offer_details->days_working_hour) : 1;

            $data['payable_amount'] = $data->offer_datils ? number_format(($active_hours/60) * $houyr_amount,'2') : '-';

            $data['deduted_amount'] = $data->offer_datils ? number_format($offer_details->basic - ($active_hours/60) * $houyr_amount,'2') : '-'
            ;

             $data['due_ours'] = $data->offer_datils && ($month_working * intval($data->offer_datils ? $offer_details->days_working_hour : 1) * 60 - (abs($active_hours)) - $total_break) > 0 ? $this->mintoHour(abs($month_working * intval($data->offer_datils ? $offer_details->days_working_hour : 1) * 60 - (abs($active_hours)) - $total_break)) : '-';

            $data['EXTRA_ours'] = $data->offer_datils && ($month_working * intval($data->offer_datils ? $offer_details->days_working_hour : 1) * 60 - (abs($active_hours)) - $total_break) < 0 ? $this->mintoHour(abs($month_working * intval($data->offer_datils ? $offer_details->days_working_hour : 1) * 60 - (abs($active_hours)) - $total_break)) : '-';

            $holidayStr = "";
            foreach($holidayList as $holi){
                $holidayStr .= $holidayStr == "" ? "(".$holi->holiday_name : ", ".$holi->holiday_name;
            }
            $holidayStr .= $holidayStr == "" ? "" : ")";

            $data['month']= $month1;
            $data['year']= $year;
            $data['holiday']= $holiday." ".$holidayStr;
            $data['off_day']= $daysForExtraCoding;

        //echo '<pre>'; print_r($data); die();
        return view('livewire.example-laravel.user-salary.salarymanagement',compact('user_data','data','filter','offer_letter'));
    }

}
