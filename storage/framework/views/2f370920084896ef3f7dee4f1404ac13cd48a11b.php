<?php $__env->startSection('contentAdmin'); ?>
    <div class="container">
            <?php if(Session::has('message')): ?>
                <div class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?> alert-dismissible alert-block" role="alert" style="top: 50%">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong><?php echo e(Session::get('message')); ?></strong>
                </div>
            <?php endif; ?>

        <div class="row my-3">
            <div class="col-md-6 text-start">
                <h4>Paper</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        Filter
                    </div>
                    <div class="card-body">
                        <form method="GET" action="/admin/dashboard/paper" id="formFilter">
                            
                            <div class="row">
                                <div class="col-md-3">
                                        <select class="nice-select wide" name="year" id="year">
                                            <option value="" <?php echo e($year == ""?'selected':''); ?>>Year</option>
                                            <option value="2020" <?php echo e($year == "2020"?'selected':''); ?>>2020</option>
                                            <option value="2021" <?php echo e($year == "2021"?'selected':''); ?>>2021</option>
                                            <option value="2022" <?php echo e($year == "2022"?'selected':''); ?>>2022</option>
                                            <option value="2023" <?php echo e($year == "2023"?'selected':''); ?>>2023</option>
                                        </select>
                                </div>
                                <div class="col-md-3">
                                    <select class="nice-select wide" name="abstract_status" id="abstract_status">
                                        <option value="" data-display="abstract_status" <?php echo e($abstract_status == ""?'selected':''); ?>>abstract_status</option>
                                        <option value="submitted" <?php echo e($abstract_status == "submitted"?'selected':''); ?>>submitted</option>
                                        <option value="under review" <?php echo e($abstract_status == "under review"?'selected':''); ?>>under review</option>
                                        <option value="accepted" <?php echo e($abstract_status == "accepted"?'selected':''); ?>>accepted</option>
                                        <option value="revision" <?php echo e($abstract_status == "revision"?'selected':''); ?>>revision</option>
                                        <option value="rejected" <?php echo e($abstract_status == "rejected"?'selected':''); ?>>rejected</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select class="nice-select wide" name="paper_status" id="paper_status">
                                        <option value="" data-display="paper_status" <?php echo e($paper_status == ""?'selected':''); ?>>paper_status</option>
                                        <option value="submitted" <?php echo e($paper_status == "submitted"?'selected':''); ?>>submitted</option>
                                        <option value="under review" <?php echo e($paper_status == "under review"?'selected':''); ?>>under review</option>
                                        <option value="accepted" <?php echo e($paper_status == "accepted"?'selected':''); ?>>accepted</option>
                                        <option value="revision" <?php echo e($abstract_status == "revision"?'selected':''); ?>>revision</option>
                                        <option value="rejected" <?php echo e($abstract_status == "rejected"?'selected':''); ?>>rejected</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="searchPaper" name="searchPaper" placeholder="Search .." value="<?php echo e($searchPaper); ?>" onfocus="var value = this.value; this.value = null; this.value = value;">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-sm table-bordered table-striped w-auto text-small small mw-100">
                    <thead>
                        <tr>
                            
                            <th class="text-center align-middle" scope="col" >Team</th>
                            <th class="text-center align-middle" scope="col" >Title</th>
                            <th class="text-center align-middle" scope="col" >Keywords</th>
                            <th class="text-center align-middle" scope="col" >Abstract</th>
                            <th class="text-center align-middle" scope="col" >Fullpaper</th>
                            <th class="text-center align-middle" scope="col" >PowerPoint</th>
                            <th class="text-center align-middle" scope="col" >Proof of payment</th>
                            <th class="text-center align-middle" scope="col" >payment Status</th>
                            <th class="text-center align-middle" scope="col" >abstract status</th>
                            <th class="text-center align-middle" scope="col" >paper status</th>
                            <th class="text-center align-middle" scope="col" >conference</th>
                            <th class="text-center align-middle" scope="col" >validation</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $paper; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            
                            <td>
                                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapse-<?php echo e($p->user->id); ?>" role="button" aria-expanded="false" aria-controls="collapse-<?php echo e($p->user->id); ?>">
                                    click to see team detail
                                </a>
                                <div class="collapse" id="collapse-<?php echo e($p->user->id); ?>">
                                    <div class="card card-body">
                                        <table class="table table-bordered table-striped w-auto">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle" scope="col" >Name</th>
                                                    <th class="text-center align-middle" scope="col" >University</th>
                                                    <th class="text-center align-middle" scope="col" >Address</th>
                                                    <th class="text-center align-middle" scope="col" >Country</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><p class="bg-primary text-white"><b><?php echo e($p->user->name); ?> (team leader)</b></p></td>
                                                    <td><p class="bg-primary text-white"><b><?php echo e($p->user->university); ?></b></p></td>
                                                    <td><p class="bg-primary text-white"><b><?php echo e($p->user->address); ?>,<?php echo e($p->city); ?></b></p></td>
                                                    <td><p class="bg-primary text-white"><b><?php echo e($p->user->country); ?></b></p></td>
                                                </tr>
                                                <?php $__currentLoopData = $p->user->team; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($team->name); ?></td>
                                                    <td><?php echo e($team->university); ?></td>
                                                    <td><?php echo e($team->address); ?>, <?php echo e($team->city); ?></td>
                                                    <td><?php echo e($team->country); ?></td>
                                                </tr>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </td>
                            <td><?php echo e($p->title); ?></td>
                            <td>
                                <?php $__currentLoopData = $p->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label class="badge bg-info"><?php echo e($tag->name); ?></label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td>
                                <?php if($p->abstract != NULL): ?>
                                    
                                    <button type="button " class="button-link" data-bs-toggle="modal" data-bs-target="#openPDFModal" data-bs-pdf="<?php echo e(url($p->abstract)); ?>">
                                        <?php
                                            $abstract = explode('/',$p->abstract);
                                            echo $abstract[2];
                                        ?>
                                        
                                </button>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($p->fullpaper != null): ?>
                                    <button type="button " class="button-link" data-bs-toggle="modal" data-bs-target="#openPDFModal" data-bs-pdf="<?php echo e(url($p->fullpaper)); ?>">
                                        <?php
                                            $fullpaper = explode('/',$p->fullpaper);
                                            echo $fullpaper[2];
                                        ?>
                                    </button>
                                <?php else: ?>
                                    <p>no file uploaded yet</p>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($p->powerpoint != null): ?>
                                <button type="button " class="button-link" data-bs-toggle="modal" data-bs-target="#openPDFModal" data-bs-pdf="<?php echo e(url($p->powerpoint)); ?>">
                                    <?php
                                        $ppt = explode('/',$p->powerpoint);
                                        echo $ppt[2];
                                    ?>
                                </button>
                                <?php else: ?>
                                    <p>no file uploaded yet</p>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($p->payment != NULL): ?>
                                    <a href="<?php echo e(url($p->payment)); ?>" target="blank"><img width="150px" src="<?php echo e(url($p->payment)); ?>"></a>
                                <?php else: ?>
                                    <p>no file uploaded yet</p>
                                <?php endif; ?>
                            </td>
                            <td>
                                <p><?php echo e($p->payment_status); ?></p>
                            </td>
                            <td class="text-center">
                                <p class=" fw-bold <?php if($p->abstract_status === 'accepted'): ?>
                                    accepted
                                    <?php elseif($p->abstract_status ==='revision'): ?>
                                    revision
                                    <?php elseif($p->abstract_status ==='rejected'): ?>
                                    rejected
                                    <?php elseif($p->abstract_status==='under review'): ?>
                                    under-review
                                    <?php endif; ?>"><?php echo e($p->abstract_status); ?></p>
                            </td>
                            <td class="text-center">
                                <p class=" fw-bold <?php if($p->paper_status === 'accepted'): ?>
                                    accepted
                                    <?php elseif($p->abstract_status ==='revision'): ?>
                                    revision
                                    <?php elseif($p->paper_status ==='rejected'): ?>
                                    rejected
                                    <?php elseif($p->paper_status==='under review'): ?>
                                    under-review
                                    <?php endif; ?>"><?php echo e($p->paper_status); ?>

                                </p>
                            </td>
                            <td class="'text-center">
                                <?php $__currentLoopData = $p->user->webinar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conference): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p><?php echo e($conference->start_date); ?></p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#validation" data-bs-id="<?php echo e($p->id); ?>" data-bs-name="<?php echo e($p->title); ?>" data-bs-payment="<?php echo e($p->payment_status); ?>" data-bs-abstract-status="<?php echo e($p->abstract_status); ?>" data-bs-paper-status="<?php echo e($p->paper_status); ?>">Validation</button>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <br/>
                <?php echo e($paper->links()); ?>

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
    

    
    <div class="modal fade" id="validation" tabindex="-1" aria-labelledby="validation" aria-hidden="true">
        <div class="modal-dialog">
            <form name="modal_validation" id="modal_validation" action="/admin/validation" method="post">
                <?php echo e(csrf_field()); ?>

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Validation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" name="id"  value="">
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="payment_status">Payment Status</label>
                            <select class="nice-select wide" name="payment_status">
                                <option value="unpaid">Unpaid</option>
                                <option value="paid">Paid</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="abstract-status">Abstract Status</label>
                            <select class="nice-select wide" name="abstract_status">
                                <option value="submitted">Submitted</option>
                                <option value="under review">Under review</option>
                                <option value="accepted">Accepted</option>
                                <option value="revision">Revision</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="paper-status">Paper Status</label>
                            <select class="nice-select wide" name="paper_status">
                                <option value="submitted">Submitted</option>
                                <option value="under review">Under review</option>
                                <option value="accepted">Accepted</option>
                                <option value="revision">Revision</option>
                                <option value="rejected">Rejected</option>
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
    window.onload = function(){
        document.getElementById('searchPaper').focus();
    }
    var select = document.getElementById('year');
    select.onchange = function(){
        this.form.submit();
    };
    var select = document.getElementById('abstract_status');
    select.onchange = function(){
        this.form.submit();
    };
    var select = document.getElementById('paper_status');
    select.onchange = function(){
        this.form.submit();
    };
    // var searchPaper = document.getElementById('searchPaper');
    // searchPaper.addEventListener("keyup", function() {
    //     this.form.submit();
    // })
    var searchPaper = document.getElementById('searchPaper');
    var timeout = null;
    var formFilter = document.getElementById('formFilter');

    searchPaper.addEventListener("keyup", function (e) {
        clearTimeout(timeout);
        timeout = setTimeout(function () {
            formFilter.submit();
        }, 1000);
    });

    var openPDFModal = document.getElementById('openPDFModal')
    openPDFModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget

        var recipient = button.getAttribute('data-bs-pdf')

        var modalTitle = openPDFModal.querySelector('.modal-title')
        var modalBodyIframe = openPDFModal.querySelector('.modal-body iframe')

        modalTitle.textContent = 'https://drive.google.com/viewerng/viewer?embedded=true&url=' + recipient + '#toolbar=0&scrollbar=0'
        modalBodyIframe.src = recipient
    })

    var validationModal = document.getElementById('validation')
        validationModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var id = button.getAttribute('data-bs-id')
        var name = button.getAttribute('data-bs-name')
        var payment = button.getAttribute('data-bs-payment')
        var abstractStatus = button.getAttribute('data-bs-abstract-status')
        var paperStatus = button.getAttribute('data-bs-paper-status')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var inputId = validationModal.querySelector('.modal-body input[name="id"]')
        inputId.value = id
        var inputName = validationModal.querySelector('.modal-body input[name="name"]')
        inputName.value = name
        var inputPayment = validationModal.querySelector('.modal-body select[name="payment_status"]')
        inputPayment.value = payment
        var inputPayment2 = validationModal.querySelectorAll('.modal span.current')[0]
        inputPayment2.innerHTML = payment
        var inputAbstractStatus = validationModal.querySelector('.modal-body select[name="abstract_status"]')
        inputAbstractStatus.value = abstractStatus
        var inputAbstractStatus2 = validationModal.querySelectorAll('.modal span.current')[1]
        inputAbstractStatus2.innerHTML = abstractStatus
        var inputPaperStatus = validationModal.querySelector('.modal-body select[name="paper_status"]')
        inputPaperStatus.value = paperStatus
        var inputPaperStatus2 = validationModal.querySelectorAll('.modal span.current')[2]
        inputPaperStatus2.innerHTML = paperStatus
    })

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.template.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>