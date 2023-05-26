<?php $__env->startSection('contentFullpaper'); ?>
    <div class="container">
        

        <div class="row justify-content-center message-content-user">
            <div class="col-md-8 bg-light">
                <?php $__currentLoopData = $user->message; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row mb-3">
                    <div class="col">
                        <div class="chat-bubble chat-bubble--right mb-0">
                            <p class="text-white"><?php echo e($m->message); ?></p>
                            <p class="small text-white text-end">by : <?php echo e($m->sender); ?></p>
                        </div>
                        <div class="row mt-0">
                            <div class="col">
                                <p class="small text-end mt-0 me-4"><?php echo e($m->created_at); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('fullpaper.template.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>