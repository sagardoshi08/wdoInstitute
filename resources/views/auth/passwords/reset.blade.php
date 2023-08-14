@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h4 class="mb-0">{{ __('Reset Password') }}</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('resetPasswordUpdate') }}" id="reset-Password">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">
                        <input type="hidden" name="valid_email" id="valid-email" value="{{ $email }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}"  autofocus>
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
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary reset">
                                    {{ __('Reset Password') }}
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

<!--end::Page Scripts -->

<script type="text/javascript">

$(document).ready(function() {
$('.reset').click(function() {
    $('#reset-Password').validate({
        rules:{
            email: {
                required: true,
                email: true,
                remote: {
                    url: "{{route('resetemailExitvalidation')}}",
                    type: "post",
                    data: {
                      _token: function() {
                        return "{{csrf_token()}}"
                      },
                      email: function() {
                            return $('#email').val()
                        },
                      valid_email: function() {
                            return $('#valid-email').val()
                      },
                    }
                }
            },
            password: "required",
            password_confirmation:{
                required: true,
                equalTo: "#password"
            }
            
        },
        messages: {
            email: {
                required:"The email field is required",
                email:"Enter valid email address",
                remote: "The entered email is invalid"

            },  
            password: "The password field is required",
            password_confirmation:{
                required: "The confirm password field is required",
                equalTo: "Confirm password does not match"
            }
        }
    });
});
});
</script>