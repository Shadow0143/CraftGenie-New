<!DOCTYPE html>
<html>
<head>
    <title>Craftgenie  @yield('title')</title>
    @laravelPWA
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- bootstrap.min.css -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Owl Carousel -->
    <link href="{{asset('css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/owl.theme.default.min.css')}}" rel="stylesheet">
    <!-- custom -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    @include('sweetalert::alert')
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

    <!-- header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light position-absolute w-100 ">
            <a class="navbar-brand" href="#"><img src="{{asset('img/logo.png')}}" alt="main-logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('welcome')}}#home">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('welcome')}}#about">about us </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('welcome')}}#quick"> Quick packages </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('welcome')}}#howdo">How do we do </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('welcome')}}#Blogs">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('welcome')}}#contact">CONTACT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('login')}}">LOGIN</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>