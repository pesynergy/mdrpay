<?php $__env->startSection('title', "Api Setting"); ?>
<?php $__env->startSection('pagetitle', "Api Setting"); ?>

<?php
    $table = "yes";
?>

<?php
    $search = "hide";
?>

<?php $__env->startSection('content'); ?>
	<!-- row -->
	<div class="container-fluid">
		<div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Api Token</h4>
                    </div>
                    <div class="card-body">
                        <form class="callbackForm" action="<?php echo e(route('apitokenstore')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <div class="panel-body" style="padding:16px">
                                <div class="form-group">
                                    <label>Token</label>
                                    <textarea name="token" class="form-control" cols="30" rows="2"><?php echo e($token->token ?? ""); ?></textarea>
                                </div>
                            </div>
    
                            <div class="panel-footer">
                                <button class="btn btn-info btn-raised legitRipple pull-right" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> Updating...">Generate New Token</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Call Back</h4>
                    </div>
                    <div class="card-body">
                        <form class="callbackForm" action="<?php echo e(route('apitokenstore')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <div class="panel-body" style="padding:16px">
                                <div class="form-group">
                                    <label>Upi Webhook</label>
                                    <textarea name="upicallbackurl" class="form-control" cols="30" rows="2" required placeholder="Enter Upi Webhook"><?php echo e($token->upicallbackurl ?? ""); ?></textarea>
                                </div>
    
                                <div class="form-group">
                                    <label>Payout Webhook</label>
                                    <textarea name="payoutcallbackurl" class="form-control" cols="30" rows="2" required placeholder="Enter Payout Webhook"><?php echo e($token->payoutcallbackurl ?? ""); ?></textarea>
                                </div>
                            </div>
    
                            <div class="panel-footer">
                                <button class="btn btn-info btn-raised legitRipple pull-right" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> Updating...">Update Info</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.qrcode/1.0/jquery.qrcode.min.js"></script> 
<script type="text/javascript">
    $(document).ready(function () {
        var url = "<?php echo e(url('statement/list/fetch')); ?>/apitoken/0";
        Dropzone.options.qrupload = {
            paramName: "file",
            maxFilesize: 1,
            complete: function(file) {
                this.removeFile(file);
            },
            success : function(file, data){
                $("[name='merchant_upi']").val(data);
                $("#qrModal").modal("hide");
            }
        };

        var onDraw = function() {};

        var options = [
            { "data" : "ip"},
            { "data" : "token"},
            { "data" : "id",
                render:function(data, type, full, meta){
                    var check = "<label class='label label-danger'>In-Active</label>";
                    if(full.status == "1"){
                        check = "<label class='label label-success'>Active</label>";
                    }

                    return check;
                }
            },
            { "data" : "id",
                render:function(data, type, full, meta){
                    return `<button type="button" class="btn bg-danger btn-raised legitRipple btn-xs" onclick="deleteToken(`+full.id+`)"> <i class="fa fa-trash"></i></button>`;
                }
            },
        ];
        datatableSetup(url, options, onDraw);
        
        $('.callbackForm').submit(function(event) {
            var form = $(this);
            form.ajaxSubmit({
                dataType:'json',
                beforeSubmit:function(){
                    form.find('button[type="submit"]').button('loading');
                },
                success:function(data){
                    if(data.status == "success"){
                        form.find('button[type="submit"]').button('reset');
                        notify("Task Successfully Completed", 'success');
                        setTimeout(function(){
                            window.location.reload();
                        }, 2000);
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
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u690537273/domains/login.mdrpay.com/public_html/resources/views/apitools/setting.blade.php ENDPATH**/ ?>