@include('admin.include.header')
<style>
    .page-row {
        justify-content: space-between;
    }
    
    .dataTables_info {
        position: absolute;
        margin-top: -9px;
    }
    
    .dt-buttons {
        position: absolute;
        left: 200px;
    }
    
    #DataTables_Table_0_filter {
        display: none;
    }
    .toast-success {
        background-color: black;
    }
    .toast-top-center {
        top: 1em;
    }
</style>
<div class="inner-table-wrapper admin-listing">
    <div class="container">
        <a style="color: black;">
            <h4 class="mt-4"><i class="fa fa-hmd-admin"></i><span class="title-text"><b>Admin</b></span> <span class="title-count">({{admin_count()}} total)</span></h4>
        </a>
        <div class="card mt-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped sample_data">
                        <thead>
                            <tr>
                                <th>Date Created</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade admin-modal" id="remove-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 420px;height: 100vh;display: flex;align-items: center;margin-top: 0;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Remove Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
       			</button>
            </div>
            <form method="post" id="user-admin-remove">
              @csrf
	            <div class="modal-body">
	               	<input type="hidden" name="id" id="remove-id" value="">
	                <div class="row">
	                    <div class="col-5" style="margin-right: -38px;">
	                       Remove this user:
	                    </div>
	                    <div class="col-8">
	                        <i class="fa fa-user-icon"></i>
	                        <span class="remove-admin-name"></span>
	                    </div>
	                </div>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, keep Admin</button>
	                <button type="submit" class="btn btn-primary">Yes, remove Admin</button>
	            </div>
            </form>
        </div>
    </div>
</div>
@include('admin.include.footer')

<script type="text/javascript" language="javascript">
    $(document).ready(function() {
        //Page Datatable
        toastr.options= {
            "positionClass": "toast-top-center",
            "timeOut": 5000,
            "background-color":"black"
        };

        var dataTable = $('.sample_data').DataTable({
            //"processing" : true,
            "serverSide": true,
            "order": [],
            "ajax": {
                type: "POST",
                url: '{{route("admin.adminsData")}}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            },
            "columnDefs": [{
                "orderable": false,
                "targets": [0,2,3]
            }]
        });

        $(document).on('click', '.admin-remove', function() {
            $('#remove-modal').modal('show');
            var user_id = $(this).attr('rel');
            var name = $(this).attr('name');
            $('.remove-admin-name').html(name);
            $('#remove-id').val(user_id);
        });

        $(document).on('submit', '#user-admin-remove', function(event) {
            event.preventDefault();
            $.ajax({
                type: 'POST',
                url: "{{ route('admin.adminsRemove') }}",
                data: $('#user-admin-remove').serialize(),
                dataType: 'html',
                success: function(data) {
                    $('#remove-modal').modal('hide');
                    var count = {{admin_count()}} - 1;
                    $('.title-count').text('('+count+' total)');
                    $(`.admin-remove-icon-${data}`).closest('tr').remove();
                    toastr.success('Admin Removed Successfully');
                }
            });
        });

    });
</script>