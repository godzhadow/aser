<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ASER</title>
    <meta name="keywords" content="online education, e-learning, coaching, education, teaching, learning">
    <meta name="description" content="Zoomy is a e-learnibg HTML template for all kinds of education, coaching, online education website">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('img/favicon.png')); ?>">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('css/owl.carousel.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('css/animate.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('css/magnific-popup.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('css/all.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('css/flaticon.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('css/font.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('css/metisMenu.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('css/nice-select.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('css/slick.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('css/spacing.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('css/main.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/dropify/css/dropify.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/jquery.tagsinput.min.css')); ?>" type="text/css"/>

    <?php echo $__env->yieldPushContent('links'); ?>
</head>

<body>
    
        <!--[if lte IE 9]>
                <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
            <![endif]-->

        <!-- Add your site or application content here -->
        <!-- preloader -->
        <div id="preloader">
            <div class="preloader">
                <span></span>
                <span></span>
            </div>
        </div>
        <!-- preloader end  -->

        <header>
            <div id="theme-menu-one" class="main-header-area pl-100 pr-100 pt-20 pb-15">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xl-4 col-lg-3 col-5">
                            <div class="logo"><a href="<?php echo e(url('/')); ?>"><img src="/img/logo_aser.png" alt=""></a></div>
                        </div>
                        <div class="col-xl-7 col-lg-8 d-none d-lg-block">
                            <nav class="main-menu navbar navbar-expand-lg justify-content-center">
                                <div class="nav-container">
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav">
                                            <li class="nav-item <?php echo e(Request::is('/') ? 'active' : ''); ?>">
                                                <a class="nav-link" href="<?php echo e(url('/')); ?>" id="navbarDropdown" role="button"  aria-expanded="false">Home</a>
                                            </li>
                                            <li class="nav-item <?php echo e(Request::is('program') ? 'active' : ''); ?>">
                                                <a class="nav-link" href="<?php echo e(url('program')); ?>" id="navbarDropdown2" role="button"  aria-expanded="false">Our Program</a>
                                            </li>
                                            
                                            <li class="nav-item <?php echo e(Request::is('about') ? 'active' : ''); ?>">
                                                <a class="nav-link" href="<?php echo e(url('about')); ?>" id="navbarDropdown3" role="button"  aria-expanded="false">About Us</a>
                                            </li>
                                            <li class="nav-item <?php echo e(Request::is('schedule') ? 'active' : ''); ?>">
                                                <a class="nav-link" href="<?php echo e(url('schedule')); ?>" id="navbarDropdown4" role="button"  aria-expanded="false">Our Schedule</a>
                                            </li>
                                            

                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                        <div class="col-xl-1 col-lg-1 col-7">
                            <div class="right-nav d-flex align-items-center justify-content-end">
                                <div class="right-btn">
                                    <ul class="d-flex align-items-center">
                                        <?php if(auth()->guard()->guest()): ?>
                                            <li><a href="<?php echo e(route('login')); ?>" class="theme_btn free_btn"><?php echo e(__('Login')); ?></a></li>
                                        <?php else: ?>
                                            <li>
                                                <a class="nav-link" href="#" id="navbarDropdown5" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <div class="profile_photo">
                                                        <span class="sign-in">
                                                        <img src="/img/icon/user.svg">
                                                        </span>
                                                        <b><h4 class="ms-1"><?php echo e(str_limit(Auth::user()->name, $limit=6)); ?></h4></b>

                                                    </div>
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown5">
                                                    <li>
                                                        <?php if(Auth::user()->jenis_user === 'admin'): ?>
                                                            <a class="dropdown-item" href="<?php echo e(url('/admin/dashboard/')); ?>">
                                                            Dashboard
                                                           </a>
                                                        <?php elseif(Auth::user()->jenis_user === 'full paper'): ?>
                                                            <a class="dropdown-item" href="<?php echo e(url('/fullpaper/dashboard/')); ?>">
                                                            Dashboard
                                                           </a>
                                                        <?php else: ?>
                                                            <a class="dropdown-item" href="<?php echo e(url('/home')); ?>">
                                                            Dashboard
                                                           </a>
                                                        <?php endif; ?>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                                        onclick="event.preventDefault();
                                                                      document.getElementById('logout-form').submit();">
                                                         <?php echo e(__('Logout')); ?>

                                                        </a>

                                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                                            <?php echo csrf_field(); ?>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <div class="hamburger-menu d-md-inline-block d-lg-none text-right">
                                    <a href="javascript:void(0);">
                                        <i class="far fa-bars"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /.theme-main-menu -->
        </header>

        <!-- slide-bar start -->
        <aside class="slide-bar">
            <div class="close-mobile-menu">
                <a href="javascript:void(0);"><i class="fas fa-times"></i></a>
            </div>

            <!-- offset-sidebar start -->
            <div class="offset-sidebar">
                <div class="offset-widget offset-logo mb-30">
                    <a href="index.html">
                        <img src="/img/logo_aser.png" alt="logo">
                    </a>
                </div>
                <div class="offset-widget mb-40">
                    <div class="info-widget">
                        <h4 class="offset-title mb-20">About Us</h4>
                        <p class="mb-30">
                            But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain
                            was born and will give you a complete account of the system and expound the actual teachings of
                            the great explore
                        </p>
                        <a class="theme_btn theme_btn_bg" href="contact.html">Contact Us</a>
                    </div>
                </div>
                <div class="offset-widget mb-30 pr-10">
                    <div class="info-widget info-widget2">
                        <h4 class="offset-title mb-20">Contact Info</h4>
                        <p> <i class="fal fa-address-book"></i> 23/A, Miranda City Likaoli Prikano, Dope</p>
                        <p> <i class="fal fa-phone"></i> +0989 7876 9865 9 </p>
                        <p> <i class="fal fa-envelope-open"></i> info@example.com </p>
                    </div>
                </div>
            </div>
            <!-- offset-sidebar end -->

            <!-- side-mobile-menu start -->
            <nav class="side-mobile-menu">
                <ul id="mobile-menu-active">
                    <li class="has-dropdown">
                        <a href="index.html">Home</a>
                        <ul class="sub-menu">
                            <li><a href="index.html">Home Style 1</a></li>
                            <li><a href="index-2.html">Home Style 2</a></li>
                            <li><a href="index-3.html">Home Style 3</a></li>
                        </ul>
                    </li>
                    <li><a href="about.html">About</a></li>
                    <li class="has-dropdown">
                        <a href="#">Pages</a>
                        <ul class="sub-menu">
                            <li><a href="courses.html">Course One</a></li>
                            <li><a href="courses-2.html">Course Two</a></li>
                            <li><a href="course-details.html">Courses Details</a></li>
                            <li><a href="price.html">Price</a></li>
                            <li><a href="instructor.html">Instructor</a></li>
                            <li><a href="instructor-profile.html">Instructor Profile</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="login.html">login</a></li>
                        </ul>
                    </li>
                    <li class="has-dropdown"><a href="#">Blogs</a>
                        <ul class="sub-menu">
                            <li><a href="blog.html">Blog Grid</a></li>
                            <li><a href="blog-details.html">Blog Details</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contacts Us</a></li>
                </ul>
            </nav>
            <!-- side-mobile-menu end -->
        </aside>
        <div class="body-overlay"></div>
        <!-- slide-bar end -->


        
        <main>
            <?php echo $__env->yieldContent('content'); ?>

        </main>
        

        <!-- subscribe-area start -->
        <section class="subscribe-area">
            <div class="container">
                <div class="subscribe-two theme-bg">
                    <img class="cta-shape shape_01" src="/img/shape/c1.svg" alt="">
                    <img class="cta-shape shape_02" src="/img/shape/c2.svg" alt="">
                    <img class="cta-shape shape_03" src="/img/shape/c3.svg" alt="">
                    <img class="cta-shape shape_04" src="/img/shape/c4.svg" alt="">
                    <img class="cta-shape shape_05" src="/img/shape/c5.svg" alt="">
                    <img class="cta-shape shape_06" src="/img/shape/c6.svg" alt="">
                    <img class="cta-shape shape_07" src="/img/shape/c7.svg" alt="">
                    <div class="row align-items-center">
                        <div class="col-xl-6">
                            <div class="subscribe-wrapper text-center text-xl-start mb-30">
                                <h2>Subscribe our Newsletter & Get every updates.</h2>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="subscribe-wrapper text-center mb-30">
                                <div class="subscribe-form-box pos-rel">
                                    <form class="subscribe-form sub-form-2">
                                        <input type="text" placeholder="Write Your E-mail">
                                    </form>
                                    <button class="sub_btn">Subscribe Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- subscribe-area end -->

        <!--footer-area start-->
        <footer class="footer-area footer-bg pt-220 pb-25 pt-md-100 pt-xs-100">
            <div class="footer-blur"></div>
            <div class="container">
                <div class="row mb-15">
                    <div class="col-xl-3 col-lg-4 col-md-6  wow fadeInUp2 animated" data-wow-delay='.1s'>
                        <div class="footer__widget mb-30">
                            <div class="footer-log mb-20">
                                <a href="index.html" class="logo">
                                    <img src="/img/logo_aser.png" alt="">
                                </a>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consetetur sadip scing elitr, sed di nonumy eirmod temporinvi dunt ut labore lorem ipsum.</p>
                            <div class="social-media footer__social mt-30">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-google-plus-g"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp2 animated" data-wow-delay='.3s'>
                        <div class="footer__widget mb-30 pl-40 pl-md-0 pl-xs-0">
                            <h6 class="widget-title mb-35">Contact us</h6>
                            <ul class="fot-list">
                                <li><a href="#">info@example.com</a></li>
                                <li><a href="#">+00 235 695 58</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6  wow fadeInUp2 animated" data-wow-delay='.5s'>
                        <div class="footer__widget mb-25 pl-65 pl-md-0 pl-xs-0">
                            <h6 class="widget-title mb-35">Quick Links</h6>
                            <ul class="fot-list">
                                <li><a href="#">About US</a></li>
                                <li><a href="#">Explore Pages</a></li>
                                <li><a href="#">Our Services</a></li>
                                <li><a href="#">Destinations</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6  wow fadeInUp2 animated" data-wow-delay='.7s'>
                        <div class="footer__widget mb-30 pl-150 pl-lg-0 pl-md-0 pl-xs-0">
                            <h6 class="widget-title mb-35">Features</h6>
                            <ul class="fot-list mb-30">
                                <li><a href="#">Home Page</a> </li>
                                <li><a href="#">Testimonials</a></li>
                                <li><a href="blog.html">Latest News</a></li>
                                <li><a href="#">Help Center</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copy-right-area border-bot pt-40">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="copyright">
                                <h5>Copyright@ 2021 <a href="#">Zoomy</a>. All Rights Reserved</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--footer-area end-->
    




    <!-- JS here -->
    <script src="<?php echo e(asset('js/vendor/modernizr-3.5.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor/jquery-2.2.4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>s
    <script src="<?php echo e(asset('js/isotope.pkgd.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/slick.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/metisMenu.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.nice-select.js')); ?>"></script>
    <script src="<?php echo e(asset('js/ajax-form.js')); ?>"></script>
    <script src="<?php echo e(asset('js/wow.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.counterup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.scrollUp.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/imagesloaded.pkgd.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.magnific-popup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.easypiechart.js')); ?>"></script>
    <script src="<?php echo e(asset('js/plugins.js')); ?>"></script>
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>
    <script src="<?php echo e(asset('js/additional.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/dropify/js/dropify.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.tagsinput.min.js')); ?>"></script>

    <?php echo $__env->yieldPushContent('script'); ?>
</body>

</html>
