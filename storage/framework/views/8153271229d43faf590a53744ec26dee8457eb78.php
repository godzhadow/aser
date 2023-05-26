<?php $__env->startSection('contentAdmin'); ?>
    <div class="container">
        <?php if(Session::has('message')): ?>
            <div class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?> alert-dismissible alert-block" role="alert" style="top: 50%">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong><?php echo e(Session::get('message')); ?></strong>
            </div>
        <?php endif; ?>

        <div class="row justify-content-center mt-5">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="<?php echo e(url('/addabstract')); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <div class="form-group row justify-content-center mb-3">
                                <label for="title" class="col-md-3 col-form-label"><?php echo e(__('title')); ?></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control<?php echo e($errors->has('title') ? ' is-invalid' : ''); ?> text-uppercase" name="title" value="<?php echo e(old('title')); ?>" aria-describedby="titleHelp" required autofocus>
                                    <?php if($errors->has('title')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('title')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center mb-3">
                                <label for="authors" class="col-md-3 col-form-label"><?php echo e(__('authors')); ?></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control<?php echo e($errors->has('authors') ? ' is-invalid' : ''); ?>" name="authors" value="<?php echo e(old('authors')); ?>" aria-describedby="authorsHelp" required autofocus>
                                    <?php if($errors->has('authors')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('authors')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center mb-3">
                                <label class="col-form-label">Abstract Submission</label>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="start_date" class="col-md-3 col-form-label">Start Date</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control<?php echo e($errors->has('year') ? ' is-invalid' : ''); ?>" name="year" value="<?php echo e(old('year')); ?>" aria-describedby="yearHelp" required autofocus>
                                            <?php if($errors->has('year')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('year')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="start_date" class="col-md-3 col-form-label">Start Date</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control<?php echo e($errors->has('year') ? ' is-invalid' : ''); ?>" name="year" value="<?php echo e(old('year')); ?>" aria-describedby="yearHelp" required autofocus>
                                            <?php if($errors->has('year')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('year')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center mb-3">
                                <label class="col-form-label">Presentation Submission</label>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="start_date" class="col-md-3 col-form-label">Start Date</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control<?php echo e($errors->has('year') ? ' is-invalid' : ''); ?>" name="year" value="<?php echo e(old('year')); ?>" aria-describedby="yearHelp" required autofocus>
                                            <?php if($errors->has('year')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('year')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="start_date" class="col-md-3 col-form-label">Start Date</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control<?php echo e($errors->has('year') ? ' is-invalid' : ''); ?>" name="year" value="<?php echo e(old('year')); ?>" aria-describedby="yearHelp" required autofocus>
                                            <?php if($errors->has('year')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('year')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center mb-3">
                                <label class="col-form-label">Paper Submission</label>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="start_date" class="col-md-3 col-form-label">Start Date</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control<?php echo e($errors->has('year') ? ' is-invalid' : ''); ?>" name="year" value="<?php echo e(old('year')); ?>" aria-describedby="yearHelp" required autofocus>
                                            <?php if($errors->has('year')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('year')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="start_date" class="col-md-3 col-form-label">Start Date</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control<?php echo e($errors->has('year') ? ' is-invalid' : ''); ?>" name="year" value="<?php echo e(old('year')); ?>" aria-describedby="yearHelp" required autofocus>
                                            <?php if($errors->has('year')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('year')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center mb-3">
                                <label class="col-form-label">Conference Schedule</label>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="start_date" class="col-md-3 col-form-label">Start Date</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control<?php echo e($errors->has('year') ? ' is-invalid' : ''); ?>" name="year" value="<?php echo e(old('year')); ?>" aria-describedby="yearHelp" required autofocus>
                                            <?php if($errors->has('year')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('year')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="start_date" class="col-md-3 col-form-label">Start Date</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control<?php echo e($errors->has('year') ? ' is-invalid' : ''); ?>" name="year" value="<?php echo e(old('year')); ?>" aria-describedby="yearHelp" required autofocus>
                                            <?php if($errors->has('year')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('year')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
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
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.template.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>