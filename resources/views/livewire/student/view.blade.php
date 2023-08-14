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
                  <select class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="application_availability" disabled>
                    <option value="">--- Select An Option---</option>
                    <option value="Pending">Pending</option>
                    <option value="Available">Available</option>
                  </select>
                  @error('application_availability') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label><b>Application Number</b></label>
                  <input wire:model="application_number" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter Application Number" readonly>
                  @error('application_number') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label><b>Year</b></label>
                  <select wire:model="year" class=" w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" disabled>
                    <option value=""> --- Select An Year--- </option>
                    <option value="Pending">Pending</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                  </select>
                  @error('year') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label><b>Please Enter Aadhar Number</b></label>
                  <input wire:model="number" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter Aadhar Number" readonly>
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
                  <input wire:model="account_number" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter Account Number" readonly>
                  @error('account_number') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
              </div>
              <div class="col-sm-3 ">
                <div class="form-group">
                  <label><b>IFSC Code</b></label>
                  <input wire:model="IFSC_code" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter IFSC Code" readonly>
                  @error('IFSC_code') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
              </div>
              <div class="col-sm-3 ">
                <div class="form-group">
                  <label><b>Bank Name</b></label>
                  <input wire:model="bank_name" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter Bank Name" readonly>
                  @error('bank_name') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
              </div>
              <div class="col-sm-3 ">
                <div class="form-group">
                  <label><b>Branch Name</b></label>
                  <input wire:model="branch_name" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter Branch Name" readonly>
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
                    <input wire:model="student_name" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Please Student Name" readonly>
                    @error('student_name') <span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                </div>
                <div class="col-sm-3 mt-3">
                  <div class="form-group">
                    <label><b>Father Name</b></label>
                    <input wire:model="father_name" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Please Father Name" readonly>
                    @error('father_name') <span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                </div>
                <div class="col-sm-3 mt-3">
                  <div class="form-group ">
                    <label><b>Mother Name</b></label>
                    <input wire:model="mother_name" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Please Mother Name" readonly>
                    @error('mother_name') <span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                </div>
                <div class="col-sm-3 mt-3">
                  <div class="form-group ">
                    <label><b>Email Address</b></label>
                    <input wire:model="email_address" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email" placeholder="Enter Email Address" readonly>
                    @error('email_address') <span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                </div>
                <div class="col-sm-3 mt-3">
                  <div class="form-group ">
                    <label><b>Date Of Birth</b></label>
                    <input wire:model="dob" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date" readonly>
                    @error('dob') <span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                </div>
                <div class="col-sm-3 mt-3">
                  <div class="form-group ">
                    <label><b>Gender</b></label>
                    <select wire:model="gender" class=" w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" disabled>
                      <option value="">--- Select An Option---</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                    @error('gender') <span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                </div>
                <div class="col-sm-3 mt-3">
                  <div class="form-group">
                    <label><b>Phone Number</b></label>
                    <input wire:model="phone_number" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" placeholder="Please Enter Phone Number" readonly>
                    @error('phone_number') <span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                </div>
                <div class="col-sm-3 mt-3">
                  <div class="form-group">
                    <label><b>Family Income</b></label>
                    <input wire:model="family_income" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" placeholder="Please Enter Family Income" readonly>
                    @error('family_income') <span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                </div>
                <div class="col-sm-3 mt-3">
                  <div class="form-group">
                    <label><b>Select State</b></label>
                    <input wire:model="state" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter Percentage" readonly>
                    @error('state') <span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                </div>
                <div class="col-sm-3 mt-3">
                  <div class="form-group">
                    <label><b>Select District</b></label>
                    <input wire:model="district" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Please Enter Distic" readonly>
                    @error('district') <span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                </div>
                <div class="col-sm-3 mt-3">
                  <div class="form-group">
                    <label><b>Sub Divison</b></label>
                    <input wire:model="sub_division" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Please Enter Sub Divison" readonly>
                    @error('sub_division') <span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                </div>
                <div class="col-sm-3 mt-3">
                  <div class="form-group">
                    <label><b>Cast</b></label>
                    <select wire:model="cast" class=" w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" disabled>
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
                    <label class="village12"></b>Village / City</b></label>
                    <input wire:model="city" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Please Enter Village / City" readonly>
                    @error('city') <span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                </div>
                <div class="col-sm-3 mt-3">
                  <div class="form-group">
                    <label><b>PinCode</b></label>
                    <input wire:model="pincode" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="Number" placeholder="Please Enter PinCode" readonly>
                    @error('pincode') <span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                </div>
                <div class="col-sm-3 mt-3">
                  <div class="form-group">
                    <label><b>Address Line 1</b></label>
                    <input wire:model="address_1" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Please Enter Address Line 1" readonly>
                    @error('address_1') <span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                </div>
                <div class="col-sm-3 mt-3">
                  <div class="form-group">
                    <label><b>Address Line 2</b></label>
                    <input wire:model="address_2" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Please Enter Address Line 2" readonly>
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
                          <input wire:model="ten_path_year" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter 10th Passing Year" readonly>
                          @error('ten_path_year') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                      </div>
                      <div class="col-sm-3 mt-3">
                        <div class="form-group">
                          <label><b>10th Total Marks</b></label>
                          <input wire:model="ten_total_mark" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter 10th Total Marks" readonly>
                          @error('ten_total_mark') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                      </div>
                      <div class="col-sm-3 mt-3">
                        <div class="form-group">
                          <label><b>10th Marks</b></label>
                          <input wire:model="ten_mark" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter 10th Marks" readonly>
                          @error('ten_mark') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                      </div>
                      <div class="col-sm-3 mt-3">
                        <div class="form-group">
                          <label><b>10th Percentage</b></label>
                          <input wire:model="ten_percentage" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter 10th Persentage" readonly>
                          @error('ten_percentage') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                      </div>
                      <div class="col-sm-3 mt-3">
                        <div class="form-group">
                          <label><b>12th Passing Year</b></label>
                          <input wire:model="twelve_path_year" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter 12th Passing Year" readonly>
                          @error('twelve_path_year') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                      </div>
                      <div class="col-sm-3 mt-3">
                        <div class="form-group">
                          <label><b>12th Total Marks</b></label>
                          <input wire:model="twelve_total_mark" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter 12th Total Marks" readonly>
                          @error('twelve_total_mark') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                      </div>
                      <div class="col-sm-3 mt-3">
                        <div class="form-group">
                          <label><b>12th Marks</b></label>
                          <input wire:model="twelve_mark" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter 12th Marks" readonly>
                          @error('twelve_mark') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                      </div>
                      <div class="col-sm-3 mt-3">
                        <div class="form-group">
                          <label><b>12th Percentage</b></label>
                          <input wire:model="twelve_percentage" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter 12th Persentage" readonly>
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
                      <input wire:model="college_name" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter Percentage" readonly>
                      @error('college_name') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-sm-3 mt-3">
                    <div class="form-group">
                      <label><b>Course Details</b></label>
                      <input wire:model="course_details" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter Percentage" readonly>
                      @error('course_details') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-sm-3 mt-3">
                    <div class="form-group">
                      <label><b>Please Select Current Year</b></label>
                      <input wire:model="collage_current_year" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter Percentage" readonly>
                      @error('collage_current_year') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-sm-3 mt-3">
                    <div class="form-group">
                      <label><b>Percentage</b></label>
                      <input wire:model="collage_percentage" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter Percentage" readonly>
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
                  <input wire:model="agent_name" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter Agent Name" readonly>
                  @error('agent_name') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label><b>Agent Mobile Name</b></label>
                  <input wire:model="agent_mobile" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Please Enter Agent Mobile Name" readonly>
                  @error('agent_mobile') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
              </div> --}}
              <div class="row mt-3">
                {{-- <h3 class="text-start">Document Upload</h3> --}}
                <div class="mb-4 col-sm-12 col-md-3 ">
                  <div class="text-center ghijk ">
                      <h6>Self Image</h6>
                      @if(isset($self_image))
                        @php $self_img = explode('.',$self_image)@endphp
                        @if($self_img[1] != 'pdf')
                        <img src="{{$self_image ? asset('assets').'/'.$self_image : asset('assets/img/images.png')}}" class="rounded-circle img-download">
                        @else
                        <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle img-download">
                        @endif
                        <button wire:click.prevent="download('{{ $self_image }}')" type="button" class="btn btn-success mb-0 text-white mt-3 ">Download</button>
                        @endif

                  </div>
                </div>
                <div class="mb-4 col-sm-12 col-md-3">
                  <div class="text-center ghijk">

                      <h6>Aadhar Card Front</h6>
                      @if(isset($aadhar_card_front))
                      @php $self_img = explode('.',$aadhar_card_front)@endphp
                      @if($self_img[1] != 'pdf')
                      <img src="{{$aadhar_card_front ? asset('assets').'/'.$aadhar_card_front : asset('assets/img/images.png')}}" class="rounded-circle img-download">
                      @else
                      <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle img-download">
                      @endif
                      <button wire:click.prevent="download('{{ $aadhar_card_front }}')" type="button" class="btn btn-success mb-0 text-white mt-3 ">Download</button>
                      @endif

                  </div>
                </div>
                <div class="mb-4 col-sm-12 col-md-3">
                  <div class="text-center ghijk">

                      <h6>Aadhar Card Back</h6>
                      @if(isset($aadhar_card_back))
                        @php $self_img = explode('.',$aadhar_card_back)@endphp
                        @if($self_img[1] != 'pdf')
                        <img src="{{$aadhar_card_back ? asset('assets').'/'.$aadhar_card_back : asset('assets/img/images.png')}}" class="rounded-circle img-download">
                        @else
                        <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle img-download">
                        @endif
                        <button wire:click.prevent="download('{{ $aadhar_card_back }}')" type="button" class="btn btn-success mb-0 text-white mt-3 ">Download</button>
                        @endif

                  </div>
                </div>
                <div class="mb-4 col-sm-12 col-md-3">
                  <div class="text-center ghijk">

                      <h6>PRTC</h6>
                      @if(isset($prtc))
                        @php $self_img = explode('.',$prtc)@endphp
                        @if($self_img[1] != 'pdf')
                        <img src="{{$prtc ? asset('assets').'/'.$prtc : asset('assets/img/images.png')}}" class="rounded-circle img-download">
                        @else
                        <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle img-download">
                        @endif
                        <button wire:click.prevent="download('{{ $prtc }}')" type="button" class="btn btn-success mb-0 text-white mt-3 ">Download</button>
                        @endif

                  </div>
                </div>
                <div class="mb-4 col-sm-12 col-md-3">
                  <div class="text-center ghijk">

                      <h6>Caste Certificate</h6>
                      @if(isset($caste_certificate))
                      @php $self_img = explode('.',$caste_certificate)@endphp
                      @if($self_img[1] != 'pdf')
                      <img src="{{$caste_certificate ? asset('assets').'/'.$caste_certificate : asset('assets/img/images.png')}}" class="rounded-circle img-download">
                      @else
                      <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle img-download">
                      @endif
                      <button wire:click.prevent="download('{{ $caste_certificate }}')" type="button" class="btn btn-success mb-0 text-white mt-3 ">Download</button>
                      @endif

                  </div>
                </div>
                <div class="mb-4 col-sm-12 col-md-3">
                  <div class="text-center ghijk">

                      <h6>Bonafide Certificate Nsp</h6>
                      @if(isset($bonafide_nsp))
                      @php $self_img = explode('.',$bonafide_nsp)@endphp
                      @if($self_img[1] != 'pdf')
                      <img src="{{$bonafide_nsp ? asset('assets').'/'.$bonafide_nsp : asset('assets/img/images.png')}}" class="rounded-circle img-download">
                      @else
                      <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle img-download">
                      @endif
                      <button wire:click.prevent="download('{{ $bonafide_nsp }}')" type="button" class="btn btn-success mb-0 text-white mt-3 ">Download</button>
                      @endif

                  </div>
                </div>
                <div class="mb-4 col-sm-12 col-md-3">
                  <div class="text-center ghijk">

                      <h6>Bonafide Certificate College</h6>
                      @if(isset($bonafide_college))
                      @php $self_img = explode('.',$bonafide_college)@endphp
                      @if($self_img[1] != 'pdf')
                      <img src="{{$bonafide_college ? asset('assets').'/'.$bonafide_college : asset('assets/img/images.png')}}" class="rounded-circle img-download">
                      @else
                      <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle img-download">
                      @endif
                      <button wire:click.prevent="download('{{ $bonafide_college }}')" type="button" class="btn btn-success mb-0 text-white mt-3 ">Download</button>
                      @endif

                  </div>
                </div>
                <div class="mb-4 col-sm-12 col-md-3">
                  <div class="text-center ghijk">

                      <h6>Previous Year Marksheet</h6>
                      @if(isset($pre_year_mark))
                      @php $self_img = explode('.',$pre_year_mark)@endphp
                      @if($self_img[1] != 'pdf')
                      <img src="{{$pre_year_mark ? asset('assets').'/'.$pre_year_mark : asset('assets/img/images.png')}}" class="rounded-circle img-download">
                      @else
                      <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle img-download">
                      @endif
                      <button wire:click.prevent="download('{{ $pre_year_mark }}')" type="button" class="btn btn-success mb-0 text-white mt-3 ">Download</button>
                      @endif

                  </div>
                </div>
                <div class="mb-4 col-sm-12 col-md-3">
                  <div class="text-center ghijk">

                      <h6>Income Certificate</h6>
                      @if(isset($income_certificate))
                      @php $self_img = explode('.',$income_certificate)@endphp
                      @if($self_img[1] != 'pdf')
                      <img src="{{$income_certificate ? asset('assets').'/'.$income_certificate : asset('assets/img/images.png')}}" class="rounded-circle img-download">
                      @else
                      <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle img-download">
                      @endif
                      <button wire:click.prevent="download('{{ $income_certificate }}')" type="button" class="btn btn-success mb-0 text-white mt-3 ">Download</button>
                      @endif

                  </div>
                </div>
                <div class="mb-4 col-sm-12 col-md-3">
                  <div class="text-center ghijk">

                      <h6> Signature</h6>
                      @if(isset($signature))
                      @php $self_img = explode('.',$signature)@endphp
                      @if($self_img[1] != 'pdf')
                      <img src="{{$signature ? asset('assets').'/'.$signature : asset('assets/img/images.png')}}" class="rounded-circle img-download">
                      @else
                      <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle img-download">
                      @endif
                      <button wire:click.prevent="download('{{ $signature }}')" type="button" class="btn btn-success mb-0 text-white mt-3 ">Download</button>
                      @endif

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse pty-01" style="text-align: end;">
            <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto" >
              <a href="{{route('studentEdit',$this->id)}}" class=" edit-rounded rounded-pill inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5 cancel-btn btn-04" >
                Edit
              </a>

              <button wire:click="closeModal()" type="button" class="close-rounded rounded-pill inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5 cancel-btn">
                Close
              </button>
            </span>
          </div>

        </div>
      </div>
  </div>
</div>
