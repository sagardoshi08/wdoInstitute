@include('admin.include.header')
<style>
	.toast-success {
  		background-color: black;
	}
	.toast-top-center {
	  	top: 1em;
	}
</style>
<div class="inner-table-wrapper page-listing">
	<div class="container">
		<h4 class="mt-4"><i class="fa fa-hmd-pages"></i> <span class="title-text"><b>Pages</b></span>  <span class="title-count">({{all_page_count()}} total)</span></h4>
			<div class="card mt-4">
				<div class="card-body">
					<div class="table-responsive">
						<div class="-page-row filter-datatable">
							<div class="col_filed">
								<i class="fa fa-column-icon"></i>
								<select name="column_name" id="column_name" class="form-control selectpicker" multiple>
									<option value="0" selected>Date Created</option>
									<option value="1" selected>Last Name</option>
									<option value="2" selected>First Name</option>
									<option value="3" selected>Owner</option>
									<option value="4" selected>Database Size</option>
									<option value="5" selected>Members</option>
									<option value="6" selected>Status</option>
									<option value="7" selected>Actions</option>
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
											<option value="last_name">Last Name</option>
											<option value="first_name">First Name</option>
											<option value="name">Owner</option>
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
									<th>Owner</th>
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

	var dataTable = $('.sample_data').DataTable({
		"serverSide" : true,
		"language": {
        	searchPlaceholder: "Search",
        	"emptyTable": "No data available in the table"
    	},
		"order" : [],
		"ajax" : {
			type:"POST",
			url:'{{route("admin.PageData")}}',
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
				"targets": [0,1,3,4,5,7,6]
		    }
		],
		dom: 'lBfrtip',		
		dom: '<"head_filter"<"search_btn"f><"export_btn"B>>rt<"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4"p>>',
        "buttons": [
            {
				extend: 'excelHtml5',
				title: null,
				filename: 'Page_data',
				text: 'Export',
				exportOptions: {
					columns: [ 0, 1, 2, 3,4,5,6 ]
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
		var all_column = ["0", "1", "2", "3","4","5","6","7"];

		var remove_column = [];

		remove_column = $('#column_name').prop('selected',false).val();

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
	        url:"{{ route('admin.pageDelete') }}",
			data:$('#page-delete').serialize(),
			dataType: 'html',
          	success:function(data){
              	$('#delete-modal').modal('hide');
              	var count = {{all_page_count()}} - 1;
                $('.title-count').text('('+count+' total)');
              	$(`.page-delete-icon-${data}`).closest('tr').remove();
              	toastr.success('Page Deleted Successfully');
          	}
	    });
	});
});
</script>
