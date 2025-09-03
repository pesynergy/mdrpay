<?php
    // Set $type1 based on the value of $type
    $type1 = ($type == 'mainwallet') ? 'Collection' : 'Payout';
    
    $table  = "yes";
    $export = "yes";
?>

<?php $__env->startSection('title', ucwords($type1)." Ledger"); ?>
<?php $__env->startSection('pagetitle',  ucwords($type1)." Ledger"); ?>

<?php $__env->startSection('content'); ?>
	<!-- row -->
	<div class="container-fluid">
		<div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><span class="titleName"></span><?php echo e($type1); ?> Statement</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="display">
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u690537273/domains/login.mdrpay.com/public_html/resources/views/statement/ledger.blade.php ENDPATH**/ ?>