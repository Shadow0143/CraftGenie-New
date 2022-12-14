{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address')
                                }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password')
                                }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm
                                Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
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
@endsection --}}



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Craftgenie | Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @laravelPWA
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <!-- LINEARICONS -->
    <link rel="stylesheet" href="{{asset('register_assets/fonts/linearicons/style.css')}}">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{asset('register_assets/css/style.css')}}">
</head>

<body>

    <div class="wrapper">
        <div class="inner">
            <img src="{{asset('register_assets/images/image-1.png')}}" alt="" class="image-1">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h3>New Account?</h3>
                <div class="col-12" style="text-align: center; margin-bottom:3px;margin-top:0px">
                    <img src="{{asset('img/logo.png')}}" alt="main-logo" style="width: 100px; height:30px">
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-user"></span>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="User Name">

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-holder">
                    <span class="lnr lnr-envelope"></span>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Mail">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-holder">
                    <span class="lnr lnr-phone-handset"></span>

                    <input id="phone_no" type="number" class="form-control @error('phone_no') is-invalid @enderror"
                        name="phone_no" value="{{ old('phone_no') }}" required autocomplete="phone_no"
                        placeholder="Phone Number">

                    @error('phone_no')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-holder">
                    <span class="lnr lnr-location"></span>
                    <textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address"
                        value="{{ old('address') }}" required autocomplete="address" placeholder="Address " cols="30"
                        rows="10"></textarea>

                    @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>





                <div class="form-holder">
                    <span class="lnr lnr-lock"></span>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password" placeholder="Password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-lock"></span>
                    {{-- <input type="password" class="form-control" placeholder="Confirm Password"> --}}
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password" placeholder="Confirm Password">
                </div>
                <button type="submit">
                    <span>Register</span>
                </button>
                <p>Already have an account ? <span><a href="{{route('login')}}">Click here</a></span></p>
            </form>
            <img src="{{asset('register_assets/images/image-2.png')}}" alt="" class="image-2">
        </div>

    </div>

    <script src="{{asset('register_assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('register_assets/js/main.js')}}"></script>
</body>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>