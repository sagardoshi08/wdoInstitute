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

        return view('livewire.example-laravel.assigntask.deshboard-userlist',compact('student','title'));
    }

    public function assignRoleStudentList($status,$role){
        $student = AssignTask::select('assign_task.id as task_id','assign_task.assigner_id','assign_task.employee_id','assign_task.student_id','assign_task.contacts_permission','assign_task.aadhar_permission','assign_task.application_permission','assign_task.bank_permission','assign_task.task_status','students.*','users.name','users.role')->leftjoin('students','students.id','=','assign_task.student_id')->leftjoin('users','users.id','=','assign_task.employee_id')->where('users.role',$role)->where('assign_task.assigner_id',Auth::id());

        //echo '<pre>'; print_r($student->get()->toArray()); die();
        $title = '';
        if($status == 'Approved'){
            $student = $student->where('assign_task.task_status',3);
            $title = $role.' Total Approved Task';
        }
        if($status == 'Pending'){
            $student = $student->where('assign_task.task_status',0);
            $title = $role.' Total Pending Task';
        }
        if($status == 'Rejected'){
            $student = $student->where('assign_task.task_status',2);
            $title = $role.' Total Rejected Task';
        }

        if($status == 'all'){
            $title = 'TOTAL ASSIGN TASK';
        }

        $student = $student->get();
        foreach($student as $key=>$data){
            $student[$key]['name'] = Auth::user()->name;
        }

        return view('livewire.example-laravel.assigntask.deshboard-userlist',compact('student','title'));
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

        return view('livewire.example-laravel.assigntask.deshboard-userlist',compact('student','title'));
    }

    public function assignStudentView($id,$taskid){
        //$student = Student::where('id',$id)->first();
        $student = Student::select('assign_task.id as task_id','assign_task.employee_id','assign_task.student_id','assign_task.contacts_permission','assign_task.aadhar_permission','assign_task.application_permission','assign_task.bank_permission','assign_task.task_status','students.*')->leftjoin('assign_task','assign_task.student_id','=','students.id')->where('students.id',$id)->first();
        if(AssignTask::where('id',$taskid)->where('assigner_id',Auth::id())->count() == 0){
            $assign_role = 'Assignee';
        }else{
            $assign_role = 'Assinger';
        }
        //echo $assign_role; die();
        return view('livewire.example-laravel.assigntask.deshboard-student-view',compact('student','assign_role'));
    }

    public function updateTaskStatus(Request $request){
        AssignTask::where('id',$request->taskid)->where('student_id',$request->student_id)->update([
            'task_status' => $request->status
        ]);
        return redirect('/dashboard')->with('status', 'Task Status Updated Sucessfully');
    }
}
