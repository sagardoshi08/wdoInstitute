@include('admin.include.header')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<style>
	.toast-success {
  		background-color: black;
	}
	.toast-top-center {
	  	top: 1em;
	}
	.btn.btn-secondary{
		height: 40px;
		width: 70px;
	}
	.modal-body form label.error {
		color: red;
	}
	.select2 {
		width: 100% !important;
	}
	#id-error{
		position: absolute;
    	top: 84px;
	}
	.update-credentials .btn.btn-primary {
    	margin-top: 30px;
	}
</style>
<div class="inner-table-wrapper fundraise-listing">
	<div class="container">
		<h4 class="mt-4"><i class="fa fa-phone" aria-hidden="true"></i> <span class="title-text"><b>Organization</b></span>  <span class="title-count">({{getorganiztionCount()}} total)</span><span><button class="add-button btn btn-secondary" style="right: 20px; position: absolute;">Add</button></span></h4>
			<div class="card mt-4">
				<div class="card-body">
					<div class="table-responsive">
						<div class="-page-row filter-datatable">
							<div class="col_filed">
								<i class="fa fa-column-icon"></i>
								<select name="column_name" id="column_name" class="form-control selectpicker" multiple>
									<option value="0" selected>Created Date</option>
									<option value="1" selected>Organization Name</option>
									<option value="2" selected>Pages</option>
									<option value="3" selected>Status</option>
									<option value="4" selected>Action</option>
								</select>
							</div>
							<div class="datatable-filter p-0">
								<button type="button" class="filter" autocomplete="off"><i class="fa fa-filter-icon"></i> Filters</button>
							</div>
							<div class="datatable-page-filter filter_menu">
								<div class="filter-data">
									<label>Columns</label>
									<div class="select_opt">
										<select name="field_name" id="field-name" style="width:100%;" class="form-control">
											<option value="">Please Select</option>
											<option value="created_at">Date Created</option>
											<option value="name">Organization Name</option>
											<option value="page_count">Pages</option>
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
									<th>Created Date</th>
									<th>Organization Name</th>
									<th>Pages</th>
									<th>Status</th>
									<th>Actions</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade update-credentials" id="add-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" style="display: flex; align-items: center; width: 420px; height: 649px;" role="document">
	    <div class="modal-content">
	      	<div class="modal-header" style="margin: 0 24px;">
	        	<h5 class="modal-title" id="exampleModalLabel">Add Organization</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>                                                                   
	      	</div>
		    <div class="modal-body">
		      	<form method="post" id="fundraise-form">
		  			@csrf
		      		<div class="row">
				        <label>Please Select</label>
				        <select class="form-control select2 get-organization" name="id">
				        </select>
				 	</div>
		      		<div class="row mt-4">
		      			<div class="col-md-12">
		        			<button class="btn btn-primary save-info" style="border: 0;" type="submit">Add</button>
		        		</div>
		      		</div>
		    	</form>
		    </div>
  		</div>
	</div>
</div>
<div class="modal fade admin-modal" id="block-pages" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog deactive_fundraise" role="document">
	    <div class="modal-content">
	      	<div class="modal-header" style="margin: 0 24px;">
	        	<h5 class="modal-title" id="exampleModalLabel">Deactive Fundraise</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body" style="padding: 0;">
		      	<form method="post" id="user-pages">
		      	  @csrf
		      		<input type="hidden" name="id" id="id" value="">
		      		<div class="block-user">
				        <div class="block-use-row">
				        	<div class="block-use-col title">
				      			Deactive this fundraise:
				    		</div>
				    		<div class="block-use-col">
				      			<span class="user-id"></span>
				    		</div>
				        </div>
			        </div>
			      	<div class="modal-footer">
			        	<button type="button" class="btn btn-secondary" data-dismiss="modal">No, do not deactive</button>
			        	<button type="submit" class="btn btn-primary">Yes, deactive</button>
			     	</div>
		      	</form>
		    </div>
	    </div>
  	</div>
</div>
<div class="modal fade admin-modal" id="unblock-pages" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" style="width: 420px;height: 100vh;display: flex;align-items: center;margin-top: 0;" role="document">
	    <div class="modal-content">
	      	<div class="modal-header" style="margin: 0 24px;">
	        	<h5 class="modal-title" id="exampleModalLabel">Active Fundraise</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          	<span aria-hidden="true">&times;</span>
		        </button>
	      	</div>
	      	<div class="modal-body" style="padding: 0;">
	      		<form method="post" id="user-pages-unblock">
		      		@csrf
		      		<input type="hidden" name="id" id="unblock_id" value="">
		      		<div class="block-user">
				        <div class="block-use-row">
				        	<div class="block-use-col title">
				      			active this fundraise:
				    		</div>
				    		<div class="block-use-col name-icon">
				      			<span class="unblock-user-id"></span>
				    		</div>
				        </div>
			        </div>
				    <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, do not active</button>
				        <button type="submit" class="btn btn-primary">Yes, active</button>
				    </div>
		      	</form>
		    </div>
	    </div>
  	</div>
</div>
@include('admin.include.footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="{{ asset('backend/js/jquery.validate.js') }}"></script>

<script type="text/javascript" language="javascript">

$(document).ready(function(){

	$('.select2').select2({
	    allowClear: true
	});

	toastr.options= {
	    "positionClass": "toast-top-center",
	    "timeOut": 5000,
	    "background-color":"black"
	};

	$('#fundraise-form').validate({
        rules:{
            id:{
                required: true,
                remote: {
                    url: "{{route('admin.orgIdExitvalidation')}}",
                    type: "post",
                    data: {
                      	_token: function() {
                        	return "{{csrf_token()}}"
                      	},
						id: function() {
							return $('.get-organization').val()
						}
                    }
                }
            }
        },
        messages: {
            id: {
                required:"The id field is required",
                remote: "The selected data is already exits"
            }
        }
    });

	var dataTable = $('.sample_data').DataTable({
		"serverSide" : true,
		"language": {
        	searchPlaceholder: "Search",
        	"emptyTable": "No data available in the table"
    	},
		"order" : [],
		"ajax" : {
			type:"POST",
			url:'{{route("admin.organizationData")}}',
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
				"targets": [0,2,3,4]
		    }
		],
		dom: 'lBfrtip',		
		dom: '<"head_filter"<"search_btn"f><"export_btn"B>>rt<"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4"p>>',
        "buttons": [
            {
				extend: 'excelHtml5',
				title: null,
				filename: 'Organization _data',
				text: 'Export',
				exportOptions: {
					columns: [ 0, 1,2,3]
				}
            }
        ]
	});
	
	$('#column_name').selectpicker({
		selectedTextFormat: 'static',
		title: 'Columns'
	});

	$('.head_filter').append($('.filter-datatable'))

	$('#column_name').change(function(){

    console.log('remaining_column');
		var all_column = ["0", "1", "2","3","4"];

		var remove_column = [];

		remove_column = $('#column_name').prop('selected',false).val();

		var remaining_column = all_column.filter(function(obj) { return remove_column.indexOf(obj) == -1; });
		dataTable.columns(remove_column).visible(true);

		dataTable.columns(remaining_column).visible(false);

	});

	$('.filter_menu').hide();

	$("#field-name").change(function () {
		var field = $("#field-name").val();
		if(field == 'created_at' || field == 'page_count'){
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

	$(document).on('click','.add-button',function() {
	    $('#add-data').modal('show');
		$('.select2-selection__rendered').html('');
		$('.get-organization').html('');
	});

	$(document).on('submit', '#fundraise-form', function(event) {
	    event.preventDefault();
	    $.ajax({
	        type:'POST',
	        url:"{{ route('admin.addOrganization') }}",
			data:$('#fundraise-form').serialize(),
			dataType: 'html',
          	success:function(data){
              	$('#add-data').modal('hide');
              	setTimeout(function(){
				   location.reload();
				}, 3000);
          	}
	    });
	});

	$(document).on('click','.block-page',function() {
        $('#block-pages').modal('show');
        var user_id = $(this).attr('rel');
        var name = $(this).attr('name');
		$('.user-id').html(name);
		$('#id').val(user_id);
    });

    $(document).on('submit', '#user-pages', function(event) {
        event.preventDefault();
        $.ajax({
            type:'POST',
            url:"{{ route('admin.deactiveOrganization') }}",
			data:$('#user-pages').serialize(),
			dataType: 'html',
            success:function(data){
            	$(`.unblock_page_icon_${data}`).removeClass('d-none');
                $('#block-pages').modal('hide');
                $(`.unblock_page_icon_${data}`).closest('td').prev('td').text('Deactive');
                $(`.block_page_icon_${data}`).addClass('d-none');
                toastr.success('Fundraise Deactivated Successfully');
            }
        });
    });

     $(document).on('click','.unblock-page',function() {
      	$('#unblock-pages').modal('show');
      	var user_id = $(this).attr('rel');
       	var name = $(this).attr('name');
		$('.unblock-user-id').html(name);
		$('#unblock_id').val(user_id);
    });

    $(document).on('submit', '#user-pages-unblock', function(event) {
        event.preventDefault();
        $.ajax({
            type:'POST',
            url:"{{ route('admin.activeOrganization') }}",
			data:$('#user-pages-unblock').serialize(),
			dataType: 'html',
            success:function(data){
            	$(`.block_page_icon_${data}`).removeClass('d-none');
                $('#unblock-pages').modal('hide');
                $(`.block_page_icon_${data}`).closest('td').prev('td').text('Active');
                $(`.unblock_page_icon_${data}`).addClass('d-none');
              	toastr.success('Fundraise Activated Successfully');
            }
        });
    });

    $(document).on('keyup','.select2-search__field',function() {
    	if($('.select2-search__field').val() == ''){
    		$('.select2-results').addClass('d-none');              
    	}else{
    		$('.select2-results').removeClass('d-none');
	    	$.ajax({
	            type:'POST',
	            url:"{{ route('admin.getOrganizationData') }}",
				data:{'key': $('.select2-search__field').val(),"_token":"{{ csrf_token() }}"},
				dataType: 'html',
	            success:function(data){
	        		$('.get-organization').html(data);
	            }
	        });
	    }
    });

});
</script>
