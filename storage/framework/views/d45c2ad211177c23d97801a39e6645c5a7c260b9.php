<?php $__env->startSection('content'); ?>
<section class="pt-135 pb-120 pt-md-100 pt-xs-100 pb-md-70 pb-xs-70">
    
        
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item text-end">
                        <a class="nav-link tabs-menu-button <?php echo e(Request::is('admin/users*') ? 'active' : ''); ?>" aria-current="page" href="/admin/users">Users</a>
                        </li>
                        <li class="nav-item text-end">
                        <a class="nav-link tabs-menu-button" href="#">Abstract</a>
                        </li>
                        <li class="nav-item text-end">
                        <a class="nav-link tabs-menu-button" href="#">Webinar</a>
                        </li>
                        <li class="nav-item text-end">
                        <a class="nav-link tabs-menu-button" href="#">Virtual Conference</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-9">
                    <?php echo $__env->yieldContent('admincontent'); ?>
                </div>
            </div>
        </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>