<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('pagetitle', 'Dashboard'); ?>

<?php
    $search = "hide";
    $header = "hide";
?>

<?php $__env->startSection('content'); ?>
    <div class="content pt-20 no-padding-bottom">
        <div class="row">
            <?php if(Myhelper::hasRole(["admin", "subadmin"])): ?>
                <div class="col-md-4">
                    <div class="panel panel-body bg-danger border-left-xlg cursor-pointer mb-5" style="padding: 10px 10px;">
                        <div class="media no-margin">
                            <div class="media-body">
                                <i class="fa fa-inr pull-left" style="padding:5px 0px;"></i><h5 class="media-heading text-semibold payoutwallet"><?php echo e($payoutwallet); ?></h5>
                                <div class="list-group-divider"></div>
                                <span>Payout Wallet</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="panel panel-body bg-danger border-left-xlg cursor-pointer mb-5" style="padding: 10px 10px;">
                        <div class="media no-margin">
                            <div class="media-body">
                                <i class="fa fa-inr pull-left" style="padding:5px 0px;"></i><h5 class="media-heading text-semibold payoutwallet"><?php echo e($downlinepayoutwallet); ?></h5>
                                <div class="list-group-divider"></div>
                                <span>Downline Payout Wallet</span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="content p-b-0 pt-20">
        <form id="filterForm">
            <div class="panel panel-default no-margin" style="border-radius: 10px;">
                <div class="panel-body p-tb-10">
                    <div class="row">
                        <div class="form-group col-md-3 m-b-10">
                            <input type="text" name="fromdate" class="form-control mydate" placeholder="From Date">
                        </div>
                        <div class="form-group col-md-3 m-b-10">
                            <input type="text" name="todate" class="form-control mydate" placeholder="To Date">
                        </div>

                        <?php if(\Myhelper::hasRole("admin")): ?>
                            <div class="form-group col-md-3 m-b-10">
                                <input type="text" name="userid" class="form-control" placeholder="Agent Id">
                            </div>
                        <?php endif; ?>
                        <div class="form-group col-md-3 m-b-10 pull-right">
                            <button type="submit" class="btn bg-slate btn-xs btn-labeled legitRipple btn-lg mt-10" data-loading-text="<b><i class='fa fa-spin fa-spinner'></i></b> Searching"><b><i class="icon-search4"></i></b> Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="content pt-20" >
        <div class="row">
            <div class="col-sm-4 col-xl-4">
                <a href="<?php echo e(route('reports', ['type' => 'collection'])); ?>" class="text-white">
                    <div class="panel panel-body border-left-success border-left-xlg cursor-pointer mb-5" style="padding: 10px 10px;">
                        <div class="media no-margin">
                            <div class="media-body">
                                <i class="fa fa-inr pull-left" style="padding:5px 0px;"></i><h5 class="media-heading text-semibold collectionsuccessamt"></h5>
                                <div class="list-group-divider"></div>
                                <span>Collection Success</span>
                                <h6 class="no-margin collectionsuccess">0</h6>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-sm-4 col-xl-4">
                <a href="<?php echo e(route('reports', ['type' => 'payout'])); ?>" class="text-white">
                    <div class="panel panel-body border-left-success border-left-xlg cursor-pointer mb-5" style="padding: 10px 10px;">
                        <div class="media no-margin">
                            <div class="media-body">
                                <i class="fa fa-inr pull-left" style="padding:5px 0px;"></i><h5 class="media-heading text-semibold payoutsuccessamt"></h5>
                                <div class="list-group-divider"></div>
                                <span>Payout Success</span>
                                <h6 class="no-margin payoutsuccess">0</h6>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-sm-4 col-xl-4">
                <a href="<?php echo e(route('reports', ['type' => 'chargeback'])); ?>" class="text-white">
                    <div class="panel panel-body border-left-success border-left-xlg cursor-pointer mb-5" style="padding: 10px 10px;">
                        <div class="media no-margin">
                            <div class="media-body">
                                <i class="fa fa-inr pull-left" style="padding:5px 0px;"></i><h5 class="media-heading text-semibold chargebackchargebackamt"></h5>
                                <div class="list-group-divider"></div>
                                <span>Charge Back</span>
                                <h6 class="no-margin chargebackchargeback">0</h6>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-sm-4 col-xl-4">
                <a href="<?php echo e(route('reports', ['type' => 'upiloads'])); ?>" class="text-white">
                    <div class="panel panel-body border-left-success border-left-xlg cursor-pointer mb-5" style="padding: 10px 10px;">
                        <div class="media no-margin">
                            <div class="media-body">
                                <i class="fa fa-inr pull-left" style="padding:5px 0px;"></i><h5 class="media-heading text-semibold qrchargesuccessamt"></h5>
                                <div class="list-group-divider"></div>
                                <span>Qr Charge</span>
                                <h6 class="no-margin qrchargesuccess">0</h6>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <?php if(\Myhelper::hasRole("subadmin")): ?>
                <div class="col-sm-4 col-xl-4">
                    <div class="panel panel-body border-left-success border-left-xlg cursor-pointer mb-5" style="padding: 10px 10px;">
                        <div class="media no-margin">
                            <div class="media-body">
                                <i class="fa fa-inr pull-left" style="padding:5px 0px;"></i><h5 class="media-heading text-semibold collectioncommission"></h5>
                                <div class="list-group-divider"></div>
                                <span>Earned Commission</span>
                                <h6 class="no-margin"><?php echo e($commssion); ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php if(Myhelper::hasNotRole('admin')): ?>
        <?php if(Auth::user()->kyc == "pending" || Auth::user()->kyc == "rejected"): ?>
            <div id="kycModal" class="modal fade" data-backdrop="false" data-keyboard="false">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-slate">
                            <h6 class="modal-title">Complete your profile with kyc</h6>
                        </div>
                        <?php if(Auth::user()->kyc == "rejected"): ?>
                            <div class="alert bg-danger alert-styled-left">
                                <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                                <span class="text-semibold">Kyc Rejected!</span> <?php echo e(Auth::user()->remark); ?></a>.
                            </div>
                        <?php endif; ?>

                        <form id="kycForm" action="<?php echo e(route('profileUpdate')); ?>" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <input type="hidden" name="id" value="<?php echo e(Auth::id()); ?>">
                                <input type="hidden" name="actiontype" value="kycdata">
                                <input type="hidden" name="ekyc" value="">
                                <?php echo e(csrf_field()); ?>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Address</label>
                                        <textarea name="address" class="form-control" rows="2" required="" placeholder="Enter Value"><?php echo e(Auth::user()->address); ?></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>State</label>
                                        <select name="state" class="form-control select" required="">
                                            <option value="">Select State</option>
                                            <?php $__currentLoopData = $state; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($state->state); ?>" <?php echo e((Auth::user()->state == $state->state)? 'selected=""': ''); ?>><?php echo e($state->state); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>City</label>
                                        <input type="text" name="city" class="form-control" required="" placeholder="Enter Value" value="<?php echo e(Auth::user()->city); ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Pincode</label>
                                        <input type="number" name="pincode" value="<?php echo e(Auth::user()->pincode); ?>" class="form-control" value="" required="" maxlength="6" minlength="6" placeholder="Enter Value">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>Shop Name</label>
                                        <input type="text" name="shopname" value="<?php echo e(Auth::user()->shopname); ?>"  class="form-control" value="" required="" placeholder="Enter Value">
                                    </div>
        
                                    <div class="form-group col-md-4">
                                        <label>Pancard Number</label>
                                        <input type="text" name="pancard" value="<?php echo e(Auth::user()->pancard); ?>"  class="form-control" value="" required="" placeholder="Enter Value">
                                    </div>
        
                                    <div class="form-group col-md-4">
                                        <label>Adhaarcard Number</label>
                                        <input type="text" name="aadharcard" value="<?php echo e(Auth::user()->aadharcard); ?>"  class="form-control" value="" required="" placeholder="Enter Value" maxlength="12" minlength="12">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>Pancard Pic</label>
                                        <input type="file" name="pancardpics" class="form-control" value="" placeholder="Enter Value" required="">
                                    </div>
        
                                    <div class="form-group col-md-4">
                                        <label>Adhaarcard Pic Front</label>
                                        <input type="file" name="aadharcardpicfronts" class="form-control" value="" placeholder="Enter Value" required="">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>Adhaarcard Pic Back</label>
                                        <input type="file" name="aadharcardpicbacks" class="form-control" value="" placeholder="Enter Value" required="">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>Self Photo</label>
                                        <input type="file" name="profiles" class="form-control" value="" placeholder="Enter Value" required="">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>Bank Passbook/Cancelle Chaque</label>
                                        <input type="file" name="passbooks" class="form-control" value="" placeholder="Enter Value" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn bg-slate btn-raised legitRipple" type="button">Scan For Ekyc</button>
                                <button class="btn bg-slate btn-raised legitRipple" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> Submitting">Complete Profile</button>
                            </div>
                        </form>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        <?php endif; ?>

        <?php if(Auth::user()->kyc == "initiated"): ?>
            <div id="ekycModal" class="modal fade" data-backdrop="false" data-keyboard="false">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-slate">
                            <h6 class="modal-title">Complete your E-kyc</h6>
                        </div>
                        <form id="ekycForm" action="<?php echo e(route('ekyc')); ?>" method="post" enctype="multipart/form-data">
                            <div class="modal-body text-center">
                                <input type="hidden" name="id" value="<?php echo e(Auth::id()); ?>">
                                <input type="hidden" name="ekyc" value="">
                                <?php echo e(csrf_field()); ?>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <img src="<?php echo e(asset('')); ?>assets/capute.gif" class="img-responsive" style="margin: auto;">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn bg-slate btn-raised legitRipple scan" onclick="scandata()" type="button">Scan & Submit</button>
                            </div>
                        </form>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        <?php endif; ?>

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
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
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
    </div><!-- /.modal -->
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
<script>
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
            
            $.ajax({
                url: "<?php echo e(url('mycommission')); ?>",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType:'json',
                data:{"fromdate" : $('form#filterForm').find("[name='fromdate']").val(), "todate" : $('form#filterForm').find("[name='todate']").val(), "userid" : $('form#filterForm').find("[name='userid']").val()},
                success: function(data){
                    console.log(data);
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
            data:{"fromdate" : "<?php echo e(date("Y-m-d")); ?>", "todate" : "<?php echo e(date("Y-m-d")); ?>", "userid" : 0},
            success: function(data){
                console.log(data);
                $.each(data, function (index, value) {
                    $('.'+index).text(value);
                });
            }
        });

        $.ajax({
            url: "<?php echo e(url('mycommission')); ?>",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType:'json',
            data:{"fromdate" : "<?php echo e(date("Y-m-d")); ?>", "todate" : "<?php echo e(date("Y-m-d")); ?>", "userid" : 0},
            success: function(data){
                console.log(data);
                $.each(data, function (index, value) {
                    $('.'+index).text(value);
                });
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>