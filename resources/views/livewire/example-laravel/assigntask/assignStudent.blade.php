<div class="modal fade " id="assign-detail-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered task-modal modal-xl assign-student" role="document">
        <div class="modal-content">
            <div class="modal-header p-0">
                <div class="title-area">
                    <div class="st-title">
                        <h5 class="modal-title fs-4" id="modalLabel">Pending Task</h5>
                        <div class="d-flex align-items-center">
                            <div class="pe-3">
                                <button class="reject-btn btn mb-0 my-auto" user-id="" student-id="" disabled><i class="fa fa-ban" style="padding-right: 3px;" aria-hidden="true"></i>Remove Selected Task</button>
                                <button class="reassign-btn btn mb-0 my-auto" user-id="" student-id="" disabled><i class="fa fa-user" style="padding-right: 3px;" aria-hidden="true"></i>Reassign</button>
                                <button class="ch-per-btn btn mb-0 my-auto" user-id="" student-id="" disabled><i class="fa fa-refresh" style="padding-right: 3px;" aria-hidden="true"></i>Change Permission</button>
                            </div>
                            <button type="button" class="close cl-btn" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-body w-100 px-0 task-table">
                <div>
                    <div>
                        <div class="table-responsive">
                            <div id="order-listing_wrapper" class="dataTables_wrapper  dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table align-items-center mb-0 all-student-table">
                                            <thead>
                                                <tr class="bg-dark">
                                                    <th class="text-uppercase text-xxs font-weight-bolder ps-4"><input type="checkbox" id="Select-all-checkbox" class="mt-2 ms-3"></th>
                                                    <th class="text-uppercase text-xxs font-weight-bolder">
                                                        Sr.No</th>
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
                                                    <th class="text-uppercase text-xxs font-weight-bolder">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
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
                <!---change permission modal--->
                <div class="modal fade btn-modal" id="permission-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered task-modal" role="document">
                            <div class="modal-content">
                                <div class="modal-head">
                                    <h5 class="modal-title" id="modalLabel">Change Permission</h5>
                                    <button type="button" class="permission-close cl-btn" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form id="permission-form">
                                    @csrf
                                <div class="modal-body">
                                    <div class="perm-area area01">
                                        <h6 class="text-center">Permission to show details of task</h6>
                                        <div class="row">
                                            <input type="hidden" name="permission_student_id" value="" id="permission-student-id">
                                            <input type="hidden" name="permission_employee_id" value="" id="permission-employee_id">
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
                                <button type="button" class="btn btn-cancel permission-close" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn crop-btn s-btn" id="permission-save-btn">Save</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!----Reassign modal--->
                <div class="modal fade btn-modal" id="reassign-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-head">
                                    <h5 class="modal-title" id="modalLabel">Reassign Task</h5>
                                    <button type="button" class="reassign-close cl-btn" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form id="reassign-form">
                                    @csrf
                                <div class="modal-body">
                                    <div class="perm-area area01">
                                        <div class="assign-re">
                                            <input type="hidden" name="reassign_student_id" value="" id="reassign-student-id">
                                            <input type="hidden" name="reassign_employee_id" value="" id="reassign-employee_id">
                                            <input type="hidden" name="employee" value="" id="reassign-list">
                                            @if(auth()->user()->role == 'super_admin')
                                            <div class="">
                                                <select name="admin_user" id="admin-dropdown" class="w-100 appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                    <option value="">Select Admin</option>
                                                    @foreach($admin as $data)
                                                        <option value="{{$data->id}}">{{$data->name}} ({{DB::table('assign_task')->where('employee_id',$data->id)->count()}} Pending)</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @endif
                                            @if(auth()->user()->role == 'super_admin' || auth()->user()->role == 'Admin')
                                            <div class="">
                                                <select name="manager_user" id="manager-dropdown" class="w-100 appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                <option value="">Select Manager</option>
                                                    @foreach($manager as $data)
                                                        <option value="{{$data->id}}">{{$data->name}} ({{DB::table('assign_task')->where('employee_id',$data->id)->count()}} Pending)</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @endif
                                            @if(auth()->user()->role == 'super_admin' || auth()->user()->role == 'Admin' || auth()->user()->role == 'Manager' || auth()->user()->role == 'Admin')
                                            <div class="">
                                                <select name="teamleader_user" id="teamleader-dropdown" class="w-100 appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                <option value="">Select
                                                    Team Leader
                                                </option>
                                                    @foreach($team_laeder as $data)
                                                        <option value="{{$data->id}}">{{$data->name}} ({{DB::table('assign_task')->where('employee_id',$data->id)->count()}} Pending)</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @endif
                                            <div class="">
                                                <select name="employee_user" id="employee-dropdown" class="w-100 appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                <option value="">Select Employee</option>
                                                    @foreach($employee as $data)
                                                        <option value="{{$data->id}}">{{$data->name}} ({{DB::table('assign_task')->where('employee_id',$data->id)->count()}} Pending)</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="">
                                            <textarea type="text" placeholder="Enter Remarks" class=" w-100 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="remarks" id="remarks"></textarea>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-cancel reassign-close" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn crop-btn s-btn" id="assign-save-btn" disabled>Save</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade " id="assigntask-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered task-modal modal-xl assign-student" role="document">
        <div class="modal-content">
            <div class="modal-header p-0">
                <div class="title-area">
                    <div class="st-title">
                        <h5 class="modal-title fs-4" id="modalLabel">Assigned Task</h5>
                        <div class="d-flex align-items-center">
                        {{--<div class="pe-3">
                                <button class="reject-btn btn mb-0 my-auto" student-id=""><i class="fa fa-ban" style="padding-right: 3px;" aria-hidden="true"></i>Reject Task</button>
                            </div>--}}
                            <button type="button" class="close cl-btn" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="modal-body w-100 px-0">

                <div>
                    <div >
                        <div class="table-responsive">
                            <div id="order-listing_wrapper" class="dataTables_wrapper container dt-bootstrap4 no-footer assigne-task-pop">
                                <div class="row">
                                    <div class="col-sm-12 p-0">
                                        <table class="table align-items-center mb-0 student-table assign-student-table">
                                            <thead>
                                                <tr class="bg-dark">
                                                    <!-- <th class="text-uppercase text-xxs font-weight-bolder ps-4"><input type="checkbox" id="Select-all-checkbox" class="mt-2 ms-3"></th> -->
                                                    <th class="text-uppercase text-xxs font-weight-bolder">
                                                        Sr No</th>
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
                                                    <!-- <th class="text-uppercase text-xxs font-weight-bolder">
                                                        Action
                                                    </th> -->
                                                </tr>
                                            </thead>
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
    </div>
</div>
<div class="modal fade" id="completedtask-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered task-modal modal-xl assign-student" role="document">
        <div class="modal-content">
            <div class="modal-header pt-4">
                <div class="title-area">
                    <div class="st-title">
                        <h5 class="modal-title fs-4" id="modalLabel">Completed Task</h5>
                        <div class="d-flex align-items-center">
                        {{--<div class="pe-3">
                                <button class="reject-btn btn mb-0 my-auto" student-id=""><i class="fa fa-ban" style="padding-right: 3px;" aria-hidden="true"></i>Reject Task</button>
                            </div>--}}
                            <button type="button" class="close cl-btn" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-body w-100 px-0">
                <div>
                    <div >
                        <div class="table-responsive">
                            <div id="order-listing_wrapper" class="dataTables_wrapper container dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table align-items-center mb-0 student-table all-student-table">
                                            <thead>
                                                <tr class="bg-dark">
                                                    {{--<th class="text-uppercase text-xxs font-weight-bolder ps-4"><input type="checkbox" id="Select-all-checkbox" class="mt-2 ms-3"></th>--}}
                                                    <th class="text-uppercase text-xxs font-weight-bolder">
                                                        Sr No</th>
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
                                                @if ($students->count())
                                                    @foreach ($students as $key => $student)
                                                    <tr class="all-assign-stu student-{{$student->id}}">
                                                   {{--<td>
                                                        <div class="user-chk-bx py-1 px-2">
                                                            <div class="ps-2">
                                                            <input type="checkbox" name="single_checkbox" value="{{$student->id}}" class="Select-single-checkbox">
                                                            </div>
                                                        </div>
                                                    </td>--}}
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
                                                    {{-- <td class="align-middle">
                                                        <button rel="tooltip" wire:click="edit('{{ $student->uuid }}','edit')" class="btn mb-0 btn-success btn-link bg-dark rounded-pill" href="" data-original-title="" title="">
                                                            <i class="bi bi-pencil-square"></i>
                                                            <div class="ripple-container"></div>
                                                        </button>
                                                        <button rel="tooltip" wire:click="edit('{{ $student->uuid }}','view')" class="btn mb-0 btn-success btn-link bg-dark rounded-pill" href="" data-original-title="" title="">
                                                            <i class="material-icons">visibility</i>
                                                            <div class="ripple-container"></div>
                                                        </button>
                                                        <button type="button" wire:click="delete('{{ $student->uuid }}')" class="btn mb-0 btn-danger btn-link rounded-pill" data-original-title="" title="">
                                                            <i class="material-icons">close</i>
                                                            <div class="ripple-container"></div>
                                                        </button>
                                                    </td> --}}
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
    </div>
</div>
