<?php $__env->startSection('title', "Transaction History"); ?>
<?php $__env->startSection('pagetitle',  "Transaction History"); ?>

<?php
    $table = "yes";
    $agentfilter = "yes";
    $export = "recharge";

    $billers = App\Model\Provider::whereIn('type', ['mobile', 'dth'])->get(['id', 'name']);
    foreach ($billers as $item){
        $product['data'][$item->id] = $item->name;
    }
    $product['type'] = "Operator";

    $status['type'] = "Report";
    $status['data'] = [
        "success"  => "Success",
        "pending"  => "Pending",
        "reversed" => "Reversed",
        "refunded" => "Refunded",
        "chargeback"  => "Chargeback"
    ];
?>

<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Transaction History</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="datatable">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>User Details</th>
                                <th>Transaction Details</th>
                                <th>Refrence Details</th>
                                <th>Amount</th>
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

<div id="receipt" class="modal fade" data-backdrop="false" data-keyboard="false">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header bg-slate">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Receipt</h4>
            </div>
            <div class="modal-body">
                <div id="receptTable">
                    <table class="table m-t-10">
                        <thead>
                            <tr>
                                <th style="padding: 10px 0px;"">
                                    <?php if(isset(Auth::user()->company->logo)): ?>
                                        <img src="<?php echo e(asset('')); ?>public/logos/<?php echo e(Auth::user()->company->logo ?? ""); ?>" class=" img-responsive" alt="" style="height: 75px;">
                                    <?php else: ?>
                                        <?php echo e(Auth::user()->company->companyname ?? ""); ?>

                                    <?php endif; ?> 
                                </th>
                                <th style="padding: 10px 0px;  text-align: right;">Receipt - <span class="created_at"></span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="padding: 10px 0px">
                                    <address class="m-b-10">
                                        <strong>Agent :</strong> <span><?php echo e(Auth::user()->name); ?></span><br>
                                        <strong>Shop Name :</strong> <span><?php echo e(Auth::user()->shopname); ?></span><br>
                                        <strong>Phone :</strong> <span><?php echo e(Auth::user()->mobile); ?></span>
                                    </address>
                                </td>
                                <td style="padding: 10px 0px" class="text-right">
                                    <address class="m-b-10 notdmt">
                                        <strong>Consumer Name : </strong> <span class="option1"></span><br>
                                        <strong>Operator Name : </strong> <span class="providername"></span><br>
                                        <strong>Operator Number : </strong> <span class="number"></span>
                                    </address>

                                    <address class="m-b-10 dmt">
                                        <strong>Name : </strong> <span class="option2"></span><br>
                                        <strong>Account : </strong> <span class="number"></span><br>
                                        <strong>Bank : </strong> <span class="option3"></span>
                                    </address>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <h5>Transaction Details :</h5>
                                <table class="table m-t-10">
                                    <thead>
                                        <tr>
                                            <th style="padding: 10px 0px">Order Id</th>
                                            <th style="padding: 10px 0px">Amount</th>
                                            <th style="padding: 10px 0px">Ref. No.</th>
                                            <th style="padding: 10px 0px">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="id" style="padding: 10px 0px"></td>
                                            <td class="amount" style="padding: 10px 0px"></td>
                                            <td class="refno" style="padding: 10px 0px"></td>
                                            <td class="status" style="padding: 10px 0px"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="border-radius: 0px;">
                        <div class="col-md-6 col-md-offset-6">
                            <h6 class="text-right">Amount : <span class="amount"></span></h6>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-raised legitRipple" data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn bg-slate btn-raised legitRipple" type="button" id="print"><i class="fa fa-print"></i></button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript">
    var DT;
    $(document).ready(function () {
        $('[name="dataType"]').val("<?php echo e($type); ?>");
        $('#print').click(function(){
            $('#receipt').find('.modal-body').print();
        });
        
        <?php if(isset($id) && $id != 0): ?>
            $('form#searchForm').find('[name="agent"]').val("<?php echo e($id); ?>");
        <?php endif; ?>

        var url = "<?php echo e(route("reportstatic")); ?>";
        var onDraw = function() {
            $('.print').click(function(event) {
                var data = DT.row($(this).parent().parent().parent().parent().parent()).data();
                $.each(data, function(index, values) {
                    $("."+index).text(values);
                });

                if(data['product'] == "dmt"){
                    $('address.dmt').show();
                    $('address.notdmt').hide();
                }else{
                    $('address.notdmt').show();
                    $('address.dmt').hide();
                }
                $('#receipt').modal();
            });
        };
        var options = [
            { "data" : "name",
                render:function(data, type, full, meta){
                    return `<div>
                            <span class=''>`+full.apiname +`</span><br>
                            <span class='text-inverse m-l-10'>SN : <b>`+full.id +`</b> </span>
                            <div class="clearfix"></div>
                        </div><span style='font-size:13px' class="pull=right">`+full.created_at+`</span>`;
                }
            },
            { "data" : "bank",
                render:function(data, type, full, meta){
                    return full.username+"<br>"+full.usermobile+"<br>"+full.user_id;
                }
            },
            { "data" : "bank",
                render:function(data, type, full, meta){
                    if(full.product == "payout"){
                        return "Name : "+full.description+"<br>Account : "+full.number+"<br>Bank : "+full.option3+"<br>Ifsc: "+full.option2;
                    }else if(full.product == "payout"){
                        return "Name : "+full.description+"<br>Account : "+full.number+"<br>Bank : "+full.option3+"<br>Ifsc: "+full.option2;
                    }else{
                        return "Txnid : "+full.txnid+"<br>Api Txnid: "+full.apitxnid;
                    }
                }
            },
            { "data" : "bank",
                render:function(data, type, full, meta){
                    if(full.product == "payout" || full.product == "collection"){
                        return "Reference / Utr: "+full.refno+"<br>Txn Id : "+full.txnid+"<br>Api Txnid : "+full.apitxnid;
                    }else{
                        return "Bank Utr: "+full.utr+"<br>Api Txnid : "+full.apitxnid;
                    }
                }
            },
            { "data" : "bank",
                render:function(data, type, full, meta){
                    if(full.product == "payout" || full.product == "collection"){
                        return "Amount : "+full.amount+"<br>Charge : "+full.charge+"<br>Tds : "+full.tds+"<br>Gst : "+full.gst;
                    }else{
                        return "Amount : "+full.amount;
                    }
                }
            },
            { "data" : "status",
                render:function(data, type, full, meta){
                    if(full.status == "success"){
                        var out = `<span class="label label-success">Success</span>`;
                    }else if(full.status == "pending"){
                        var out = `<span class="label label-warning">Pending</span>`;
                    }else if(full.status == "reversed" || full.status == "refunded"){
                        var out = `<span class="label bg-slate">`+full.status+`</span>`;
                    }else{
                        var out = `<span class="label label-danger">`+full.status+`</span>`;
                    }

                    var menu = `<li class="dropdown-header">Action</li>`;
                    // menu += `<li><a href="javascript:void(0)" class="print"><i class="icon-info22"></i>Print Invoice</a></li>`;

                    // if(full.status == "success" || full.status == "pending" || full.status == "initiated"){
                    //     menu += `<li><a href="javascript:void(0)" onclick="status(`+full.id+`, '`+full.product+`')"><i class="icon-info22"></i>Check Status</a></li>`;
                    // }

                    <?php if($type == "upiloads" || $type == "payout"): ?>
                        if(full.status == "pending"){
                            menu += `<li><a href="javascript:void(0)" onclick="complaint(`+full.id+`, '<?php echo e($type); ?>')"><i class="icon-cogs"></i> Complaint</a></li>`;
                        }
                    <?php endif; ?>

                    <?php if(Myhelper::can(["payout_statement_edit", "upi_statement_edit"])): ?>
                        if(full.status == "success" || full.status == "pending" || full.status == "failed" || full.status == "initiated"){

                            if(full.product == "payout" || full.product == "collection"){
                                menu += `<li><a href="javascript:void(0)" onclick="editReport(`+full.id+`,'`+full.refno+`','`+full.txnid+`','`+full.payid+`','`+full.remark+`', '`+full.status+`', '`+full.product+`')"><i class="icon-pencil5"></i> Edit</a></li>`;
                            }else{
                                menu += `<li><a href="javascript:void(0)" onclick="editReport(`+full.id+`,'`+full.utr+`','`+full.txnid+`','`+full.amount+`','`+full.callback+`', '`+full.status+`', 'upi')"><i class="icon-pencil5"></i> Edit</a></li>`;
                            }
                        }
                    <?php endif; ?>
                    
                    out +=  `<ul class="icons-list">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        `+menu+`
                                    </ul>
                                </li>
                            </ul>`;

                    return out;
                }
            }
        ];

        DT = datatableSetup(url, options, onDraw);
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>