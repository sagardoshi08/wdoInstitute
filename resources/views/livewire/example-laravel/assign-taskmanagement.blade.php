<div>
   <!-- Navbar -->
   <!-- End Navbar -->
   <div class="container-fluid py-4 assign-task-tab">
      <!-- New Dashboard Starts -->
      <div class="main-dashboard mb-5">
         <div class="main-dashboard-inner">
            <div class="shadow-no" id="dashboard-cards">
               <nav class="dash-btn">
                  <div class="nav nav-tabs mb-3 accordion-item" id="nav-tab" role="tablist">
                     @if(auth()->user()->role == 'super_admin')
                     <button class="nav-link active nav-button admin-btn-tab" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-basic" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                     <span>Admin</span>
                     <bdi>{{DB::table('users')->where('role','Admin')->where(function($query) {
                                $query->where('job_status', Null)
                                    ->orWhere('job_status','Approved');
                            })->count()}}</bdi>
                     </button>
                     @endif
                     @if(auth()->user()->role == 'super_admin' || auth()->user()->role == 'Admin')
                     <button class="nav-link active nav-button manager-btn-tab" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-college" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                     <span> Manager</span>
                     <bdi>{{DB::table('users')->where('role','Manager')->where(function($query) {
                                $query->where('job_status', Null)
                                    ->orWhere('job_status','Approved');
                            })->count()}}</bdi>
                     </button>
                     @endif
                     @if(auth()->user()->role == 'super_admin' || auth()->user()->role == 'Admin' || auth()->user()->role == 'Manager')
                     <button class="nav-link active nav-button teamlead-btn-tab" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-nsp" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                     <span> Team Leader</span>
                     <bdi>{{DB::table('users')->where('role','Team Leader')->where(function($query) {
                                $query->where('job_status', Null)
                                    ->orWhere('job_status','Approved');
                            })->count()}}</bdi>
                     </button>
                     @endif
                     @if(auth()->user()->role == 'super_admin' || auth()->user()->role == 'Admin' || auth()->user()->role == 'Manager' || auth()->user()->role == 'Team Leader')
                     <button class="nav-link active nav-button employee-btn-tab" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-bank" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                     <span> Employee</span>
                     <bdi>{{DB::table('users')->where('role','Employee')->where(function($query) {
                                $query->where('job_status', Null)
                                    ->orWhere('job_status','Approved');
                            })->count()}}</bdi>
                     </button>
                     <button class="nav-link nav-button " id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-status" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                     <span>Other</span>
                     <bdi>0</bdi>
                     </button>
                     @endif
                  </div>
               </nav>
               <div class="" id="nav-tabContent">
                  @if(auth()->user()->role == 'super_admin')
                  <div class="tab-pane fade active show" id="nav-basic" role="tabpanel" aria-labelledby="nav-basic-tab">
                     <div class="accordion-body">
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
                                                {{--
                                                <th class="text-uppercase text-xxs font-weight-bolder">
                                                   S. No.
                                                </th>
                                                --}}
                                                <th class="text-uppercase  text-xxs font-weight-bolder " style="width: 10%;">
                                                   PHOTO
                                                </th>
                                                <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                   NAME
                                                </th>
                                                <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                   PHONE
                                                </th>
                                                <th class="text-start text-uppercase  text-xxs font-weight-bolder">
                                                   Completed Task
                                                </th>
                                                <th class="text-start text-uppercase  text-xxs font-weight-bolder ">
                                                   Pending Task
                                                </th>
                                                <th class="text-start text-uppercase  text-xxs font-weight-bolder">
                                                   Assigned Task
                                                </th>
                                                <th class="text-start text-uppercase  text-xxs font-weight-bolder">
                                                   Rejected Task
                                                </th>
                                                <th class="text-start text-uppercase text-xxs font-weight-bolder"> ACTION</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             @if ($user_admin->count())
                                             @foreach($user_admin as $key => $user)
                                             @php $image = DB::table('user_data')->select('profile_image')->where('user_id',$user->id)->first(); @endphp
                                             <tr>
                                                {{--
                                                <td>
                                                   <div class="d-flex px-2 py-1">
                                                      <div class="d-flex flex-column justify-content-center">
                                                         <p class="mb-0 text-sm">{{($users->currentPage()-1)*$perPage+$key +1 }}</p>
                                                      </div>
                                                   </div>
                                                </td>
                                                --}}
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
                                                      <h6 class="mb-0 text-sm">{{ DB::table('user_data')->select('phone_number')->where('user_id',$user->id)->first()->phone_number; }}</h6>
                                                   </div>
                                                </td>
                                                <td class="align-middle completed-task text-sm" emplotee-id="{{$user->id}}">
                                                   <p class="text-xs text-secondary mb-0"><b>0</b>
                                                   </p>
                                                </td>
                                                <td class="align-middle assign-list" emplotee-id="{{$user->id}}">
                                                   <span class="text-secondary text-xs font-weight-bold">{{DB::table('assign_task')->where('employee_id',$user->id)->count()}}</span>
                                                </td>
                                                <td class="align-middle assigntask-list" emplotee-id="{{$user->id}}">
                                                   <span class="text-secondary text-xs font-weight-bold">{{DB::table('assign_task')->where('employee_id',$user->id)->count()}}</span>
                                                </td>
                                                <td class="align-middle" emplotee-id="{{$user->id}}">
                                                   <span class="text-secondary text-xs font-weight-bold">0</span>
                                                </td>
                                                <td class="align-middle">
                                                   <a rel="tooltip" href="{{route('students',$user->id)}}" class="btn mb-0 btn-success btn-link bg-dark" data-original-title="" title="">
                                                      <i class="bi bi-pencil-square"></i>
                                                      <div class="ripple-container"></div>
                                                   </a>
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
               @if(auth()->user()->role == 'super_admin' || auth()->user()->role == 'Admin')
               <div class="tab-pane fade active show" id="nav-college" role="tabpanel" aria-labelledby="nav-college-tab">
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
                                             {{--
                                             <th class="text-uppercase text-xxs font-weight-bolder">
                                                S. No.
                                             </th>
                                             --}}
                                             <th class="text-uppercase  text-xxs font-weight-bolder " style="width: 10%;">
                                                PHOTO
                                             </th>
                                             <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                NAME
                                             </th>
                                             <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                PHONE
                                             </th>
                                             <th class="text-start text-uppercase  text-xxs font-weight-bolder">
                                                Completed Task
                                             </th>
                                             <th class="text-start text-uppercase  text-xxs font-weight-bolder ">
                                                Pending Task
                                             </th>
                                             <th class="text-start text-uppercase  text-xxs font-weight-bolder">
                                                Assigned Task
                                             </th>
                                             <th class="text-start text-uppercase  text-xxs font-weight-bolder">
                                                Rejected Task
                                             </th>
                                             <th class="text-start text-uppercase text-xxs font-weight-bolder"> ACTION</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          @if ($user_manager->count())
                                          @foreach($user_manager as $key => $user)
                                          @php $image = DB::table('user_data')->select('profile_image')->where('user_id',$user->id)->first(); @endphp
                                          <tr>
                                             {{--
                                             <td>
                                                <div class="d-flex px-2 py-1">
                                                   <div class="d-flex flex-column justify-content-center">
                                                      <p class="mb-0 text-sm">{{($users->currentPage()-1)*$perPage+$key +1 }}</p>
                                                   </div>
                                                </div>
                                             </td>
                                             --}}
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
                                                   <h6 class="mb-0 text-sm">{{ DB::table('user_data')->select('phone_number')->where('user_id',$user->id)->first()->phone_number; }}</h6>
                                                </div>
                                             </td>
                                             <td class="align-middle completed-task text-sm" emplotee-id="{{$user->id}}">
                                                <p class="text-xs text-secondary mb-0"><b>0</b>
                                                </p>
                                             </td>
                                             <td class="align-middle assign-list" emplotee-id="{{$user->id}}">
                                                <span class="text-secondary text-xs font-weight-bold">{{DB::table('assign_task')->where('employee_id',$user->id)->count()}}</span>
                                             </td>
                                             <td class="align-middle assigntask-list" emplotee-id="{{$user->id}}">
                                                <span class="text-secondary text-xs font-weight-bold">{{DB::table('assign_task')->where('employee_id',$user->id)->count()}}</span>
                                             </td>
                                             <td class="align-middle" emplotee-id="{{$user->id}}">
                                                <span class="text-secondary text-xs font-weight-bold">0</span>
                                             </td>
                                             <td class="align-middle">
                                                <a rel="tooltip" href="{{route('students',$user->id)}}" class="btn mb-0 btn-success btn-link bg-dark" data-original-title="" title="">
                                                   <i class="bi bi-pencil-square"></i>
                                                   <div class="ripple-container"></div>
                                                </a>
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
            @if(auth()->user()->role == 'super_admin' || auth()->user()->role == 'Admin' || auth()->user()->role == 'Manager')
            <div class="tab-pane fade active show" id="nav-nsp" role="tabpanel" aria-labelledby="nav-nsp-tab">
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
                                 <!--  <div class="d-flex align-items-center justify-content-end mb-2" style="padding: 0 15px;">
                                    <div class="col-md-7 col-12">
                                       <div class="row dropdown filter-bg">
                                             <div class="col-md-6">
                                                <div class="filter-by input-group input-group-outline">
                                                <label>
                                                   <input wire:model="search_name" type="text" class="form-control" placeholder="Search by name..."/>
                                                   </label>
                                                </div>
                                             </div>
                                       </div>
                                    </div> -->
                                 <div class=" justify-content-between d-flex">
                                    <!--  <div class="showing-results input-group input-group-outline d-flex mt-0 custom-showing align-items-center justify-content-end">
                                       <span class="text-center text-uppercase text-xs font-weight-bolder px-2 ">Results Per Page: &nbsp;</span>
                                       <select wire:model="perPage" class="input-group input-group-outline select-custom-clg">
                                          <option>10</option>
                                          <option>20</option>
                                          <option>50</option>
                                          <option>100</option>
                                          <option>500</option>
                                          <option>1000</option>
                                       </select>
                                       </div> -->
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
                                          {{--
                                          <th class="text-uppercase text-xxs font-weight-bolder">
                                             S. No.
                                          </th>
                                          --}}
                                          <th class="text-uppercase  text-xxs font-weight-bolder " style="width: 10%;">
                                             PHOTO
                                          </th>
                                          <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                             NAME
                                          </th>
                                          <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                             PHONE
                                          </th>
                                          <th class="text-start text-uppercase  text-xxs font-weight-bolder">
                                             Completed Task
                                          </th>
                                          <th class="text-start text-uppercase  text-xxs font-weight-bolder ">
                                             Pending Task
                                          </th>
                                          <th class="text-start text-uppercase  text-xxs font-weight-bolder">
                                             Assigned Task
                                          </th>
                                          <th class="text-start text-uppercase  text-xxs font-weight-bolder">
                                             Rejected Task
                                          </th>
                                          <th class="text-start text-uppercase text-xxs font-weight-bolder"> ACTION</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       @if ($user_teamlead->count())
                                       @foreach($user_teamlead as $key => $user)
                                       @php $image = DB::table('user_data')->select('profile_image')->where('user_id',$user->id)->first(); @endphp
                                       <tr>
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
                                                <h6 class="mb-0 text-sm">{{ DB::table('user_data')->select('phone_number')->where('user_id',$user->id)->first()->phone_number; }}</h6>
                                             </div>
                                          </td>
                                          <td class="align-middle completed-task text-sm" emplotee-id="{{$user->id}}">
                                             <p class="text-xs text-secondary mb-0"><b>0</b>
                                             </p>
                                          </td>
                                          <td class="align-middle assign-list" emplotee-id="{{$user->id}}">
                                             <span class="text-secondary text-xs font-weight-bold">{{DB::table('assign_task')->where('employee_id',$user->id)->count()}}</span>
                                          </td>
                                          <td class="align-middle assigntask-list" emplotee-id="{{$user->id}}">
                                             <span class="text-secondary text-xs font-weight-bold">{{DB::table('assign_task')->where('employee_id',$user->id)->count()}}</span>
                                          </td>
                                          <td class="align-middle" emplotee-id="{{$user->id}}">
                                             <span class="text-secondary text-xs font-weight-bold">0</span>
                                          </td>
                                          <td class="align-middle">
                                             <a rel="tooltip" href="{{route('students',$user->id)}}" class="btn mb-0 btn-success btn-link bg-dark" data-original-title="" title="">
                                                <i class="bi bi-pencil-square"></i>
                                                <div class="ripple-container"></div>
                                             </a>
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
         @if(auth()->user()->role == 'super_admin' || auth()->user()->role == 'Admin' || auth()->user()->role == 'Manager' || auth()->user()->role == 'Team Leader')
         <div class="tab-pane fade active show" id="nav-bank" role="tabpanel" aria-labelledby="nav-bank-tab">
            <div class="accordion-body">
               <div class="row">
                  <div class="col-md-12">
                  </div>
                  <div class="col-12">
                     <h2>{{count($user_employee)}} Employee</h2>
                     <input type="hidden" value="Admin" id="employee_role">
                     <div class="card-body px-0 pb-2 task-table" style="background-color: #fff; border-radius: 8px;">
                        <div class="row1">
                           <div class="custom-container">
                              <!--  <div class="d-flex align-items-center justify-content-end mb-2" style="padding: 0 15px;">
                                 <div class="col-md-7 col-12">
                                    <div class="row dropdown filter-bg">
                                          <div class="col-md-6">
                                             <div class="filter-by input-group input-group-outline">
                                             <label>
                                                <input wire:model="search_name" type="text" class="form-control" placeholder="Search by name..."/>
                                                </label>
                                             </div>
                                          </div>
                                    </div>
                                 </div> -->
                              <div class=" justify-content-between d-flex">
                                 <!--  <div class="showing-results input-group input-group-outline d-flex mt-0 custom-showing align-items-center justify-content-end">
                                    <span class="text-center text-uppercase text-xs font-weight-bolder px-2 ">Results Per Page: &nbsp;</span>
                                    <select wire:model="perPage" class="input-group input-group-outline select-custom-clg">
                                       <option>10</option>
                                       <option>20</option>
                                       <option>50</option>
                                       <option>100</option>
                                       <option>500</option>
                                       <option>1000</option>
                                    </select>
                                    </div> -->
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
                                       {{--
                                       <th class="text-uppercase text-xxs font-weight-bolder">
                                          S. No.
                                       </th>
                                       --}}
                                       <th class="text-uppercase  text-xxs font-weight-bolder " style="width: 10%;">
                                          PHOTO
                                       </th>
                                       <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                          NAME
                                       </th>
                                       <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                          PHONE
                                       </th>
                                       <th class="text-start text-uppercase  text-xxs font-weight-bolder">
                                          Completed Task
                                       </th>
                                       <th class="text-start text-uppercase  text-xxs font-weight-bolder ">
                                          Pending Task
                                       </th>
                                       <th class="text-start text-uppercase  text-xxs font-weight-bolder">
                                          Assigned Task
                                       </th>
                                       <th class="text-start text-uppercase  text-xxs font-weight-bolder">
                                          Rejected Task
                                       </th>
                                       <th class="text-start text-uppercase text-xxs font-weight-bolder"> ACTION</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @if ($user_employee->count())
                                    @foreach($user_employee as $key => $user)
                                    @php $image = DB::table('user_data')->select('profile_image')->where('user_id',$user->id)->first(); @endphp
                                    <tr>
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
                                             <h6 class="mb-0 text-sm">{{ DB::table('user_data')->select('phone_number')->where('user_id',$user->id)->first()->phone_number; }}</h6>
                                          </div>
                                       </td>
                                       <td class="align-middle completed-task text-sm" emplotee-id="{{$user->id}}">
                                          <p class="text-xs text-secondary mb-0"><b>0</b>
                                          </p>
                                       </td>
                                       <td class="align-middle assign-list" emplotee-id="{{$user->id}}">
                                          <span class="text-secondary text-xs font-weight-bold">{{DB::table('assign_task')->where('employee_id',$user->id)->count()}}</span>
                                       </td>
                                       <td class="align-middle assigntask-list" emplotee-id="{{$user->id}}">
                                          <span class="text-secondary text-xs font-weight-bold">{{DB::table('assign_task')->where('employee_id',$user->id)->count()}}</span>
                                       </td>
                                       <td class="align-middle" emplotee-id="{{$user->id}}">
                                          <span class="text-secondary text-xs font-weight-bold">0</span>
                                       </td>
                                       <td class="align-middle">
                                          <a rel="tooltip" href="{{route('students',$user->id)}}" class="btn mb-0 btn-success btn-link bg-dark" data-original-title="" title="">
                                             <i class="bi bi-pencil-square"></i>
                                             <div class="ripple-container"></div>
                                          </a>
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
      <!-- <div class="tab-pane fade" id="nav-status" role="tabpanel" aria-labelledby="nav-payment-tab">
         <div class="accordion-body">
            <h1>test 5</h1>
         </div>
      </div> -->
      @endif
   </div>
</div>
</div>
</div>
</div>
</div>
</div>
@include('livewire.example-laravel.assigntask.assignStudent')
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

        $(document).on('click', '.admin-btn-tab', function() {
            $('.admin-btn-tab').addClass('active');
            $('#nav-basic').addClass('active show');
            $('.manager-btn-tab').removeClass('active');
            $('.teamlead-btn-tab').removeClass('active');
            $('.employee-btn-tab').removeClass('active');
            $('#nav-college').removeClass('active show');
            $('#nav-nsp').removeClass('active show');
            $('#nav-bank').removeClass('active show');
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
        });

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
            $('#assign-detail-modal').modal('hide');
            $('#assigntask-modal').modal('hide');
            $('#completedtask-modal').modal('hide');
        });

        $(document).on('click', '.assign-list', function() {
         $('.all-student-table').dataTable().fnDestroy();
         $('#Select-all-checkbox').prop('checked',false);
            if($(this).find('span').text() != '0'){
            var id = $(this).attr('emplotee-id');
           var dataTable1 = $('.all-student-table').DataTable({
                serverSide: true,
                ajax: {
                    type:"POST",
                    url: "{{ route('getAssignStudentId') }}",
                    data:  function (d) {
                        d.employee_id = id;
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                },
                'columnDefs': [{
                        'targets': 0,
                        'searchable':false,
                        'orderable':false,
                        'className': 'dt-body-center',
                        'render': function (data, type, full, meta){
                            return '<input type="checkbox" class="Select-single-checkbox" name="single_checkbox" value="'
                                + $('<div/>').text(data).html() + '">';
                        }
                    },
                    {
                        'targets': 11,
                        'searchable':false,
                        'orderable':false,
                        'className': 'dt-body-center',
                        'render': function (data, type, full, meta){
                            return '<button class="single-remove" user-id="" student-id="'+ $('<div/>').text(data).html() +'"><i class="fa fa-trash"></i></button>';
                        }
                    }
                ],
                "columns": [
                    {"data": "input"},
                    {"data": "sr_no"},
                    {"data": "student_name"},
                    {"data": "application_number"},
                    {"data": "dob"},
                    {"data": "bank_name"},
                    {"data": "account_number"},
                    {"data": "year"},
                    {"data": "college_name"},
                    {"data": "course_details"},
                    {"data": "status"},
                    {"data": "action"},

                ]
            });
            // $.ajax({
            //     type: 'POST',
            //     url: "",
            //     data: {
            //         'employee_id': $(this).attr('emplotee-id'),
            //         "_token": "{{ csrf_token() }}"
            //     },
            //     dataType: 'json',
            //     success: function(data) {
            //         $('.all-assign-stu').addClass('d-none');
            //         $.each(data, function(propName, propVal) {
            //             $('.student-'+propVal.student_id).removeClass('d-none');
            //         });
            //     }
            // });
            $('.reject-btn').attr('user-id',$(this).attr('emplotee-id'));
            $('.reassign-btn').attr('user-id',$(this).attr('emplotee-id'));
            $('.ch-per-btn').attr('user-id',$(this).attr('emplotee-id'));
            $('.single-remove').attr('user-id',$(this).attr('emplotee-id'));
            $('#assign-detail-modal').modal('show');
            }

        });

      //   $('#assign-detail-modal').on('hidden.bs.modal', function () {
      //       //$('.all-student-table').dataTable().fnDestroy();
      //   });

        $(document).on('change', '#Select-all-checkbox', function() {
            if($(this).is(':checked')) {
                var sele_val = new Array();
                $('.Select-single-checkbox').each(function() {
                    sele_val.push($(this).val());
                });
                $('.reject-btn').attr('student-id',sele_val);
                $('.reassign-btn').attr('student-id',sele_val);
                $('.ch-per-btn').attr('student-id',sele_val);
                $('.reject-btn').removeAttr('disabled');
                $('.reassign-btn').removeAttr('disabled');
                $('.ch-per-btn').removeAttr('disabled');
                $('input[type="checkbox"]').prop('checked',true);
            }else{
                $('.reject-btn').attr('student-id','');
                $('.reassign-btn').attr('student-id','');
                $('.ch-per-btn').attr('student-id','');
                $('.reject-btn').attr('disabled',true);
                $('.reassign-btn').attr('disabled',true);
                $('.ch-per-btn').attr('disabled',true);
                $('input[type="checkbox"]').prop('checked',false);
            }
        });

        $(document).on('change', '.Select-single-checkbox', function() {
            if($('.Select-single-checkbox').is(':checked')) {
                $('.reject-btn').removeAttr('disabled');
                $('.reassign-btn').removeAttr('disabled');
                $('.ch-per-btn').removeAttr('disabled');
            }else{
                $('.reject-btn').attr('disabled',true);
                $('.reassign-btn').attr('disabled',true);
                $('.ch-per-btn').attr('disabled',true);
            }
            var checkboxValues = [];
            $('input[name=single_checkbox]:checked').map(function() {
                checkboxValues.push($(this).val());
            });
            $('.reject-btn').attr('student-id',checkboxValues);
            $('.reassign-btn').attr('student-id',checkboxValues);
            $('.ch-per-btn').attr('student-id',checkboxValues);
        });

        $(document).on('click', '.assigntask-list', function() {
            if($(this).find('span').text() != '0'){
            var id = $(this).attr('emplotee-id');
           var dataTable1 = $('.assign-student-table').DataTable({
                serverSide: true,
                ajax: {
                    type:"POST",
                    url: "{{ route('getAssignStudentId') }}",
                    data:  function (d) {
                        d.employee_id = id;
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                },
                "columns": [
                    {"data": "sr_no"},
                    {"data": "student_name"},
                    {"data": "application_number"},
                    {"data": "dob"},
                    {"data": "bank_name"},
                    {"data": "account_number"},
                    {"data": "year"},
                    {"data": "college_name"},
                    {"data": "course_details"},
                   {"data": "status"}
                ]
            });
            $('#assigntask-modal').modal('show');
        }
        });

        $('#assigntask-modal').on('hidden.bs.modal', function () {
            $('.assign-student-table').dataTable().fnDestroy();
        });
        // $(document).on('click', '.completed-task', function() {
        //     $.ajax({
        //         type: 'POST',
        //         url: "{{ route('getAssignStudentId') }}",
        //         data: {
        //             'employee_id': $(this).attr('emplotee-id'),
        //             "_token": "{{ csrf_token() }}"
        //         },
        //         dataType: 'json',
        //         success: function(data) {
        //             $('.all-assign-stu').addClass('d-none');
        //             $.each(data, function(propName, propVal) {
        //                 $('.student-'+propVal.student_id).removeClass('d-none');
        //             });
        //         }
        //     });
        //     $('#completedtask-modal').modal('show');
        // });
        $(document).on('click', '.reject-btn,.single-remove', function() {
            let isExecuted = confirm('Are you sure want to delete this record ?');
            if (isExecuted == true) {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('removeTask') }}",
                    data: {
                        'employee_id': $(this).attr('user-id'),
                        'student_id':  $(this).attr('student-id'),
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: 'json',
                    success: function(data) {
                        location.reload();
                    }
                });
            }
        });

        $(document).on('click', '.reassign-btn', function() {
            $('#remarks').val('');
            $('#reassign-form').trigger('reset');
            // $.ajax({
            //     type: 'POST',
            //     url: "{{ route('getReassigneUser') }}",
            //     data: {
            //         'role': $('#employee_role').val(),
            //         'id':$(this).attr('user-id'),
            //         "_token": "{{ csrf_token() }}"
            //     },
            //     dataType: 'html',
            //     success: function(data) {
            //         $('#reassign-list').html(data);
            //     }
            // });
            $('#reassign-student-id').val($(this).attr('student-id'));
            $('#reassign-employee_id').val($(this).attr('user-id'));
            $('#reassign-modal').modal('show');
        });
        $(document).on('click', '.ch-per-btn', function() {
            $('#permission-form').trigger('reset');
            $('#permission-student-id').val($(this).attr('student-id'));
            $('#permission-employee_id').val($(this).attr('user-id'));
            $('#permission-modal').modal('show');
        });
        $(document).on('click', '.reassign-close', function() {
            $('#reassign-modal').modal('hide');
        });
        $(document).on('click', '.permission-close', function() {
            $('#permission-modal').modal('hide');
        });

        $(document).on('keyup', '#remarks', function() {
            if($(this).val() != '' && $('#reassign-list').val() != ''){
                $('#assign-save-btn').removeAttr('disabled');
            }else{
                $('#assign-save-btn').attr('disabled',true);
            }
        });

        $(document).on('change', '#admin-dropdown,#manager-dropdown,#teamleader-dropdown,#employee-dropdown', function() {
            console.log($(this).val());
            if($(this).val() != '' && $('#remarks').val() != ''){
                $('#assign-save-btn').removeAttr('disabled');
            }else{
                $('#assign-save-btn').attr('disabled',true);
            }
        });

        $(document).on('click', '#permission-save-btn', function() {
            $.ajax({
                type: 'POST',
                url: "{{ route('changePermission') }}",
                data: {
                    'employee_id': $('#permission-employee_id').val(),
                    'student_id': $('#permission-student-id').val(),
                    'contacts_permission': $('#contacts_permission').val(),
                    'aadhar_permission': $('#aadhar_permission').val(),
                    'application_permission': $('#application_permission').val(),
                    'bank_permission': $('#bank_permission').val(),
                    "_token": "{{ csrf_token() }}"
                },
                dataType: 'html',
                success: function(data) {
                  // $('#assign-detail-modal').modal('hide');
                  // $.toast('Here you can put the text of the toast')
                    location.reload();
                }
            });
        });

        $(document).on('click', '#assign-save-btn', function() {
            $.ajax({
                type: 'POST',
                url: "{{ route('updateReassignTask') }}",
                data: {
                    'employee_id': $('#reassign-employee_id').val(),
                    'student_id': $('#reassign-student-id').val(),
                    'new_employee': $('#reassign-list').val(),
                    'remarks': $('#remarks').val(),
                    "_token": "{{ csrf_token() }}"
                },
                dataType: 'html',
                success: function(data) {
                    location.reload();
                }
            });
        });

        $(document).on('change', '#admin-dropdown', function() {
            if($(this).val() != ''){
                $('#manager-dropdown option').prop('selected',false);
                $('#teamleader-dropdown option').prop('selected',false);
                $('#employee-dropdown option').prop('selected',false);
                $('#reassign-list').val($(this).val());
            }else{
                $('#reassign-list').val('');
            }
        });
        $(document).on('change', '#manager-dropdown', function() {
            if($(this).val() != ''){
                $('#admin-dropdown option').prop('selected',false);
                $('#teamleader-dropdown option').prop('selected',false);
                $('#employee-dropdown option').prop('selected',false);
                $('#reassign-list').val($(this).val());
            }else{
                $('#reassign-list').val('');
            }
        });
        $(document).on('change', '#teamleader-dropdown', function() {
            if($(this).val() != ''){
                $('#manager-dropdown option').prop('selected',false);
                $('#admin-dropdown option').prop('selected',false);
                $('#employee-dropdown option').prop('selected',false);
                $('#reassign-list').val($(this).val());
            }else{
                $('#reassign-list').val('');
            }
        });
        $(document).on('change', '#employee-dropdown', function() {
            if($(this).val() != ''){
                $('#manager-dropdown option').prop('selected',false);
                $('#teamleader-dropdown option').prop('selected',false);
                $('#admin-dropdown option').prop('selected',false);
                $('#reassign-list').val($(this).val());
            }else{
                $('#reassign-list').val('');
            }
        });
   });
</script>
