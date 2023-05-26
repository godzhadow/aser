;
<?php $__env->startSection('content'); ?>
<section class="pt-150 pb-120 pt-md-100 pt-xs-100 pb-md-70 pb-xs-70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>

                        You are logged in as <b>Admin!</b>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-start">
            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link active" id="v-pills-user-tab" data-bs-toggle="pill" data-bs-target="#v-pills-user" type="button" role="tab" aria-controls="v-pills-user" aria-selected="true"><i class="fa fa-user"></i> User</button>
                <button class="nav-link" id="v-pills-task-tab" data-bs-toggle="pill" data-bs-target="#v-pills-task" type="button" role="tab" aria-controls="v-pills-task" aria-selected="false"><i class="fa fa-star"></i> Task</button>
                <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false" disabled>Messages</button>
                <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false" disabled>Settings</button>
            </div>
            <div class="tab-content w-100" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-user" role="tabpanel" aria-labelledby="v-pills-user-tab">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <div class="row mt-3 mb-3">
                                    <div class="col">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUser">
                                            <i class="fa fa-plus"></i> Add new User
                                        </button>
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
                                                        <button type="button" class="btn btn-primary" data-id="<?php echo e($p->id); ?>" data-name="<?php echo e($p->name); ?>" data-email="<?php echo e($p->email); ?>" data-role="<?php echo e($p->jenis_user); ?>" onclick="editUser(this)">
                                                            <i class="fa fa-pencil"></i>
                                                        </button>
                                                        <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')" href="/admin/deleteuser/<?php echo e($p->id); ?>"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>

                                        <br/>
                                        


                                        <?php echo e($user->links()); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-task" role="tabpanel" aria-labelledby="v-pills-task-tab">
                    2
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">3</div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">4</div>
            </div>
        </div>
    </div>
</section>


<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/admin/users/store" method="post">
            <?php echo e(csrf_field()); ?>

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTeamLabel">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="name" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="email" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="role">User Role</label>
                        <select class="nice-select wide" name="role">
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="editUser" aria-hidden="true">
    <div class="modal-dialog">
        <form name="modal_edit_user" id="modal_edit_user" action="/admin/edituser" method="post">
            <?php echo e(csrf_field()); ?>

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="id" id="id" value="">
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="name" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">email</label>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>


<script>
    function editUser(e) {
        var getid = e.dataset.id;
        var getname = e.dataset.name;
        var getemail = e.dataset.email;
        var getrole = e.dataset.role;
        var id = document.getElementById('id');
        var name = document.getElementById('name');
        var email = document.getElementById('email');
        var role = document.getElementById('role');

        var myModalEdit = new bootstrap.Modal(document.getElementById('editUser'))
        myModalEdit.show(
            id.value = getid,
            name.value = getname,
            email.value = getemail,
            role.value = getrole,
        )

    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>