
<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('pagetitle', 'Dashboard'); ?>

<?php
    $search = "hide";
    $header = "hide";
?>

<?php $__env->startSection('content'); ?>
    <div class="content pt-20 no-padding-bottom">
        <div class="row">
            <div class="col-md-12">
                <?php if(Myhelper::hasRole(["admin"])): ?>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="panel bg-teal">
                                <div class="panel-body text-center">
                                    <div class="content-group mt-5">
                                        <i class="icon-wallet icon-3x"></i>
                                    </div>

                                    <h6 class="text-semibold"><a href="#" class="text-default">Collection Balance</a></h6>
                                    <h5 class="payoutwallet text-semibold"><?php echo e($payoutwallet); ?></h5>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="panel bg-indigo">
                                <div class="panel-body text-center">
                                    <div class="content-group mt-5">
                                        <i class="icon-wallet icon-3x"></i>
                                    </div>

                                    <h6 class="text-semibold"><a href="#" class="text-default">Payout Balance</a></h6>
                                    <h5 class="downlinepayoutwallet text-semibold"><?php echo e($downlinepayoutwallet); ?></h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="panel bg-success">
                                <div class="panel-body text-center">
                                    <div class="content-group mt-5">
                                        <i class="icon-wallet icon-3x"></i>
                                    </div>

                                    <h6 class="text-semibold"><a href="#" class="text-default">Today Collection</a></h6>
                                    <h5 class="payin text-semibold"></h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="panel bg-danger">
                                <div class="panel-body text-center">
                                    <div class="content-group mt-5">
                                        <i class="icon-wallet icon-3x"></i>
                                    </div>

                                    <h6 class="text-semibold"><a href="#" class="text-default">Today Payout</a></h6>
                                    <h5 class="payout text-semibold"></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="panel bg-teal">
                                <div class="panel-body text-center">
                                    <div class="content-group mt-5">
                                        <i class="icon-wallet icon-3x"></i>
                                    </div>

                                    <h6 class="text-semibold"><a href="#" class="text-default">Main Wallet</a></h6>
                                    <h5 class="mainwallet text-semibold"><?php echo e($mainwallet); ?></h5>

                                    <button class="btn btn-xs bg-primary legitRipple" data-toggle="modal" data-target="#addMoneyModal">Add Money</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="panel bg-indigo">
                                <div class="panel-body text-center">
                                    <div class="content-group mt-5">
                                        <i class="icon-wallet icon-3x"></i>
                                    </div>

                                    <h6 class="text-semibold"><a href="#" class="text-default">Payout Wallet</a></h6>
                                    <h5 class="payoutwallet text-semibold"><?php echo e($payoutwallet); ?></h5>

                                    <button class="btn btn-xs bg-primary legitRipple" data-toggle="modal" data-target="#getMoneyModal">Get Money</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="panel bg-success">
                                <div class="panel-body text-center">
                                    <div class="content-group mt-5">
                                        <i class="icon-wallet icon-3x"></i>
                                    </div>

                                    <h6 class="text-semibold"><a href="#" class="text-default">Today Collection</a></h6>
                                    <h5 class="payin text-semibold"></h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="panel bg-danger">
                                <div class="panel-body text-center">
                                    <div class="content-group mt-5">
                                        <i class="icon-wallet icon-3x"></i>
                                    </div>

                                    <h6 class="text-semibold"><a href="#" class="text-default">Today Payout</a></h6>
                                    <h5 class="payout text-semibold"></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h6 class="panel-title">Recent Payin Transaction</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <tbody>
                                <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <div class="media-body">
                                                <div class="media-heading">
                                                    <a href="#" class="letter-icon-title"><?php echo e(ucfirst($report->product)); ?></a>
                                                </div>

                                                <div class="text-size-small"><?php echo e($report->txnid); ?></div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-muted text-size-small"><?php echo e(date("h:i:s A", strtotime($report->created_at))); ?></span>
                                        </td>
                                        <td>
                                            <h6 class="text-semibold no-margin"><i class="fa fa-inr"></i> <?php echo e($report->amount); ?></h6>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h6 class="panel-title">Recent Payout Transaction</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <tbody>
                                <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <div class="media-body">
                                                <div class="media-heading">
                                                    <a href="#" class="letter-icon-title"><?php echo e(ucfirst($report->product)); ?></a>
                                                </div>

                                                <div class="text-size-small"><?php echo e($report->txnid); ?></div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-muted text-size-small"><?php echo e(date("h:i:s A", strtotime($report->created_at))); ?></span>
                                        </td>
                                        <td>
                                            <h6 class="text-semibold no-margin"><i class="fa fa-inr"></i> <?php echo e($report->amount); ?></h6>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if(Myhelper::hasNotRole('admin')): ?>
        <?php if(Auth::user()->resetpwd == "default"): ?>
            <div id="pwdModal" class="modal fade" data-backdrop="false" data-keyboard="false">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-slate">
                            <h6 class="modal-title">Change Password </h6>
                        </div>
                        <form id="passwordForm" action="<?php echo e(route('profileUpdate')); ?>" method="post">
                            <div class="modal-body">
                                <input type="hidden" name="id" value="<?php echo e(Auth::id()); ?>">
                                <input type="hidden" name="actiontype" value="password">
                                <?php echo e(csrf_field()); ?>

                                <?php if(Myhelper::can('password_reset')): ?>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Old Password</label>
                                            <input type="password" name="oldpassword" class="form-control" required="" placeholder="Enter Value">
                                        </div>
                                        <div class="form-group col-md-6  ">
                                            <label>New Password</label>
                                            <input type="password" name="password" id="password" class="form-control" required="" placeholder="Enter Value">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6  ">
                                            <label>Confirmed Password</label>
                                            <input type="password" name="password_confirmation" class="form-control" required="" placeholder="Enter Value">
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="modal-footer">
                                <button class="btn bg-slate btn-raised legitRipple" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> Submitting">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <div id="noticeModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-slate">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Necessary Notice ( आवश्यक सूचना )</h4>
                </div>
                <div class="modal-body">
                    <?php echo nl2br($mydata['notice']); ?>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="addMoneyModal" class="modal fade" data-backdrop="false" data-keyboard="false">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header bg-slate">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title">Add Money</h6>
                </div>
                <form id="addMoneyForm" action="<?php echo e(route('fundtransaction')); ?>" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="type" value="addmoney">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group col-md-12">
                                <label>Amount</label>
                                <input type="number" name="amount" step="any" class="form-control" placeholder="Enter Amount" required="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12 text-center">
                                <img class="" id="image_qr" style="width:200px;" src="#" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-raised legitRipple" data-dismiss="modal" aria-hidden="true">Close</button>
                        <button class="btn bg-slate btn-raised legitRipple" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> Submitting">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="getMoneyModal" class="modal fade" data-backdrop="false" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-slate">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title">Get Money</h6>
                </div>
                <form id="getMoneyForm" action="<?php echo e(route('fundtransaction')); ?>" method="post">
                    <input type="hidden" name="type" value="getmoney">
                    <?php echo e(csrf_field()); ?>

                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Account Holder Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter value" required="">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Account Number</label>
                                <input type="text" name="account_number" class="form-control" placeholder="Enter value" required="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>IFSC Code</label>
                                <input type="text" name="ifsc_code" class="form-control" placeholder="Enter value" required="">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label>Bank Name</label>
                                <input type="text" name="bank_name" step="any" class="form-control" placeholder="Enter value" required="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Amount</label>
                                <input type="number" name="amount" step="any" class="form-control" placeholder="Enter Amount" required="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-raised legitRipple" data-dismiss="modal" aria-hidden="true">Close</button>
                        <button class="btn bg-slate btn-raised legitRipple" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> Submitting">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>
    <style>
        .dmt-img img{
            height: 260px;
        }
        .img-title{
            border :1px solid darkorchid;
        }
        .img-title img{
            width:30px;

        }
        .col{
            flex: 0 0 16.6666666667%;
            max-width: 16.6666666667%;
            border:1px solid red!important;
        }

        .card {
            margin-bottom: 1.875rem;
            background-color: #fff;
            transition: all .5s ease-in-out;
            position: relative;
            border: 0px solid transparent;
            border-radius: 1.25rem;
            box-shadow: 0px 12px 23px 0px rgb(63 154 224 / 4%);
            height: calc(100% - 30px);
           
        }
        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1.25rem;
        }

        .border-left-xlg {
            border-radius: 5px !important;
        }

        .box{
            box-shadow: 0 10px 10px -5px;
        }

        .wrapper-title{
            position: relative;
        }
        .box{
            opacity: 1;
            display: block;
            transition: .5s ease;
           backface-visibility: hidden;
        }
        .middle {
          transition: .5s ease;
          opacity: 0;
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          -ms-transform: translate(-50%, -50%);
          text-align: center;
        }
        .wrapper-title:hover > .box {
          /* opacity: 0.3; */
          background-image:linear-gradient(#ada996→ #f2f2f2
        → 
        #dbdbdb
        → 
        #eaeaea)
        }

        .wrapper-title:hover .middle {
          opacity: 1;
        }

        .text {
          background-color: #04AA6D;
          color: white;
          font-size: 16px;
          padding: 16px 32px;
        }

        .box:hover {

        background-image: linear-gradient(to right, #d7e1ec, #ffffff);
        }
        .box h6{
            font-size: 17px;
        }

        .margin-title{
            margin-top: 1rem;
        }



        </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script type="text/javascript" src="<?php echo e(asset('')); ?>assets/js/plugins/forms/selects/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script>
        var salesdata = {
            dates : [],
            qrcodesales : [],
            payoutsales : [],
            payinsales  : []
        };

        $(document).ready(function(){
            $('select').select2();
            <?php if(Myhelper::hasNotRole('admin') && Auth::user()->resetpwd == "default"): ?>
                $('#pwdModal').modal();
            <?php endif; ?>

            <?php if($mydata['notice'] != null && $mydata['notice'] != ''): ?>
                $('#noticeModal').modal();
            <?php endif; ?>

            $( "#passwordForm" ).validate({
                rules: {
                    <?php if(!Myhelper::can('member_password_reset')): ?>
                    oldpassword: {
                        required: true,
                        minlength: 6,
                    },
                    password_confirmation: {
                        required: true,
                        minlength: 8,
                        equalTo : "#password"
                    },
                    <?php endif; ?>
                    password: {
                        required: true,
                        minlength: 8
                    }
                },
                messages: {
                    <?php if(!Myhelper::can('member_password_reset')): ?>
                    oldpassword: {
                        required: "Please enter old password",
                        minlength: "Your password lenght should be atleast 6 character",
                    },
                    password_confirmation: {
                        required: "Please enter confirmed password",
                        minlength: "Your password lenght should be atleast 8 character",
                        equalTo : "New password and confirmed password should be equal"
                    },
                    <?php endif; ?>
                    password: {
                        required: "Please enter new password",
                        minlength: "Your password lenght should be atleast 8 character"
                    }
                },
                errorElement: "p",
                errorPlacement: function ( error, element ) {
                    if ( element.prop("tagName").toLowerCase().toLowerCase() === "select" ) {
                        error.insertAfter( element.closest( ".form-group" ).find(".select2") );
                    } else {
                        error.insertAfter( element );
                    }
                },
                submitHandler: function () {
                    var form = $('form#passwordForm');
                    form.find('span.text-danger').remove();
                    form.ajaxSubmit({
                        dataType:'json',
                        beforeSubmit:function(){
                            form.find('button:submit').button('loading');
                        },
                        complete: function () {
                            form.find('button:submit').button('reset');
                        },
                        success:function(data){
                            if(data.status == "success"){
                                form[0].reset();
                                form.closest('.modal').modal('hide');
                                notify("Password Successfully Changed" , 'success');
                            }else{
                                notify(data.status , 'warning');
                            }
                        },
                        error: function(errors) {
                            showError(errors, form.find('.modal-body'));
                        }
                    });
                }
            });

            $('form#filterForm').submit(function(){
                $.ajax({
                    url: "<?php echo e(url('mystatics')); ?>",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType:'json',
                    data:{"fromdate" : $('form#filterForm').find("[name='fromdate']").val(), "todate" : $('form#filterForm').find("[name='todate']").val(), "userid" : $('form#filterForm').find("[name='userid']").val()},
                    success: function(data){
                        $.each(data, function (index, value) {
                            $('.'+index).text(value);
                        });
                    }
                });
                return false;
            });

            $.ajax({
                url: "<?php echo e(url('mystatics')); ?>",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType:'json',
                success: function(data){
                    if(data.main.length > 0){
                        $.each(data.main, function (index, value) {
                            salesdata["dates"][index] =  moment(value.created_at, "YYYY-MM-DD hh:mm:ss").format("DD-MM-YYYY");
                            salesdata["qrcodesales"][index] = value.qrcodesales;
                            salesdata["payinsales"][index]  = value.payinsales;
                            salesdata["payoutsales"][index] = value.payoutsales;
                        });

                        var xValues = salesdata.dates;
                        new Chart("salesChart", {
                            type: "bar",
                            data: {
                                labels: xValues,
                                datasets: [
                                    {
                                        label: 'Qr Codes',
                                        backgroundColor: '#1676fb',
                                        fill : false,
                                        data: salesdata.qrcodesales
                                    },
                                    {
                                        label: 'Collection',
                                        backgroundColor: '#00897B',
                                        fill : false,
                                        data: salesdata.payinsales
                                    },
                                    {
                                        label: 'Payout',
                                        backgroundColor: '#E53935',
                                        fill : false,
                                        data: salesdata.payoutsales
                                    }
                                ]
                            },
                            options: {
                                legend: {display: true},
                                // scales: {
                                //     xAxes: [{
                                //         stacked: true
                                //     }],
                                //     yAxes: [{
                                //         stacked: true
                                //     }]
                                // }
                            }
                        });
                    }
                }
            });

            $( "#addMoneyForm").validate({
                rules: {
                    amount: {
                        required: true,
                    }
                },
                messages: {
                    amount: {
                        required: "Please enter amount",
                    },
                },
                errorElement: "p",
                errorPlacement: function ( error, element ) {
                    if ( element.prop("tagName").toLowerCase() === "select" ) {
                        error.insertAfter( element.closest( ".form-group" ).find(".select2") );
                    } else {
                        error.insertAfter( element );
                    }
                },
                submitHandler: function () {
                    var form = $('#addMoneyForm');
                    form.ajaxSubmit({
                        dataType:'json',
                        beforeSubmit:function(){
                            form.find('button:submit').button('loading');
                        },
                        complete: function () {
                            form.find('button:submit').button('reset');
                        },
                        success:function(data){
                            if(data.status == "success"){
                                form[0].reset();
                                $('#image_qr').attr('src', data.qr_link);
                            }else{
                                notify(data.message , 'warning');
                            }
                        },
                        error: function(errors) {
                            showError(errors, form);
                        }
                    });
                }
            });

            $( "#getMoneyForm").validate({
                rules: {
                    amount: {
                        required: true,
                    }
                },
                messages: {
                    amount: {
                        required: "Please enter amount",
                    },
                },
                errorElement: "p",
                errorPlacement: function ( error, element ) {
                    if ( element.prop("tagName").toLowerCase() === "select" ) {
                        error.insertAfter( element.closest( ".form-group" ).find(".select2") );
                    } else {
                        error.insertAfter( element );
                    }
                },
                submitHandler: function () {
                    var form = $('#getMoneyForm');
                    form.ajaxSubmit({
                        dataType:'json',
                        beforeSubmit:function(){
                            form.find('button:submit').button('loading');
                        },
                        complete: function () {
                            form.find('button:submit').button('reset');
                        },
                        success:function(data){
                            if(data.status == "success"){
                                form[0].reset();
                                notify("Successfully Transfer", 'success');
                            }else{
                                notify(data.message , 'warning');
                            }
                        },
                        error: function(errors) {
                            showError(errors, form);
                        }
                    });
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u564371677/domains/dashboard.nanakpay.com/public_html/newui/resources/views/home.blade.php ENDPATH**/ ?>