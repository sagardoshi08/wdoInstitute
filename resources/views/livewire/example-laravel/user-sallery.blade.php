@include('components.include.header')

<nav class="dash-btn">
    <div class="nav nav-tabs mb-3 accordion-item" id="nav-tab" role="tablist">
       @if(auth()->user()->role == 'super_admin')
       <button class="nav-link active nav-button admin-btn-tab" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-basic" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
        <span>All Users</span>
        <bdi>{{DB::table('users')->where('role','super_admin')->where('job_status',Null)->orWhere('job_status','Approved')->count()}}</bdi>
        </button>
       <button class="nav-link active nav-button admin-btn-tab" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-basic" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
       <span>Admin</span>
       <bdi>{{DB::table('users')->where('role','Admin')->where('job_status',Null)->orWhere('job_status','Approved')->count()}}</bdi>
       </button>
       @endif
       @if(auth()->user()->role == 'super_admin' || auth()->user()->role == 'Admin')
       <button class="nav-link active nav-button manager-btn-tab" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-college" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
       <span> Manager</span>
       <bdi>{{DB::table('users')->where('role','Manager')->where('job_status',Null)->orWhere('job_status','Approved')->count()}}</bdi>
       </button>
       @endif
       @if(auth()->user()->role == 'super_admin' || auth()->user()->role == 'Admin' || auth()->user()->role == 'Manager')
       <button class="nav-link active nav-button teamlead-btn-tab" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-nsp" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
       <span> Team Leader</span>
       <bdi>{{DB::table('users')->where('role','Team Leader')->where('job_status',Null)->orWhere('job_status','Approved')->count()}}</bdi>
       </button>
       @endif
       @if(auth()->user()->role == 'super_admin' || auth()->user()->role == 'Admin' || auth()->user()->role == 'Manager' || auth()->user()->role == 'Team Leader')
       <button class="nav-link active nav-button employee-btn-tab" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-bank" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
       <span> Employee</span>
       <bdi>{{DB::table('users')->where('role','Employee')->where('job_status',Null)->orWhere('job_status','Approved')->count()}}</bdi>
       </button>
       @endif
    </div>
 </nav>

@include('components.include.footer')
