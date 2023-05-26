<?php $__env->startSection('contentFullpaper'); ?>
<?php $__env->startPush('links'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
<?php $__env->stopPush(); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <?php echo $calendar->calendar(); ?>

            </div>
        </div>
    </div>

<?php $__env->startPush('script'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
<?php echo $calendar->script(); ?>

<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('fullpaper.template.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>