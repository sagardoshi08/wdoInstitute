<?php 

namespace App\Listeners;
use Illuminate\Auth\Events\Logout;
use Auth;
use App\Models\User;
use App\Models\Attendance;

    class LogSuccessfulLogout
    {
        /**
         * Create the event listener.
         *
         * @return void
         */
        public function __construct()
        {
            //
        }

        /**
         * Handle the event.
         *
         * @param  Logout  $event
         * @return void
         */
        public function handle(Logout $event)
        {
                if(session()->has('startWorkTime')){
                    if(session()->has('previousUser')){
                        $id = session()->get('previousUser');
                    }else{
                        $id = Auth::id();
                    }
                    
                $startworking = session()->get('startWorkTime');
                //echo $startworking;
                $endworking = date("Y-m-d H:i:s");
                //echo $endworking; die();
                // $hourdiff = (strtotime($endworking) - strtotime($startworking))/(60*60);
                // $hourdiff = ceil($hourdiff/60/60/60);
                $hourscount = Attendance::where(["user_id"=> $id,"attendance_date"=>date("Y-m-d")]);
                $to_time = strtotime($startworking);
                $from_time = strtotime($endworking);
                $hourdiff = round(abs($to_time - $from_time) / 60,2);
                $oldattendhis = [];

                $startworkinghis = [];
                $startworkinghis['start_time'] = $startworking;
                $startworkinghis['end_time'] = $endworking;
                $startworkinghis['autologout'] = 0;
                $startworkinghis['location'] = session()->has('user_location') ? session()->get('user_location') : '';
                if($hourscount->count()){
                    $hourscount = $hourscount->first()->working_hours;
                    $joson_data= Attendance::where(["user_id"=> $id,"attendance_date"=>date("Y-m-d")])->first()->attendance_history;
                    if(isset($joson_data) && $joson_data != null){
                        $oldattendhis = json_decode($joson_data);
                    }
                   array_push($oldattendhis, $startworkinghis);

                    Attendance::where(["user_id"=> $id,"attendance_date"=>date("Y-m-d")])->update([
                        "working_hours"=>($hourscount+$hourdiff),
                        "location"=>session()->has('user_location') ? session()->get('user_location') : '',
                        "attendance_history"=>json_encode($oldattendhis),
                        "status" => 1
                    ]);
                }else{
                    array_push($oldattendhis, $startworkinghis);

                    Attendance::insert([
                        "user_id"=> $id,
                        "attendance_date"=>date("Y-m-d"),
                        "working_hours"=>$hourdiff,
                        "location"=>session()->has('user_location') ? session()->get('user_location') : '',
                        "attendance_history"=>json_encode($oldattendhis)
                    ]);
                }
            }
            // Do your logic
            User::where('id',$id)->update([
                'login_status' => 0
            ]);
            session()->forget('startWorkTime');
            session()->forget('workedminutes');
            session()->forget('previousUser');
            
        }
    }
