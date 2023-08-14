<div class="container-fluid py-4 students-crate-ste">
    <div class="row">
      <form class="form-custom" method="POST" action="{{route('studentStore')}}" enctype="multipart/form-data">
        @csrf
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="add-user-form add-form-user">


            <div class="row">
              <div class="crat-paga-all">
                <h3 class="text-start">Primary Details</h3>
                <div class="row" style="padding: 10px;">
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Application Number Availability <span class="deta-alert">*</span></label>
                      <select class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="application_availability" id="application-availability">
                        <option value="">--- Select An Option---</option>
                        <option value="Pending">Pending</option>
                        <option value="Available">Available</option>
                      </select>
                      @error('application_availability') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Application Number <span class="deta-alert">*</span></label>
                      <input name="application_number" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter Application Number" id="application-number">
                      @error('application_number') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Year <span class="deta-alert">*</span></label>
                      <select name="year" class=" w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value=""> --- Select An Year--- </option>
                        <option value="Pending">Pending</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024" selected>2024</option>
                        <option value="2025">2025</option>
                      </select>
                      @error('year') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Please Enter Aadhar Number <span class="deta-alert">*</span></label>
                      <input name="number" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter Aadhar Number">
                      @error('number') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                </div>
              </div>
              <div class="crat-paga-all">
                <h3 class="card-title mt-3">Bank Details</h3>
                <div class="row" style="padding: 10px;">
                  <div class="col-sm-3 ">
                    <div class="form-group">
                      <label>Account Number <span class="deta-alert">*</span></label>
                      <input name="account_number" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter Account Number">
                      @error('account_number') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-sm-3 ">
                    <div class="form-group">
                      <label>Bank Name <span class="deta-alert">*</span></label>
                      @php $bank = DB::table('banks')->select('*')->get(); @endphp
                      <select name="bank_name" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="bank-name">
                        <option value="">Select Bank Name</option>
                        @foreach($bank as $data)
                          <option value="{{$data->bank_name}}">{{$data->bank_name}}</option>
                        @endforeach
                      </select>
                      @error('bank_name') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-sm-3 ">
                    <div class="form-group">
                      <label>Branch Name <span class="deta-alert">*</span></label>
                      <select name="branch_name" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" disabled id="branch-name">
                      <option value="">Select Branch Name</option>
                      </select>
                      @error('branch_name') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-sm-3 ">
                    <div class="form-group">
                      <label>IFSC Code <span class="deta-alert">*</span></label>
                      <input name="IFSC_code" id="IFSC-code" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter IFSC Code" readonly>
                      @error('IFSC_code') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                </div>
              </div>
              <div class="crat-paga-all">
                <h3 class="card-title mt-3">Personal Details</h3>
                <div class="row" style="padding: 10px;">
                  <div class="col-sm-3 mt-3">
                    <div class="form-group">
                      <label>Student Name <span class="deta-alert">*</span></label>
                      <input name="student_name" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Please Student Name">
                      @error('student_name') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-sm-3 mt-3">
                    <div class="form-group">
                      <label>Father Name <span class="deta-alert">*</span></label>
                      <input name="father_name" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Please Father Name">
                      @error('father_name') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-sm-3 mt-3">
                    <div class="form-group ">
                      <label>Mother Name <span class="deta-alert">*</span></label>
                      <input name="mother_name" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Please Mother Name">
                      @error('mother_name') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-sm-3 mt-3">
                    <div class="form-group ">
                      <label>Email Address <span class="deta-alert">*</span></label>
                      <input name="email_address" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email" placeholder="Enter Email Address">
                      @error('email_address') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-sm-3 mt-3">
                    <div class="form-group ">
                      <label>Date Of Birth <span class="deta-alert">*</span></label>
                      <input name="dob" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date">
                      @error('dob') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-sm-3 mt-3">
                    <div class="form-group ">
                      <label>Gender <span class="deta-alert">*</span></label>
                      <select name="gender" class=" w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">--- Select An Option---</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                      @error('gender') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-sm-3 mt-3">
                    <div class="form-group">
                      <label>Phone Number <span class="deta-alert">*</span></label>
                      <input name="phone_number" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" placeholder="Please Enter Phone Number">
                      @error('phone_number') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-sm-3 mt-3">
                    <div class="form-group">
                      <label>Family Income <span class="deta-alert">*</span></label>
                      <input name="family_income" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" placeholder="Please Enter Family Income">
                      @error('family_income') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-sm-3 mt-3">
                    <div class="form-group">
                      <label>Select State <span class="deta-alert">*</span></label>
                      <select name="state" class=" w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">--- Select An State---</option>
                        @php $states = DB::table('states')->select('*')->get(); @endphp
                        @foreach($states as $data)
                        <option data-tokens="{{$data->state}}">{{$data->state}}</option>
                        @endforeach
                      </select>
                      @error('state') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-sm-3 mt-3">
                    <div class="form-group">
                      <label>Select District <span class="deta-alert">*</span></label>
                      <input name="district" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Please Enter Distic">
                      @error('district') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-sm-3 mt-3">
                    <div class="form-group">
                      <label>Sub Divison <span class="deta-alert">*</span></label>
                      <input name="sub_division" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Please Enter Sub Divison">
                      @error('sub_division') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-sm-3 mt-3">
                    <div class="form-group">
                      <label>Cast <span class="deta-alert">*</span></label>
                      <select name="cast" class=" w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">--- Select An Cast---</option>
                        <option value="SC">SC</option>
                        <option value="ST">ST</option>
                        <option value="OBC">OBC</option>
                        <option value="Genral">Genral</option>
                      </select>
                      @error('cast') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-sm-3 mt-3">
                    <div class="form-group">
                      <label>Village / City <span class="deta-alert">*</span></label>
                      <input name="city" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Please Enter Village / City">
                      @error('city') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-sm-3 mt-3">
                    <div class="form-group">
                      <label>PinCode <span class="deta-alert">*</span></label>
                      <input name="pincode" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="Number" placeholder="Please Enter PinCode">
                      @error('pincode') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-sm-3 mt-3">
                    <div class="form-group">
                      <label>Address Line 1 <span class="deta-alert">*</span></label>
                      <input name="address_1" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Please Enter Address Line 1">
                      @error('address_1') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-sm-3 mt-3">
                    <div class="form-group">
                      <label>Address Line 2 <span class="deta-alert">*</span></label>
                      <input name="address_2" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Please Enter Address Line 2">
                      @error('address_2') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="row">
              <div class="crat-paga-all">
                <h3 class="card-title mt-3">Educational Details</h3>
                <h6 class="mt-3" style="padding: 10px;">School Details <span class="deta-alert">*</span></h6>
                <div class="row" style="padding: 0 11px;">
                  <div class="col-sm-3 mt-3">
                    <div class="form-group">
                      <label>10th Passing Year</label>
                      <input name="ten_path_year" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter 10th Passing Year">
                      @error('ten_path_year') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-sm-3 mt-3">
                    <div class="form-group">
                      <label>10th Total Marks <span class="deta-alert">*</span></label>
                      <input name="ten_total_mark" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter 10th Total Marks">
                      @error('ten_total_mark') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-sm-3 mt-3">
                    <div class="form-group">
                      <label>10th Marks <span class="deta-alert">*</span></label>
                      <input name="ten_mark" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter 10th Marks">
                      @error('ten_mark') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-sm-3 mt-3">
                    <div class="form-group">
                      <label>10th Percentage <span class="deta-alert">*</span></label>
                      <input name="ten_percentage" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter 10th Persentage">
                      @error('ten_percentage') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-sm-3 mt-3">
                    <div class="form-group">
                      <label>12th Passing Year <span class="deta-alert">*</span></label>
                      <input name="twelve_path_year" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter 12th Passing Year">
                      @error('twelve_path_year') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-sm-3 mt-3">
                    <div class="form-group">
                      <label>12th Total Marks <span class="deta-alert">*</span></label>
                      <input name="twelve_total_mark" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter 12th Total Marks">
                      @error('twelve_total_mark') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-sm-3 mt-3">
                    <div class="form-group">
                      <label>12th Marks <span class="deta-alert">*</span></label>
                      <input name="twelve_mark" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter 12th Marks">
                      @error('twelve_mark') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-sm-3 mt-3">
                    <div class="form-group">
                      <label>12th Percentage <span class="deta-alert">*</span></label>
                      <input name="twelve_percentage" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter 12th Persentage">
                      @error('twelve_percentage') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                </div>
                <div class="row mt-3" style="padding: 10px;">
                  <h6 class="mt-3" style="padding: 0 11px;">College Details</h6>
                  <div class="col-sm-3 mt-3">
                    <div class="form-group">
                      <label>College Name <span class="deta-alert">*</span></label>
                      @php $college = DB::table('colleges')->select('*')->get(); @endphp
                      <select name="college_name" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="college-name">
                        <option value="">---Please Select College Name---</option>
                        @foreach($college as $data)
                        <option value="{{$data->college_name}}">{{$data->college_name}}</option>
                        @endforeach
                      </select>
                      @error('college_name') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>

                  <div class="col-sm-3 mt-3">
                    <div class="form-group">
                      <label>Course Details <span class="deta-alert">*</span></label>
                      <select name="course_details" id="course-details" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" disabled id="course-details">
                        <option value="">---Please Select Course Name---</option>

                      </select>
                      @error('course_details') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-sm-6 all-course-details">
                  <div class="mt-3 ">
                    <div class="form-group">
                      <label>Please Select Current Year <span class="deta-alert">*</span></label>
                      <select id="collage-current-year" name="collage_current_year" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" disabled>
                        <option>---Please Select Year---</option>
                      </select>
                      @error('collage_current_year') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="mt-3 d-none">
                    <div class="form-group">
                      <label>Course Fees <span class="deta-alert">*</span></label>
                      <input name="course_fee" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Course Fees">
                      @error('course_fee') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="mt-3 d-none">
                    <div class="form-group">
                      <label>Scholarship Amount <span class="deta-alert">*</span></label>
                      <input name="scholarship_amount" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Scholarship Amount">
                      @error('scholarship_amount') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                </div>
                  <!-- <div class="col-sm-3 mt-3">
                    <div class="form-group">
                      <label>Percentage <span class="deta-alert">*</span></label>
                      <input name="collage_percentage" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter Percentage">
                      @error('collage_percentage') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div> -->

                </div>
              </div>
            </div>

            <!-- <div class="row">
              <h3 class="card-title mt-3">Agent Details</h3>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Agent Name <span class="deta-alert">*</span></label>
                  <input name="agent_name" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter Agent Name">
                  @error('agent_name') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label>Agent Mobile Name <span class="deta-alert">*</span></label>
                  <input name="agent_mobile" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter Agent Mobile Name">
                  @error('agent_mobile') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
              </div>

            </div> -->
            <div class="row mt-3 document-upload">
              <div class="crat-paga-all">
                <h3 class="text-start">Document Upload</h3>
                <div class="row" style="justify-content: center;">
                  <div class="mb-4 col-sm-12 col-md-3 text-center">
                    <h6>Self Image</h6>
                    <input class="demo1" type="file" name="self_image" value="drage and drop file here or select files" />
                    @error('self_image') <span class="text-danger">{{ $message }}</span>@enderror
                    @if(!is_object($self_image)&& $self_image!='')
                    <button wire:click.prevent="download('{{ $self_image }}')" type="button" class="btn btn-success mb-0 text-white mt-3">Download</button>
                    @endif
                  </div>
                  <div class="mb-4 col-sm-12 col-md-3">
                    <h6>Aadhar Card Front</h6>
                    <input class="demo1" type="file" name="aadhar_card_front" value="drage and drop file here or select files" />
                    @error('aadhar_card_front') <span class="text-danger">{{ $message }}</span>@enderror
                    @if(!is_object($aadhar_card_front)&& $aadhar_card_front!='')
                    <button wire:click.prevent="download('{{ $aadhar_card_front }}')" type="button" class="btn btn-success mb-0 text-white mt-3">Download</button>
                    @endif
                  </div>
                  <div class="mb-4 col-sm-12 col-md-3">
                    <h6>Aadhar Card Back</h6>
                    <input class="demo1" type="file" name="aadhar_card_back" value="drage and drop file here or select files" />
                    @error('aadhar_card_back') <span class="text-danger">{{ $message }}</span>@enderror
                    @if(!is_object($aadhar_card_back)&& $aadhar_card_back!='')
                    <button wire:click.prevent="download('{{ $aadhar_card_back }}')" type="button" class="btn btn-success mb-0 text-white mt-3">Download</button>
                    @endif
                  </div>
                  <div class="mb-4 col-sm-12 col-md-3">
                    <h6>PRTC</h6>
                    <input class="demo1" type="file" name="prtc" value="drage and drop file here or select files" />
                    @error('prtc') <span class="text-danger">{{ $message }}</span>@enderror
                    @if(!is_object($prtc)&& $prtc!='')
                    <button wire:click.prevent="download('{{ $prtc }}')" type="button" class="btn btn-success mb-0 text-white mt-3">Download</button>
                    @endif
                  </div>
                  <div class="mb-4 col-sm-12 col-md-3">
                    <h6>Caste Certificate</h6>
                    <input class="demo1" type="file" name="caste_certificate" value="drage and drop file here or select files" />
                    @error('caste_certificate') <span class="text-danger">{{ $message }}</span>@enderror
                    @if(!is_object($caste_certificate)&& $caste_certificate!='')
                    <button wire:click.prevent="download('{{ $caste_certificate }}')" type="button" class="btn btn-success mb-0 text-white mt-3">Download</button>
                    @endif
                  </div>
                  <div class="mb-4 col-sm-12 col-md-3">
                    <h6>Bonafide Certificate Nsp</h6>
                    <input class="demo1" type="file" name="bonafide_nsp" value="drage and drop file here or select files" />
                    @error('bonafide_nsp') <span class="text-danger">{{ $message }}</span>@enderror
                    @if(!is_object($bonafide_nsp)&& $bonafide_nsp!='')
                    <button wire:click.prevent="download('{{ $bonafide_nsp }}')" type="button" class="btn btn-success mb-0 text-white mt-3">Download</button>
                    @endif
                  </div>
                  <div class="mb-4 col-sm-12 col-md-3">
                    <h6>Bonafide Certificate College</h6>
                    <input class="demo1" type="file" name="bonafide_college" value="drage and drop file here or select files" />
                    @error('bonafide_college') <span class="text-danger">{{ $message }}</span>@enderror
                    @if(!is_object($bonafide_college)&& $bonafide_college!='')
                    <button wire:click.prevent="download('{{ $bonafide_college }}')" type="button" class="btn btn-success mb-0 text-white mt-3">Download</button>
                    @endif
                  </div>
                  <div class="mb-4 col-sm-12 col-md-3">
                    <h6>Previous Year Marksheet</h6>
                    <input class="demo1" type="file" name="pre_year_mark" value="drage and drop file here or select files" />
                    @error('pre_year_mark') <span class="text-danger">{{ $message }}</span>@enderror
                    @if(!is_object($pre_year_mark)&& $pre_year_mark!='')
                    <button wire:click.prevent="download('{{ $pre_year_mark }}')" type="button" class="btn btn-success mb-0 text-white mt-3">Download</button>
                    @endif
                  </div>
                  <div class="mb-4 col-sm-12 col-md-3">
                    <h6>Income Certificate</h6>
                    <input class="demo1" type="file" name="income_certificate" value="drage and drop file here or select files" />
                    @error('income_certificate') <span class="text-danger">{{ $message }}</span>@enderror
                    @if(!is_object($income_certificate)&& $income_certificate!='')
                    <button wire:click.prevent="download('{{ $income_certificate }}')" type="button" class="btn btn-success mb-0 text-white mt-3">Download</button>
                    @endif
                  </div>
                  <div class="mb-4 col-sm-12 col-md-3">
                    <h6> Signature</h6>
                    <input class="demo1" type="file" name="signature" value="drage and drop file here or select files" />
                    @error('signature') <span class="text-danger">{{ $message }}</span>@enderror
                    @if(!is_object($signature)&& $signature!='')
                    <button wire:click.prevent="download('{{ $signature }}')" type="button" class="btn btn-success mb-0 text-white mt-3">Download</button>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse save-cancel" style="text-align: end;">
              <span class="flex w-full rounded-md  sm:ml-3 sm:w-auto">
                <button type="submit" class="btn bg-dark mb-0 text-white rounded-pill">
                  Save
                </button>
              </span>
              <span class="mt-3 flex w-full rounded-md sm:mt-0 sm:w-auto">
                <button wire:click="closeModal()" type="button" class=" rounded-pill inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5 cancel-btn">
                  Cancel
                </button>
              </span>
            </div>

          </div>
        </div>
      </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.js"></script>
<script type="text/javascript">
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
