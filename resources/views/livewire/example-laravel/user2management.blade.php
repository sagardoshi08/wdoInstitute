
<div id="user2" class="container-fluid py-4 all-user-listing">
@if(!$isAssign)
    <a class="back-sec" onclick="history.back()">
        <i class="fa fa-long-arrow-left"></i>
        <p>Back</p>
    </a><br />
@endif
    <div class="row">
        <div class="col-md-12">
            @if($isAssign)
            @include('livewire.example-laravel.assign-user')
            @endif
        </div>
        <div class="col-12">
            @if (session('message'))
            <div class="row">
                <div class="alert alert-success alert-dismissible text-white" role="alert">
                    <span class="text-sm">{{ Session::get('message') }}</span>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @endif
            @if (Session::has('delete'))
            <div class="row">
                <div class="alert alert-danger alert-dismissible text-white" role="alert">
                    <span class="text-sm">{{ Session::get('delete') }}</span>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @endif
			@if(!$isAssign)
            @if(!$isOpen)
            <div class="col-lg-6 d-flex align-items-center gap-3 " style="justify-content:space-between;">
                <h2>{{count($users)}} All Users</h2>
                {{-- <label for="filter" class="form-label align-items-center filter-label-1"><span class="filter-title"><i class="fa fa-filter"></i> Filter by</span>
                    <input wire:model="search" class="form-control filter-input" list="datalistOptions" placeholder="Search by role...">
                </label> --}}
                {{-- <datalist id="datalistOptions">
                    @if(auth()->user()->role == 'super_admin')
                       <option value="Admin">Admin</option>
                       <option value="Manager">Manager</option>
                       <option value="Team Leader">Team Leader</option>
                       <option value="Employee">Employee</option>
                       <option value="Other">Other</option>
                    @elseif (auth()->user()->role == 'Admin')
                       <option value="Manager">Manager</option>
                       <option value="Team Leader">Team Leader</option>
                       <option value="Employee">Employee</option>
                       <option value="Other">Other</option>
                   @elseif (auth()->user()->role == 'Manager')
                       <option value="Team Leader">Team Leader</option>
                       <option value="Employee">Employee</option>
                       <option value="Other">Other</option>
                    @else
                       <option value="Employee">Employee</option>
                       <option value="Other">Other</option>
                    @endif
                </datalist> --}}
                <a href="{{route('edit-management')}}" class="add-candidate btn bg-dark mb-0 my-auto text-white float-end" style="left:95%;"><i class="fa fa-plus"  style="font-size:12px; padding-right: 3px;"></i>Create New User</a>

            </div>
            @endif
            <div class="my-4">
                <div class=" me-3 my-3 text-end">
                   {{-- @if($isOpen)
                       @include('livewire.example-laravel.create-user')
                    @endif--}}

                    @if($isView)
                    @include('livewire.example-laravel.view')
                    @endif
                </div>
				@if(!($isOpen || $isView || $isAssign))
                <div class=" py-3 employees-sec">
                    <div class="employee-row line">
                        @foreach ($users as $key=>$data)
                        @php $image = DB::table('user_data')->select('profile_image')->where('user_id',$data->id)->first(); @endphp
                        <div class="offset-md-0 offset-sm-1 card-main">
                            <div class="right-menu d-none"><button class="active redirect-user" user-id="{{$data->id}}">login</button></div>

                            <a href="{{ route('viewuser',$data->id)}}">
                            <div class="card align-items-center">
                                <div class="top-card-sec d-flex align-items-center">
                                    {{-- <input type="checkbox"> --}}

                                    <div class="right-menu">
                                        @if($data->login_status == 1)
                                            <div class="active">Active</div>
                                        @else
                                        <div class="not-active">In Active</div>
                                        @endif
                                    </div>

                                </div>
                                <div class="profile-det d-flex align-items-center flex-column position-relative">
                                    <img src="{{isset($image->profile_image) ? asset('assets').'/'.$image->profile_image : asset('assets/img/images.png')}}" class="card-img-top rounded-circle" style="width:35%" alt="profile">
                                    <h5>{{$data->name}}</h5>
                                    <p>{{$data->role}}</p>

                                </div>
                                @php
                                    $data1=explode(",",$data->assign_user);
                                    if(empty($data1[0]) || $data1[0] == '[]'){
                                        unset($data1[0]);
                                    }
                                    $array = array_filter($data1);
                                @endphp
                                <div class="card-body">
                                    <div class="depart-sec d-flex">
                                        @if($data->role != 'Employee')
                                        <div class="dep weertee">
                                            <div class="team">
                                            <i class="fa fa-users" aria-hidden="true"></i>
                                            <p>Team Member</p>
                                            </div>
                                            <div class="team-dep">
                                                    <p style="font-size:16px; padding-right: 5px;"><b>{{count($array)}}</b></p>
                                                    <a class="add-member" wire:click="assign('{{ $data->uuid }}')">+ Add</a>
                                                </div>
                                        </div>
                                        @endif
                                        <div class="dep dep2">
                                                <div class="date-hired">
                                                    <i class="fa fa-calendar-o" aria-hidden="true"></i>
                                                    <p>Date Hired</p>
                                                </div>

                                                <h6>{{$data->created_at->format('d/m/Y')}}</h6>
                                        </div>
                                </div>
                                <div class="user-cont">
                                    <div class="user-mail"><i class="fa fa-envelope-o" aria-hidden="true"></i>{{$data->email}}</div>
                                    <div class="delete-edit">
                                        <div class="delete-role">
                                            <a delete-id="{{$data->id}}" class="delete-link" title="delete-User"><i class="bi bi-trash"></i></a>
                                        </div>
                                        <div class="edit-role">
                                            <a href="{{ route('edituser',$data->id)}}" class="edit-link" title="Edit-User"><i class="bi bi-pencil-square"></i></a>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                @if(Auth::user()->role == "super_admin")
                                <div class="btn-switch-role">

                                         <div class="edit-role">
                                            <button class="active redirect-user btn btn-info mt-2" user-id="{{$data->id}}">login</button>
                                        </div>
                                        <label class="switch">
                                            <input id="{{$data->id}}" class="singleuser-status" type="checkbox" {{$data->status == 0 ? 'checked' :  ''}} value="{{$data->status}}">
                                            <span class="slider round">
                                            <span class="on directer"><br><b>Enable</b></span><span class="off directer"><br><b>Disable</b></span>
                                                </span>
                                        </label>
                                        <div class="location">
                                            <button class="active redirect-user btn btn-info mt-2">location</button>
                                        </div>
                                </div>
                                @endif
                            </div>
                            </a>

                        </div>
                        @endforeach
                    </div>
                </div>
				@endif
            </div>
			@endif
        </div>
    </div>
</div>
<div class="modal fade" id="attendance-history">
   <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <h4 class="modal-title remark-modal-title">Attendance history</h4>
            <button type="button" class="close" data-dismiss="modal">×</button>
         </div>
         <form id="attendance-history-form" action="" method="POST" style="overflow-y: scroll;">
            @csrf
            <!-- Modal body -->
            <input type="hidden" name="user_id" class="user-id" value="">
            <div class="modal-body">
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
               <button type="button" class="btn btn-danger close" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
         </form>
      </div>
   </div>
</div>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('change', '.singleuser-status', function() {
           var $this = $(this);
            $.ajax({
                    type: 'POST',
                    url: "{{ route('userStatus') }}",
                    data: {
                        'id': $(this).attr('id'),
                        'status': $(this).val(),
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: 'html',
                    success: function(data) {
                        $this.val(data);
                    }
                });
        });

        $(document).on('click', '.close', function() {
            $('#attendance-history').modal('hide');
        });

        $(document).on('click', '.history-btn', function() {
            $('.user-id').val($(this).attr('id'));

                $.ajax({
                    type: 'POST',
                    url: "{{ route('userAttendanceHistory') }}",
                    data: {
                        'id': $(this).attr('id'),
                        'status': $(this).val(),
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: 'html',
                    success: function(data) {
                        $('.modal-body').html(data);
                        $('#attendance-history').modal('show');
                    }
                });

        });

        $(document).on('click', '.delete-link', function() {
            var $this = $(this);
            let isExecuted = confirm('Are you sure want to delete this record ?');
            if (isExecuted == true) {
            $.ajax({
                type: 'POST',
                url: "{{ route('deleteUser') }}",
                data: {
                    'id': $(this).attr('delete-id'),
                    "_token": "{{ csrf_token() }}"
                },
                dataType: 'html',
                success: function(data) {
                    $this.parents('.card-main').remove();
                }
            });
            }
        });

        // $(document).on('click', '.redirect-user', function() {
        //     $.ajax({
        //         type: 'POST',
        //         url: "{{ route('changeUserLogin') }}",
        //         data: {
        //             'id': $(this).attr('user-id'),
        //             "_token": "{{ csrf_token() }}"
        //         },
        //         dataType: 'html',
        //         success: function(data) {
        //             window.location.href = 'https://wdoinstitution.com/dashboard';
        //         }
        //     });
        // });
    });
</script>
