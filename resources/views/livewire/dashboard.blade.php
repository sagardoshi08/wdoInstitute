<title>
    Wdo Institution/World Developement Opportunities
</title>
<div>
   <!-- Navbar -->
   <!-- End Navbar -->
   <div class="container-fluid py-4">
      @if (Session::has('status'))
      <div class="alert alert-success alert-dismissible text-white" role="alert">
         <span class="text-sm">{{ Session::get('status') }}</span>
         <button type="button" class="btn-close text-lg py-3 opacity-10"
            data-bs-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
      </div>
      @endif
      @if (auth()->user()->role == 'super_admin')
      <!-- New Dashboard Starts -->
      <div class="main-dashboard mb-5">
         <div class="main-dashboard-inner">
            <div class="shadow-no" id="dashboard-cards">
               <nav class="dash-btn">
                  <div class="nav nav-tabs mb-3 accordion-item" id="nav-tab" role="tablist">
                     <button class="nav-link active nav-button " id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-basic" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                        <!-- div class="btn-detail">   -->
                        <span> Basic Submission</span>
                        <bdi>47</bdi>
                        <!--  </div> -->
                        <!--  <i class="fa fa-bar-chart" aria-hidden="true"></i> -->
                        {{-- <img src="assets/img/spreadsheet.png" alt="" class="subscription-back-img"> --}}
                     </button>
                     <button class="nav-link nav-button " id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-college" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                     <span> College Level</span>
                     <bdi>273</bdi>
                     {{-- <img src="assets/img/graduating-student.png" alt="" class="college-back-img"> --}}
                     </button>
                     <button class="nav-link nav-button " id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-nsp" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                     <span> NSP Level</span>
                     <bdi>290</bdi>
                     {{-- <img src="assets/img/images-removebg.png" alt="" class="removebg-back-img"> --}}
                     </button>
                     <button class="nav-link nav-button" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-bank" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                     <span> Bank Level</span>
                     <bdi>45</bdi>
                     {{-- <img src="assets/img/mobile-banking.png" alt="" class="banklevel-back-img"> --}}
                     </button>
                     <button class="nav-link nav-button " id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-status" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                     <span>PFM STATUS</span>
                     <bdi>354</bdi>
                     {{-- <img src="assets/img/payment-security.png" alt="" class="creditcard-back-img"> --}}
                     </button>
                     <button class="nav-link nav-button" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-payment" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                     <span>Payment</span>
                     <bdi>2010</bdi>
                     {{-- <img src="assets/img/payment-system.png" alt="" class="payment-back-img"> --}}
                     </button>
                  </div>
               </nav>
               <div class="tab-content tabs-body p-3 border" id="nav-tabContent">
                  <div class="tab-pane fade active show" id="nav-basic" role="tabpanel" aria-labelledby="nav-basic-tab">
                     <div class="accordion-body">
                        <!--- Repeatable part -->
                        <div class="class-action shadow cl-action1 cursor-pointer">
                           <h3 class="btn-count-1">90</h3>
                           <div class=" action-name">
                              Simple Registration
                              {{-- <img src="assets/img/edit.png" alt="" class="simpal-registration">
                              <img src="assets/img/edit1.png" alt="" class="simpal-registration-img"> --}}
                           </div>
                        </div>
                        <!--- Repeatable part -->
                        <!--- Repeatable part -->
                        <div class="class-action shadow cl-action2 cursor-pointer">
                           <h3 class="btn-count-1">10</h3>
                           <div class=" action-name">
                              NSP  Registration
                              {{-- <img src="assets/img/bill.png" alt="" class="nsp-registration">
                              <img src="assets/img/bill1.png" alt="" class="nsp-registration-img"> --}}
                           </div>
                        </div>
                        <!--- Repeatable part -->
                        <!--- Repeatable part -->
                        <div class="class-action shadow cl-action3 cursor-pointer">
                           <h3 class="btn-count-2">60</h3>
                           <div class="action-name">
                              Document Upload
                           </div>
                        </div>
                        <!--- Repeatable part -->
                        <!--- Repeatable part -->
                        <div class="class-action shadow cl-action4 cursor-pointer">
                           <h3 class="btn-count-3">1</h3>
                           <div class=" action-name">
                              Final Checking
                           </div>
                        </div>
                        <!--- Repeatable part -->
                        <!--- Repeatable part -->
                        <div class="class-action shadow  cl-action5 cursor-pointer">
                           <h3 class="btn-count-3">1</h3>
                           <div class="action-name">
                              Final Submission
                           </div>
                        </div>
                        <!--- Repeatable part -->
                     </div>
                  </div>
                  <div class="tab-pane fade" id="nav-college" role="tabpanel" aria-labelledby="nav-college-tab">
                     <div class="accordion-body">
                        <!--- Repeatable part -->
                        <div class="class-action shadow cl-action1 cursor-pointer">
                           <h3 class="">13</h3>
                           <div class=" action-name btn-de">
                              Collage Pending
                           </div>
                        </div>
                        <!--- Repeatable part -->
                        <!--- Repeatable part -->
                        <div class="class-action shadow cl-action2 cursor-pointer">
                           <h3 class="btn-count-1">3</h3>
                           <div class="action-name">
                              Collage Approve
                           </div>
                        </div>
                        <!--- Repeatable part -->
                        <!--- Repeatable part -->
                        <div class="class-action shadow cl-action3 cursor-pointer">
                           <h3 class="btn-count-2">30</h3>
                           <div class="action-name">
                              Collage Defact
                           </div>
                        </div>
                        <!--- Repeatable part -->
                        <!--- Repeatable part -->
                        <div class="class-action shadow cl-action4 cursor-pointer">
                           <h3 class="btn-count-3">20</h3>
                           <div class=" action-name">
                              Collage Reject
                           </div>
                        </div>
                        <!--- Repeatable part -->
                     </div>
                  </div>
                  <div class="tab-pane fade" id="nav-nsp" role="tabpanel" aria-labelledby="nav-nsp-tab">
                     <div class="accordion-body">
                        <!--- Repeatable part -->
                        <div class="class-action shadow cl-action1 cursor-pointer">
                           <h3 class="btn-count-3">20</h3>
                           <div class=" action-name">
                              NSP Pending
                           </div>
                        </div>
                        <!--- Repeatable part -->
                        <!--- Repeatable part -->
                        <div class="class-action shadow cl-action2 cursor-pointer">
                           <h3 class="btn-count-3 ">20</h3>
                           <div class=" action-name">
                              NSP Approve
                           </div>
                        </div>
                        <!--- Repeatable part -->
                        <!--- Repeatable part -->
                        <div class="class-action shadow cl-action3 cursor-pointer">
                           <h3 class="btn-count-3">20</h3>
                           <div class="action-name">
                              NSP Defact
                           </div>
                        </div>
                        <!--- Repeatable part -->
                        <!--- Repeatable part -->
                        <div class="class-action shadow cl-action4 cursor-pointer">
                           <h3 class="btn-count-3">20</h3>
                           <div class="action-name">
                              NSP Reject
                           </div>
                        </div>
                        <!--- Repeatable part -->
                     </div>
                  </div>
                  <div class="tab-pane fade" id="nav-bank" role="tabpanel" aria-labelledby="nav-bank-tab">
                     <div class="accordion-body">
                        <!--- Repeatable part -->
                        <div class="class-action shadow cl-action1 cursor-pointer">
                           <h3 class="btn-count-3">20</h3>
                           <div class="action-name">
                              Bank Under Process
                           </div>
                        </div>
                        <!--- Repeatable part -->
                        <!--- Repeatable part -->
                        <div class="class-action shadow cl-action2">
                           <h3 class="btn-count-3">20</h3>
                           <div class="action-name cursor-pointer">
                              Bank Account no wrong
                           </div>
                        </div>
                        <!--- Repeatable part -->
                        <!--- Repeatable part -->
                        <div class="class-action shadow cl-action3 cursor-pointer">
                           <h3 class="btn-count-3">20</h3>
                           <div class="action-name">
                              Bank Update Required
                           </div>
                        </div>
                        <!--- Repeatable part -->
                        <!--- Repeatable part -->
                        <div class="class-action shadow cl-action4 cursor-pointer">
                           <h3 class="btn-count-3">20</h3>
                           <div class=" action-name">
                              Bank Verification Pending
                           </div>
                        </div>
                        <!--- Repeatable part -->
                        <!--- Repeatable part -->
                        <div class="class-action shadow cl-action5 cursor-pointer">
                           <h3 class="btn-count-3">20</h3>
                           <div class="action-name">
                              Bank ac Update successfully
                           </div>
                        </div>
                        <!--- Repeatable part -->
                     </div>
                  </div>
                  <div class="tab-pane fade" id="nav-status" role="tabpanel" aria-labelledby="nav-payment-tab">
                     <div class="accordion-body">
                        <!--- Repeatable part -->
                        <div class="class-action shadow cl-action1 cursor-pointer">
                           <h3 class="btn-count-3">20</h3>
                           <div class="action-name">
                              No Record Found
                           </div>
                        </div>
                        <!--- Repeatable part -->
                        <!--- Repeatable part -->
                        <div class="class-action shadow cl-action2 cursor-pointer">
                           <h3 class="btn-count-3">20</h3>
                           <div class="action-name">
                              Payment not Initiate
                           </div>
                        </div>
                        <!--- Repeatable part -->
                        <!--- Repeatable part -->
                        <div class="class-action shadow cl-action3 cursor-pointer">
                           <h3 class="btn-count-3">20</h3>
                           <div class="action-name">
                              Under Process Central Level
                           </div>
                        </div>
                        <!--- Repeatable part -->
                        <!--- Repeatable part -->
                        <div class="class-action shadow cl-action4 cursor-pointer">
                           <h3 class="btn-count-3">20</h3>
                           <div class="action-name">
                              State Level Failed
                           </div>
                        </div>
                        <!--- Repeatable part -->
                        <!--- Repeatable part -->
                        <div class="class-action cl-action5 cursor-pointer">
                           <h3 class="btn-count-3">20</h3>
                           <div class="action-name">
                              Central Level Failed
                           </div>
                        </div>
                        <!--- Repeatable part -->
                     </div>
                  </div>
                  <div class="tab-pane fade" id="nav-payment" role="tabpanel" aria-labelledby="nav-payment-tab">
                     <div class="accordion-body">
                        <!--- Repeatable part -->
                        <div class="class-action shadow cl-action1 cursor-pointer">
                           <h3 class="btn-count-3">20</h3>
                           <div class="action-name">
                              Payment Under process
                           </div>
                        </div>
                        <!--- Repeatable part -->
                        <!--- Repeatable part -->
                        <div class="class-action shadow cl-action2 cursor-pointer">
                           <h3 class="btn-count-3">20</h3>
                           <div class="action-name">
                              Payment Success
                           </div>
                        </div>
                        <!--- Repeatable part -->
                        <!--- Repeatable part -->
                        <div class="class-action shadow cl-action3 cursor-pointer">
                           <h3 class="btn-count-3">20</h3>
                           <div class="action-name">
                              Payment Collection Pending
                           </div>
                        </div>
                        <!--- Repeatable part -->
                        <!--- Repeatable part -->
                        <div class="class-action shadow cl-action4 cursor-pointer">
                           <h3 class="btn-count-3">20</h3>
                           <div class=" action-name">
                              Payment Collection Success
                           </div>
                        </div>
                        <!--- Repeatable part -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- New Dashboard Ends -->
      <div class="row registered-stu student-task mb-5">
         <h6 class="mb-4 text-uppercase">Register Students</h6>
         <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
               <div class="card-header p-3 pt-2 card-header1">
                  <div class="text-start pt-1">
                     <h6 class="text-sm mb-0 text-capitalize">All Students</h6>
                     <h4 class="mb-0">{{all_student(Auth::id())}}</h4>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
               <div class="card-header p-3 pt-2 card-header2">
                  <div class="text-start pt-1">
                     <h6 class="text-sm mb-0 text-capitalize">2021 Students</h6>
                     <h4 class="mb-0">{{student_2021(Auth::id())}}</h4>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
               <div class="card-header p-3 pt-2 card-header3">
                  <div class="text-start pt-1">
                     <h6 class="text-sm mb-0 text-capitalize">2022 Students</h6>
                     <h4 class="mb-0">{{student_2022(Auth::id())}}</h4>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
               <div class="card-header p-3 pt-2 card-header4">
                  <div class="text-start pt-1">
                     <h6 class="text-sm mb-0 text-capitalize">2023 Students</h6>
                     <h4 class="mb-0">{{student_2023(Auth::id())}}</h4>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
               <div class="card-header p-3 pt-2 card-header5">
                  <div class="text-start pt-1">
                     <h6 class="text-sm mb-0 text-capitalize">2024 Students</h6>
                     <h4 class="mb-0">{{student_2024(Auth::id())}}</h4>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
               <div class="card-header p-3 pt-2 card-header6">
                  <div class="text-start pt-1">
                     <h6 class="text-sm mb-0 text-capitalize">2025 Students</h6>
                     <h4 class="mb-0">{{student_2025(Auth::id())}}</h4>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row student-task student-task2">
         <h6 class="mb-5 text-uppercase">Assign Task</h6>
         <a href="{{route('assignSuperAdminStudentList','all')}}" class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
               <div class="card-header p-3 pt-2 card-header1">
                  <div
                     class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                     <i class="fa fa-briefcase opacity-10"></i>
                  </div>
                  <div class="text-end pt-1">
                     <h6 class="text-sm mb-0 text-capitalize">Total Task</h6>
                     <h4 class="mb-0">{{sa_total_task(Auth::id())}}</h4>
                  </div>
               </div>
            </div>
         </a>
         <a href="{{route('assignSuperAdminStudentList','Approved')}}" class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
               <div class="card-header p-3 pt-2 card-header2">
                  <div
                     class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                     <i class="fa fa-briefcase opacity-10"></i>
                  </div>
                  <div class="text-end pt-1">
                     <h6 class="text-sm mb-0 text-capitalize">Approved Task</h6>
                     <h4 class="mb-0">{{sp_approved_task(Auth::id())}}</h4>
                  </div>
               </div>
            </div>
         </a>
         <a href="{{route('assignSuperAdminStudentList','Completed')}}" class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
               <div class="card-header p-3 pt-2 card-header3">
                  <div
                     class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                     <i class="fa fa-briefcase opacity-10"></i>
                  </div>
                  <div class="text-end pt-1">
                     <h6 class="text-sm mb-0 text-capitalize">Completed Task</h6>
                     <h4 class="mb-0">{{sa_comp_task(Auth::id())}}</h4>
                  </div>
               </div>
            </div>
         </a>
         <a href="{{route('assignSuperAdminStudentList','Pending')}}" class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
               <div class="card-header p-3 pt-2 card-header4">
                  <div
                     class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                     <i class="fa fa-briefcase opacity-10"></i>
                  </div>
                  <div class="text-end pt-1">
                     <h6 class="text-sm mb-0 text-capitalize">Pending Task</h6>
                     <h4 class="mb-0">{{sa_pen_task(Auth::id())}}</h4>
                  </div>
               </div>
            </div>
         </a>
         <a href="{{route('assignSuperAdminStudentList','Rejected')}}" class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
               <div class="card-header p-3 pt-2 card-header1">
                  <div
                     class="icon icon-lg icon-shape bg-gradient-danger shadow-danger text-center border-radius-xl mt-n4 position-absolute">
                     <i class="fa fa-briefcase opacity-10"></i>
                  </div>
                  <div class="text-end pt-1">
                     <h6 class="text-sm mb-0 text-capitalize">Rejected Task</h6>
                     <h4 class="mb-0">{{sa_rej_task(Auth::id())}}</h4>
                  </div>
               </div>
            </div>
         </a>
      </div>
      <div class="container-fluid px-3">
         <div class="row mt-4 justify-content-between">
            <div class="col-lg-4 col-md-4 mt-4 pt-4 px-4 pb-4 card">
               <h6 class="mb-4">TOTAL EMPLOYEE</h6>
               <div class="chart">
                  <canvas id="myChart1" height="300"></canvas>
               </div>
            </div>
            <div class="col-lg-8 col-md-8 mt-4 card bg-dark statics-bg">
               <h6 class="text-white mt-4 mx-2">SALES STATISTICS</h6>
               <div class="chart">
                  <canvas id="line-chart" class="chart-canvas" height="380"></canvas>
               </div>
            </div>
         </div>
      </div>
      @else
      
      <div class="container-fluid py-4 line">
        <div class="row student-task student-task2 comparison">
            <h6 class="mb-5 text-uppercase">Assign Task</h6>
            <a class="col-xl-2 col-sm-6 mb-xl-0 mb-4 assign" href="{{route('assignStudentList','all')}}">
                <div class="card">
                    <div class="card-header p-3 pt-2 card-header1">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fa fa-calendar-o" aria-hidden="true"></i>
                    </div>
                    <div class="text-end pt-1">
                        <h6 class="text-sm mb-0 text-capitalize">Total Task</h6>
                        <h4 class="mb-0">{{all_assign_task(Auth::id())}}</h4>
                    </div>
                    </div>
                </div>
            </a>
            <a href="{{route('assignStudentList','Completed')}}" class="col-xl-2 col-sm-6 mb-xl-0 mb-4 assign">
                <div class="card">
                    <div class="card-header p-3 pt-2 card-header2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fa fa-list" aria-hidden="true"></i>
                    </div>
                    <div class="text-end pt-1">
                        <h6 class="text-sm mb-0 text-capitalize">Completed Task</h6>
                        <h4 class="mb-0">{{all_com_task(Auth::id())}}</h4>
                    </div>
                    </div>
                </div>
            </a>
            <a href="{{route('assignStudentList','Pending')}}" class="col-xl-2 col-sm-6 mb-xl-0 mb-4 assign">
                <div class="card">
                    <div class="card-header p-3 pt-2 card-header3">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fa fa-hourglass-end" aria-hidden="true"></i>
                    </div>
                    <div class="text-end pt-1">
                        <h6 class="text-sm mb-0 text-capitalize">Pending Task</h6>
                        <h4 class="mb-0">{{all_pen_task(Auth::id())}}</h4>
                    </div>
                    </div>
                </div>
            </a>
            <a href="{{route('assignStudentList','Rejected')}}" class="col-xl-2 col-sm-6 mb-xl-0 mb-4 assign">
                <div class="card">
                    <div class="card-header p-3 pt-2 card-header4">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fa fa-step-forward" aria-hidden="true"></i>
                    </div>
                    <div class="text-end pt-1">
                        <h6 class="text-sm mb-0 text-capitalize">Rejected Task</h6>
                        <h4 class="mb-0">{{all_rej_task(Auth::id())}}</h4>
                    </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="container-fluid py-4 line">
        <div class="row student-task student-task2 comparison abcd">
            <h6 class="mb-5 text-uppercase low ">Super Admin Assigned Task Approvel</h6>
            <a href="#" class="col-xl-2 col-sm-6 mb-xl-0 mb-4 assign">
                <div class="card">
                    <div class="card-header p-3 pt-2 card-header1">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fa fa-list" aria-hidden="true"></i>
                    </div>
                    <div class="text-end pt-1">
                        <h6 class="text-sm mb-0 text-capitalize">Approved</h6>
                        <h4 class="mb-0">{{sup_to_emp_approvtask(Auth::id())}}</h4>
                    </div>
                    </div>
                </div>
            </a>
            <a href="#" class="col-xl-2 col-sm-6 mb-xl-0 mb-4 assign">
                <div class="card">
                    <div class="card-header p-3 pt-2 card-header2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fa fa-hourglass-end" aria-hidden="true"></i>
                    </div>
                    <div class="text-end pt-1">
                        <h6 class="text-sm mb-0 text-capitalize">Pending Task</h6>
                        <h4 class="mb-0">{{sup_to_emp_pendingtask(Auth::id())}}</h4>
                    </div>
                    </div>
                </div>
            </a>
            <a href="#" class="col-xl-2 col-sm-6 mb-xl-0 mb-4 assign">
                <div class="card">
                    <div class="card-header p-3 pt-2 card-header3">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fa fa-ban" aria-hidden="true"></i>
                    </div>
                    <div class="text-end pt-1">
                        <h6 class="text-sm mb-0 text-capitalize">Rejected Task</h6>
                        <h4 class="mb-0">{{sup_to_emp_rejecttask(Auth::id())}}</h4>
                    </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @if(auth()->user()->role == 'Manager' || auth()->user()->role == 'Team Leader' || auth()->user()->role == 'Employee')
    <div class="container-fluid py-4 line">
        <div class="row student-task student-task2 comparison abcd">
            <h6 class="mb-5 text-uppercase low ">Admin Assigned Task Approvel</h6>
            <a href="#" class="col-xl-2 col-sm-6 mb-xl-0 mb-4 assign">
                <div class="card">
                    <div class="card-header p-3 pt-2 card-header1">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fa fa-list" aria-hidden="true"></i>
                    </div>
                    <div class="text-end pt-1">
                        <h6 class="text-sm mb-0 text-capitalize">Approved</h6>
                        <h4 class="mb-0">{{admin_to_emp_approvtask(Auth::id())}}</h4>
                    </div>
                    </div>
                </div>
            </a>
            <a href="#" class="col-xl-2 col-sm-6 mb-xl-0 mb-4 assign">
                <div class="card">
                    <div class="card-header p-3 pt-2 card-header2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fa fa-hourglass-end" aria-hidden="true"></i>
                    </div>
                    <div class="text-end pt-1">
                        <h6 class="text-sm mb-0 text-capitalize">Pending Task</h6>
                        <h4 class="mb-0">{{admin_to_emp_pendingtask(Auth::id())}}</h4>
                    </div>
                    </div>
                </div>
            </a>
            <a href="#" class="col-xl-2 col-sm-6 mb-xl-0 mb-4 assign">
                <div class="card">
                    <div class="card-header p-3 pt-2 card-header3">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fa fa-ban" aria-hidden="true"></i>
                    </div>
                    <div class="text-end pt-1">
                        <h6 class="text-sm mb-0 text-capitalize">Rejected Task</h6>
                        <h4 class="mb-0">{{admin_to_emp_rejecttask(Auth::id())}}</h4>
                    </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
    @if(auth()->user()->role == 'Team Leader' || auth()->user()->role == 'Employee')
    <div class="container-fluid py-4 line">
        <div class="row student-task student-task2 comparison abcd">
            <h6 class="mb-5 text-uppercase low ">Manager Assigned Task Approvel</h6>
            <a href="#" class="col-xl-2 col-sm-6 mb-xl-0 mb-4 assign">
                <div class="card">
                    <div class="card-header p-3 pt-2 card-header1">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fa fa-list" aria-hidden="true"></i>
                    </div>
                    <div class="text-end pt-1">
                        <h6 class="text-sm mb-0 text-capitalize">Approved</h6>
                        <h4 class="mb-0">{{teamled_to_emp_approvtask(Auth::id())}}</h4>
                    </div>
                    </div>
                </div>
            </a>
            <a href="#" class="col-xl-2 col-sm-6 mb-xl-0 mb-4 assign">
                <div class="card">
                    <div class="card-header p-3 pt-2 card-header2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fa fa-hourglass-end" aria-hidden="true"></i>
                    </div>
                    <div class="text-end pt-1">
                        <h6 class="text-sm mb-0 text-capitalize">Pending Task</h6>
                        <h4 class="mb-0">{{manager_to_emp_pendingtask(Auth::id())}}</h4>
                    </div>
                    </div>
                </div>
            </a>
            <a href="#" class="col-xl-2 col-sm-6 mb-xl-0 mb-4 assign">
                <div class="card">
                    <div class="card-header p-3 pt-2 card-header3">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fa fa-ban" aria-hidden="true"></i>
                    </div>
                    <div class="text-end pt-1">
                        <h6 class="text-sm mb-0 text-capitalize">Rejected Task</h6>
                        <h4 class="mb-0">{{manager_to_emp_rejecttask(Auth::id())}}</h4>
                    </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
    @if(auth()->user()->role == 'Employee')
    <div class="container-fluid py-4 line">
        <div class="row student-task student-task2 comparison abcd">
            <h6 class="mb-5 text-uppercase low ">Team Leader Assigned Task Approvel</h6>
            <a href="#" class="col-xl-2 col-sm-6 mb-xl-0 mb-4 assign">
                <div class="card">
                    <div class="card-header p-3 pt-2 card-header1">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fa fa-list" aria-hidden="true"></i>
                    </div>
                    <div class="text-end pt-1">
                        <h6 class="text-sm mb-0 text-capitalize">Approved</h6>
                        <h4 class="mb-0">{{teamled_to_emp_approvtask(Auth::id())}}</h4>
                    </div>
                    </div>
                </div>
            </a>
            <a href="#" class="col-xl-2 col-sm-6 mb-xl-0 mb-4 assign">
                <div class="card">
                    <div class="card-header p-3 pt-2 card-header2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fa fa-hourglass-end" aria-hidden="true"></i>
                    </div>
                    <div class="text-end pt-1">
                        <h6 class="text-sm mb-0 text-capitalize">Pending Task</h6>
                        <h4 class="mb-0">{{teamled_to_emp_pendingtask(Auth::id())}}</h4>
                    </div>
                    </div>
                </div>
            </a>
            <a href="#" class="col-xl-2 col-sm-6 mb-xl-0 mb-4 assign">
                <div class="card">
                    <div class="card-header p-3 pt-2 card-header3">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fa fa-ban" aria-hidden="true"></i>
                    </div>
                    <div class="text-end pt-1">
                        <h6 class="text-sm mb-0 text-capitalize">Rejected Task</h6>
                        <h4 class="mb-0">{{teamled_to_emp_rejecttask(Auth::id())}}</h4>
                    </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
    @endif
   </div>
</div>
</div>
@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
   var ctx = document.getElementById("chart-bars").getContext("2d");

   new Chart(ctx, {
       type: "bar",
       data: {
           labels: ["M", "T", "W", "T", "F", "S", "S"],
           datasets: [{
               label: "Sales",
               tension: 0.4,
               borderWidth: 0,
               borderRadius: 4,
               borderSkipped: false,
               backgroundColor: "rgba(255, 255, 255, .8)",
               data: [50, 20, 10, 22, 50, 10, 40],
               maxBarThickness: 6
           }, ],
       },
       options: {
           responsive: true,
           maintainAspectRatio: false,
           plugins: {
               legend: {
                   display: false,
               }
           },
           interaction: {
               intersect: false,
               mode: 'index',
           },
           scales: {
               y: {
                   grid: {
                       drawBorder: false,
                       display: true,
                       drawOnChartArea: true,
                       drawTicks: false,
                       borderDash: [5, 5],
                       color: 'rgba(255, 255, 255, .2)'
                   },
                   ticks: {
                       suggestedMin: 0,
                       suggestedMax: 500,
                       beginAtZero: true,
                       padding: 10,
                       font: {
                           size: 14,
                           weight: 300,
                           family: "Roboto",
                           style: 'normal',
                           lineHeight: 2
                       },
                       color: "#fff"
                   },
               },
               x: {
                   grid: {
                       drawBorder: false,
                       display: true,
                       drawOnChartArea: true,
                       drawTicks: false,
                       borderDash: [5, 5],
                       color: 'rgba(255, 255, 255, .2)'
                   },
                   ticks: {
                       display: true,
                       color: '#f8f9fa',
                       padding: 10,
                       font: {
                           size: 14,
                           weight: 300,
                           family: "Roboto",
                           style: 'normal',
                           lineHeight: 2
                       },
                   }
               },
           },
       },
   });


   var ctx2 = document.getElementById("chart-line").getContext("2d");

   new Chart(ctx2, {
       type: "line",
       data: {
           labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
           datasets: [{
               label: "Mobile apps",
               tension: 0,
               borderWidth: 0,
               pointRadius: 5,
               pointBackgroundColor: "rgba(255, 255, 255, .8)",
               pointBorderColor: "transparent",
               borderColor: "rgba(255, 255, 255, .8)",
               borderColor: "rgba(255, 255, 255, .8)",
               borderWidth: 4,
               backgroundColor: "transparent",
               fill: true,
               data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
               maxBarThickness: 6

           }],
       },
       options: {
           responsive: true,
           maintainAspectRatio: false,
           plugins: {
               legend: {
                   display: false,
               }
           },
           interaction: {
               intersect: false,
               mode: 'index',
           },
           scales: {
               y: {
                   grid: {
                       drawBorder: false,
                       display: true,
                       drawOnChartArea: true,
                       drawTicks: false,
                       borderDash: [5, 5],
                       color: 'rgba(255, 255, 255, .2)'
                   },
                   ticks: {
                       display: true,
                       color: '#f8f9fa',
                       padding: 10,
                       font: {
                           size: 14,
                           weight: 300,
                           family: "Roboto",
                           style: 'normal',
                           lineHeight: 2
                       },
                   }
               },
               x: {
                   grid: {
                       drawBorder: false,
                       display: false,
                       drawOnChartArea: false,
                       drawTicks: false,
                       borderDash: [5, 5]
                   },
                   ticks: {
                       display: true,
                       color: '#f8f9fa',
                       padding: 10,
                       font: {
                           size: 14,
                           weight: 300,
                           family: "Roboto",
                           style: 'normal',
                           lineHeight: 2
                       },
                   }
               },
           },
       },
   });

   var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

   new Chart(ctx3, {
       type: "line",
       data: {
           labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
           datasets: [{
               label: "Mobile apps",
               tension: 0,
               borderWidth: 0,
               pointRadius: 5,
               pointBackgroundColor: "rgba(255, 255, 255, .8)",
               pointBorderColor: "transparent",
               borderColor: "rgba(255, 255, 255, .8)",
               borderWidth: 4,
               backgroundColor: "transparent",
               fill: true,
               data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
               maxBarThickness: 6

           }],
       },
       options: {
           responsive: true,
           maintainAspectRatio: false,
           plugins: {
               legend: {
                   display: false,
               }
           },
           interaction: {
               intersect: false,
               mode: 'index',
           },
           scales: {
               y: {
                   grid: {
                       drawBorder: false,
                       display: true,
                       drawOnChartArea: true,
                       drawTicks: false,
                       borderDash: [5, 5],
                       color: 'rgba(255, 255, 255, .2)'
                   },
                   ticks: {
                       display: true,
                       padding: 10,
                       color: '#f8f9fa',
                       font: {
                           size: 14,
                           weight: 300,
                           family: "Roboto",
                           style: 'normal',
                           lineHeight: 2
                       },
                   }
               },
               x: {
                   grid: {
                       drawBorder: false,
                       display: false,
                       drawOnChartArea: false,
                       drawTicks: false,
                       borderDash: [5, 5]
                   },
                   ticks: {
                       display: true,
                       color: '#f8f9fa',
                       padding: 10,
                       font: {
                           size: 14,
                           weight: 300,
                           family: "Roboto",
                           style: 'normal',
                           lineHeight: 2
                       },
                   }
               },
           },
       },
   });

</script>
<script>
   var ctxPie = document.getElementById("myChart1").getContext("2d");

         new Chart(ctxPie, {
             type: "pie",
             data: {
               labels: [
       'Red',
       'Blue',
       'Yellow'
     ],
     datasets: [{
       label: 'My First Dataset',
       data: [300, 50, 100],
       backgroundColor: [
         'rgb(255, 99, 132)',
         'rgb(54, 162, 235)',
         'rgb(255, 205, 86)'
       ],
       hoverOffset: 4
     }]
             },
             options: {
                 responsive: true,
                 maintainAspectRatio: false,
                 plugins: {
                     legend: {
                         display: false,
                     }
                 },
                 interaction: {
                     intersect: false,
                     mode: 'index',
                 },
             },
         });










         var ctxLine = document.getElementById("line-chart").getContext("2d");

   new Chart(ctxLine, {
       type: "bar",
       data: {
           labels: ["2021", "2022", "2023", "2024", "2025", "2026", "2027"],
           datasets: [{
               label: "Sales",
               tension: 0.4,
               borderWidth: 0,
               borderRadius: 4,
               borderSkipped: false,
               backgroundColor: "#f7f7f7",
               data: [50, 20, 10, 22, 50, 10, 40],
               color: '#f7f7f7',
               maxBarThickness: 12
           }, ],
       },
       options: {
           responsive: true,
           maintainAspectRatio: false,
           plugins: {
               legend: {
                   display: false,
               }
           },
           interaction: {
               intersect: false,
               mode: 'index',
           },
           scales: {
               y: {
                   grid: {
                       drawBorder: false,
                       display: true,
                       drawOnChartArea: true,
                       drawTicks: false,
                       borderDash: [5, 5],
                       color: '#50678e'
                   },
                   ticks: {
                       suggestedMin: 0,
                       suggestedMax: 500,
                       beginAtZero: true,
                       padding: 10,
                       font: {
                           size: 14,
                           weight: 300,
                           family: "Roboto",
                           style: 'normal',
                           lineHeight: 2
                       },
                       color: "#fff"
                   },
               },
               x: {
                   grid: {
                       drawBorder: false,
                       display: true,
                       drawOnChartArea: true,
                       drawTicks: false,
                       borderDash: [5, 5],
                       color: '#50678e'
                   },
                   ticks: {
                       display: true,
                       color: '#f8f9fa',
                       padding: 10,
                       font: {
                           size: 14,
                           weight: 300,
                           family: "Roboto",
                           style: 'normal',
                           lineHeight: 2
                       },
                   }
               },
           },
       },
   });

</script>
@endpush
