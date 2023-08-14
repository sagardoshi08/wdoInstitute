@include('admin.include.header')
<style>
	.page-row{
		justify-content: space-between;
	}
	.dataTables_info{
		position: absolute;
		margin-top: -9px;
	}
	.dt-buttons{
		position: absolute;
    	left: 200px;
	}
	#DataTables_Table_0_filter{
		display: none;
	}
	.toast-success {
  		background-color: black;
	}
	.toast-top-center {
	  	top: 1em;
	}
</style>
<div class="inner-table-wrapper user-page-details">
<div class="container">
    <a href="{{ route('admin.userEdit',$user->id) }}" style="color: black; text-decoration: none;">
    	<h4 class="mt-4">
    		<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-short mr-3" style="color: #333333;" viewBox="0 0 16 16">
  				<path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
			</svg>
    	 	<i class="fa fa-hmd-users-icon"></i> {{ucfirst($user->name)}}'s Pages
    	</h4>
    </a>
    	<div class="edit-profile mt-4">
    		<div class="row mt-3 ml-1 mb-3">
    			<h3><i class="fa fa-hmd-pages update-name"><span style="margin-left: 17px; font-size: 24px;">{{ucfirst($page->first_name)}} {{ucfirst($page->last_name)}}</span></i></h3>
    			<div class="row">
		        	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
		        		<h6 class="mt-3">Page Credentials</h6>
		        		<hr class="mt-1">
		        			<div class="form-group">
			        			<label>Owner: </label> <span id="update-name">{{ucfirst($user->name)}}</span>
			        		</div>
			        		<div class="form-group">
			        			<label>Previous Owners: </label> <span id="owner">none</span><span class="d-none" id="previous-owner">{{ucfirst($user->name)}}</span>
			        		</div>
			        		<div class="form-group">
			        			<label>Url: </label><a href="{{env('CLIENT_APP_URL')}}i/{{$page->unique_url}}" target="_blank" style="text-decoration: underline;"> <span id="update-unique-url">{{$page->unique_url}}</span></a>
			        		</div>
			        		<div class="form-group">
			        			<label>Date Created: </label> <span id="update-created-date">{{date('m-d-Y', strtotime($page->created_at));}}</span>
			        		</div>
			        		<div class="form-group">
			        			<label>Privacy: </label> <span id="update-status">@if($page->privacy_status == 1) Private @elseif($page->privacy_status == 0) Private @else Hidden @endif</span>
			        		</div>
			        		<div class="form-group">
			        			<label>Approvals: </label> <span id="update-approval">{{$page->approval_required == '1' ? 'Required' : 'Not Required'}}
			        		</div>
			        		<div class="form-group">
				        		<button class="btn btn-secondary update-page" type="button">Update Credentials</button>
			        		</div>
			        </div>
		        	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
		        		<h6 class="mt-3">Billing</h6>
		        		<hr class="mt-1">
		        		@if(!$desc_info && $billing_info)
							<div><h4 style="text-align: center; margin-top: 100px;">Not Paid</h4></div>
						@else
		        		<div class="form-group">
		        			<strong><label>Status: </label>{{-- {{$billing_info->status ? ucfirst($billing_info->status) : '-'}}--}}</strong>
		        		</div>
		        		<div class="form-group">
		        			<label>Name on Card: </label>{{-- {{ucfirst($user->name)}}--}}
		        		</div>
		        		<div class="form-group">
		        			<label>Billed to: </label>{{-- {{$desc_info ? '****'.$desc_info->last4 : '-'}}--}}
		        		</div>
		        		<div class="form-group">
		        			<label>Exp Date: </label>{{-- {{$desc_info ? str_pad($desc_info->exp_month, 2, '0', STR_PAD_LEFT) .'/'.substr($desc_info->exp_year,-2) : '-'}}--}}
		        		</div>
		        		<div class="form-group">
		        			<label>Billing Date: </label>{{-- {{$billing_info->billing_date ? date('M d, Y', strtotime($billing_info->billing_date)) : '-';}}--}}
		        		</div>
		        		@endif
		        		<div class="form-group" style="position: absolute; top: 268px;">
				        	<button class="btn btn-secondary comp-page" type="button">Comp Page</button>
			        	</div>
		        	</div>
		        	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
		        		<h6 class="mt-3">Page Status</h6>
		        		<hr class="mt-1">
		        		<div class="form-group">
		        			<strong><label>Database size: </label> {{getdatabasesize($page->id)}}</strong>
		        		</div>
		        		<div class="form-group">
		        			{{page_status_count($page->id)['post_count']}} <label>posts</label>
		        		</div>
		        		<div class="form-group">
		        			{{page_status_count($page->id)['question_count']}} <label>questions + </label> {{page_status_count($page->id)['answer_count']}} answers
		        		</div>
		        		<div class="form-group">
		        			{{page_image_count($page->id)}} <label>pictures + </label> {{page_status_count($page->id)['video_count']}} videos
		        		</div>
		        		<div class="form-group">
		        			2 <label>causes</label>
		        		</div>
		        	</div>
	        	</div>
	      	</div>
		 	<div class="row mt-3">
    			<div class="container pr-0">
    				<div class="mb-2 mt-2 ml-2">
		            	<b><span>Members</span> ({{page_member_count($page->id)}})</b>
		            </div>
		    	</div>
    		</div>
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered table-striped sample_data">
							<thead>
								<tr>
									<th>Date Subscribed</th>
									<th>Name</th>
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
  	<div class="modal-dialog " style="width: 420px;height: 100vh;display: flex;align-items: center;margin-top: 0;" role="document">
	    <div class="modal-content">
	      	<div class="modal-header" style="margin: 0 24px;">
	        	<h6 class="modal-title" id="exampleModalLabel">Block User</h6>
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
				      			<span class="page-name"></span>
				    		</div>
				        </div>
			        </div>
			        <div class="block-use-row">
			        	<div class="block-use-col title">
			      			From this page:
			    		</div>
			    		<div class="block-use-col name-icon">
			      			<i class="fa fa-hmd-pages"></i>
			      			<span>{{ ucfirst($page->first_name) }} {{ ucfirst($page->last_name) }}</span>
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
				      			<i class="fa fa-hmd-pages"></i>
				      			<span class="page-name"></span>
				    		</div>
				        </div>
			        </div>
			        <div class="block-use-row">
			        	<div class="block-use-col title">
			      			From this page:
			    		</div>
			    		<div class="block-use-col name-icon">
			      			<i class="fa block-user-icon"></i>
			      			<span>{{ ucfirst($page->first_name) }} {{ ucfirst($page->last_name) }}</span>
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
<div class="modal fade update-credentials" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" style="display: flex; align-items: center; width: 420px; height: 649px;" role="document">
	    <div class="modal-content">
	      	<div class="modal-header" style="margin: 0 24px;">
	        	<h5 class="modal-title" id="exampleModalLabel">Page Credentials</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
		    <div class="modal-body">
		      	<form method="post" id="page-edit">
		  			@csrf
		  			<input type="hidden" name="id" id="id" value="{{$page->id}}">
		    		<div class="dropdown">
		      	    	<label>Owner</label>
		      			<select class="form-control" name="customer_id" id="customer_id" >
		      				@foreach($all_owner as $data)
		        				<option value="{{$data->id}}" {{ ($data->id == $user->id) ? 'selected' : ''}}>{{$data->name}}</option>
		        			@endforeach
		        		</select>
		      		</div>
		      		<hr>
		      		<div class="form-group">
		      			<label>URL</label>
		        		<input  class="form-control" type="text" name="unique_url" id="unique_url" value="{{$page->unique_url}}">
		      		</div>
		      		<hr>
		      		<div class="form-group">
		      			<label>Privacy</label>
		        		<select class="form-control" name="privacy_status" id="privacy_status">
		        			<option value="1" {{ ($page->privacy_status == '1') ? 'selected' : ''}}>Private</option>
		        			<option value="0" {{ ($page->privacy_status == '0') ? 'selected' : ''}}>Public</option>
		        			<option value="2" {{ ($page->privacy_status == '2') ? 'selected' : ''}}>Hidden</option>
		        		</select>
		      		</div>
		      		<hr>
		      		<div class="form-group" style="display: flex; justify-content: space-between;">
		      			<div>
		      				<label>Approvals</label>
		      			</div>
			      		<div class="custom-control custom-switch">
						  	<input type="checkbox" name="approval_required" class="custom-control-input" value="{{$page->approval_required }}" {{$page->approval_required == '1' ? 'checked' : ''}} id="approval_required">
						  	<label class="off" style="position: absolute; right: 85px;">Off</label>
						  	<label class="custom-control-label on" for="approval_required">On</label>
						</div>
					</div>
		      		<div class="row">
		      			<div class="col-md-12">
		        			<button class="btn btn-primary save-info" style="border: 0;" type="submit" disabled>Save Updates</button>
		        		</div>
		      		</div>
		    	</form>
		    </div>
  		</div>
	</div>
</div>
<div class="modal fade admin-modal" id="comb-page-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" style="width: 420px;height: 100vh;display: flex;align-items: center;margin-top: 0;" role="document">
	    <div class="modal-content">
	      	<div class="modal-header" style="margin: 0 24px;">
	        	<h5 class="modal-title" id="exampleModalLabel"></h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body" style="padding: 0;">
	      		<h4 style="text-align: center;">Coming...</h4>
	      		<div class="modal-footer" style="border: 0;">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Save</button>
			   	</div>
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
	$('#page-edit').validate({
		rules:{
			unique_url: "required"
		},
		messages: {
			unique_url: "Please enter URL"
		}
	});

	//Page Datatable

	var dataTable = $('.sample_data').DataTable({
		//"processing" : true,
		"serverSide" : true,
	    "language": {
    		"emptyTable": "No data available in the table"
 		},
		"order" : [],
		"ajax" : {
	        type:"POST",
			url:'{{route("admin.UserPageMemberData")}}',
	        data:  function (d) {
	            d.id = {{$page->id}};
	            d.user_id = {{$user->id}};
	        },
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    },
		"columnDefs": [{
			"orderable": false,
			"targets": [3]
	   	}]
	});

    $(document).on('submit', '#user-edit', function(event) {
        event.preventDefault();
        $.ajax({
            type:'POST',
            url:"{{ route('admin.userUpdate') }}",
			data:$('#user-edit').serialize(),
			dataType: 'json',
            success:function(data){
            	$('.update-name').text($('#name').val());
            	$('.success-msg').removeClass('d-none');
            }
        });
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

    $(document).on('click','.update-page',function() {
     	$('#edit').modal('show');
     	$('.save-info').attr('disabled',true);
     	$('#page-edit').trigger("reset");
    });

    $('#approval_required').change(function () {
	    if ($('#approval_required').is(':checked') == true) {
	        $('#approval_required').val('1');
	    }else{
	      	$('#approval_required').val('0');
	    }
    });

     $(document).on('submit', '#page-edit', function(event) {
        event.preventDefault();
        $.ajax({
            type:'POST',
            url:"{{ route('admin.UserPageUpdate') }}",
			data:{
				'id': $('#id').val(),
				'customer_id': $('#customer_id').val(),
				'unique_url' : $('#unique_url').val(),
				'privacy_status' : $('#privacy_status').val(),
				'approval_required' : $('#approval_required').val(),
				'_token' : "{{ csrf_token() }}"
			},
			dataType: 'json',
            success:function(data){
            	$('#edit').modal('hide');
            	var name = data.name;
            	name = name.charAt(0).toUpperCase()+ name.slice(1);
            	$('#update-name').text(name);
            	$('#update-unique-url').text(data.unique_url);
            	$('#update-created-date').text(data.date);
            	$('#update-status').text(data.status);
            	$('#update-approval').text(data.approval);
            	$('#owner').addClass('d-none');
            	$('#previous-owner').removeClass('d-none');
            	toastr.success('Page Credentials Updated Successfully');
            }
        });
    });

    $(document).on('click','.comp-page',function() {
     	$('#comb-page-modal').modal('show');
    });

    $(document).on('change','#page-edit',function() {
     	$('.save-info').removeAttr('disabled');
    });

    $(document).on('keyup','#unique_url',function() {
     	$('.save-info').removeAttr('disabled');
    });

});
</script>
