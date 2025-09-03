<?php $__env->startSection('title', 'Portal Settings'); ?>
<?php $__env->startSection('pagetitle',  'Portal Settings'); ?>
<?php
    $search = "hide";
?>

<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="row">
        <div class="col-sm-4">
            <form class="actionForm" action="<?php echo e(route('setupupdate')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="actiontype" value="portalsetting">
                <input type="hidden" name="code" value="otplogin">
                <input type="hidden" name="name" value="Login required otp">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title">Login Otp Required</h5>
                    </div>
                    <div class="panel-body p-b-0">
                        <div class="form-group">
                            <label>Login Type</label>
                            <select name="value" required="" class="form-control select">
                                <option value="">Select Type</option>
                                <option value="yes" <?php echo e((isset($otplogin->value) && $otplogin->value == "yes") ? "selected=''" : ''); ?>>With Otp</option>
                                <option value="no" <?php echo e((isset($otplogin->value) && $otplogin->value == "no") ? "selected=''" : ''); ?>>Without Otp</option>
                            </select>
                        </div>
                        <?php if(Myhelper::hasRole('admin')): ?>
                            <div class="form-group">
                                <label>Security Pin</label>
                                <input type="password" name="mpin" autocomplete="off" class="form-control" required="">
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="panel-footer">
                        <button class="btn bg-slate btn-raised legitRipple pull-right" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> Updating...">Update Info</button>
                    </div>
                </div>
            </form>
        </div>
        
        <div class="col-sm-4">
            <form class="actionForm" action="<?php echo e(route('setupupdate')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="actiontype" value="portalsetting">
                <input type="hidden" name="code" value="payoutsuccess">
                <input type="hidden" name="name" value="Payout Success">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title">Payout Success</h5>
                    </div>
                    <div class="panel-body p-b-0">
                        <div class="form-group">
                            <label>Payout Success</label>
                            <select name="value" required="" class="form-control select">
                                <option value="">Select Type</option>
                                <option value="real" <?php echo e((isset($payoutsuccess->value) && $payoutsuccess->value == "real") ? "selected=''" : ''); ?>>Real</option>
                                <option value="success" <?php echo e((isset($payoutsuccess->value) && $payoutsuccess->value == "success") ? "selected=''" : ''); ?>>All Success</option>
                            </select>
                        </div>
                        
                        <?php if(Myhelper::hasRole('admin')): ?>
                            <div class="form-group">
                                <label>Security Pin</label>
                                <input type="password" name="mpin" autocomplete="off" class="form-control" required="">
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="panel-footer">
                        <button class="btn bg-slate btn-raised legitRipple pull-right" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> Updating...">Update Info</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-sm-4">
            <form class="actionForm" action="<?php echo e(route('setupupdate')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="actiontype" value="portalsetting">
                <input type="hidden" name="code" value="transactioncode">
                <input type="hidden" name="name" value="Transaction Id Code">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title">Transaction Id Code</h5>
                    </div>
                    <div class="panel-body p-b-0">
                        <div class="form-group">
                            <label>Code</label>
                            <input type="text" name="value" value="<?php echo e($transactioncode->value ?? ''); ?>" class="form-control" required="" placeholder="Enter value">
                        </div>
                        <?php if(Myhelper::hasRole('admin')): ?>
                            <div class="form-group">
                                <label>Security Pin</label>
                                <input type="password" name="mpin" autocomplete="off" class="form-control" required="">
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="panel-footer">
                        <button class="btn bg-slate btn-raised legitRipple pull-right" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> Updating...">Update Info</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-sm-4">
            <form class="actionForm" action="<?php echo e(route('setupupdate')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="actiontype" value="portalsetting">
                <input type="hidden" name="code" value="utrcode">
                <input type="hidden" name="name" value="Utr Code">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title">Utr Code</h5>
                    </div>
                    <div class="panel-body p-b-0">
                        <div class="form-group">
                            <label>Code</label>
                            <input type="text" name="value" value="<?php echo e($utrcode->value ?? ''); ?>" class="form-control" required="" placeholder="Enter value">
                        </div>
                        <?php if(Myhelper::hasRole('admin')): ?>
                            <div class="form-group">
                                <label>Security Pin</label>
                                <input type="password" name="mpin" autocomplete="off" class="form-control" required="">
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="panel-footer">
                        <button class="btn bg-slate btn-raised legitRipple pull-right" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> Updating...">Update Info</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script type="text/javascript">
    $(document).ready(function () {
        $('.actionForm').submit(function(event) {
            var form = $(this);
            var id = form.find('[name="id"]').val();
            form.ajaxSubmit({
                dataType:'json',
                beforeSubmit:function(){
                    form.find('button[type="submit"]').button('loading');
                },
                success:function(data){
                    if(data.status == "success"){
                        if(id == "new"){
                            form[0].reset();
                            $('[name="api_id"]').select2().val(null).trigger('change');
                        }
                        form.find('button[type="submit"]').button('reset');
                        notify("Task Successfully Completed", 'success');
                        $('#datatable').dataTable().api().ajax.reload();
                    }else{
                        notify(data.status, 'warning');
                    }
                },
                error: function(errors) {
                    showError(errors, form);
                }
            });
            return false;
        });

        $("#setupModal").on('hidden.bs.modal', function () {
            $('#setupModal').find('.msg').text("Add");
            $('#setupModal').find('form')[0].reset();
        });

        $('')
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>