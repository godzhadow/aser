<?php $__env->startSection('content'); ?>
<section class="contact-form-area pt-130 pb-120 pt-md-100 pt-xs-100 pb-md-70 pb-xs-70">
    <section class="page-title-area d-flex align-items-end mb-40" style="background-image: url(img/login/breadcrumb.png);heigh:100px">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-12">
                    <div class="page-title-wrapper mb-50">
                    <h1 class="page-title mb-25">Login</h1>
                    <div class="breadcrumb-list">
                        <ul class="breadcrumb">
                            <li><a href="index.html">Home - </a></li>
                            <li><a href="#"> Login</a></li>
                        </ul>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h4 class="text-center mb-5">LOGIN</h4>
                <form method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="input-group mb-3 text-center">
                        <div class="input-group-prepend">
                        </div>
                        <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" placeholder="E-mail Address" aria-label="email" aria-describedby="basic-addon1" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
                        <?php if($errors->has('email')): ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('email')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="input-group mb-3 text-center">
                        <input id="password" type="password" class="form-control input-pass<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                            <a class="input-group-text password-icon" onclick="toggleShow()">
                                <i id="iconeye" class="fa fa-eye-slash"></i>
                            </a>
                        </div>
                        <?php if($errors->has('password')): ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('password')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group row clearfix">
                        <div class="col-md-6 float-left">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                                <label class="form-check-label" for="remember">
                                    <b><?php echo e(__('Remember Me')); ?></b>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <?php if(Route::has('password.request')): ?>
                                <a class="btn btn-link theme_text" href="<?php echo e(route('password.request')); ?>">
                                    <?php echo e(__('Forgot Your Password?')); ?>

                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group row mb-0 text-center">
                        <div class="col-md-12">
                            <button type="submit" name="login" class="btn global_btn col-2 mb-3">
                                <?php echo e(__('Login')); ?>

                            </button>
                            <p>Dont have account yet ?</p><p>please <b><a href="/preregister" class="register_link">register here</a></b></p>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</section>
<script>
function toggleShow() {
    var x = document.getElementById("password");
    var icon = document.getElementById("iconeye");
    if (x.type === "password") {
        x.type = "text";
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        x.type = "password";
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }

  }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>