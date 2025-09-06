
<?php $__env->startSection('title', 'Scheme Manager'); ?>
<?php $__env->startSection('pagetitle',  'Scheme Manager'); ?>
<?php
    $table = "yes";
    $agentfilter = "hide";

    $status['type'] = "Scheme";
    $status['data'] = [
        "1" => "Active",
        "0" => "De-active"
    ];
?>

<?php $__env->startSection('content'); ?>
	<!-- row -->
	<div class="container-fluid">
		<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Scheme Manager</h4>
                        <div class="heading-elements">
                            <button type="submit" class="btn btn-info btn-xs btn-labeled legitRipple" onclick="addSetup()"q data-loading-text="<b><i class='fa fa-spin fa-spinner'></i></b> Searching"><b><i class="flaticon-381-add-1" style="padding-right:5px;"></i></b> Add New</button></div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table-bordered nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
	</div>
</div>

<div id="setupModal" class="modal fade" data-backdrop="false" data-keyboard="false">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-slate">
                <h6 class="modal-title"><span class="msg">Add</span> Scheme</h6>
            </div>
            <form id="setupManager" action="<?php echo e(route('resourceupdate')); ?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id">
                        <input type="hidden" name="actiontype" value="scheme">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group col-md-12">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Bank Name" required="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-info btn-raised legitRipple" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> Submitting">Submit</button>
                </div>
            </form>
        </div> 
    </div> 
</div> 

<?php $__currentLoopData = $charge; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div id="<?php echo e($key); ?>Modal" class="modal fade" role="dialog" data-backdrop="false">
        <div class="modal-dialog  modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-slate">
                    <h4 class="modal-title"><?php echo e($key); ?> Charge</h4>
                </div>
                <form class="commissionForm" method="post" action="<?php echo e(route('resourceupdate')); ?>">
                    <div class="modal-body p-0" style="margin-bottom:20px">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="actiontype" value="commission">
                        <input type="hidden" name="scheme_id" value="">                
                        <table class="table table-bordered m-0">
                            <thead>
                                <th>Operator</th>
                                <?php if(Myhelper::hasRole('admin')): ?>
                                    <th>Charge Type</th>
                                <?php endif; ?>
                                <th>Value</th>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <input type="hidden" name="slab[]" value="<?php echo e($element->id); ?>">
                                            <?php echo e($element->name); ?>

                                        </td>
                                        <?php if(Myhelper::hasRole('admin')): ?>     
                                            <td class="p-t-0 p-b-0">
                                                <select class="form-control" name="type[]" required="">
                                                    <option value="">Select Type</option>
                                                    <option value="percent">Percent (%)</option>
                                                    <option value="flat" selected="selected">Flat (Rs)</option>
                                                </select>
                                            </td>
                                        <?php endif; ?>
                                        <td class="p-t-0 p-b-0">
                                            <input type="number" step="any" name="apiuser[]" placeholder="Enter Value" class="form-control" >
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-info btn-raised legitRipple" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> Submitting">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- /.modal -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<div id="commissionModal" class="modal fade" role="dialog" data-backdrop="false">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
                <div class="modal-header bg-slate">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Scheme <span class="schemename"></span> Commission/Charge</h4>
            </div>

            <div class="modal-body no-padding commissioData">
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> 
<?php $__env->stopSection(); ?>
<script>
    window.schemeConfig = {
        fetchUrl: "<?php echo e(url('statement/list/fetch')); ?>/resource<?php echo e($type); ?>/0",
        updateUrl: "<?php echo e(route('resourceupdate')); ?>",
        getResourceUrl: "<?php echo e(url('resources/get')); ?>",
        getMemberCommissionUrl: "<?php echo e(route('getMemberCommission')); ?>",
        csrf: "<?php echo e(csrf_token()); ?>",
        charges: <?php echo json_encode($charge, 15, 512) ?>, 
        isAdmin: <?php echo json_encode(Myhelper::hasRole('admin'), 15, 512) ?>
    };
</script>
<?php $__env->startPush('script'); ?>
   <script src="<?php echo e(asset('js/resource/schemeManager.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\mdrpay\resources\views/resource/scheme.blade.php ENDPATH**/ ?>