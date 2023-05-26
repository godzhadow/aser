<?php $__env->startSection('admincontent'); ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="row mt-3 mb-3">
                    <div class="col">
                        <a class="btn btn-primary" href="/admin/users/add"><i class="fa fa-plus"></i> Add new User</a>
                    </div>
                    <div class="col text-end">
                        <form action="/admin/users/search" method="GET">
                            <input type="text" name="search" placeholder="Search .." value="<?php echo e(old('search')); ?>">
                            <input type="submit" value="SEARCH">
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($p->id); ?></th>
                                    <td><?php echo e($p->name); ?></td>
                                    <td><?php echo e($p->email); ?></td>
                                    <td><?php echo e($p->jenis_user); ?></td>
                                    <td>
                                        <a class="btn btn-warning" href="/admin/users/edit/<?php echo e($p->id); ?>">Edit</a>
                                        <a class="btn btn-danger" href="/admin/users/delete/<?php echo e($p->id); ?>">Delete</a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                        <br/>
                        Halaman : <?php echo e($user->currentPage()); ?> <br/>
                        Jumlah Data : <?php echo e($user->total()); ?> <br/>
                        Data Per Halaman : <?php echo e($user->perPage()); ?> <br/>


                        <?php echo e($user->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>