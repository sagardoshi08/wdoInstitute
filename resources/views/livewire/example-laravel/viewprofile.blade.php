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
   .abc input{
    border: none;
   }
   .abc select{
    border: none;
   }
</style>
{{-- <div class="domin">
   <a  type="button" href="{{ route('edituser',$user->id)}}" class=" edit-rounded rounded-pill inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5 cancel-btn">
   Edit
   </a>
</div> --}}
<style>
</style>
<div class="container-fluid py-4  view">
<div class="row">
    <div class="name_line">
        <div class="user_name_j">
            <h3 class="col-sm-9 mt-2">
                <b style="color: #fff">{{$user->name}}</b>
            </h3>
                <h4 class="col-sm-4 mt-2" style="padding-left: 22px;">
                    <b style="color: #fff ">{{ Auth::user()->role }}</b>
                </h4>
        </div>
    </div>
<div class="bg-white px-3 pb-2 sm:p-6 sm:pb-4">

<div class="m-3 text-img">
   <img class="img-account-profile p-img" width="100px" height="100px" src="{{$user_data->profile_image ? asset('assets').'/'.$user_data->profile_image : asset('assets/img/images.png')}}" alt="">
   <div class="row personal-ils ">
    <div class="students-start col-lg-7 pl-4">
       <div class="students-text">
          <h4 class="card-title text-start">Personal Details</h4>
       </div>
       <div class="row students-start-col">
          <div class="col-sm-12 mt-1 col-lg-12">

             <div class="form-group">
                <label for="userName" class="block text-gray-700 text-sm font-bold mb-0 text-start col-lg-6"><b>Name:</b></label><br/>
                <input id="userName" value="{{$user->name}}" name="name" type="text" class= "form-control shadow appearance-none border rounded w-full py-0 px-0 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder=" - " readonly>
             </div>
          </div>
          <div class="col-sm-12 mt-1 col-lg-12">
             <div class="form-group">
                <label for="father_name" class="block text-gray-700 text-sm font-bold mb-0 text-start col-lg-6"><b>Father Name:</b></label>
                <input id="father_name" value="{{$user_data->father_name}}" name="father_name" type="text" class= "form-control shadow appearance-none border rounded w-full py-0 px-0 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Father Name" readonly>
             </div>
          </div>
          <div class="col-sm-12 mt-1 col-lg-12">
             <div class="form-group">
                <label for="mother_name" class="block text-gray-700 text-sm font-bold mb-0 text-start col-lg-6"><b>Mother Name:</b></label>
                <input name="mother_name" value="{{$user_data->mother_name}}" id="mother_name" type="text" class="form-control shadow appearance-none border rounded w-full py-0 px-0 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Mother Name" readonly>
             </div>
          </div>
          <div class="col-sm-12 mt-1 col-lg-12">
             <div class="form-group">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-0 text-start col-lg-6"><b>Email Address:</b></label><br />
                <input type="text" id="email" value="{{$user->email}}" name="email" class="form-control shadow appearance-none border rounded w-full py-0 px-0 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Email Address" readonly>
             </div>
          </div>
          <div class="col-sm-12 mt-1 col-lg-12">
             <div class="form-group">
                <label for="dob" class="block text-gray-700 text-sm font-bold mb-0 text-start col-lg-6"><b>Date Of Birth:</b></label><br />
                <input class="required form-control shadow appearance-none border rounded w-full py-0 px-0 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date" onfocus="focused(this)" onfocusout="defocused(this)" value="{{$user_data->date_of_birth}}" name="date_of_birth" readonly>
             </div>
          </div>
          <div class="col-sm-12 mt-1 col-lg-12">
             <div class="form-group">
                <label for="phone" class="block text-gray-700 text-sm font-bold mb-0 text-start col-lg-6"><b>Phone Number:</b></label><br />
                <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control shadow appearance-none border rounded w-full py-0 px-0 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$user_data->phone_number}}" placeholder="Enter Phone Number" name="phone_number" min="10" maxlength="10" pattern="\d*" readonly>
             </div>
          </div>
          <div class="col-sm-12 mt-1 col-lg-12">
             <div class="form-group">
                <label for="alternate-phone" class="block text-gray-700 text-sm font-bold mb-0 text-start col-lg-6"><b>Alternate Phone Number:</b></label><br />
                <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control shadow appearance-none border rounded w-full py-0 px-0 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$user_data->alternate_phone_number}}" placeholder="Alternate Phone Number" name="alternate_phone_number" min="10" maxlength="10" pattern="\d*" readonly>
             </div>
          </div>
          <div class="col-sm-12 mt-1 col-lg-12">
             <div class="form-group">
                <label for="role" class="block text-gray-700 text-sm font-bold mb-0 text-start col-lg-6"><b>Role:</b></label><br />
                <input type="text" class="form-control shadow appearance-none border rounded w-full py-0 px-0 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$user->role}}" name="role" readonly id="role">
             </div>
          </div>
       </div>
    </div>
    <div class="frustration col-lg-5 p-0">
        <h4 class="freus-text">FRUSTRATIONS</h4>
        <p id="text-fres" name="text" rows="4" cols="40">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</P>
        <h4 class="freus-text" style="margin-top: 11px;">GOAL</h4>
        <p id="text-fres" name="text" rows="4" cols="40">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</P>
    </div>
 </div>

</div>
<div class=" add-user-form view-form">
   <div class="row">


   </div>
   <div class="row">
    <div class="name_line_p">
        <div class="user_name_j">
            <h3 class="col-sm-7 mt-3">
                <b style="color: #fff">Qualification Details</b>
            </h3>
                <h4 class="col-sm-5 mt-3" style="padding-left: 29px;">
                    <b style="color: #fff ">Industry Experience</b>
                </h4>
        </div>
    </div>
    <div class="student-parent-d">
        <div class="students-start col-lg-6 p-0">

        {{-- <div class="students-text">
            <h4 class="card-title text-start">Qualification Details</h4>
        </div> --}}
        <div class="row students-start-col">
            <h5 class="text-start"><span>10th</span></h5>
            <div class="col-sm-6 mt-3">
                <div class="form-group">
                    @php $tenth = json_decode($user_data->tenth_details); @endphp
                    <label for="userName" class="w-100 block text-gray-700 text-sm font-bold mb-0 text-start"><b>Board Name</b></label><br/>
                    <input id="userName" value="{{$tenth->tenth_board_name}}" name="tenth_board_name" type="text" class= "form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder=" - " readonly>
                </div>
            </div>
            <div class="col-sm-6 mt-3">
                <div class="form-group">
                    <label for="userName" class="w-100 block text-gray-700 text-sm font-bold mb-0 text-start"><b>Year</b></label><br/>
                    <input id="userName" value="{{$tenth->tenth_qua_year}}" name="tenth_qua_year" type="text" class= "form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder=" - " readonly>
                </div>
            </div>
            <div class="col-sm-6 mt-3">
                <div class="form-group">
                    <label for="userName" class="w-100 block text-gray-700 text-sm font-bold mb-0 text-start"><b>Percentage</b></label><br/>
                    <input id="userName" value="{{$tenth->tenth_percentage}}%" name="tenth_percentage" type="text" class= "form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder=" - " readonly>
                </div>
            </div>
            <div class="col-sm-6 mt-3">
                <div class="form-group">
                    <label for="userName" class="w-100 block text-gray-700 text-sm font-bold mb-0 text-start"><b>Roll No</b></label><br/>
                    <input id="userName" value="{{$tenth->tenth_roll_no}}" name="tenth_roll_no" type="text" class= "form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder=" - " readonly>
                </div>
            </div>
        </div>
        <div class="row students-start-col">
            <h5 class="text-start"><span>12th</span></h5>
            <div class="col-sm-6 mt-3">
                <div class="form-group">
                    @php $twelfth = json_decode($user_data->twelfth_details); @endphp
                    <label for="userName" class="w-100 block text-gray-700 text-sm font-bold mb-0 text-start"><b>Board Name</b></label>
                    <input id="userName" value="{{$twelfth->twelfth_board_name}}" name="tenth_board_name" type="text" class= "form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder=" - " readonly>
                </div>
            </div>
            <div class="col-sm-6 mt-3">
                <div class="form-group">
                    <label for="userName" class="w-100 block text-gray-700 text-sm font-bold mb-0 text-start"><b>Year</b></label><br/>
                    <input id="userName" value="{{$twelfth->twelfth_qua_year}}" name="tenth_qua_year" type="text" class= "form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder=" - " readonly>
                </div>
            </div>
            <div class="col-sm-6 mt-3">
                <div class="form-group">
                    <label for="userName" class="w-100 block text-gray-700 text-sm font-bold mb-0 text-start"><b>Percentage</b></label><br/>
                    <input id="userName" value="{{$twelfth->twelfth_percentage}}%" name="tenth_percentage" type="text" class= "form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder=" - " readonly>
                </div>
            </div>
            <div class="col-sm-6 mt-3">
                <div class="form-group">
                    <label for="userName" class="w-100 block text-gray-700 text-sm font-bold mb-0 text-start"><b>Roll No</b></label><br/>
                    <input id="userName" value="{{$twelfth->twelfth_roll_no}}" name="tenth_roll_no" type="text" class= "form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder=" - " readonly>
                </div>
            </div>
        </div>
        <div class="row students-start-col">
            <h5 class="text-start"><span>University Qualification</span></h5>
            <div class="col-sm-6 mt-3">
                <div class="form-group">
                    @php if($user_data->university_details != ''){ $university = json_decode($user_data->university_details); } @endphp
                    <label for="userName" class="w-100 block text-gray-700 text-sm font-bold mb-0 text-start"><b>University Name</b></label><br/>
                    <input id="userName" value="{{isset($university->university_name) ? $university->university_name : ''}}" name="tenth_board_name" type="text" class= "form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder=" - " readonly>
                </div>
            </div>
            <div class="col-sm-6 mt-3">
                <div class="form-group">
                    <label for="userName" class="w-100 block text-gray-700 text-sm font-bold mb-0 text-start"><b>Year</b></label><br/>
                    <input id="userName" value="{{isset($university->university_qua_year) ? $university->university_qua_year : ''}}" name="tenth_qua_year" type="text" class= "form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder=" - " readonly>
                </div>
            </div>
            <div class="col-sm-6 mt-3">
                <div class="form-group">
                    <label for="userName" class="w-100 block text-gray-700 text-sm font-bold mb-0 text-start"><b>Percentage</b></label><br/>
                    <input id="userName" value="{{isset($university->university_percentage) ? $university->university_percentage : ''}}%" name="tenth_percentage" type="text" class= "form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder=" - " readonly>
                </div>
            </div>
            <div class="col-sm-6 mt-3">
                <div class="form-group">
                    <label for="userName" class="w-100 block text-gray-700 text-sm font-bold mb-0 text-start"><b>Roll No</b></label><br/>
                    <input id="userName" value="{{isset($university->university_roll_no) ? $university->university_roll_no : ''}}" name="tenth_roll_no" type="text" class= "form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder=" - " readonly>
                </div>
            </div>
        </div>
        <div class="row students-start-col">
            <h5 class="text-start"><span>Other Qualification (Optional)</span></h5>
            <div class="col-sm-6 mt-3">
                <div class="form-group">
                    @php $other = json_decode($user_data->other_details);  @endphp
                    <label for="userName" class="w-100 block text-gray-700 text-sm font-bold mb-0 text-start"><b>University Name</b></label><br/>
                    <input id="userName" value="{{isset($other->other_university_name) ? $other->other_university_name : ''}}" name="tenth_board_name" type="text" class= "form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="" readonly />
                </div>
            </div>
            <div class="col-sm-6 mt-3">
                <div class="form-group">
                    <label for="userName" class="w-100 block text-gray-700 text-sm font-bold mb-0 text-start"><b>Year</b></label><br/>
                    <input id="userName" value="{{isset($other->other_university_qua_year) ? $other->other_university_qua_year : ''}}" name="tenth_qua_year" type="text" class= "form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="" readonly />
                </div>
            </div>
            <div class="col-sm-6 mt-3">
                <div class="form-group">
                    <label for="userName" class="w-100 block text-gray-700 text-sm font-bold mb-0 text-start"><b>Percentage</b></label><br/>
                    <input id="userName" value="{{isset($other->other_university_percentage) ? $other->other_university_percentage : ''}}" name="tenth_percentage" type="text" class= "form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="" readonly />
                </div>
            </div>
            <div class="col-sm-6 mt-3">
                <div class="form-group">
                    <label for="userName" class="w-100 block text-gray-700 text-sm font-bold mb-0 text-start"><b>Roll No</b></label><br/>
                    <input id="userName" value="{{isset($other->other_university_roll_no) ? $other->other_university_roll_no : ''}}" name="tenth_roll_no" type="text" class= "form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="" readonly />
                </div>
            </div>
        </div>
        </div>

        <div class="row">
            <div class="students-start p-0">
               {{-- <div class="students-text">
                  <h4 class="card-title text-start">Industry Experience</h4>
               </div> --}}
               <div id="workorder">
                  @php  $industry_experience = json_decode($user_data->industry_experience); @endphp
                  @if(isset($industry_experience))
                  @foreach($industry_experience as $key=>$data)
                  <div class="row students-start-col">
                     <div class="col-sm-6 mt-3">
                        <div class="form-group">
                           <label for="userName" class="w-100 block text-gray-700 text-sm font-bold mb-0 text-start"><b>Industry Name</b></label><br/>
                           <input id="userName" value="{{$data->industry_name}}" name="name" type="text" class= "form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder=" - " readonly>
                        </div>
                     </div>
                     <div class="col-sm-6 mt-3">
                        <div class="form-group">
                           <label for="father_name" class="w-100 block text-gray-700 text-sm font-bold mb-0 text-start"><b>Designation</b></label>
                           <input id="father_name" value="{{$data->industry_designation}}" name="father_name" type="text" class= "form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Father Name" readonly>
                        </div>
                     </div>
                     <div class="col-sm-6 mt-3">
                        <div class="form-group">
                           <label for="mother_name" class="w-100 block text-gray-700 text-sm font-bold mb-0 text-start"><b>Salary</b></label>
                           <input name="mother_name" value="₹ {{$data->industry_salary}}" id="mother_name" type="text" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Mother Name" readonly>
                        </div>
                     </div>
                     <div class="col-sm-6 mt-3">
                        <div class="form-group">
                           <label for="email" class="w-100 block text-gray-700 text-sm font-bold mb-0 text-start"><b>Total Year of Experience</b></label><br />
                           <input type="text" id="email" value="{{$data->industry_total_year}}" name="email" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Email Address" readonly>
                        </div>
                     </div>
                  </div>
                  @endforeach
                  @else
                  <div class="row students-start-col">
                     <div class="col-sm-3 mt-3">
                        <div class="form-group">
                           <label for="userName" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start"><b>Industry Name</b></label><br/>
                           <input id="userName" value="" name="industry_name[]" type="text" class= "form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder=" - " readonly>
                        </div>
                     </div>
                     <div class="col-sm-3 mt-3">
                        <div class="form-group">
                           <label for="father_name" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start"><b>Designation</b></label>
                           <input id="father_name" value="" name="industry_designation[]" type="text" class= "form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Father Name" readonly>
                        </div>
                     </div>
                     <div class="col-sm-3 mt-3">
                        <div class="form-group">
                           <label for="mother_name" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start"><b>Salary</b></label>
                           <input name="industry_salary[]" value="" id="mother_name" type="text" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Mother Name" readonly>
                        </div>
                     </div>
                     <div class="col-sm-3 mt-3">
                        <div class="form-group">
                           <label for="email" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start"><b>Total Year of Experience</b></label><br />
                           <input type="text" id="email" value="" name="industry_total_year[]" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Email Address" readonly>
                        </div>
                     </div>
                  </div>
                  @endif
               </div>
            </div>
         </div>

    </div>
    <div class="name_line">
        <div class="user_name_jk">
            <h3 class="col-sm-6 mt-3">
                <b style="color: #fff">Permanent Address</b>
            </h3>
                <h4 class="col-sm-6 mt-3" style="padding-left: 20px;">
                    <b style="color: #fff">Current Address  </b>
                </h4>
        </div>
    </div>
        {{-- <div class="students-start"> --}}
           {{-- <div class="students-text">
              <h4 class="card-title text-start">Address</h4>
           </div> --}}
           <div class="student-parent-d">
            <div class="row students-start-col students-start">
                {{-- <h5 class="text-start"><span>Permanent Address</span></h5> --}}
                <div class="col-sm-4 mt-3">
                    <div class="form-group">
                        <label for="userName" class="w-35 block text-gray-700 text-sm font-bold mb-0 text-start"><b>Street</b></label><br/>
                        <input id="street" value="{{isset($user_address->p_street) ? $user_address->p_street : ''}}" name="street" type="text" class= "form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder=" - " readonly id="p_street">
                    </div>
                </div>
                <div class="col-sm-4 mt-3">
                    <div class="form-group">
                        <label for="father_name" class="w-100 block text-gray-700 text-sm font-bold mb-0 text-start"><b>Landmark</b></label>
                        <input id="landmark" value="{{isset($user_address->p_landmark) ? $user_address->p_landmark : ''}}" name="landmark" type="text" class= "form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Father Name" readonly>
                    </div>
                </div>
                <div class="col-sm-4 mt-3">
                    <div class="form-group">
                        <label for="mother_name" class="w-100 block text-gray-700 text-sm font-bold mb-0 text-start"><b>City/Village</b></label>
                        <input name="mother_name" value="{{isset($user_address->p_city) ? $user_address->p_city : ''}}" id="mother_name" type="text" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Mother Name" readonly>
                    </div>
                </div>
                <div class="col-sm-4 mt-3">
                    <div class="form-group">
                        <label for="email" class="w-35 block text-gray-700 text-sm font-bold mb-0 text-start"><b>State</b></label><br />
                        <input type="text" id="email" value="{{isset($user_address->p_state) ? $user_address->p_state : '' }}" name="email" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Email Address" readonly>
                    </div>
                </div>
                <div class="col-sm-4 mt-3">
                    <div class="form-group">
                        <label for="email" class="w-100 block text-gray-700 text-sm font-bold mb-0 text-start"><b>Zip Code</b></label><br />
                        <input type="text" id="email" value="{{isset($user_address->c_zipcode) ? $user_address->c_zipcode : ''}}" name="email" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Email Address" readonly>
                    </div>
                </div>
            </div>
            <div class="row students-start-col students-start">
                {{-- <h5 class="text-start"><span>Current Address</span></h5> --}}
                <div class="col-sm-4 mt-3">
                    <div class="form-group">
                        <label for="userName" class="w-35 block text-gray-700 text-sm font-bold mb-0 text-start"><b>Street</b></label>
                        <input id="userName" value="{{isset($user_address->c_street) ? $user_address->c_street : '' }}" name="name" type="text" class= "form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder=" - " readonly>
                    </div>
                </div>
                <div class="col-sm-4 mt-3">
                    <div class="form-group">
                        <label for="father_name" class="w-100 block text-gray-700 text-sm font-bold mb-0 text-start"><b>Landmark</b></label>
                        <input id="father_name" value="{{isset($user_address->c_landmark) ? $user_address->c_landmark : '' }}" name="father_name" type="text" class= "form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Father Name" readonly>
                    </div>
                </div>
                <div class="col-sm-4 mt-3">
                    <div class="form-group">
                        <label for="mother_name" class="w-100 block text-gray-700 text-sm font-bold mb-0 text-start"><b>City/Village</b></label>
                        <input name="mother_name" value="{{isset($user_address->c_city) ? $user_address->c_city : ''}}" id="mother_name" type="text" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Mother Name" readonly>
                    </div>
                </div>
                <div class="col-sm-4 mt-3">
                    <div class="form-group">
                        <label for="email" class="w-35 block text-gray-700 text-sm font-bold mb-0 text-start"><b>State</b></label>
                        <input type="text" id="email" value="{{isset($user_address->c_state) ? $user_address->c_state : ''}}" name="email" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Email Address" readonly>
                    </div>
                </div>
                <div class="col-sm-4 mt-3">
                    <div class="form-group">
                        <label for="email" class="w-100 block text-gray-700 text-sm font-bold mb-0 text-start"><b>Zip Code</b></label><br />
                        <input type="text" id="email" value="{{isset($user_address->c_zipcode) ? $user_address->c_zipcode : ''}}" name="email" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Email Address" readonly>
                    </div>
                </div>
            </div>
            </div>
        {{-- </div> --}}
     </div>

 </div>


   <div class="document-upload view-user-document">
      <div class="main-document ">
         <div class="row">
            <div class="name_line_p">

                    <h3 class="name_sk">
                        <b style="color: #fff">Document Upload</b>
                    </h3>

            </div>
            <div class="students-start">
               {{-- <div class="students-text">
                  <h4 class="card-title text-start">Document Upload</h4>
               </div> --}}
               <div class="row students-start-col">
                  <div class="mb-4 col-sm-12 col-md-5 ghijk create-edit-validation">
                     <h6>10th Marksheet</h6>
                     {{-- <input class="demo1" type="file" name="tenth_marksheet" readonly> --}}
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
                  <div class="mb-4 col-sm-12 col-md-5 ghijk create-edit-validation">
                     <h6>12th Marksheet</h6>
                     {{-- <input class="demo1" type="file" name="twelfth_marksheet" readonly/> --}}
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
                  <div class="mb-4 col-sm-12 col-md-5 ghijk create-edit-validation">
                     <h6>Aadhar Card</h6>
                     {{-- <input class="demo1" type="file" name="aadhar_card" readonly/> --}}
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
                  <div class="mb-4 col-sm-12 col-md-5 ghijk create-edit-validation">
                     <h6>Alternative Govt. ID Card</h6>
                     {{-- <input class="demo1" type="file" name="alternative_govt_id_card" readonly/> --}}
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
                  <div class="mb-4 col-sm-12 col-md-5 ghijk create-edit-validation">
                     <h6>Bank Passbook</h6>
                     {{-- <input class="demo1" type="file" name="bank_passbook" readonly/> --}}
                     @if(isset($user_data->bank_passbook))
                     @php $govt_id_exten = explode('.',$user_data->bank_passbook)@endphp
                     @if($govt_id_exten[1] != 'pdf')
                     <img src="{{$user_data->bank_passbook ? asset('assets').'/'.$user_data->bank_passbook : asset('assets/img/images.png')}}" class="rounded-circle">
                     @else
                     <img src="{{asset('assets/img/pdf_icon.png')}}" class="rounded-circle">
                     @endif
                     <a href="{{isset($user_data->bank_passbook) ? asset('assets').'/'.$user_data->bank_passbook : ''}}" class="btn btn-success mb-0 text-white mt-3" download>Download</a>
                     @endif
                  </div>
                  <div class="mb-4 col-sm-12 col-md-5 ghijk create-edit-validation">
                     <h6>Graduation / Diploma (Optional)</h6>
                     {{-- <input class="demo1" type="file" name="graduation_diploma" readonly/> --}}
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
                  <div class="mb-4 col-sm-12 col-md-5 ghijk create-edit-validation">
                     <h6>Post Graduation (Optional)</h6>
                     {{-- <input class="demo1" type="file" name="post_graduation" readonly/> --}}
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
                  <div class="mb-4 col-sm-12 col-md-5 ghijk create-edit-validation">
                     <h6>Experience Certificate (Optional)</h6>
                     {{-- <input class="demo1" type="file" name="experience_certificate" readonly/> --}}
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


                  <div class="mb-4 col-sm-12 col-md-5 ghijk create-edit-validation">
                     <h6>Salary Slip (Optional)</h6>
                     {{-- <input class="demo1" type="file" name="salary_slip" readonly/> --}}
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


                <div class="mb-4 col-sm-12 col-md-5 ghijk create-edit-validation">
                   <h6>Offer Letter (Optional)</h6>
                   {{-- <input class="demo1" type="file" name="offer_letter" readonly/> --}}
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


                <div class="mb-4 col-sm-12 col-md-5 ghijk create-edit-validation">
                   <h6>Joining Letter (Optional)</h6>
                   {{-- <input class="demo1" type="file" name="joining_letter" readonly/> --}}
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


                <div class="mb-4 col-sm-12 col-md-5 ghijk create-edit-validation">
                   <h6>Resignation Letter (Optional)</h6>
                   {{-- <input class="demo1" type="file" name="resignation_letter" readonly/> --}}
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
            </div>
            </div>
            {{-- <button class="create-edit" type="submit">Finish</button> --}}
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="remark-modal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title remark-modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        <form id="remark-form" action="{{route('jobStatusChange')}}" method="POST">
         @csrf
        <!-- Modal body -->
        <div class="modal-body">
            <input type="hidden" name="emp_name" value="{{$user->name}}">
            <input type="hidden" name="emp_id" value="{{$user->id}}">
            <input type="hidden" name="emp_email_id" value="{{$user->email}}">
            <input type="hidden" name="emp_role" value="{{$user->role}}">
            <input type="hidden" name="status" id="status" value="">
         <div class="form-group">
            <label for="remark" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start"><b>Remark</b></label>
            <textarea id="remark" name="remark" type="text" class= "w-100 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:shadow-outline" placeholder="Remark" style="border: 1px solid #cacaca;"></textarea>
         </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger close" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
      </div>
    </div>
</div>

  <div class="modal fade" id="offer-modal">
    <div class="modal-dialog modal-dialog-centered digol-pxcs">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Send Offer Letter</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        <form id="offer-form" class="">
         @csrf
        <!-- Modal body -->
        <div class="modal-body pnd-lef">
         <input type="hidden" id="emp_name" name="emp_name" value="{{$user->name}}">
         <input type="hidden" name="emp_id" value="{{$user->id}}">
         <input type="hidden" name="emp_role" value="{{$user->role}}">
         <input type="hidden" id="emp_email_id" name="emp_email_id" value="{{$user->email}}">
         <input type="hidden" id="emp_p_street" name="address1" value="{{$user_address->p_street}},{{$user_address->p_landmark}},{{$user_address->p_city}}">
         <input type="hidden" id="emp_p_street" name="address2" value="{{$user_address->p_state}}- {{$user_address->p_zipcode}}">
            <section>
                <div class="row fluse">
                   <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                      <label for="letter_iussue_date" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click">Offer letter issue  date <span class="det-alert">*</span></label><br/>
                      <input class="offer-l" id="letter_iussue_date" name="letter_iussue_date" type="date" class= "w-100 required shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder=" issue date" required>
                   </div>
                   <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                      <label for="letter_iussue_validity" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click">Offer letter issue validity date<span class="det-alert">*</span></label>
                      <input class="offer-l" id="letter_iussue_validity" name="letter_iussue_validity" type="date" class= "required w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight offer-l focus:outline-none focus:shadow-outline" placeholder="issue validity date" required>
                   </div>
                   <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                      <label for="shift" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Shift<span class="det-alert">*</span></label>
                      <select name="shift" class="time" id="shift">
                        <option value="Day Shift">Day Shift</option>
                        <option value="Night Shift">Night Shift</option>
                        </select>
                   </div>
                   <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                      <label for="Days" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click">Days<span class="det-alert">*</span></label><br />
                      <select name="Days" class="time" id="Days">
                        <option value="Monday to Friday">Monday to Friday</option>
                        <option value="Monday to Saturday">Monday to Saturday</option>
                     </select>
                   </div>
                   <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                      <label for="start_time" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click">Start time <span class="det-alert">*</span></label><br />
					  <input type="time" class="form-control offer-l" name="start_time" id="start_time"/>
                      <!--select name="start_time" class="time" id="start_time">
                        <option value="1:00 AM">1 AM</option>
                        <option value="2:00 AM">2 AM</option>
                        <option value="3:00 AM">3 AM</option>
                        <option value="4:00 AM">4 AM</option>
                        <option value="5:00 AM">5 AM</option>
                        <option value="6:00 AM">6 AM</option>
                        <option value="7:00 AM">7 AM</option>
                        <option value="8:00 AM">8 AM</option>
                        <option value="9:00 AM" selected>9 AM</option>
                        <option value="10:00 AM">10 AM</option>
                        <option value="11:00 AM">11 AM</option>
                        <option value="12:00 AM">12 AM</option>
                        <option value="1:00 PM">1 PM</option>
                        <option value="2:00 PM">2 PM</option>
                        <option value="3:00 PM">3 PM</option>
                        <option value="4:00 PM">4 PM</option>
                        <option value="5:00 PM">5 PM</option>
                        <option value="6:00 PM">6 PM</option>
                        <option value="7:00 PM">7 PM</option>
                        <option value="8:00 PM">8 PM</option>
                        <option value="9:00 PM">9 PM</option>
                        <option value="10:00 PM">10 PM</option>
                        <option value="11:00 PM">11 PM</option>
                        <option value="12:00 PM">12 PM</option>

                     </select-->

                   </div>
                   <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                      <label for="end_time" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click">End time <span class="det-alert">*</span></label><br />
					  <input type="time" class="form-control offer-l" name="end_time"  id="end_time"/>
                      <!--select name="end_time" class="time" id="end_time">
                        <option value="1:00 AM">1 AM</option>
                        <option value="2:00 AM">2 AM</option>
                        <option value="3:00 AM">3 AM</option>
                        <option value="4:00 AM">4 AM</option>
                        <option value="5:00 AM">5 AM</option>
                        <option value="6:00 AM" >6 AM</option>
                        <option value="7:00 AM">7 AM</option>
                        <option value="8:00 AM">8 AM</option>
                        <option value="9:00 AM">9 AM</option>
                        <option value="10:00 AM">10 AM</option>
                        <option value="11:00 AM">11 AM</option>
                        <option value="12:00 AM">12 AM</option>
                        <option value="1:00 PM">1 PM</option>
                        <option value="2:00 PM">2 PM</option>
                        <option value="3:00 PM">3 PM</option>
                        <option value="4:00 PM">4 PM</option>
                        <option value="5:00 PM">5 PM</option>
                        <option value="6:00 PM" selected>6 PM</option>
                        <option value="7:00 PM">7 PM</option>
                        <option value="8:00 PM">8 PM</option>
                        <option value="9:00 PM">9 PM</option>
                        <option value="10:00 PM">10 PM</option>
                        <option value="11:00 PM">11 PM</option>
                        <option value="12:00 PM">12 PM</option>
                     </select -->
                   </div>
                   <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                      <label for="month_working_hour" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click">month working hours <span class="det-alert">*</span></label><br/>
                      <input class="offer-l" id="month_working_hour" name="month_working_hour" type="number" class= "w-100 required shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight offer-l focus:outline-none focus:shadow-outline" placeholder=" per month working hours" readonly>
                   </div>
                   <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                      <label for="days_working_hour" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click">days working hours <span class="det-alert">*</span></label>
                      <input class="offer-l" id="days_working_hour" name="days_working_hour" type="number" class= "required w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight offer-l focus:outline-none focus:shadow-outline" placeholder="per days working hours " readonly>
                   </div>

                </div>
                <div class="row">

                   <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                      <label for="week_working_hour" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click">weekly working hours<span class="det-alert">*</span></label>
                      <input class="offer-l" name="week_working_hour" id="week_working_hour" type="number" class="required w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight offer-l focus:outline-none focus:shadow-outline" placeholder="weekly working hours" readonly>
                   </div>
                   <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                      <label for="hra" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click">HRA<span class="det-alert"></span></label><br/>
                      <input class="offer-l" id="hra" name="hra" type="number" class= "w-100 required shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight offer-l focus:outline-none focus:shadow-outline" placeholder="HRA" value="0">
                      @error('hra')
                        <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                   </div>
                   <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                      <label for="Designation" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click">Designation<span class="det-alert">*</span></label>
                      <input class="offer-l" id="Designation" name="Designation" type="text" class= "required w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight offer-l focus:outline-none focus:shadow-outline" placeholder="Designation" required>
                   </div>

                   <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                      <label for="basic" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click">Basic<span class="det-alert">*</span></label><br />
                      <input class="offer-l" type="number" name="basic" class="required w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight offer-l focus:outline-none focus:shadow-outline" placeholder="Basic" id="basic" required>
                   </div>

                </div>
                <div class="row">

                   <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                      <label for="monthly_leave" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click">Monthly leave<span class="det-alert">*</span></label><br />
                      <input class="offer-l" type="number" name="monthly_leave" class="required w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight offer-l focus:outline-none focus:shadow-outline" placeholder="Monthly leave" id="monthly_leave" required>
                   </div>
                   <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                      <label for="yearly_leave" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click">Yearly leave<span class="det-alert">*</span></label><br/>
                      <input class="offer-l" id="yearly_leave" name="yearly_leave" type="number" class= "w-100 required shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight offer-l focus:outline-none focus:shadow-outline" placeholder="Yearly leave" readonly>
                   </div>

                   <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                      <label for="conveyance_allow" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click">Conveyance Allowance<span class="det-alert">*</span></label>
                      <input class="offer-l" id="conveyance_allow" name="conveyance_allow" type="number" class= "required w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight offer-l focus:outline-none focus:shadow-outline" placeholder="Conveyance Allowance" required>
                   </div>
                   <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                      <label for="special_allow" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click">Special Allowance<span class="det-alert">*</span></label>
                      <input class="offer-l" name="special_allow" id="special_allow" type="number" class="required w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight offer-l focus:outline-none focus:shadow-outline" placeholder="Special Allowance" required>
                   </div>
                </div>
                <div class="row">


                   <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                      <label for="Pf1" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click">PF (Company’s Share)<span class="det-alert">*</span></label><br/>
                      <input class="offer-l" id="Pf1" name="Pf1" type="number" class= "w-100 required shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight offer-l focus:outline-none focus:shadow-outline" placeholder="PF (Employee’s Share)" required>
                   </div>
                   <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                      <label for="Pf2" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click">PF (Employer’s Share)<span class="det-alert">*</span></label>
                      <input class="offer-l" id="Pf2" name="Pf2" type="number" class= "required w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight offer-l focus:outline-none focus:shadow-outline" placeholder="PF (Employer’s Share)" required>
                   </div>
                   <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                      <label for="mobile_allow" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click">Mobile Allowance<span class="det-alert"></span></label>
                      <input class="offer-l" name="mobile_allow" id="mobile_allow" type="number" class="required w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight offer-l focus:outline-none focus:shadow-outline" placeholder="Mobile Allowance" value="0">
                   </div>
                   <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                      <label for="insurance_benefits" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click">Insurance benefits<span class="det-alert">*</span></label><br />
                      <input class="offer-l" type="number" name="insurance_benefits" class="required w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight offer-l focus:outline-none focus:shadow-outline" placeholder="Insurance benefits" id="insurance_benefits" required>
                   </div>
                </div>
                <div class="row">


                   <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                      <label for="gratuity" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click">Gratuity<span class="det-alert"></span></label><br/>
                      <input class="offer-l" id="gratuity" name="gratuity" type="number" class= "w-100 required shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight offer-l focus:outline-none focus:shadow-outline" placeholder="Gratuity" value="0">
                   </div>
                   <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                      <label for="employee_refarance" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click">Employee refarance<span class="det-alert"></span></label>
                      <input class="offer-l" id="employee_refarance" name="employee_refarance" type="text" class= "required w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight offer-l focus:outline-none focus:shadow-outline" placeholder="employee refarance">
                   </div>
                   <div class="mb-3 col-sm-12 col-md-3 create-edit-validation">
                      <label for="gross_salary" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start click">GROSS SALARY<span class="det-alert"></span></label><br />
                      <input class="offer-l" type="number" name="gross_salary" class="required w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight offer-l focus:outline-none focus:shadow-outline" placeholder="GROSS SALARY" id="gross_salary" value="0">
                   </div>
                </div>
                <div class="row">

               </div>
             </section>

        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger close" data-dismiss="modal">Close</button>
          <button type="submit" class="create-btn btn btn-primary">Create </button>
        </div>
      </form>
      <div class="modal-body pnd-lef d-none pdf-view">
         <input type="hidden" id="file_name" value="">
         <iframe src="" id="pdf-iframe" style="width:100%; height: 480px;">
         </iframe>
         <div class="modal-footer">
          <button type="button" class="btn btn-danger back-pdf">Back</button>
          <button type="button" class="confirm-btn btn btn-primary">Send</button>
        </div>
      </div>
      </div>
    </div>
  </div>

@include('components.include.footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
<script type="text/javascript">
   $(document).ready(function() {
      var form = $("#offer-form");
   form.validate();
      $(document).on('click', '.reject-user-btn', function() {
         $('#remark-form').trigger('reset');
         $('#status').val($(this).attr('status'));
         $('.remark-modal-title').text('Reject User');
         $('#remark-modal').modal('show');
      });
      $(document).on('click', '.detect-user-btn', function() {
         $('#remark-form').trigger('reset');
         $('#status').val($(this).attr('status'));
         $('.remark-modal-title').text('Defect User');
         $('#remark-modal').modal('show');
      });
      $(document).on('click', '.aprove-user', function() {
         $('#remark-form').trigger('reset');
         $('#status').val($(this).attr('status'));
         $('.remark-modal-title').text('Aprove User');
         $('#remark-modal').modal('show');
      });
      $(document).on('click', '.send-letter', function() {
         $('#offer-modal').modal('show');
         $('.pdf-view').addClass('d-none');
         $('#offer-form').removeClass('d-none');
         $('#offer-form').trigger('reset');
         if($('#shift').val() != '' && $('#Days').val() != '' && $('#start_time').val() != '' && $('#end_time').val() != ''){
            if($('#Days').val() == 'Monday to Friday'){
               var days = 5;
               var month_days = 22;
            }else{
               var days = 6;
               var month_days = 26;
            }
            var hours = parseInt($("#end_time").val().split(':')[0], 10) - parseInt($("#start_time").val().split(':')[0], 10);
            if(hours < 0) hours = 24 + hours;
               $('#days_working_hour').val(Math.abs(hours));
               $('#month_working_hour').val(Math.abs(month_days*hours));
               $('#week_working_hour').val(Math.abs(days*hours));

         }
      });
      $(document).on('click', '.close', function() {
         $('#remark-modal').modal('hide');
         $('#offer-modal').modal('hide');
      });
      $(document).on('keyup', '#monthly_leave', function() {
         var leave = parseInt($(this).val()) * 12;
         $('#yearly_leave').val(leave);
      });

      $(document).on('submit', '#offer-form', function(event) {
        event.preventDefault();
         $.ajax({
                type: 'POST',
                url: "{{ route('sendOfferLetter') }}",
                data: $('#offer-form').serialize(),
                dataType: 'json',
                success: function(data) {
                  $('#offer-form').addClass('d-none');
                  $('#pdf-iframe').attr('src',data.url);
                  $('#file_name').val(data.file);
                  $('.pdf-view').removeClass('d-none');
                }
            });
      });

      $(document).on('click', '.confirm-btn', function() {
         $.ajax({
                type: 'POST',
                url: "{{ route('mailOfferLetter') }}",
                data: {
                  "file": $('#file_name').val(),
                  'name': $('#emp_name').val(),
                  'email': $('#emp_email_id').val(),
                  'role' : $('#role').val(),
                  'street' : $('#emp_p_street').val(),
                  'landmark' : $('#emp_p_landmark').val(),
                  "_token": "{{ csrf_token() }}"
               },
                dataType: 'json',
                success: function(data) {
                  $('#offer-modal').modal('hide');
                }
         });
      });

      $(document).on('click', '.back-pdf', function() {
         $('.pdf-view').addClass('d-none');
         $('#offer-form').removeClass('d-none');
      });

      if($('#shift').val() != '' && $('#Days').val() != '' && $('#start_time').val() != '' && $('#end_time').val() != ''){
           if($('#Days').val() == 'Monday to Friday'){
             var days = 5;
             var month_days = 22;
           }else{
             var days = 6;
             var month_days = 26;
           }
           var hours = parseInt($("#end_time").val().split(':')[0], 10) - parseInt($("#start_time").val().split(':')[0], 10);
            if(hours < 0) hours = 24 + hours;
            $('#days_working_hour').val(Math.abs(hours));
            $('#month_working_hour').val(Math.abs(month_days*hours));
            $('#week_working_hour').val(Math.abs(days*hours));

      }

      $(document).on('change', '#shift,#Days,#start_time,#end_time', function() {
         if($('#shift').val() != '' && $('#Days').val() != '' && $('#start_time').val() != '' && $('#end_time').val() != ''){
           if($('#Days').val() == 'Monday to Friday'){
             var days = 5;
             var month_days = 22;
           }else{
             var days = 6;
             var month_days = 26;
           }
           var hours = parseInt($("#end_time").val().split(':')[0], 10) - parseInt($("#start_time").val().split(':')[0], 10);
            if(hours < 0) hours = 24 + hours;
            $('#days_working_hour').val(Math.abs(hours));
            $('#month_working_hour').val(Math.abs(month_days*hours));
            $('#week_working_hour').val(Math.abs(days*hours));
         }


      });

   });
</script>
