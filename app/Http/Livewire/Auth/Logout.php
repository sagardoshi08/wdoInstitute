<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;

class Logout extends Component
{

    public function destroy()
    {
        // if(session()->has('startWorkTime')){
        //     $startworking = session()->get('startWorkTime');
        //     //echo $startworking;
        //     $endworking = date("Y-m-d H:i:s");
        //     //echo $endworking; die();
        //     // $hourdiff = (strtotime($endworking) - strtotime($startworking))/(60*60);
        //     // $hourdiff = ceil($hourdiff/60/60/60);
        //     $hourscount = Attendance::where(["user_id"=> Auth::id(),"attendance_date"=>date("Y-m-d")]);
        //     $to_time = strtotime($startworking);
        //     $from_time = strtotime($endworking);
        //     $hourdiff = round(abs($to_time - $from_time) / 60,2);
        //     $oldattendhis = [];

        //     $startworkinghis = [];
        //     $startworkinghis['start_time'] = $startworking;
        //     $startworkinghis['end_time'] = $endworking;
        //     $startworkinghis['autologout'] = 0;
        //     if($hourscount->count()){
        //         $hourscount = $hourscount->first()->working_hours;
        //         $joson_data= Attendance::where(["user_id"=> Auth::id(),"attendance_date"=>date("Y-m-d")])->first()->attendance_history;
        //         if(isset($joson_data) && $joson_data != null){
        //             $oldattendhis = json_decode($joson_data);
        //         }
        //        array_push($oldattendhis, $startworkinghis);

        //         Attendance::where(["user_id"=> Auth::id(),"attendance_date"=>date("Y-m-d")])->update([
        //             "working_hours"=>($hourscount+$hourdiff),
        //             "location"=>session()->has('user_location') ? session()->get('user_location') : '',
        //             "attendance_history"=>json_encode($oldattendhis),
        //             "status" => 1
        //         ]);
        //     }else{
        //         array_push($oldattendhis, $startworkinghis);

        //         Attendance::insert([
        //             "user_id"=> Auth::id(),
        //             "attendance_date"=>date("Y-m-d"),
        //             "working_hours"=>$hourdiff,
        //             "location"=>session()->has('user_location') ? session()->get('user_location') : '',
        //             "attendance_history"=>json_encode($oldattendhis)
        //         ]);
        //     } 
        // }
       User::where('id',Auth::id())->update(['login_status'=>0]);
        Auth::logout();
        //  session()->forget('startWorkTime');
        // session()->forget('workedminutes');
        return redirect('/');
    }

    public function attendence_destroy()
    {
        // $startworking = session()->get('startWorkTime');
        // $endworking = date("Y-m-d H:i:s");

        // //$hourdiff = (strtotime($endworking) - strtotime($startworking))/(60*60);
        // //$hourdiff = ceil($hourdiff/60/60/60);
        // $hourscount = Attendance::where(["user_id"=> Auth::id(),"attendance_date"=>date("Y-m-d")]);
        // $to_time = strtotime($startworking);
        // $from_time = strtotime($endworking);
        // $hourdiff = round(abs($to_time - $from_time) / 60,2);
        // $startworkinghis = [];
        // $startworkinghis['start_time'] = $startworking;
        // $startworkinghis['end_time'] = $endworking;
        // $startworkinghis['autologout'] = 1;
        // $oldattendhis = [];

        // if($hourscount->count()){

        //     $joson_data= $hourscount->first()->attendance_history;
        //     // $hourscount = $hourscount->first()->working_hours;
        //     if(isset($joson_data) && $joson_data != null && $joson_data != ""){
        //         $oldattendhis = json_decode($joson_data);
        //         //echo '<pre>'; print_r($oldattendhis); die();
        //     }
        //     array_push($oldattendhis, $startworkinghis);
        //     $hourscount = $hourscount->first()->working_hours;
        //     Attendance::where(["user_id"=> Auth::id(),"attendance_date"=>date("Y-m-d")])->update([
        //         "working_hours"=>($hourscount+$hourdiff),
        //         "location"=>session()->has('user_location') ? session()->get('user_location') : '',
        //         "attendance_history"=>json_encode($oldattendhis)
        //     ]);
        // }else{
        //     array_push($oldattendhis, $startworkinghis);

        //     Attendance::insert([
        //         "user_id"=> Auth::id(),
        //         "attendance_date"=>date("Y-m-d"),
        //         "working_hours"=>$hourdiff,
        //         "location"=>session()->has('user_location') ? session()->get('user_location') : '',
        //         "attendance_history"=>json_encode($oldattendhis)
        //     ]);
        // }
        User::where('id',Auth::id())->update(['login_status'=>0]);
        Auth::logout();
        // session()->forget('startWorkTime');
        // session()->forget('workedminutes');
        return redirect('/');
    }

    public function render()
    {
        return view('livewire.auth.logout');
    }

    public function remainingLogout(){
        
    }
}
