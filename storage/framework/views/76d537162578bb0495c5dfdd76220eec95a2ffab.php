<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <img src="/assets/logo_chrome.png" width="120px" height="auto">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Our Program
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">satu</a>
                                <a class="dropdown-item" href="#">dua</a>
                                <a class="dropdown-item" href="#">tiga</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">About Us</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Our Schedule
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">empat</a>
                                <a class="dropdown-item" href="#">lima</a>
                                <a class="dropdown-item" href="#">enam</a>
                            </div>
                        </li>
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-danger rounded-pill" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                            </li>
                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register', ['ref' => 'session head'])); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
        <footer>
            <div class="container">

                <div class="bottom-footer">
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <img src="/assets/logo_chrome.png" alt="" width="120px" height="auto">
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <h5 class="text-bold">CONTACT US</h5>
                            <p>27 Division St, New York, NY 10002, USA</p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <h5 class="text-bold">QUICK LINK</h5>
                            <span>+62 811 339 2726</span>
                            <p>chrome_studio@yahoo.com</p>
                            <p>chromestudios@gmail.com</p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <h5 class="text-bold">FEATURES</h5>
                            <p>Mon - Fri: 9 am - 6 pm Sat, Sun: Holiday</p>
                        </div>

                    </div>
                    <div class="row text-center">
                        <div class="col">
                            <p>Copyright © 2022 Aprent.</p>
                        </div>
                    </div>
                </div><!--bottom-footer end-->
            </div>
        </footer>
    </div>
</body>
</html>
