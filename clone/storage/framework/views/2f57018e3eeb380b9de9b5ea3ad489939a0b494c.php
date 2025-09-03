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
                    <div class="">
                        <table class="table table-bordered table-striped table-hover" id="datatable">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Partner</th>
                                    <th>Txn Id</th>
                                    <th>Order Id</th>
                                    <th>Reference</th>
                                    <th>Type</th>
                                    <th>Opening</th>
                                    <th>Amount</th>
                                    <th>Charge</th>
                                    <th>Gst</th>
                                    <th>Closing</th>
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
<?php $__env->stopSection(); ?>

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

                { "data" : "created_at"},
                { "data" : "status"},
                { "data" : "username",
                    render:function(data, type, full, meta){
                        return full.username+" ("+full.user_id+")";
                    }
                },
                { "data" : "txnid"},
                { "data" : "id",
                    render:function(data, type, full, meta){
                        if(full.product == "payout"){
                            return full.option4;
                        }else{
                            return full.option1;
                        }
                    }
                },
                { "data" : "refno"},
                { "data" : "trans_type"},
                { "data" : "balance"},
                { "data" : "amount"},
                { "data" : "charge"},
                { "data" : "gst"},
                { "data" : "closing"},
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

                        <?php if($type == "upiloads"): ?>
                            if(full.status == "pending"){
                                menu += `<li><a href="javascript:void(0)" onclick="complaint(`+full.id+`, '<?php echo e($type); ?>')"><i class="icon-cogs"></i> Complaint</a></li>`;
                            }
                        <?php endif; ?>

                        <?php if($type == "payout"): ?>
                            if(full.status == "pending" || full.status == "success"){
                                menu += `<li><a href="javascript:void(0)" onclick="complaint(`+full.id+`, '<?php echo e($type); ?>')"><i class="icon-cogs"></i> Complaint</a></li>`;
                            }
                        <?php endif; ?>

                        <?php if(\Myhelper::hasRole("admin") && $type == "payout"): ?>
                            // if(full.status == "accept"){
                            //     menu += `<li><a href="javascript:void(0)" onclick="trasferTopay(`+full.id+`)"><i class="icon-cogs"></i> Transfer To Api</a></li>`;
                            // }
                        <?php endif; ?>

                        <?php if(Myhelper::can(["payout_statement_edit", "upi_statement_edit"])): ?>
                            if(full.status == "success" || full.status == "pending" || full.status == "failed" || full.status == "initiated" || full.status == "accept"){
                                menu += `<li><a href="javascript:void(0)" onclick="editReport(`+full.id+`,'`+full.refno+`','`+full.txnid+`','`+full.payid+`','`+full.remark+`', '`+full.status+`', '`+full.product+`')"><i class="icon-pencil5"></i> Edit</a></li>`;
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

        function trasferTopay(id) {
            if(id != ''){
                $.ajax({
                    url: '<?php echo e(route("fundtransaction")); ?>',
                    type: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data : {"type" : "apitransfer", "id" : id},
                    beforeSend : function(){
                        swal({
                            title: 'Wait!',
                            text: 'Please wait, we are working on your request',
                            onOpen: () => {
                                swal.showLoading()
                            },
                            allowOutsideClick: () => !swal.isLoading()
                        });
                    }
                })
                .success(function(data) {
                    swal.close();
                    if(data.status == "success"){
                        $('#datatable').dataTable().api().ajax.reload(null, false);
                        notify("Fund Transfer Successfully" , 'success');
                    }else{
                        notify(data.status , 'warning');
                    }
                })
                .fail(function() {
                    swal.close();
                    notify('Somthing went wrong', 'warning');
                });
            }
        }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>