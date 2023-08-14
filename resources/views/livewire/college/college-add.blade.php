@include('components.include.header')
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700">
<div class="content-wrapper mb-5 college-add-content">

  <div class="col-lg-12 grid-margin stretch-card">
    <!--form mask starts-->
    <div class="card">
      <div class="container-fluid content-wrapper mb-5">
        <h3 style="font-size: 30px;font-weight: bold;color: white;padding: 10px;text-align: left; padding-left: 0;    margin-top: 20px;" class=" rounded-pill text-dark">Add New Bank</h3>

        {{-- <h3 style="font-size: 20px;font-weight: bold;color: white;padding: 10px;text-align: center;" class="bg-light rounded-pill text-dark">Add New College</h3> --}}

        <form class="form-inline repeater" action="{{route('collegeStore')}}" method="POST">
        @csrf
        <input type="hidden" name="uuid" value="{{isset($college) ? $college->uuid : ''}}">
        <div class="row">



          <div class="col-sm-4 mb-3" style="text-align:left;">
            <div class="form-group">
              <label>College Name : <span style="color:red;">*</span></label>
              <input name="college_name" class="required form-control  rounded border border-2 border-gray px-2" placeholder="Please Enter College Name" style="border-radius: 16px;padding: 13px;border: 2px solid gray;" value="{{isset($college) ? $college->college_name : ''}}">
              @error('college_name') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
          </div>

          <div class="col-sm-4"></div>

        </div>
          <div data-repeater-list="group-a" class="append_course">
            @if(!(isset($college_details)))
            <div class="row repated-sec">
                <div class="col-sm-3" style="text-align:left;">
                  <div class="form-group">
                    <label>Course Name : <span style="color:red;">*</span></label>
                    <input name="course_name[0]" class="required form-control rounded border border-2 border-gray px-2" placeholder="Please Enter Course Name">
                    @error('course_name.0') <span class="text-danger">{{ $message }}</span>@enderror

                  </div>
                </div>

                <div class="col-sm-3" style="text-align:left;">
                  <div class="form-group">
                    <label>Course Fees : <span style="color:red;">*</span></label>
                    <input name="course_fees[0]" class="required form-control rounded border border-2 border-gray px-2" placeholder="Please Enter Course Fees">
                    @error('course_fees.0') <span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                </div>
                <div class="col-sm-3" style="text-align:left;">
                  <div class="form-group">
                    <label>Course Duration : <span style="color:red;">*</span></label>
                    <input name="course_duration[0][0]" class="required defult_duration form-control rounded border border-2 border-gray px-2" placeholder="Please Enter Duration">
                    @error('course_duration') <span class="text-danger">{{ $message }}</span>@enderror
                    <button  type="button" index="0" class="course_duration btn btn-info btn-sm icon-btn ms-2 mb-2 bg-gradient-primary" style="margin-top:10px;position: absolute;top: 16%;left: 84%;width: 13%;">
                      <i class="fa fa-plus"></i>&nbsp;
                    </button>
                  </div>
                </div>
                <div class="col-sm-3 mb-3" style="text-align:left;">
                  <div class="form-group">
                    <label>Scholarship Amount : <span style="color:red;">*</span></label>
                    <input name="scholarship_amount[0]" class="required form-control rounded border border-2 border-gray px-2"  placeholder="Please Enter Scholarship Amount">
                    @error('scholarship_amount.0') <span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                </div>
            </div>
            @else
              @foreach($college_details as $key=>$main_data)
                  <div class="row repated-sec">
                    <div class="col-sm-3">
                      <div class="form-group" style="position: relative;">
                        <label>Course Name : <span style="color:red;">*</span></label>
                        <input name="course_name[{{$key}}]" class="required form-control rounded border border-2 border-gray px-2" placeholder="Please Enter Course Name" value="{{$main_data->course_name}}">
                        @error('course_name.0') <span class="text-danger">{{ $message }}</span>@enderror
                      </div>
                    </div>
                    <div class="col-sm-3" style="text-align:left;">
                      <div class="form-group">
                        <label>Course Fees : <span style="color:red;">*</span></label>
                        <input name="course_fees[{{$key}}]" class="required form-control rounded border border-2 border-gray px-2" placeholder="Please Enter Course Fees" value="{{$main_data->course_fees}}">
                        @error('course_fees.0') <span class="text-danger">{{ $message }}</span>@enderror
                      </div>
                    </div>
                    <div class="col-sm-3" style="text-align:left;">
                      <div class="form-group">
                        <label>Course Duration : <span style="color:red;">*</span></label>
                          @foreach($main_data->course_duration as $key2=>$data)
                          <div class="main_course_duration_remove">
                            <input name="course_duration[{{$key}}][{{$key2}}]" class="required defult_duration form-control rounded border border-2 border-gray px-2" placeholder="Please Enter Duration" value="{{$data->course_duration}}">
                            @if($key2 != 0)
                            <button  type="button" index="" class="course_duration_remove btn btn-info btn-sm icon-btn ms-2 mb-2 bg-gradient-primary" style="margin-top:10px;"><i class="fa fa-minus"></i>&nbsp;</button>
                            @endif
                            @error('course_duration') <span class="text-danger">{{ $message }}</span>@enderror
                          </div>
                          @endforeach
                        <button  type="button" index="{{$key}}" class="course_duration btn btn-info btn-sm icon-btn ms-2 mb-2 bg-gradient-primary" style="margin-top:10px;position: absolute;top: 16%;left: 84%;width: 13%; ">
                          <i class="fa fa-plus"></i>
                        </button>
                      </div>
                    </div>
                    <div class="col-sm-3 mb-3" style="text-align:left;">
                      <div class="form-group">
                        <label>Scholarship Amount : <span style="color:red;">*</span></label>
                        <input name="scholarship_amount[{{$key}}]" class="required form-control rounded border border-2 border-gray px-2"  placeholder="Please Enter Scholarship Amount" value="{{$main_data->scholarship_amount}}">
                        @error('scholarship_amount.0') <span class="text-danger">{{ $message }}</span>@enderror
                      </div>
                    </div>
                </div>
              @endforeach
            @endif
          </div>
          <div class="row pb-3 mt-5">
            <div class="col-md-4 align-center" style="text-align: right;width: 100%;">
              <button type="button" class="add-course btn btn-info btn-md icon-btn ms-2 mb-2 bg-gradient-primary p-3" style="margin-top:10px;">
                <i class="fa fa-plus"></i>&nbsp; Add New Course
              </button>
              <button type="submit" class="btn btn-success btn-lg icon-btn ms-2 mb-0 bg-dark p-3">
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
@include('components.include.footer')
<script>
  $(document).ready(function() {
    $('.repeater').validate();
    $(document).on('click', '.add-course', function() {
      $('.append_course').append(`<div class="row repated-sec">
                <div class="col-sm-3" style="text-align:center;">
                  <div class="form-group">
                    <label>Course Name : <span style="color:red;">*</span></label>
                    <input name="course_name[`+$('.repated-sec').length+`]" class="required form-control rounded border border-2 border-gray px-2" placeholder="Please Enter Course Name">
                  </div>
                </div>

                <div class="col-sm-3" style="text-align:center;">
                  <div class="form-group">
                    <label>Course Fees : <span style="color:red;">*</span></label>
                    <input name="course_fees[`+$('.repated-sec').length+`]" class="required form-control rounded border border-2 border-gray px-2" placeholder="Please Enter Course Fees">
                  </div>
                </div>

                <div class="col-sm-3" style="text-align:center;">
                  <div class="form-group">
                    <label>Course Duration : <span style="color:red;">*</span></label>
                    <input name="course_duration[`+$('.repated-sec').length+`][0]" class="defult_duration required form-control rounded border border-2 border-gray px-2" placeholder="Please Enter Duration">
                    <button  type="button" index="`+$('.repated-sec').length+`" class="course_duration btn btn-info btn-sm icon-btn ms-2 mb-2 bg-gradient-primary" style="margin-top:10px;position: absolute;top: 16%;left: 84%;width: 13%;">
                      <i class="fa fa-plus"></i>&nbsp;
                    </button>
                  </div>
                </div>
                <div class="col-sm-3 mb-3" style="text-align:center;">
                  <div class="form-group">
                    <label>Scholarship Amount : <span style="color:red;">*</span></label>
                    <input name="scholarship_amount[`+$('.repated-sec').length+`]" class="required form-control rounded border border-2 border-gray px-2" placeholder="Please Enter Scholarship Amount">
                  </div>
                </div>

                <button data-repeater-delete="" type="button" class="remove-course btn btn-danger btn-sm icon-btn ms-2 w-5">
                  <i class="fa fa-trash" aria-hidden="true"></i>
                </button>

              </div>`);
    });

    $(document).on('click', '.remove-course', function() {
      $(this).parents('.repated-sec').remove();
    });

    $(document).on('click', '.course_duration', function() {
      $(this).before('<div class="main_course_duration_remove"><input name="course_duration['+$(this).attr('index')+']['+$(this).parents('.repated-sec').find('.defult_duration').length+']" class="defult_duration required form-control rounded border border-2 border-gray px-2" placeholder="Please Enter Duration"><button  type="button" index="" class="course_duration_remove btn btn-info btn-sm icon-btn ms-2 mb-2 bg-gradient-primary" style="margin-top:10px;"><i class="fa fa-minus"></i>&nbsp;</button></div>');
    });

    $(document).on('click', '.course_duration_remove', function() {
      $(this).parents('.main_course_duration_remove').remove();
    });
  });
</script>
