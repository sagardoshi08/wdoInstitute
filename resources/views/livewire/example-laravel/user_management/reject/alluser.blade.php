<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700">
@include('components.include.header')
<div id="user2" class="container-fluid py-4 all-user-listing">
    <div class="row">
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
            <h2>{{count($users)}} All Reject User</h2>
            <div class="my-4">
                <div class=" py-3 employees-sec">
                    <div class="employee-row line">
                        @foreach ($users as $key=>$data)
                        @php $image = DB::table('user_data')->select('profile_image')->where('user_id',$data->id)->first(); @endphp
                        <div class="offset-md-0 offset-sm-1 card-main">
                            <a href="{{ route('viewuser',$data->id)}}">
                            <div class="card align-items-center">
                                <div class="top-card-sec d-flex align-items-center">
                                    {{-- <input type="checkbox"> --}}
                                    <label class="switch">
                                        <input id="{{$data->id}}" class="singleuser-status" type="checkbox" {{$data->status == 0 ? 'checked' :  ''}} value="{{$data->status}}">
                                        <span class="slider round">
                                        <span class="on"><b>ON</b></span><span class="off"><b>OFF</b></span>
                                            </span>
                                    </label>
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
                            </div>
                            <a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('components.include.footer')
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
    });
</script>
