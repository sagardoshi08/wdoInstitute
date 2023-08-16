@include('components.include.header')
<style>
    p.users {
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: #344767;
        font-size: 20px;
    }
</style>
<!--All Pending User -->
<div class="main-active">
    <p class="users">All Reject Users</p>
</div>
 <div class="main-dashboard">
    <div class="main-dashboard-inner ">
        <div class=" shadow-no" id="dashboard-cards">
            <nav class="abcdefg">
                <div class="nav nav-tabs mb-3 accordion-item" id="nav-tab" role="tablist">
                    @if(auth()->user()->role == 'super_admin')
                    <a class="nav-link active nav-button"  href="{{ route('user.allrejectUserData')}}" id="nav-home-tab" data-bs-target="#nav-basic" aria-controls="nav-home">
                            <div>
                                <span> All Users</span>
                                <bdi>{{DB::table('users')->where('role','!=','super_admin')->where('job_status','Reject')->count()}}</bdi>
                            </div>
                            <label class="switch">
                                <input role="all_user" type="checkbox" {{$role_status->all_user == 0 ? 'checked' : 'Reject'}} value="{{$role_status->all_user}}" class="all_user">
                                <span class="slider round"></span>
                            </label>
                    </a>
                    <a class="nav-link active nav-button"  href="{{ route('user.allrejectadminData')}}" id="nav-home-tab" data-bs-target="#nav-basic" aria-controls="nav-home">
                            <div>
                                <span> Admin</span>
                                <bdi>{{DB::table('users')->where('role','Admin')->where('job_status','Reject')->count()}}</bdi>
                            </div>
                            <label class="switch">
                                <input role="Admin" type="checkbox" {{$role_status->Admin == 0 ? 'checked' : ''}} value="{{$role_status->Admin}}" class="admin">
                                <span class="slider round"></span>
                            </label>
                    </a>
                    @endif
                     @if(auth()->user()->role == 'super_admin' || auth()->user()->role == 'Admin')
                    <a class="nav-link active nav-button"  href="{{ route('user.allrejectmanagerData')}}" id="nav-home-tab" data-bs-target="#nav-basic" aria-controls="nav-home">
                            <div>
                                <span> Manager</span>
                                <bdi>{{DB::table('users')->where('role','Manager')->where('job_status','Reject')->count()}}</bdi>
                            </div>
                            <label class="switch">
                                <input role="Manager" type="checkbox" {{$role_status->Manager == 0 ? 'checked' : ''}} value="{{$role_status->Manager}}" class="manager">
                                <span class="slider round"></span>
                            </label>
                    </a>
                    @endif
                     @if(auth()->user()->role == 'super_admin' || auth()->user()->role == 'Admin' || auth()->user()->role == 'Manager')
                    <a class="nav-link active nav-button"  href="{{ route('user.allrejectteamleaderData')}}" id="nav-home-tab" data-bs-target="#nav-basic" aria-controls="nav-home">
                            <div>
                                <span> Team Leader</span>
                                <bdi>{{DB::table('users')->where('role','Team Leader')->where('job_status','Reject')->count()}}</bdi>
                            </div>
                            <label class="switch">
                                <input role="Team_Leader" type="checkbox" {{$role_status->Team_Leader == 0 ? 'checked' : ''}} value="{{$role_status->Team_Leader}}" class="teamleader">
                                <span class="slider round"></span>
                            </label>
                    </a>
                    @endif
                    @if(auth()->user()->role == 'super_admin' || auth()->user()->role == 'Admin' || auth()->user()->role == 'Manager' || auth()->user()->role == 'Team Leader')
                    <a class="nav-link active nav-button"  href="{{ route('user.allrejectemployeeData')}}" id="nav-home-tab" data-bs-target="#nav-basic" aria-controls="nav-home">
                            <div>
                                <span>Employee</span>
                                <bdi>{{DB::table('users')->where('role','Employee')->where('job_status','Reject')->count()}}</bdi>
                            </div>
                            <label class="switch">
                                <input role="Employee" type="checkbox" {{$role_status->Employee == 0 ? 'checked' : ''}} value="{{$role_status->Employee}}" class="employee">
                                <span class="slider round"></span>
                            </label>
                    </a>
                    @endif
                </div>
            </nav>
        </div>
    </div>
</div>
@include('components.include.footer')
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.back-sec').addClass('d-none');
        $(document).on('change', 'input:checkbox', function() {
           var $this = $(this);
            $.ajax({
                    type: 'POST',
                    url: "{{ route('roleStatus') }}",
                    data: {
                        'role': $(this).attr('role'),
                        'status': $(this).val(),
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: 'html',
                    success: function(data) {
                        $this.val(data);
                    }
                });
        });
    });
</script>