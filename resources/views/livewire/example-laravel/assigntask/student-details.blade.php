@include('components.include.header')
    <div class="row student-po-abcd">
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

            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                </div>
                 <div class="me-4 my-2">
                    <div class="text-end"><button class="btn bg-dark assign-task-btn mb-0 my-auto rounded-pill text-white text-capitalize pulse-button"  disabled>Assign task</button></div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive st-detail " style="padding-top: 2rem;">
                            <div id="order-listing_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                <div class="row  mb-2">
                                    <div class="col-md-6 col-12">

                                    <div class="dropdown">`
                                            <div class="filter-by input-group input-group-outline mb-5">
                                                    <label for="filter" class="form-label align-items-center"><span><i class="fa fa-filter"></i> Filter by</span>
                                                    <input name="search" id="search-list" class="form-control" list="datalistOptions" placeholder="Search by year...">
                                                </label>
                                                <datalist id="datalistOptions">
                                                    <option value="Pending">Pending</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                    <option value="2025">2025</option>
                                                </datalist>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="selected-student">
                                            <p> Student Selected <span id="selected-student-count">0</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table align-items-center mb-0 student-table sample_data">
                                            <thead>
                                                <tr class="bg-dark">
                                                    <th class="text-uppercase text-xxs font-weight-bolder ps-4"><input type="checkbox" id="Select-all-checkbox" class="mt-2 ms-3"></th>
                                                    <th class="text-uppercase text-xxs font-weight-bolder">
                                                        NAME</th>
                                                    <th class="text-uppercase text-xxs font-weight-bolder">
                                                        APPLICATION NO.
                                                    </th>
                                                    <th class="text-uppercase text-xxs font-weight-bolder">
                                                        DoB</th>
                                                    <th class="text-uppercase text-xxs font-weight-bolder">
                                                        bank name</th>
                                                    <th class="text-uppercase text-xxs font-weight-bolder">
                                                        account number
                                                    </th>
                                                    <th class="text-uppercase text-xxs font-weight-bolder">
                                                        YEAR</th>
                                                    <th class="text-uppercase text-xxs font-weight-bolder">
                                                        College name
                                                    </th>
                                                    <th class="text-uppercase text-xxs font-weight-bolder">
                                                        course name
                                                    </th>
                                                    <th class="text-uppercase text-xxs font-weight-bolder">
                                                        status
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    @if ($students->count())
                                                    @foreach ($students as $key => $student)
                                                   <td>
                                                        <div class="user-chk-bx py-1 px-2">
                                                            <div class="ps-2">
                                                            <input type="checkbox" name="single_checkbox" value="{{$student->id}}" class="Select-single-checkbox">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" justify-content-end">
                                                            <h6 class="mb-0 text-sm">{{ $student->student_name }}</h6>

                                                        </div>
                                                    </td>
                                                    <td class="">
                                                        <div class="">
                                                            <div class="d-flex flex-column justify-content-end">
                                                                <span class="text-secondary text-xs font-weight-bold">{{ $student->application_number }}</span>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td class="align-middle text-sm">
                                                        <p class="text-xs text-secondary mb-0">
                                                            {{ $student->dob }}
                                                        </p>
                                                    </td>
                                                    <td class="align-middle">
                                                        <span class="text-secondary text-xs font-weight-bold">{{ $student->bank_name }}</span>
                                                    </td>
                                                    <td class="align-middle">
                                                        <span class="text-secondary text-xs font-weight-bold">{{ $student->account_number }}</span>
                                                    </td>
                                                    <td class="align-middle">
                                                        <span class="text-secondary text-xs font-weight-bold">{{ $student->year }}</span>
                                                    </td>
                                                    <td class="align-middle">
                                                        <span class="text-secondary text-xs font-weight-bold">{{ $student->college_name }}</span>
                                                    </td>
                                                    <td class="align-middle">
                                                        <span class="text-secondary text-xs font-weight-bold">{{ $student->course_details }}</span>
                                                    </td>
                                                    <td class="align-middle ">
                                                        <span class="text-secondary text-xs font-weight-bold">1</span>
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
                                        {{--<div>
                                        <div class="custom-pagination d-flex aling-items-center justify-content-space-between">
                                        {{ $students->links() }} </div></div>--}}
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
<div class="modal fade" id="remark-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered task-modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Task Remarks</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="assign-form" action="{{route('createAssignTask')}}" method="POST">
                @csrf
            <div class="modal-body">
              <div class="task-area">
                <textarea type="text" class=" w-100 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="remarks" id="remarks"></textarea>
              </div>
                <div class="perm-area area01">
                    <h6 class="text-center">Permission to show details of task</h6>
                    <div class="row">
                        <input type="hidden" name="student_id" value="" id="student-id">
                        <input type="hidden" name="employee_id" value="{{$id}}" id="employee_id">
                        <div class="col-md-6">
                            <label for="role" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Contacts</label><br />
                            <select name="contacts_permission" id="contacts_permission" class=" w-100 appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="role" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Aadhar</label><br />
                            <select name="aadhar_permission" id="aadhar_permission" class=" w-100 appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                            </select>
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-md-6">
                            <label for="role" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Tr Number</label><br />
                            <select name="application_permission" id="application_permission" class=" w-100 appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="role" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Bank Details</label><br />
                            <select name="bank_permission" id="bank_permission" class=" w-100 appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-cancel close" data-dismiss="modal">Cancel</button>
               <button type="submit" class="btn crop-btn" id="assign-save-btn" disabled>Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js" defer="defer"></script>
<script language="JavaScript">
    $(document).ready(function() {

        $(".fa-search").click(function() {
            $(".search-box").toggle();
            $("input[type='text']").focus();
        });

        $.fn.dataTable.ext.errMode = 'none';
        var dataTable = $('.sample_data').DataTable({
            "oLanguage": {
                "sLengthMenu": "RESULTS PER PAGE:  _MENU_ ",
            },
            "ordering": false
        });

        $("#search-list").change(function() {
            $.fn.dataTable.ext.search.push(
                function( settings, data, dataIndex ) {
                    return parseFloat(data[6])== $("#search-list").val()
                        ? true
                        : false
                }
            );
            dataTable.draw();
            $.fn.dataTable.ext.search.pop();
        });

        $("#search-list").change(function() {
            if($("#search-list").val() == ''){
                dataTable.draw();
                $.fn.dataTable.ext.search.pop();
            }
        });

        $("#search-list").keyup(function() {
            if($("#search-list").val() != ''){

            $.fn.dataTable.ext.search.push(
                function( settings, data, dataIndex ) {
                    return parseFloat(data[6])== $("#search-list").val()
                        ? true
                        : false
                }
            );
            dataTable.draw();
            $.fn.dataTable.ext.search.pop();
        }else{
            dataTable.draw();
            $.fn.dataTable.ext.search.pop();
        }
        });

        $(document).on('change', '#Select-all-checkbox', function() {
            if($(this).is(':checked')) {
                var sele_val = new Array();
               $('.Select-single-checkbox').each(function() {
                    sele_val.push($(this).val());
                });
                $('#student-id').val(sele_val);
                $('.assign-task-btn').removeAttr('disabled');
               $('input[type="checkbox"]').prop('checked',true);
            }else{
               $('#student-id').val('');
                $('.assign-task-btn').attr('disabled',true);
               $('input[type="checkbox"]').prop('checked',false);
            }
            $('#selected-student-count').text($('input[name=single_checkbox]:checked').length);
        });

        $(document).on('click', '.assign-task-btn', function() {
            $('#remark-modal').modal('show');
        });

        $(document).on('click', '.close', function() {
            $('#remark-modal').modal('hide');
        });

        $(document).on('keyup', '#remarks', function() {
            if($(this).val() != ''){
                $('#assign-save-btn').removeAttr('disabled');
            }else{
                $('#assign-save-btn').attr('disabled',true);
            }
        });

        $(document).on('change', '.Select-single-checkbox', function() {
            $('#selected-student-count').text($('input[name=single_checkbox]:checked').length);
            if($('.Select-single-checkbox').is(':checked')) {
                $('.assign-task-btn').removeAttr('disabled');
            }else{
                $('.assign-task-btn').attr('disabled',true);
            }
            var checkboxValues = [];
            $('input[name=single_checkbox]:checked').map(function() {
                checkboxValues.push($(this).val());
            });
            $('#student-id').val(checkboxValues);
        });

        // $(document).on('change', '.assign-save-btn', function() {
        //     $.ajax({
        //         type: 'POST',
        //         url: "{{ route('createAssignTask') }}",
        //         data: {
        //             'employee_id': '{{$id}}',
        //             'student_id': $('#student_id').val(),
        //             'remarks': $('#remarks').val(),
        //             'contacts_permission': $('#contacts_permission').val(),
        //             'aadhar_permission': $('#aadhar_permission').val(),
        //             'application_permission': $('#application_permission').val(),
        //             'bank_permission': $('#bank_permission').val(),
        //             "_token": "{{ csrf_token() }}"
        //         },
        //         dataType: 'html',
        //         success: function(data) {
        //             $this.val(data);
        //         }
        //     });
        // });

      });
    </script>
</html>
