<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Validation\ValidationException;
use Livewire\Component;
use App\Models\User;
use App\Models\Attendance;
use App\Models\RoleStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Corcel\Model\Post;

class Login extends Component
{

    public $email='';
    public $password='';
    public $role='';

    protected $rules= [
        'email' => 'required|email',
        'password' => 'required',
        'role' => 'required'

    ];

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function mount() {
        $this->fill(['email' => 'admin@material.com', 'password' => 'secret']);
    }

    public function store()
    {
        $role = $this->role;
        if ($role == 'super_admin') {
            $role = 'Super Admin';
            $attributes = $this->validate();
            $user_data = User::select('role','status','login_status')->where('email', $this->email)->first();
            if($user_data->login_status == 1){
                throw ValidationException::withMessages([
                    'role' => 'You are already logged in.'
                ]);
                return redirect('/');
            }
            if(auth()->attempt(array('email' => $this->email, 'password' => $this->password, 'role' => $this->role))){
                session()->regenerate();
                User::where('id',Auth::id())->update(['login_status'=>1]);
                // if(Auth::user()->role != "Admin" && Auth::user()->role != "super_admin" ){
                    session()->put('startWorkTime', date("Y-m-d H:i:s"));
                // }
				if(session()->has('startWorkTime')){
                            
                    $startworking = session()->get('startWorkTime');
                    //echo $startworking;
                    $endworking = date("Y-m-d H:i:s");
                    //echo $endworking; die();
                    // $hourdiff = (strtotime($endworking) - strtotime($startworking))/(60*60);
                    // $hourdiff = ceil($hourdiff/60/60/60);
                    $hourscount = Attendance::where(["user_id"=> Auth::id(),"attendance_date"=>date("Y-m-d")]);
                    $oldattendhis = [];
    
                    $startworkinghis = [];
                    $startworkinghis['start_time'] = $startworking;
                    $startworkinghis['end_time'] = '';
                    $startworkinghis['autologout'] = '';
                    $startworkinghis['location'] = session()->has('user_location') ? session()->get('user_location') : '';
                    if($hourscount->count()){
                        $hourscount = $hourscount->first()->working_hours;
                        $joson_data= Attendance::where(["user_id"=> Auth::id(),"attendance_date"=>date("Y-m-d")])->first()->attendance_history;
                        if(isset($joson_data) && $joson_data != null){
                            $oldattendhis = json_decode($joson_data);
                        }
                       array_push($oldattendhis, $startworkinghis);
    
                        Attendance::where(["user_id"=> Auth::id(),"attendance_date"=>date("Y-m-d")])->update([
                            "location"=>session()->has('user_location') ? session()->get('user_location') : '',
                            "attendance_history"=>json_encode($oldattendhis),
                            "status" => 1
                        ]);
                    }else{
                        array_push($oldattendhis, $startworkinghis);
    
                        Attendance::insert([
                            "user_id"=> Auth::id(),
                            "attendance_date"=>date("Y-m-d"),
                            "location"=>session()->has('user_location') ? session()->get('user_location') : '',
                            "attendance_history"=>json_encode($oldattendhis),
                            "status" => 1
                        ]);
                    }
                }
                return redirect('/dashboard')->with('status', $role.' Login Successfully!');
            }else{
                throw ValidationException::withMessages([
                    'email' => 'Your provided credentials could not be verified.'
                ]);
                return redirect('/');
            }
        }else{
            $user_data = User::select('role','status','login_status')->where('email', $this->email)->first();
            if($user_data->login_status == 1){
                throw ValidationException::withMessages([
                    'role' => 'You are already logged in.'
                ]);
                return redirect('/');
            }
            /* location validation code */
            // if(!session()->has('user_location')){
            //     throw ValidationException::withMessages([
            //         'role' => 'Please enable location option from browser'
            //     ]);
            //     return redirect('/');
            // }
            if($user_data->status == 0){
                $attributes = $this->validate();
                if(auth()->attempt(array('email' => $this->email, 'password' => $this->password, 'role' => $this->role))){
                    session()->regenerate();
                    User::where('id',Auth::id())->update(['login_status'=>1]);
                    // if(Auth::user()->role != "Admin" && Auth::user()->role != "super_admin" ){
                        session()->put('startWorkTime', date("Y-m-d H:i:s"));
                        $workedminutes = '';
                        $Attendance = Attendance::where(["user_id"=> Auth::id(),"attendance_date"=>date("Y-m-d")]);
                        if($Attendance->count()){
                            $workedminutes = $Attendance->first()->working_hours;
                        }else{
                            $workedminutes = 0;
                        }
                        session()->put('workedminutes',$workedminutes);
                        if(session()->has('startWorkTime')){
                            
                        $startworking = session()->get('startWorkTime');
                        //echo $startworking;
                        $endworking = date("Y-m-d H:i:s");
                        //echo $endworking; die();
                        // $hourdiff = (strtotime($endworking) - strtotime($startworking))/(60*60);
                        // $hourdiff = ceil($hourdiff/60/60/60);
                        $hourscount = Attendance::where(["user_id"=> Auth::id(),"attendance_date"=>date("Y-m-d")]);
                        $oldattendhis = [];
        
                        $startworkinghis = [];
                        $startworkinghis['start_time'] = $startworking;
                        $startworkinghis['end_time'] = '';
                        $startworkinghis['autologout'] = '';
                        $startworkinghis['location'] = session()->has('user_location') ? session()->get('user_location') : '';
                        if($hourscount->count()){
                            $hourscount = $hourscount->first()->working_hours;
                            $joson_data= Attendance::where(["user_id"=> Auth::id(),"attendance_date"=>date("Y-m-d")])->first()->attendance_history;
                            if(isset($joson_data) && $joson_data != null){
                                $oldattendhis = json_decode($joson_data);
                            }
                           array_push($oldattendhis, $startworkinghis);
        
                            Attendance::where(["user_id"=> Auth::id(),"attendance_date"=>date("Y-m-d")])->update([
                                "location"=>session()->has('user_location') ? session()->get('user_location') : '',
                                "attendance_history"=>json_encode($oldattendhis),
                                "status" => 1
                            ]);
                        }else{
                            array_push($oldattendhis, $startworkinghis);
        
                            Attendance::insert([
                                "user_id"=> Auth::id(),
                                "attendance_date"=>date("Y-m-d"),
                                "location"=>session()->has('user_location') ? session()->get('user_location') : '',
                                "attendance_history"=>json_encode($oldattendhis),
                                "status" => 1
                            ]);
                        }
                    }
                    // }
                    // if($this->role != 'Admin' && $this->role != 'super_admin'&& $this->location !== '')
                    /* if($this->location !== '')
                    {
                        session()->put('user_location', $this->location);
                    } */
                    return redirect('/dashboard')->with('status', $role.' Login Successfully!');
                }else{
                    throw ValidationException::withMessages([
                        'email' => 'Your provided credentials could not be verified.'
                    ]);
                    return redirect('/');
                }
            }else{
                throw ValidationException::withMessages([
                    'role' => 'Your account is not active.'
                ]);
                return redirect('/');
            }
        }
    }

    public function view()
    {
        return view('livewire.landing-page');
    }

    public function admin()
    {
        return view('livewire.auth.superadminlogine');
    }

    public function aboutus()
    {
        return view('livewire.about-us');
    }

    public function missionview()
    {
        return view('livewire.mission');
    }

    public function privacypolice()
    {
        return view('livewire.privacy-police');
    }

    public function termaconditions()
    {
        return view('livewire.terma-conditions');
    }

    public function documentation()
    {
        return view('livewire.documentation');
    }

    public function timer()
    {
        return view('livewire.timer');
    }

    public function changeUserLogin(Request $request){
        //echo '<pre>'; print_r($request->all());
        $user = User::find($request->id);
        if(isset($user)){
            $previous_user = session()->put('previousUser',Auth::id());
            Auth::login($user);
            $request->session()->regenerate();
            //user is logged in.
        }
    }

}
