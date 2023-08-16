<?php

use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Logout;
use App\Http\Livewire\Auth\ResetPassword;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\ExampleLaravel\UserManagement;
use App\Http\Livewire\ExampleLaravel\UserProfile;
use App\Http\Livewire\College\CollegeDetail;
use App\Http\Livewire\Student\StudentDetail;
use App\Http\Livewire\Bank\BankDetail;
use App\Http\Livewire\ExampleLaravel\AdminManagement;
use App\Http\Livewire\ExampleLaravel\ManagerManagement;
use App\Http\Livewire\ExampleLaravel\TeamleaderManagement;
use App\Http\Livewire\ExampleLaravel\EmployeeManagement;
use App\Http\Livewire\ExampleLaravel\User2Management;
use App\Http\Livewire\ExampleLaravel\EditManagement;
use App\Http\Livewire\ExampleLaravel\EditProfile;
use App\Http\Livewire\ExampleLaravel\EditController;
use App\Http\Livewire\ExampleLaravel\AssignUsers;
use App\Http\Livewire\ExampleLaravel\AdminTask;
use App\Http\Livewire\ExampleLaravel\ManagerTask;
use App\Http\Livewire\ExampleLaravel\TeamleaderTask;
use App\Http\Livewire\ExampleLaravel\EmployeeTask;
use App\Http\Livewire\ExampleLaravel\AdminDashboard;
use App\Http\Livewire\ExampleLaravel\ViewUser;
use App\Http\Livewire\Student\StudentCreate;
use App\Http\Livewire\Auth\SuperAdmin;
use App\Http\Livewire\Auth\ApplyJob;
use App\Http\Controllers\PDFController;
use App\Http\Livewire\ExampleLaravel\UserAttendence;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('fill-data-pdf', [PDFController::class,'index']);
Route::get('/', [Login::class, 'view'])->name('landingPage');
Route::get('forgot-password', ForgotPassword::class)->middleware('guest')->name('password.forgot');
Route::get('reset-password/{id}', ResetPassword::class)->middleware('signed')->name('reset-password');
Route::get('sign-in', Login::class)->middleware('guest')->name('login');
Route::get('super-admin', [SuperAdmin::class, 'view'])->middleware('guest')->name('Admin');
Route::get('staff-login', [SuperAdmin::class, 'staffview'])->middleware('guest')->name('stafflogin');
Route::get('officer-login', [SuperAdmin::class, 'officerview'])->middleware('guest')->name('officerlogin');
Route::get('about-us', [Login::class, 'aboutus'])->name('About-us');
Route::get('mission', [Login::class, 'missionview'])->name('Mission');
Route::get('privacy-police', [Login::class, 'privacypolice'])->name('Privacy-Police');
Route::get('terma-conditions', [Login::class, 'termaconditions'])->name('Terma-Conditions');
Route::get('documentation', [Login::class, 'documentation'])->name('Documentation');
// Route::get('about-us', Login::class)->name('About-us');
Route::post('store', [SuperAdmin::class, 'store'])->name('loginprocess');
Route::post('save-location', [UserAttendence::class, 'saveLocation'])->name('save-location');
// Route::get('sign-up', Register::class)->middleware('guest')->name('register');

Route::get('apply-job', [ApplyJob::class, 'view'])->name('Apply-job');
Route::post('apply-job-create', [UserManagement::class, 'applyJobCreate'])->name('applyJobCreate');
Route::post('job-email-validation', [ApplyJob::class, 'job_email_validation'])->name('JobEmailValidation');
Route::get('attendance-clone', [UserAttendence::class,'attendanceClone'])->name('attendanceClone');

Route::group(['middleware' => 'auth'], function () {
Route::get('dashboard', Dashboard::class)->name('dashboard');
Route::get('profile', UserProfile::class)->name('profile');
Route::get('user-management', UserManagement::class)->name('user-management');
Route::get('banks', BankDetail::class)->name('Bank Detail');
Route::get('export', [UserManagement::class ,'export'])->name('export');
Route::get('all-active-admin', AdminManagement::class)->name('admin-management');
Route::get('all-active-manager', ManagerManagement::class)->name('manager-management');
Route::get('all-active-teamleader', TeamleaderManagement::class)->name('teamleader-management');
Route::get('all-active-emoloyee', EmployeeManagement::class)->name('emoloyee-management');
Route::get('all-active-users', User2Management::class)->name('user2-management');

Route::get('attendance', UserAttendence::class)->name('attendance');
Route::get('login-logout-log/{id}', [UserAttendence::class,'viewLoginLogoutHistory'])->name('login-logout-log');
Route::post('filter-attend-history', [UserAttendence::class,'filterAttendanceHistory'])->name('filterAttendanceHistory');

Route::post('change-user-login', [Login::class,'changeUserLogin'])->name('changeUserLogin');

Route::get('edit-management', [EditManagement::class,'show'])->name('edit-management');
Route::post('role-status', [UserManagement::class, 'roleStatus'])->name('roleStatus');
Route::post('user-status', [UserManagement::class, 'userStatus'])->name('userStatus');
Route::post('user-create', [UserManagement::class, 'createuser'])->name('createUser');
Route::get('edit-profile',[EditProfile::class,'show'])->name('edit-profile');
Route::get('edit-user/{id}', [EditController::class, 'index'])->name('edituser');
Route::post('user-update', [EditController::class, 'updateuser'])->name('updateUser');
Route::post('email-validation', [EditController::class, 'email_validation'])->name('EmailValidation');
Route::get('assign-task', AssignUsers::class)->name('assign-task');
// Route::get('admin-task', AdminTask::class)->name('admin-task');
// Route::get('manager-task', ManagerTask::class)->name('manager-task');
// Route::get('teamleader-task', TeamleaderTask::class)->name('teamleader-task');
// Route::get('employee-task', EmployeeTask::class)->name('employee-task');
Route::get('students-details/{id}', [AdminTask::class, 'students'])->name('students');
Route::post('edit-profile', [EditProfile::class, 'updateprofile'])->name('updateProfile');
Route::get('admindashboard', AdminDashboard::class)->name('admindashboard');
Route::post('create-assigntask', [AdminTask::class, 'assigntask'])->name('createAssignTask');
Route::get('logout', [Logout::class, 'destroy'])->name('Logout');
Route::get('attendence-logout', [Logout::class, 'attendence_destroy'])->name('attendence-logout');
// Route::get('edit-profile/{id}', [EditProfile::class, 'index'])->name('editrofile');
Route::post('assign-studentid', [AdminTask::class, 'getassignstudentid'])->name('getAssignStudentId');
Route::get('viewuser/{id}', [ViewUser::class, 'viewuser'])->name('viewuser');
Route::get('viewuser', [EditProfile::class, 'viewProfile'])->name('viewProfile');
Route::post('remove-task', [AdminTask::class, 'removetask'])->name('removeTask');
Route::post('get-reassign-user', [AdminTask::class, 'getreassigneuser'])->name('getReassigneUser');
Route::post('change-permisssion', [AdminTask::class, 'change_permission'])->name('changePermission');
Route::post('update-reassigntask', [AdminTask::class, 'update_reassign_task'])->name('updateReassignTask');
Route::post('delete-user', [UserManagement::class, 'userDelete'])->name('deleteUser');
// Route::get('add', StudentCreate::class)->name('add');

//student
Route::get('students', StudentDetail::class)->name('Student Detail');
Route::get('student-create', StudentCreate::class)->name('add');
Route::get('student_export', [StudentDetail::class ,'export'])->name('student_export');
Route::post('student-store', [StudentCreate::class, 'store'])->name('studentStore');
Route::get('student-edit/{id}', [StudentCreate::class ,'editnew'])->name('studentEdit');
Route::post('student-update', [StudentCreate::class, 'update'])->name('studentUpdate');
Route::post('get-branchname', [StudentCreate::class, 'getBranchName'])->name('getBranchName');
Route::post('get-coursename', [StudentCreate::class, 'getCourseName'])->name('getCourseName');
Route::post('get-ifsccode', [StudentCreate::class, 'getIfscode'])->name('getIfscCode');
Route::post('get-courseyear', [StudentCreate::class, 'getCourseYear'])->name('getCourseYear');
Route::post('delete-student', [StudentCreate::class, 'deletestudent'])->name('deletestudent');


//college
Route::get('colleges', CollegeDetail::class)->name('college');
Route::post('colleges/store', [CollegeDetail::class ,'store'])->name('collegeStore');
Route::get('colleges-create', [CollegeDetail::class,'createCollege'])->name('collegeCreate');
Route::get('colleges-edit/{id}', [CollegeDetail::class,'edit'])->name('collegeEdit');

//User
Route::get('all-user', [EditController::class,'allUser'])->name('user.allUser');
Route::get('all-active-user', [EditController::class,'allActiveuser'])->name('all-active-user');
Route::get('pending-user', [EditController::class,'allpendingUser'])->name('user.allpendingUser');
Route::get('reject-user', [EditController::class,'allrejectUser'])->name('user.allrejectUser');
Route::get('defect-user', [EditController::class,'alldefectUser'])->name('user.alldefectUser');
Route::post('change-job-status', [EditController::class ,'jobStatusChange'])->name('jobStatusChange');
Route::post('change-job-defect', [EditController::class ,'jobStatusDefect'])->name('jobStatusDefect');
Route::post('send-offer-letter', [EditController::class ,'sendOfferLetter'])->name('sendOfferLetter');
Route::post('mail-offer-letter', [EditController::class ,'mailOfferLetter'])->name('mailOfferLetter');

Route::get('all-pending-user', [EditController::class,'pendingUserData'])->name('user.allPendingUserData');
Route::get('admin-pending-user', [EditController::class,'pendingadminData'])->name('user.allPendingadminData');
Route::get('manager-pending-user', [EditController::class,'pendingmanagerData'])->name('user.allPendingmanagerData');
Route::get('teamleader-pending-user', [EditController::class,'pendingteamleaderData'])->name('user.allPendingteamleaderData');
Route::get('employee-pending-user', [EditController::class,'pendingemployeeData'])->name('user.allPendingemployeeData');

Route::get('all-reject-user', [EditController::class,'rejectUserData'])->name('user.allrejectUserData');
Route::get('admin-reject-user', [EditController::class,'rejectadminData'])->name('user.allrejectadminData');
Route::get('manager-reject-user', [EditController::class,'rejectmanagerData'])->name('user.allrejectmanagerData');
Route::get('teamleader-reject-user', [EditController::class,'rejectteamleaderData'])->name('user.allrejectteamleaderData');
Route::get('employee-reject-user', [EditController::class,'rejectemployeeData'])->name('user.allrejectemployeeData');


Route::get('all-defect-user', [EditController::class,'defectUserData'])->name('user.alldefectUserData');
Route::get('admin-defect-user', [EditController::class,'defectadminData'])->name('user.alldefectadminData');
Route::get('manager-defect-user', [EditController::class,'defectmanagerData'])->name('user.alldefectmanagerData');
Route::get('teamleader-defect-user', [EditController::class,'defectteamleaderData'])->name('user.alldefectteamleaderData');
Route::get('employee-defect-user', [EditController::class,'defectemployeeData'])->name('user.alldefectemployeeData');
});
