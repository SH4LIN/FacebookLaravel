@extends('layouts.app')


@section('content')
    <div class="container-fluid min-h-full">
        <div class="row justify-content-center" style="padding-top: 112px;padding-bottom: 72px">
            <div class="col-md-4 mb-4">
                <div class="row justify-content-lg-center">
                        <div class="col-md-12">
                            <img src="/image/facebooklogo.svg" style="height: 106px;margin-left: -34px">
                        </div>
                    <div class="col-md-12">
                        <div class="h1">{{__("Facebook Helps You to Connect With People")}}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ml-1">
                <div class="row justify-content-center">
                    <div class=" card-login-style shadow mb-5 bg-white py-3">
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group row">

                                    <div class="col-md-12 mx-auto">
                                        <input id="email" type="email" class="input form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"  autofocus placeholder="Email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-md-12 mx-auto mb-2">
                                        <input id="password" type="password" class="input form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-md-12 mx-auto">
                                        <button type="submit" class="button-width btn btn-primary" style="background-color: #1877f2;">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-12 text-center">
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link " href="{{ route('password.request') }}" style="color: #1877f2;font-size: 12px">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12 text-center">
                                        <hr class="solid">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12 text-center">
                                        @if (Route::has('register'))
                                            <a href="#exampleModalCenter" data-toggle="modal">
                                                <div class="button-width btn btn-success" style="width: 50%;">
                                                    {{ __('Register') }}
                                                </div>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{__('Register')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-group row justify-content-center">
                                        <div class="col-md-5">
                                            <input id="firstname" type="text" class="input form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" autocomplete="firstname" autofocus placeholder="{{ __('First Name') }}">

                                            @error('firstname')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-5">
                                            <input id="lastname" type="text" class="input form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" autocomplete="lastname" autofocus placeholder="{{ __('Last Name') }}">

                                            @error('lastname')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row justify-content-center">
                                        <div class="col-md-10">
                                            <input id="email" type="email" class="input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" placeholder="{{ __('E-Mail Address') }}">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row justify-content-center">

                                        <div class="col-md-10">
                                            <input id="password" type="password" class="input form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="{{ __('Password') }}">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row justify-content-center">
                                        <div class="col-md-10">
                                            <input id="password-confirm" type="password" class="input form-control" name="password_confirmation" autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
                                        </div>
                                    </div>

                                    <div class="form-group row justify-content-center">
                                        <div class="col-md-10">
                                            <input id="dob" type="date" class="input form-control datepicker @error('dob') is-invalid @enderror" name="dob">
                                            @error('dob')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row justify-content-center mb-4 mx-auto">
                                        <div class="form-check form-check-inline col-md-5 row justify-content-center input-button-style m-0">
                                            <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
                                            <label class="form-check-label" for="male">
                                                {{__('Male')}}
                                            </label>
                                        </div>

                                        <div class="form-check form-check-inline col-md-5 row justify-content-center input-button-style m-0">
                                            <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                            <label class="form-check-label" for="female">
                                                {{__('Female')}}
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group row justify-content-center mb-4">
                                        <div class="col-md-10 ">
                                            <button type="submit" class="button-width btn btn-primary" style="background-color: #1877f2;">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
