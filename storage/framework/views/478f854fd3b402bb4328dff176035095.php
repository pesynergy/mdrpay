<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title><?php echo $__env->yieldContent('title'); ?> - <?php echo e($mydata['company']->companyname); ?></title>
        
        <!-- Favicon icon -->
	    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('')); ?>new_assests/images/favicon-n.png">
        
        <!-- Global stylesheets -->
    	<link href="<?php echo e(asset('')); ?>new_assests/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    	<link rel="stylesheet" href="<?php echo e(asset('')); ?>new_assests/vendor/chartist/css/chartist.min.css">
    	<!-- Vectormap -->
    	<link href="<?php echo e(asset('')); ?>new_assests/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    	<link href="<?php echo e(asset('')); ?>new_assests/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    	<link href="<?php echo e(asset('')); ?>new_assests/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    	<link class="main-css" href="<?php echo e(asset('')); ?>new_assests/css/style.css" rel="stylesheet">

        <?php echo $__env->yieldPushContent('style'); ?>
        
        <!-- Required vendors -->
    	<script src="<?php echo e(asset('')); ?>new_assests/vendor/global/global.min.js"></script>
    	<script src="<?php echo e(asset('')); ?>new_assests/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    	<script src="<?php echo e(asset('')); ?>new_assests/vendor/chart-js/chart.bundle.min.js"></script>
    	<script src="<?php echo e(asset('')); ?>new_assests/vendor/owl-carousel/owl.carousel.js"></script>
    
    	<!-- Chart piety plugin files -->
    	<script src="<?php echo e(asset('')); ?>new_assests/vendor/peity/jquery.peity.min.js"></script>
    
    	<!-- Apex Chart -->
    	<script src="<?php echo e(asset('')); ?>new_assests/vendor/apexchart/apexchart.js"></script>
    
    	<!-- Dashboard 1 -->
    	<script src="<?php echo e(asset('')); ?>new_assests/js/dashboard/dashboard-1.js"></script>
    
    	<script src="<?php echo e(asset('')); ?>new_assests/js/custom.min.js"></script>
    	<!--<script src="<?php echo e(asset('')); ?>new_assests/js/deznav-init.js"></script>-->
    	<!--<script src="<?php echo e(asset('')); ?>new_assests/js/demo.js"></script>-->
    	<script src="<?php echo e(asset('')); ?>new_assests/js/styleSwitcher.js"></script>
    	
    	<?php echo $__env->yieldPushContent('script'); ?>
    </head>

    <body class="navbar-top <?php echo $__env->yieldContent('bodyClass'); ?>">
        <!--*******************
            Preloader start
        ********************-->
    	<div id="preloader">
    		<div class="sk-three-bounce">
    			<div class="sk-child sk-bounce1"></div>
    			<div class="sk-child sk-bounce2"></div>
    			<div class="sk-child sk-bounce3"></div>
    		</div>
    	</div>
    	<!--*******************
            Preloader end
        ********************-->
        <div id="main-wrapper">
            <input type="hidden" name="dataType" value="">
            <?php echo $__env->make('layouts.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
            <div class="page-container">
                <div class="page-content">
                    
    
                    <div class="content-wrapper">
                        <?php echo $__env->make('layouts.pageheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </div>
            </div>

            <?php if(Myhelper::hasRole('admin')): ?>
                <div id="walletLoadModal" class="modal fade" data-backdrop="false" data-keyboard="false">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header bg-slate">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h6 class="modal-title">Wallet Load</h6>
                            </div>
                            <form id="walletLoadForm" action="<?php echo e(route('fundtransaction')); ?>" method="post">
                                <div class="modal-body">
                                    <div class="row">
                                        <input type="hidden" name="type" value="loadwallet">
                                        <?php echo e(csrf_field()); ?>

                                        <div class="form-group col-md-12">
                                            <label>Wallet Type</label>
                                            <select name="wallet" class="form-control select" id="select" required>
                                                <option value="">Select Wallet</option>
                                                <option value="mainwallet">Collection Wallet</option>
                                                <option value="payoutwallet">Payout Wallet</option>
                                            </select>
                                        </div>
    
                                        <div class="form-group col-md-12">
                                            <label>Amount</label>
                                            <input type="number" name="amount" step="any" class="form-control" placeholder="Enter Amount" required="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label>Remark</label>
                                            <textarea name="remark" class="form-control" rows="3" placeholder="Enter Remark"></textarea>
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
                
                <div id="notifyModal" class="modal fade" data-backdrop="false" data-keyboard="false">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header bg-slate">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h6 class="modal-title">App Notify</h6>
                            </div>
                            <form id="notifyForm" action="<?php echo e(route('fundtransaction')); ?>" method="post">
                                <div class="modal-body">
                                    <div class="row">
                                        <input type="hidden" name="type" value="appnotify">
                                        <?php echo e(csrf_field()); ?>

                                        <div class="form-group col-md-12">
                                            <label>Notification Type</label>
                                            <select name="sendtype" class="form-control select" required>
                                                <option value="">Select Type</option>
                                                <option value="alert">Alert</option>
                                                <option value="notify">Notify</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Title</label>
                                            <input type="text" name="title" class="form-control" placeholder="Enter Title" required="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label>Decstription</label>
                                            <textarea name="description" class="form-control" rows="3" placeholder="Enter Decstription"></textarea>
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
            <?php endif; ?>
    
            <div id="editModal" class="modal fade" data-backdrop="false" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-slate">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h6 class="modal-title">Edit Report</h6>
                        </div>
                        <form id="editForm" action="<?php echo e(route('statementUpdate')); ?>" method="post">
                            <div class="modal-body">
                                <div class="row">
                                    <input type="hidden" name="id">
                                    <input type="hidden" name="actiontype" value="">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="form-group col-md-6">
                                        <label>Status</label>
                                        <select name="status" class="form-control select" required>
                                            <option value="">Select Type</option>
                                            <option value="pending">Pending</option>
                                            <option value="success">Success</option>
                                            <option value="complete">Complete</option>
                                            <option value="failed">Failed</option>
                                            <option value="reversed">Reversed</option>
                                            <option value="chargeback">Charge Back</option>
                                        </select>
                                    </div>
            
                                    <div class="form-group col-md-6">
                                        <label>Ref No</label>
                                        <input type="text" name="refno" class="form-control" placeholder="Enter Vle id" required="">
                                    </div>
                                </div>
            
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Txn Id</label>
                                        <input type="text" name="txnid" class="form-control" placeholder="Enter Vle id" required="">
                                    </div>
            
                                    <div class="form-group col-md-6">
                                        <label>Pay Id</label>
                                        <input type="text" name="payid" class="form-control" placeholder="Enter Vle id" required="">
                                    </div>
                                </div>
            
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Remark</label>
                                        <textarea rows="3" name="remark" class="form-control" placeholder="Enter Remark"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-raised legitRipple" data-dismiss="modal" aria-hidden="true">Close</button>
                                <button class="btn bg-slate btn-raised legitRipple" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> Updating">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    
            <div id="complaintModal" class="modal fade" data-backdrop="false" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-slate">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h6 class="modal-title">Raise Complaint</h6>
                        </div>
                        <form id="complaintForm" action="<?php echo e(route('complaintstore')); ?>" method="post">
                            <div class="modal-body">
                                <input type="hidden" name="id" value="new">
                                <input type="hidden" name="product">
                                <input type="hidden" name="transaction_id">
                                <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <label>Bank Utr</label>
                                    <input type="text" name="subject" class="form-control" placeholder="Enter value" required="">
                                </div>
                                <div class="form-group">
                                    <label>Screenshot</label>
                                    <input type="file" name="descriptions" class="form-control" placeholder="Enter value" required="">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-raised legitRipple" data-dismiss="modal" aria-hidden="true">Close</button>
                                <button class="btn bg-slate btn-raised legitRipple" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> Updating">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php /**PATH /home/u564371677/domains/dashboard.nanakpay.com/public_html/newui/resources/views/layouts/app.blade.php ENDPATH**/ ?>