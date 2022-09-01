{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address')
                                }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                        old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
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
@endsection --}}




<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Craftgenie | Login</title>
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
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h3>Welcome !</h3>
                <div class="col-12" style="text-align: center; margin-bottom:3px;margin-top:0px">
                    <img src="{{asset('img/logo.png')}}" alt="main-logo" style="width: 100px; height:30px">
                </div>

                <div class="form-holder">
                    <span class="lnr lnr-envelope"></span>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>


                </div>
                @error('email')
                <span class="invalid-feedback " style="color:red">
                    {{ $message }}
                </span>
                @enderror
                <div class="form-holder">
                    <span class="lnr lnr-lock"></span>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password">


                </div>
                @error('password')
                <span class="invalid-feedback " style="color:red">
                    {{ $message }}
                </span>
                @enderror
                <div class="form-holder">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember')
                        ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif

                <button type="submit">
                    <span>LOGIN</span>
                </button>
                <p>Don't have an account ? <span><a href="{{route('register')}}">Click here</a></span></p>
            </form>
            <img src="{{asset('register_assets/images/image-2.png')}}" alt="" class="image-2">
        </div>

    </div>

    <script src="{{asset('register_assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('register_assets/js/main.js')}}"></script>
</body>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>