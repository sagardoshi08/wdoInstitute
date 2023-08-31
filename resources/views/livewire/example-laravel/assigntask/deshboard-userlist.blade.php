<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700">
@include('components.include.header')
<style>
    div.dataTables_wrapper div.dataTables_filter {
      text-align: left;
   }
</style>
<div>
   <!-- Navbar -->
   <!-- End Navbar -->
   <div class="container-fluid py-4 assign-task-tab">
      <!-- New Dashboard Starts -->
      <div class="main-dashboard mb-5">
         <div class="main-dashboard-inner">
            <div class="shadow-no" id="dashboard-cards">
               <div class="" id="nav-tabContent">
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
                              <h2> TOTAL ASSIGN TASK</h2>
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
                                                {{--<th class="text-uppercase text-xxs font-weight-bolder" data-orderable="false">
                                                    <input type="checkbox" id="adminmultiselect">
                                                </th>--}}
                                                <th class="text-uppercase text-xxs font-weight-bolder">
                                                   S.No
                                                </th>
                                                <th class="text-uppercase  text-xxs font-weight-bolder " style="width: 10%;">
                                                   Application No
                                                </th>
                                                <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                   NAME
                                                </th>
                                                <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                                   Date Of Birth
                                                </th>
                                                <th class="text-start text-uppercase  text-xxs font-weight-bolder">
                                                   Year
                                                </th>
                                                <th class="text-start text-uppercase  text-xxs font-weight-bolder ">
                                                   College
                                                </th>
                                                <th class="text-start text-uppercase  text-xxs font-weight-bolder">
                                                   Mobile
                                                </th>
                                                <th class="text-start text-uppercase  text-xxs font-weight-bolder">
                                                  Account No
                                                </th>
                                                <th class="text-start text-uppercase  text-xxs font-weight-bolder">
                                                  Account Status
                                                </th>
                                                <th class="text-start text-uppercase  text-xxs font-weight-bolder">
                                                  Course
                                                </th>
                                                <th class="text-start text-uppercase text-xxs font-weight-bolder"> ACTION</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                          @if ($student->count())
                                             @foreach($student as $key => $user)
                                             <tr>
                                             {{--<td><input type="checkbox" class="single-che" name="single_checkbox" value="{{$user->id}}"></td>--}}
                                                <td class="w-8">
                                                   <div class="pe-4 ">
                                                      <div class="d-flex flex-column justify-content-center align-items-center">{{$key + 1}}
                                                      </div>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{$user->application_permission == 'No' ? '-': $user->application_number}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{$user->student_name}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{$user->dob}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{$user->year}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{$user->college_name}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{$user->contacts_permission == 'No' ? '-': $user->phone_number}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{$user->application_permission == 'No' ? '-': $user->bank_permission}}</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm" style="color:red;">Not Varified Yet</h6>
                                                   </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column justify-content-end">
                                                      <h6 class="mb-0 text-sm">{{$user->course_details}}</h6>
                                                   </div>
                                                </td>
                                                <td class="align-middle">
                                                   {{--<a rel="tooltip" href="{{route('studentEdit',$user->id)}}" class="btn mb-0 btn-success btn-link bg-dark" data-original-title="" title="">
                                                      <i class="fa fa-pencil"></i>
                                                   </a>--}}
                                                   <a rel="tooltip" href="{{route('assignStudentView',$user->id)}}" class="btn mb-0 btn-success btn-link bg-dark" data-original-title="" title="">
                                                      <i class="fa fa-eye"></i>
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
   </div>
</div>
@include('components.include.footer')
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

        $(document).on('change', '.single-che', function() {
         var input = $(this).parents('table').find('tbody :checkbox').length;
         var check_input = $(this).parents('table').find('tbody :checked').length;
         if(input != check_input){
            $(this).parents('table').find('tr th :checkbox').prop('checked', false);
         }else{
            $(this).parents('table').find('tr th :checkbox').prop('checked', true);
         }
         if(check_input > 0){
            $('.get-user-name').prop('disabled',false);
         }else{
            $('.get-user-name').prop('disabled',true);
         }
        });
   });
</script>
