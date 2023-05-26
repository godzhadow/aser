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
                <div class="col-md-10">
                    <div class="row mt-3 mb-3">
                        <div class="col">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUser">
                                <i class="fa fa-plus"></i> Add new User
                            </button>
                        </div>
                        <div class="col text-end">
                            
                            <form action="/admin/dashboard/user" method="GET" id="formSearchUser">
                                <div class="input-group mb-3">
                                    <input type="text" name="searchUser" id="searchUser" placeholder="Search .." value="<?php echo e($searchUser); ?>" onfocus="var value = this.value; this.value = null; this.value = value;">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                                </div>
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
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editUser" data-bs-id="<?php echo e($p->id); ?>" data-bs-name="<?php echo e($p->name); ?>" data-bs-email="<?php echo e($p->email); ?>" data-bs-role="<?php echo e($p->jenis_user); ?>" data-bs-picture="<?php echo e(asset($p->picture)); ?>"><i class="fa fa-pencil"></i></button>
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
    
    <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="/admin/users/store" method="post" enctype="multipart/form-data">
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
                        <div class="form-group">
                            
                            <input type="file" class="dropifyprofileadd" name="photo_profile_add" data-allowed-file-extensions="png jpg jpeg" data-max-file-size="10240K">
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
            <form name="modal_edit_user" id="modal_edit_user" action="/admin/edituser" method="post" enctype="multipart/form-data" >
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
                            <input type="text" class="form-control text-uppercase" name="name" id="name" placeholder="name" required>
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
                        <div class="form-group">
                            
                            <input type="file" class="dropifyprofile" name="photo_profile" data-allowed-file-extensions="png jpg pdf jpeg" data-max-file-size="10240K">
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
    window.onload = function(){
        document.getElementById('searchUser').focus();

    }


    var searchUser = document.getElementById('searchUser');
    var timeout = null;
    var formSearchUser = document.getElementById('formSearchUser');

    searchUser.addEventListener("keyup", function (e) {
        clearTimeout(timeout);
        timeout = setTimeout(function () {
            formSearchUser.submit();
        }, 1000);
    });

    // edit user model
    var editUserModal = document.getElementById('editUser')
    editUserModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var id = button.getAttribute('data-bs-id')
        var name = button.getAttribute('data-bs-name')
        var email = button.getAttribute('data-bs-email')
        var role = button.getAttribute('data-bs-role')
        var profile = button.getAttribute('data-bs-picture')
        console.log(profile)
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var inputId = editUserModal.querySelector('.modal-body input[name="id"]')
        inputId.value = id
        var inputName = editUserModal.querySelector('.modal-body input[name="name"]')
        inputName.value = name
        var inputEmail = editUserModal.querySelector('.modal-body input[name="email"]')
        inputEmail.value = email
        var inputRole = editUserModal.querySelector('.modal-body select[name="role"]')
        inputRole.value = role
        var inputRole2 = editUserModal.querySelectorAll('.modal span.current')[0]
        inputRole2.innerHTML = role

        var inputPicture = editUserModal.querySelector('.modal-body input[name="photo_profile"]')
        // inputPicture.setAttribute("data-default-file", profile);
        var drEvent = $(inputPicture).dropify();
        drEvent = drEvent.data('dropify');
        drEvent.resetPreview();
        drEvent.clearElement();
        drEvent.settings.defaultFile = profile;
        drEvent.destroy();
        drEvent.init();
        $(inputPicture).dropify({
        defaultFile: profile,
        });
    })

    var editUserModal = document.getElementById('editUser')
    editUserModal.addEventListener('hidden.bs.modal', function (event) {
        var inputPicture = editUserModal.querySelector('.modal-body input[name="photo_profile"]')
        console.log('close', inputPicture)
        var drEvent = $(inputPicture).dropify();
        drEvent = drEvent.data('dropify');
        drEvent.resetPreview();
        drEvent.clearElement();

    })
    // end edit user modal
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.template.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>