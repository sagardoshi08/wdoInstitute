@include('admin.include.header')
<style>
	.toast-success {
  		background-color: black;
	}
	.toast-top-center {
	  	top: 1em;
	}
	.inner-table-wrapper .edit-profile form .active-button,.inner-table-wrapper .edit-profile form .active-button:hover{
		background-color: #24B183;
	}
</style>
<div class="inner-table-wrapper user-page-listing">
	<div class="container">
		<a href="{{ route('admin.User') }}" style="color: black; text-decoration: none;">
			<h4 class="mt-4">
				<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-short mr-3" style="color: #333333;" viewBox="0 0 16 16">
					<path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
				</svg>
				<i class="fa fa-hmd-users-icon"></i> Back to Users
			</h4>
		</a>
		<div class="edit-profile mt-4">
			<div class="row mt-3 ml-1 mr-2 mb-3">
				<h3><i class="fa fa-user update-name"></i><span class="user-name">{{ ucfirst($user->name) }}</span></h3>
				<div class="col-xs-12 col-sm-12 col-md-6">
					<div class="spacing-wrap-left">
						<h6 class="mt-3">Basic Info</h6>
						<hr class="mt-1">
						<form method="post" id="user-edit">
							@csrf
							<input type="hidden" name="id" id="id" value="{{$user->id}}">
							<div class="form-group">
								<label>Name</label>
								<input  class="form-control update-data" type="text" id="name" name="name" value="{{$user->name}}">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input  class="form-control update-data" type="text" name="email" id="email" value="{{$user->email}}">
							</div>
							<div class="form-group">
								<div class="form-check">
								  <input class="form-check-input" type="checkbox" id="admin-status" name="is_admin" value="{{$user->is_admin}}" {{$user->is_admin == '0' ? 'checked': ''}}>
								  <label class="form-check-label" for="admin-status">
								  Admin Status
								 </label>
								 </div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<button class="btn btn-primary update-botton" type="submit" disabled>Update</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6">
					<div class="spacing-wrap-right">
						<h6 class="mt-3">Billing</h6>
						<hr class="mt-1">
						@if(!$desc_info && $billing_info)
						<div><h4 style="text-align: center; margin-top: 100px;">Not Paid</h4></div>
						@else
						<div class="form-group">
							<label>Name Of Card : </label> {{ucfirst($user->name)}}
						</div>
						<div class="form-group">
							<label>Billed to : </label> {{-- {{$desc_info ? '****'.$desc_info->last4 : '-'}} --}}
						</div>
						<div class="form-group">
							<label>Exp Date : </label> {{-- {{$desc_info ? str_pad($desc_info->exp_month, 2, '0', STR_PAD_LEFT) .'/'.substr($desc_info->exp_year,-2) : '-'}} --}}
						</div>
						<div class="form-group">
							<label>Billing Date : </label> {{-- {{$billing_info ? date('M d, Y', strtotime($billing_info->billing_date)) : '-';}} --}}
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
		<div class="edit-profile mt-5 mb-3">
			<div class="row">
				<div class="container pr-0">
					<div class="mb-3 mt-3 ml-2">
						<b><i class="fa fa-hmd-pages"></i> <span>Owner Pages</span><span class="page_count"> ({{page_count($user->id)}})</span></b>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<div class="-page-row filter-datatable">
							<div class="col_filed">
								<i class="fa fa-column-icon"></i>
								<select name="column_name" id="column_name" class="form-control selectpicker" multiple>
									<option value="0" selected>Date Created</option>
									<option value="1" selected>Last Name</option>
									<option value="2" selected>First Name</option>
									<option value="3" selected>Database Size</option>
									<option value="4" selected>Members</option>
									<option value="5" selected>Status</option>
									<option value="6" selected>Actions</option>
								</select>
							</div>
							<div class="datatable-filter p-0">
								<button type="button" class="filter" autocomplete="off"><i class="fa fa-filter-icon"></i>  Filters</button>
							</div>
							<div class="datatable-page-filter filter_menu">
								<button type="button" class="close close_filter_menu" aria-label="Close">
	          					<span aria-hidden="true">&times;</span>
	        				</button>
								<div class="filter-data">
									<label>Columns</label>
									<div class="select_opt">
									<select name="field_name" id="field-name" style="width:100%;" class="form-control">
										<option value="">Please Select</option>
										<option value="created_at">Date Created</option>
										<option value="last_name">Last Name</option>
										<option value="first_name">First Name</option>
										<option value="member_count">Members</option>
									</select>
									</div>
								</div>
								<div class="filter-data">
									<label>Operator</label>
									<div class="select_opt">
									<select name="oprator" id="oprator" style="width:100%;" class="form-control">
										<option value="">Please Select</option>
										<option value="0" disabled>contains</option>
										<option value="1" disabled>equals</option>
										<option value="2" disabled>starts with</option>
										<option value="3" disabled>ends with</option>
										<option value="4" disabled>is empty</option>
										<option value="5" disabled>is not empty</option>
										<option value="6" disabled>is any of</option>
									</select>
									</div>
								</div>
								<div class="filter-data input-value">
									<label>Value</label>
									<input type="text" class="form-control" id="filter_value" name="filter_value" placeholder="Filter Value">
								</div>
							</div>
						</div>
						<table class="table table-bordered table-striped sample_data">
							<thead>
								<tr>
									<th>Date Created</th>
									<th>Last Name</th>
									<th>First Name</th>
									<th>Database Size</th>
									<th>Members</th>
									<th>Status</th>
									<th>Actions</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="edit-profile mt-5 mb-3">
			<div class="row">
				<div class="container pr-0">
					<div class="mb-3 mt-3 ml-2">
						<b><i class="fa fa-hmd-pages"></i> <span>Member Pages</span> ({{member_count($user->id)}})</b>
					</div>
				</div>
			</div>
			<div class="card mt-4">
				<div class="card-body">
					<div class="table-responsive">
						<div class="-page-row member-filter-datatable">
							<div class="col_filed">
								<i class="fa fa-column-icon"></i>
								<select name="column_name" id="member_column_name" class="form-control selectpicker" multiple>
									<option value="0" selected>Date Created</option>
									<option value="1" selected>Page Last Name</option>
									<option value="2" selected>Page First Name</option>
									<option value="3" selected>Status</option>
									<option value="4" selected>Action</option>
								</select>
							</div>
							<div class="datatable-filter p-0">
								<button type="button" class="member-filter" autocomplete="off"><i class="fa fa-filter-icon"></i>  Filters</button>
							</div>
							<div class="datatable-page-filter member-filter-data">
								<div class="filter-data">
									<label>Columns</label>
									<div class="select_opt">
									<select name="member_field_name" id="member-field-name" style="width:100%;" class="form-control">
										<option value="">Please Select</option>
										<option value="created_at">Date Created</option>
										<option value="last_name">Page Last Name</option>
										<option value="first_name">Page First Name</option>
									</select>
									</div>
								</div>
								<div class="filter-data">
									<label>Operator</label>
									<div class="select_opt">
									<select name="member_oprator" id="member-oprator" style="width:100%;" class="form-control">
										<option value="">Please Select</option>
										<option value="0" disabled>contains</option>
										<option value="1" disabled>equals</option>
										<option value="2" disabled>starts with</option>
										<option value="3" disabled>ends with</option>
										<option value="4" disabled>is empty</option>
										<option value="5" disabled>is not empty</option>
										<option value="6" disabled>is any of</option>
									</select>
									</div>
								</div>
								<div class="filter-data input-value">
									<label>Value</label>
									<input type="text" class="form-control" id="filter_value" name="filter_value" placeholder="Filter Value">
								</div>
							</div>
						</div>
						<table id="member_data" class="table table-bordered">
							<thead>
								<tr>
									<th>Date Joined</th>
									<th>Page Last Name</th>
									<th>Page First Name</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade admin-modal" id="member-Block" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" style="width: 420px;height: 100vh;display: flex;align-items: center;margin-top: 0;" role="document">
	    <div class="modal-content">
	      	<div class="modal-header" style="margin: 0 24px;">
	        	<h5 class="modal-title" id="exampleModalLabel">Block User</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body" style="padding: 0;">
		      	<form method="post" id="user-member-status">
		      	@csrf
		      		<input type="hidden" name="user_id" value="{{ $user->id }}">
		      		<input type="hidden" name="page_id" id="page_id" value="">
		      		<input type="hidden" name="member_page_id" id="member_page_id" value="">
		      		<div class="block-user">
				        <div class="block-use-row">
				        	<div class="block-use-col title">
				      			Block this user:
				    		</div>
				    		<div class="block-use-col name-icon">
				      			<i class="fa fa-user-icon"></i>
				      			<span class="user-id">{{ ucfirst($user->name) }}</span>
				    		</div>
				        </div>
			        </div>
			        <div class="block-use-row">
			        	<div class="block-use-col title">
			      			From this page:
			    		</div>
				    	<div class="block-use-col name-icon">
				      		<i class="fa block-user-icon"></i>
				      		<span class="page-name"></span>
				    	</div>
			        </div>
				    <div class="modal-footer" style="border: 0;">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, do not block</button>
				        <button type="submit" class="btn btn-primary">Yes, block user</button>
				    </div>
		      	</form>
		    </div>
	    </div>
  	</div>
</div>
<div class="modal fade admin-modal" id="member-unblock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" style="width: 420px;height: 100vh;display: flex;align-items: center;margin-top: 0;" role="document">
	    <div class="modal-content">
	      	<div class="modal-header" style="margin: 0 24px;">
	        	<h5 class="modal-title" id="exampleModalLabel">Unblock User</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body" style="padding: 0;">
		      	<form method="post" id="user-member-unblock">
		      	@csrf
		      		<input type="hidden" name="user_id" value="{{ $user->id }}">
		      		<input type="hidden" name="page_id" id="unblock_page_id" value="">
		      		<input type="hidden" name="member_page_id" id="unblock_member_page_id" value="">
			        <div class="block-user">
				        <div class="block-use-row">
				        	<div class="block-use-col title">
				      			Unblock this user:
				    		</div>
				    		<div class="block-use-col name-icon">
				      			<i class="fa fa-user-icon"></i>
				      			<span class="user-id">{{ ucfirst($user->name) }}</span>
				    		</div>
				        </div>
			        </div>
			        <div class="block-use-row">
			        	<div class="block-use-col title">
			      			From this page:
			    		</div>
				    	<div class="block-use-col name-icon">
				      		<i class="fa block-user-icon"></i>
				      		<span class="page-name"></span>
				    	</div>
			        </div>
			      	<div class="modal-footer" style="border: 0;">
			        	<button type="button" class="btn btn-secondary" data-dismiss="modal">No, do not unblock</button>
			        	<button type="submit" class="btn btn-primary">Yes, unblock user</button>
			      	</div>
		      	</form>
		    </div>
	    </div>
  	</div>
</div>
<div class="modal fade admin-modal" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" style="width: 420px;height: 100vh;display: flex;align-items: center;margin-top: 0;" role="document">
	    <div class="modal-content">
	      	<div class="modal-header" style="margin: 0 24px;">
	        	<h5 class="modal-title" id="exampleModalLabel">Delete Page</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body" style="padding: 0;">
		      	<form method="post" id="page-delete">
		      	@csrf
		      		<input type="hidden" name="id" id="deteted-id" value="">
		      		<div class="block-user">
				        <div class="block-use-row">
				        	<div class="block-use-col title">
				      			Delete this page:
				    		</div>
				    		<div class="block-use-col name-icon">
				      			<i class="fa fa-hmd-pages" aria-hidden="true"></i>
				      			<span class="deleted-user-name"></span>
				    		</div>
				        </div>
			        </div>
				    <div class="modal-footer" style="border: 0;">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, keep page</button>
				        <button type="submit" class="btn btn-primary">Yes, delete page</button>
				    </div>
		      	</form>
		    </div>
	    </div>
  	</div>
</div>
@include('admin.include.footer')
<script src="{{ asset('backend/js/jquery.validate.js') }}"></script>

<script type="text/javascript" language="javascript">

$(document).ready(function(){
	toastr.options= {
	    "positionClass": "toast-top-center",
	    "timeOut": 5000,
	    "background-color":"black"
	};

	var url = "{{env('APP_URL')}}";
	$('.update-botton').click(function() {
		$('#user-edit').validate({
			rules:{
				name: "required",
				email: {
					required: true,
					email: true,
					remote: {
		         		url: "{{route('admin.userUpdateValidation')}}",
		          		type: "post",
		          		data: {
							_token: function() {
								return "{{csrf_token()}}"
							},
							id: function() {
								return $('#id').val()
							},
							email: function() {
								return $('#email').val()
							},
						}
		        	}
				}
			},
			messages: {
				name: "The name field is required",
				email: {
					required:"The email field is required",
					email:"Enter valid email address",
					remote:"Email already registered"
				}
			}
		});
	});

	// Page Datatable
	var dataTable = $('.sample_data').DataTable({
		//"processing" : true,
		"serverSide" : true,
		"language": {
		  	searchPlaceholder: "Search",
		  	"emptyTable": "No data available in the table"
		},
		"order" : [],
		"ajax" : {
         	type:"POST",
			url:'{{route("admin.UserEditPageData",$user->id)}}',
         	data:  function (d) {
            	d.field = $("#field-name").val();
            	d.oprator = $("#oprator").val();
				d.value = $("#filter_value").val();
         	},
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
      	},
		"columnDefs": [
			{ "orderable": false,
				"targets": [6,3,5,0,2,3,4]
		    }
		],
		dom: 'lBfrtip',
		dom: '<"head_filter"<"search_btn"f><"export_btn"B>>rt<"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4"p>>',
        "buttons": [{
            extend: 'excelHtml5',
			title: null,
			filename: 'Page_data',
			text: 'Export',
    		exportOptions: {
				columns: [ 0, 1, 2, 3,4,5 ]
            }
        }]
	});

	$('#column_name').selectpicker({
		selectedTextFormat: 'static',
		title: 'Columns'
	});

	$('.head_filter').append($('.filter-datatable'))

	$('#column_name').change(function(){

        console.log('remaining_column');
		var all_column = ["0", "1", "2", "3","4","5","6"];
		var remove_column = [];
		var remove_column = $('#column_name').prop('selected',false).val();

		var remaining_column = all_column.filter(function(obj) { return remove_column.indexOf(obj) == -1; });
		dataTable.columns(remove_column).visible(true);

		dataTable.columns(remaining_column).visible(false);

	});

	$('.filter_menu').hide();

	$("#field-name").change(function () {
		var field = $("#field-name").val();
		if(field == 'created_at' || field == 'member_count'){
			$('#oprator option[value="0"]').attr('disabled', true);
			$('#oprator option[value="2"]').attr('disabled', true);
			$('#oprator option[value="3"]').attr('disabled', true);
			$('#oprator option[value="4"]').attr('disabled', false);
			$('#oprator option[value="5"]').attr('disabled', false);
			$('#oprator option[value="6"]').attr('disabled', true);
        	$('#oprator option[value="1"]').attr('disabled', false);
			if(field == 'created_at'){
				$('input[name="filter_value"]').datepicker({
					format: 'dd-mm-yyyy',
				});
			}else{
				$('input[name="filter_value"]').datepicker("destroy").val('');
			}
		}else {
			$('input[name="filter_value"]').datepicker("destroy").val('');
			$('#oprator option[value="1"]').attr('disabled', false);
			$('#oprator option[value="0"]').attr('disabled', false);
			$('#oprator option[value="2"]').attr('disabled', false);
			$('#oprator option[value="3"]').attr('disabled', false);
			$('#oprator option[value="4"]').attr('disabled', false);
			$('#oprator option[value="5"]').attr('disabled', false);
			$('#oprator option[value="6"]').attr('disabled', false);
		}
		if(field == ''){
			$('input[name="filter_value"]').datepicker("destroy").val('');
			$('#oprator option').attr('disabled', true);
			$('#oprator option[value=""]').attr('selected', true);
			$('.input-value').show();
			dataTable.draw();
		}

    });

	$("#oprator").on('change', function(e) {
		var field = $("#field-name").val();
		var oprator = $("#oprator").val();
		var value = $("#filter_value").val();
		if(oprator == '4' || oprator == '5'){
			$('.input-value').hide();
			if(field && oprator){
				dataTable.draw();
				e.preventDefault();
			}
		}else{
			$('.input-value').show();
		}
    });

	$('#filter_value').on('change', function(e) {
		var field = $("#field-name").val();
		var oprator = $("#oprator").val();
		var value = $("#filter_value").val();
		if(oprator == '1' && value && field == 'created_at' || field == 'updated_at'){
			if(field == 'created_at' || field == 'updated_at' && oprator){
			dataTable.draw();
			e.preventDefault();
			}
		}
	});

	$('#filter_value').on('keyup', function(e) {
		var field = $("#field-name").val();
		var oprator = $("#oprator").val();
		var value = $("#filter_value").val();
		if(field && oprator){
			dataTable.draw();
			e.preventDefault();
		}
    });

	$(".filter").click(function () {
        $(".filter_menu").toggle();
        $(this).toggleClass('active');
    });

    $(document).on('submit', '#user-edit', function(event) {
        event.preventDefault();
        var id = $('#id').val();
        var name = $('#name').val();
        var email = $('#email').val();
        var status = $('#admin-status').val();
        $.ajax({
            type:'POST',
            url:"{{ route('admin.userUpdate') }}",
			data:{'id': id, 'name' : name, 'email': email, 'is_admin': status, '_token': "{{ csrf_token() }}"},
			dataType: 'json',
            success:function(data){
            	$('.user-name').text($('#name').val());
            	toastr.success('User Data Updated Successfully');
            }
        });
    });

    //member-page Datatable

    var dataTable1 = $('#member_data').DataTable({
		//"processing" : true,
		"serverSide" : true,
		"language": {
        	searchPlaceholder: "Search",
        	"emptyTable": "No data available in the table"
    	},
		"order" : [],
		"ajax" : {
            type:"POST",
			url:'{{route("admin.UserEditMemberData")}}',
            data:  function (d) {
            	d.id = {{$user->id}};
              	d.member_field = $("#member-field-name").val();
              	d.member_oprator = $("#member-oprator").val();
				d.member_value = $("#member_filter_value").val();
            },
             headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        },
		"columnDefs": [{
			"orderable": false,
			"targets": [0,2,3,4]
		}],
		dom: 'lBfrtip',
		dom: '<"head_member_filter"<"search_btn"f><"export_btn"B>>rt<"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4"p>>',
    	"buttons": [{
        	extend: 'excelHtml5',
			title: null,
			filename: 'member_Page_data',
			text: 'Export',
        	exportOptions: {
				columns: [ 0, 1, 2,3]
        	}
      	}]
	});

	//$('#column_name').selectpicker();
	$('#member_column_name').selectpicker({
		selectedTextFormat: 'static',
		title: 'Columns'
	});

	$('.head_member_filter').append($('.member-filter-datatable'))
	$('#member_column_name').change(function(){

        console.log('remaining_column');
		var all_column = ["0", "1", "2", "3","4"];

		var remove_column = [];
		var remove_column = $('#member_column_name').prop('selected',false).val();

		var remaining_column = all_column.filter(function(obj) { return remove_column.indexOf(obj) == -1; });
		dataTable1.columns(remove_column).visible(true);

		dataTable1.columns(remaining_column).visible(false);

	});

	$('.member-filter-data').hide();

	$(".member-filter").click(function () {
        $(".member-filter-data").toggle();
        $(this).toggleClass('active');
    });

    $("#member-field-name").change(function () {
		var member_field = $("#member-field-name").val();
		if(member_field == 'created_at' || member_field == 'status'){
			$('#member-oprator option[value="0"]').attr('disabled', true);
			$('#member-oprator option[value="2"]').attr('disabled', true);
			$('#member-oprator option[value="3"]').attr('disabled', true);
			$('#member-oprator option[value="4"]').attr('disabled', false);
			$('#member-oprator option[value="5"]').attr('disabled', false);
			$('#member-oprator option[value="6"]').attr('disabled', true);
        	$('#member-oprator option[value="1"]').attr('disabled', false);
			if(member_field == 'created_at'){
				$('input[name="member_filter_value"]').datepicker({
					format: 'dd-mm-yyyy',
				});
			}else{
				$('input[name="member_filter_value"]').datepicker("destroy").val('');
			}
		}else {
			$('input[name="member_filter_value"]').datepicker("destroy").val('');
			$('#member-oprator option[value="1"]').attr('disabled', false);
			$('#member-oprator option[value="0"]').attr('disabled', false);
			$('#member-oprator option[value="2"]').attr('disabled', false);
			$('#member-oprator option[value="3"]').attr('disabled', false);
			$('#member-oprator option[value="4"]').attr('disabled', false);
			$('#member-oprator option[value="5"]').attr('disabled', false);
			$('#member-oprator option[value="6"]').attr('disabled', false);
		}
		if(member_field == ''){
			$('input[name="member_filter_value"]').datepicker("destroy").val('');
			$('#member-oprator option').attr('disabled', true);
			$('#member-oprator option[value=""]').attr('selected', true);
			$('.member-input-value').show();
			dataTable1.draw();
		}

    });

	$("#member-oprator").on('change', function(e) {
		var field = $("#member-field-name").val();
		var oprator = $("#member-oprator").val();
		var value = $("#member_filter_value").val();
		if(oprator == '4' || oprator == '5'){
			$('.member-input-value').hide();
			if(field && oprator){
				dataTable1.draw();
				e.preventDefault();
			}
		}else{
			$('.member-input-value').show();
		}
    });

	$('#member_filter_value').on('change', function(e) {
		var member_field = $("#member-field-name").val();
		var member_oprator = $("#member-oprator").val();
		var member_value = $("#member_filter_value").val();
		if(member_oprator == '1' && member_value && member_field == 'created_at'){
			dataTable1.draw();
			e.preventDefault();
		}
	});

	$('#member_filter_value').on('keyup', function(e) {
		var member_field = $("#member-field-name").val();
		var member_oprator = $("#member-oprator").val();
		var member_value = $("#member_filter_value").val();
		if(member_field && member_oprator){
			dataTable1.draw();
			e.preventDefault();
		}
    });

    $(document).on('click','.block-page',function() {
       	$('#member-Block').modal('show');
       	var page_id = $(this).attr('rel');
       	var name = $(this).attr('name');
       	var member_id = $(this).attr('id');
		$('.page-name').html(name);
		$('#page_id').val(page_id);
		$('#member_page_id').val(member_id);

    });

    $(document).on('submit', '#user-member-status', function(event) {
        event.preventDefault();
        $.ajax({
            type:'POST',
            url:"{{ route('admin.UserMemberPageBlock') }}",
			data:$('#user-member-status').serialize(),
			dataType: 'html',
            success:function(data){
                $('#member-Block').modal('hide');
                $(`.unblock_page_icon_${data}`).removeClass('d-none');
                $(`.block_page_icon_${data}`).closest('td').prev('td').text('Blocked');
                $(`.block_page_icon_${data}`).addClass('d-none');
                toastr.success('Member Blocked Successfully');
            }
        });
    });

    $(document).on('click','.unblock-page',function() {
       	$('#member-unblock').modal('show');
       	var page_id = $(this).attr('rel');
       	var name = $(this).attr('name');
       	var member_id = $(this).attr('id');
		$('.page-name').html(name);
		$('#unblock_page_id').val(page_id);
		$('#unblock_member_page_id').val(member_id);

    });

    $(document).on('submit', '#user-member-unblock', function(event) {
        event.preventDefault();
        $.ajax({
            type:'POST',
            url:"{{ route('admin.UserMemberPageUnBlock') }}",
			data:$('#user-member-unblock').serialize(),
			dataType: 'html',
            success:function(data){
                $('#member-unblock').modal('hide');
                $(`.block_page_icon_${data}`).removeClass('d-none');
                $(`.unblock_page_icon_${data}`).closest('td').prev('td').text('Subscribed');
                $(`.unblock_page_icon_${data}`).addClass('d-none');
                toastr.success('Member Unblocked Successfully');
            }
        });
    });

    $(document).on('click','.page-delete',function() {
    	$('#delete-modal').modal('show');
    	var page_id = $(this).attr('rel');
    	var name = $(this).attr('name');
		$('.deleted-user-name').html(name);
		$('#deteted-id').val(page_id);
  	});

	$(document).on('submit', '#page-delete', function(event) {
	    event.preventDefault();
	    $.ajax({
          	type:'POST',
          	url:"{{ route('admin.UserPageDelete') }}",
			data:$('#page-delete').serialize(),
			dataType: 'html',
          	success:function(data){
	            $('#delete-modal').modal('hide');
	            var count = {{page_count($user->id)}} - 1;
                $('.page_count').text('('+count+')');
	           	$(`.page-delete-icon-${data}`).closest('tr').remove();
	            toastr.success('Page Deleted Successfully');
          	}
	   	});
	});

  	$(document).on('change','#admin-status',function() {
      	if ($("#admin-status").is(":checked") == true) {
          	$('#admin-status').val('0');
      	} else {
          	$('#admin-status').val('1');
      	}
  	});

  	$(document).on('change','#user-edit',function() {
     	$('.update-botton').removeAttr('disabled').addClass('active-button');
    });

    $(document).on('keyup','.update-data',function() {
     	$('.update-botton').removeAttr('disabled').addClass('active-button');
    });
});
</script>
