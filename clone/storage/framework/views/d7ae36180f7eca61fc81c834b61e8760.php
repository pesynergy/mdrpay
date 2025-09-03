<?php $__env->startSection('title', "Account Ladger"); ?>
<?php $__env->startSection('pagetitle',  "Ladger"); ?>

<?php
    $table  = "yes";
    $export = "yes";
?>

<?php $__env->startSection('content'); ?>

<div class="content p-b-0">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title text-capitalize"><span class="titleName"></span> Statement</h4>
                </div>
                <table class="table table-bordered table-striped table-hover" id="datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Partner</th>
                            <th>Product</th>
                            <th>Txnid</th>
                            <th>Type</th>
                            <th>Opening Bal.</th>
                            <th>Amount</th>
                            <th>Closing Bal.</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script src="<?php echo e(asset('/assets/js/core/jQuery.print.js')); ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('[name="dataType"]').val("<?php echo e($type); ?>");
        <?php if(isset($id) && $id != 0): ?>
            $('form#searchForm').find('[name="agent"]').val("<?php echo e($id); ?>");
        <?php endif; ?>

        $('#print').click(function(){
            $('#receptTable').print();
        });
        
        var url = "<?php echo e(route('reportstatic')); ?>";
        var onDraw = function() {
        };

        var options = [
            { "data" : "created_at"},
            { "data" : "created_at",
                render:function(data, type, full, meta){
                    return full.username+" ("+full.credit_by+")";
                }
            },
            { "data" : "product"},
            { "data" : "txnid"},
            { "data" : "trans_type"},
            { "data" : "balance"},
            { "data" : "created_at",
                render:function(data, type, full, meta){
                    var amount = 0;

                    if(full.product != "qrcode"){
                        amount += full.amount;
                    }

                    if(full.trans_type == "credit"){
                        if(full.product == "payout"){
                            amount += full.charge + full.gst;
                        }else{
                            amount -= full.charge + full.gst;
                        }
                    }else{
                        if(full.product == "payout"){
                            amount += full.charge + full.gst;
                        }else{
                            amount -= full.charge + full.gst;
                        }
                    }
                    
                    return amount.toFixed(2);
                }
            },
            { "data" : "closing"}
        ];

        var DT = datatableSetup(url, options, onDraw);
    });

    function SETTITLE(type) {
        $('[name="dataType"]').val(type);
        $(".titleName").text(type);
        $('#datatable').dataTable().api().ajax.reload(null, false);
    }
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/antlia/Documents/laravel/aadharatm/resources/views/statement/ledger.blade.php ENDPATH**/ ?>