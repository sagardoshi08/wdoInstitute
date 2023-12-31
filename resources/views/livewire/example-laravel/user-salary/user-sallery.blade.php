<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700">
@include('components.include.header')
<style>
   div.dataTables_wrapper div.dataTables_filter {
      text-align: left;
   }
   .month-header-btn{
      width: 20%;
      position: relative;
      top: 85px;
      z-index: 9;
      left: 327px;
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
               <form  method="GET" action="{{ route('userSallery') }}">
                  <div class="month-header-btn header-btn">
                     <input type="month" name="month_salary_inp" class="form-control form-control month_salary_inp w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " value="{{$filter_date}}">
                     <a href="{{ route('userSallery')}}" class="ml-2 btn-primary cleri">Clear Filter</a>
                  </div>
                  <button type="submit" class="btn-primary d-none submit-btn">Submit</button>

               </form>
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
                              @if(auth()->user()->role == 'super_admin')
								  <h2>{{count($alluser)}} All Users</h2>
							  @else
								  <h2>Salary Info</h2>
							  @endif
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
                                                    Year
                                                </th>
                                                <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                    Month
                                                </th>
                                                <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                    Working hours
                                                </th>
                                                <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                    Active Hours
                                                </th>
                                                <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                    Due Hours
                                                </th>
                                                <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                   Working Days
                                                </th>
                                                <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                   Total salary
                                                </th>
                                                <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                   Payable Amount
                                                </th>
                                                <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                   Deducted Amount
                                                </th>
                                                <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                   Action
                                                </th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             @if ($alluser->count())
                                             @foreach($alluser as $key => $user)
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
                                                      <h6 class="mb-0 text-sm">{{ $user->role }}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column justify-content-end">
                                                       <h6 class="mb-0 text-sm">{{ $user->year_salary}}</h6>
                                                       {{-- <h6 class="mb-0 text-sm">{{ date('Y') }}</h6>--}}
                                                    </div>
                                                 </td>
                                                 <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{ $user->month_salary}}</h6>
                                                      {{-- <h6 class="mb-0 text-sm">{{ date('m') }}</h6>--}}
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{ $user->working_ours}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{$user->active_ours}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{$user->due_ours}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{ $user->working_days}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{$user->total_salary}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{$user->payable_amount}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{$user->deduted_amount}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm"><h6 class="mb-0 text-sm"><a href="{{route('viewSalary',[$user->id,$filter_date])}}"><i class="fa fa-eye"></i></a></h6></h6>
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
                                                   Year
                                               </th>
                                               <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                   Month
                                               </th>
                                               <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                   Working hours
                                               </th>
                                               <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                   Active Hours
                                               </th>
                                               <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                   Due Hours
                                               </th>
                                               <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                   Working Days
                                                </th>
                                               <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                   Total salary
                                                </th>
                                               <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                   Payable Amount
                                                </th>
                                                <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                   Deducted Amount
                                                </th>
                                                <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                   Action
                                                </th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             @if ($user_admin->count())
                                             @foreach($user_admin as $key => $user)
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
                                                      <h6 class="mb-0 text-sm">{{ $user->role }}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column justify-content-end">
                                                       <h6 class="mb-0 text-sm">{{ $user->year_salary}}</h6>
                                                    </div>
                                                 </td>
                                                 <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{ $user->month_salary}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{ $user->working_ours}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{$user->active_ours}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{$user->due_ours}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{ $user->working_days}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{$user->total_salary}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{$user->payable_amount}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{$user->deduted_amount}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm"><h6 class="mb-0 text-sm"><a href="{{route('viewSalary',[$user->id,$filter_date])}}"><i class="fa fa-eye"></i></a></h6></h6>
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
                                                Year
                                            </th>
                                            <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                Month
                                            </th>
                                            <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                Working hours
                                            </th>
                                            <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                Active Hours
                                            </th>
                                            <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                Due Hours
                                            </th>
                                            <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                   Working Days
                                             </th>
                                            <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                   Total salary
                                                </th>
                                            <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                   Payable Amount
                                             </th>
                                             <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                Deducted Amount
                                             </th>
                                             <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                Action
                                             </th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          @if ($user_manager->count())
                                          @foreach($user_manager as $key => $user)
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
                                                   <h6 class="mb-0 text-sm">{{ $user->role }}</h6>
                                                </div>
                                             </td>
                                             <td>
                                                    <div class="d-flex flex-column justify-content-end">
                                                       <h6 class="mb-0 text-sm">{{ $user->year_salary}}</h6>
                                                    </div>
                                                 </td>
                                                 <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{ $user->month_salary}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{ $user->working_ours}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{$user->active_ours}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{$user->due_ours}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{ $user->working_days}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{$user->total_salary}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{$user->payable_amount}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{$user->deduted_amount}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm"><h6 class="mb-0 text-sm"><a href="{{route('viewSalary',[$user->id,$filter_date])}}"><i class="fa fa-eye"></i></a></h6></h6>
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
                                             Year
                                         </th>
                                         <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                             Month
                                         </th>
                                         <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                             Working hours
                                         </th>
                                         <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                             Active Hours
                                         </th>
                                         <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                             Due Hours
                                         </th>
                                         <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                             Working Days
                                          </th>
                                         <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                             Total salary
                                          </th>
                                         <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                   Payable Amount
                                          </th>
                                          <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                             Deducted Amount
                                          </th>
                                          <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                             Action
                                          </th>
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
                                                <h6 class="mb-0 text-sm">{{ $user->role }}</h6>
                                             </div>
                                          </td>
                                          <td>
                                                    <div class="d-flex flex-column justify-content-end">
                                                       <h6 class="mb-0 text-sm">{{ $user->year_salary}}</h6>
                                                    </div>
                                                 </td>
                                                 <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{ $user->month_salary}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{ $user->working_ours}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{$user->active_ours}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{$user->due_ours}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{ $user->working_days}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{$user->total_salary}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{$user->payable_amount}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{$user->deduted_amount}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm"><h6 class="mb-0 text-sm"><a href="{{route('viewSalary',[$user->id,$filter_date])}}"><i class="fa fa-eye"></i></a></h6></h6>
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
                                             Year
                                         </th>
                                         <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                             Month
                                         </th>
                                         <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                             Working hours
                                         </th>
                                         <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                             Active Hours
                                         </th>
                                         <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                             Due Hours
                                         </th>
                                         <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                             Working Days
                                          </th>
                                         <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                             Total salary
                                          </th>
                                         <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                   Payable Amount
                                             </th>
                                             <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                Deducted Amount
                                             </th>
                                             <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                Action
                                             </th>
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
                                                <h6 class="mb-0 text-sm">{{ $user->role }}</h6>
                                             </div>
                                          </td>
                                          <td>
                                                    <div class="d-flex flex-column justify-content-end">
                                                       <h6 class="mb-0 text-sm">{{ $user->year_salary}}</h6>
                                                    </div>
                                                 </td>
                                                 <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{ $user->month_salary}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{ $user->working_ours}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{$user->active_ours}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{$user->due_ours}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{ $user->working_days}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{$user->total_salary}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{$user->payable_amount}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{$user->deduted_amount}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm"><a href="{{route('viewSalary',[$user->id,$filter_date])}}"><i class="fa fa-eye"></i></a></h6>
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
         <span style="color: red">Note: Break Time is deducted  from "Working Hours" data.</span>
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
        });

        $(document).on('change', '.month_salary_inp', function() {
           $('.submit-btn').click();
        });

   });
</script>
