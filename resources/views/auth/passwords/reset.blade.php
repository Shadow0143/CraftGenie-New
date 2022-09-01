{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

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
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
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
@endsection --}}


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Craftgenie | New Password</title>
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
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                
                <h3>Set New Password !</h3>
                <div class="col-12" style="text-align: center; margin-bottom:3px;margin-top:0px">
                    <img src="{{asset('img/logo.png')}}" alt="main-logo" style="width: 100px; height:30px">
                </div>

                <div class="form-holder">
                    <span class="lnr lnr-envelope"></span>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                </div>
                @error('email')
                <span class="invalid-feedback " style="color:red">
                    {{ $message }}
                </span>
                @enderror
                <div class="form-holder">
                    <span class="lnr lnr-lock"></span>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                </div>
                @error('password')
                <span class="invalid-feedback " style="color:red">
                    {{ $message }}
                </span>
                @enderror

                <div class="form-holder">
                    <span class="lnr lnr-lock"></span>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                </div>
               
               
                <button type="submit">
                    <span>Reset Password</span>
                </button>
                
            </form>
            <img src="{{asset('register_assets/images/image-2.png')}}" alt="" class="image-2">
        </div>

    </div>

    <script src="{{asset('register_assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('register_assets/js/main.js')}}"></script>
</body>

</html>
