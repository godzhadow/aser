<?php $__env->startSection('content'); ?>
<section class="contact-form-area pt-130 pt-md-100 pt-xs-100">
    <section class="page-title-area d-flex align-items-end" style="background-image: url(img/login/breadcrumb.png);heigh:100px">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-12">
                    <div class="page-title-wrapper mb-50">
                    <h1 class="page-title mb-25">Login</h1>
                    <div class="breadcrumb-list">
                        <ul class="breadcrumb">
                            <li><a href="index.html">Home - </a></li>
                            <li><a href="#"> Preregister</a></li>
                        </ul>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
</section>
<section class="what-looking-for pos-rel">
    <div class="what-blur-shape-one"></div>
    <div class="what-blur-shape-two"></div>
    <div class="what-look-bg gradient-bg pt-145 pb-130 pt-md-95 pb-md-80 pt-xs-95 pb-xs-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center mb-55">
                        <h5 class="bottom-line mb-25">Teachers & Students</h5>
                        <h2>What you Looking For?</h2>
                    </div>
                </div>
            </div>
            <div class="row mb-85">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="what-box text-center mb-35 wow fadeInUp2 animated" data-wow-delay='.3s'>
                        <div class="what-box__icon mb-30">
                            <img src="assets/img/icon/phone-operator.svg" alt="">
                        </div>
                        <h3>Full paper</h3>
                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed di nonumy eirmod tempor invidunt ut labore et dolore magn aliq erat.</p>
                        <a href="<?php echo e(route('register', ['ref' => 'full paper'])); ?>" class="theme_btn border_btn">Register Now</a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="what-box text-center mb-35 wow fadeInUp2 animated" data-wow-delay='.3s'>
                        <div class="what-box__icon mb-30">
                            <img src="assets/img/icon/graduate.svg" alt="">
                        </div>
                        <h3>Non-full paper</h3>
                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed di nonumy eirmod tempor invidunt ut labore et dolore magn aliq erat.</p>
                        <a href="<?php echo e(route('register', ['ref' => 'non-full paper'])); ?>" class="theme_btn border_btn">Register Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>