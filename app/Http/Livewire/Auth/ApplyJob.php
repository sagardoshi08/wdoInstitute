<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Validation\ValidationException;
use Livewire\Component;
use App\Models\User;
use App\Models\States;
use App\Models\RoleStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ApplyJob extends Component
{

    // public $email='';
    // public $password='';
    // public $role='';

    // protected $rules= [
    //     'email' => 'required|email',
    //     'password' => 'required',
    //     'role' => 'required'

    // ];

    public function view()
    {
        $state = States::get();
        return view('livewire.applyjob',compact('state'));
    }

    // public function mount() {
    //     $this->fill(['email' => 'admin@material.com', 'password' => 'secret']);
    // }

    // public function store(Request $request)
    // {
    //     $role = $request->role;
    //         $role = 'Super Admin';
    //         if(auth()->attempt(array('email' => $request->email, 'password' => $request->password, 'role' => $request->role))){
    //             session()->regenerate();
    //             User::where('id',Auth::id())->update(['login_status'=>1]);
    //             return redirect('/dashboard')->with('status', $role.' Login Successfully!');
    //         }else{
    //             throw ValidationException::withMessages([
    //                 'email' => 'Your provided credentials could not be verified.'
    //             ]);
    //             return redirect('/');
    //         }

    // }

    // public function staffview()
    // {
    //     return view('livewire.auth.stafflogin');
    // }

    // public function officerview()
    // {
    //     return view('livewire.auth.officerlogin');
    // }

    public function job_email_validation(Request $request){
        if ($request->input('email')) {
            if($request->input('id')){
                $count = User::where('email',$request->email)->where('id','!=',$request->input('id'))->count();
            }else{
                $count = User::where('email',$request->email)->count();
            }
            if ($count == '0') {
                die('true');
            }else{
                die('false');
            }
        }
    }
}
