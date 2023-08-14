@php
    function mintoHour($minutes){
        $hours = floor($minutes / 60);
        $min = $minutes - ($hours * 60);
        return abs($hours) ." Hour(s) ". $min." Mintes(s)";
    }
@endphp

<div class="row">
    <div class="card col-12">
       <div class="table-responsive pt-5 ">
          <div id="order-listing_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
            <form  method="GET" action="{{ route('attendance') }}">

             <div class="row align-items-center mb-2">
                <div class="col-md-3 col-12">
                    <div class="" style="margin-bottom: 50px;">
                        <select name="user_id" id="select_box" class="form-select select2" required>
                              <option value="">Select User</option>
                              @foreach($user as $usr)
                                 <option value="{{ $usr['id'] }}" {{ array_key_exists('user_id',$filter) && $filter['user_id'] == $usr['id'] ? 'selected' : '' }}>{{ $usr["name"] }}</option>
                              @endforeach
                        </select>
                    </div>

                 </div>
                 <div class="col-md-3 col-12">
                    <div class="" style="margin-bottom: 50px;">
                        <select name="time_interval" id="timeInterval" class="form-select select2" required>
                            <option value="" selected>Select month</option>
                            <option {{ array_key_exists('time_interval',$filter) && $filter['time_interval'] == 'current_month' ? 'selected' : '' }} value="current_month">Current month</option>
                            <option {{ array_key_exists('time_interval',$filter) && $filter['time_interval'] == 'one_month' ? 'selected' : '' }} value="one_month">Last one month</option>
                            <option {{ array_key_exists('time_interval',$filter) && $filter['time_interval'] == 'two_months' ? 'selected' : '' }} value="two_months">Last two months</option>
                            <option {{ array_key_exists('time_interval',$filter) && $filter['time_interval'] == 'three_months' ? 'selected' : '' }} value="three_months">Last three months</option>
                            <option {{ array_key_exists('time_interval',$filter) && $filter['time_interval'] == 'six_months' ? 'selected' : '' }} value="six_months">Last six months</option>
                            <option {{ array_key_exists('time_interval',$filter) && $filter['time_interval'] == 'one_year' ? 'selected' : '' }} value="one_year">Last one year</option>
                            <option {{ array_key_exists('time_interval',$filter) && $filter['time_interval'] == 'two_years' ? 'selected' : '' }} value="two_years">Last two years</option>
                        </select>
                    </div>

                 </div>
                {{--<div class="col-md-1 col-12 mb-5" style="text-align: right;">
                    <label for="filter" class="form-label align-items-center">To Date</label>
                </div>
                <div class="col-md-3 col-12">
                   <div class="dropdown">
                    <div class="filter-by input-group input-group-outline mb-5">
                       <input type="date" name="todate" class="form-control" max="{{date('Y-m-d')}}" value="{{ array_key_exists('todate',$data)? $data['todate']:''}}" required>
                     </div>
                   </div>
                </div>--}}
                <div class="col-md-3 ms-auto-none col-12 d-flex mb-5">
                    <button type="submit" class="btn-primary d-none submit-btn">Submit</button>&nbsp;&nbsp;&nbsp;
                    <a href="{{ route('attendance')}}" class="ml-2 btn-primary">Clear Filter</a>
                   {{-- <div class="print header-btn ms-2">
                      <span class="nav-link mb-0 ml-2 active " data-bs-toggle="tooltip" data-bs-placement="top" title="Print"><i class="fa fa-print" aria-hidden="true"></i></span>
                   </div>
                   <div class="export header-btn ms-2">
                      <a href="{{route('student_export')}}"><span class="nav-link mb-0  active" data-bs-toggle="tooltip" data-bs-placement="top" title="Export CSV"><i class="fas fa-file-export"></i></span></a>
                   </div> --}}
                </div>
             </div>
            </form>

             <div class="row">
                <div class="col-sm-12 scroll-p">
                   <table class="table align-items-center mb-0">
                      <thead>
                         <tr class="bg-dark">
                            <th class="text-uppercase text-xxs font-weight-bolder text-center">S. No.</th>
                            <th class="text-uppercase text-xxs font-weight-bolder text-start">User Name</th>
                            <th class="text-uppercase text-xxs font-weight-bolder ps-2 text-start">
                              User Role
                            </th>
                            <th class="text-uppercase text-xxs font-weight-bolder text-start">
                               Date
                            </th>
                            <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                Official Login Time
                             </th>
                             <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                Official Logout Time
                             </th>
                             <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                Late Login
                             </th>
                             <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                Total Officer Hours
                             </th>
                            <th class="text-uppercase text-xxs font-weight-bolder text-start">
                               Working Hours
                            </th>
                            <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                Due Hours
                             </th>
                             <th class="text-uppercase text-xxs font-weight-bolder text-start">
                               Status
                             </th>
                         </tr>
                      </thead>
                      <tbody>
                        @if ($Attendance->count())
                        @foreach ($Attendance as $key => $attend)
                         <tr>
                            <td>
                               <div class=" px-2 py-1">
                                  <div class="d-flex flex-column justify-content-center ps-2">
                                     <p class="mb-0 text-sm"><b>{{($Attendance->currentPage()-1)*10+$key +1}}</b></p>
                                  </div>
                               </div>
                            </td>
                            <td>
                               <div class=" justify-content-center">
                                  <h6 class="mb-0 text-sm">{{$attend->name}}</h6>
                               </div>
                            </td>
                            <td class="">
                               <div class="">
                                  <div class="d-flex flex-column justify-content-center ">
                                     <span class="text-secondary text-xs font-weight-bold ">{{$attend->role}}</span>
                                  </div>
                               </div>
                            </td>
                            <td class="align-middle  text-sm">
                               <p class="text-xs text-secondary mb-0">
                                {{$attend->attendance_date}}
                               </p>
                            </td>
                            <td class="align-middle  text-sm">
                                <p class="text-xs text-secondary mb-0">
                                    {{$attend->details ? $attend->details->start_time : '-'}}
                                </p>
                             </td>
                             <td class="align-middle  text-sm">
                                <p class="text-xs text-secondary mb-0">
                                    {{$attend->details ? $attend->details->end_time : '-'}}
                                </p>
                             </td>
                             <td class="align-middle  text-sm">
                                <p class="text-xs text-secondary mb-0">
                                    {{ $attend->latelogin ? $attend->latelogin : "-"}}
                                </p>
                             </td>
                             <td class="align-middle  text-sm">
                                <p class="text-xs text-secondary mb-0">
                                    {{$attend->details ? $attend->details->days_working_hour : '-'}}
                                </p>
                             </td>
                            <td class="align-middle">
                               <span class="text-secondary text-xs font-weight-bold">{{mintoHour($attend->working_hours)}}</span>
                               <a href="{{ route('login-logout-log',$attend->id) }}" target="_blank"><i class="fa fa-eye"></i></a>
                            </td>
                            <td class="align-middle  text-sm">
                                <p class="text-xs text-secondary mb-0">
                                 @if($attend->status != 0)
                                    {{$attend->details ? mintoHour($attend->details->days_working_hour*60 - $attend->working_hours) : '-'}}
                                @endif
                                </p>
                             </td>
                             <td class="align-middle  text-sm">
                                <p class="text-xs text-secondary mb-0">
                                    @if($attend->status == 0)
                                       {{"Absent"}}
                                    @elseif($attend->status == 1)
                                       {{"Present"}}
                                    @elseif($attend->status == 2)
                                       {{"Off Day"}}
                                    @elseif($attend->status == 3)
                                       {{"Leave"}}
                                    @else
                                       {{"HoliDay"}}
                                    @endif
                                </p>
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
                   <br>
                   {{-- {{ $students->links() }} --}}
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('change', '#select_box,#timeInterval', function() {
           $('.submit-btn').click();
        });
    });
</script>