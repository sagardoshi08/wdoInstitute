<div class="container-fluid content-wrapper mb-5">

  <div class="col-lg-12 grid-margin stretch-card">
    <!--form mask starts-->
    <div class="bank-card-control">
      <div class="">

        <h3 style="font-size: 30px;font-weight: bold;color: white;padding: 10px;text-align: left; padding-left: 0;" class=" rounded-pill text-dark">Add New Bank</h3>
        <div class="row">
          <div class="col-sm-6 mb-3" style="text-align:left;">
            <div class="form-group">
              <label>Bank Name </label>
              <input wire:model="bank_name" class="form-control  rounded border border-2 border-gray px-2" placeholder="Please Enter Bank Name" style="border-radius: 16px;padding: 13px;border: 2px solid gray;">
              @error('bank_name') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
          </div>
        </div>
        <form class="form-inline repeater">
          <div data-repeater-list="group-a">
            <div data-repeater-item="" class="repeater">
              <div class="row repeater">
                <div class="col-sm-6" style="text-align:left;">
                  <div class="form-group">
                    <label>Branch Name </label>
                    <input wire:model="branch_name.0" class="form-control rounded border border-2 border-gray px-2" placeholder="Please Enter Branch Name">
                    @error('branch_name.0') <span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                </div>
                <div class="col-sm-6" style="text-align:left;">
                  <div class="form-group">
                    <label>IFSC Code</label>
                    <input wire:model="IFSC_code.0" class="form-control rounded border border-2 border-gray px-2" placeholder="Please Enter IFSC Fees">
                    @error('IFSC_code.0') <span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                </div>
              </div>
              @foreach($bank_details as $key => $field)
              @if($key!=0)
              <div class="row repeater">
                <div class="col-sm-6" style="text-align:left;">
                  <div class="form-group">
                    <label>Branch Name </label>
                    <input wire:model="branch_name.{{ $field }}" class="form-control rounded border border-2 border-gray px-2" placeholder="Please Enter Course Name">
                    @error('branch_name.'.$field) <span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                </div>
                <div class="col-sm-6" style="text-align:left;">
                  <div class="form-group">
                    <label>IFSC Code</label>
                    <input wire:model="IFSC_code.{{ $field }}" class="form-control rounded border border-2 border-gray px-2" placeholder="Please Enter Course Fees">
                    @error('IFSC_code.'.$field) <span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                </div>
                <button data-repeater-delete wire:click.prevent="removeBankField({{ $field }})" type="button" class="btn btn-danger btn-md icon-btn ms-2 w-4">
                  <i class="fa fa-trash"></i>
                </button>
              </div>
              @endif
              @endforeach
            </div>
          </div>
          <div class="row pb-3">
            <div class="col-md-4 align-center" style="text-align: right;width: 100%;">
              <button type="button" wire:click.prevent="addField({{ $i }})" class="btn btn-info btn-md icon-btn ms-2 mb-2 bg-gradient-primary p-3" style="margin-top:10px;">
                <i class="fa fa-plus"></i>&nbsp; Add New Branch
              </button>
              <button type="button" wire:click.prevent="store()" class="btn btn-success btn-lg icon-btn ms-2 mb-0 bg-dark p-3">
                Submit
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--form mask ends-->
</div>








<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
<!-- <script>
  $(document).ready(function() {
    $('.repeater').repeater({
      initEmpty: false,
      defaultValues: {
        'text-input': 'foo'
      },
      show: function() {
        $(this).slideDown();
      },
      hide: function(deleteElement) {
        if (confirm('Are you sure you want to delete this element?')) {
          $(this).slideUp(deleteElement);
        }
      },
      ready: function(setIndexes) {},
      isFirstItemUndeletable: true
    })
  });
  $("#checkAll").click(function() {
    $(".check").prop('checked', $(this).prop('checked'));
  });
</script> -->
