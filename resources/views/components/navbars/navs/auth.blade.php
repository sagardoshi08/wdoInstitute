<link type="text/css" rel="stylesheet" href="{{asset('css/jquery-ui.theme.css')}}"/>
<link type="text/css" rel="stylesheet" href="{{asset('css/jquery-ui.structure.css')}}"/>
<style>
    .ui-dialog-buttonpane.ui-widget-content.ui-helper-clearfix{
        background-color: #fff;
    }
    button.ui-button.ui-widget.ui-state-default.ui-corner-all.ui-button-text-only {
    background-color: #e91e63;
    color: #fff;
    border: none;
}
button.ui-button.ui-widget.ui-state-default.ui-corner-all.ui-button-text-only {
    background-color: #e91e63;
    color: #fff;
    border: none;
}
.ui-dialog-titlebar.ui-widget-header.ui-corner-all.ui-helper-clearfix.ui-draggable-handle {
    background-color: #07294d;
    text-align: center;
    left: -4px;
    width: 300px;
    top: -4px;
}
.ui-button-text-only .ui-button-text {
    padding: 0.7em 1em;
}
aside#sidenav-main {
    z-index: 99;
}
.ui-dialog.ui-widget.ui-widget-content.ui-corner-all.ui-front.ui-dialog-buttons.ui-draggable.ui-resizable {
    background-color: #fff;
    border: 1px solid #8e846b;
}
.ui-dialog .ui-dialog-title{
    float: unset;
}
.ui-widget-content{
    border: none;
    background: none;
}
div#countdownDisplay {
    color: #e91e63;
}
.ui-dialog .ui-dialog-buttonpane{
    padding: 0.3em 2.2em 0.5em 0.4em;
}
div#idletimer_warning_dialog {
    font-weight: 700;
}
p{
    font-weight: 500;
}
</style>
<div class="container-fluid mt-3 custom-header">
<nav class="navbar navbar-expand-lg bg-dark rounded px-0">

  <div class="container-fluid d-flex w-100">

    <ul class="navbar-nav w-40">
      <li class="nav-item nav-profile">
            <a class="nav-link text-white px-0" href="#" data-bs-toggle="dropdown" >
            @php $image = DB::table('user_data')->select('profile_image')->where('user_id',Auth::id())->first(); @endphp
              <img src="{{isset($image->profile_image) ? asset('assets').'/'.$image->profile_image : asset('assets/img/images.png')}}" class="avatar avatar-sm me-3 border-radius-lg" alt="profile">
              <span class="nav-profile-name">{{auth()->user()->name}} ({{(auth()->user()->role == 'super_admin') ? 'Super Admin' : auth()->user()->role}})</span>
            </a>
          </li>
      </ul>

      <button class="navbar-toggler text-white collapsed button-toggle-custom" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon">
      <i class="fa fa-bars text-white"></i>
      </span>
    </button>

    <div class="collapse navbar-collapse w-100 user-info" id="navbarSupportedContent">
    <div class="header-year-select">
      <form>
        Year
        <select>
          {{-- <option>2021</option>
          <option>2022</option> --}}
          <option>2023</option>
          <option>2024</option>
          <option>2025</option>
        </select>
</form>
    </div>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100 justify-content-end" style="column-gap: 10px;">

      <li class="nav-item bg-light-custom rounded-pill shadow-lg  p-0 counter-bg">
          <a class="nav-link d-flex justify-content-center align-items-center text-white " aria-current="page" href="javascript:;">
              <span style="font-size: 11px;" class="text-time">Time Remains </span>
              &nbsp;&nbsp;<h6 class="text-white date mb-0" id="demo1">
                <time class="countdown" date-time="2023-12-25 00:00:00" ></time>
            </h6>&nbsp;&nbsp;


              <i class="fa fa-clock-o text-time" aria-hidden="true"></i>
            </a>
        </li>
        <li class="nav-item bg-light-custom rounded-pill shadow-lg  p-0 counter-bg">
          <a class="nav-link d-flex justify-content-center align-items-center text-white " aria-current="page" href="javascript:;">
              <span style="font-size: 11px;" class="text-time">Your Hours </span>
              &nbsp;&nbsp;<h6 class="text-white date mb-0" id="demo1">
                <time class="countdown" date-time="2024-01-01 00:00:00"></time>
            </h6>&nbsp;&nbsp;
              <i class="fa fa-clock-o text-time" aria-hidden="true"></i>
            </a>
        </li >
        <li class="px-2 mt-2 w-5 search-bg">
    	<a href="#"><i class="fa fa-search text-white" aria-hidden="true"></i></a>
		 <div class="search-box rounded-pill bg-dark">
    		<input type="text" placeholder="Search Here..."/>
    		<button><i class="fa fa-search text-white" aria-hidden="true"></i></button>
  		</div>
    </li>
        <li class="nav-item dropdown notification-bg">
          <a class="nav-link text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa fa-bell mx-0"></i>
          </a>
          <ul class="dropdown-menu notification-ul">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>

          </ul>
        </li>
      <li class="nav-item dropdown  user-bg">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa fa-user mx-0"></i>
          </a>
          <ul class="dropdown-menu edit-menu">
            <li><a class="dropdown-item" href="{{route('edit-profile')}}"><i class="fa fa-user icon-dropdn" aria-hidden="true"></i>&nbsp;&nbsp; Edit Profile</a></li>
            <li><a href="{{route('Logout')}}" class="dropdown-item log-out-bg">
            <i class="fa fa-eject icon-dropdn"></i>&nbsp;&nbsp; Logout
                    </a></li>

          </ul>
        </li>


      </ul>
    </div>
  </div>
</nav>
</div>

<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                {{-- <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ route('user-management')}}">Pages</a></li>
                <li class="breadcrumb-item text-sm text-dark active text-capitalize" aria-current="page">{{ str_replace('-', ' ', Route::currentRouteName()) }}</li> --}}
            </ol>
            <!-- <h6 class="font-weight-bolder mb-0 text-capitalize">{{ str_replace('-', ' ', Route::currentRouteName()) }}</h6> -->
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 justify-content-end" id="navbar">


            <ul class="navbar-nav  justify-content-end">

                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
@if (Session::has('previousUser') && Auth::user()->role != "super_admin")
  <div class="text-white ml-2" role="alert">
     <span class="text-sm btn btn-warning redirect-user" user-id="{{ Session::get('previousUser') }}">Back to Previous Login</span>
  </div>
  @endif
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js" type="text/javascript"></script>
<script src="{{asset('js/store.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/jquery-idleTimeout.js')}}" type="text/javascript"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $(document).on('click', '.redirect-user', function() {
            $.ajax({
                type: 'POST',
                url: "{{ route('changeUserLogin') }}",
                data: {
                    'id': $(this).attr('user-id'),
                    "_token": "{{ csrf_token() }}"
                },
                dataType: 'html',
                success: function(data) {
                    window.location.href = "{{route('dashboard')}}";
                }
            });
        });
    });

    $(document).idleTimeout({
        redirectUrl: "{{url('attendence-logout')}}", // redirect to this url
        idleTimeLimit: 180, // 15 seconds
        activityEvents: 'click keypress scroll wheel mousewheel', // separate each event with a space
        dialogDisplayLimit: 30, // Time to display the warning dialog before logout (and optional callback) in seconds
        sessionKeepAliveTimer: false // Set to false to disable pings.
    });

  //   @if(Auth::check())
	// 	/*for track attendence working hours*/
	// 		var attendence_timeoutTimer;
	// 			// 5 min = 150*60*30;
	// 			//10 min = 300*60*30;

	// 		var attendence_expireTime = 90*60*30;
	// 		function attendence_expireSession(){
	// 			clearTimeout(attendence_timeoutTimer);
  //       window.localStorage.setItem("attendence_logoutMessage", true);
	// 			attendence_timeoutTimer = setTimeout("attendence_IdleTimeout()", attendence_expireTime);
	// 		}
	// 		function attendence_IdleTimeout() {
	// 			window.localStorage.setItem("attendence_logoutMessage", false);
	// 			window.location.href="{{url('attendence-logout')}}";
	// 		}
	// 		$(document).on('click mousemove scroll', function() {
	// 			attendence_expireSession();
	// 		});
  //     window.addEventListener('storage', myFunction)
  //     window.dispatchEvent( new Event('storage') )
  //     function myFunction(event) {
  //       console.log("event",event);
	// 			attendence_expireSession();
  //     }
	// 		attendence_expireSession();
	// 	/*end track attendence working hours*/
	// @endif  

  if(store.get('activeTabCounts')){
      store.set('activeTabCounts', (parseInt(store.get('activeTabCounts')) + 1));
  }else{
      store.set('activeTabCounts', 1); 
  }

  window.addEventListener('beforeunload', (event) => {
      if (validNavigation==0){
          store.set('activeTabCounts', (parseInt(store.get('activeTabCounts')) - 1));
          console.log("activeTabCounts",parseInt(store.get('activeTabCounts')))
          debugger
          if(parseInt(store.get('activeTabCounts')) == 0){
            $.ajax({
                type: 'get',
                url: "{{url('attendence-logout')}}",
                success: function(data) {
                }
            }); 
          }
          endSession();
      }
  })

  var validNavigation = 0;

  function endSession() {
    console.log("Browser or Broswer tab closed");
  }

  function bindDOMEvents() {
      //  unload works on both closing tab and on refreshing tab.
      // Attach the event keypress to exclude the F5 refresh
      $(document).keydown(function(e){
          var key=e.which || e.keyCode;
          if (key == 116){
              validNavigation = 1;
          }
      });

      // Attach the event click for all links in the page
      $("a").bind("click", function(){
          validNavigation = 1;
      });

      // Attach the event submit for all forms in the page
      $("form").bind("submit", function(){
          validNavigation = 1;
      });

      // Attach the event click for all inputs in the page
      $("input[type=submit]").bind("click", function(){
          validNavigation = 1;
      });

  }

  // Wire up the events as soon as the DOM tree is ready
  $(document).ready(function() {
      bindDOMEvents(); 
  });
  </script>
