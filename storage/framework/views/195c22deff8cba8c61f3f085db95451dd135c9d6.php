<?php $__env->startSection('content'); ?>
<section class="pt-150 pb-120 pt-md-100 pt-xs-100 pb-md-70 pb-xs-70">
    <div class="container">
        <?php if($message = Session::get('error')): ?>
            <div class="alert alert-danger alert-dismissible alert-block" role="alert" style="top: 50%">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong><?php echo e($message); ?></strong>
            </div>
		<?php endif; ?>
        <?php if(Session::has('success')): ?>
            <div class="alert alert-success">
                <?php echo e(Session::get('success')); ?>

                <?php
                Session::forget('success');
                ?>
            </div>
        <?php endif; ?>

        
        <?php if(Auth::user()->university == '' || Auth::user()->university == null || Auth::user()->address == '' || Auth::user()->address == null || Auth::user()->city == '' || Auth::user()->city == null || Auth::user()->country == '' || Auth::user()->country == null): ?>
        <div class="row justify-content-center mt-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Please fill this data for your paper’s credentials
                    </div>
                    <div class="card-body">
                        <form method="POST" action="<?php echo e(url('/fullpaper/updateprofile')); ?>">
                            <?php echo csrf_field(); ?>

                            <div class="form-group row justify-content-center mb-3">
                                <label for="university" class="col-md-5 col-form-label"><?php echo e(__('Corespondence Author’s Intitution / University')); ?></label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control<?php echo e($errors->has('university') ? ' is-invalid' : ''); ?>" name="university" value="<?php echo e(old('university')); ?>" aria-describedby="universityHelp" required autofocus>
                                    <?php if($errors->has('university')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('university')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                    <div id="universityHelp" class="form-text">enter your Institution / University here as lead Author.</div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center mb-3">
                                <label for="status" class="col-md-5 col-form-label">Corespondence Author’s Country</label>
                                <div class="col-md-7">
                                    <select class="nice-select wide" name="country" required autofocus>
                                        <option value='' selected disabled>country</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Philipine">Philipine</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center mb-3">
                                <label for="address" class="col-md-5 col-form-label"><?php echo e(__('Corespondence Author’s Address')); ?></label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control<?php echo e($errors->has('address') ? ' is-invalid' : ''); ?>" name="address" value="<?php echo e(old('address')); ?>" aria-describedby="addressHelp" required autofocus>
                                    <?php if($errors->has('address')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('address')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                    <div id="addressHelp" class="form-text">enter your address here as lead Author.</div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center mb-3">
                                <label for="city" class="col-md-5 col-form-label"><?php echo e(__('Corespondence Author’s City')); ?></label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control<?php echo e($errors->has('city') ? ' is-invalid' : ''); ?>" name="city" value="<?php echo e(old('city')); ?>" aria-describedby="cityHelp" required autofocus>
                                    <?php if($errors->has('city')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('city')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                    <div id="cityHelp" class="form-text">enter your city here as lead Author.</div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12 text-end">
                                    <button type="submit" class="btn btn-primary">
                                        <?php echo e(__('Save')); ?>

                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php else: ?>
            <div class="d-flex align-items-start">
                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link <?php echo e($tab==0?'active':''); ?>" id="v-pills-team-tab" data-bs-toggle="pill" data-bs-target="#v-pills-team" type="button" role="tab" aria-controls="v-pills-team" aria-selected="true"><i class="fa fa-user"></i> Team</button>
                    <button class="nav-link <?php echo e($tab==1?'active':''); ?>" id="v-pills-task-tab" data-bs-toggle="pill" data-bs-target="#v-pills-task" type="button" role="tab" aria-controls="v-pills-task" aria-selected="false"><i class="fa fa-star"></i> Task</button>
                    <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="fa fa-envelope"></i> Messages</button>
                    <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false" disabled><i class="fa fa-cog"></i> Settings</button>
                </div>
                <div class="tab-content w-100" id="v-pills-tabContent">
                    <div class="tab-pane fade <?php echo e($tab==0?'show active':''); ?>" id="v-pills-team" role="tabpanel" aria-labelledby="v-pills-team-tab">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-11">
                                    <div class="row my-3">
                                        <div class="col-md-6 text-start">
                                            <h4>My Team</h4>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTeam">
                                            <i class="fa fa-plus"> Add Team's Member</i>
                                            </button>
                                        </div>
                                    </div>

                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>University</th>
                                                    <th>Country</th>
                                                    <th>address</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><b><?php echo e($user->name); ?></b></td>
                                                    <td><b><?php echo e($user->university); ?></b></td>
                                                    <td><b><?php echo e($user->country); ?></b></td>
                                                    <td><b><?php echo e($user->address); ?>,<?php echo e($user->city); ?></b></td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary" disabled><i class="fa fa-pencil"></i></button>
                                                        <button class="btn btn-danger" disabled><i class="fa fa-trash"></i></button>
                                                </tr>
                                                <?php $__currentLoopData = $team; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    
                                                    <td><?php echo e($t->name); ?></td>
                                                    <td><?php echo e($t->university); ?></td>
                                                    <td><?php echo e($t->country); ?></td>
                                                    <td><?php echo e($t->address); ?>,<?php echo e($t->city); ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editTeam" data-bs-id="<?php echo e($t->id); ?>" data-bs-name="<?php echo e($t->name); ?>" data-bs-university="<?php echo e($t->university); ?>" data-bs-country="<?php echo e($t->country); ?>" data-bs-address="<?php echo e($t->address); ?>" data-bs-city="<?php echo e($t->city); ?>"><i class="fa fa-pencil"></i></button>
                                                        <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')" href="/fullpaper/deleteteam/<?php echo e($t->id); ?>"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    <div class="row mt-50">
                                        <div class="col-md-12 text-end">
                                            <button class="btn btn-primary col-md-6 p-3" data-bs-toggle="pill" id="next-step">
                                                Next Step <i class="fa fa-arrow-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade <?php echo e($tab==1?'show active':''); ?>" id="v-pills-task" role="tabpanel" aria-labelledby="v-pills-task-tab">
                        <div class="card-body">
                            <div class="row my-3">
                                <div class="col-md-6 text-start">
                                    <h4>My Task</h4>
                                </div>
                                <div class="col-md-6 text-end">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAbstract" <?php echo e(count($paper) > 0?'disabled':''); ?>>
                                    <i class="fa fa-plus"> Add Task</i>
                                    </button>
                                </div>
                            </div>
                            <div class="row justify-content-center text-center mt-4 mb-4">
                                <div class="col-md-11">
                                    <span class="orange p-2"><i class="fas fa-exclamation-circle"></i> all file must be in pdf format, except proof of payment you can upload a file with extension jpg,png,pdf or jpeg</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered w-auto">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle" scope="col" width="22%">title</th>
                                                <th class="text-center align-middle" scope="col" width="13%">keywords</th>
                                                <th class="text-center align-middle" scope="col" width="13%">Abstract</th>
                                                <th class="text-center align-middle" scope="col" width="13%">Proof of payment</th>
                                                <th class="text-center align-middle" scope="col" width="13%">Fullpaper</th>
                                                <th class="text-center align-middle" scope="col" width="13%">Powerpoint</th>
                                                <th class="text-center align-middle" scope="col" width="13%">status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="7">
                                                    <div class="row my-3">
                                                        <div class="col-md-12 text-center">
                                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAbstract" <?php echo e(count($paper) > 0?'disabled':''); ?>>
                                                            <i class="fa fa-plus"> Add Task</i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $__currentLoopData = $paper; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paper): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>

                                                <td><?php echo e($paper->title); ?></td>
                                                <td>
                                                    <?php $__currentLoopData = $paper->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <label class="badge bg-info"><?php echo e($tag->name); ?></label>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </td>
                                                <td>
                                                    <?php if($paper->abstract != NULL): ?>
                                                        
                                                        <button type="button " class="button-link" data-bs-toggle="modal" data-bs-target="#openPDFModal" data-bs-pdf="<?php echo e(url($paper->abstract)); ?>">My files <?php
                                                            $abstract = explode('/',$paper->abstract);
                                                            echo '('.end($abstract).')';
                                                        ?></button>
                                                        <?php if($paper->abstract_status == 'revision'): ?>
                                                            <form action="<?php echo e(url('/fullpaper/editabstract')); ?>" method="post" enctype="multipart/form-data">
                                                                <?php echo e(csrf_field()); ?>

                                                                <input type="hidden" name="id" value="<?php echo e($paper->id); ?>">
                                                                <div class="form-group">
                                                                    <input type="file" class="dropify" name="abstract" data-allowed-file-extensions="pdf" data-max-file-size="10240K">
                                                                </div>
                                                                <div class="col-md-12 text-end">
                                                                    <input type="submit" value="Upload" class="btn btn-primary">
                                                                </div>
                                                            </form>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($paper->payment != NULL): ?>
                                                        <a href="<?php echo e(url($paper->payment)); ?>" target="blank"><img width="150px" src="<?php echo e(url($paper->payment)); ?>"></a>
                                                        <?php if($paper->payment_status == null || $paper->payment_status == 'unpaid'): ?>
                                                            <p>waiting for validation</p>
                                                        <?php else: ?>
                                                            <p>payment valid, you can continue to upload document</p>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <form action="<?php echo e(url('/fullpaper/payment')); ?>" method="post" enctype="multipart/form-data">
                                                            <?php echo e(csrf_field()); ?>

                                                            <input type="hidden" name="id" value="<?php echo e($paper->id); ?>">
                                                            <div class="form-group">
                                                                <input type="file" class="dropifypayment" name="bukti_transfer" data-allowed-file-extensions="png jpg pdf jpeg" data-max-file-size="10240K">
                                                            </div>
                                                            <div class="col-md-12 text-end">
                                                                <input type="submit" value="Upload" class="btn btn-primary" <?php echo e($paper->abstract_status != 'accepted' ? 'disabled':''); ?>>
                                                            </div>
                                                        </form>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($paper->fullpaper != null): ?>
                                                        <button type="button " class="button-link" data-bs-toggle="modal" data-bs-target="#openPDFModal" data-bs-pdf="<?php echo e(url($paper->fullpaper)); ?>">My files <?php
                                                            $fullpaper = explode('/',$paper->fullpaper);
                                                            echo '('.end($fullpaper).')';
                                                        ?></button>
                                                    <?php else: ?>
                                                        <form action="<?php echo e(url('/fullpaper/fullpaper')); ?>" method="post" enctype="multipart/form-data">
                                                            <?php echo e(csrf_field()); ?>

                                                            <input type="hidden" name="id" value="<?php echo e($paper->id); ?>">
                                                            <div class="form-group">
                                                                <input type="file" class="dropify" name="fullpaper" data-allowed-file-extensions="pdf" data-max-file-size="10240K">
                                                            </div>
                                                            <div class="col-md-12 text-end">
                                                                <input type="submit" value="Upload" class="btn btn-primary" <?php echo e($paper->payment_status != 'paid' || $paper->abstract_status != 'accepted' ? 'disabled':''); ?>>
                                                            </div>
                                                        </form>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($paper->powerpoint != null): ?>
                                                    <button type="button " class="button-link" data-bs-toggle="modal" data-bs-target="#openPDFModal" data-bs-pdf="<?php echo e(url($paper->powerpoint)); ?>">My files <?php
                                                        $ppt = explode('/',$paper->powerpoint);
                                                        echo '('.end($ppt).')';
                                                    ?></button>
                                                    <?php else: ?>
                                                        <form action="<?php echo e(url('/fullpaper/ppt')); ?>" method="post" enctype="multipart/form-data">
                                                            <?php echo e(csrf_field()); ?>

                                                            <input type="hidden" name="id" value="<?php echo e($paper->id); ?>">
                                                            <div class="form-group">
                                                                <input type="file" class="dropify" name="ppt" data-allowed-file-extensions="pdf" data-max-file-size="10240K">
                                                            </div>
                                                            <div class="col-md-12 text-end">
                                                                <input type="submit" value="Upload" class="btn btn-primary" <?php echo e($paper->payment_status != 'paid' || $paper->abstract_status != 'accepted' ? 'disabled':''); ?>>
                                                            </div>
                                                        </form>
                                                    <?php endif; ?>
                                                </td>

                                                <td class="align-middle text-center">
                                                    <?php if($paper->paper_status === null || $paper->paper_status === ''): ?>
                                                        <h6 class="fw-bold">Abstract status</h6>
                                                        <p class="<?php echo e($paper->abstract_status == 'submitted'?'fw-bold orange':''); ?>">Submitted</p>
                                                        <p class="<?php echo e($paper->abstract_status == 'under review'?'fw-bold orange':''); ?>">Under review</p>
                                                        <p class="<?php echo e($paper->abstract_status == 'accepted'?'fw-bold orange':''); ?>">Accepted</p>
                                                        <p class="<?php echo e($paper->abstract_status == 'revision'?'fw-bold orange':''); ?>">Revision</p>
                                                        <p class="<?php echo e($paper->abstract_status == 'rejected'?'fw-bold orange':''); ?>">Rejected</p>
                                                    <?php else: ?>
                                                        <h6 class="fw-bold">Abstract status</h6>
                                                        <p class="fw-bold orange"><?php echo e($paper->abstract_status); ?></p>
                                                        <h6 class="fw-bold">Paper status</h6>
                                                        <p class="<?php echo e($paper->paper_status == 'submitted'?'fw-bold orange':''); ?>">Submitted</p>
                                                        <p class="<?php echo e($paper->paper_status == 'under review'?'fw-bold orange':''); ?>">Under review</p>
                                                        <p class="<?php echo e($paper->paper_status == 'accepted'?'fw-bold orange':''); ?>">Accepted</p>
                                                        <p class="<?php echo e($paper->paper_status == 'revision'?'fw-bold orange':''); ?>">Revision</p>
                                                        <p class="<?php echo e($paper->paper_status == 'rejected'?'fw-bold orange':''); ?>">Rejected</p>
                                                    <?php endif; ?>

                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <div class="row justify-content-center">
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
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">4</div>
                </div>
            </div>

        <?php endif; ?>
    </div>

    
</section>

<div class="modal fade" id="addTeam" tabindex="-1" aria-labelledby="addTeamLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/fullpaper/addteam" method="post">
            <?php echo e(csrf_field()); ?>

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTeamLabel">Add team’s credentials</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="name" required>
                        <div class="form-text">enter name here for <?php if($team->count() < 1): ?> second
                        <?php elseif( $team->count()==1): ?> third
                        <?php elseif($team->count()==2): ?> fourth
                        <?php elseif($team->count()==3): ?> fifth
                        <?php elseif($team->count()==4): ?> sixth
                        <?php else: ?> seven
                        <?php endif; ?> Author.</div>

                    </div>
                    <div class="form-group mb-3">
                        <label for="university">University</label>
                        <input type="text" class="form-control" name="university" placeholder="university" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="status" class="form-label">Country</label>
                            <select class="nice-select wide" name="country" required>
                                <option selected disabled>country</option>
                                <option value="Australia">Australia</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Philipine">Philipine</option>
                            </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="address" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="city">City</label>
                        <input type="text" class="form-control" name="city" placeholder="city" required>
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

<!-- Modal edit team -->
<div class="modal fade" id="editTeam" tabindex="-1" aria-labelledby="editTeam" aria-hidden="true">
    <div class="modal-dialog">
        <form name="modal_edit_team" id="modal_edit_team" action="/fullpaper/updateteam" method="post">
            <?php echo e(csrf_field()); ?>

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Team</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="id" id="id" value="">
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="name" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="university">University</label>
                        <input type="text" class="form-control" name="university" placeholder="university" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="country" class="form-label">Country</label>
                            <select class="nice-select wide" name="country" required>
                                <option selected disabled>country</option>
                                <option value="Australia">Australia</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Philipine">Philipine</option>
                            </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="address" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="city">City</label>
                        <input type="text" class="form-control" name="city" placeholder="city" required>
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


<div class="modal fade" id="addAbstract" tabindex="-1" aria-labelledby="addAbstractLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?php echo e(url('/fullpaper/abstract')); ?>" method="post" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTeamLabel">Add Abstract</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="name">Title</label>
                        <input type="text" class="form-control text-uppercase" name="title" placeholder="Title" required>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="keyword">Keyword</label>
                        <input type="text" class="form-control" name="tags" required/>
                        <div id="keywordHelp" class="form-text">enter at least 3 keywords</div>
                    </div>
                    <div class="form-group">
                        <input type="file" class="dropify" name="abstract" data-allowed-file-extensions="png jpg pdf jpeg" data-max-file-size="10240K">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload Abstract</button>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade" id="openPDFModal" tabindex="-1" aria-labelledby="openPDFModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header d-none">
                <h5 class="modal-title" id="openPDFModalLabel"></h5>
                
            </div>
            <div class="modal-body">
                <iframe id="pdf" src="" frameBorder="0" scrolling="no" style="height: 90vh" width="100%">
                </iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<script>


    // function editTeam(e) {
    //     var getid = e.dataset.id;
    //     var getname = e.dataset.name;
    //     var getnim = e.dataset.nim;
    //     var id = document.getElementById('id');
    //     var name = document.getElementById('name');
    //     var nim = document.getElementById('nim');

    //     var myModalEdit = new bootstrap.Modal(document.getElementById('editTeam'))
    //     myModalEdit.show(
    //         id.value = getid,
    //         name.value = getname,
    //         nim.value = getnim,
    //     )

    // }

    var editTeamModal = document.getElementById('editTeam')
        editTeamModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var id = button.getAttribute('data-bs-id')
        var name = button.getAttribute('data-bs-name')
        var university = button.getAttribute('data-bs-university')
        var country = button.getAttribute('data-bs-country')
        var address = button.getAttribute('data-bs-address')
        var city = button.getAttribute('data-bs-city')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var inputId = editTeamModal.querySelector('.modal-body input[name="id"]')
        inputId.value = id
        var inputName = editTeamModal.querySelector('.modal-body input[name="name"]')
        inputName.value = name
        var inputUniversity = editTeamModal.querySelector('.modal-body input[name="university"]')
        inputUniversity.value = university
        var inputCountry = editTeamModal.querySelector('.modal-body select[name="country"]')
        inputCountry.value = country
        var inputCountry2 = editTeamModal.querySelectorAll('.modal span.current')[0]
        inputCountry2.innerHTML = country
        var inputAddress = editTeamModal.querySelector('.modal-body input[name="address"]')
        inputAddress.value = address
        var inputCity = editTeamModal.querySelector('.modal-body input[name="city"]')
        inputCity.value = city
    })

    var openPDFModal = document.getElementById('openPDFModal')
    openPDFModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget

        var recipient = button.getAttribute('data-bs-pdf')

        var modalTitle = openPDFModal.querySelector('.modal-title')
        var modalBodyIframe = openPDFModal.querySelector('.modal-body iframe')

        modalTitle.textContent = 'https://drive.google.com/viewerng/viewer?embedded=true&url=' + recipient + '#toolbar=0&scrollbar=0'
        modalBodyIframe.src = recipient
    })

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>