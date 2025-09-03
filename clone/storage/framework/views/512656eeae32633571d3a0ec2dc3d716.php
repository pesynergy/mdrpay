<div class="tabbable">
    <ul class="nav nav-tabs nav-tabs-bottom nav-justified no-margin">
        <?php $__currentLoopData = $commission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="<?php echo e(($key == 'mobile') ? 'active' : ''); ?>"><a href="#<?php echo e(str_replace(" ", "_", $key)); ?>" data-toggle="tab" class="legitRipple" aria-expanded="true"><?php echo e(ucfirst($key)); ?></a></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    <div class="tab-content">
        <?php $__currentLoopData = $commission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="tab-pane <?php echo e(($key == 'mobile') ? 'active' : ''); ?>" id="<?php echo e(str_replace(" ", "_", $key)); ?>">
                <table class="table table-bordered" cellspacing="0" style="width:100%">
                    <thead>
                            <th>Provider</th>
                            <th>Type</th>
                            <th>Value</th>
                    </thead>

                    <tbody>
                        <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(ucfirst($comm->provider->name)); ?></td>
                                <td><?php echo e(ucfirst($comm->type)); ?></td>
                                <td><?php echo e(ucfirst($comm->apiuser)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div><?php /**PATH /home/u564371677/domains/dashboard.nanakpay.com/public_html/new4/resources/views/member/commission.blade.php ENDPATH**/ ?>