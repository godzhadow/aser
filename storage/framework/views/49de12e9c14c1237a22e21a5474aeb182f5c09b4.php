<?php $__env->startSection('contentFullpaper'); ?>
    <div class="container">
        

        <div class="row my-3">
            <div class="col-md-12 text-start">
                <h4>My Task</h4>
            </div>
            
        </div>
        <div class="row justify-content-center text-center mt-4 mb-4">
            <div class="col-md-12">
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
                        <?php if(count($papers) == 0): ?>
                        <tr>
                            <td colspan="7">
                                <div class="row my-3">
                                    <div class="col-md-12 text-center">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAbstract" <?php echo e(count($papers) > 0?'disabled':''); ?>>
                                        <i class="fa fa-plus"> Add Task</i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <?php else: ?>


                        <?php $__currentLoopData = $papers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paper): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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

                        <?php endif; ?>

                    </tbody>
                </table>
            </div>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('fullpaper.template.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>