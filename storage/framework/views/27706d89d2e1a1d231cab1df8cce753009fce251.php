<?php $__env->startSection('title', "Fund Statement"); ?>
<?php $__env->startSection('pagetitle',  "Fund Statement"); ?>

<?php
    $table = "yes";
    $export = "allfund";
    $status['type'] = "Fund";
    $status['data'] = [
        "success" => "Success",
        "pending" => "Pending",
        "failed" => "Failed",
        "approved" => "Approved",
        "rejected" => "Rejected",
    ];

    $product['type'] = "Fund Type";
    $product['data'] = [
        "transfer" => "Transfer",
        "return" => "Return",
        "request" => "Request"
    ];
?>

<?php $__env->startSection('content'); ?>

<div class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Fund Statement</h4>
                </div>
                <table class="table table-bordered table-striped table-hover" id="datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User Details</th>
                            <th>Requested By</th>
                            <th>Reference Details</th>
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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript">
    $(document).ready(function () {

        var url = "<?php echo e(url('statement/list/fetch')); ?>/allfund/0";
        var onDraw = function() {};
        var options = [
            { "data" : "name",
                render:function(data, type, full, meta){
                    return `<span class='text-inverse m-l-10'><b>`+full.id +`</b> </span><br>
                            <span style='font-size:13px'>`+full.updated_at+`</span>`;
                }
            },
            { "data" : "username"},
            { "data" : "sendername"},
            { "data" : "bank",
                render:function(data, type, full, meta){
                    return full.number+"<br>"+full.refno+`<br>`+full.product;
                }
            },
            { "data" : "amount"},
            { "data" : "remark"},
            { "data" : "action",
                render:function(data, type, full, meta){
                    var out = '';
                    if(full.status == "approved" ||full.status == "success"){
                        out += `<label class="label label-success">`+full.status+`</label>`;
                    }else if(full.status == "pending"){
                        out += `<label class="label label-warning">Pending</label>`;
                    }else{
                        out += `<label class="label label-danger">`+full.status+`</label>`;
                    }

                    return out;
                }
            }
        ];

        datatableSetup(url, options, onDraw);
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>