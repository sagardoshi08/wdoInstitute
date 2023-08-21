@extends('layouts.app')
<style type="text/css">
    .active-btn{
        background-color: #24b183 !important;
        border-color: #24b183 !important;
    }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h4 class="mb-0">{{ __('Admin Login') }}</h4></div>
                <div class="card-body">
                     @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" id="login-form" action="{{ route('loginProcess') }}">
                        @csrf
                         <input type="hidden" id="recaptcha_token" name="recaptcha_token" value="">
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          <p><a class="btn btn-link" href="{{ route('forgetPassword')}}" style="-webkit-user-select: auto; user-select: auto;">
                                  {{ __('Forgot password?') }}
                              </a></p>
                        </div>
                        <!-- <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> -->
                        <div class="row mb-0">
                            <div class="g-recaptcha" id="rcaptcha" data-sitekey="{{env('SITEKEY')}}" data-callback="enableBtn">
                            </div>
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary login_btn" disabled>
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="{{ asset('backend/js/jquery.js') }}"></script>
<script src="{{ asset('backend/js/jquery.validate.js') }}"></script>
<script type="text/javascript" src="https://www.google.com/recaptcha/api.js"></script>
<!--end::Page Scripts -->

<script type="text/javascript">

$(document).ready(function() {
   var validator = $('#login-form').validate({
        rules:{
            email: {
                required: true,
                email: true,
                remote: {
                    url: "{{route('emailExitvalidation')}}",
                    type: "post",
                    data: {
                      _token: function() {
                        return "{{csrf_token()}}"
                      }
                    }
                }
            },
            password:{
                required: true
            }
        },
        messages: {
            email: {
                required:"The email field is required",
                email:"Enter valid email address",
                remote: "The entered email is invalid"
            },
            password: {
                required:"The password field is required"
            }
        }
    });

    $(document).on('change','#email,#password',function() {
       var captch = $("[name='g-recaptcha-response']").val();
       console.log(captch);
        if($('#login-form').valid() == 1 && captch){
            $('.login_btn').removeAttr('disabled');
            $('.login_btn').addClass('active-btn');
        }else{
            $('.login_btn').attr('disabled',true);
        }
    });
	
	if (localStorage.getItem("activeTabCounts") != null) {
		localStorage.removeItem("activeTabCounts");
	}
});
</script>
<script type="text/javascript">

    function enableBtn(){
        $('.login_btn').disabled = false;
        if($('#login-form').valid() == 1 ){
            $('.login_btn').removeAttr('disabled');
            $('.login_btn').addClass('active-btn');
         }
    }

</script>
