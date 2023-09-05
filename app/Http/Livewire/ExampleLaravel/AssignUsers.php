<?php

namespace App\Http\Livewire\ExampleLaravel;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User_data;
use App\Models\Student;
use Illuminate\Http\Request;
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

        $user_admin = User::where('role','Admin')->where('assigned',Auth::user()->uuid)->where(function($query) {
            $query->where('job_status', Null)
                  ->orWhere('job_status','Approved');
        })->get();
        $user_manager = User::where('role','Manager')->where('assigned',Auth::user()->uuid)->where(function($query) {
            $query->where('job_status', Null)
                  ->orWhere('job_status','Approved');
        })->get();
        $user_teamlead = User::where('role','Team Leader')->where('assigned',Auth::user()->uuid)->where(function($query) {
            $query->where('job_status', Null)
                  ->orWhere('job_status','Approved');
        })->get();
        $user_employee = User::where('role','Employee')->where('assigned',Auth::user()->uuid)->where(function($query) {
            $query->where('job_status', Null)
                  ->orWhere('job_status','Approved');
        })->get();
        $user_data = User_data::where('user_id',Auth::id())->first();
        $assign = AssignTask::select('student_id')->get()->toArray();
        $students = Student::whereIn('id',$assign)->get();
        $admin = User::where('role','Admin')->where('assigned',Auth::user()->uuid)->where(function($query) {
            $query->where('job_status', Null)
                  ->orWhere('job_status','Approved');
        })->get();
        $manager = User::where('role','Manager')->where('assigned',Auth::user()->uuid)->where(function($query) {
            $query->where('job_status', Null)
                  ->orWhere('job_status','Approved');
        })->get();
        $team_leader = User::where('role','Team Leader')->where('assigned',Auth::user()->uuid)->where(function($query) {
            $query->where('job_status', Null)
                  ->orWhere('job_status','Approved');
        })->get();
        $employee = User::where('role','Employee')->where('assigned',Auth::user()->uuid)->where(function($query) {
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

    public function assignStudentList($status){
        $student = AssignTask::select('assign_task.id as task_id','assign_task.assigner_id','assign_task.employee_id','assign_task.student_id','assign_task.contacts_permission','assign_task.aadhar_permission','assign_task.application_permission','assign_task.bank_permission','assign_task.task_status','students.*','users.name')->leftjoin('students','students.id','=','assign_task.student_id')->leftjoin('users','users.id','=','assign_task.assigner_id')->where('assign_task.employee_id',Auth::id());
        $title = '';
        if($status == 'Completed'){
            $student = $student->where('assign_task.task_status',1);
            $title = 'TOTAL COMPLETED TASK';
        }
        if($status == 'Pending'){
            $student = $student->where('assign_task.task_status',0);
            $title = 'TOTAL PENDING TASK';
        }
        if($status == 'Rejected'){
            $student = $student->where('assign_task.task_status',2);
            $title = 'TOTAL REJECTED TASK';
        }

        if($status == 'all'){
            $title = 'TOTAL ASSIGN TASK';
        }
        
        $student = $student->get();

        $moduleType = 'deshboard-assigned';

        return view('livewire.example-laravel.assigntask.deshboard-userlist',compact('student','title','moduleType'));
    }

    public function assignRoleStudentList($status,$role){
        $student = AssignTask::select('assign_task.id as task_id','assign_task.assigner_id','assign_task.employee_id','assign_task.student_id','assign_task.contacts_permission','assign_task.aadhar_permission','assign_task.application_permission','assign_task.bank_permission','assign_task.assigner_task_status','students.*','users.name','users.role')->leftjoin('students','students.id','=','assign_task.student_id')->leftjoin('users','users.id','=','assign_task.employee_id')->where('assign_task.assigner_id',Auth::id());

        //echo '<pre>'; print_r($student->get()->toArray()); die();
        $title = '';
        if($status == 'all-pending'){
            $student = $student->where('assign_task.task_status',0)->where('assign_task.assigner_task_status',0);
            $title = ' Total Pending Task';
        }
        if($status == 'Rejected'){
            $student = $student->where('assign_task.task_status',0)->where('assign_task.assigner_task_status',2);
            $title =' Total Rejected Task';
        }
        if($status == 'waiting-approval'){
            $student = $student->where('assign_task.task_status',1)->where('assign_task.assigner_task_status',0);
            $title = ' Total Waiting for Approval Task';
        }
        if($status == 'Completed'){
            $student = $student->where('assign_task.assigner_task_status',1);
            $title = ' Total Completed Task';
        }
        
        $student = $student->get();
        foreach($student as $key=>$data){
            $student[$key]['name'] = Auth::user()->name;
        }
        $moduleType = 'assigntask-assigner';
        return view('livewire.example-laravel.assigntask.deshboard-userlist',compact('student','title','moduleType'));
    }

    public function assignSuperAdminStudentList($status){ 
        $student = AssignTask::select('assign_task.id as task_id','assign_task.assigner_id','assign_task.employee_id','assign_task.student_id','assign_task.contacts_permission','assign_task.aadhar_permission','assign_task.application_permission','assign_task.bank_permission','assign_task.task_status','students.*','users.name')->leftjoin('students','students.id','=','assign_task.student_id')->leftjoin('users','users.id','=','assign_task.employee_id')->where('assign_task.assigner_id',Auth::id());
        $title = '';
        if($status == 'Completed'){
            $student = $student->where('assign_task.task_status',1);
            $title = 'TOTAL COMPLETED TASK';
        }
        if($status == 'Pending'){
            $student = $student->where('assign_task.task_status',0);
            $title = 'TOTAL PENDING TASK';
        }
        if($status == 'Rejected'){
            $student = $student->where('assign_task.task_status',2);
            $title = 'TOTAL REJECTED TASK';
        }
        if($status == 'Approved'){
            $student = $student->where('assign_task.task_status',3);
            $title = 'TOTAL APPROVED TASK';
        }

        if($status == 'all'){
            $title = 'TOTAL ASSIGN TASK';
        }
        
        $student = $student->get();
        $moduleType = 'assigntask-assigner';
        return view('livewire.example-laravel.assigntask.deshboard-userlist',compact('student','title','moduleType'));
    }

    public function assignStudentView($id){
        //$student = Student::where('id',$id)->first();
        $student = Student::select('assign_task.id as task_id','assign_task.employee_id','assign_task.student_id','assign_task.contacts_permission','assign_task.aadhar_permission','assign_task.application_permission','assign_task.bank_permission','assign_task.task_status','students.*')->leftjoin('assign_task','assign_task.student_id','=','students.id')->where('students.id',$id)->first();
        //echo $assign_role; die();
        return view('livewire.example-laravel.assigntask.deshboard-student-view',compact('student'));
    }

    public function updateTaskStatus(Request $request){
        if($request->user_task_status == 'assign-complete'){
            $data = [
                'task_status' => 3,
                'assigner_task_status' => 1
            ];
        }elseif($request->user_task_status == 'assign-reject'){
            $data = [
                'task_status' => 0,
                'assigner_task_status' => 2
            ];
        }elseif($request->user_task_status == 'employee-complete'){
            $data = [
                'task_status' => 1,
                'assigner_task_status' => 0
            ];
        }else{
            $data = [
                'task_status' => 0,
                'assigner_task_status' => 0
            ];
        }

        //echo '<pre>'; print_r($request->all()); die();

        $ids = explode(',',$request->student_id);
        foreach($ids as $id){
            AssignTask::where('student_id',$id)->update($data);
        }
       //die();
        return redirect('/dashboard')->with('status', 'Task Status Updated Sucessfully');
    }
}
