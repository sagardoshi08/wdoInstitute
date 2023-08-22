<?php
namespace App\Http\Livewire\ExampleLaravel;
use Livewire\Component;
use App\Models\Attendance;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

use Illuminate\Http\Request;


class UserAttendence extends Component
{
    public function render(Request $request){
        $filter =  $request->all();
        $data=$request->all();
        $user = User::get();
        if($request->has('time_interval')){
            $usersUUId = [];
            $uuid = User::select('uuid')->where(['id'=>$request->user_id])->first()->uuid;
            array_push($usersUUId,$uuid);
            $Attendance = Attendance::select(
                'attendance.*',
                'users.role',
                'users.name',
                'users.offer_datils'
            )
            ->join('users','users.id','=','attendance.user_id')
           // ->whereBetween('attendance_date', [$request->fromdate, $request->todate])
            ->whereIn('users.uuid',$usersUUId)
            ->where('users.job_status',NULL);
            if($request->time_interval == 'current_month'){
                $Attendance = $Attendance->whereMonth('attendance_date', date('m'));
            } elseif($request->time_interval == 'one_month'){
                $Attendance = $Attendance->whereBetween('attendance_date', [ date('Y-m-d', strtotime('-1 month')),date('Y-m-d')]);
            } elseif($request->time_interval == 'two_months'){
                $Attendance = $Attendance->whereBetween('attendance_date', [ date('Y-m-d', strtotime('-2 months')),date('Y-m-d')]);
            } elseif($request->time_interval == 'three_months'){
                $Attendance = $Attendance->whereBetween('attendance_date', [date('Y-m-d', strtotime('-3 months')), date('Y-m-d')]);
            } elseif($request->time_interval == 'six_months'){
                $Attendance = $Attendance->whereBetween('attendance_date', [ date('Y-m-d', strtotime('-6 months')), date('Y-m-d')]);
            } elseif($request->time_interval == 'one_year'){
                $Attendance = $Attendance->whereBetween('attendance_date', [date('Y-m-d', strtotime('-1 year')), date('Y-m-d')]);
            } elseif($request->time_interval == 'two_years'){ 
                $Attendance = $Attendance->whereBetween('attendance_date', [date('Y-m-d', strtotime('-2 years')), date('Y-m-d')]);
            }
            $Attendance = $Attendance->paginate(10);
        }else{
            $usersUUId = Auth::user()->assign_user != null ?  json_decode(Auth::user()->assign_user) : [];
            array_push($usersUUId,Auth::user()->uuid);
            /*echo "<pre>";
            print_r($usersUUId);
            echo json_encode($usersUUId);
            echo "</pre>";
            exit();*/
            $Attendance = Attendance::select(
                'attendance.*',
                'users.role',
                'users.name',
                'users.offer_datils'
            )
            ->leftjoin('users','users.id','=','attendance.user_id')
            ->where('attendance_date',date("Y-m-d"));
            if(Auth::user()->role != "super_admin" ){
                $Attendance = $Attendance->whereIn('users.uuid',$usersUUId);
            }
            /*if(Auth::user()->role == 'Admin'){
                $Attendance = $Attendance->where('users.role','!=','super_admin');

            } if(Auth::user()->role == 'Manager'){
                $Attendance = $Attendance->where('users.role','!=','super_admin')->where('users.role','!=','Admin');

            } if(Auth::user()->role == 'Team Leader'){
                $Attendance = $Attendance->where('users.role','!=','super_admin')->where('users.role','!=','Admin')->where('users.role','!=','Manager');

            } if(Auth::user()->role == 'Employee'){
                $Attendance = $Attendance->where('users.role','!=','super_admin')->where('users.role','!=','Admin')->where('users.role','!=','Manager')->where('users.role','!=','Team Leader');
            }*/
            $Attendance=$Attendance->paginate();
        }
        foreach($Attendance as $attend){
            if(isset($attend->offer_datils)){
                $details=json_decode($attend->offer_datils);
                if($attend->attendance_history == null){
                    $latelogin = '-';
                    $starttime= strtotime(session()->get('startWorkTime'));
                }else{
                    $login_date= json_decode($attend->attendance_history);
                    $starttime = strtotime($login_date[0]->start_time);
					$endtime = strtotime($attend->attendance_date.' '. $details->start_time);
					$total_second =  $starttime - $endtime;
					// $latelogin = round(($starttime-$endtime) / 60,2);
					$latelogin = round($total_second/60);
					// $latelogin = round(($latelogin) / 60,2);
					// $latelogin = round(($latelogin) / 60);
					$latelogin = ($total_second)  < 0 ? $this->mintoHour(abs($latelogin))." Fast" : $this->mintoHour(abs($latelogin))." Late" ;
                }                
            }else{
                $details='';
                $latelogin ="";
            }
            $attend->latelogin = $latelogin;
            $attend->details = $details;
        }
        //die();
        return view('livewire.Attendence.attendence',compact('Attendance','data','user','filter'));
    }

    public function viewLoginLogoutHistory(Request $request,$id){
        $filter = $request->all();
        $data = Attendance::select(
            'attendance.*',
            'users.uuid',
            'users.id as user_id',
            'users.email',
            'users.name',
            'users.status',
            'users.role',
            'users.offer_datils',
            'user_data.father_name',
            'user_data.mother_name',
            'user_data.date_of_birth',
            'user_data.phone_number'
        )
        ->where('attendance.id',$id)
        ->leftJoin('users','users.id','=','attendance.user_id')
        ->leftJoin('user_data','user_data.user_id','=','users.id')
        ->first();
        $offer_letter = $data->offer_datils ? json_decode($data->offer_datils): '';
        $Attendance = $data->attendance_history != null && $data->attendance_history != "" ? json_decode($data->attendance_history) : [];
        //echo "<pre>"; print_r($data); die();
        return view('livewire.Attendence.LoginLogoutHistoryPdf',compact('Attendance','data','filter','offer_letter'));
    }

    public function mintoHour($minutes){
        $hours = floor($minutes / 60);
        $min = $minutes - ($hours * 60);
        return round($hours) ." Hour(s) ". round($min)." Mintes(s)";
    }

    public function filterAttendanceHistory(Request $request){
        //echo '<pre>'; print_r($request->all());
        $user_data = User::select('offer_datils')->where('id',$request->user_id)->first();
        $offer_letter = $user_data->offer_datils ? json_decode($user_data->offer_datils): '';
        $workinghour = $offer_letter != '' ? $offer_letter->days_working_hour : '-';
        $attendece = Attendance::where('user_id',$request->user_id);
        if($request->month){
            $attendece = $attendece->whereMonth('attendance_date',$request->month);
        }
        if($request->form_date != '' && $request->to_date == ''){
            $attendece =  $attendece->whereDate('attendance_date', '>=', $request->form_date);
        }
        if($request->to_date != '' && $request->form_date == ''){
            $attendece =  $attendece->whereDate('attendance_date', '<=', $request->to_date);
        }
        if($request->to_date && $request->form_date){
            $attendece =  $attendece->whereBetween('attendance_date', [$request->form_date, $request->to_date]);
        }
        if($request->to_date == '' && $request->form_date == '' && $request->month == ''){
            $attendece =  $attendece->where('attendance_date',date("Y-m-d"));
        }
        $attendece = $attendece->get();
        // Carbon::setWeekendDays([
        //     Carbon::SATURDAY,
        //     Carbon::SUNDAY,
        // ]);
        if($request->month && $request->to_date == '' && $request->form_date == ''){
            // $dt = Carbon::create(now()->month($request->month)->subMonth()->endOfMonth());
            // $dt2 = Carbon::create(now()->month($request->month)->addMonth()->startOfMonth());
            $dt = Carbon::create(now()->month($request->month)->startOfMonth());
            $dt2 = Carbon::create(now()->month($request->month)->endOfMonth());
            $daysForExtraCoding = $dt->diffInDaysFiltered(function(Carbon $date) {
                return $date->isWeekend();
            }, $dt2);
            $total_days= Carbon::now()->month($request->month)->daysInMonth - $daysForExtraCoding;

        }elseif($request->to_date == '' && $request->form_date){
            $month = date('m', strtotime($request->form_date));
            $dt = Carbon::create($request->form_date);
            $dt2 = Carbon::create(now()->month($month)->endOfMonth());
            $daysForExtraCoding = $dt->diffInDaysFiltered(function(Carbon $date) {
                return $date->isWeekend();
            }, $dt2);
            $total_days= abs($dt2->diffInDays($dt) - $daysForExtraCoding);

        }elseif($request->to_date && $request->form_date == ''){
            $month = date('m', strtotime($request->to_date));
            $dt = Carbon::create(now()->month($month)->startOfMonth());
            $dt2 = Carbon::create($request->to_date);
            $daysForExtraCoding = $dt->diffInDaysFiltered(function(Carbon $date) {
                return $date->isWeekend();
            }, $dt2);

            $total_days= abs($dt2->diffInDays($dt) - $daysForExtraCoding);

        }else{
            $dt = Carbon::create($request->form_date);
            $dt2 = Carbon::create($request->to_date);
            $daysForExtraCoding = $dt->diffInDaysFiltered(function(Carbon $date) {
                return $date->isWeekend();
            }, $dt2);

            $total_days= abs($dt2->diffInDays($dt) - $daysForExtraCoding);
        }
       
        $total_working_hour = intval($total_days)*intval($offer_letter->days_working_hour);
        $result = array();
        foreach($attendece as $key1=>$atten){
            array_push($result,$atten);
        }
        $decode_data = collect($result)->flatten();
        $response_arr = [];
        if($decode_data){
            $active_hours = 0;
            foreach($decode_data as $atten_details){
                $Attendance = $atten_details->attendance_history != null && $atten_details->attendance_history != "" ? json_decode($atten_details->attendance_history) : '';
                $active_hours += $atten_details->working_hours;
               
                if($Attendance != ''){
                    foreach($Attendance as $key=>$data_details){
                        $autolog = $data_details->autologout == 0 ? "No" : "Yes";

                        $duehour = $offer_letter && ($offer_letter->days_working_hour*60 - (abs(strtotime($data_details->start_time) -  strtotime($data_details->end_time)) / 60)) > 0 ? $this->mintoHour(abs($offer_letter->days_working_hour*60 - (abs(strtotime($data_details->start_time) -  strtotime($data_details->end_time)) / 60))) : '-';

                        $extrahour = $offer_letter && ($offer_letter->days_working_hour*60 - (abs(strtotime($data_details->start_time) -  strtotime($data_details->end_time)) / 60)) < 0 ? $this->mintoHour(abs($offer_letter->days_working_hour*60 - (abs(strtotime($data_details->start_time) -  strtotime($data_details->end_time)) / 60))) : '-';
                        $arr = [
                            'sr_no' => ($key+1),
                            'attendance_date' => $atten_details->attendance_date,
                            'start_time' => date('Y-m-d H:i:s',strtotime($data_details->start_time)),
                            'end_time' => date('Y-m-d H:i:s',strtotime($data_details->end_time)),
                            'workinghour' => $workinghour,
                            'autologout' => $autolog,
                            'active_hour' => $this->mintoHour(abs(strtotime($data_details->start_time) -  strtotime($data_details->end_time)) / 60),
                            'duehour' => $duehour,
                            'extrahour' => $extrahour
                        ];
                        array_push($response_arr,$arr);
                        // echo "<tr><td>".($key+1)."</td><td>".$atten_details->attendance_date."</td><td>".date('Y-m-d H:i:s',strtotime($data_details->start_time))."</td><td>".date('Y-m-d H:i:s',strtotime($data_details->end_time))."</td><td>".$workinghour."</td><td>".$autolog."</td><td>".$this->mintoHour(abs(strtotime($data_details->start_time) -  strtotime($data_details->end_time)) / 60)."</td><td>".$duehour."</td><td>".$extrahour."</td></tr>";
                    }

                }
            }

        }
        $total_duehour = $offer_letter && ($total_working_hour*60 - (abs($active_hours))) > 0 ? $this->mintoHour(abs($total_working_hour*60 - (abs($active_hours)))) : '-';

        $total_extrahour = $offer_letter && ($total_working_hour*60 - (abs($active_hours))) < 0 ? $this->mintoHour(abs($total_working_hour*60 - (abs($active_hours)))) : '-';

        echo json_encode(['table_data'=>$response_arr,'success'=>true,'total_working_hour'=> $total_working_hour,'total_active_hour'=>$this->mintoHour($active_hours),'total_due_hour'=>$total_duehour,'total_extra_hour'=>$total_extrahour]);
    }

    public function saveLocation(Request $request){
        session()->put('user_location', $request->location);
        return json_encode(['success'=>true]);
    }

    public function attendanceClone(Request $request){
        $user = User::where('job_status',Null)->orWhere('job_status','Approved')->get();
        foreach($user as $data){
            if($data->offer_datils){
                $day =  Carbon::now()->format('l');
                
                $offerDetails = json_decode($data->offer_datils);
                if($offerDetails->Days == "Monday to Friday"){
                  if($day != 'Saturday' && $day != 'Sunday'){
                    $status = 0;
                  }else{
                    $status = 2;
                  }
                }else{
                    if($day != 'Sunday'){
                        $status = 0;
                    }else{
                        $status = 2;
                    }
                }
                Attendance::insert([
                    "user_id"=> $data->id,
                    "attendance_date"=>date("Y-m-d"),
                    "status" => $status
                ]);
            }else{
				Attendance::insert([
                    "user_id"=> $data->id,
                    "attendance_date"=>date("Y-m-d"),
                    "status" => 0
                ]);
			}
        }
    }

    public function userAttendanceHistory(Request $request){
        $user = Attendance::where(["attendance_date"=>date("Y-m-d"),'user_id'=>$request->id])->get()->first();
        echo '<div class="form-group">
        <label for="fname" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start"><b>Date</b></label>
           <input type="text" id="attendance-date" class="border-0" value="'.$user->attendance_date.'" readOnly>
        </div><br>';
        foreach(json_decode($user->attendance_history) as $data){
            if($data->end_time){
                $endtime = date('H:i A',strtotime($data->end_time));
            }else{
                $endtime = ''; 
            }
            echo '<div class="d-flex mb-2" style="justify-content: space-between;">
            <div>
                <label for="login_time" class="w-100 block text-gray-700 text-sm font-bold text-start"><b>Login Time</b></label>
                    <input type="text" id="login_time" class="border-0" value="'.date('H:i A',strtotime($data->start_time)).'" readOnly>
                </div>';
                if($data->end_time){
                    echo '<div>
                    <label for="logout_time" class="w-100 block text-gray-700 text-sm font-bold text-start"><b>Logout Time</b></label>
                        <input type="text" id="logout_time" class="border-0" value="'.$endtime.'" readOnly>
                    </div>
                </div>';
                }else{
                    echo '<div>
                    <label for="logout_time" class="w-100 block text-gray-700 text-sm font-bold text-start"><b>Logout Time</b></label>
                        <input type="time" name="end_time" id="logout_time" class="" name="logout_time">
                    </div>
                </div>';
                }
                
        } 
    }

    public function updateUserActivity(){
        $status = User::select('login_status')->where(['id'=>Auth::id()])->first();
        if($status && $status->login_status == 0){
            session()->forget('startWorkTime');
            echo json_encode(array('success'=>false, 'message'=> "Session expire logout."));
            exit();
        } 
        Attendance::where(['user_id'=>Auth::id()])->update(['last_activity_time'=>date("Y-m-d H:i:s")]);
        echo json_encode(array('success'=>true));
        exit();
    }

    public function updateLoginStatus(){
        $userId = User::select('id')->where(['login_status'=>1])->get();
        foreach($userId as $UI){
            $attendance = Attendance::select('id','attendance_history','last_activity_time','working_hours')->where(['user_id'=>$UI->id])->orderBy('id','DESC')->first();
            $to = Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'));
            $from = Carbon::createFromFormat('Y-m-d H:i:s', $attendance->last_activity_time);
    
            $diffInMinutes = $to->diffInMinutes($from);
            if($diffInMinutes >= 3){ 
                $to = Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'));
                $from = "";
        
                $oldattendhis = json_decode($attendance->attendance_history);
                foreach($oldattendhis as $key=>$data){
                    if($data->end_time == ''){
                        $from = Carbon::createFromFormat('Y-m-d H:i:s', $data->start_time);
                        $oldattendhis[$key]->end_time = date('Y-m-d H:i:s');
                    }
                }
                $hourdiff = $to->diffInMinutes($from);
                Attendance::where(['id'=>$attendance->id])->update([
                    'attendance_history'=>json_encode($oldattendhis),
                    "working_hours"=>($attendance->working_hours+$hourdiff),
                    "is_cronjob_logout"=>1
                ]);
                User::where(array('id'=>$UI->id))->update(['login_status'=>0]);
            }
        } 
    }
} 
