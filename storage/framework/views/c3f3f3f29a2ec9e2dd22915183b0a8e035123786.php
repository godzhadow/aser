<?php $__env->startSection('contentAdmin'); ?>
    <div class="container">
        <?php if(Session::has('message')): ?>
            <div class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?> alert-dismissible alert-block" role="alert" style="top: 50%">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong><?php echo e(Session::get('message')); ?></strong>
            </div>
        <?php endif; ?>

        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="row bg-light">
                        <div class="col-md-3 ps-0 pe-0 message-contact">
                            <div class="nav flex-column nav-pills" id="message-pills-tab" role="tablist" aria-orientation="vertical">
                                <?php $__currentLoopData = $paperuser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $ps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <button class="nav-link <?php echo e($index == 0 ? 'active':''); ?> paddingleft" id="message-pills-tab-<?php echo e($ps->id); ?>" data-bs-toggle="pill" data-bs-target="#v-pills-user-<?php echo e($ps->id); ?>" type="button" role="tab" aria-controls="v-pills-user-<?php echo e($ps->id); ?>" aria-selected="true"><?php echo e($ps->name); ?></button>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <div class="col-md-9 border-start">
                            <div class="tab-content w-100" id="message-pills-tabContent">
                                <?php $__currentLoopData = $paperuser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $ps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="tab-pane fade <?php echo e($index==0 ? 'show active':''); ?>" id="v-pills-user-<?php echo e($ps->id); ?>" role="tabpanel" aria-labelledby="v-pills-user-tab">
                                    <div class="row">
                                        <div class="col">
                                            <div class="row message-content">
                                                <div class="col">
                                                    <?php $__currentLoopData = $ps->message; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                            <div class="row message-input">
                                                <div class="col">
                                                    <form action="/admin/sendmessage" method="post">
                                                        <?php echo e(csrf_field()); ?>

                                                        <div class="input-group mb-3">
                                                            <input type="hidden" name="id" value="<?php echo e($ps->id); ?>">
                                                            <input type="text" class="form-control" placeholder="send message" aria-label="send message" aria-describedby="button-addon2" name="message">
                                                            <button class="btn btn-primary" type="submit" id="button-addon2"><i class="fa fa-paper-plane"></i></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.template.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>