<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
       <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
       <a class="navbar-brand m-0 d-flex text-wrap align-items-center" href=" {{ route('dashboard') }} ">
       <img src="{{ asset('assets/img/3dlogo.png') }}" class="navbar-brand-img h-100" alt="main_logo">
       <span class="ms-2 font-weight-bold text-white"></span>
       </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-700" id="sidenav-collapse-main">
       <ul class="navbar-nav toffel">
          <li class="nav-item">
             <a class="px-1 nav-link text-white {{ Route::currentRouteName() == 'dashboard' ? ' active bg-gradient-primary' : '' }} " href="{{ route('dashboard') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                   <i class="material-icons opacity-10">dashboard</i>
                </div>
                <span class="nav-link-text ms-1">Dashboard</span>
             </a>
          </li>
          @if(!(auth()->user()->role == 'Employee' || auth()->user()->role == 'Other'))
          <li class="nav-item">
             <a href="{{ route('assign-task')}}" class="nav-link px-0 align-middle nav-link px-0 {{ Route::currentRouteName() == 'assign-task' ? ' active bg-gradient-primary' : '' }}">
             <i style="font-size: 1rem;" class="fas fa-lg fa-book ps-2 pe-2 text-center"></i>
             <span class="nav-link-text ms-1">Assign Task</span> </a>
          </li>
          <li class="">
             <a href="#submenu2" data-bs-toggle="collapse" class="{{  Route::currentRouteName() == 'admin-management' || Route::currentRouteName() == 'manager-management' || Route::currentRouteName() == 'teamleader-management' || Route::currentRouteName() == 'emoloyee-management' || Route::currentRouteName() == 'edit-management' || Route::currentRouteName() == 'user.allpendingUser' || Route::currentRouteName() == 'user.allrejectUser' || Route::currentRouteName() == 'user.allUser' || Route::currentRouteName() == 'user.alldefectUser' || Route::currentRouteName() == 'user.allrejectUser' ||  Route::currentRouteName() == 'user.allPendingUserData' ||  Route::currentRouteName() == 'user.allPendingadminData' || Route::currentRouteName() == 'user.allPendingmanagerData' || Route::currentRouteName() == 'user.allPendingteamleaderData' || Route::currentRouteName() == 'user.allPendingemployeeData' || Route::currentRouteName() == 'user.allrejectUserData' || Route::currentRouteName() == 'user.allrejectadminData' || Route::currentRouteName() == 'user.allrejectmanagerData' || Route::currentRouteName() == 'user.allrejectteamleaderData' || Route::currentRouteName() == 'user.allrejectemployeeData' || Route::currentRouteName() == 'user.alldefectUserData' || Route::currentRouteName() == 'user.alldefectadminData' || Route::currentRouteName() == 'user.alldefectmanagerData' || Route::currentRouteName() == 'user.alldefectteamleaderData' || Route::currentRouteName() == 'user.alldefectemployeeData'  ? 'active bg-gradient-primary' : '' }} nav-link px-0 align-middle">
             <i style="font-size: 1rem;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center"></i>
             <span class="ms-1 d-sm-inline">User Management</span>
             </a>
             <!--   <a class="nav-link px-0 align-middle nav-link px-0 {{ (Route::currentRouteName() == 'user-management' || Route::currentRouteName() == 'user2-management' || Route::currentRouteName() == 'admin-management' || Route::currentRouteName() == 'manager-management' || Route::currentRouteName() == 'teamleader-management' || Route::currentRouteName() == 'emoloyee-management') || Route::currentRouteName() == 'edit-management' || Route::currentRouteName() == 'edituser' ? ' active bg-gradient-primary' : '' }} " href="{{ route('user-management') }}">
                <!-- <div class="text-white text-center me-2 d-flex align-items-center justify-content-center"> -->
             <!-- <i style="font-size: 1rem;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center"></i> -->
             <!--  </div> -->
             <!-- <span class="nav-link-text ms-1">User Management</span> -->
             </a>
             <ul class="collapse {{  Route::currentRouteName() == 'admin-management' || Route::currentRouteName() == 'manager-management' || Route::currentRouteName() == 'teamleader-management' || Route::currentRouteName() == 'emoloyee-management' || Route::currentRouteName() == 'edit-management' || Route::currentRouteName() == 'user.allUser' || Route::currentRouteName() == 'user.allpendingUser' || Route::currentRouteName() == 'user.allrejectUser' || Route::currentRouteName() == 'user.alldefectUser' || Route::currentRouteName() == 'user.allrejectUser' ||  Route::currentRouteName() == 'user.allPendingUserData' ||  Route::currentRouteName() == 'user.allPendingadminData' || Route::currentRouteName() == 'user.allPendingmanagerData' || Route::currentRouteName() == 'user.allPendingteamleaderData' || Route::currentRouteName() == 'user.allPendingemployeeData' || Route::currentRouteName() == 'user.allrejectUserData' || Route::currentRouteName() == 'user.allrejectadminData' || Route::currentRouteName() == 'user.allrejectmanagerData' || Route::currentRouteName() == 'user.allrejectteamleaderData' || Route::currentRouteName() == 'user.allrejectemployeeData' || Route::currentRouteName() == 'user.alldefectUserData' || Route::currentRouteName() == 'user.alldefectadminData' || Route::currentRouteName() == 'user.alldefectmanagerData' || Route::currentRouteName() == 'user.alldefectteamleaderData' || Route::currentRouteName() == 'user.alldefectemployeeData' ? 'show' : '' }} nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                <!-- <li class="w-100 nav-item">
                   <a href="{{ route('user-management')}}" class="nav-link px-0 {{ Route::currentRouteName() == 'user-management' ? ' active bg-gradient-primary' : '' }}"> <i class=""></i>All Users</a>
                   </li> -->
                <li class="w-100">
                   <a href="{{ route('edit-management')}}" class="nav-link px-0 {{ Route::currentRouteName() == 'edit-management' ? ' active bg-gradient-primary' : '' }}"> <i class=""></i>Create a New User</a>
                </li>
                <li class="w-100">
                   <a href="{{ route('user.allUser')}}" class="nav-link px-0 {{ Route::currentRouteName() == 'user.allUser' || Route::currentRouteName() == 'admin-management' || Route::currentRouteName() == 'manager-management' || Route::currentRouteName() == 'teamleader-management' || Route::currentRouteName() == 'emoloyee-management'  ? ' active bg-gradient-primary' : '' }}"> <i class=""></i>All User</a>
                </li>
                <li class="w-100">
                   <a href="{{ route('user.allpendingUser')}}" class="nav-link px-0 {{ Route::currentRouteName() == 'user.allpendingUser' ||  Route::currentRouteName() == 'user.allPendingUserData' ||  Route::currentRouteName() == 'user.allPendingadminData' || Route::currentRouteName() == 'user.allPendingmanagerData' || Route::currentRouteName() == 'user.allPendingteamleaderData' || Route::currentRouteName() == 'user.allPendingemployeeData' ? ' active bg-gradient-primary' : '' }}"> <i class=""></i>Approvel Panding User</a>
                </li>
                <li class="w-100">
                   <a href="{{ route('user.allrejectUser')}}" class="nav-link px-0 {{ Route::currentRouteName() == 'user.allrejectUser' || Route::currentRouteName() == 'user.allrejectUserData' || Route::currentRouteName() == 'user.allrejectadminData' || Route::currentRouteName() == 'user.allrejectmanagerData' || Route::currentRouteName() == 'user.allrejectteamleaderData' || Route::currentRouteName() == 'user.allrejectemployeeData' ? ' active bg-gradient-primary' : '' }}"> <i class=""></i>Reject User</a>
                </li>
                <li class="w-100">
                   <a href="{{ route('user.alldefectUser')}}" class="nav-link px-0 {{ Route::currentRouteName() == 'user.alldefectUser' || Route::currentRouteName() == 'user.alldefectUserData' || Route::currentRouteName() == 'user.alldefectadminData' || Route::currentRouteName() == 'user.alldefectmanagerData' || Route::currentRouteName() == 'user.alldefectteamleaderData' || Route::currentRouteName() == 'user.alldefectemployeeData' ? ' active bg-gradient-primary' : '' }}"> <i class=""></i>Defect User</a>
                </li>
                <li class="w-100">
                   <a href="" class="nav-link px-0 {{ Route::currentRouteName() == '' ? ' active bg-gradient-primary' : '' }}"> <i class=""></i>Employee Resignation</a>
                </li>
                <li class="w-100">
                   <a href="" class="nav-link px-0 {{ Route::currentRouteName() == '' ? ' active bg-gradient-primary' : '' }}"> <i class=""></i>Employee Termination</a>
                </li>
             </ul>
          </li>

          <li class="">
             <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle {{ Route::currentRouteName() == 'all-active-user' ||  Route::currentRouteName() == 'attendance' ||  Route::currentRouteName() == 'userSallery'  ? ' active bg-gradient-primary' : '' }}">
             <i style="font-size: 1rem;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center"></i>
             <span class="ms-1 d-sm-inline">User Profile</span>
             </a>
             <ul class="collapse {{ Route::currentRouteName() == 'add' || Route::currentRouteName() == 'all-active-user' || Route::currentRouteName() == 'attendance' ||  Route::currentRouteName() == 'userSallery' || Route::currentRouteName() == 'user2-management' ? 'show' : '' }} nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
             <li class="w-100">
                 <a href="{{ route('all-active-user')}}" class="nav-link px-0 {{ Route::currentRouteName() == 'all-active-user' || Route::currentRouteName() == 'user2-management' ? ' active bg-gradient-primary' : '' }}"> <i class="" ></i>All Active User</a>
              </li>
              <li class="w-100">
                 <a href="{{ route('attendance')}}" class="nav-link px-0 {{ Route::currentRouteName() == 'attendance' || Route::currentRouteName() == 'user2-management'  ? ' active bg-gradient-primary' : '' }}"> <i class=""></i>User Attendence</a>
              </li>
              <li class="nav-item">
                 <a href="{{ route('userSallery')}}" class="nav-link px-0 align-middle nav-link px-0 {{ Route::currentRouteName() == 'userSallery' ? ' active bg-gradient-primary' : '' }}">
                 <i style="font-size: 1rem;" class="ps-2 pe-2 text-center"></i>
                 <span class="nav-link-text ms-1">User Salary</span> </a>
              </li>
              {{-- <li class="w-100">
                <a href="{{ route('userSalary')}}" class="nav-link px-0 {{ Route::currentRouteName() == 'attendance' || Route::currentRouteName() == 'user2-management'  ? ' active bg-gradient-primary' : '' }}"> <i class=""></i>User Salary</a>
             </li> --}}
             </ul>
         </li>

          @endif
          @if(auth()->user()->role == 'super_admin')
          <li class="nav-item">
             <a href="{{ route('college') }}" class="nav-link px-0 align-middle nav-link px-0 {{ Route::currentRouteName() == 'college' ? ' active bg-gradient-primary' : '' }}">
             <i style="font-size: 1rem;" class="fas fa-lg fa-book ps-2 pe-2 text-center"></i>
             <span class="nav-link-text ms-1">College Details</span> </a>
          </li>
          <li class="nav-item">
             <a href="{{ route('Bank Detail') }}" class="nav-link px-0 align-middle nav-link px-0 {{ Route::currentRouteName() == 'Bank Detail' ? ' active bg-gradient-primary' : '' }}">
             <i style="font-size: 1rem;" class="fas fa-lg fa-book ps-2 pe-2 text-center"></i>
             <span class="nav-link-text ms-1">Bank Details</span> </a>
          </li>
          @endif
          <!-- <li class="nav-item">
             <a href="{{ route('Student Detail') }}" class="nav-link px-0 align-middle nav-link px-0 {{ Route::currentRouteName() == 'college' ? ' active bg-gradient-primary' : '' }}">
             <i style="font-size: 1rem;" class="fas fa-lg fa-book ps-2 pe-2 text-center"></i>
             <span class="nav-link-text ms-1">College Details</span> </a>

             </li> -->
          <li class="student-portal">
             <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
             <i style="font-size: 1rem;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center"></i>
             <span class="ms-1 d-sm-inline">Student Portal</span> </a>
             <ul class="collapse {{ Route::currentRouteName() == 'add' || Route::currentRouteName() == 'Student Detail' ? 'show' : '' }} nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                <li class="w-100">
                   <a href="{{ route('add')}}" class="nav-link px-0 {{ Route::currentRouteName() == 'add' ? ' active bg-gradient-primary' : '' }}">
                      <svg xmlns="http://www.w3.org/2000/svg" style="    margin-right: 8px; margin-left: 10px;" width="24" height="24" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                         <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                         <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                      </svg>
                      Create Student
                   </a>
                </li>
                <li class="w-100">
                   <a href="{{ route('Student Detail') }}" class="nav-link px-0 {{ Route::currentRouteName() == 'Student Detail' ? ' active bg-gradient-primary' : '' }}">
                      <svg xmlns="http://www.w3.org/2000/svg" style="    margin-right: 8px;    margin-left: 10px;" width="24" height="24" fill="currentColor" class="bi bi-person-fill-up" viewBox="0 0 16 16">
                         <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.354-5.854 1.5 1.5a.5.5 0 0 1-.708.708L13 11.707V14.5a.5.5 0 0 1-1 0v-2.793l-.646.647a.5.5 0 0 1-.708-.708l1.5-1.5a.5.5 0 0 1 .708 0ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                         <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
                      </svg>
                      Student Details
                   </a>
                </li>
             </ul>
          </li>
          @if(auth()->user()->role == 'Employee')
          <li class="w-100">
            <a href="{{ route('attendance')}}" class=" nav-link px-0 {{ Route::currentRouteName() == 'attendance' || Route::currentRouteName() == 'user2-management'  ? ' active bg-gradient-primary' : '' }}">
            <i style="font-size: 1rem;" class="fa fa-clock-o ps-2 pe-2 text-center"></i>
            <span class="nav-link-text ms-1">User Attendence</span> </a>
         </li>
         @endif
           <li class="nav-item">
            <a href="{{ route('viewProfile')}}" class="nav-link px-0 align-middle nav-link px-0 {{ Route::currentRouteName() == 'viewProfile' ? ' active bg-gradient-primary' : '' }}">
            <i style="font-size: 1rem;" class="fa fa-user-circle ps-2 pe-2 text-center"></i>
            <span class="nav-link-text ms-1">View Profile</span> </a>
         </li>
         @if(auth()->user()->role == 'Employee')
         <li class="nav-item">
            <a href="{{ route('userSallery')}}" class="nav-link px-0 align-middle nav-link px-0 {{ Route::currentRouteName() == 'userSallery' ? ' active bg-gradient-primary' : '' }}">
            <i style="font-size: 1rem;" class="fa fa-money ps-2 pe-2 text-center"></i>
            <span class="nav-link-text ms-1">User Salary</span> </a>
         </li>
         @endif
         {{-- @if(auth()->user()->role == 'super_admin') --}}
         <li class="nav-item">
            <a href="{{ route('holiday')}}" class="nav-link px-0 align-middle nav-link px-0 {{ Route::currentRouteName() == 'holiday' ? ' active bg-gradient-primary' : '' }}">
            <i style="font-size: 1rem;" class="fa fa-calendar ps-2 pe-2 text-center"></i>
            <span class="nav-link-text ms-1">Holiday</span> </a>
         </li>
         {{-- @endif --}}
       </ul>
    </div>
 </aside>
 {{-- <script>
      var nav = document.querySelector('.toffel');
nav.addEventListener('toggle', function (event) {

  // Only run if the dropdown is open

  if (!event.target.open) return;

  // Get all other open dropdowns and close them
  var dropdowns = nav.querySelectorAll('.dropdown[open]');
  Array.prototype.forEach.call(dropdowns, function (dropdown) {
    if (dropdown === event.target) return;
    dropdown.removeAttribute('open');
  });

}, true);

 </script> --}}
