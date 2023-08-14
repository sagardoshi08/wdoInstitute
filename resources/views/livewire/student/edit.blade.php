@include('components.include.header') <style type="text/css">
  img {
    display: block;
    max-width: 30%;
  }
</style>
<form id="contact" enctype="multipart/form-data" action="{{route('studentUpdate')}}" method="POST"> @csrf
  <div>
    <input type="hidden" name="id" value="{{$student->id}}">
    <h3>
      <div class="media">
        <div class="bd-wizard-step-icon">
          <i class="mdi mdi-account-outline"></i>
        </div>
        <div class="media-body">
          <div class="bd-wizard-step-title">Primary Details</div>
          {{-- <div class="bd-wizard-step-subtitle">Step 1</div> --}}
        </div>
      </div>
    </h3>
    <section>
      <div class="row">
        <h4 class="section-heading">Enter your Primary Details </h4>
        <div class="col-sm-3">
          <div class="form-group">
            <label>Application Number Availability</label>
            <select class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline required" name="application_availability" id="application-availability">
              <option value="">--- Select An Option---</option>
              <option value="Pending" {{$student->application_availability == 'Pending' ? 'selected':''}}>Pending</option>
              <option value="Available" {{$student->application_availability == 'Available' ? 'selected':''}}>Available</option>
            </select>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label>Application Number</label>
            <input name="application_number" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline required" placeholder="Please Enter Application Number" value="{{$student->application_number}}" id="application-number">
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label>Year </label>
            <select name="year" class=" w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline required">
              <option value=""> --- Select An Year--- </option>
              <option value="Pending" {{$student->year == 'Pending' ? 'selected':''}}>Pending</option>
              <option value="2021" {{$student->year == '2021' ? 'selected':''}}>2021</option>
              <option value="2022" {{$student->year == '2022' ? 'selected':''}}>2022</option>
              <option value="2023" {{$student->year == '2023' ? 'selected':''}}>2023</option>
              <option value="2024" {{$student->year == '2024' ? 'selected':''}}>2024</option>
              <option value="2025" {{$student->year == '2025' ? 'selected':''}}>2025</option>
            </select>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label>Please Enter Aadhar Number </label>
            <input name="number" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline required" placeholder="Please Enter Aadhar Number" value="{{$student->number}}">
          </div>
        </div>
        <h3 class="card-title mt-3">Bank Details</h3>
        <div class="col-sm-3 ">
          <div class="form-group">
            <label>Account Number :</label>
            <input name="account_number" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline required" placeholder="Please Enter Account Number" value="{{$student->account_number}}">
          </div>
        </div>
        <div class="col-sm-3 ">
          <div class="form-group">
            <label>Bank Name :</label>
            @php $bank = DB::table('banks')->select('*')->get(); @endphp
            <select name="bank_name" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="bank-name">
              <option value="">Select Bank Name</option>
              @foreach($bank as $data)
                <option value="{{$data->bank_name}}" {{$student->bank_name == $data->bank_name ?  'selected' : ''}}>{{$data->bank_name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-sm-3 ">
          <div class="form-group">
            <label>Branch Name :</label>
            <select name="branch_name" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="branch-name">
                <option value="">Select Branch Name</option>
                @foreach($bank_details as $data)
                <option value="{{$data->branch_name}}" {{$student->branch_name == $data->branch_name ? 'selected' : ''}}>{{$data->branch_name}}</option>
                @endforeach
            </select>
          </div>
        </div>
        <div class="col-sm-3 ">
          <div class="form-group">
            <label>IFSC Code :</label>
            <input name="IFSC_code" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline required" placeholder="Please Enter IFSC Code" value="{{$student->IFSC_code}}" id="IFSC-code" readonly>
          </div>
        </div>
      </div>
    </section>
    <h3>
      <div class="media">
        <div class="bd-wizard-step-icon">
          <i class="mdi mdi-bank"></i>
        </div>
        <div class="media-body">
          <div class="bd-wizard-step-title">Personal Details</div>
          {{-- <div class="bd-wizard-step-subtitle">Step 2</div> --}}
        </div>
      </div>
    </h3>
    <section>
      <div class="row">
        <div class="col-sm-3 mt-3">
          <div class="form-group">
            <label>Student Name</label>
            <input name="student_name" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline required" type="text" placeholder="Please Student Name" value="{{$student->student_name}}">
          </div>
        </div>
        <div class="col-sm-3 mt-3">
          <div class="form-group">
            <label>Father Name</label>
            <input name="father_name" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline required" type="text" placeholder="Please Father Name" value="{{$student->father_name}}">
          </div>
        </div>
        <div class="col-sm-3 mt-3">
          <div class="form-group ">
            <label>Mother Name</label>
            <input name="mother_name" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline required" type="text" placeholder="Please Mother Name" value="{{$student->mother_name}}">
          </div>
        </div>
        <div class="col-sm-3 mt-3">
          <div class="form-group ">
            <label>Email Address</label>
            <input name="email_address" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline required" type="email" placeholder="Enter Email Address" value="{{$student->email_address}}">
          </div>
        </div>
        <div class="col-sm-3 mt-3">
          <div class="form-group ">
            <label>Date Of Birth</label>
            <input name="dob" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline required" type="date" value="{{$student->dob}}">
          </div>
        </div>
        <div class="col-sm-3 mt-3">
          <div class="form-group ">
            <label>Gender </label>
            <select name="gender" class=" w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline required">
              <option value="">--- Select An Option---</option>
              <option value="Male" {{$student->gender == 'Male' ? 'selected':''}}>Male</option>
              <option value="Female" {{$student->gender == 'Female' ? 'selected':''}}>Female</option>
            </select>
          </div>
        </div>
        <div class="col-sm-3 mt-3">
          <div class="form-group">
            <label>Phone Number </label>
            <input name="phone_number" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline required" type="number" placeholder="Please Enter Phone Number" value="{{$student->phone_number}}">
          </div>
        </div>
        <div class="col-sm-3 mt-3">
          <div class="form-group">
            <label>Family Income </label>
            <input name="family_income" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline required" type="number" placeholder="Please Enter Family Income" value="{{$student->family_income}}">
          </div>
        </div>
        <div class="col-sm-3 mt-3">
          <div class="form-group">
            <label>Select State </label>
            <select data-show-subtext="true" data-live-search="true" class="form-control border rounded text-gray-700 text-sm font-bold mb-2" name="state" id="state">
                     <option data-tokens="">State</option>
                     @foreach($state as $data)
                     <option data-tokens="{{$data->state}}" {{$student->state == $data->state ? 'selected':''}}>{{$data->state}}</option>
                     @endforeach
               </select>
          </div>
        </div>
        <div class="col-sm-3 mt-3">
          <div class="form-group">
            <label>Select District </label>
            <input name="district" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline required" type="text" placeholder="Please Enter Distic" value="{{$student->district}}">
          </div>
        </div>
        <div class="col-sm-3 mt-3">
          <div class="form-group">
            <label>Sub Divison</label>
            <input name="sub_division" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline required" type="text" placeholder="Please Enter Sub Divison" value="{{$student->sub_division}}">
          </div>
        </div>
        <div class="col-sm-3 mt-3">
          <div class="form-group">
            <label>Cast </label>
            <select name="cast" class=" w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline required">
              <option value="">--- Select An Cast---</option>
              <option value="SC" {{$student->cast == 'SC' ? 'selected':''}}>SC</option>
              <option value="ST" {{$student->cast == 'ST' ? 'selected':''}}>ST</option>
              <option value="OBC" {{$student->cast == 'OBC' ? 'selected':''}}>OBC</option>
              <option value="Genral" {{$student->cast == 'Genral' ? 'selected':''}}>Genral</option>
            </select>
          </div>
        </div>
        <div class="col-sm-3 mt-3">
          <div class="form-group">
            <label>Village / City</label>
            <input name="city" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline required" type="text" placeholder="Please Enter Village / City" value="{{$student->city}}">
          </div>
        </div>
        <div class="col-sm-3 mt-3">
          <div class="form-group">
            <label>PinCode</label>
            <input name="pincode" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline required" type="Number" placeholder="Please Enter PinCode" value="{{$student->pincode}}">
          </div>
        </div>
        <div class="col-sm-3 mt-3">
          <div class="form-group">
            <label>Address Line 1 </label>
            <input name="address_1" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline required" type="text" placeholder="Please Enter Address Line 1" value="{{$student->address_1}}">
          </div>
        </div>
        <div class="col-sm-3 mt-3">
          <div class="form-group">
            <label>Address Line 2 </label>
            <input name="address_2" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline required" type="text" placeholder="Please Enter Address Line 2" value="{{$student->address_2}}">
          </div>
        </div>
    </section>
    <h3>
      <div class="media">
        <div class="bd-wizard-step-icon">
          <i class="mdi mdi-bank"></i>
        </div>
        <div class="media-body">
          <div class="bd-wizard-step-title">Educational Details</div>
          {{-- <div class="bd-wizard-step-subtitle">Step 3</div> --}}
        </div>
      </div>
    </h3>
    <section>
      <div class="row">
        <h3 class="card-title mt-3">Educational Details</h3>
        <h6 class="mt-3">School Details</h6>
        <div class="col-sm-3 mt-3">
          <div class="form-group">
            <label>10th Passing Year</label>
            <input name="ten_path_year" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline required" placeholder="Please Enter 10th Passing Year" value="{{$student->ten_path_year}}">
          </div>
        </div>
        <div class="col-sm-3 mt-3">
          <div class="form-group">
            <label>10th Total Marks</label>
            <input name="ten_total_mark" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline required" placeholder="Please Enter 10th Total Marks" value="{{$student->ten_total_mark}}">
          </div>
        </div>
        <div class="col-sm-3 mt-3">
          <div class="form-group">
            <label>10th Marks</label>
            <input name="ten_mark" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline required" placeholder="Please Enter 10th Marks" value="{{$student->ten_mark}}">
          </div>
        </div>
        <div class="col-sm-3 mt-3">
          <div class="form-group">
            <label>10th Percentage</label>
            <input name="ten_percentage" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline required" placeholder="Please Enter 10th Persentage" value="{{$student->ten_percentage}}">
          </div>
        </div>
        <div class="col-sm-3 mt-3">
          <div class="form-group">
            <label>12th Passing Year</label>
            <input name="twelve_path_year" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline required" placeholder="Please Enter 12th Passing Year" value="{{$student->twelve_path_year}}">
          </div>
        </div>
        <div class="col-sm-3 mt-3">
          <div class="form-group">
            <label>12th Total Marks</label>
            <input name="twelve_total_mark" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline required" placeholder="Please Enter 12th Total Marks" value="{{$student->twelve_total_mark}}">
          </div>
        </div>
        <div class="col-sm-3 mt-3">
          <div class="form-group">
            <label>12th Marks</label>
            <input name="twelve_mark" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline required" placeholder="Please Enter 12th Marks" value="{{$student->twelve_mark}}">
          </div>
        </div>
        <div class="col-sm-3 mt-3">
          <div class="form-group">
            <label>12th Percentage</label>
            <input name="twelve_percentage" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline required" placeholder="Please Enter 12th Persentage" value="{{$student->twelve_percentage}}">
          </div>
        </div>
      </div>
      <div class="row mt-3">
        <h6 class="mt-3">College Details</h6>
        <div class="col-sm-3 mt-3">
          <div class="form-group">
            <label>College Name </label>
            @php $college = DB::table('colleges')->select('*')->get(); @endphp
            <select name="college_name" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline required" id="college-name">
            <option value="">---Please Select College Name---</option>
                @foreach($college as $data)
                    <option value="{{$data->college_name}}" {{$data->college_name == $student->college_name ? 'selected' : ''}}>{{$data->college_name}}</option>
                @endforeach
            </select>
          </div>
        </div>
        <div class="col-sm-3 mt-3">
          <div class="form-group">
            <label>Course Details</label>
            <select name="course_details" id="course-details" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="course-details">
              <option value="">---Please Select Course Name---</option>
                @foreach($college_details as $data)
                  <option value="{{$data->course_name}}" {{$data->course_name == $student->course_details ? 'selected' : ''}}>{{$data->course_name}}</option>
                @endforeach
            </select>
          </div>
        </div>
        <div class="col-sm-6 all-course-details">
          <div class="mt-3">
            <div class="form-group">
              <label>Please Select Current Year</label>
              <select name="collage_current_year" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline required" id="collage-current-year">
                <option>---Please Select Year---</option>
                  @foreach($college_details[$key]->course_duration as $data)
                    <option value="{{$data->course_duration}}" {{$data->course_duration == $student->collage_current_year ? 'selected' : ''}}>{{$data->course_duration}}</option>
                  @endforeach
              </select>
            </div>
          </div>
          <div class="mt-3">
              <div class="form-group">
                <label>Course Fees <span class="deta-alert">*</span></label>
                <input name="course_fee" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Course Fees" value="{{$college_details[$key]->course_fees}}"> 
              </div>
            </div>
            <div class="mt-3">
              <div class="form-group">
                <label>Scholarship Amount <span class="deta-alert">*</span></label>
                <input name="scholarship_amount" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Scholarship Amount" value="{{$college_details[$key]->scholarship_amount}}">
              </div>
            </div>
        </div>
        <!-- <div class="col-sm-3 mt-3">
          <div class="form-group">
            <label>Percentage</label>
            <input name="collage_percentage" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline required" placeholder="Please Enter Percentage" value="">
          </div>
        </div> -->
      </div>
    </section>
    {{--<h3>
      <div class="media">
        <div class="bd-wizard-step-icon">
          <i class="mdi mdi-account-check-outline"></i>
        </div>
        <div class="media-body">
          <div class="bd-wizard-step-title">Agent Details </div>
           <div class="bd-wizard-step-subtitle">Step 4</div>
        </div>
      </div>
    </h3>
    <section>
      <div class="row">
        <h3 class="card-title mt-3">Agent Details</h3>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Agent Name</label>
            <input name="agent_name" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline required" placeholder="Please Enter Agent Name" value="{{$student->agent_name}}">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Agent Mobile Name</label>
            <input name="agent_mobile" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline required" placeholder="Please Enter Agent Mobile Name" value="{{$student->agent_mobile}}">
          </div>
        </div>
      </div>
    </section>--}}
    <h3>
      <div class="media">
        <div class="bd-wizard-step-icon">
          <i class="mdi mdi-emoticon-outline"></i>
        </div>
        <div class="media-body">
          <div class="bd-wizard-step-title">Document Upload</div>
          {{-- <div class="bd-wizard-step-subtitle">Step 5</div> --}}
        </div>
      </div>
    </h3>
    <section class="document-create-edit">
      <div class="row mt-3 document-upload">
        <h3 class="text-start">Document Upload</h3>
        <div class="mb-4 col-sm-12 col-md-5 ghijk create-edit-validation">
          <h6>Self Image</h6>
          <input class="demo1" type="file" name="self_image" value="drage and drop file here or select files" />
            @if(isset($student->self_image))
            @php $self_img = explode('.',$student->self_image)@endphp
            @if($self_img[1] != 'pdf')
            <img src="{{$student->self_image ? asset('assets').'/'.$student->self_image : asset('assets/img/images.png')}}" class="rounded-circle">
            @else
            <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle">
            @endif
            <a href="{{isset($student->self_image) ? asset('assets').'/'.$student->self_image : ''}}" class="btn btn-success mb-0 text-white mt-3" download>Download</a>
            @endif
        </div>
        <div class="mb-4 col-sm-12 col-md-5 ghijk create-edit-validation">
          <h6>Aadhar Card Front</h6>
          <input class="demo1" type="file" name="aadhar_card_front" value="drage and drop file here or select files" />
            @if(isset($student->aadhar_card_front))
            @php $aadhar_card_front = explode('.',$student->aadhar_card_front)@endphp
            @if($aadhar_card_front[1] != 'pdf')
            <img src="{{$student->aadhar_card_front ? asset('assets').'/'.$student->aadhar_card_front : asset('assets/img/images.png')}}" class="rounded-circle">
            @else
            <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle">
            @endif
            <a href="{{isset($student->aadhar_card_front) ? asset('assets').'/'.$student->aadhar_card_front : ''}}" class="btn btn-success mb-0 text-white mt-3" download>Download</a>
            @endif
        </div>
        <div class="mb-4 col-sm-12 col-md-5 ghijk create-edit-validation">
          <h6>Aadhar Card Back</h6>
          <input class="demo1" type="file" name="aadhar_card_back" value="drage and drop file here or select files" />
            @if(isset($student->aadhar_card_back))
            @php $aadhar_card_back = explode('.',$student->aadhar_card_back)@endphp
            @if($aadhar_card_back[1] != 'pdf')
            <img src="{{$student->aadhar_card_back ? asset('assets').'/'.$student->aadhar_card_back : asset('assets/img/images.png')}}" class="rounded-circle">
            @else
            <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle">
            @endif
            <a href="{{isset($student->aadhar_card_back) ? asset('assets').'/'.$student->aadhar_card_back : ''}}" class="btn btn-success mb-0 text-white mt-3" download>Download</a>
            @endif
        </div>
        <div class="mb-4 col-sm-12 col-md-5 ghijk create-edit-validation">
          <h6>PRTC</h6>
          <input class="demo1" type="file" name="prtc" value="drage and drop file here or select files" />
            @if(isset($student->prtc))
            @php $prtc = explode('.',$student->prtc)@endphp
            @if($prtc[1] != 'pdf')
            <img src="{{$student->prtc ? asset('assets').'/'.$student->prtc : asset('assets/img/images.png')}}" class="rounded-circle">
            @else
            <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle">
            @endif
            <a href="{{isset($student->prtc) ? asset('assets').'/'.$student->prtc : ''}}" class="btn btn-success mb-0 text-white mt-3" download>Download</a>
            @endif
        </div>
        <div class="mb-4 col-sm-12 col-md-5 ghijk create-edit-validation">
          <h6>Caste Certificate</h6>
          <input class="demo1" type="file" name="caste_certificate" value="drage and drop file here or select files" />
            @if(isset($student->caste_certificate))
            @php $caste_certificate = explode('.',$student->caste_certificate)@endphp
            @if($caste_certificate[1] != 'pdf')
            <img src="{{$student->caste_certificate ? asset('assets').'/'.$student->caste_certificate : asset('assets/img/images.png')}}" class="rounded-circle">
            @else
            <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle">
            @endif
            <a href="{{isset($student->caste_certificate) ? asset('assets').'/'.$student->caste_certificate : ''}}" class="btn btn-success mb-0 text-white mt-3" download>Download</a>
            @endif
        </div>
        <div class="mb-4 col-sm-12 col-md-5 ghijk create-edit-validation">
          <h6>Bonafide Certificate Nsp</h6>
          <input class="demo1" type="file" name="bonafide_nsp" value="drage and drop file here or select files" />
            @if(isset($student->bonafide_nsp))
            @php $bonafide_nsp = explode('.',$student->bonafide_nsp)@endphp
            @if($bonafide_nsp[1] != 'pdf')
            <img src="{{$student->bonafide_nsp ? asset('assets').'/'.$student->bonafide_nsp : asset('assets/img/images.png')}}" class="rounded-circle">
            @else
            <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle">
            @endif
            <a href="{{isset($student->bonafide_nsp) ? asset('assets').'/'.$student->bonafide_nsp : ''}}" class="btn btn-success mb-0 text-white mt-3" download>Download</a>
            @endif
        </div>
        <div class="mb-4 col-sm-12 col-md-5 ghijk create-edit-validation">
          <h6>Bonafide Certificate College</h6>
          <input class="demo1" type="file" name="bonafide_college" value="drage and drop file here or select files" />
            @if(isset($student->bonafide_college))
            @php $bonafide_college = explode('.',$student->bonafide_college)@endphp
            @if($bonafide_college[1] != 'pdf')
            <img src="{{$student->bonafide_college ? asset('assets').'/'.$student->bonafide_college : asset('assets/img/images.png')}}" class="rounded-circle">
            @else
            <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle">
            @endif
            <a href="{{isset($student->bonafide_college) ? asset('assets').'/'.$student->bonafide_college : ''}}" class="btn btn-success mb-0 text-white mt-3" download>Download</a>
            @endif
        </div>
        <div class="mb-4 col-sm-12 col-md-5 ghijk create-edit-validation">
          <h6>Previous Year Marksheet</h6>
          <input class="demo1" type="file" name="pre_year_mark" value="drage and drop file here or select files" />
            @if(isset($student->pre_year_mark))
            @php $pre_year_mark = explode('.',$student->pre_year_mark)@endphp
            @if($pre_year_mark[1] != 'pdf')
            <img src="{{$student->pre_year_mark ? asset('assets').'/'.$student->pre_year_mark : asset('assets/img/images.png')}}" class="rounded-circle">
            @else
            <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle">
            @endif
            <a href="{{isset($student->pre_year_mark) ? asset('assets').'/'.$student->pre_year_mark : ''}}" class="btn btn-success mb-0 text-white mt-3" download>Download</a>
            @endif
        </div>
        <div class="mb-4 col-sm-12 col-md-5 ghijk create-edit-validation">
          <h6>Income Certificate</h6>
          <input class="demo1" type="file" name="income_certificate" value="drage and drop file here or select files" />
            @if(isset($student->income_certificate))
            @php $income_certificate = explode('.',$student->income_certificate)@endphp
            @if($income_certificate[1] != 'pdf')
            <img src="{{$student->income_certificate ? asset('assets').'/'.$student->income_certificate : asset('assets/img/images.png')}}" class="rounded-circle">
            @else
            <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle">
            @endif
            <a href="{{isset($student->income_certificate) ? asset('assets').'/'.$student->income_certificate : ''}}" class="btn btn-success mb-0 text-white mt-3" download>Download</a>
            @endif
        </div>
        <div class="mb-4 col-sm-12 col-md-5 ghijk create-edit-validation">
          <h6> Signature</h6>
          <input class="demo1" type="file" name="signature" value="drage and drop file here or select files" />
            @if(isset($student->signature))
            @php $signature = explode('.',$student->signature)@endphp
            @if($signature[1] != 'pdf')
            <img src="{{$student->signature ? asset('assets').'/'.$student->signature : asset('assets/img/images.png')}}" class="rounded-circle">
            @else
            <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle">
            @endif
            <a href="{{isset($student->signature) ? asset('assets').'/'.$student->signature : ''}}" class="btn btn-success mb-0 text-white mt-3" download>Download</a>
            @endif
        </div>
      </div>
      <button class="create-edit student-create-edit" type="submit">Finish</button>
    </section>
  </div>
</form> @include('components.include.footer') <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered profile-img-upload" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Crop and Upload Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="">
          <div class="row">
            <div class="d-flex justify-content-center align-items-center" style="min-height:400px;">
              <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-cancel close" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn crop-btn" id="crop">Crop</button>
      </div>
    </div>
  </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.js"></script>
<script>
  var form = $("#contact");
  form.validate({
    errorPlacement: function errorPlacement(error, element) {
      element.after(error);
    },
  })
  form.children("div").steps({
    headerTag: "h3",
    bodyTag: "section",
    enableAllSteps: true,
    onStepChanging: function(event, currentIndex, newIndex) {
      console.log(event);
      form.validate().settings.ignore = ":disabled,:hidden";
      return form.valid();
    },
    onFinishing: function(event, currentIndex) {
      form.validate().settings.ignore = ":disabled";
      return form.valid();
    }
  });
  $(document).ready(function() {
      $(document).on('change', '#application-availability', function() {
         if($(this).val() == 'Pending'){
            $('#application-number').val($(this).val()).attr('readOnly',true);
         }else{
            $('#application-number').val('').attr('readOnly',false);
         }
      });

      $(document).on('change', '#bank-name', function() {
        if($(this).val() != ''){
          $.ajax({
              type: 'POST',
              url: "{{ route('getBranchName') }}",
              data: {
                  'bank_name': $('#bank-name').val(),
                  "_token": "{{ csrf_token() }}"
              },
              dataType: 'html',
              success: function(data) {
                $('#branch-name').html(data);
                $('#branch-name').attr('disabled',false);
              }
          });
        }else{
          $('#branch-name').html('<option value="">Select Branch Name</option>');
          $('#branch-name').attr('disabled',true);
          $('#IFSC-code').val('');
        }
      });

      $(document).on('change', '#branch-name', function() {
        if($(this).val() != ''){
          $.ajax({
              type: 'POST',
              url: "{{ route('getIfscCode') }}",
              data: {
                  'bank_name' : $('#bank-name').val(),
                  'branch_name': $('#branch-name').val(),
                  "_token": "{{ csrf_token() }}"
              },
              dataType: 'html',
              success: function(data) {
                $('#IFSC-code').val(data);
              }
          });
        }else{
          $('#IFSC-code').val('');
        }
      });

      $(document).on('change', '#college-name', function() {
        if($(this).val() != ''){
          $('.all-course-details').html(`<div class="mt-3 ">
                    <div class="form-group">
                      <label>Please Select Current Year <span class="deta-alert">*</span></label>
                      <select id="collage-current-year" name="collage_current_year" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" disabled>
                        <option>---Please Select Year---</option>
                      </select>
                    </div>
                  </div>`);
          $.ajax({
              type: 'POST',
              url: "{{ route('getCourseName') }}",
              data: {
                  'collage_name': $('#college-name').val(),
                  "_token": "{{ csrf_token() }}"
              },
              dataType: 'html',
              success: function(data) {
                $('#course-details').html(data);
                $('#course-details').attr('disabled',false);
              }
          });
        }else{
          $('#course-details').html('<option value="">---Please Select Course Name---</option>');
          $('#course-details').attr('disabled',true);
          $('.all-course-details').html(`<div class="mt-3 ">
                    <div class="form-group">
                      <label>Please Select Current Year <span class="deta-alert">*</span></label>
                      <select id="collage-current-year" name="collage_current_year" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" disabled>
                        <option>---Please Select Year---</option>
                      </select>
                    </div>
                  </div>`);

        }
      });

      $(document).on('change', '#course-details', function() {
        if($(this).val() != ''){
          $.ajax({
              type: 'POST',
              url: "{{ route('getCourseYear') }}",
              data: {
                  'collage_name': $('#college-name').val(),
                  'course_details': $('#course-details').val(),
                  "_token": "{{ csrf_token() }}"
              },
              dataType: 'html',
              success: function(data) {
                $('.all-course-details').html(data);
              }
          });
        }else{
          $('.all-course-details').html(`<div class="mt-3 ">
                    <div class="form-group">
                      <label>Please Select Current Year <span class="deta-alert">*</span></label>
                      <select id="collage-current-year" name="collage_current_year" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" disabled>
                        <option>---Please Select Year---</option>
                      </select>
                    </div>
                  </div>`);
        }
      });
   });
</script>
</html>
