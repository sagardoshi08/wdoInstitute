@include('components.include.header')
<style>
   div.dataTables_wrapper div.dataTables_filter {
      text-align: left;
   }
   .month-header-btn{
      width: 9%;
      position: relative;
      top: 118px;
      z-index: 9;
      left: 327px;
   }
   button.ml-2.btn-primary.get-user-name {
    padding: 7px;
    border-radius: 5rem !important;
    color: #fff;
    font-size: 0.875rem;
}

    .table.align-items-center tbody tr td input {
    left: 49%;

}
   /* .clear-fil{
      position: relative;
      top: 129px;
      z-index: 9999;
      left: 616px;
   } */
</style>
<div>
   <!-- Navbar -->
   <!-- End Navbar -->
   <div class="py-4 assign-task-tab">
      <!-- New Dashboard Starts -->
      <div class="main-dashboard mb-5">
         <div class="main-dashboard-inner">
            <div class="shadow-no" id="dashboard-cards">
               <nav class="dash-btn">
                  <div class="nav nav-tabs mb-3 accordion-item" id="nav-tab" role="tablist">
                     @if(auth()->user()->role == 'super_admin')
                     <button class="nav-link active nav-button all-btn-tab" id="nav-user-tab" data-bs-toggle="tab" data-bs-target="#nav-basic1" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                     <span>All Users</span>
                     <bdi>{{DB::table('users')->where('role','!=','super_admin')->where(function($query) {
                                $query->where('job_status', Null)
                                    ->orWhere('job_status','Approved');
                            })->count()}}</bdi>
                     </button>
                     <button class="nav-link nav-button admin-btn-tab" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-basic" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                     <span>Admin</span>
                     <bdi>{{DB::table('users')->where('role','Admin')->where(function($query) {
                                $query->where('job_status', Null)
                                    ->orWhere('job_status','Approved');
                            })->count()}}</bdi>
                     </button>
                     <button class="nav-link nav-button manager-btn-tab" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-college" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                     <span> Manager</span>
                     <bdi>{{DB::table('users')->where('role','Manager')->where(function($query) {
                                $query->where('job_status', Null)
                                    ->orWhere('job_status','Approved');
                            })->count()}}</bdi>
                     </button>
                     <button class="nav-link nav-button teamlead-btn-tab" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-nsp" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                     <span> Team Leader</span>
                     <bdi>{{DB::table('users')->where('role','Team Leader')->where(function($query) {
                                $query->where('job_status', Null)
                                    ->orWhere('job_status','Approved');
                            })->count()}}</bdi>
                     </button>
                     <button class="nav-link nav-button employee-btn-tab" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-bank" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                     <span> Employee</span>
                     <bdi>{{DB::table('users')->where('role','Employee')->where(function($query) {
                                $query->where('job_status', Null)
                                    ->orWhere('job_status','Approved');
                            })->count()}}</bdi>
                     </button>
                     @endif
                  </div>
               </nav>
                  <div class="month-header-btn header-btn">
                     <button class="ml-2 btn-primary get-user-name" all-userid="" disabled>Submit</button>
                  </div>
               <div class="" id="nav-tabContent">
                  <div class="tab-pane fade active show" id="nav-basic1" role="tabpanel" aria-labelledby="nav-basic1-tab">

                        <div class="row">
                           <div class="col-md-12">
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
                              @if(auth()->user()->role == 'super_admin')<h2>{{count($alluser)}} All Users</h2>@endif
                              <div class="card-body px-0 pb-2 task-table" style="background-color: #fff; border-radius: 8px;">
                                 <div class="row1">

                                    <div class="custom-container">
                                       <div class=" justify-content-between d-flex">
                                          <div class="print header-btn ms-2">
                                             <span class="nav-link mb-0 ml-2 active " data-bs-toggle="tooltip" data-bs-placement="top" title="Print"><i class="fa fa-print" aria-hidden="true"></i></span>
                                          </div>
                                          <div class="export header-btn ms-2">
                                             <a href="{{route('export')}}"> <span class="nav-link mb-0  active" data-bs-toggle="tooltip" data-bs-placement="top" title="Export CSV"><i class="fas fa-file-export"></i></span></a>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="table-responsive p-0">
                                       <table class="table align-items-center mb-0 admin-table sample_data4">
                                          <thead>
                                             <tr class="bg-dark">
                                                <th class="text-uppercase  text-xxs font-weight-bolder " style="width: 10%;" data-orderable="false">
                                                    <input type="checkbox" id="allmultiselect">
                                                </th>
                                                <th class="text-uppercase  text-xxs font-weight-bolder " style="width: 10%;">
                                                   PHOTO
                                                </th>
                                                <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                   NAME
                                                </th>
                                                <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                   Role
                                                </th>
                                                <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                    Morning Tea Break
                                                </th>
                                                <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                    Lunch Break
                                                </th>
                                                <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                   Evening Tea Break
                                                </th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             @if ($alluser->count())
                                             @foreach($alluser as $key => $user)
                                             @php
                                                $image = DB::table('user_data')->select('profile_image')->where('user_id',$user->id)->first();
                                                if(isset($user->break_time)){
                                                   $break_time = json_decode($user->break_time);
                                                }else{
                                                   $break_time = '';
                                                }
                                             @endphp
                                             <tr>
                                                <td><input type="checkbox" class="single-che" name="single_checkbox" value="{{$user->id}}"></td>
                                                <td class="w-8">
                                                   <div class="pe-4 ">
                                                      <div class="d-flex flex-column justify-content-center align-items-center">
                                                         <img src="{{isset($image->profile_image) ? asset('assets').'/'.$image->profile_image : asset('assets/img/images.png')}}
                                                            " class="avatar avatar-sm border-radius-lg" alt="user1">
                                                      </div>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{ $user->role }}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column justify-content-end">
                                                       <h6 class="mb-0 text-sm">{{$break_time != '' ? $break_time->mor_tea_start.'-'.$break_time->mor_tea_end.' ('.$break_time->mor_tea_break.'min)' : '-'}}</h6>
                                                    </div>
                                                 </td>
                                                 <td>
                                                    <div class="d-flex flex-column justify-content-end">
                                                       <h6 class="mb-0 text-sm">{{$break_time != '' ? $break_time->lunch_start.'-'.$break_time->lunch_end.' ('.$break_time->lunch_break.'min)' : '-'}}</h6>
                                                    </div>
                                                 </td>
                                                 <td>
                                                    <div class="d-flex flex-column justify-content-end">
                                                       <h6 class="mb-0 text-sm">{{$break_time != '' ? $break_time->eve_tea_start.'-'.$break_time->eve_tea_end.' ('.$break_time->eve_tea_break.'min)' : '-'}}</h6>
                                                    </div>
                                                 </td>
                                             </tr>
                                             @endforeach
                                             @else
                                             <tr>
                                                <td colspan="5">No record found</td>
                                             </tr>
                                             @endif
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>

                  @if(auth()->user()->role == 'super_admin')
                  <div class="tab-pane fade" id="nav-basic" role="tabpanel" aria-labelledby="nav-basic-tab">
                     <div class="accordion-body">
                        <div class="row">
                           <div class="col-md-12">
                           </div>
                           <div class="col-12">
                              <h2>{{count($user_admin)}} Admin</h2>
                              <input type="hidden" value="Admin" id="employee_role">
                              <div class="card-body px-0 pb-2 task-table" style="background-color: #fff; border-radius: 8px;">
                                 <div class="row1">
                                    <div class="custom-container">
                                       <div class=" justify-content-between d-flex">
                                          <div class="print header-btn ms-2">
                                             <span class="nav-link mb-0 ml-2 active " data-bs-toggle="tooltip" data-bs-placement="top" title="Print"><i class="fa fa-print" aria-hidden="true"></i></span>
                                          </div>
                                          <div class="export header-btn ms-2">
                                             <a href="{{route('export')}}"> <span class="nav-link mb-0  active" data-bs-toggle="tooltip" data-bs-placement="top" title="Export CSV"><i class="fas fa-file-export"></i></span></a>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="table-responsive p-0">
                                       <table class="table align-items-center mb-0 admin-table sample_data">
                                          <thead>
                                             <tr class="bg-dark">
                                             <th class="text-uppercase  text-xxs font-weight-bolder " style="width: 10%;" data-orderable="false">
                                                    <input type="checkbox" id="adminmultiselect">
                                                </th>
                                                <th class="text-uppercase  text-xxs font-weight-bolder " style="width: 10%;">
                                                   PHOTO
                                                </th>
                                                <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                   NAME
                                                </th>
                                                <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                   Role
                                                </th>
                                                <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                    Morning Tea Break
                                                </th>
                                                <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                    Lunch Break
                                                </th>
                                                <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                   Evening Tea Break
                                                </th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             @if ($user_admin->count())
                                             @foreach($user_admin as $key => $user)
                                             @php $image = DB::table('user_data')->select('profile_image')->where('user_id',$user->id)->first();
                                             if(isset($user->break_time)){
                                                   $break_time = json_decode($user->break_time);
                                                }else{
                                                   $break_time = '';
                                                }
                                             @endphp
                                             <tr>
                                             <td><input type="checkbox" class="single-che" name="single_checkbox" value="{{$user->id}}"></td>
                                                <td class="w-8">
                                                   <div class="pe-4 ">
                                                      <div class="d-flex flex-column justify-content-center align-items-center">
                                                         <img src="{{isset($image->profile_image) ? asset('assets').'/'.$image->profile_image : asset('assets/img/images.png')}}
                                                            " class="avatar avatar-sm border-radius-lg" alt="user1">
                                                      </div>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{ $user->role }}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column justify-content-end">
                                                       <h6 class="mb-0 text-sm">{{$break_time != '' ? $break_time->mor_tea_start.'-'.$break_time->mor_tea_end.' ('.$break_time->mor_tea_break.'min)' : '-'}}</h6>
                                                    </div>
                                                 </td>
                                                 <td>
                                                    <div class="d-flex flex-column justify-content-end">
                                                       <h6 class="mb-0 text-sm">{{$break_time != '' ? $break_time->lunch_start.'-'.$break_time->lunch_end.' ('.$break_time->lunch_break.'min)' : '-'}}</h6>
                                                    </div>
                                                 </td>
                                                 <td>
                                                    <div class="d-flex flex-column justify-content-end">
                                                       <h6 class="mb-0 text-sm">{{$break_time != '' ? $break_time->eve_tea_start.'-'.$break_time->eve_tea_end.' ('.$break_time->eve_tea_break.'min)' : '-'}}</h6>
                                                    </div>
                                                 </td>
                                             </tr>
                                             @endforeach
                                             @else
                                             <tr>
                                                <td colspan="5">No record found</td>
                                             </tr>
                                             @endif
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="nav-college" role="tabpanel" aria-labelledby="nav-college-tab">
                  <div class="accordion-body">
                     <div class="row">
                        <div class="col-md-12">
                        </div>
                        <div class="col-12">
                           <h2>{{count($user_manager)}} Manager</h2>
                           <input type="hidden" value="Admin" id="employee_role">
                           <div class="card-body px-0 pb-2 task-table" style="background-color: #fff; border-radius: 8px;">
                              <div class="row1">
                                 <div class="custom-container">
                                    <div class=" justify-content-between d-flex">
                                       <div class="print header-btn ms-2">
                                          <span class="nav-link mb-0 ml-2 active " data-bs-toggle="tooltip" data-bs-placement="top" title="Print"><i class="fa fa-print" aria-hidden="true"></i></span>
                                       </div>
                                       <div class="export header-btn ms-2">
                                          <a href="{{route('export')}}"> <span class="nav-link mb-0  active" data-bs-toggle="tooltip" data-bs-placement="top" title="Export CSV"><i class="fas fa-file-export"></i></span></a>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0 admin-table sample_data1">
                                       <thead>
                                          <tr class="bg-dark">
                                          <th class="text-uppercase  text-xxs font-weight-bolder " style="width: 10%;" data-orderable="false">
                                                    <input type="checkbox" id="managermultiselect">
                                                </th>
                                             <th class="text-uppercase  text-xxs font-weight-bolder " style="width: 10%;">
                                                PHOTO
                                             </th>
                                             <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                NAME
                                             </th>
                                             <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                Role
                                             </th>
                                             <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                    Morning Tea Break
                                                </th>
                                                <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                    Lunch Break
                                                </th>
                                                <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                   Evening Tea Break
                                                </th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          @if ($user_manager->count())
                                          @foreach($user_manager as $key => $user)
                                          @php $image = DB::table('user_data')->select('profile_image')->where('user_id',$user->id)->first();
                                          if(isset($user->break_time)){
                                                   $break_time = json_decode($user->break_time);
                                                }else{
                                                   $break_time = '';
                                                }
                                          @endphp
                                          <tr>
                                          <td><input type="checkbox" class="single-che" name="single_checkbox" value="{{$user->id}}"></td>
                                             <td class="w-8">
                                                <div class="pe-4 ">
                                                   <div class="d-flex flex-column justify-content-center align-items-center">
                                                      <img src="{{isset($image->profile_image) ? asset('assets').'/'.$image->profile_image : asset('assets/img/images.png')}}
                                                         " class="avatar avatar-sm border-radius-lg" alt="user1">
                                                   </div>
                                                </div>
                                             </td>
                                             <td>
                                                <div class="d-flex flex-column justify-content-end">
                                                   <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                                                </div>
                                             </td>
                                             <td>
                                                <div class="d-flex flex-column justify-content-end">
                                                   <h6 class="mb-0 text-sm">{{ $user->role }}</h6>
                                                </div>
                                             </td>
                                             <td>
                                                    <div class="d-flex flex-column justify-content-end">
                                                       <h6 class="mb-0 text-sm">{{$break_time != '' ? $break_time->mor_tea_start.'-'.$break_time->mor_tea_end.' ('.$break_time->mor_tea_break.'min)' : '-'}}</h6>
                                                    </div>
                                                 </td>
                                                 <td>
                                                    <div class="d-flex flex-column justify-content-end">
                                                       <h6 class="mb-0 text-sm">{{$break_time != '' ? $break_time->lunch_start.'-'.$break_time->lunch_end.' ('.$break_time->lunch_break.'min)' : '-'}}</h6>
                                                    </div>
                                                 </td>
                                                 <td>
                                                    <div class="d-flex flex-column justify-content-end">
                                                       <h6 class="mb-0 text-sm">{{$break_time != '' ? $break_time->eve_tea_start.'-'.$break_time->eve_tea_end.' ('.$break_time->eve_tea_break.'min)' : '-'}}</h6>
                                                    </div>
                                                 </td>
                                          </tr>
                                          @endforeach
                                          @else
                                          <tr>
                                             <td colspan="5">No record found</td>
                                          </tr>
                                          @endif
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="tab-pane fade" id="nav-nsp" role="tabpanel" aria-labelledby="nav-nsp-tab">
               <div class="accordion-body">
                  <div class="row">
                     <div class="col-md-12">
                     </div>
                     <div class="col-12">
                        <h2>{{count($user_teamlead)}} Team Leader</h2>
                        <input type="hidden" value="Admin" id="employee_role">
                        <div class="card-body px-0 pb-2 task-table" style="background-color: #fff; border-radius: 8px;">
                           <div class="row1">
                              <div class="custom-container">
                                 <div class=" justify-content-between d-flex">
                                    <div class="print header-btn ms-2">
                                       <span class="nav-link mb-0 ml-2 active " data-bs-toggle="tooltip" data-bs-placement="top" title="Print"><i class="fa fa-print" aria-hidden="true"></i></span>
                                    </div>
                                    <div class="export header-btn ms-2">
                                       <a href="{{route('export')}}"> <span class="nav-link mb-0  active" data-bs-toggle="tooltip" data-bs-placement="top" title="Export CSV"><i class="fas fa-file-export"></i></span></a>
                                    </div>
                                 </div>
                              </div>
                              <div class="table-responsive p-0">
                                 <table class="table align-items-center mb-0 admin-table sample_data2">
                                    <thead>
                                       <tr class="bg-dark">
                                       <th class="text-uppercase  text-xxs font-weight-bolder " style="width: 10%;" data-orderable="false">
                                                    <input type="checkbox" id="teamledmultiselect">
                                                </th>
                                          <th class="text-uppercase  text-xxs font-weight-bolder " style="width: 10%;">
                                             PHOTO
                                          </th>
                                          <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                             NAME
                                          </th>
                                          <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                             Role
                                          </th>
                                          <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                    Morning Tea Break
                                                </th>
                                                <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                    Lunch Break
                                                </th>
                                                <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                   Evening Tea Break
                                                </th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       @if ($user_teamlead->count())
                                       @foreach($user_teamlead as $key => $user)
                                       @php $image = DB::table('user_data')->select('profile_image')->where('user_id',$user->id)->first();
                                       if(isset($user->break_time)){
                                                   $break_time = json_decode($user->break_time);
                                                }else{
                                                   $break_time = '';
                                                }
                                       @endphp
                                       <tr>
                                       <td><input type="checkbox" class="single-che" name="single_checkbox" value="{{$user->id}}"></td>
                                          <td class="w-8">
                                             <div class="pe-4 ">
                                                <div class="d-flex flex-column justify-content-center align-items-center">
                                                   <img src="{{isset($image->profile_image) ? asset('assets').'/'.$image->profile_image : asset('assets/img/images.png')}}
                                                      " class="avatar avatar-sm border-radius-lg" alt="user1">
                                                </div>
                                             </div>
                                          </td>
                                          <td>
                                             <div class="d-flex flex-column justify-content-end">
                                                <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                                             </div>
                                          </td>
                                          <td>
                                             <div class="d-flex flex-column justify-content-end">
                                                <h6 class="mb-0 text-sm">{{ $user->role }}</h6>
                                             </div>
                                          </td>
                                          <td>
                                                    <div class="d-flex flex-column justify-content-end">
                                                       <h6 class="mb-0 text-sm">{{$break_time != '' ? $break_time->mor_tea_start.'-'.$break_time->mor_tea_end.' ('.$break_time->mor_tea_break.'min)' : '-'}}</h6>
                                                    </div>
                                                 </td>
                                                 <td>
                                                    <div class="d-flex flex-column justify-content-end">
                                                       <h6 class="mb-0 text-sm">{{$break_time != '' ? $break_time->lunch_start.'-'.$break_time->lunch_end.' ('.$break_time->lunch_break.'min)' : '-'}}</h6>
                                                    </div>
                                                 </td>
                                                 <td>
                                                    <div class="d-flex flex-column justify-content-end">
                                                       <h6 class="mb-0 text-sm">{{$break_time != '' ? $break_time->eve_tea_start.'-'.$break_time->eve_tea_end.' ('.$break_time->eve_tea_break.'min)' : '-'}}</h6>
                                                    </div>
                                                 </td>

                                       </tr>
                                       @endforeach
                                       @else
                                       <tr>
                                          <td colspan="5">No record found</td>
                                       </tr>
                                       @endif
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="tab-pane fade" id="nav-bank" role="tabpanel" aria-labelledby="nav-bank-tab">

                  <div class="row">
                     <div class="col-md-12">
                     </div>
                     <div class="col-12">
                        <h2>{{count($user_employee)}} Employee</h2>
                        <input type="hidden" value="Admin" id="employee_role">
                        <div class="card-body px-0 pb-2 task-table" style="background-color: #fff; border-radius: 8px;">
                           <div class="row1">
                              <div class="custom-container">
                                 <div class=" justify-content-between d-flex">
                                    <div class="print header-btn ms-2">
                                       <span class="nav-link mb-0 ml-2 active " data-bs-toggle="tooltip" data-bs-placement="top" title="Print"><i class="fa fa-print" aria-hidden="true"></i></span>
                                    </div>
                                    <div class="export header-btn ms-2">
                                       <a href="{{route('export')}}"> <span class="nav-link mb-0  active" data-bs-toggle="tooltip" data-bs-placement="top" title="Export CSV"><i class="fas fa-file-export"></i></span></a>
                                    </div>
                                 </div>
                              </div>
                              <div class="table-responsive p-0">
                                 <table class="table align-items-center mb-0 admin-table sample_data3">
                                    <thead>
                                       <tr class="bg-dark">
                                       <th class="text-uppercase  text-xxs font-weight-bolder " style="width: 10%;" data-orderable="false">
                                                    <input type="checkbox" id="employeemultiselect">
                                                </th>
                                          <th class="text-uppercase  text-xxs font-weight-bolder " style="width: 10%;">
                                             PHOTO
                                          </th>
                                          <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                             NAME
                                          </th>
                                          <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                             Role
                                          </th>
                                          <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                    Morning Tea Break
                                                </th>
                                                <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                    Lunch Break
                                                </th>
                                                <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                   Evening Tea Break
                                                </th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       @if ($user_employee->count())
                                       @foreach($user_employee as $key => $user)
                                       @php $image = DB::table('user_data')->select('profile_image')->where('user_id',$user->id)->first();
                                       if(isset($user->break_time)){
                                                   $break_time = json_decode($user->break_time);
                                                }else{
                                                   $break_time = '';
                                                }
                                       @endphp
                                       <tr>
                                       <td><input type="checkbox" class="single-che" name="single_checkbox" value="{{$user->id}}"></td>
                                          <td class="w-8">
                                             <div class="pe-4 ">
                                                <div class="d-flex flex-column justify-content-center align-items-center">
                                                   <img src="{{isset($image->profile_image) ? asset('assets').'/'.$image->profile_image : asset('assets/img/images.png')}}
                                                      " class="avatar avatar-sm border-radius-lg" alt="user1">
                                                </div>
                                             </div>
                                          </td>
                                          <td>
                                             <div class="d-flex flex-column justify-content-end">
                                                <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                                             </div>
                                          </td>
                                          <td>
                                             <div class="d-flex flex-column justify-content-end">
                                                <h6 class="mb-0 text-sm">{{ $user->role }}</h6>
                                             </div>
                                          </td>
                                          <td>
                                                    <div class="d-flex flex-column justify-content-end">
                                                       <h6 class="mb-0 text-sm">{{$break_time != '' ? $break_time->mor_tea_start.'-'.$break_time->mor_tea_end.' ('.$break_time->mor_tea_break.'min)' : '-'}}</h6>
                                                    </div>
                                                 </td>
                                                 <td>
                                                    <div class="d-flex flex-column justify-content-end">
                                                       <h6 class="mb-0 text-sm">{{$break_time != '' ? $break_time->lunch_start.'-'.$break_time->lunch_end.' ('.$break_time->lunch_break.'min)' : '-'}}</h6>
                                                    </div>
                                                 </td>
                                                 <td>
                                                    <div class="d-flex flex-column justify-content-end">
                                                       <h6 class="mb-0 text-sm">{{$break_time != '' ? $break_time->eve_tea_start.'-'.$break_time->eve_tea_end.' ('.$break_time->eve_tea_break.'min)' : '-'}}</h6>
                                                    </div>
                                                 </td>

                                       </tr>
                                       @endforeach
                                       @else
                                       <tr>
                                          <td colspan="5">No record found</td>
                                       </tr>
                                       @endif
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         @endif
      </div>
   </div>
</div>
<div class="modal fade" id="remark-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered task-modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Break Time</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="assign-form" action="{{route('updateBreakTime')}}" method="POST">
                @csrf
            <div class="modal-body">
              <div class="task-area">
                <textarea type="text" class=" w-100 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="remarks" id="remarks"></textarea>
              </div>
                <div class="perm-area area01">
                    <div class="row">
                        <input type="hidden" name="usrs_id" value="" id="student-id">
                        <div class="col-md-6">
                            <label for="role" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Morning Tea-break Start</label><br />
                            <input type="time" name="morning_tea_start" id="morning_tea_start" class=" w-100 appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="col-md-6">
                            <label for="role" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Morning Tea-break End</label><br />
                            <input type="time" name="morning_tea_end" id="morning_tea_end" class=" w-100 appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-md-6">
                            <label for="role" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Lunch-break Start</label><br />
                            <input type="time" name="lunch_start" id="lunch_start" class=" w-100 appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="col-md-6">
                            <label for="role" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Lunch-break End</label><br />
                            <input type="time" name="lunch_end" id="lunch_end" class=" w-100 appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="col-md-6">
                            <label for="role" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Evening Tea-break Start</label><br />
                            <input type="time" name="evening_tea_start" id="evening_tea_start" class=" w-100 appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="col-md-6">
                            <label for="role" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Evening Tea-break End</label><br />
                            <input type="time" name="evening_tea_end" id="evening_tea_end" class=" w-100 appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-cancel close" data-dismiss="modal">Cancel</button>
               <button type="submit" class="btn crop-btn" id="break-save-btn" disabled>Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
@include('components.include.footer')
@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js" defer="defer"></script>
<script type="text/javascript">
   $(document).ready(function() {

      $.fn.dataTable.ext.errMode = 'none';
        var dataTable = $('.sample_data').DataTable({
            "oLanguage": {
                "sLengthMenu": "RESULTS PER PAGE:  _MENU_ ",
            }
        });

        var dataTable_manager = $('.sample_data1').DataTable({
            "oLanguage": {
                "sLengthMenu": "RESULTS PER PAGE:  _MENU_ ",
            }
        });

        var dataTable_teamlead = $('.sample_data2').DataTable({
            "oLanguage": {
                "sLengthMenu": "RESULTS PER PAGE:  _MENU_ ",
            }
        });

        var dataTable_employee = $('.sample_data3').DataTable({
            "oLanguage": {
                "sLengthMenu": "RESULTS PER PAGE:  _MENU_ ",
            }
        });

        var dataTable_alluser = $('.sample_data4').DataTable({
            "oLanguage": {
                "sLengthMenu": "RESULTS PER PAGE:  _MENU_ ",
            },
        });

        $(document).on('change', '#morning_tea_start,#morning_tea_end,#lunch_start,#lunch_end,#evening_tea_start,#evening_tea_end', function() {
            if($('#morning_tea_start').val() != '' && $('#morning_tea_end').val() != '' && $('#lunch_start').val() != '' && $('#lunch_end').val() != '' && $('#evening_tea_start').val() != '' && $('#evening_tea_end').val() != ''){
               $('#break-save-btn').prop('disabled',false);
            }else{
               $('#break-save-btn').prop('disabled',true);
            }
        });

        $(document).on('click', '.admin-btn-tab', function() {
            $('.admin-btn-tab').addClass('active');
            $('#nav-basic').addClass('active show');
            $('.manager-btn-tab').removeClass('active');
            $('.teamlead-btn-tab').removeClass('active');
            $('.employee-btn-tab').removeClass('active');
            $('#nav-college').removeClass('active show');
            $('#nav-nsp').removeClass('active show');
            $('#nav-bank').removeClass('active show');
            $('.all-btn-tab').removeClass('active');
            $('#nav-basic1').removeClass('active show');

            $('input[type="checkbox"]').prop('checked', false);
        });

        $(document).on('click', '.manager-btn-tab', function() {
            $('.manager-btn-tab').addClass('active');
            $('#nav-college').addClass('active show');
            $('.admin-btn-tab').removeClass('active');
            $('.teamlead-btn-tab').removeClass('active');
            $('.employee-btn-tab').removeClass('active');
            $('#nav-basic').removeClass('active show');
            $('#nav-nsp').removeClass('active show');
            $('#nav-bank').removeClass('active show');
            $('.all-btn-tab').removeClass('active');
            $('#nav-basic1').removeClass('active show');
            $('input[type="checkbox"]').prop('checked', false);
        });

        $(document).on('click', '.teamlead-btn-tab', function() {
            $('.teamlead-btn-tab').addClass('active');
            $('#nav-nsp').addClass('active show');
            $('.manager-btn-tab').removeClass('active');
            $('.admin-btn-tab').removeClass('active');
            $('.employee-btn-tab').removeClass('active');
            $('#nav-basic').removeClass('active show');
            $('#nav-college').removeClass('active show');
            $('#nav-bank').removeClass('active show');
            $('.all-btn-tab').removeClass('active');
            $('#nav-basic1').removeClass('active show');
            $('input[type="checkbox"]').prop('checked', false);
        });

        $(document).on('click', '.employee-btn-tab', function() {
            $('.employee-btn-tab').addClass('active');
            $('#nav-bank').addClass('active show');
            $('.manager-btn-tab').removeClass('active');
            $('.admin-btn-tab').removeClass('active');
            $('.teamlead-btn-tab').removeClass('active');
            $('#nav-basic').removeClass('active show');
            $('#nav-college').removeClass('active show');
            $('#nav-nsp').removeClass('active show');
            $('.all-btn-tab').removeClass('active');
            $('#nav-basic1').removeClass('active show');
            $('input[type="checkbox"]').prop('checked', false);
        });

        $('#common-back').addClass('d-none');

        $(document).on('click', '.all-btn-tab', function() {
            $('.all-btn-tab').addClass('active');
            $('#nav-basic1').addClass('active show');
            $('.employee-btn-tab').removeClass('active');
            $('#nav-bank').removeClass('active show');
            $('.manager-btn-tab').removeClass('active');
            $('.admin-btn-tab').removeClass('active');
            $('.teamlead-btn-tab').removeClass('active');
            $('#nav-basic').removeClass('active show');
            $('#nav-college').removeClass('active show');
            $('#nav-nsp').removeClass('active show');
            $('input[type="checkbox"]').prop('checked', false);
        });

        $(document).on('change', '.month_salary_inp', function() {
           $('.submit-btn').click();
        });

        $('#allmultiselect').change(function () {
            var cells = dataTable_alluser.rows({ page: 'current' }).nodes();
            $(cells).find(':checkbox').prop('checked', $(this).is(':checked'));
            var check_input = $(cells).find(':checked').length;
               if(check_input > 0){
                  $('.get-user-name').prop('disabled',false);
               }else{
                  $('.get-user-name').prop('disabled',true);
               }
        });
        dataTable_alluser.on('page', function () {
            var cells = dataTable_alluser.rows({ page: 'current' }).nodes();
            var input = $(cells).find(':checkbox').length;
            var check_input = $(cells).find(':checked').length;
            if(input == check_input){
                $('#allmultiselect').prop('checked', true);
            }else{
                $('#allmultiselect').prop('checked', false);
            }
        });

        $(document).on('change', '.single-che', function() {
         var input = $(this).parents('table').find('tbody :checkbox').length;
         var check_input = $(this).parents('table').find('tbody :checked').length;
         if(input != check_input){
            $(this).parents('table').find('tr th :checkbox').prop('checked', false);
         }
         if(check_input > 0){
            $('.get-user-name').prop('disabled',false);
         }else{
            $('.get-user-name').prop('disabled',true);
         }
        });

        $('#adminmultiselect').change(function () {
            var cells = dataTable.rows({ page: 'current' }).nodes();
            $(cells).find(':checkbox').prop('checked', $(this).is(':checked'));
            var check_input = $(cells).find(':checked').length;
               if(check_input > 0){
                  $('.get-user-name').prop('disabled',false);
               }else{
                  $('.get-user-name').prop('disabled',true);
               }
        });
        dataTable.on('page', function () {
            var cells = dataTable.rows({ page: 'current' }).nodes();
            var input = $(cells).find(':checkbox').length;
            var check_input = $(cells).find(':checked').length;
            if(input == check_input){
                $('#adminmultiselect').prop('checked', true);
            }else{
                $('#adminmultiselect').prop('checked', false);
            }
        });

        $('#managermultiselect').change(function () {
            var cells = dataTable_manager.rows({ page: 'current' }).nodes();
            $(cells).find(':checkbox').prop('checked', $(this).is(':checked'));
            var check_input = $(cells).find(':checked').length;
               if(check_input > 0){
                  $('.get-user-name').prop('disabled',false);
               }else{
                  $('.get-user-name').prop('disabled',true);
               }
        });
        dataTable_manager.on('page', function () {
            var cells = dataTable_manager.rows({ page: 'current' }).nodes();
            var input = $(cells).find(':checkbox').length;
            var check_input = $(cells).find(':checked').length;
            if(input == check_input){
                $('#managermultiselect').prop('checked', true);
            }else{
                $('#managermultiselect').prop('checked', false);
            }
        });

        $('#teamledmultiselect').change(function () {
            var cells = dataTable_teamlead.rows({ page: 'current' }).nodes();
            $(cells).find(':checkbox').prop('checked', $(this).is(':checked'));
            var check_input = $(cells).find(':checked').length;
               if(check_input > 0){
                  $('.get-user-name').prop('disabled',false);
               }else{
                  $('.get-user-name').prop('disabled',true);
               }
        });
        dataTable_teamlead.on('page', function () {
            var cells = dataTable_teamlead.rows({ page: 'current' }).nodes();
            var input = $(cells).find(':checkbox').length;
            var check_input = $(cells).find(':checked').length;
            if(input == check_input){
                $('#teamledmultiselect').prop('checked', true);
            }else{
                $('#teamledmultiselect').prop('checked', false);
            }
        });

        $('#employeemultiselect').change(function () {
            var cells = dataTable_employee.rows({ page: 'current' }).nodes();
            $(cells).find(':checkbox').prop('checked', $(this).is(':checked'));
            var check_input = $(cells).find(':checked').length;
               if(check_input > 0){
                  $('.get-user-name').prop('disabled',false);
               }else{
                  $('.get-user-name').prop('disabled',true);
               }
        });
        dataTable_employee.on('page', function () {
            var cells = dataTable_employee.rows({ page: 'current' }).nodes();
            var input = $(cells).find(':checkbox').length;
            var check_input = $(cells).find(':checked').length;
            if(input == check_input){
                $('#employeemultiselect').prop('checked', true);
            }else{
                $('#employeemultiselect').prop('checked', false);
            }
        });

        // $(document).on('change', '#employeemultiselect,#teamledmultiselect,#managermultiselect', function() {
        //     if($(this).is(':checked')) {
        //         var sele_val = new Array();
        //         $('input[type="checkbox"]:checked').each(function() {
        //             sele_val.push($(this).val());
        //         });
        //         $('.get-user-name').attr('all-userid',sele_val);
        //     }else{
        //        $('.get-user-name').attr('all-userid','');
        //     }
        // });

        // $(document).on('change', '.single-che', function() {
        //     var checkboxValues = [];
        //     $('input[name=single_checkbox]:checked').map(function() {
        //         checkboxValues.push($(this).val());
        //     });
        //     $('.get-user-name').attr('all-userid',checkboxValues);
        // });

        $(document).on('click', '.get-user-name', function() {
            var sele_val = new Array();
            $('input[name=single_checkbox]:checked').each(function() {
                sele_val.push($(this).val());
            });
            $('#student-id').val(sele_val);
            $.ajax({
                type: 'POST',
                url: "{{ route('getUserBreaktime') }}",
                data: {
                    'id': sele_val,
                    "_token": "{{ csrf_token() }}"
                },
                dataType: 'html',
                success: function(data) {
                    $('#remarks').html(data);
                }
            });
            $('#remark-modal').modal('show');
        });

        $(document).on('click', '.close', function() {
            $('#remark-modal').modal('hide');
        });

   });
</script>
