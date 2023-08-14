@extends('layouts.app')
@section('content')
<style>
    .back-login,.back-login:hover{
        -webkit-user-select: auto;
        user-select: auto;
        position: absolute;
        right: 0;
        color: gray;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h4 class="mb-0">{{ __('Reset Password') }}</h4></div>

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
                    <form method="POST" action="{{ route('forgetPasswordProcess') }}" id="forget-password">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary forgrt_btn">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                                <p><a class="btn btn-link back-login" href="{{ route('login')}}">{{ __('Back to login') }}</a></p>
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

        $('#forget-password').validate({
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
                }
            },
            messages: {
                email: {
                    required:"The email field is required",
                    email:"Enter valid email address",
                    remote: "The entered email is invalid"
                }
            }
        });
});
</script>
