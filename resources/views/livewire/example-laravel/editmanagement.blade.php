@include('components.include.header')
<style type="text/css">
   img {
   display: block;
   max-width: 100%;
   }
</style>
<form id="contact" action="{{route('createUser')}}" method="POST" enctype="multipart/form-data">
   @csrf
   <div>
   <h3>
      <div class="media">
         <div class="bd-wizard-step-icon"><i class="mdi mdi-account-outline"></i></div>
         <div class="media-body">
            <div class="bd-wizard-step-title">Personal Details</div>
            {{--
            <div class="bd-wizard-step-subtitle">Step 1</div>
            --}}
         </div>
      </div>
   </h3>
   <section>
      <div class="row">
         <h4 class="section-heading">Enter your Personal details </h4>
         <div class="mb-4 col-sm-12 col-md-4 create-edit-validation">
            <label for="userName" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Name <span class="det-alert">*</span></label><br/>
            <input id="userName" name="name" type="text" class= "w-100 required shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter Name">
         </div>
         <div class="mb-4 col-sm-12 col-md-4 create-edit-validation">
            <label for="father_name" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Father Name <span class="det-alert">*</span></label>
            <input id="father_name" name="father_name" type="text" class= "required w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Father Name">
         </div>
         <div class="mb-4 col-sm-12 col-md-4 create-edit-validation">
            <label for="mother_name" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Mother Name<span class="det-alert">*</span></label>
            <input name="mother_name" id="mother_name" type="text" class="required w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Mother Name">
         </div>
      </div>
      <div class="row">
         <div class="mb-4 col-sm-12 col-md-4 create-edit-validation">
            <label for="email" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Email Address <span class="det-alert">*</span></label><br />
            <input type="text" name="email" class="required w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Email Address" id="email">
         </div>
         <div class="mb-4 col-sm-12 col-md-4 create-edit-validation">
            <label for="password" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Password <span class="det-alert">*</span></label><br />
            <input type="password" class="required w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter Password" id="password" name="password">
         </div>
         <div class="mb-4 col-sm-12 col-md-4 create-edit-validation">
            <label for="confirm_password" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Confirm Password <span class="det-alert">*</span></label><br />
            <input type="password" class="required w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter Confirm Password" name="confirm_password">
         </div>
      </div>
      <div class="row">
         <div class="mb-4 col-sm-12 col-md-4 create-edit-validation">
            <label for="dob" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Date Of Birth <span class="det-alert">*</span></label><br />
            <input class="form-control required w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date" onfocus="focused(this)" onfocusout="defocused(this)" name="date_of_birth">
         </div>
         <div class="mb-4 col-sm-12 col-md-4 create-edit-validation">
            <label for="phone" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Phone Number <span class="det-alert">*</span></label><br />
            <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="required w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter Phone Number" name="phone_number" min="10" maxlength="10" pattern="\d*">
         </div>
         <div class="mb-4 col-sm-12 col-md-4 create-edit-validation">
            <label for="alternate-phone" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Alternate Phone Number <span class="det-alert">*</span></label><br />
            <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="required w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Alternate Phone Number" name="alternate_phone_number" min="10" maxlength="10" pattern="\d*">
         </div>
         <div class="mb-4 col-sm-12  col-md-4 create-edit-validation">
            <label for="role" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Role<span class="det-alert">*</span></label><br />
            <select name="role" class="required w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
               <option value="">-- Select --</option>
               @if(auth()->user()->role == 'super_admin')
               <option value="Admin">Admin</option>
               <option value="Manager">Manager</option>
               <option value="Team Leader">Team Leader</option>
               <option value="Employee">Employee</option>
               <option value="Other">Other</option>
               @elseif (auth()->user()->role == 'Admin')
               <option value="Manager">Manager</option>
               <option value="Team Leader">Team Leader</option>
               <option value="Employee">Employee</option>
               <option value="Other">Other</option>
               @elseif (auth()->user()->role == 'Manager')
               <option value="Team Leader">Team Leader</option>
               <option value="Employee">Employee</option>
               <option value="Other">Other</option>
               @else
               <option value="Employee">Employee</option>
               <option value="Other">Other</option>
               @endif
            </select>
         </div>
         <div class="mb-4 col-sm-12 col-md-4 create-edit-validation">
            <label for="profile_photo" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Profile Image</label><br />
            <div class="d-flex align-items-center">
               <img src="{{asset('assets/img/images.png')}}" class="card-img-top preview-crop-image rounded-circle" style="width:15%" alt="profile">
               <input type="file" class="image w-100 shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="profile_photo" name="profile_photo">
               <input type="hidden" name="crope_img" id="preview-crop-image" value="" accept="image/jpeg,image/jpg,image/png,application/pdf"
                  >
            </div>
         </div>
      </div>
   </section>
   <h3>
      <div class="media">
         <div class="bd-wizard-step-icon"><i class="mdi mdi-bank"></i></div>
         <div class="media-body">
            <div class="bd-wizard-step-title">Qualification Details</div>
            {{--
            <div class="bd-wizard-step-subtitle">Step 2</div>
            --}}
         </div>
      </div>
   </h3>
   <section>
      <div class="row">
         <h3 class="text-start">Qualification Details</h3>
         <h6 class="text-start">10th</h6>
         <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
            <label for="board10-name" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Board Name <span class="det-alert">*</span></label><br />
            <input type="text" class="required w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Board Name" name="tenth_board_name">
         </div>
         <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
            <label for="q-year" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Year<span class="det-alert">*</span></label><br />
            <input type="text" class="required w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Qualification Year" name="tenth_qua_year">
            {{-- <select id='date-dropdown'></select> --}}
         </div>
         <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
            <label for="q-percentage" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Percentage<span class="det-alert">*</span></label><br />
            <input type="text" class="required w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Percentage" name="tenth_percentage">
         </div>
         <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
            <label for="r-number" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Roll No<span class="det-alert">*</span></label><br />
            <input type="text" class="required w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Roll Number" name="tenth_roll_no">
         </div>
      </div>
      <div class="row">
         <h6 class="text-start">12th</h6>
         <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
            <label for="board-name" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Board Name <span class="det-alert">*</span></label><br />
            <input type="text" class="required w-100 shadow appearance-none border  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Board Name" name="twelfth_board_name">
         </div>
         <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
            <label for="q-year" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Year<span class="det-alert">*</span></label><br />
            <input type="text" class="required w-100 shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Qualification Year" name="twelfth_qua_year">
            {{-- <select id='date-1'></select> --}}
         </div>
         <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
            <label for="q-percentage" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Percentage <span class="det-alert">*</span></label><br />
            <input type="text" class="required w-100 shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Percentage" name="twelfth_percentage">
         </div>
         <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
            <label for="r-number" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Roll No <span class="det-alert">*</span></label><br />
            <input type="text" class="required w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Roll Number" name="twelfth_roll_no">
         </div>
      </div>
      <div class="row">
         <h6 class="text-start">University Qualification </h6>
         <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
            <label for="uni-name" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">University Name</label><br />
            <input type="text" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="University" name="university_name">
         </div>
         <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
            <label for="q-year" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Year</label><br />
            <input type="text" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Qualification Year"name="university_qua_year">
            {{-- <select id='date-dropdown'></select> --}}
         </div>
         <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
            <label for="q-percentage" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Percentage</label><br />
            <input type="text" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Percentage" name="university_percentage">
         </div>
         <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
            <label for="r-number" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Roll No</label><br />
            <input type="text" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Roll Number" name="university_roll_no">
         </div>
      </div>
      <div class="row">
         <h6 class="text-start">Other Qualification (Optional)</h6>
         <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
            <label for="uni-name" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">University Name</label><br />
            <input type="text" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="University" name="other_university_name">
         </div>
         <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
            <label for="q-year" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Year</label><br />
            <input type="text" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Qualification Year"name="other_university_qua_year">
            {{-- <select id='date-dropdown'></select> --}}
         </div>
         <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
            <label for="q-percentage" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Percentage</label><br />
            <input type="text" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Percentage" name="other_university_percentage">
         </div>
         <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
            <label for="r-number" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Roll No</label><br />
            <input type="text" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Roll Number" name="other_university_roll_no">
         </div>
      </div>
   </section>
   <h3>
      <div class="media">
         <div class="bd-wizard-step-icon"><i class="mdi mdi-bank"></i></div>
         <div class="media-body">
            <div class="bd-wizard-step-title">Address</div>
            {{--
            <div class="bd-wizard-step-subtitle">Step 3</div>
            --}}
         </div>
      </div>
   </h3>
   <section>
      <div class="content-wrapper">
         <h4 class="section-heading">Enter your Address details </h4>
         <div class="row">
            <h5>Permanent Address</h5>
            <div class="mb-4 col-sm-7 col-md-7 create-edit-validation">
               <label for="permanent-address" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Street<span class="det-alert">*</span></label><br />
               <input type="text" class="permanent_address w-100 shadow required appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-100" placeholder="Street" name="p_street" id="p_street">
               @error('current_address') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="mb-4 col-sm-5 col-md-5 create-edit-validation">
               <label for="landmark" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Landmark<span class="det-alert">*</span></label><br />
               <input type="text" id="p_landmark" class="form-control street w-100 required shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-100" name="p_landmark">
            </div>
         </div>
         <div class="row">
            <div class="form-group col-md-4 create-edit-validation">
               <label for="" class="text-sm text-gray-700 text-sm font-bold mb-2">City/Village<span class="det-alert">*</span></label>
               <label for="" class="sr-only">City/Village:</label>
               <input type="text" name="p_city" id="p_city" class="form-control border py-2 px-3 required" placeholder="City/Village">
            </div>
            <div class="form-group col-md-4 create-edit-validation">
               <label for=" Number" class="text-sm">State<span class="det-alert">*</span></label>
               <label for="p_state" class="sr-only">State<span class="det-alert">*</span></label>
               <select data-show-subtext="true" data-live-search="true" class="form-control border rounded text-gray-700 text-sm font-bold mb-2" name="p_state" id="p_state">
                     <option data-tokens="">State</option>
                     @foreach($state as $data)
                     <option data-tokens="{{$data->state}}">{{$data->state}}</option>
                     @endforeach
               </select>
            </div>
            <div class="form-group col-md-4 create-edit-validation">
               <label for="zipCode" class="text-sm">Zip Code<span class="det-alert">*</span></label>
               <label for="zipcode" class="sr-only">Zip Code<span class="det-alert">*</span></label>
               <input type="number" name="p_zipcode" id="p_zipcode" class="form-control border py-2 px-3 required" placeholder="Zip Code">
            </div>
         </div>
         <div class="row">
            <div class="form-group mt-2 mb-2 col-sm-7 col-md-7 create-edit-validation">
               <input type="checkbox" class="copy-address"> Same as permanent address
            </div>
         </div>
         <div class="row">
            <h5>Current Address</h5>
            <div class="mb-4 col-sm-7 col-md-7 create-edit-validation">
               <label for="Current Address" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Street</label><br />
               <input type="text" class="permanent_address w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-100" placeholder="Street" id="c_street" name="c_street">
               @error('permanent_address') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="mb-4 col-sm-5 col-md-5 create-edit-validation">
               <label for="landmark" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Landmark</label><br />
               <input type="text" id="c_landmark" class="form-control street mb-2 w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-100" name="c_landmark">
            </div>
            <div class="row">
               <div class="form-group col-md-4 create-edit-validation">
                  <label for="" class="text-sm text-gray-700 text-sm font-bold mb-2">City/Village</label>
                  <label for="" class="sr-only">City/Village</label>
                  <input type="text" name="c_city" id="c_city" class="form-control border py-2 px-3" placeholder="City/Village">
               </div>
               <div class="form-group col-md-4 create-edit-validation">
                  <label for=" Number" class="text-sm">State</label>
                  <label for="designation" class="sr-only">State</label>
                  <select data-show-subtext="true" data-live-search="true" class="form-control border rounded text-gray-700 text-sm font-bold mb-2" name="c_state" id="c_state">
                     <option data-tokens="">State</option>
                     @foreach($state as $data)
                     <option data-tokens="{{$data->state}}">{{$data->state}}</option>
                     @endforeach
               </select>
               </div>
               <div class="form-group col-md-4 create-edit-validation">
                  <label for="zipCode" class="text-sm">Zip Code</label>
                  <label for="zipcode" class="sr-only">Zip Code</label>
                  <input type="number" name="c_zipcode" id="c_zipcode" class="form-control border py-2 px-3" placeholder="Zip Code">
               </div>
            </div>
   </section>
   <h3>
   <div class="media">
   <div class="bd-wizard-step-icon"><i class="mdi mdi-account-check-outline"></i></div>
   <div class="media-body">
   <div class="bd-wizard-step-title">Industry Experience </div>
   {{-- <div class="bd-wizard-step-subtitle">Step 4</div> --}}
   </div>
   </div>
   </h3>
   <section>
   <div id="workorder">
   <div class="row">
   <h3 class="text-start">Industry Experience</h3>
   <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
   <label for="industry-name" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Industry Name</label><br />
   <input type="text" name="industry_name[]" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Industry Name">
   </div>
   <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
   <label for="indus-designation" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Designation</label><br />
   <input type="text" name="industry_designation[]" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Designation">
   </div>
   <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
   <label for="indus-salary" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Salary</label><br />
   <input type="text" name="industry_salary[]" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Salary">
   </div>
   <div class="mb-4 col-sm-12 col-md-3 total-exp-field create-edit-validation">
   <label for="indus-experience" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Total Year of Experience</label><br />
   <div class="d-flex">
   <input type="button" value="-" class="qty-minus rounded border-0 bg-dark text-white w-25 mx-n1">
   <input type="number" name="industry_total_year[]" class="w-100 industry-exp shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Total Experience" value="0" class="qty">
   <input type="button" value="+" class="qty-plus rounded border-0 bg-dark text-white w-25 mx-n1">
   </div>
   </div>
   </div>
   </div>
   <button type="button" class="btn add-indus btn-sm icon-btn ms-2 mb-2" style="margin-top:10px;">
   <i class="fa fa-plus"></i>&nbsp; Add New Industry Experience
   </button>
   </section>
   <h3>
   <div class="media">
   <div class="bd-wizard-step-icon"><i class="mdi mdi-emoticon-outline"></i></div>
   <div class="media-body">
   <div class="bd-wizard-step-title">Document Upload</div>
   {{-- <div class="bd-wizard-step-subtitle">Step 5</div> --}}
   </div>
   </div>
   </h3>
   <section class="document-create-edit">
   <div class="document-upload">
   <div class="main-document ">
   <div class="row creat-start-ghrt">
   <h3 class="text-start">Document Upload</h3>
   <div class="mb-4 col-sm-12 col-md-5 ghijk create-edit-validation">
   <h6>10th Marksheet</h6>
   <input class="demo1 required" type="file" name="tenth_marksheet" />
   </div>
   <div class="mb-4 col-sm-12 col-md-5 ghijk create-edit-validation">
   <h6>12th Marksheet</h6>
   <input class="demo1 required" type="file" name="twelfth_marksheet" />
   </div>
   <div class="mb-4 col-sm-12 col-md-5 ghijk create-edit-validation">
   <h6>Aadhar Card</h6>
   <input class="demo1 required" type="file" name="aadhar_card" />
   </div>
   <div class="mb-4 col-sm-12 col-md-5 ghijk create-edit-validation">
   <h6>Alternative Govt. ID Card</h6>
   <input class="demo1 required" type="file" name="alternative_govt_id_card" />
   </div>
   </div>
   </div>
   <div class="row gradu-title">
   <div class="mb-4 col-sm-12 col-md-5 ghijk position-relative">
   <h6>Bank Passbook</h6>
   <input class="demo1 required" type="file" name="bank_passbook" />
   </div>
   <div class="mb-4 col-sm-12 col-md-5 ghijk create-edit-validation">
   <h6>Graduation / Diploma (Optional)</h6>
   <input class="demo1" type="file" name="graduation_diploma" />
   </div>
   <div class="mb-4 col-sm-12 col-md-5 ghijk create-edit-validation">
   <h6>Post Graduation (Optional)</h6>
   <input class="demo1" type="file" name="post_graduation" />
   </div>
   <div class="mb-4 col-sm-12 col-md-5 ghijk create-edit-validation">
   <h6>Experience Certificate (Optional)</h6>
   <input class="demo1" type="file" name="experience_certificate" />
   </div>
   <div class="mb-4 col-sm-12 col-md-5 ghijk create-edit-validation">
   <h6>Salary Slip (Optional)</h6>
   <input class="demo1" type="file" name="salary_slip" />
   </div>
   <div>
   </div>
   </div>
   <button class="create-edit" type="submit">Finish</button>
   </div>
   </section>
   </div>
</form>
@include('components.include.footer')
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
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
{{-- <div class="col-md-4">
<div class="preview"></div>
</div> --}}
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
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/additional-methods.js"></script>
<script>
   var form = $("#contact");
   form.validate({
       errorPlacement: function errorPlacement(error, element) { element.after(error); },
       rules: {
         email: {
               email: true,
               remote: {
                  url: "{{route('EmailValidation')}}",
                  type: "post",
                  data: {
                        _token: function() {
                           return "{{csrf_token()}}"
                        },
                        email: function() {
                           return $('#email').val()
                        }
                  }
               }
            },
         confirm_password: {
               equalTo: "#password"
           },
           phone_number: {
               minlength:10,
               maxlength:10
            },
            alternate_phone_number: {
               minlength:10,
               maxlength:10
            },
            tenth_marksheet: {
               extension: "png|jpeg|jpg|pdf"
           },
           twelfth_marksheet: {
               extension: "png|jpeg|jpg|pdf"
           },
            aadhar_card: {
               extension: "png|jpeg|jpg|pdf"
           },
           alternative_govt_id_card: {
               extension: "png|jpeg|jpg|pdf"
           },
           bank_passbook:{
               required: true,
               extension: "png|jpeg|jpg|pdf"
           },
           graduation_diploma: {
               extension: "png|jpeg|jpg|pdf"
           },
           post_graduation: {
               extension: "png|jpeg|jpg|pdf"
           },
           experience_certificate: {
               extension: "png|jpeg|jpg|pdf"
           },
            salary_slip: {
               extension: "png|jpeg|jpg|pdf"
           }
       },
         messages: {
               name: "Name field is requried",
               father_name: "Father Name field is requried",
               mother_name: "Mother Name field is requried",
               password: "Password field is requried",
               confirm_password:{
                  required: "Confirm Password field is requried",
                  equalTo: "enter same as password"
               },
               date_of_birth: "Date Of Birth field is requried",
               phone_number:{
                  required: "Phone Number field is requried",
                  minlength: "enter minimum 10 digits",
                  maxlength: "enter less than 10 digits"
               },
               alternate_phone_number:{
                  required: "Alternate Phone Number field is requried",
                  minlength: "enter minimum 10 digits",
                  maxlength: "enter less than 10 digits"
               },
               role: "Select a role field",
               email: {
                  required: "Email field is requried",
                  email:"Enter valid email address",
                  remote:"Email already registered"
               },
               tenth_board_name:"10th Board Name field is requried",
               tenth_qua_year:"10th Year field is requried",
               tenth_percentage:"10th Percentage field is requried",
               tenth_roll_no:"10th Roll No field is requried",
               twelfth_board_name:"12th Board Name field is requried",
               twelfth_qua_year:"12th Year field is requried",
               twelfth_percentage:"12th Percentage field is requried",
               twelfth_roll_no:"12th Roll No field is requried",
               tenth_marksheet:{
                   required: "Tenth Marksheet is requried",
                   extension:"Tenth Marksheet must be JPEG,JPG,PDF or PNG."
               },
               twelfth_marksheet:{
                  required: "Twelfth Marksheet is requried",
                   extension:"Twelfth Marksheet must be JPEG,JPG,PDF or PNG."
               },
               aadhar_card:{
                  required: "Aadhar Card is requried",
                   extension:"Aadhar Card must be JPEG,JPG,PDF or PNG."
               },
               alternative_govt_id_card:{
                  required: "Alternative govt id card is requried",
                   extension:"Alternative govt id card must be JPEG,JPG,PDF or PNG."
               },
               bank_passbook:{
                  required: "Bank Passbook is requried",
                  extension:"Bank Passbook must be JPEG,JPG,PDF or PNG."
               },
               graduation_diploma:{
                   extension:"Graduation Diploma must be JPEG,JPG,PDF or PNG."
               },
               post_graduation:{
                   extension:"Post Graduation must be JPEG,JPG,PDF or PNG."
               },
               experience_certificate:{
                   extension:"Experience Certificate must be JPEG,JPG,PDF or PNG."
               },
               salary_slip:{
                   extension:"Salary Slip must be JPEG,JPG,PDF or PNG."
               }
         }
   });
   form.children("div").steps({
       headerTag: "h3",
       bodyTag: "section",
       onStepChanging: function (event, currentIndex, newIndex)
       {
           console.log(event);
           form.validate().settings.ignore = ":disabled,:hidden";
           return form.valid();
       },
       onFinishing: function (event, currentIndex)
       {
           form.validate().settings.ignore = ":disabled";
           return form.valid();
       }
   });
     $(document).ready(function() {
        $(document).on('click', '.add-indus', function() {
           $(this).parent().find('#workorder').append(`<div class="row removeclass">
                          <div class="mb-4 col-sm-12 col-md-3">
                             <label for="industry-name" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Industry Name:</label><br />
                             <input type="text" name="industry_name[]" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Industry Name">
                          </div>
                          <div class="mb-4 col-sm-12 col-md-3">
                             <label for="indus-designation" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Designation:</label><br />
                             <input type="text" name="industry_designation[]" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Designation">
                          </div>
                          <div class="mb-4 col-sm-12 col-md-3">
                             <label for="indus-salary" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Salary:</label><br />
                             <input type="text" name="industry_salary[]" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Salary">
                          </div>
                          <div class="mb-4 col-sm-12 col-md-3 total-exp-field ">
                             <label for="indus-experience" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Total Year of Experience:</label><br />
                             <div class="d-flex">
                                <input type="button" value="-" class="qty-minus rounded border-0 bg-dark text-white w-25 mx-n1">
                                <input type="number" name="industry_total_year[]" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Total Experience" class="qty" value="0">
                                <input type="button" value="+" class="qty-plus rounded border-0 bg-dark text-white w-25 mx-n1">
                             </div>
                          </div>
                          <button data-repeater-delete type="button" class="btn btn-danger remove-indus btn-sm icon-btn ms-2 w-5">
                             <i class="fa fa-trash"></i>
                          </button>

                       </div>`);

        });

        $(document).on('click', '.remove-indus', function() {
           $(this).parents('.removeclass').remove();
        });

        $(document).on('change', '.copy-address', function() {
              $('#c_street').val('');
              $('#c_landmark').val('');
              $('#c_country').val('');
              $('#c_city').val('');
              $('#c_state').val('');
              $('#c_zipcode').val('');
           if($(this).is(':checked')){
              var stret = $('#p_street').val();
              var landmark = $('#p_landmark').val();
              var country = $('#p_country').val();
              var city = $('#p_city').val();
              var state = $('#p_state').val();
              var zipcode = $('#p_zipcode').val();
              $('#c_street').val(stret);
              $('#c_landmark').val(landmark);
              $('#c_country').val(country);
              $('#c_city').val(city);
              $('#c_state').val(state);
              $('#c_zipcode').val(zipcode);
           }
        });
        $(document).on('click', '.close', function() {
               $('#modal').modal('hide');
            });
     });
</script>
<script>
   var $modal = $('#modal');
   var image = document.getElementById('image');
   var cropper;
   $("body").on("change", ".image", function(e){
   var files = e.target.files;
   var done = function (url) {
   image.src = url;
   $('#modal').modal('show');
   };
   var reader;
   var file;
   var url;
   if (files && files.length > 0) {
   file = files[0];
   if (URL) {
   done(URL.createObjectURL(file));
   } else if (FileReader) {
   reader = new FileReader();
   reader.onload = function (e) {
   done(reader.result);
   };
   reader.readAsDataURL(file);
   }
   }
   });
   $('#modal').on('shown.bs.modal', function () {
   cropper = new Cropper(image, {
      dragMode: 'move',
      aspectRatio: 1,
      autoCropArea: 0.65,
      restore: false,
      guides: false,
      viewMode: 0,
      center: false,
      highlight: false,
      cropBoxMovable: false,
      cropBoxResizable: false,
      toggleDragModeOnDblclick: false,
   });

   }).on('hidden.bs.modal', function () {
   cropper.destroy();
   cropper = null;
   var $el = $('.image');
   $el.wrap('<form>').closest('form').get(0).reset();
   $el.unwrap();
   });
   $("#crop").click(function(){
   canvas = cropper.getCroppedCanvas({
   width: 160,
   height: 160,
   });
   canvas.toBlob(function(blob) {
   url = URL.createObjectURL(blob);
   var reader = new FileReader();
   reader.readAsDataURL(blob);
   reader.onloadend = function() {
   var base64data = reader.result;
   $('#preview-crop-image').val(base64data);
   $('.preview-crop-image').attr('src',base64data);
   $('#modal').modal('hide');
   }
   });
   })
</script>
</html>
