@include('components.include.header')
@php
function mintoHour($minutes){
$hours = floor($minutes / 60);
$min = $minutes - ($hours * 60);
return (round($hours)) ." Hour(s) ". round($min)." Minute(s)";
}
@endphp
<style>
   .table-responsive .dataTables_wrapper .dataTables_length{
   font-weight: 700;
   font-size: 0.75rem;
   padding-right: 1.5rem;
   padding-left: 0.5rem;
   padding-top: 1rem;
   text-transform: uppercase;
   position: relative;
   left: 0px;
   }
</style>
<a class="back-sec" href="{{route('userSallery')}}">
   <i class="fa fa-long-arrow-left"></i>
   <p>Back</p>
</a>
<div class="container-fluid py-4 view">
   <div class="row">
      <div class="name_line">
         <div class="user_name_jk">
            <h4 class="col-sm-6 mt-3">
               <b style="color: #fff">Details</b>
            </h4>
            <h4 class="col-sm-6 mt-3" style="padding-left: 20px;">
               <b style="color: #fff">Admin</b>
            </h4>
         </div>
      </div>
      <div class="bg-white px-0 pb-0 sm:p-6 sm:pb-4">
         <div class="m-3 text-img">
            <img class="img-account-profile p-img" width="100px" height="100px" src="{{$data->profile_image ? asset('assets').'/'.$data->profile_image : asset('assets/img/images.png')}}" alt="">
            <div class=" add-user-form view-form">
               <div class="row">
                  <div class="row personal-till">
                     <div class="students-start col-lg-12 pl-4">
                        <div class="students-text">
                           <h4 class="card-title text-start">Personal Details</h4>
                        </div>
                        <div class="row students-start-col">
                           <input type="hidden" value="{{$data->id}}" id="user-id">
                           <input type="hidden" value="{{$data->month}}" id="current-month">
                           <input type="hidden" value="{{$data->year}}" id="filter-year">
                           <div class="col-sm-12 mt-1 col-lg-12">
                              <div class="form-group">
                                 <label for="userName" class="block text-gray-700 text-sm font-bold mb-0 text-start col-lg-6"><b>Name</b></label><br />
                                 <p>{{ $data->name }}</p>
                              </div>
                           </div>
                           <div class="col-sm-12 mt-1 col-lg-12">
                              <div class="form-group">
                                 <label for="father_name" class="block text-gray-700 text-sm font-bold text-start col-lg-6"><b>Father Name</b></label>
                                 <p>{{$user_data->father_name}}</p>
                              </div>
                           </div>
                           <div class="col-sm-12 mt-1 col-lg-12">
                              <div class="form-group">
                                 <label for="mother_name" class="block text-gray-700 text-sm font-bold text-start col-lg-6"><b>Mother Name</b></label>
                                 <p>{{$user_data->mother_name}}</p>
                              </div>
                           </div>
                           <div class="col-sm-12 mt-1 col-lg-12">
                              <div class="form-group">
                                 <label for="email" class="block text-gray-700 text-sm font-bold text-start col-lg-6"><b>Email Address</b></label><br />
                                 <p>{{$data->email}}</p>
                              </div>
                           </div>
                           <div class="col-sm-12 mt-1 col-lg-12">
                              <div class="form-group">
                                 <label for="dob" class="block text-gray-700 text-sm font-bold mb-0 text-start col-lg-6"><b>Date Of Birth</b></label><br />
                                 <p>{{$user_data->date_of_birth}}</p>
                              </div>
                           </div>
                           <div class="col-sm-12 mt-1 col-lg-12">
                              <div class="form-group">
                                 <label for="phone" class="block text-gray-700 text-sm font-bold mb-0 text-start col-lg-6"><b>Phone Number</b></label><br />
                                 <p>{{$user_data->phone_number}}</p>
                              </div>
                           </div>
                           <div class="col-sm-12 mt-1 col-lg-12">
                              <div class="form-group">
                                 <label for="role" class="block text-gray-700 text-sm font-bold mb-0 text-start col-lg-6"><b>Role</b></label><br />
                                 <p>{{$data->role}}</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- <div class="row">
                  <div class="students-start">
                      <div class="students-text">
                          <h4 class="card-title text-start">Filter</h4>
                      </div>
                      <div class="row students-start-col">


                      </div>
                  </div> -->
            </div>
            <div class="frustration col-lg-4 p-0">
               <h4 class="freus-text">FRUSTRATIONS</h4>
               <textarea id="text-fres01" name="text" rows="4" cols="40"></textarea>
               <h4 class="freus-text" style="margin-top: 11px;">GOAL</h4>
               <textarea id="text-fres01" name="text" rows="4" cols="40"></textarea>
            </div>
         </div>
         <h3 class="name-adm">
            <b class="img-name">{{ $data->name }}</b>
         </h3>
         <div class="name_line_p">
                <h3 class="name_sk">
                <b style="color: #fff">Salary Details</b>
                </h3>
            </div>
            <div class=" add-user-form view-form">
               <div class="row">
                  <div class="row personal-till">
                     <div class="students-start col-lg-12 pl-4">
                        <div class="row students-start-col">
                           <div class="col-sm-12 mt-1 col-lg-12">
                              <div class="form-group">
                                 <label for="userName" class="block text-gray-700 text-sm font-bold mb-0 text-start col-lg-6"><b>Year</b></label><br />
                                 <p>{{ date('Y') }}</p>
                              </div>
                           </div>
                           <div class="col-sm-12 mt-1 col-lg-12">
                              <div class="form-group">
                                 <label for="father_name" class="block text-gray-700 text-sm font-bold text-start col-lg-6"><b>Month</b></label>
                                 <p>{{$data->month}}</p>
                              </div>
                           </div>
                           <div class="col-sm-12 mt-1 col-lg-12">
                              <div class="form-group">
                                 <label for="mother_name" class="block text-gray-700 text-sm font-bold text-start col-lg-6"><b>Working Hours</b></label>
                                 <p>{{ $data->working_ours}}</p>
                              </div>
                           </div>
                           <div class="col-sm-12 mt-1 col-lg-12">
                              <div class="form-group">
                                 <label for="email" class="block text-gray-700 text-sm font-bold text-start col-lg-6"><b>Active Hours</b></label><br />
                                 <p>{{$data->active_ours}}</p>
                              </div>
                           </div>
                           <div class="col-sm-12 mt-1 col-lg-12">
                              <div class="form-group">
                                 <label for="dob" class="block text-gray-700 text-sm font-bold mb-0 text-start col-lg-6"><b>Due Hours</b></label><br />
                                 <p>{{$data->due_ours}}</p>
                              </div>
                           </div>
                           <div class="col-sm-12 mt-1 col-lg-12">
                              <div class="form-group">
                                 <label for="phone" class="block text-gray-700 text-sm font-bold mb-0 text-start col-lg-6"><b>Payable Amount</b></label><br />
                                 <p>{{$data->payable_amount}}</p>
                              </div>
                           </div>
                           <div class="col-sm-12 mt-1 col-lg-12">
                              <div class="form-group">
                                 <label for="role" class="block text-gray-700 text-sm font-bold mb-0 text-start col-lg-6"><b>Deducted Amount</b></label><br />
                                 <p>{{$data->deduted_amount}}</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- <div class="row">
                  <div class="students-start">
                      <div class="students-text">
                          <h4 class="card-title text-start">Filter</h4>
                      </div>
                      <div class="row students-start-col">


                      </div>
                  </div> -->
            </div>
            <div class="name_line_p cursor-pointer" id="view-more-btn">
                <h3 class="name_sk">
                <b style="color: #fff">View More</b>
                </h3>
            </div>
         <div class="d-none" id="login-history-data">
            <div class="name_line_p">
                <h3 class="name_sk">
                <b style="color: #fff">Form</b>
                </h3>
            </div>
            <div class="light-mon">
                <div class="m-3 text-img">
                <div class="col-sm-3 mt-4">
                    <div class="form-group">
                        <label for="dob" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start"><b>Select Month</b></label><br />
                        <select class="required form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 filter-month text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option selected value="">Select Month</option>
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">Aguest</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3 mt-4">
                    <div class="form-group">
                        <label for="fromdate" class=""><b>From Date</b></label><br />
                        <input type="date" id="fromdate" name="fromdate" class="form-control form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" max="{{date('Y-m-d')}}" value="{{ array_key_exists('fromdate',$filter)? $data['fromdate']:''}}" required>
                    </div>
                </div>
                <div class="col-sm-3 mt-4">
                    <div class="form-group">
                        <label for="todate" class=""><b>Todate</b></label><br />
                        <input type="date" id="todate" name="todate" class="form-control form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="todate" max="{{date('Y-m-d')}}" value="{{ array_key_exists('todate',$filter)? $data['todate']:''}}" required>
                    </div>
                </div>
                </div>
                <div class="m-3 text-img">
                <div class="col-sm-3 mt-3">
                    <div class="form-group">
                        <label for="total-working-hour" class=""><b>Total working hours</b></label><br />
                        <input type="text" id="total-working-hour" name="total_working_hour" class="form-control form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $data->working_ours}}">
                    </div>
                </div>
                <div class="col-sm-3 mt-3">
                    <div class="form-group">
                        <label for="total-active-hour" class=""><b>Total active hours</b></label><br />
                        <input type="text" id="total-active-hour" name="total_active_hour" class="form-control form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$data->active_ours}}">
                    </div>
                </div>
                <div class="col-sm-3 mt-3">
                    <div class="form-group">
                        <label for="total-due-hour" class=""><b>Total Due hours</b></label><br />
                        <input type="text" id="total-due-hour" name="total_due_hour" class="form-control form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$data->due_ours}}">
                    </div>
                </div>
                </div>
                <div class="m-3 text-img">
                <div class="col-sm-3 mt-3">
                    <div class="form-group">
                        <label for="total-extra-hour" class=""><b>Total Extra Working Hours</b></label><br />
                        <input type="text" id="total-extra-hour" name="total_extra_hour" class="form-control form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$data->EXTRA_ours}}">
                    </div>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="students-start">
                <div class="name_line_p">
                    <h3 class="name_sk">
                        <b style="color: #fff">Login Logout History</b>
                    </h3>
                </div>
                <div class="row students-start-col">
                    <div class="col-12">
                        <div class="table-responsive pt-5 ">
                            <table class="table align-items-center mb-0" id="attendance-table">
                            <thead>
                                <tr>
                                    <th>Sr no.</th>
                                    <th>Date</th>
                                    <th>Login time</th>
                                    <th>Logout time</th>
                                    <th>Total working hours</th>
                                    <th>Automatic logout</th>
                                    <th>Total active hours</th>
                                    <th>Due hours</th>
                                    <th>Extra working hours</th>
                                </tr>
                            </thead>
                            <tbody id="history-data">
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
</div>
</div>
@include('components.include.footer')
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js" defer="defer"></script>
<script>
   $(document).ready(function() {
      $('#attendance-table').DataTable({
       searching: false
   });

   $(document).on('click', '#view-more-btn', function() {
        $(this).addClass('d-none');
        $('#login-history-data').removeClass('d-none');
   });

   $('.filter-month').val($('#current-month').val());
   $.ajax({
               type: 'POST',
               url: "{{ route('filterAttendanceHistory') }}",
               data: {
                   'month': $('#current-month').val(),
                   'year' :  $('#filter-year').val(),
                   'form_date': $('#fromdate').val(),
                   'to_date': $('#todate').val(),
                   'user_id': $('#user-id').val(),
                   "_token": "{{ csrf_token() }}"
               },
               dataType: 'html',
               success: function(data) {
                   data = JSON.parse(data);
                   //$('#history-data').html(data);
                   $("#attendance-table").dataTable().fnDestroy()
                   $('#attendance-table').DataTable({
                       searching: false,
                   columns: [
                       { title: 'Sr no',data:'sr_no' },
                       { title: 'Date',data:'attendance_date' },
                       { title: 'Login time' ,data:'start_time'},
                       { title: 'Logout time' ,data:'end_time'},
                       { title: 'Total working hour' ,data:'workinghour'},
                       { title: 'Automatic logout' ,data:'autologout'},
                       { title: 'Total active hours',data:'active_hour' },
                       { title: 'Due hours' ,data:'duehour'},
                       { title: 'Extra working hours',data:'extrahour' }
                   ],
                   data: data.table_data
               });
               $('#attendance-table').DataTable().draw();
               }
           });

       $('#common-back').addClass('d-none');
       $(document).on('change', '.filter-month,#fromdate,#todate', function() {
           $.ajax({
               type: 'POST',
               url: "{{ route('filterAttendanceHistory') }}",
               data: {
                   'month': $('.filter-month').val(),
                   'form_date': $('#fromdate').val(),
                   'to_date': $('#todate').val(),
                   'user_id': $('#user-id').val(),
                   "_token": "{{ csrf_token() }}"
               },
               dataType: 'html',
               success: function(data) {
                   data = JSON.parse(data);
                   $('#total-working-hour').val(data.total_working_hour);
                   $('#total-active-hour').val(data.total_active_hour);
                   $('#total-due-hour').val(data.total_due_hour);
                   $('#total-extra-hour').val(data.total_extra_hour);
                   //$('#history-data').html(data);
                   $("#attendance-table").dataTable().fnDestroy()
                   $('#attendance-table').DataTable({
                       searching: false,
                   columns: [
                       { title: 'Sr no',data:'sr_no' },
                       { title: 'Date',data:'attendance_date' },
                       { title: 'Login time' ,data:'start_time'},
                       { title: 'Logout time' ,data:'end_time'},
                       { title: 'Total working hour' ,data:'workinghour'},
                       { title: 'Automatic logout' ,data:'autologout'},
                       { title: 'Total active hours',data:'active_hour' },
                       { title: 'Due hours' ,data:'duehour'},
                       { title: 'Extra working hours',data:'extrahour' }
                   ],
                   data: data.table_data
               });
               $('#attendance-table').DataTable().draw();
               }
           });
       });
   });
</script>
