<?php

use App\Models\AssignTask;
use App\Models\Student;


function all_assign_task($id){
    return AssignTask::where('employee_id',$id)->count();
}

function all_com_task($id){
return AssignTask::where('employee_id',$id)->where('task_status',1)->count();
}

function all_pen_task($id){
    return AssignTask::where('employee_id',$id)->where('task_status',0)->count();
}

function all_rej_task($id){
    return AssignTask::where('employee_id',$id)->where('task_status',2)->count();
}

function man_approved_task($id){
    return AssignTask::leftjoin('users','users.id','=','assign_task.employee_id')->where('users.role','Manager')->where('assign_task.assigner_id',$id)->where('assign_task.task_status',3)->count();
}

function man_pen_task($id){
    return AssignTask::leftjoin('users','users.id','=','assign_task.employee_id')->where('users.role','Manager')->where('assign_task.assigner_id',$id)->where('assign_task.task_status',0)->count();
}

function man_rej_task($id){
    return AssignTask::leftjoin('users','users.id','=','assign_task.employee_id')->where('users.role','Manager')->where('assign_task.assigner_id',$id)->where('assign_task.task_status',2)->count();
}

function teamleader_approved_task($id){
    return AssignTask::leftjoin('users','users.id','=','assign_task.employee_id')->where('users.role','Team Leader')->where('assign_task.assigner_id',$id)->where('assign_task.task_status',3)->count();
}

function teamleade_pen_task($id){
    return AssignTask::leftjoin('users','users.id','=','assign_task.employee_id')->where('users.role','Team Leader')->where('assign_task.assigner_id',$id)->where('assign_task.task_status',0)->count();
}

function teamleade_rej_task($id){
    return AssignTask::leftjoin('users','users.id','=','assign_task.employee_id')->where('users.role','Team Leader')->where('assign_task.assigner_id',$id)->where('assign_task.task_status',2)->count();
}

function emp_approved_task($id){
    return AssignTask::leftjoin('users','users.id','=','assign_task.employee_id')->where('users.role','Employee')->where('assign_task.assigner_id',$id)->where('assign_task.task_status',3)->count();
}

function emp_pen_task($id){
    return AssignTask::leftjoin('users','users.id','=','assign_task.employee_id')->where('users.role','Employee')->where('assign_task.assigner_id',$id)->where('assign_task.task_status',0)->count();
}

function emp_rej_task($id){
    return AssignTask::leftjoin('users','users.id','=','assign_task.employee_id')->where('users.role','Employee')->where('assign_task.assigner_id',$id)->where('assign_task.task_status',2)->count();
}

function sp_approved_task($id){
    return AssignTask::leftjoin('users','users.id','=','assign_task.assigner_id')->where('users.role','super_admin')->where('assign_task.assigner_id',$id)->where('assign_task.task_status',3)->count();
}

function sa_pen_task($id){
    return AssignTask::leftjoin('users','users.id','=','assign_task.assigner_id')->where('users.role','super_admin')->where('assign_task.assigner_id',$id)->where('assign_task.task_status',0)->count();
}

function sa_comp_task($id){
    return AssignTask::leftjoin('users','users.id','=','assign_task.assigner_id')->where('users.role','super_admin')->where('assign_task.assigner_id',$id)->where('assign_task.task_status',1)->count();
}

function sa_rej_task($id){
    return AssignTask::leftjoin('users','users.id','=','assign_task.assigner_id')->where('users.role','super_admin')->where('assign_task.assigner_id',$id)->where('assign_task.task_status',2)->count();
}

function sa_total_task($id){
    return AssignTask::leftjoin('users','users.id','=','assign_task.assigner_id')->where('users.role','super_admin')->where('assign_task.assigner_id',$id)->count();
}

function all_student(){
    return Student::count();
}

function student_2021(){
    return Student::where('year',2021)->count();
}

function student_2022(){
    return Student::where('year',2022)->count();
}

function student_2023(){
    return Student::where('year',2023)->count();
}

function student_2024(){
    return Student::where('year',2024)->count();
}

function student_2025(){
    return Student::where('year',2025)->count();
}

function admin_approved_task($id){
    return AssignTask::leftjoin('users','users.id','=','assign_task.employee_id')->where('users.role','Admin')->where('assign_task.assigner_id',$id)->where('assign_task.task_status',3)->count();
}

function admin_pen_task($id){
    return AssignTask::leftjoin('users','users.id','=','assign_task.employee_id')->where('users.role','Admin')->where('assign_task.assigner_id',$id)->where('assign_task.task_status',0)->count();
}

function admin_rej_task($id){
    return AssignTask::leftjoin('users','users.id','=','assign_task.employee_id')->where('users.role','Admin')->where('assign_task.assigner_id',$id)->where('assign_task.task_status',2)->count();
}
