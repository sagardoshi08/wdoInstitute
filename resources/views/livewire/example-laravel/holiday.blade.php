@include('components.include.header')

<style>
       .table-responsive .dataTables_wrapper .dataTables_length{
        font-weight: 700;
        font-size: 0.75rem;
        /* padding-right: 1.5rem;
        padding-left: 0.5rem;
        padding-top: 1rem; */
        text-transform: uppercase;
        position: relative;
        left: 0px;

    }
    .card .students-start-col .showing-results {
    position: absolute;
    top: 15%;
}
div.dataTables_wrapper div.dataTables_length label{
    display: flex;
    align-items: center;
    justify-content: flex-end;
    margin-right: 8%;
}
</style>

<div class="row">
    <div class="card col-12">
        <div class="students-text jgba">
            <h4 class="card-title text-start">Holiday List</h4>
            <div class="me-3 my-3 text-start mt-n3">
                <div class="text-end"><button wire:click="bank()" class="btn bg-dark mb-0 my-auto rounded-pill text-white add-holiday-btn" status="Reject">Add</button></div>
                            </div>
        </div>
        <div class="row students-start-col">
            <div class="showing-results input-group input-group-outline d-flex mt-0 custom-showing align-items-center justify-content-end">

                <div class="print header-btn ms-2">
                    <span class="nav-link mb-0 ml-2 active " data-bs-toggle="tooltip" data-bs-placement="top" title="Print"><i class="fa fa-print" aria-hidden="true"></i></span>
                </div>
                <div class="export header-btn ms-2">
                    <span class="nav-link mb-0  active" data-bs-toggle="tooltip" data-bs-placement="top" title="Export CSV"><i class="fas fa-file-export"></i></span>
                </div>
            </div>
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0" id="attendance-table">
                        <thead>
                            <tr>
                                <th>Sr no.</th>
                                <th>Holiday Name</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="history-data">
                            @foreach($Holiday as $key=>$holi)
                            <tr id="holiday-{{$holi->id}}">
                                <td>{{($key+1)}}</td>
                                <td>{{ $holi->holiday_name }}</td>
                                <td>{{ $holi->date }}</td>
                                <td>
                                    <button type="button" delete-id="{{$holi->id}}" class="btn btn-danger btn-md icon-btn ms-2 w-4 delete-link btn mb-0 btn-success btn-link bg-dark"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="students-start">
    <div class="students-text">
       {{-- <h4 class="card-title text-start">Action</h4> --}}

    </div>
 </div>
<div class="modal fade" id="remark-modal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title remark-modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        <form id="remark-form" action="{{route('holideLeave')}}" method="POST">
         @csrf
        <!-- Modal body -->
        <div class="modal-body">
         <div class="form-group">
            <label for="remark" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start"><b>Add Holiday</b></label>
            <input type="text" name="holiday_name" required>
         </div>
         <div class="form-group">
            <label for="remark" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start"><b>Date</b></label>
            <input type="date" name="date" required>
         </div>
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
@include('components.include.footer')
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js" defer="defer"></script>
    <script>
        $(document).ready(function() {
           $('#attendance-table').DataTable({
            searching: false
        });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
    <script type="text/javascript">
           var form = $("#offer-form");
           $(document).on('click', '.add-holiday-btn', function() {
              $('#remark-form').trigger('reset');
              $('#status').val($(this).attr('status'));
              $('.remark-modal-title').text('Add Holiday');
              $('#remark-modal').modal('show');
           });
           $(document).on('click', '.close', function() {
              $('#remark-modal').modal('hide');
              $('#offer-modal').modal('hide');
           });


           $(document).on('click', '.delete-link', function() {
            var $this = $(this);
            let isExecuted = confirm('Are you sure want to delete this holiday ?');
            if (isExecuted == true) {
            $.ajax({
                type: 'POST',
                url: "{{ route('holidayDelete') }}",
                data: {
                    'id': $(this).attr('delete-id'),
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    // debugger;
                    $this.parents('#holiday-'+$this.attr('delete-id')).remove();
                }
            });
            }
        });
     </script>
