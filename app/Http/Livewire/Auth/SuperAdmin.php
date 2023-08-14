<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Validation\ValidationException;
use Livewire\Component;
use App\Models\User;
use App\Models\RoleStatus;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SuperAdmin extends Component
{

    public $email='';
    public $password='';
    public $role='';

    protected $rules= [
        'email' => 'required|email',
        'password' => 'required',
        'role' => 'required'

    ];

    public function view()
    {
        return view('livewire.auth.superadminlogine');
    }

    public function mount() {
        $this->fill(['email' => 'admin@material.com', 'password' => 'secret']);
    }

    public function store(Request $request)
    {
        $role = $request->rLogin;
        $user_data = User::select('role','status','login_status')->where('email', $request->email)->first();
        if($user_data->login_status == 1){
            throw ValidationException::withMessages([
                'role' => 'You are already logged in.'
            ]);
            return redirect('/');
        }
        if($user_data->status == 0){
            // $role = 'Super Admin';
            if(auth()->attempt(array('email' => $request->email, 'password' => $request->password, 'role' => $role))){
                session()->regenerate();
                User::where('id',Auth::id())->update(['login_status'=>1]);
                session()->put('startWorkTime', date("Y-m-d H:i:s"));
                $workedminutes = '';
                $Attendance = Attendance::where(["user_id"=> Auth::id(),"attendance_date"=>date("Y-m-d")]);
                if($Attendance->count()){
                    $workedminutes = $Attendance->first()->working_hours;
                }else{
                    $workedminutes = 0;
                }
                session()->put('workedminutes',$workedminutes);
                Attendance::where(["user_id"=> Auth::id(),"attendance_date"=>date("Y-m-d")])->update([
                    "status" => 1
                ]); 
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

    public function staffview()
    {
        return view('livewire.auth.stafflogin');
    }

    public function officerview()
    {
        return view('livewire.auth.officerlogin');
    }
}
