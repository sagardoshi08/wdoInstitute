@include('components.include.frontendheader')
<!-- <link id="pagestyle" href="{{asset('assets/css/material-dashboard.css?v=3.0.0')}}" rel="stylesheet"> -->
    <link id="pagestyle" href="{{asset('css/custom.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="qrk8nyBiT5pUtzKXd944jlLGczNMeL3V712VXHCj">
        <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
        <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
            <title>

            </title>

            <!-- Metas -->
                <!--Fonts and icons-->
                <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700">
            <!-- Nucleo Icons -->
            <link href="{{asset('assets/css/nucleo-icons.css')}}" rel="stylesheet">
            <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet">
            <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
            <!-- <link id="pagestyle" href="{{asset('assets/css/material-dashboard.css?v=3.0.0')}}" rel="stylesheet"> -->
            <link id="pagestyle" href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer=""></script>

<style type="text/css">
   img {
   display: block;
   max-width: 100%;
   }
</style>
 @if (session('message'))
   <div class="row">
         <div class="alert alert-success alert-dismissible text-white" role="alert">
            <span class="text-sm">{{ Session::get('message') }}</span>
            <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
   </div>
   @endif
   @if (Session::has('delete'))
   <div class="row">
         <div class="alert alert-danger alert-dismissible text-white" role="alert">
            <span class="text-sm">{{ Session::get('delete') }}</span>
            <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
   </div>
   @endif
<!--<form id="contact" action="{{route('applyJobCreate')}}" method="POST" enctype="multipart/form-data">
   @csrf
   <div>
   <input type="hidden" name="job_status" value="Pending">
   <h3>

   </h3>
   <section> -->
   <style type="text/css">
   img {
   display: block;
   max-width: 100%;
   }
</style>
<div class="container-fluid laipified">
   <form id="contact" action="{{route('applyJobCreate')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div>
      <input type="hidden" name="job_status" value="Pending">
      <h3>
         <div class="media">
               <div class="bd-wizard-step-icon"><i class="mdi mdi-account-outline"></i></div>
               <div class="media-body">
                  <div class="bd-wizard-step-title abc">Personal Details</div>
                  {{--
                  <div class="bd-wizard-step-subtitle">Step 1</div>
                  --}}
               </div>

         </div>
      </h3>

      <section>
         <div class="det-p total-ex">
            <div class="row personal-det-p">
               <h4 class="section-heading address-det">Enter your Personal details </h4>
               <div class="mb-4 col-sm-12 col-md-4 create-edit-validation personal-detail">
                  <label for="userName" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Name <span class="det-alert">*</span></label>
                  <input id="userName" name="name" type="text" class= "w-100 required shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight       focus:outline-none focus:shadow-outline" placeholder="Enter Name">
               </div>
               <div class="mb-4 col-sm-12 col-md-4 create-edit-validation personal-detail">
                  <label for="father_name" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Father Name <span class="det-alert">*</span></label>
                  <input id="father_name" name="father_name" type="text" class= "required w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Father Name">
               </div>
               <div class="mb-4 col-sm-12 col-md-4 create-edit-validation personal-detail">
                  <label for="mother_name" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Mother Name<span class="det-alert">*</span></label>
                  <input name="mother_name" id="mother_name" type="text" class="required w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Mother Name">
               </div>
            </div>
            <div class="row personal-det-p">
               <div class="mb-4 col-sm-12 col-md-4 create-edit-validation personal-detail">
                  <label for="email" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">User Id <span class="det-alert">*</span></label>
                  <input type="text" name="email" class="required w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Email Address" id="email">
               </div>
               <div class="mb-4 col-sm-12 col-md-4 create-edit-validation personal-detail">
                  <label for="password" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Password <span class="det-alert">*</span></label>
                  <input type="password" class="required w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter Password" id="password" name="password" id="password">
                  <i class="far fa-eye" id="togglePassword" style="position: absolute; cursor: pointer; top: 49px; right: 27px;"></i>
               </div>
               <div class="mb-4 col-sm-12 col-md-4 create-edit-validation personal-detail">
                  <label for="confirm_password" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Confirm Password <span class="det-alert">*</span></label>
                  <input type="password" class="required w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter Confirm Password" name="confirm_password">
               </div>
               <div class="mb-4 col-sm-12 col-md-4 create-edit-validation personal-detail">
                  <label for="phone" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Phone Number <span class="det-alert">*</span></label>
                  <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="required w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter Phone Number" name="phone_number" min="10" maxlength="10" pattern="\d*">
               </div>
               <div class="mb-4 col-sm-12 col-md-4 create-edit-validation personal-detail">
                  <label for="alternate-phone" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Alternate Phone Number <span class="det-alert">*</span></label>
                  <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="required w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Alternate Phone Number" name="alternate_phone_number" min="10" maxlength="10" pattern="\d*">
               </div>
               <div class="mb-4 col-sm-12 col-md-4 create-edit-validation personal-detail">
                  <label for="dob" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Date Of Birth <span class="det-alert">*</span></label>
                  <input class="form-control required w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 text-mjesti leading-tight focus:outline-none focus:shadow-outline" type="date" onfocus="focused(this)" onfocusout="defocused(this)" name="date_of_birth">
               </div>
            </div>
            <div class="row personal-det-p">


               <div class="mb-4 col-sm-12  col-md-4 create-edit-validation">
                  <label for="role" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Role<span class="det-alert">*</span></label>
                  <select name="role" class="required w-100 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                     <option value="">-- Select --</option>
                     <option value="Admin">Admin</option>
                     <option value="Manager">Manager</option>
                     <option value="Team Leader">Team Leader</option>
                     <option value="Employee">Employee</option>
                     <option value="Other">Other</option>
                  </select>
               </div>
               <div class="mb-4 col-sm-12 col-md-4 create-edit-validation personal-detail">
                  <label for="profile_photo" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Profile Image</label>
                  <div class="d-flex align-items-center">
                     <img src="{{asset('assets/img/images.png')}}" class="card-img-top preview-crop-image rounded-circle" style="width:15%" alt="profile">
                     <input type="file" class="image w-100 shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="profile_photo text-start" name="profile_photo">
                     <input type="hidden" name="crope_img" id="preview-crop-image" value="" accept="image/jpeg,image/jpg,image/png,application/pdf"
                        >
                  </div>
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
      <div class="det-p total-ex">
         <div class="row personal-det-p">
            <h3 class="text-start qualification">Qualification Details</h3>
            <h6 class="text-start qualification">10th</h6>
            <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
               <label for="board10-name" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start paddngmaeg">Board Name <span class="det-alert">*</span></label>
               <input type="text" class="required w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none           focus:shadow-outline" placeholder="Board Name" name="tenth_board_name">
            </div>
            <div class="mb-4 col-sm-12 col-md-3 create-edit-validation" >
               <label for="q-year" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start paddngmaeg">Year<span class="det-alert">*</span></label>
               <input type="text" class="required w-100 shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Qualification Year" name="twelfth_qua_year">
               <!-- <select name="" class="time" >
                <option value="1985">1985</option>
                <option value="1986">1986</option>
                <option value="1987">1987</option>
                <option value="1988">1988</option>
                <option value="1989">1989</option>
                <option value="1990">1990</option>
                <option value="1991">1991</option>
                <option value="1992">1992</option>
                <option value="1993" selected>1993</option>
                <option value="1994">1994</option>
                <option value="1995">1995</option>
                <option value="1996">1996</option>
                <option value="1997">1997</option>
                <option value="1998">1998</option>
                <option value="1999">1999</option>
                <option value="2000">2000</option>
                <option value="2001">2001</option>
                <option value="2002">2002</option>
                <option value="2003">2003</option>
                <option value="2004">2004</option>
                <option value="2005">2005</option>
                <option value="2006">2006</option>
                <option value="2007">2007</option>
                <option value="2008">2008</option>
                <option value="2009">2009</option>
                <option value="2010">2010</option>
                <option value="2011">2011</option>
                <option value="2012">2012</option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>


             </select> -->

            </div>
            <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
               <label for="q-percentage" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start paddngmaeg">Percentage<span class="det-alert">*</span></label>
               <input type="text" class="required w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Percentage" name="tenth_percentage">
            </div>
            <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
               <label for="r-number" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start paddngmaeg">Roll No<span class="det-alert">*</span></label>
               <input type="text" class="required w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Roll Number" name="tenth_roll_no">
            </div>
         </div>
         <div class="row personal-det-p" >
            <h6 class="text-start qualification">12th</h6>
            <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
               <label for="board-name" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start paddngmaeg">Board Name <span class="det-alert">*</span></label>
               <input type="text" class="required w-100 shadow appearance-none border  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Board Name" name="twelfth_board_name">
            </div>
            <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
               <label for="q-year" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start paddngmaeg">Year<span class="det-alert">*</span></label>
               <input type="text" class="required w-100 shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Qualification Year" name="twelfth_qua_year">
               {{-- <select id='date-1'></select> --}}
            </div>
            <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
               <label for="q-percentage" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start paddngmaeg">Percentage <span class="det-alert">*</span></label>
               <input type="text" class="required w-100 shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Percentage" name="twelfth_percentage">
            </div>
            <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
               <label for="r-number" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start paddngmaeg">Roll No <span class="det-alert">*</span></label>
               <input type="text" class="required w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Roll Number" name="twelfth_roll_no">
            </div>
         </div>
         <div class="row personal-det-p" >
            <h6 class="text-start qualification">University Qualification </h6>
            <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
               <label for="uni-name" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start paddngmaeg">University Name</label>
               <input type="text" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="University" name="university_name">
            </div>
            <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
               <label for="q-year" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start paddngmaeg">Year</label>
               <input type="text" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Qualification Year"name="university_qua_year">
               {{-- <select id='date-dropdown'></select> --}}
            </div>
            <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
               <label for="q-percentage" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start paddngmaeg">Percentage</label>
               <input type="text" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Percentage" name="university_percentage">
            </div>
            <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
               <label for="r-number" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start paddngmaeg">Roll No</label>
               <input type="text" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Roll Number" name="university_roll_no">
            </div>
         </div>
         <div class="row personal-det-p">
            <h6 class="text-start qualification">Other Qualification (Optional)</h6>
            <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
               <label for="uni-name" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start paddngmaeg">University Name</label>
               <input type="text" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="University" name="other_university_name">
            </div>
            <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
               <label for="q-year" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start paddngmaeg">Year</label>
               <input type="text" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Qualification Year"name="other_university_qua_year">
               {{-- <select id='date-dropdown'></select> --}}
            </div>
            <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
               <label for="q-percentage" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start paddngmaeg">Percentage</label>
               <input type="text" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Percentage" name="other_university_percentage">
            </div>
            <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
               <label for="r-number" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start paddngmaeg">Roll No</label>
               <input type="text" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Roll Number" name="other_university_roll_no">
            </div>
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
      <div class="det-p total-ex">
         <div class="content-wrapper">
            <h4 class="section-heading personal-det-p qualification">Enter your Address details </h4>
            <div class="row personal-det-p">
               <h5 class="permanent">Permanent Address</h5>
               <div class="mb-4 col-sm-7 col-md-7 create-edit-validation">
                  <label for="permanent-address" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start paddngmaeg">Street<span class="det-alert">*</span></label>
                  <input type="text" class="permanent_address w-100 shadow required appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-100" placeholder="Street" name="p_street" id="p_street">
                  @error('current_address') <span class="text-danger">{{ $message }}</span>@enderror
               </div>
               <div class="mb-4 col-sm-5 col-md-5 create-edit-validation">
                  <label for="landmark" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start paddngmaeg">Landmark<span class="det-alert">*</span></label>
                  <input type="text" id="p_landmark" class="form-control street w-100 required shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-100 " name="p_landmark">
               </div>
            </div>
            <div class="row personal-det-p">
               <div class="form-group col-md-4 create-edit-validation">
                  <label for="" class="text-sm text-gray-700 text-sm font-bold mb-2 qualification">City/Village<span class="det-alert">*</span></label>

                  <input type="text" name="p_city" id="p_city" class="form-control border py-2 px-3 required" placeholder="City/Village">
               </div>
               <div class="form-group col-md-4 create-edit-validation">
<!--
                  <label for="p_state" class="sr-only">State<span class="det-alert">*</span></label><br> -->
                  <label for=" Number" class="text-sm">State<span class="det-alert">*</span></label>
                  <select data-show-subtext="true" data-live-search="true" class="form-control border rounded text-gray-700 text-sm font-bold mb-2 color" name="p_state" id="p_state">
                        <option data-tokens="">State</option>
                        @foreach($state as $data)
                        <option data-tokens="{{$data->state}}">{{$data->state}}</option>
                        @endforeach
                  </select>
               </div>
               <div class="form-group col-md-4 create-edit-validation">

                  <!-- <label for="zipcode" class="sr-only">Zip Code<span class="det-alert">*</span></label><br> -->
                  <label for="zipCode" class="text-sm">Zip Code<span class="det-alert">*</span></label>
                  <input type="number" name="p_zipcode" id="p_zipcode" class="form-control border py-2 px-3 required" placeholder="Zip Code">
               </div>
            </div>
            <div class="row personal-det-p">
               <div class="form-group mt-2 mb-2 col-sm-7 col-md-7 create-edit-validation  qualification">
                  <input type="checkbox" class="copy-address"> Same as permanent address
               </div>
            </div>
            <div class="row personal-det-p">
               <h5 class="permanent">Current Address</h5>
               <div class="mb-4 col-sm-7 col-md-7 create-edit-validation">
                  <label for="Current Address" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start paddngmaeg">Street</label>
                  <input type="text" class="permanent_address w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-100" placeholder="Street" id="c_street" name="c_street">
                  @error('permanent_address') <span class="text-danger">{{ $message }}</span>@enderror
               </div>
               <div class="mb-4 col-sm-5 col-md-5 create-edit-validation">
                  <label for="landmark" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start paddngmaeg">Landmark</label>
                  <input type="text" id="c_landmark" class="form-control street mb-2 w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-100" name="c_landmark">
               </div>
               <div class="row">
                  <div class="form-group col-md-4 create-edit-validation">
                     <label for="" class="text-sm text-gray-700 text-sm font-bold mb-2 qualification">City/Village</label>

                     <input type="text" name="c_city" id="c_city" class="form-control border py-2 px-3" placeholder="City/Village">
                  </div>
                  <div class="form-group col-md-4 create-edit-validation">

                     <!-- <label for="designation" class="sr-only">State</label><br> -->
                     <label for=" Number" class="text-sm">State<span class="det-alert">*</span></label>
                     <select data-show-subtext="true" data-live-search="true" class="form-control border rounded text-gray-700 text-sm font-bold mb-2 color text-majesti" name="c_state" id="c_state">
                        <option data-tokens="">State</option>
                        @foreach($state as $data)
                        <option data-tokens="{{$data->state}}">{{$data->state}}</option>
                        @endforeach
                  </select>
                  </div>
                  <div class="form-group col-md-4 create-edit-validation">

                     <!-- <label for="zipcode" class="sr-only">Zip Code</label><br> -->
                     <label for="zipCode" class="text-sm">Zip Code<span class="det-alert">*</span></label>
                     <input type="number" name="c_zipcode" id="c_zipcode" class="form-control border py-2 px-3" placeholder="Zip Code">
                  </div>
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
      <div class="det-p total-ex">
      <div class="row personal-det-p">
      <h3 class="text-start qualification">Industry Experience</h3>
      <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
      <label for="industry-name" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start paddngmaeg">Industry Name</label>
      <input type="text" name="industry_name[]" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Industry Name">
      </div>
      <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
      <label for="indus-designation" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start paddngmaeg">Designation</label>
      <input type="text" name="industry_designation[]" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Designation">
      </div>
      <div class="mb-4 col-sm-12 col-md-3 create-edit-validation">
      <label for="indus-salary" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start paddngmaeg">Salary</label>
      <input type="text" name="industry_salary[]" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Salary">
      </div>
      <div class="mb-4 col-sm-12 col-md-3 total-exp-field create-edit-validation">
      <label for="indus-experience" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start paddngmaeg">Total Year of Experience</label>
      <div class="d-flex">
      <input type="button" value="-" class="qty-minus rounded border-0 bg-dark text-white w-25 mx-n1">
      <input type="number" name="industry_total_year[]" class="w-100 industry-exp shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Total Experience" value="0" class="qty">
      <input type="button" value="+" class="qty-plus rounded border-0 bg-dark text-white w-25 mx-n1">
      </div>
      </div>
      </div>
      </div>
      </div>
      <div class="det-p ">
      <button type="button" class="btn add-indus btn-sm icon-btn ms-2 mb-2 personal-det-p" style="margin-top:10px;">
      <i class="fa fa-plus"></i>&nbsp; Add New Industry Experience
      </button>
      </div>
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
      <div class="main-document upload">
      <div class="det-p">
      <div class="row creat-start-ghrt  personal-det-p upload">
      <h3 class="text-start qualification">Document Upload</h3>
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
      <div class="det-p">
      <div class="row gradu-title personal-det-p">
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
      <button class="create-edit panditpera" type="submit">Finish</button>
      </div>
      </section>
      </div>
      </div>
      </div>
   </form>

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
</div>
@include('components.include.backendfooter')
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.js"></script>
<script src="{{asset('assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/additional-methods.js"></script>
<script>
   var form = $("#contact");
   form.validate({
       errorPlacement: function errorPlacement(error, element) { element.after(error); },
       rules: {
         email: {
               email: true,
               remote: {
                  url: "{{route('JobEmailValidation')}}",
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
                             <label for="industry-name" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Industry Name:</label>
                             <input type="text" name="industry_name[]" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Industry Name">
                          </div>
                          <div class="mb-4 col-sm-12 col-md-3">
                             <label for="indus-designation" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Designation:</label>
                             <input type="text" name="industry_designation[]" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Designation">
                          </div>
                          <div class="mb-4 col-sm-12 col-md-3">
                             <label for="indus-salary" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Salary:</label>
                             <input type="text" name="industry_salary[]" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Salary">
                          </div>
                          <div class="mb-4 col-sm-12 col-md-3 total-exp-field ">
                             <label for="indus-experience" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Total Year of Experience:</label>
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
<script>
    function myFunction() {
      var x = document.getElementById("myInput");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<script>
    const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#password');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>
