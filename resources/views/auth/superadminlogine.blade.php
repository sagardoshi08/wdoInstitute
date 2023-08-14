<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="qrk8nyBiT5pUtzKXd944jlLGczNMeL3V712VXHCj">
<link rel="apple-touch-icon" sizes="76x76" href="http://192.168.1.16/assets/img/apple-icon.png">
<link rel="icon" type="image/png" href="http://192.168.1.16/assets/img/favicon.png">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>

    </title>

    <!-- Metas -->
        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700">
    <!-- Nucleo Icons -->
    <link href="http://192.168.1.16/assets/css/nucleo-icons.css" rel="stylesheet">
    <link href="http://192.168.1.16/assets/css/nucleo-svg.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link id="pagestyle" href="http://192.168.1.16/assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet">
    <link id="pagestyle" href="http://192.168.1.16/css/custom.css" rel="stylesheet">
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
            <div class="page-header page-header-bg align-items-start min-vh-100">
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

                                        <div class="rBsradio">
                                            <input type="radio" name="role" name="rLogin" id="sRLoginS" value="super_admin">
                                            <label for="sRLoginS">Super Admin </label>
                                        </div>
                                        <!-- <div class="rBsradio">
                                            <input type="radio" wire:model="role" name="rLogin" id="sRLoginA" value="Admin">
                                            <label for="sRLoginA">Admin </label>
                                        </div>
                                        <div class="rBsradio">
                                            <input type="radio" wire:model="role" name="rLogin" id="sRLoginM" value="Manager">
                                            <label for="sRLoginM">Manager </label>
                                        </div>
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
                                        </div> -->
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

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
 <script type="text/javascript">
      @if(Request::segment(1)=="staff-login")  
                var x = document.getElementById("location_error");
                function showPosition(position) {
                    var location = position.coords.latitude+","+position.coords.longitude;
                    $.post('{{ route("save-location") }}',{'_token':"{{ csrf_token() }}",'location':location},function(){});
                }

                function getLocation() {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(showPosition, positionError, {timeout:10000});
                    }
                }
                function positionError(error) {
                  var errorCode = error.code;  
                  var message = error.message;
                  //x.innerHTML = message; 
                   $(".signin-margin form ").append(`<button type = 'button' class='d-none' name='location' value=''></button>`) 
                  $('#location_error').addClass("mt-3 text-danger")
                }
                getLocation()
        @endif
 </script>

</body>
            </html>
