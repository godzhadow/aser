<?php $__env->startSection('content'); ?>
<section class="pt-150 pb-120 pt-md-100 pt-xs-100 pb-md-70 pb-xs-70">
    <div class="container">
        <?php if(Auth::user()->university == '' || Auth::user()->university == null || Auth::user()->address == '' || Auth::user()->address == null || Auth::user()->city == '' || Auth::user()->city == null || Auth::user()->country == '' || Auth::user()->country == null): ?>
        <div class="row justify-content-center mt-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Please fill this data for your paper’s credentials
                    </div>
                    <div class="card-body">
                        <form method="POST" action="<?php echo e(url('/fullpaper/updateprofile')); ?>">
                            <?php echo csrf_field(); ?>

                            <div class="form-group row justify-content-center mb-3">
                                <label for="university" class="col-md-5 col-form-label"><?php echo e(__('Corespondence Author’s Intitution / University')); ?></label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control<?php echo e($errors->has('university') ? ' is-invalid' : ''); ?>" name="university" value="<?php echo e(old('university')); ?>" aria-describedby="universityHelp" required autofocus>
                                    <?php if($errors->has('university')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('university')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                    <div id="universityHelp" class="form-text">enter your Institution / University here as lead Author.</div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center mb-3">
                                <label for="status" class="col-md-5 col-form-label">Corespondence Author’s Country</label>
                                <div class="col-md-7">
                                    <select class="nice-select wide" name="country" required autofocus>
                                        <option value='' selected disabled>country</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Philipine">Philipine</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center mb-3">
                                <label for="address" class="col-md-5 col-form-label"><?php echo e(__('Corespondence Author’s Address')); ?></label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control<?php echo e($errors->has('address') ? ' is-invalid' : ''); ?>" name="address" value="<?php echo e(old('address')); ?>" aria-describedby="addressHelp" required autofocus>
                                    <?php if($errors->has('address')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('address')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                    <div id="addressHelp" class="form-text">enter your address here as lead Author.</div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center mb-3">
                                <label for="city" class="col-md-5 col-form-label"><?php echo e(__('Corespondence Author’s City')); ?></label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control<?php echo e($errors->has('city') ? ' is-invalid' : ''); ?>" name="city" value="<?php echo e(old('city')); ?>" aria-describedby="cityHelp" required autofocus>
                                    <?php if($errors->has('city')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('city')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                    <div id="cityHelp" class="form-text">enter your city here as lead Author.</div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12 text-end">
                                    <button type="submit" class="btn btn-primary">
                                        <?php echo e(__('Save')); ?>

                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php else: ?>
        <div class="row">
            <div class="col-md-2 ps-0 pe-0">
                <ul class="nav nav-pills d-block">
                    <li class="nav-item ps-0">
                        <a class="nav-link <?php echo e(Request::is('fullpaper/dashboard/team') ? 'active' : ''); ?> paddingleft" aria-current="page" href="<?php echo e(url('/fullpaper/dashboard/team')); ?>"><i class="fa fa-user"></i> Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(Request::is('fullpaper/dashboard/paper') ? 'active' : ''); ?> paddingleft" href="<?php echo e(url('/fullpaper/dashboard/paper')); ?>"><i class="fa fa-star"></i> Paper</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(Request::is('fullpaper/dashboard/webinar') ? 'active' : ''); ?> paddingleft" href="<?php echo e(url('/fullpaper/dashboard/webinar')); ?>"><i class="fa fa-users"></i> Webinar/Conference</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(Request::is('fullpaper/dashboard/message') ? 'active' : ''); ?> paddingleft" href="<?php echo e(url('/fullpaper/dashboard/message')); ?>"><i class="fa fa-envelope"></i> Messages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link paddingleft disabled" href="#" tabindex="-1" aria-disabled="true"><i class="fa fa-cog"></i> Settings</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10 border-start ps-0 pe-0">
                <?php echo $__env->yieldContent('contentFullpaper'); ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>