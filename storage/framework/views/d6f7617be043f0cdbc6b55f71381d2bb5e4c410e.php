<?php $__env->startSection('admincontent'); ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <a class="btn btn-warning" href="/admin/users"> Back</a>

                <div class="card-body">
                    <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <form action="/admin/users/update" method="post">
                        <?php echo e(csrf_field()); ?>

                        <input type="text" name="id" value="<?php echo e($p->id); ?>"> <br/>
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="name" value="<?php echo e($p->name); ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="email" value="<?php echo e($p->email); ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="role">User Role</label>
                            <select class="nice-select wide" id="role" name="role">
                                <option value="admin" <?php echo e($p->jenis_user == 'admin' ? 'selected' : ''); ?>>Admin</option>
                                <option value="reviewer" <?php echo e($p->jenis_user == 'reviewer' ? 'selected' : ''); ?>>Reviewer</option>
                                <option value="full paper" <?php echo e($p->jenis_user == 'full paper' ? 'selected' : ''); ?>>Full Paper</option>
                                <option value="non-full paper" <?php echo e($p->jenis_user == 'non-full paper' ? 'selected' : ''); ?>>Non Full Paper</option>
                                <option value="discussant" <?php echo e($p->jenis_user == 'discussant' ? 'selected' : ''); ?>>Discussant</option>
                                <option value="session head" <?php echo e($p->jenis_user == 'session head' ? 'selected' : ''); ?>>Session Head</option>
                                <option value="opening speech" <?php echo e($p->jenis_user == 'opening speech' ? 'selected' : ''); ?>>Opening Speech</option>
                                <option value="speaker workshop" <?php echo e($p->jenis_user == 'speaker workshop' ? 'selected' : ''); ?>> Speaker Workshop</option>
                            </select>
                        </div>
                        <div class="col-md-12 mt-10 text-end">
                            <button class="btn btn-primary mt-10" type="submit">Save</button>
                        </div>
                    </form>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>