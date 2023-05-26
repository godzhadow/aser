<?php $__env->startSection('contentFullpaper'); ?>
    <div class="container">
        
        <div class="row">
            <?php $__currentLoopData = $webinar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-6 col-md-6 col-sm-6 shadow">
                <div class="z-blogs mb-30 wow fadeInUp2 animated" data-wow-delay='.1s'>
                    <div class="z-blogs__thumb mb-30">
                    <a href="blog-details.html"><img src="<?php echo e(asset('/img/logo_aser.png')); ?>" alt="blog-img"></a>
                    </div>
                    <div class="z-blogs__content">
                        <h5 class="mb-25">Online . School . Skill</h5>
                        <h4 class="sub-title mb-15"><a href="blog-details.html">5 Ways to Use Padlet in Higher -Ed Online Classroom</a></h4>
                        <div class="z-blogs__meta d-sm-flex justify-content-between pt-20 pb-20">
                            <span>Date : <?php echo e(date("d-m-Y", strtotime($w->start_date))); ?><br>Time : <?php echo e(date("H:i:s", strtotime($w->start_date))); ?></span>
                            <span>By <?php echo e($w->user->name); ?></span>
                        </div>
                        <div class="col-md-12 text-center">
                            <button class="btn btn-success text-center">enter conference</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('fullpaper.template.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>