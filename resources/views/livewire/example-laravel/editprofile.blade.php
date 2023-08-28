@include('components.include.header')
<style>
img {
 display: block;
max-width: 100%;
}
#contact .actions ul li:nth-child(3){
   display: none !important;
}
#contact .wizard .content.clearfix {
    background-color: #07294d;
}
/* #contact .steps ul li:nth-child(){
   background-color: unset;
} */
</style>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
<div class="container-xl px-4 mt-4 profile-pg">
    <!-- Account page navigation-->
    <nav class="nav nav-borders profile-nav">
        <a class="nav-link active ms-0" href="#" target="__blank">Profile</a>
        {{-- <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-billing-page" target="__blank">Billing</a>
        <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-security-page" target="__blank">Security</a>
        <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-edit-notifications-page"  target="__blank">Notifications</a> --}}
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row profile-card profile-edit">
        <div class="col-xl-12">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-2 ">

                <div class="card-body text-center">
                    <div class="d-flex align-items-center flex-row">
                        <!-- Profile picture image-->
                        <div class="card-header">Profile Picture</div>
                        @php $image = DB::table('user_data')->select('profile_image')->where('user_id',Auth::id())->first(); @endphp
                        <img class="img-account-profile rounded-circle mb-2" src="{{$image->profile_image ? asset('assets').'/'.$image->profile_image : asset('assets/img/images.png')}}" alt="">
                        <!-- Profile picture help block-->
                        {{-- <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div> --}}
                        <!-- Profile picture upload button-->
                    </div>
                </div>

                <div class="bttn abcde edit-bt">
                    <div class="btn btn-upload ppp" type="file"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" height="30px" width="30px" version="1.1" id="Capa_1" viewBox="0 0 487 487" xml:space="preserve">

                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>

                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>

                    <g id="SVGRepo_iconCarrier"> <g> <g> <path d="M308.1,277.95c0,35.7-28.9,64.6-64.6,64.6s-64.6-28.9-64.6-64.6s28.9-64.6,64.6-64.6S308.1,242.25,308.1,277.95z M440.3,116.05c25.8,0,46.7,20.9,46.7,46.7v122.4v103.8c0,27.5-22.3,49.8-49.8,49.8H49.8c-27.5,0-49.8-22.3-49.8-49.8v-103.9 v-122.3l0,0c0-25.8,20.9-46.7,46.7-46.7h93.4l4.4-18.6c6.7-28.8,32.4-49.2,62-49.2h74.1c29.6,0,55.3,20.4,62,49.2l4.3,18.6H440.3z M97.4,183.45c0-12.9-10.5-23.4-23.4-23.4c-13,0-23.5,10.5-23.5,23.4s10.5,23.4,23.4,23.4C86.9,206.95,97.4,196.45,97.4,183.45z M358.7,277.95c0-63.6-51.6-115.2-115.2-115.2s-115.2,51.6-115.2,115.2s51.6,115.2,115.2,115.2S358.7,341.55,358.7,277.95z"/> </g> </g> </g>

                    </svg>
                    <input type="file" id="upload" class="image">
        </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <!-- Account details card-->
            <form id="contact" action="{{route('updateProfile')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id" value="{{$users->id}}">
            <div>

                <h3><div class="media">
                    <!-- <div class="bd-wizard-step-icon"><i class="mdi mdi-account-outline"></i></div> -->
                    <div class="media-body">
                        <div class="bd-wizard-step-title">Personal Details</div>
                        {{-- <div class="bd-wizard-step-subtitle">Step 1</div> --}}
                    </div>
                    </div>
                </h3>
            <section>
            <div class="row">
           <!--  <h4 class="section-heading">Enter your Personal details </h4> -->
                     <div class="mb-4 col-sm-12 col-md-4 create-edit-validation">
                        <label for="userName" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Name <span class="det-alert">*</span></label><br/>
                        <input id="userName" value="{{$users->name}}" name="name" type="text" class= "required w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter Name">

                     </div>
                     <div class="mb-4 col-sm-12 col-md-4 create-edit-validation">
                        <label for="father_name" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Father Name <span class="det-alert">*</span></label>
                        <input id="father_name" value="{{$user_data->father_name}}" name="father_name" type="text" class= "required w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Father Name">
                     </div>
                     <div class="mb-4 col-sm-12 col-md-4 create-edit-validation">
                        <label for="mother_name" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Mother Name<span class="det-alert">*</span></label>
                        <input name="mother_name" value="{{$user_data->mother_name}}" id="mother_name" type="text" class="required w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Mother Name">
                     </div>
            </div>
            <div class="row">
                     <div class="mb-4 col-sm-12 col-md-4 create-edit-validation">
                        <label for="email" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Email Address <span class="det-alert">*</span></label><br />
                        <input type="text" id="email" value="{{$users->email}}" name="email" class="required w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Email Address" readonly>
                    </div>
                    <div class="mb-4 col-sm-12 col-md-4 create-edit-validation">

                        <label for="password" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Password <span class="det-alert"></span></label><br />
                        <input id="password" type="password" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter Password" name="password">

                        </div>
                        <div class="mb-4 col-sm-12 col-md-4 create-edit-validation">
                        <label for="confirm_password" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Confirm Password <span class="det-alert"></span></label><br />
                        <input type="password" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter Confirm Password" name="confirm_password">
                    </div>
               </div>
                    <div class="row">
                     <div class="mb-4 col-sm-12 col-md-4 create-edit-validation">
                        <label for="dob" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Date Of Birth <span class="det-alert">*</span></label><br />
                        <input class="required form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date" onfocus="focused(this)" onfocusout="defocused(this)" value="{{$user_data->date_of_birth}}" name="date_of_birth">

                     </div>
                     <div class="mb-4 col-sm-12 col-md-4 create-edit-validation">
                        <label for="phone" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Phone Number <span class="det-alert">*</span></label><br />
                        <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="required w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$user_data->phone_number}}" placeholder="Enter Phone Number" name="phone_number" min="10" maxlength="10" pattern="\d*">

                     </div>
                     <div class="mb-4 col-sm-12 col-md-4 create-edit-validation">
                        <label for="alternate-phone" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Alternate Phone Number <span class="det-alert">*</span></label><br />
                        <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="required w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$user_data->alternate_phone_number}}" placeholder="Alternate Phone Number" name="alternate_phone_number" min="10" maxlength="10" pattern="\d*">

                     </div>
                     <div class="mb-4 col-sm-12  col-md-4 create-edit-validation">
                        <label for="role" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Role<span class="det-alert">*</span></label><br />
                        <input type="text" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$users->role}}" name="role" readonly>
                     </div>
                     @php  $break_time = json_decode($users->break_time); @endphp
                     <div class="mb-4 col-sm-12  col-md-4 create-edit-validation">
                        <label for="role" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Morning Tea Break<span class="det-alert">*</span></label><br />
                        <input type="text" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$break_time != '' ? $break_time->mor_tea_start.'-'.$break_time->mor_tea_end.' ('.$break_time->mor_tea_break.'min)' : '-'}}" name="role" readonly>
                     </div>
                     <div class="mb-4 col-sm-12  col-md-4 create-edit-validation">
                        <label for="role" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Lunch Break<span class="det-alert">*</span></label><br />
                        <input type="text" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$break_time != '' ? $break_time->lunch_start.'-'.$break_time->lunch_end.' ('.$break_time->lunch_break.'min)' : '-'}}" name="role" readonly>
                     </div>
                     <div class="mb-4 col-sm-12  col-md-4 create-edit-validation">
                        <label for="role" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Evening Tea Break<span class="det-alert">*</span></label><br />
                        <input type="text" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$break_time != '' ? $break_time->eve_tea_start.'-'.$break_time->eve_tea_end.' ('.$break_time->eve_tea_break.'min)' : '-'}}" name="role" readonly>
                     </div>
                     <div class="mb-4 col-sm-12 col-md-4 create-edit-validation">
                        <input type="hidden" name="crope_img" id="preview-crop-image" value="">
                     </div>
                  </div>
            </section>
            <h3> <div class="media">
                <!-- <div class="bd-wizard-step-icon"><i class="mdi mdi-bank"></i></div> -->
                <div class="media-body">
                    <div class="bd-wizard-step-title">Qualification Details</div>
                    {{-- <div class="bd-wizard-step-subtitle">Step 2</div> --}}
                </div>
                </div>
            </h3>
            <section>
               <div class="row">
                        <!-- <h3 class="text-start">Qualification Details</h3> -->
                        <h6 class="text-start qualificationon">10th</h6>
                        <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
                            @php $tenth = json_decode($user_data->tenth_details); @endphp
                            <label for="board10-name" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Board Name <span class="det-alert">*</span></label><br />
                            <input type="text" class="required w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Board Name" value="{{$tenth->tenth_board_name}}" name="tenth_board_name">

                        </div>
                        <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
                            <label for="q-year" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Year<span class="det-alert">*</span></label><br />
                            <input type="text" class="required w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Qualification Year" value="{{$tenth->tenth_qua_year}}" name="tenth_qua_year">

                        </div>
                        <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
                            <label for="q-percentage" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Percentage<span class="det-alert">*</span></label><br />
                            <input type="text" class="required w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Percentage" value="{{$tenth->tenth_percentage}}" name="tenth_percentage">

                        </div>
                        <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
                            <label for="r-number" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Roll No<span class="det-alert">*</span></label><br />
                            <input type="text" class="required w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Roll Number" value="{{$tenth->tenth_roll_no}}" name="tenth_roll_no">

                        </div>
                    </div>
                <div class="row">
                     <h6 class="text-start qualificationon">12th</h6>
                     <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
                        @php $twelfth = json_decode($user_data->twelfth_details); @endphp
                        <label for="board-name" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Board Name <span class="det-alert">*</span></label><br />
                        <input type="text" class="required w-100 shadow appearance-none border  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Board Name" value="{{$twelfth->twelfth_board_name}}" name="twelfth_board_name">

                     </div>
                     <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
                        <label for="q-year" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Year<span class="det-alert">*</span></label><br />
                        <input type="text" class="required w-100 shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Qualification Year" value="{{$twelfth->twelfth_qua_year}}" name="twelfth_qua_year">

                     </div>
                     <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
                        <label for="q-percentage" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Percentage <span class="det-alert">*</span></label><br />
                        <input type="text" class="required w-100 shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Percentage" value="{{$twelfth->twelfth_percentage}}" name="twelfth_percentage">

                     </div>
                     <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
                        <label for="r-number" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Roll No <span class="det-alert">*</span></label><br />
                        <input type="text" class="required w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Roll Number" value="{{$twelfth->twelfth_roll_no}}" name="twelfth_roll_no">

                     </div>
                  </div>
                  <div class="row">
                     <h6 class="text-start qualificationon">University Qualification </h6>
                     @php if($user_data->university_details != ''){ $university = json_decode($user_data->university_details); } @endphp
                     <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
                        <label for="uni-name" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">University Name</label><br />
                        <input type="text" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="University" value="{{isset($university->university_name) ? $university->university_name : ''}}" name="university_name">

                     </div>
                     <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
                        <label for="q-year" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Year</label><br />
                        <input type="text" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Qualification Year"  value="{{isset($university->university_qua_year) ? $university->university_qua_year : ''}}" name="university_qua_year">

                     </div>
                     <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
                        <label for="q-percentage" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Percentage</label><br />
                        <input type="text" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Percentage" value="{{isset($university->university_percentage) ? $university->university_percentage : ''}}" name="university_percentage">

                     </div>
                     <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
                        <label for="r-number" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Roll No</label><br />
                        <input type="text" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Roll Number" value="{{isset($university->university_roll_no) ? $university->university_roll_no : ''}}" name="university_roll_no">

                     </div>
                  </div>
                  <div class="row">
                     <h6 class="text-start qualificationon">Other Qualification (Optional)</h6>
                     @php $other = json_decode($user_data->other_details);  @endphp
                     <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
                        <label for="uni-name" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">University Name</label><br />
                        <input type="text" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="University" value="{{isset($other->other_university_name) ? $other->other_university_name : ''}}" name="other_university_name">

                     </div>
                     <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
                        <label for="q-year" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Year</label><br />
                        <input type="text" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Qualification Year" value="{{isset($other->other_university_qua_year) ? $other->other_university_qua_year : ''}}" name="other_university_qua_year">

                     </div>
                     <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
                        <label for="q-percentage" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Percentage</label><br />
                        <input type="text" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Percentage" value="{{isset($other->other_university_percentage) ? $other->other_university_percentage : ''}}" name="other_university_percentage">

                     </div>
                     <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
                        <label for="r-number" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Roll No</label><br />
                        <input type="text" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Roll Number" value="{{isset($other->other_university_roll_no) ? $other->other_university_roll_no : ''}}" name="other_university_roll_no">

                     </div>
                  </div>

            </section>
            <h3> <div class="media">
                <!-- <div class="bd-wizard-step-icon"><i class="mdi mdi-bank"></i></div> -->
                <div class="media-body">
                    <div class="bd-wizard-step-title">Address</div>
                    {{-- <div class="bd-wizard-step-subtitle">Step 3</div> --}}
                </div>
                </div>
            </h3>
            <section>
                <div class="content-wrapper">
             <!--  <h4 class="section-heading">Enter your Address details </h4> -->
              <!-- <div class="row"> -->
                <h5 class="qualificationon">Permanent Address</h5>
                <div class="mb-4 col-sm-0 col-md-0 create-edit-validation">
                      <label for="permanent-address" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Street<span class="det-alert">*</span></label><br />
                        <!-- <input type="text" class="permanent_address w-100 required shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-100" placeholder="Street" name="p_street" id="p_street" value="{{isset($user_address->p_street) ? $user_address->p_street : ''}}"> -->
                        <textarea id="w3review" name="w3review" rows="2" cols="50"></textarea>
                <!-- </div> -->

              </div>
              <div class="row">
                <div class="mb-4 col-sm-0 col-md-0 create-edit-validation">
                  <label for="landmark" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Landmark<span class="det-alert">*</span></label><br />
                  <input type="text" id="p_landmark" class="form-control street mb-2 w-100 required shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-100" name="p_landmark" value=
                 "{{isset($user_address->p_landmark) ? $user_address->p_landmark : ''}}">
                </div>

              </div>
              <div class="row">
                {{-- <div class="form-group col-md-6 create-edit-validation">
                  <label for=" Number" class="text-sm">Country/Region:</label><br />
                  <label for="employeeNumber" class="sr-only">Country/Region:</label>
                  <select class="form-control selectpicker countrypicker text-gray-700 text-sm font-bold mb-2" name="p_country" id="p_country" value="{{isset($user_address->p_country) ? $user_address->p_country : '' }}">
                    <option selected>Select Country</option>
                    <option value="1" >India</option>
                    <option value="2" >Afghanistan</option>
                    <option value="3" >Germany</option>
                  </select>
                </div> --}}
                <div class="form-group col-md-4 create-edit-validation">
                  <label for="" class="text-sm text-gray-700 text-sm font-bold mb-2 qualificationon">City/Village<span class="det-alert">*</span></label>
                  <label for="" class="sr-only">City/Village<span class="det-alert">*</span></label>
                  <input type="text" name="p_city" id="p_city" value="{{isset($user_address->p_city) ? $user_address->p_city : ''}}" class="form-control required mb-2 w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-100"  placeholder="City/Village:">
                </div>
                <div class="form-group col-md-4 create-edit-validation">
                  <label for=" Number" class="text-sm qualificationon">State<span class="det-alert">*</span></label>
                  <label for="p_state" class="sr-only">State<span class="det-alert">*</span></label>
                  <input type="text" name="p_state" value="{{isset($user_address->p_state) ? $user_address->p_state : '' }}" id="p_state" class="form-control required mb-2 w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-100" placeholder="State:">
                </div>
                <div class="form-group col-md-4 create-edit-validation qualificationon">
                  <label for="zipCode" class="text-sm qualificationon">Zip Code<span class="det-alert">*</span></label>
                  <label for="zipcode" class="sr-only">Zip Code<span class="det-alert">*</span></label>
                  <input type="number" name="p_zipcode" value="{{isset($user_address->p_zipcode) ? $user_address->p_zipcode : '' }}" id="p_zipcode" class="form-control required mb-2 w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-100" placeholder="Zip Code">
                </div>
              </div>
              <div class="row">
                <div class="form-group mt-2 mb-2 col-sm-7 col-md-7 create-edit-validation qualificationon">
                  <input type="checkbox" class="copy-address"> Same as permanent address
                </div>
              </div>

                <h5 class="qualificationon">Current Address</h5>
                <div class="mb-4 col-sm-0 col-md-0 create-edit-validation qualificationon">
                      <label for="Current Address" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Street</label><br />
                        {{-- <input type="text" class="permanent_address w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-100" placeholder="Street" id="c_street" name="c_street" value="{{isset($user_address->c_street) ? $user_address->c_street : '' }}">
                        @error('permanent_address') <span class="text-danger">{{ $message }}</span>@enderror --}}
                        <textarea id="w3review" name="w3review" rows="2" cols="50"></textarea>

                <div class="mb-4 col-sm-5 col-md-5 create-edit-validation qualificationon">
                  <label for="landmark" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Landmark</label><br />
                  <input type="text" id="c_landmark" class="form-control street mb-2 w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-100"  value="{{isset($user_address->c_landmark) ? $user_address->c_landmark : '' }}" name="c_landmark">
                </div>

                <div class="row">
                 {{--  <div class="form-group col-md-6 create-edit-validation">
                    <label for=" Number" class="text-sm">Country/Region:</label><br />
                    <label for="employeeNumber" class="sr-only">Country/Region:</label>
                    <select name="c_country" class="form-control selectpicker countrypicker text-gray-700 text-sm font-bold mb-2" id="c_country" value="{{isset($user_address->c_country) ? $user_address->c_country : ''}}">
                      <option selected>Select Country</option>
                      <option value="1" >India</option>
                    <option value="2">Afghanistan</option>
                    <option value="3" >Germany</option>
                    </select>
                  </div> --}}
                  <div class="form-group col-md-4 create-edit-validation">
                    <label for="" class="text-sm text-gray-700 text-sm font-bold mb-2 qualificationon">City/Village</label>
                    <label for="" class="sr-only">City/Village</label>
                    <input type="text" value="{{isset($user_address->c_city) ? $user_address->c_city : ''}}" name="c_city" id="c_city" class="form-control  mb-2 w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-100" placeholder="City/Village:">
                  </div>
                  <div class="form-group col-md-4 create-edit-validation">
                     <label for=" Number" class="text-sm qualificationon">State</label>
                     <label for="designation" class="sr-only">State</label>
                     <input type="text" value="{{isset($user_address->c_state) ? $user_address->c_state : ''}}" name="c_state" id="c_state" class="form-control  mb-2 w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-100 " placeholder="State:">
                   </div>
                   <div class="form-group col-md-4 create-edit-validation">
                     <label for="zipCode" class="text-sm qualificationon">Zip Code</label>
                     <label for="zipcode" class="sr-only">Zip Code</label>
                     <input type="number" value="{{isset($user_address->c_zipcode) ? $user_address->c_zipcode : ''}}" name="c_zipcode" id="c_zipcode" class="form-control  mb-2 w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-100" placeholder="Zip Code:">
                   </div>
                </div>
            </section>
            <h3>            <div class="media">
               <!--  <div class="bd-wizard-step-icon"><i class="mdi mdi-account-check-outline"></i></div> -->
                <div class="media-body">
                    <div class="bd-wizard-step-title">Industry Experience </div>
                    {{-- <div class="bd-wizard-step-subtitle">Step 4</div> --}}
                </div>
                </div>
            </h3>
            <section>
               <div id="workorder">
                @php  $industry_experience = json_decode($user_data->industry_experience); @endphp
                @if(isset($industry_experience))
                  @foreach($industry_experience as $key=>$data)
                  <div class="row removeclass">
                     <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
                        <label for="industry-name" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Industry Name</label><br />
                        <input type="text" name="industry_name[]" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$data->industry_name}}" placeholder="Industry Name">
                     </div>
                     <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
                        <label for="indus-designation" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Designation</label><br />
                        <input type="text" name="industry_designation[]" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$data->industry_designation}}" placeholder="Designation">
                     </div>
                     <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
                        <label for="indus-salary" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Salary</label><br />
                        <input type="text" name="industry_salary[]" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$data->industry_salary}}" placeholder="Salary">
                     </div>
                     <div class="mb-4 col-sm-12 col-md-3 total-exp-field create-edit-validation">
                        <label for="indus-experience" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Total Year of Experience</label><br />
                        <div class="d-flex">
                           <input type="button" value="-" class="qty-minus rounded border-0 bg-dark text-white w-25 mx-n1">
                           <input type="number" name="industry_total_year[]" class="w-100 industry-exp shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$data->industry_total_year}}" placeholder="Total Experience" class="qty" >
                           <input type="button" value="+" class="qty-plus rounded border-0 bg-dark text-white w-25 mx-n1">
                        </div>
                     </div>

                     <button data-repeater-delete type="button" class="btn btn-danger remove-indus btn-sm icon-btn ms-2 w-5">
                              <i class="fa fa-trash"></i>
                           </button>

                  </div>
                  @endforeach
                  @else
                    <div class="row">
                        <h3 class="text-start">Industry Experience</h3>
                        <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
                           <label for="industry-name" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Industry Name:</label><br />
                           <input type="text" name="industry_name[]" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Industry Name">

                        </div>
                        <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
                           <label for="indus-designation" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Designation:</label><br />
                           <input type="text" name="industry_designation[]" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Designation">

                        </div>
                        <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
                           <label for="indus-salary" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Salary:</label><br />
                           <input type="text" name="industry_salary[]" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Salary">

                        </div>
                        <div class="mb-4 col-sm-12 col-md-3 total-exp-field create-edit-validation">
                           <label for="indus-experience" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Total Year of Experience:</label><br />
                           <div class="d-flex">
                              <input type="button" value="-" class="qty-minus rounded border-0 bg-dark text-white w-25 mx-n1">
                              <input type="number" name="industry_total_year[]" class="w-100 industry-exp shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Total Experience" value="0" class="qty">
                              <input type="button" value="+" class="qty-plus rounded border-0 bg-dark text-white w-25 mx-n1">
                           </div>

                        </div>
                     </div>
                     @endif
                  </div>
                     <button type="button" class="btn add-indus btn-sm icon-btn ms-2 mb-2" style="margin-top:10px;">
                        <i class="fa fa-plus"></i>&nbsp; Add New Industry Experience
                     </button>

            </section>
            <h3>
                <div class="media">
                <!-- <div class="bd-wizard-step-icon"><i class="mdi mdi-emoticon-outline"></i></div> -->
                <div class="media-body">
                    <div class="bd-wizard-step-title">Document Upload</div>
                    {{-- <div class="bd-wizard-step-subtitle">Step 5</div> --}}
                </div>
                </div>
            </h3>
            <section class="document-create-edit">
               <div class="document-upload">
                <div class="main-document ">
                <div class="row">
                     {{-- <h3 class="text-start">Document Upload</h3> --}}
                     <div class="mb-4 col-sm-12 col-md-3 ghijk create-edit-validation">
                        <h6>10th Marksheet</h6>
                        <input class="demo1" type="file" name="tenth_marksheet" />

                        @if(isset($user_data->tenth_marksheet))
                        @php $ten_exten = explode('.',$user_data->tenth_marksheet)@endphp
                        @if($ten_exten[1] != 'pdf')
                        <img src="{{$user_data->tenth_marksheet ? asset('assets').'/'.$user_data->tenth_marksheet : asset('assets/img/images.png')}}" class="rounded-circle">
                        @else
                        <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle">
                        @endif
                        <a href="{{isset($user_data->tenth_marksheet) ? asset('assets').'/'.$user_data->tenth_marksheet : ''}}" class="btn btn-success mb-0 text-white mt-3" download>Download</a>
                        @endif
                     </div>
                     <div class="mb-4 col-sm-12 col-md-3 ghijk create-edit-validation">
                        <h6>12th Marksheet</h6>
                        <input class="demo1" type="file" name="twelfth_marksheet" />

                        @if(isset($user_data->twelfth_marksheet))
                        @php $twe_exten = explode('.',$user_data->twelfth_marksheet)@endphp
                        @if($twe_exten[1] != 'pdf')
                        <img src="{{$user_data->twelfth_marksheet ? asset('assets').'/'.$user_data->twelfth_marksheet : asset('assets/img/images.png')}}" class="rounded-circle">
                        @else
                        <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle">
                        @endif
                        <a href="{{isset($user_data->twelfth_marksheet) ? asset('assets').'/'.$user_data->twelfth_marksheet : ''}}" class="btn btn-success mb-0 text-white mt-3" download>Download</a>
                        @endif
                     </div>
                     <div class="mb-4 col-sm-12 col-md-3 ghijk create-edit-validation">
                        <h6>Aadhar Card</h6>
                        <input class="demo1" type="file" name="aadhar_card" />

                        @if(isset($user_data->aadhar_card))
                        @php $aadhr_exten = explode('.',$user_data->aadhar_card)@endphp
                        @if($aadhr_exten[1] != 'pdf')
                        <img src="{{$user_data->aadhar_card ? asset('assets').'/'.$user_data->aadhar_card : asset('assets/img/images.png')}}" class="rounded-circle">
                        @else
                        <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle">
                        @endif
                        <a href="{{isset($user_data->aadhar_card) ? asset('assets').'/'.$user_data->aadhar_card : ''}}" class="btn btn-success mb-0 text-white mt-3" download>Download</a>
                        @endif
                     </div>
                     <div class="mb-4 col-sm-12 col-md-3 ghijk create-edit-validation">
                        <h6>Alternative Govt. ID Card</h6>
                        <input class="demo1" type="file" name="alternative_govt_id_card" />

                        @if(isset($user_data->alternative_govt_id_card))
                        @php $govt_id_exten = explode('.',$user_data->alternative_govt_id_card)@endphp
                        @if($govt_id_exten[1] != 'pdf')
                        <img src="{{$user_data->alternative_govt_id_card ? asset('assets').'/'.$user_data->alternative_govt_id_card : asset('assets/img/images.png')}}" class="rounded-circle">
                        @else
                        <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle">
                        @endif
                        <a href="{{isset($user_data->alternative_govt_id_card) ? asset('assets').'/'.$user_data->alternative_govt_id_card : ''}}" class="btn btn-success mb-0 text-white mt-3" download>Download</a>
                        @endif
                     </div>
                  </div>
                </div>
                <div class="row gradu-title">
                     <div class="mb-4 col-sm-12 col-md-3 ghijk create-edit-validation">
                        <h6>Graduation / Diploma (Optional)</h6>
                        <input class="demo1" type="file" name="graduation_diploma" />

                        @if(isset($user_data->graduation_diploma))
                        @php $diploma_exten = explode('.',$user_data->graduation_diploma)@endphp
                        @if($diploma_exten[1] != 'pdf')
                        <img src="{{$user_data->graduation_diploma ? asset('assets').'/'.$user_data->graduation_diploma : asset('assets/img/images.png')}}" class="rounded-circle">
                        @else
                        <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle">
                        @endif
                        <a href="{{isset($user_data->graduation_diploma) ? asset('assets').'/'.$user_data->graduation_diploma : ''}}" class="btn btn-success mb-0 text-white mt-3" download>Download</a>
                        @endif
                     </div>
                     <div class="mb-4 col-sm-12 col-md-3 ghijk create-edit-validation">
                        <h6>Post Graduation (Optional)</h6>
                        <input class="demo1" type="file" name="post_graduation" />

                        @if(isset($user_data->post_graduation))
                        @php $gradu_exten = explode('.',$user_data->post_graduation)@endphp
                        @if($gradu_exten[1] != 'pdf')
                        <img src="{{$user_data->post_graduation ? asset('assets').'/'.$user_data->post_graduation : asset('assets/img/images.png')}}" class="rounded-circle">
                        @else
                        <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle">
                        @endif
                        <a href="{{isset($user_data->post_graduation) ? asset('assets').'/'.$user_data->post_graduation : ''}}" class="btn btn-success mb-0 text-white mt-3" download>Download</a>
                        @endif
                     </div>
                     <div class="mb-4 col-sm-12 col-md-3 ghijk create-edit-validation">
                        <h6>Experience Certificate (Optional)</h6>
                        <input class="demo1" type="file" name="experience_certificate" />

                        @if(isset($user_data->experience_certificate))
                        @php $certi_exten = explode('.',$user_data->experience_certificate)@endphp
                        @if($certi_exten[1] != 'pdf')
                        <img src="{{$user_data->experience_certificate ? asset('assets').'/'.$user_data->experience_certificate : asset('assets/img/images.png')}}" class="rounded-circle">
                        @else
                        <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle">
                        @endif
                        <a href="{{isset($user_data->experience_certificate) ? asset('assets').'/'.$user_data->experience_certificate : ''}}" class="btn btn-success mb-0 text-white mt-3" download>Download</a>
                        @endif
                     </div>
                     <div class="mb-4 col-sm-12 col-md-3 ghijk create-edit-validation">
                        <h6>Salary Slip (Optional)</h6>
                        <input class="demo1" type="file" name="salary_slip" />

                        @if(isset($user_data->salary_slip))
                        @php $salary_exten = explode('.',$user_data->salary_slip)@endphp
                        @if($salary_exten[1] != 'pdf')
                        <img src="{{$user_data->salary_slip ? asset('assets').'/'.$user_data->salary_slip : asset('assets/img/images.png')}}" class="rounded-circle">
                        @else
                        <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle">
                        @endif
                        <a href="{{isset($user_data->salary_slip) ? asset('assets').'/'.$user_data->salary_slip : ''}}" class="btn btn-success mb-0 text-white mt-3" download>Download</a>
                        @endif
                     </div>
                     <div class="mb-4 col-sm-12 col-md-3 ghijk create-edit-validation">
                        <h6>Offer Letter (Optional)</h6>
                        <input class="demo1" type="file" name="offer_letter" />

                        @if(isset($user_data->offer_letter))
                        @php $salary_exten = explode('.',$user_data->offer_letter)@endphp
                        @if($salary_exten[1] != 'pdf')
                        <img src="{{$user_data->offer_letter ? asset('assets').'/'.$user_data->offer_letter : asset('assets/img/images.png')}}" class="rounded-circle">
                        @else
                        <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle">
                        @endif
                        <a href="{{isset($user_data->offer_letter) ? asset('assets').'/'.$user_data->offer_letter : ''}}" class="btn btn-success mb-0 text-white mt-3" download>Download</a>
                        @endif
                     </div>
                     <div class="mb-4 col-sm-12 col-md-3 ghijk create-edit-validation">
                        <h6>Joining Letter (Optional)</h6>
                        <input class="demo1" type="file" name="joining_letter" />

                        @if(isset($user_data->joining_letter))
                        @php $salary_exten = explode('.',$user_data->joining_letter)@endphp
                        @if($salary_exten[1] != 'pdf')
                        <img src="{{$user_data->joining_letter ? asset('assets').'/'.$user_data->joining_letter : asset('assets/img/images.png')}}" class="rounded-circle">
                        @else
                        <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle">
                        @endif
                        <a href="{{isset($user_data->joining_letter) ? asset('assets').'/'.$user_data->joining_letter : ''}}" class="btn btn-success mb-0 text-white mt-3" download>Download</a>
                        @endif
                     </div>
                     <div class="mb-4 col-sm-12 col-md-3 ghijk create-edit-validation">
                        <h6>Resignation Letter (Optional)</h6>
                        <input class="demo1" type="file" name="resignation_letter" />

                        @if(isset($user_data->resignation_letter))
                        @php $salary_exten = explode('.',$user_data->resignation_letter)@endphp
                        @if($salary_exten[1] != 'pdf')
                        <img src="{{$user_data->resignation_letter ? asset('assets').'/'.$user_data->resignation_letter : asset('assets/img/images.png')}}" class="rounded-circle">
                        @else
                        <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle">
                        @endif
                        <a href="{{isset($user_data->resignation_letter) ? asset('assets').'/'.$user_data->resignation_letter : ''}}" class="btn btn-success mb-0 text-white mt-3" download>Download</a>
                        @endif
                     </div>

                     <div>
                     </div>
                  </div>
               </div>
               <button class="create-edit finish" type="submit">Finish</button>
            </section>

            @if(isset($users->offer_datils))
            @php  $offer_details = json_decode($users->offer_datils); @endphp
            <h3 class="offer-detail-step">
                <div class="media">
                <!-- <div class="bd-wizard-step-icon"><i class="mdi mdi-emoticon-outline"></i></div> -->
                <div class="media-body">
                    <div class="bd-wizard-step-title">Offer details</div>
                    {{-- <div class="bd-wizard-step-subtitle">Step 6</div> --}}
                </div>
                </div>
            </h3>
            <section class="View-create-edit">
               <div class="document-upload">
                <div class="main-document ">
                    <section>
                        <div class="row fluse">
                           <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                              <label for="letter_iussue_date" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click qualificationon">Offer letter issue  date <span class="det-alert">*</span></label><br/>
                              <input class="offer-l leterpri" id="letter_iussue_date" name="letter_iussue_date" type="date" class= "w-100 required shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder=" issue date" value="{{$offer_details->letter_iussue_date}}" readonly>
                           </div>
                           <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                              <label for="letter_iussue_validity" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click qualificationon">Offer letter issue validity date<span class="det-alert">*</span></label>
                              <input class="offer-l leterpri" id="letter_iussue_validity" name="letter_iussue_validity" type="date" class= " w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight offer-l focus:outline-none focus:shadow-outline" placeholder="issue validity date" value="{{$offer_details->letter_iussue_validity}}" readonly>
                           </div>
                           <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                              <label for="shift" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start qualificationon">Shift<span class="det-alert">*</span></label>
                                <input   class="offer-l leterpri" type="text" name="shift" id="" class= "w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$offer_details->shift}}" readonly>
                           </div>
                           <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                              <label for="Days" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click qualificationon">Days<span class="det-alert">*</span></label><br />
                              <input  class="offer-l leterpri" type="text" name="Days" id="" class= " w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight offer-l focus:outline-none focus:shadow-outline" value="{{$offer_details->Days}}" readonly>
                           </div>
                           <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                              <label for="start_time" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click qualificationon">Start time <span class="det-alert">*</span></label><br />
                             <input  class="offer-l leterpri" type="text" name="start_time" class= "w-100 required shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$offer_details->start_time}}" readonly>

                           </div>
                           <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                              <label for="end_time" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click qualificationon">End time <span class="det-alert">*</span></label><br/>
                              <input  class="offer-l leterpri" type="text" name="end_time" class= "w-100 required shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$offer_details->end_time}}" readonly>
                           </div>
                           <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                              <label for="month_working_hour" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click qualificationon">month working hours <span class="det-alert">*</span></label><br/>
                              <input class="offer-l leterpri" id="month_working_hour" name="month_working_hour" type="number" class= "w-100 required shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight offer-l focus:outline-none focus:shadow-outline" placeholder=" per month working hours" value="{{$offer_details->month_working_hour}}" readonly>
                           </div>
                           <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                              <label for="days_working_hour" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click qualificationon">days working hours <span class="det-alert">*</span></label>
                              <input class="offer-l leterpri" id="days_working_hour" name="days_working_hour" type="number" class= "required w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight offer-l focus:outline-none focus:shadow-outline" placeholder="per days working hours " value="{{$offer_details->days_working_hour}}" readonly>
                           </div>

                        </div>
                        <div class="row">

                           <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                              <label for="week_working_hour" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click qualificationon">weekly working hours<span class="det-alert">*</span></label>
                              <input class="offer-l leterpri" name="week_working_hour" id="week_working_hour" type="number" class="required w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight offer-l focus:outline-none focus:shadow-outline" placeholder="weekly working hours" value="{{$offer_details->week_working_hour}}"  readonly>
                           </div>
                           <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                              <label for="hra" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click qualificationon">HRA<span class="det-alert"></span></label><br/>
                              <input class="offer-l leterpri" id="hra" name="hra" type="number" class= "w-100 required shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight offer-l focus:outline-none focus:shadow-outline" placeholder="HRA" value="0" value="{{$offer_details->hra}}" readonly>
                              @error('hra')
                                <div class="alert alert-danger">{{ $message }}</div>
                             @enderror
                           </div>
                           <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                              <label for="Designation" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click qualificationon">Designation<span class="det-alert">*</span></label>
                              <input class="offer-l leterpri" id="Designation" name="Designation" type="text" class= "required w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight offer-l focus:outline-none focus:shadow-outline" placeholder="Designation" value="{{$offer_details->Designation}}" readonly>
                           </div>

                           <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                              <label for="basic" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click qualificationon">Basic<span class="det-alert">*</span></label><br />
                              <input class="offer-l leterpri" type="number" name="basic" class="required w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight offer-l focus:outline-none focus:shadow-outline" placeholder="Basic" id="basic" value="{{$offer_details->basic}}" readonly>
                           </div>

                        </div>
                        <div class="row">

                           <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                              <label for="monthly_leave" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click qualificationon">Monthly leave<span class="det-alert">*</span></label><br />
                              <input class="offer-l leterpri" type="number" name="monthly_leave" class="required w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight offer-l focus:outline-none focus:shadow-outline" placeholder="Monthly leave" id="monthly_leave" value="{{$offer_details->monthly_leave}}" readonly>
                           </div>
                           <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                              <label for="yearly_leave" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click qualificationon">Yearly leave<span class="det-alert">*</span></label><br/>
                              <input class="offer-l leterpri" id="yearly_leave" name="yearly_leave" type="number" class= "w-100 required shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight offer-l focus:outline-none focus:shadow-outline" placeholder="Yearly leave" value="{{$offer_details->yearly_leave}}" readonly>
                           </div>

                           <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                              <label for="conveyance_allow" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click qualificationon">Conveyance Allowance<span class="det-alert">*</span></label>
                              <input class="offer-l leterpri" id="conveyance_allow" name="conveyance_allow" type="number" class= "required w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight offer-l focus:outline-none focus:shadow-outline" placeholder="Conveyance Allowance" value="{{$offer_details->conveyance_allow}}" readonly>
                           </div>
                           <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                              <label for="special_allow" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click qualificationon">Special Allowance<span class="det-alert">*</span></label>
                              <input class="offer-l leterpri" name="special_allow" id="special_allow" type="number" class="required w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight offer-l focus:outline-none focus:shadow-outline" placeholder="Special Allowance" value="{{$offer_details->special_allow}}" readonly>
                           </div>
                        </div>
                        <div class="row">


                           <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                              <label for="Pf1" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click qualificationon">PF (Company’s Share)<span class="det-alert">*</span></label><br/>
                              <input class="offer-l leterpri" id="Pf1" name="Pf1" type="number" class= "w-100 required shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight offer-l focus:outline-none focus:shadow-outline" placeholder="PF (Employee’s Share)" value="{{$offer_details->Pf1}}" readonly>
                           </div>
                           <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                              <label for="Pf2" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click qualificationon">PF (Employer’s Share)<span class="det-alert">*</span></label>
                              <input class="offer-l leterpri" id="Pf2" name="Pf2" type="number" class= "required w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight offer-l focus:outline-none focus:shadow-outline" placeholder="PF (Employer’s Share)" value="{{$offer_details->Pf2}}" readonly>
                           </div>
                           <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                              <label for="mobile_allow" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click qualificationon">Mobile Allowance<span class="det-alert"></span></label>
                              <input class="offer-l leterpri" name="mobile_allow" id="mobile_allow" type="number" class="required w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight offer-l focus:outline-none focus:shadow-outline" placeholder="Mobile Allowance" value="0" value="{{$offer_details->mobile_allow}}" readonly>
                           </div>
                           <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                              <label for="insurance_benefits" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click qualificationon">Insurance benefits<span class="det-alert">*</span></label><br />
                              <input class="offer-l leterpri" type="number" name="insurance_benefits" class="required w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight offer-l focus:outline-none focus:shadow-outline" placeholder="Insurance benefits" id="insurance_benefits" value="{{$offer_details->insurance_benefits}}" readonly>
                           </div>
                        </div>
                        <div class="row">


                           <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                              <label for="gratuity" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click qualificationon">Gratuity<span class="det-alert"></span></label><br/>
                              <input class="offer-l leterpri" id="gratuity" name="gratuity" type="number" class= "w-100 required shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight offer-l focus:outline-none focus:shadow-outline" placeholder="Gratuity" value="0" value="{{$offer_details->gratuity}}" readonly>
                           </div>
                           <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                              <label for="employee_refarance" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click qualificationon">Employee refarance<span class="det-alert"></span></label>
                              <input class="offer-l leterpri" id="employee_refarance" name="employee_refarance" type="text" class= " w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight offer-l focus:outline-none focus:shadow-outline" placeholder="employee refarance" value="{{$offer_details->employee_refarance}}" readonly>
                           </div>
                           <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                              <label for="gross_salary" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click qualificationon">GROSS SALARY<span class="det-alert"></span></label><br />
                              <input class="offer-l leterpri" type="number" name="gross_salary" class=" w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight offer-l focus:outline-none focus:shadow-outline" placeholder="GROSS SALARY" id="gross_salary" value="0" value="{{$offer_details->gross_salary}}" readonly>
                           </div>
                        </div>
                        <div class="row">

                       </div>
                     </section>
               </div>

                 </div>
            </section>
            @endif
        </div>
    </form>
        </div>
    </div>
</div>
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
                    <div class="d-flex justify-content-center align-items-center">
                        <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                    </div>
                <div class="col-md-4">
                        <div class="preview"></div>
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
<script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>

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
                     },
                     id:function() {
                        return $('#id').val()
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
            confirm_password:{
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
            role: "select a role field",
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
                extension:"Tenth Marksheet must be JPEG,JPG,PDF or PNG."
            },
            twelfth_marksheet:{
                extension:"Twelfth Marksheet must be JPEG,JPG,PDF or PNG."
            },
            aadhar_card:{
                extension:"Aadhar Card must be JPEG,JPG,PDF or PNG."
            },
            alternative_govt_id_card:{
                extension:"Alternative govt id card must be JPEG,JPG,PDF or PNG."
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

     var form = $("#contact");
    form.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        enableAllSteps: true,
        onStepChanging: function (event, currentIndex, newIndex)
        {
            console.log(event);
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },



        onStepChanged: function (event, current, next) {
         console.log(current);
         if (current == 5) {
         $('.actions > ul > li:first-child').attr('style', 'display:none');

         } else {
         $('.actions > ul > li:first-child').attr('style', '');
         }
         },
        onFinishing: function (event, currentIndex)
        {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function (event, currentIndex)
        {
            alert("Submitted!");
        }
    });
    $(document).ready(function() {
         $(document).on('click', '.close', function() {
            $('#modal').modal('hide');
         });




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
$('#modal').modal('hide');
$('.img-account-profile').attr('src',base64data);
}
});
})
</script>
