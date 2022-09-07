<!DOCTYPE html>
<html>
<head>
    <title>Craftgenie  <?php echo $__env->yieldContent('title'); ?></title>
    <?php $config = (new \LaravelPWA\Services\ManifestService)->generate(); echo $__env->make( 'laravelpwa::meta' , ['config' => $config])->render(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/favicon.ico')); ?>">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- bootstrap.min.css -->
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <!-- Owl Carousel -->
    <link href="<?php echo e(asset('css/owl.carousel.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/owl.theme.default.min.css')); ?>" rel="stylesheet">
    <!-- custom -->
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light position-absolute w-100 ">
            <a class="navbar-brand" href="#"><img src="<?php echo e(asset('img/logo.png')); ?>" alt="main-logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('welcome')); ?>#home">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('welcome')); ?>#about">about us </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="<?php echo e(route('welcome')); ?>#quick"> Quick packages </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="<?php echo e(route('welcome')); ?>#howdo">How do we do </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="<?php echo e(route('welcome')); ?>#Blogs">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="<?php echo e(route('welcome')); ?>#contact">CONTACT</a>
                    </li>

                    <?php if(Auth::user()): ?>
                        <?php if(Auth::user()->role=='0'): ?>
                            <li class="nav-item">
                                <a class="nav-link " href="<?php echo e(route('home')); ?>">DASHBOARD</a>
                            </li>
                        <?php else: ?>
                        <ul class="dropdown">
                            <li  class="dropdown-toggle nav-link " data-toggle="dropdown">
                             MY ACCOUNT
                            </li>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="<?php echo e(route('profile')); ?>">Profile</a>
                              <a class="dropdown-item" href="<?php echo e(route('orderList')); ?>">Orders</a>
                              <a class="dropdown-item" href="<?php echo e(route('solution')); ?>">Solutions</a>
                              <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();"><i
                                      class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                      class="align-middle" data-key="t-logout">Logout</span></a>


                              <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                  <?php echo csrf_field(); ?>
                              </form>



                            </div>
                          </ul>
                        <?php endif; ?>
                    <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link " href="<?php echo e(route('login')); ?>">LOGIN</a>
                    </li>
                    <?php endif; ?>

                </ul>
            </div>
        </nav>
    </header><?php /**PATH /home/billu/Data/Professional/Laravel/CraftGenie-New/resources/views/layouts/frontend/header.blade.php ENDPATH**/ ?>