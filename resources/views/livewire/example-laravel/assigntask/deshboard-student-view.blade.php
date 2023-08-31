@include('components.include.header')
<style>
   .view .border {
    border: 0px !important;
}
.view .shadow {
    box-shadow: none !important;
}
.view .form-control:disabled, .view .form-control[readonly], .view .form-group select {
    background-color: transparent !important;
    opacity: 1;
}
</style>
<div class="container-fluid py-4 view">
  <div class="row">
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 pbl">
        <div class=" add-user-form view-form">
          <div class="row">
            <div class="students-start">
              <div class="students-text">
                <h4 class="text-start">Primary Details</h4>
              </div>
              <div class="row students-start-col">
              <div class="col-sm-3">
                <div class="form-group">
                  <label><b>Application Number Availability</b></label>
                  <input class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  value="{{$student->application_availability}}">
                  @error('application_availability') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label><b>Application Number</b></label>
                  <input  value="{{isset($student->application_permission) && $student->application_permission == 'No' ? '***********' . substr($student->application_number,-4) : $student->application_number  }}" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter Application Number" readonly>
                  @error('application_number') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label><b>Year</b></label>
                  <input value="{{$student->year}}" class=" w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
                  @error('year') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label><b>Please Enter Aadhar Number</b></label>
                  <input  value="{{isset($student->aadhar_permission) && $student->aadhar_permission == 'No' ? '***********' . substr($student->number,-4) : $student->number  }}" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter Aadhar Number" readonly>
                  @error('number') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
              </div>
            </div>
          </div>

          <div>
              <div class="row">
              <div class="students-start">
              <div class="students-text">
            <h4 class="card-title text-start">Bank Details</h4>
            </div>
            <div class="row students-start-col">
              <div class="col-sm-3 ">
                <div class="form-group">
                  <label><b>Account Number</b></label>
                  <input  value="{{isset($student->bank_permission) && $student->bank_permission == 'No' ? '***********' . substr($student->account_number,-4) : $student->account_number  }}" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter Account Number" readonly>
                  @error('account_number') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
              </div>
              <div class="col-sm-3 ">
                <div class="form-group">
                  <label><b>IFSC Code</b></label>
                  <input  value="{{isset($student->bank_permission) && $student->bank_permission == 'No' ? '***********' . substr($student->IFSC_code,-4) : $student->IFSC_code  }}" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter IFSC Code" readonly>
                  @error('IFSC_code') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
              </div>
              <div class="col-sm-3 ">
                <div class="form-group">
                  <label><b>Bank Name</b></label>
                  <input  value="{{isset($student->bank_permission) && $student->bank_permission == 'No' ? '' : $student->bank_name  }}" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter Bank Name" readonly>
                  @error('bank_name') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
              </div>
              <div class="col-sm-3 ">
                <div class="form-group">
                  <label><b>Branch Name</b></label>
                  <input  value="{{$student->branch_name}}" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter Branch Name" readonly>
                  @error('branch_name') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
              </div>
            </div>
          </div>
          </div>
        </div>
        <div>
          <div class="row">
            <div class="students-start">
              <div class="students-text">
                <h4 class="card-title text-start">Personal Details</h4>
              </div>
              <div class="row students-start-col">
                <div class="col-sm-3 mt-3">
                  <div class="form-group">
                    <label><b>Student Name</b></label>
                    <input value="{{$student->student_name}}" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Please Student Name" readonly>
                    @error('student_name') <span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                </div>
                <div class="col-sm-3 mt-3">
                  <div class="form-group">
                    <label><b>Father Name</b></label>
                    <input value="{{$student->father_name}}" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Please Father Name" readonly>
                    @error('father_name') <span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                </div>
                <div class="col-sm-3 mt-3">
                  <div class="form-group ">
                    <label><b>Mother Name</b></label>
                    <input value="{{$student->mother_name}}" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Please Mother Name" readonly>
                    @error('mother_name') <span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                </div>
                <div class="col-sm-3 mt-3">
                  <div class="form-group ">
                    <label><b>Email Address</b></label>
                    <input value="{{isset($student->contacts_permission) && $student->contacts_permission == 'No' ? '-' : $student->email_address  }}" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email" placeholder="Enter Email Address" readonly>
                    @error('email_address') <span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                </div>
                <div class="col-sm-3 mt-3">
                  <div class="form-group ">
                    <label><b>Date Of Birth</b></label>
                    <input value="{{$student->dob}}" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date" readonly>
                    @error('dob') <span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                </div>
                <div class="col-sm-3 mt-3">
                  <div class="form-group ">
                    <label><b>Gender</b></label>
                    <input value="{{$student->gender}}" class=" w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
                    @error('gender') <span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                </div>
                <div class="col-sm-3 mt-3">
                  <div class="form-group">
                    <label><b>Phone Number</b></label>
                    <input value="{{isset($student->contacts_permission) && $student->contacts_permission == 'No' ? '***********' . substr($student->phone_number,-4) : $student->phone_number  }}" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" placeholder="Phone Number" readonly>
                    @error('phone_number') <span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                </div>
                <div class="col-sm-3 mt-3">
                  <div class="form-group">
                    <label><b>Family Income</b></label>
                    <input value="{{$student->family_income}}" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" placeholder="Please Enter Family Income" readonly>
                    @error('family_income') <span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                </div>
                <div class="col-sm-3 mt-3">
                  <div class="form-group">
                    <label><b>Select State</b></label>
                    <input value="{{$student->state}}" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter Percentage" readonly>
                    @error('state') <span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                </div>
                <div class="col-sm-3 mt-3">
                  <div class="form-group">
                    <label><b>Select District</b></label>
                    <input value="{{$student->district}}" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Please Enter Distic" readonly>
                    @error('district') <span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                </div>
                <div class="col-sm-3 mt-3">
                  <div class="form-group">
                    <label><b>Sub Divison</b></label>
                    <input value="{{$student->sub_division}}" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Please Enter Sub Divison" readonly>
                    @error('sub_division') <span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                </div>
                <div class="col-sm-3 mt-3">
                  <div class="form-group">
                    <label><b>Cast</b></label>
                    <input value="{{$student->cast}}" class=" w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
                    @error('cast') <span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                </div>
                <div class="col-sm-3 mt-3">
                  <div class="form-group">
                    <label class="village12"></b>Village / City</b></label>
                    <input value="{{$student->city}}" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Please Enter Village / City" readonly>
                    @error('city') <span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                </div>
                <div class="col-sm-3 mt-3">
                  <div class="form-group">
                    <label><b>PinCode</b></label>
                    <input value="{{$student->pincode}}" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="Number" placeholder="Please Enter PinCode" readonly>
                    @error('pincode') <span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                </div>
                <div class="col-sm-3 mt-3">
                  <div class="form-group">
                    <label><b>Address Line 1</b></label>
                    <input value="{{$student->address_1}}" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Please Enter Address Line 1" readonly>
                    @error('address_1') <span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                </div>
                <div class="col-sm-3 mt-3">
                  <div class="form-group">
                    <label><b>Address Line 2</b></label>
                    <input value="{{$student->address_2}}" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Please Enter Address Line 2" readonly>
                    @error('address_2') <span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

            <div>
                <div class="row">
                  <div class="students-start">
                    <div class="students-text">
                      <h4 class="card-title text-start">Educational Details</h4>
                    </div>
                    <div class="row students-start-col">
                      <h6 class="mt-3">School Details</h6>
                      <div class="col-sm-3 mt-3">
                        <div class="form-group">
                          <label><b>10th Passing Year</b></label>
                          <input value="{{$student->ten_path_year}}" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter 10th Passing Year" readonly>
                          @error('ten_path_year') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                      </div>
                      <div class="col-sm-3 mt-3">
                        <div class="form-group">
                          <label><b>10th Total Marks</b></label>
                          <input value="{{$student->ten_total_mark}}" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter 10th Total Marks" readonly>
                          @error('ten_total_mark') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                      </div>
                      <div class="col-sm-3 mt-3">
                        <div class="form-group">
                          <label><b>10th Marks</b></label>
                          <input value="{{$student->ten_mark}}" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter 10th Marks" readonly>
                          @error('ten_mark') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                      </div>
                      <div class="col-sm-3 mt-3">
                        <div class="form-group">
                          <label><b>10th Percentage</b></label>
                          <input value="{{$student->ten_percentage}}" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter 10th Persentage" readonly>
                          @error('ten_percentage') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                      </div>
                      <div class="col-sm-3 mt-3">
                        <div class="form-group">
                          <label><b>12th Passing Year</b></label>
                          <input value="{{$student->twelve_path_year}}" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter 12th Passing Year" readonly>
                          @error('twelve_path_year') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                      </div>
                      <div class="col-sm-3 mt-3">
                        <div class="form-group">
                          <label><b>12th Total Marks</b></label>
                          <input value="{{$student->twelve_total_mark}}" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter 12th Total Marks" readonly>
                          @error('twelve_total_mark') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                      </div>
                      <div class="col-sm-3 mt-3">
                        <div class="form-group">
                          <label><b>12th Marks</b></label>
                          <input value="{{$student->twelve_mark}}" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter 12th Marks" readonly>
                          @error('twelve_mark') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                      </div>
                      <div class="col-sm-3 mt-3">
                        <div class="form-group">
                          <label><b>12th Percentage</b></label>
                          <input value="{{$student->twelve_percentage}}" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter 12th Persentage" readonly>
                          @error('twelve_percentage') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>



          <div>
            <div class="row">
              <div class="students-start">
                <div class="students-text">
                  <h4 class="text-start">College Details</h4>
                </div>
                <div class="row students-start-col">
                  <div class="col-sm-3 mt-3">
                    <div class="form-group">
                      <label><b>College Name</b></label>
                      <input value="{{$student->college_name}}" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter Percentage" readonly>
                      @error('college_name') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-sm-3 mt-3">
                    <div class="form-group">
                      <label><b>Course Details</b></label>
                      <input value="{{$student->course_details}}" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter Percentage" readonly>
                      @error('course_details') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-sm-3 mt-3">
                    <div class="form-group">
                      <label><b>Please Select Current Year</b></label>
                      <input value="{{$student->collage_current_year}}" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter Percentage" readonly>
                      @error('collage_current_year') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-sm-3 mt-3">
                    <div class="form-group">
                      <label><b>Percentage</b></label>
                      <input value="{{$student->collage_percentage}}" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter Percentage" readonly>
                      @error('collage_percentage') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
              <div>
          <div class="row">
          <div class="students-start">
            <div class="students-text">
              <h4 class="card-title text-start">Document Upload</h4>
            </div>
            <div class="row students-start-col">
              {{-- <div class="col-sm-6">
                <div class="form-group">
                  <label><b>Agent Name</b></label>
                  <input value="{{$student->agent_name" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter Agent Name" readonly>
                  @error('agent_name') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label><b>Agent Mobile Name</b></label>
                  <input value="{{$student->agent_mobile" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter Agent Mobile Name" readonly>
                  @error('agent_mobile') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
              </div> --}}
              <div class="row mt-3">
                {{-- <h3 class="text-start">Document Upload</h3> --}}
                <div class="mb-4 col-sm-12 col-md-3 ">
                  <div class="text-center ghijk ">
                      <h6>Self Image</h6>
                      @if(isset($student->self_image))
                      @php $self_image = explode('.',$student->self_image)@endphp
                      @if($self_image[1] != 'pdf')
                       <img src="{{$student->self_image ? asset('assets').'/'.$student->self_image : asset('assets/img/images.png')}}" class="rounded-circle img-download"> 
                      @else
                      <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle img-download">
                      @endif
                      <a href="{{asset('assets').'/'.$student->self_image}}" class="btn btn-success mb-0 text-white mt-3 " download>Download</a>
                      @endif
                  </div>
                </div>
                <div class="mb-4 col-sm-12 col-md-3">
                  <div class="text-center ghijk">

                      <h6>Aadhar Card Front</h6>
                      @if(isset($student->aadhar_card_front))
                      @php $aadhar_card_front = explode('.',$student->aadhar_card_front)@endphp
                      @if($aadhar_card_front[1] != 'pdf')
                       <img src="{{$student->aadhar_card_front ? asset('assets').'/'.$student->aadhar_card_front : asset('assets/img/images.png')}}" class="rounded-circle img-download"> 
                      @else
                      <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle img-download">
                      @endif
                      <a href="{{asset('assets').'/'.$student->aadhar_card_front}}" class="btn btn-success mb-0 text-white mt-3 " download>Download</a>
                      @endif

                  </div>
                </div>
                <div class="mb-4 col-sm-12 col-md-3">
                  <div class="text-center ghijk">

                      <h6>Aadhar Card Back</h6>
                      @if(isset($student->aadhar_card_back))
                        @php $aadhar_card_back = explode('.',$student->aadhar_card_back)@endphp
                        @if($aadhar_card_back[1] != 'pdf')
                        <img src="{{$student->aadhar_card_back ? asset('assets').'/'.$student->aadhar_card_back : asset('assets/img/images.png')}}" class="rounded-circle img-download"> 
                        @else
                        <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle img-download">
                        @endif
                        <a href="{{asset('assets').'/'.$student->aadhar_card_back}}" class="btn btn-success mb-0 text-white mt-3 " download>Download</a>
                        @endif

                  </div>
                </div>
                <div class="mb-4 col-sm-12 col-md-3">
                  <div class="text-center ghijk">

                      <h6>PRTC</h6>
                      @if(isset($student->prtc))
                        @php $prtc = explode('.',$student->prtc)@endphp
                        @if($prtc[1] != 'pdf')
                        <img src="{{$student->prtc ? asset('assets').'/'.$student->prtc : asset('assets/img/images.png')}}" class="rounded-circle img-download"> 
                        @else
                        <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle img-download">
                        @endif
                        <a href="{{asset('assets').'/'.$student->prtc}}" class="btn btn-success mb-0 text-white mt-3 " download>Download</a>
                        @endif

                  </div>
                </div>
                <div class="mb-4 col-sm-12 col-md-3">
                  <div class="text-center ghijk">

                      <h6>Caste Certificate</h6>
                      @if(isset($student->caste_certificate))
                      @php $caste_certificate = explode('.',$student->caste_certificate)@endphp
                      @if($caste_certificate[1] != 'pdf')
                     <img src="{{$student->caste_certificate ? asset('assets').'/'.$student->caste_certificate : asset('assets/img/images.png')}}" class="rounded-circle img-download"> 
                     @else
                      <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle img-download">
                      @endif
                      <a href="{{asset('assets').'/'.$student->caste_certificate}}" class="btn btn-success mb-0 text-white mt-3 " download>Download</a>
                      @endif

                  </div>
                </div>
                <div class="mb-4 col-sm-12 col-md-3">
                  <div class="text-center ghijk">

                      <h6>Bonafide Certificate Nsp</h6>
                      @if(isset($student->bonafide_nsp))
                      @php $bonafide_nsp = explode('.',$student->bonafide_nsp)@endphp
                      @if($bonafide_nsp[1] != 'pdf')
                     <img src="{{$student->bonafide_nsp ? asset('assets').'/'.$student->bonafide_nsp : asset('assets/img/images.png')}}" class="rounded-circle img-download"> 
                      @else
                      <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle img-download">
                      @endif
                      <a href="{{asset('assets').'/'.$student->bonafide_nsp}}" class="btn btn-success mb-0 text-white mt-3 " download>Download</a>
                      @endif

                  </div>
                </div>
                <div class="mb-4 col-sm-12 col-md-3">
                  <div class="text-center ghijk">

                      <h6>Bonafide Certificate College</h6>
                      @if(isset($student->bonafide_college))
                      @php $bonafide_college = explode('.',$student->bonafide_college)@endphp
                      @if($bonafide_college[1] != 'pdf')
                      <img src="{{$student->bonafide_college ? asset('assets').'/'.$student->bonafide_college : asset('assets/img/images.png')}}" class="rounded-circle img-download">
                      @else
                      <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle img-download">
                      @endif
                      <a href="{{asset('assets').'/'.$student->bonafide_college}}" class="btn btn-success mb-0 text-white mt-3 " download>Download</a>
                      @endif

                  </div>
                </div>
                <div class="mb-4 col-sm-12 col-md-3">
                  <div class="text-center ghijk">

                      <h6>Previous Year Marksheet</h6>
                      @if(isset($student->pre_year_mark))
                      @php $pre_year_mark = explode('.',$student->pre_year_mark)@endphp
                      @if($pre_year_mark[1] != 'pdf')
                      <img src="{{$student->pre_year_mark ? asset('assets').'/'.$student->pre_year_mark : asset('assets/img/images.png')}}" class="rounded-circle img-download">
                      @else
                      <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle img-download">
                      @endif
                      <a href="{{asset('assets').'/'.$student->pre_year_mark}}" class="btn btn-success mb-0 text-white mt-3 " download>Download</a>
                      @endif

                  </div>
                </div>
                <div class="mb-4 col-sm-12 col-md-3">
                  <div class="text-center ghijk">

                      <h6>Income Certificate</h6>
                      @if(isset($student->income_certificate))
                      @php $income_certificate = explode('.',$student->income_certificate)@endphp
                      @if($income_certificate[1] != 'pdf')
                      <img src="{{$student->income_certificate ? asset('assets').'/'.$student->income_certificate : asset('assets/img/images.png')}}" class="rounded-circle img-download">
                      @else
                      <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle img-download">
                      @endif
                      <a href="{{asset('assets').'/'.$student->income_certificate}}" class="btn btn-success mb-0 text-white mt-3 " download>Download</a>
                      @endif

                  </div>
                </div>
                <div class="mb-4 col-sm-12 col-md-3">
                  <div class="text-center ghijk">

                      <h6> Signature</h6>
                      @if(isset($student->signature))
                      @php $signature = explode('.',$student->signature)@endphp
                      @if($signature[1] != 'pdf')
                     <img src="{{$student->signature ? asset('assets').'/'.$student->signature : asset('assets/img/images.png')}}" class="rounded-circle img-download"> 
                      @else
                      <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle img-download">
                      @endif
                      <a href="{{asset('assets').'/'.$student->signature}}" class="btn btn-success mb-0 text-white mt-3 " download>Download</a>
                      @endif

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse pty-01 d-none" style="text-align: end;">
            <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto" >
              <a href="{{route('studentEdit',$student->id)}}" class=" edit-rounded rounded-pill inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5 cancel-btn btn-04" >
                Edit
              </a>
            </span>
          </div>

        </div>
      </div>
  </div>
</div>

@include('components.include.footer')
