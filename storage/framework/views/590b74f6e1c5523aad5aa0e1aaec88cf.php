<?php $__env->startSection('title', "Fund Request"); ?>
<?php $__env->startSection('pagetitle',  "Fund Request"); ?>

<?php
    $agentfilter = "hide";
    $table = "yes";
    $export = "fundrequest";
?>

<?php $__env->startSection('content'); ?>
<div class="content-body default-height">
	<!-- row -->
	<div class="container-fluid">
		<div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Transaction History</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="display">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Requested By</th>
                                        <th>Deposit Bank Details</th>
                                        <th>Refrence Details</th>
                                        <th>Amount</th>
                                        <th>Remark</th>
                                        <th>Action</th>
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

<?php $__env->startPush('style'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        $('[name="dataType"]').val("fundrequest");

        var url = "<?php echo e(url('statement/list/fetch')); ?>/fundrequestviewall/0";
        var onDraw = function() {};
        var options = [
            { "data" : "name",
                render:function(data, type, full, meta){
                    return `<span class='text-inverse m-l-10'><b>`+full.id +`</b> </span><br>
                        <span style='font-size:13px'>`+full.updated_at+`</span>`;
                }
            },
            { "data" : "username"},
            { "data" : "bank",
                render:function(data, type, full, meta){
                    return `Name - `+full.fundbank.name+`<br>Account No. - `+full.fundbank.account+`<br>Branch - `+full.fundbank.branch;
                }
            },
            { "data" : "bank",
                render:function(data, type, full, meta){
                    var slip = '';
                    if(full.payslip){
                        var slip = `<a target="_blank" href="<?php echo e(asset('public')); ?>/deposit_slip/`+full.payslip+`">Pay Slip</a>`
                    }
                    return `Ref No. - `+full.ref_no+`<br>Paydate - `+full.paydate+`<br>Paymode - `+full.paymode+` ( `+slip+` )`;
                }
            },
            { "data" : "amount"},
            { "data" : "remark"},
            { "data" : "action",
                render:function(data, type, full, meta){
                    var out = '';
                    if(full.status == "approved"){
                        out += `<label class="label label-success">Approved</label>`;
                    }else if(full.status == "pending"){
                        out += `<label class="label label-warning">Pending</label>`;
                    }else if(full.status == "rejected"){
                        out += `<label class="label label-danger">Rejected</label>`;
                    }
                    return out;
                }
            }
        ];

        datatableSetup(url, options, onDraw);
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u564371677/domains/dashboard.nanakpay.com/public_html/new2/resources/views/fund/requestviewall.blade.php ENDPATH**/ ?>