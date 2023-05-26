<?php $__env->startSection('admincontent'); ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <a class="btn btn-warning" href="/admin/users"> Back</a>

                <div class="card-body">
                    <form action="/admin/users/store" method="post">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="name" class="form-control" name="name" id="name" placeholder="name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="email" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="role">User Role</label>
                            <select class="nice-select wide" id="role" name="role">
                                <option value="admin">Admin</option>
                                <option value="reviewer">Reviewer</option>
                                <option value="full paper">Full Paper</option>
                                <option value="non-full paper">Non Full Paper</option>
                                <option value="discussant">Discussant</option>
                                <option value="session head">Session Head</option>
                                <option value="opening speech">Opening Speech</option>
                                <option value="speaker workshop"> Speaker Workshop</option>
                            </select>
                        </div>
                        <div class="col-md-12 mt-10 text-end">
                            <button class="btn btn-primary mt-10" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>