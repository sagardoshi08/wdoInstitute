@include('components.include.frontendheader')
<html>
    <head>
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
            <link id="pagestyle" href="{{asset('assets/css/material-dashboard.css?v=3.0.0')}}" rel="stylesheet">
            <link id="pagestyle" href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer=""></script>
        </head>
<body class="g-sidenav-show  bg-gray-200">

<div class="container position-sticky z-index-sticky top-0">
            <div class="row">
                <div class="col-12">
                                    </div>
            </div>
        </div>
                <main class="main-content mt-0 ps">
            <div class="page-header page-header-bg align-items-start min-vh-100 ptp-01">
                    <span class="mask bg-gradient-dark opacity-6"></span>
            <div wire:id="cQ6Gnvup0CEuYFF95PY9" class="container my-auto mt-5">
                <div class="row signin-margin">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-body">
                                <form action="{{route('loginprocess')}}" method="POST">
                                    <div class="radioButton">
                                        @csrf
                                        @if (Session::has('status'))
                                        <div class="alert alert-success alert-dismissible text-white" role="alert">
                                            <span class="text-sm">{{ Session::get('status') }}</span>
                                            <button type="button" class="btn-close text-lg py-3 opacity-10"
                                                data-bs-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @endif
                                        <!-- <label class="form-label">Role</label> -->

                                        {{-- <div class="rBsradio">
                                            <input type="radio" name="role" name="rLogin" id="sRLoginS" value="super_admin">
                                            <label for="sRLoginS">Super Admin </label>
                                        </div> --}}
                                        {{-- <div class="rBsradio">
                                            <input type="radio" name="role" name="rLogin" id="sRLoginA" value="Admin">
                                            <label for="sRLoginA">Admin </label>
                                        </div>
                                        <div class="rBsradio">
                                            <input type="radio" name="role" name="rLogin" id="sRLoginM" value="Manager">
                                            <label for="sRLoginM">Manager </label>
                                        </div> --}}
                                        <div class="rBsradio">
                                            <input type="radio" wire:model="role" name="rLogin" id="sRLoginT" value="Team Leader">
                                            <label for="sRLoginT">Team Leader </label>
                                        </div>
                                        <div class="rBsradio">
                                            <input type="radio" wire:model="role" name="rLogin" id="sRLoginE" value="Employee">
                                            <label for="sRLoginE">Employee </label>
                                        </div>
                                        <div class="rBsradio">
                                            <input type="radio" wire:model="role" name="rLogin" id="sRLoginO" value="Other">
                                            <label for="sRLoginO">Other </label>
                                        </div>
                                    </div>
                                    <div class="input-group input-group-outline mt-3 @if(strlen($email ?? '') > 0) is-filled @endif">
                                        <label class="form-label"></label>
                                        <input name='email' type="email" class="form-control" placeholder="Email">
                                    </div>
                                    @error('email')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror

                                    <div class="input-group input-group-outline mt-3">
                                        <label class="form-label"></label>
                                        <input name="password" type="password" class="form-control" placeholder="Password"
                                             >
                                    </div>
                                    @error('password')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror

                                           @error('role')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                    <div class="form-check form-switch d-flex align-items-center my-3">
                                        <input class="form-check-input" type="checkbox" id="rememberMe">
                                        <label class="form-check-label mb-0 ms-2" for="rememberMe">Remember me</label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
                                    </div>
                                    <p class="text-sm text-center">
                                        Forgot your password?
                                        <a href="{{ route('password.forgot') }}" class="text-primary text-gradient font-weight-bold">here</a>
                                    </p>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- Livewire Component wire-end:cQ6Gnvup0CEuYFF95PY9 -->

                         </div>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></main>
        @include('components.include.backendfooter')
{{-- <script src="http://192.168.1.16/assets/js/core/popper.min.js"></script>
<script src="http://192.168.1.16/assets/js/core/bootstrap.min.js"></script>
<script src="http://192.168.1.16/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="http://192.168.1.16/assets/js/plugins/smooth-scrollbar.min.js"></script>

<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

</script>
<!-- Github buttons -->
<script async="" defer="" src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc 11-->
<script src="http://192.168.1.16/assets/js/material-dashboard.min.js?v=3.0.0"></script>
<!-- Livewire Scripts -->

<script src="http://192.168.1.16/vendor/livewire/livewire.js?id=90730a3b0e7144480175" data-turbo-eval="false" data-turbolinks-eval="false"></script>
<script data-turbo-eval="false" data-turbolinks-eval="false">
    if (window.livewire) {
	    console.warn('Livewire: It looks like Livewire\'s @livewireScripts JavaScript assets have already been loaded. Make sure you aren\'t loading them twice.')
	}

    window.livewire = new Livewire();
    window.livewire.devTools(true);
    window.Livewire = window.livewire;
    window.livewire_app_url = 'http://192.168.1.16';
    window.livewire_token = 'qrk8nyBiT5pUtzKXd944jlLGczNMeL3V712VXHCj';

	/* Make sure Livewire loads first. */
	if (window.Alpine) {
	    /* Defer showing the warning so it doesn't get buried under downstream errors. */
	    document.addEventListener("DOMContentLoaded", function () {
	        setTimeout(function() {
	            console.warn("Livewire: It looks like AlpineJS has already been loaded. Make sure Livewire\'s scripts are loaded before Alpine.\\n\\n Reference docs for more info: http://laravel-livewire.com/docs/alpine-js")
	        })
	    });
	}

	/* Make Alpine wait until Livewire is finished rendering to do its thing. */
    window.deferLoadingAlpine = function (callback) {
        window.addEventListener('livewire:load', function () {
            callback();
        });
    };

    let started = false;

    window.addEventListener('alpine:initializing', function () {
        if (! started) {
            window.livewire.start();

            started = true;
        }
    });

    document.addEventListener("DOMContentLoaded", function () {
        if (! started) {
            window.livewire.start();

            started = true;
        }
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script language="JavaScript">
  var timeoutTimer;
        // 5 min = 150*60*30;
        //10 min = 300*60*30;

        var expireTime = 900*60*900;
        function expireSession(){
            clearTimeout(timeoutTimer);
            timeoutTimer = setTimeout("IdleTimeout()", expireTime);
        }
        function IdleTimeout() {
            localStorage.setItem("logoutMessage", true);
            window.location.href="http://192.168.1.16/logout";
        }
        $(document).on('click mousemove scroll', function() {
            expireSession();
        });
        expireSession();
window.onload = function(){

  $(function(){
//   $('#datepicker').datepicker();
});
};

//  script for quantity starts

$(document).on('click', '.qty-plus', function () {
   $(this).prev().val(+$(this).prev().val() + 1);
});
$(document).on('click', '.qty-minus', function () {
   if ($(this).next().val() > 0) $(this).next().val(+$(this).next().val() - 1);
});

//  script for quantity ends


class Countdown {
  constructor(el){
    this.el = el;
    this.targetDate = new Date(el.getAttribute("date-time"));
    this.createCountDownParts()
    this.countdownFunction();
    this.countdownLoopId = setInterval(this.countdownFunction.bind(this), 1000)
  }
  createCountDownParts(){
    ["d", "h", "m", "s"].forEach(part => {
      const partEl = document.createElement("div");
      partEl.classList.add("part", part);
      const textEl = document.createElement("div");
      textEl.classList.add("text");
      textEl.innerText = part;
      const numberEl = document.createElement("div");
      numberEl.classList.add("number");
      numberEl.innerText = 0;
      partEl.append(numberEl, textEl);
      this.el.append(partEl);
      this[part] = numberEl;
    })
  }

  countdownFunction(){
    const currentDate = new Date();
    if(currentDate > this.targetDate) return clearInterval(this.intervalId);
    const remaining = this.getRemaining(this.targetDate, currentDate);
    Object.entries(remaining).forEach(([part,value]) => {
      this[part].style.setProperty("--value", value)
      this[part].innerText = value
    })
  }

  getRemaining(target, now){
    let s = Math.floor((target - (now))/1000);
    let m = Math.floor(s/60);
    let h = Math.floor(m/60);
    let d = Math.floor(h/24);
    h = h-(d*24);
    m = m-(d*24*60)-(h*60);
    s = s-(d*24*60*60)-(h*60*60)-(m*60);
    return { d, h, m, s }
  }

}

const countdownEls= document.querySelectorAll(".countdown") || [];
countdownEls.forEach(countdownEl => new Countdown(countdownEl))


// Search header

$(document).ready(function() {

     $(".fa-search").click(function() {
        $(".search-box").toggle();
        $("input[type='text']").focus();
      });

  });



</script>

 --}}

 <script>
    // Search header

$(document).ready(function() {

$(".fa-search").click(function() {
   $(".search-box").toggle();
   $("input[type='text']").focus();
 });

});

@if(Request::segment(1)=="sign-in")
var x = document.getElementById("location_error");
function showPosition(position) {
   var location = position.coords.latitude+","+position.coords.longitude;
   $(".signin-margin form").append(`<input type = 'hidden' name='location' value='`+location+`'>`)

}

function getLocation() {
   if (navigator.geolocation) {
       navigator.geolocation.getCurrentPosition(showPosition, positionError, {timeout:10000});
   }
}
function positionError(error) {
 var errorCode = error.code;
 var message = error.message;
/// x.innerHTML = message;
 $(".signin-margin form").append(`<input type = 'hidden' name='location' value=''>`)
 $('#location_error').addClass("mt-3 text-danger")
}
getLocation()

@endif

@if(Auth::check() )
/*for track attendence working hours*/
var attendence_timeoutTimer;
   // 5 min = 150*60*30;
   //10 min = 300*60*30;

var attendence_expireTime = 90*60*30;
function attendence_expireSession(){
   clearTimeout(attendence_timeoutTimer);
   attendence_timeoutTimer = setTimeout("attendence_IdleTimeout()", attendence_expireTime);
}
function attendence_IdleTimeout() {
   localStorage.setItem("attendence_logoutMessage", true);
   window.location.href="{{url('attendence-logout')}}";
}
$(document).on('click mousemove scroll', function() {
   attendence_expireSession();
});
attendence_expireSession();
/*end track attendence working hours*/
@endif
 </script>

</body>
            </html>
