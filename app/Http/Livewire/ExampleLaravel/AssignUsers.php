<?php

namespace App\Http\Livewire\ExampleLaravel;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User_data;
use App\Models\Student;
use App\Models\AssignTask;
use Livewire\WithFileUploads;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Auth ;


class AssignUsers extends Component
{

    public function render()
    {

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
        $user_data = User_data::where('user_id',Auth::id())->first();
        $assign = AssignTask::select('student_id')->get()->toArray();
        $students = Student::whereIn('id',$assign)->get();
        $admin = User::where('role','Admin')->where(function($query) {
            $query->where('job_status', Null)
                  ->orWhere('job_status','Approved');
        })->get();
        $manager = User::where('role','Manager')->where(function($query) {
            $query->where('job_status', Null)
                  ->orWhere('job_status','Approved');
        })->get();
        $team_leader = User::where('role','Team Leader')->where(function($query) {
            $query->where('job_status', Null)
                  ->orWhere('job_status','Approved');
        })->get();
        $employee = User::where('role','Employee')->where(function($query) {
            $query->where('job_status', Null)
                  ->orWhere('job_status','Approved');
        })->get();

        return view(
            'livewire.example-laravel.assign-taskmanagement',
            [
                'user_admin' => $user_admin,
                'user_manager' => $user_manager,
                'user_teamlead' => $user_teamlead,
                'user_employee' => $user_employee,
                'user_data' =>$user_data,
                'students' => $students,
                'admin' => $admin,
                'manager' => $manager,
                'team_laeder' => $team_leader,
                'employee' => $employee
            ]
        );
    }

    public function assignStudentList(){
        $student = AssignTask::select('assign_task.employee_id','assign_task.student_id','assign_task.contacts_permission','assign_task.aadhar_permission','assign_task.application_permission','assign_task.bank_permission','assign_task.complited_task','assign_task.panding_task','assign_task.rejected_task','students.*')->leftjoin('students','students.id','=','assign_task.student_id')->where('assign_task.employee_id',Auth::id())->get();

        //echo '<pre>'; print_r($student); die();

        return view('livewire.example-laravel.assigntask.deshboard-userlist',compact('student'));
    }

    public function assignStudentView($id){
        //$student = Student::where('id',$id)->first();
        $student = Student::select('assign_task.employee_id','assign_task.student_id','assign_task.contacts_permission','assign_task.aadhar_permission','assign_task.application_permission','assign_task.bank_permission','assign_task.complited_task','assign_task.panding_task','assign_task.rejected_task','students.*')->leftjoin('assign_task','assign_task.student_id','=','students.id')->where('students.id',$id)->first();
        return view('livewire.example-laravel.assigntask.deshboard-student-view',compact('student'));
    }
}
