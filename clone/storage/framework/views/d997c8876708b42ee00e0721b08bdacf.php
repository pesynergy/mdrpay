<?php $__env->startSection('title', ucwords($type).' List'); ?>
<?php $__env->startSection('pagetitle',  ucwords($type).' List'); ?>

<?php
    $table = "yes";
    $export = $type;

    $table = "yes";
    switch($type){
        case 'kycpending':
        case 'kycsubmitted':
        case 'kycrejected':
            $status['type'] = "Kyc";
            $status['data'] = [
                "pending" => "Pending",
                "submitted" => "Submitted",
                "verified" => "Verified",
                "rejected" => "Rejected",
            ];
        break;

        default:
            $status['type'] = "member";
            $status['data'] = [
                "active" => "Active",
                "block" => "Block"
            ];
        break;
    }
?>

<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><?php echo e(isset($role->name) ? $role->name : $type); ?> List</h4>
                    <?php if(Myhelper::hasRole('admin') || ($role || sizeOf($roles) > 0)): ?>
                        <div class="heading-elements">
                            <a href="<?php echo e(route('member', ['type' => $type, 'action' => 'create'])); ?>"><button type="button" class="btn btn-sm bg-slate btn-raised heading-btn legitRipple">
                                <i class="icon-plus2"></i> Add New
                            </button></a>
                        </div>
                    <?php endif; ?>
                </div>
                <table class="table table-bordered table-striped table-hover" id="datatable">
                    <thead>
                        <tr>
                            <th>Partner Code</th>
                            <th>Reports</th>
                            <th>Action</th>
                            <th>Status</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Main Wallet</th>
                            <th>Payout Wallet</th>
                            <th>Hold Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="transferModal" class="modal fade" data-backdrop="false" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-slate">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Fund Transfer / Return</h6>
            </div>
            <form id="transferForm" action="<?php echo e(route('fundtransaction')); ?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="payee_id">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group col-md-6">
                            <label>Wallet Type</label>
                            <select name="wallet" class="form-control select" id="select" required>
                                <option value="">Select Wallet</option>
                                <option value="mainwallet">Collection Wallet</option>
                                <option value="payoutwallet">Payout Wallet</option>
                                <option value="collectionpayoutwallet">Collection To Payout Wallet</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Fund Action</label>
                            <select name="type" class="form-control select" id="select" required>
                                <option value="">Select Action</option>
                                <?php if(Myhelper::can('fund_transfer')): ?>
                                <option value="transfer">Transfer</option>
                                <?php endif; ?>
                                <?php if(Myhelper::can('fund_return')): ?>
                                <option value="return">Return</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Amount</label>
                            <input type="number" name="amount" step="any" class="form-control" placeholder="Enter Amount" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Ref No</label>
                            <input type="text" name="refno" step="any" class="form-control" placeholder="Enter value" required="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Remark</label>
                            <textarea name="remark" class="form-control" rows="3" placeholder="Enter Remark"></textarea>
                        </div>
                    </div>
                    <?php if(Myhelper::hasRole('admin')): ?>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Security Pin</label>
                                <input type="password" name="mpin" autocomplete="off" class="form-control" required="">
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-raised legitRipple" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button class="btn bg-slate btn-raised legitRipple" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> Submitting">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php if(isset($permissions) && $permissions && Myhelper::can('member_permission_change')): ?>
    <div id="permissionModal" class="modal fade right" data-backdrop="false" data-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-slate">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title">Member Permission</h6>
                </div>
                <form id="permissionForm" action="<?php echo e(route('toolssetpermission')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="payee_id">
                    <div class="modal-body p-0">
                        <table id="datatable" class="table table-hover table-bordered">
    	                    <thead>
    	                    <tr>
    	                        <th width="170px;">Section Category</th>
    	                        <th>
                                    <span class="pull-left m-t-5 m-l-10">Permissions</span> 
                                    <div class="md-checkbox pull-right">
                                        <input type="checkbox" id="selectall">
                                        <label for="selectall">Select All</label>
                                    </div>
                                </th>
    	                    </tr>
    	                    </thead>
    	                    <tbody>
                                <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <div class="md-checkbox mymd">
                                                <input type="checkbox" class="selectall" id="<?php echo e(ucfirst($key)); ?>">
                                                <label for="<?php echo e(ucfirst($key)); ?>"><?php echo e(ucfirst($key)); ?></label>
                                            </div>
                                        </td>

                                        <td class="row">
                                            <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="md-checkbox col-md-4 p-0" >
                                                    <input type="checkbox" class="case" id="<?php echo e($permission->id); ?>" name="permissions[]" value="<?php echo e($permission->id); ?>">
                                                    <label for="<?php echo e($permission->id); ?>"><?php echo e($permission->name); ?></label>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    	                    </tbody>
    	                </table>
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

<div id="commissionModal" class="modal fade right" role="dialog" data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
                <div class="modal-header bg-slate">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Scheme Manager</h4>
            </div>
            <form id="schemeForm" method="post" action="<?php echo e(route('profileUpdate')); ?>">
                <div class="modal-body">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="id">
                    <input type="hidden" name="actiontype" value="scheme">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Scheme</label>
                            <select class="form-control select" name="scheme_id" required="" onchange="viewCommission(this)">
                                <option value="">Select Scheme</option>
                                <?php $__currentLoopData = $scheme; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($element->id); ?>"><?php echo e($element->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <?php if(Myhelper::hasRole('admin')): ?>
                            <div class="form-group col-md-4">
                                <label>Security Pin</label>
                                <input type="password" name="mpin" autocomplete="off" class="form-control" required="">
                            </div>
                        <?php endif; ?>
                        <div class="form-group col-md-4">
                            <label style="width:100%">&nbsp;</label>
                            <button class="btn bg-slate btn-raised legitRipple" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> Submitting">Submit</button>
                            <button type="button" class="btn btn-default btn-raised legitRipple" data-dismiss="modal" aria-hidden="true">Close</button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="modal-body no-padding commissioData">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-raised legitRipple" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>
    </div>
</div>

<?php if(Myhelper::can('member_stock_manager')): ?>
    <div id="stockModal" class="modal fade" role="dialog" data-backdrop="false">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                    <div class="modal-header bg-slate">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Add Stock</h4>
                </div>
                <form id="stockForm" method="post" action="<?php echo e(route('profileUpdate')); ?>">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="id">
                        <input type="hidden" name="actiontype" value="stock">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>User Stock</label>
                                <input type="number" step="any" name="stock" class="form-control" required="">
                            </div>
                        </div>

                        <?php if(Myhelper::hasRole('admin')): ?>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Security Pin</label>
                                    <input type="password" name="mpin" autocomplete="off" class="form-control" required="">
                                </div>
                            </div>
                        <?php endif; ?>
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

<?php if(Myhelper::can('member_kyc_update')): ?>
    <div id="kycUpdateModal" class="modal fade" data-backdrop="false" data-keyboard="false">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header bg-slate">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title">Kyc Manager</h6>
                </div>
                <form id="kycUpdateForm" action="<?php echo e(route('profileUpdate')); ?>" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="id">
                            <input type="hidden" name="actiontype" value="kyc_change">
                            
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group col-md-12">
                                <label>Kyc Status</label>
                                <select name="kyc" class="form-control select" id="select" required>
                                    <option value="">Select Action</option>
                                    <option value="pending">Pending</option>
                                    <option value="submitted">Submitted</option>
                                    <option value="verified">Verified</option>
                                    <option value="rejected">Rejected</option>
                                </select>
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
<?php endif; ?>

<?php if(Myhelper::can('locked_amount')): ?>
    <div id="lockedAmountModal" class="modal fade" role="dialog" data-backdrop="false">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                    <div class="modal-header bg-slate">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Locked Amount</h4>
                </div>
                <form id="lockedAmountForm" method="post" action="<?php echo e(route('profileUpdate')); ?>">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="id">
                        <input type="hidden" name="actiontype" value="locakedAmount">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Amount</label>
                                <input type="number" step="any" name="lockedamount" class="form-control" required="">
                            </div>
                        </div>

                        <?php if(Myhelper::hasRole('admin')): ?>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Security Pin</label>
                                    <input type="password" name="mpin" autocomplete="off" class="form-control" required="">
                                </div>
                            </div>
                        <?php endif; ?>
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

<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>
<style>
    .md-checkbox {
        margin: 5px 0px;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript" src="<?php echo e(asset('')); ?>assets/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.select').select2();
        $('[name="dataType"]').val("<?php echo e($type); ?>");

        var url = "<?php echo e(url('statement/list/fetch')); ?>/<?php echo e($type); ?>/0";
        var onDraw = function() {
            $('input#membarStatus').on('click', function(evt){
                evt.stopPropagation();
                var ele = $(this);
                var id = $(this).val();
                var status = "block";
                if($(this).prop('checked')){
                    status = "active";
                }
                
                $.ajax({
                    url: '<?php echo e(route('profileUpdate')); ?>',
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType:'json',
                    data: {'id':id, 'status':status, 'actiontype' : 'profile'}
                })
                .done(function(data) {
                    if(data.status == "success"){
                        notify("Member Updated", 'success');
                        $('#datatable').dataTable().api().ajax.reload();
                    }else{
                        if(status == "active"){
                            ele.prop('checked', false);
                        }else{
                            ele.prop('checked', true);
                        }
                        notify("Something went wrong, Try again." ,'warning');
                    }
                })
                .fail(function(errors) {
                    if(status == "active"){
                        ele.prop('checked', false);
                    }else{
                        ele.prop('checked', true);
                    }
                    showError(errors, "withoutform");
                });
            });
        };

        var options = [
            { "data" : "agentcode"},
            { "data" : "agentcode",
                render:function(data, type, full, meta){
                    var out  = '';
                    var menu = ``;

                    menu += `<li><a href="<?php echo e(url('statement/report/chargeback/')); ?>/`+full.id+`" target="_blank"><i class="icon-paragraph-justify3"></i> Charge Back</a></li>`;
                    menu += `<li><a href="<?php echo e(url('statement/report/payin/')); ?>/`+full.id+`" target="_blank"><i class="icon-paragraph-justify3"></i> Pay-In</a></li>`;
                    menu += `<li><a href="<?php echo e(url('statement/report/payout/')); ?>/`+full.id+`" target="_blank"><i class="icon-paragraph-justify3"></i> Pay-Out Back</a></li>`;
                    menu += `<li><a href="<?php echo e(url('statement/report/upiintent/')); ?>/`+full.id+`" target="_blank"><i class="icon-paragraph-justify3"></i> Upi Intent</a></li>`;
                    menu += `<li><a href="<?php echo e(url('statement/report/mainwallet/')); ?>/`+full.id+`" target="_blank"><i class="icon-paragraph-justify3"></i> Main Wallet Ladger</a></li>`;
                    menu += `<li><a href="<?php echo e(url('statement/report/payoutwallet/')); ?>/`+full.id+`" target="_blank"><i class="icon-paragraph-justify3"></i> Payout Wallet Ladger</a></li>`;

                    out +=  `<ul class="icons-list">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle mt-10" data-toggle="dropdown">
                                        <span class="label bg-slate">Reports <i class="icon-arrow-down5"></i></span>
                                    </a>

                                    <ul class="dropdown-menu height-250">
                                        `+menu+`
                                    </ul>
                                </li>
                            </ul>`;
                            
                    return out;
                }
            },
            { "data" : "agentcode",
                render:function(data, type, full, meta){
                    var out = '';
                    var menu = ``;
                    
                    <?php if(Myhelper::can('service_manager')): ?>
                        menu += `<li><a href="<?php echo e(url('setup/servicemanage-collection')); ?>/`+full.id+`" target="_blank"><i class="icon-arrow-right5"></i>Service Manager</a></li>`;
                    <?php endif; ?>

                    <?php if(Myhelper::can(['fund_transfer', 'fund_return'])): ?>
                        menu += `<li><a href="javascript:void(0)" onclick="transfer(`+full.id+`)"><i class="icon-arrow-right5"></i>  Wallet Transfer</a></li>`;
                    <?php endif; ?>
                    
                    <?php if(Myhelper::can('member_scheme_update')): ?>
                        menu += `<li><a href="javascript:void(0)" onclick="scheme(`+full.id+`, '`+full.scheme_id+`')"><i class="icon-arrow-right5"></i> Scheme</a></li>`;
                    <?php endif; ?>
                    
                    <?php if(Myhelper::can("locked_amount")): ?>
                        menu += `<li><a href="javascript:void(0)" onclick="lockedAmount('`+full.id+`', '`+full.lockedamount+`')"><i class="icon-arrow-right5"></i> Locked Amount</a></li>`;
                    <?php endif; ?>

                    <?php if(Myhelper::can('member_permission_change')): ?>
                        menu += `<li><a href="javascript:void(0)" onclick="getPermission(`+full.id+`)"><i class="icon-arrow-right5"></i> Permission</a></li>`;
                    <?php endif; ?>

                    <?php if(Myhelper::can('member_kyc_update')): ?>
                        menu += `<li><a href="javascript:void(0)" onclick="kycManage(`+full.id+`, '`+full.kyc+`', '`+full.remark+`')"><i class="icon-arrow-right5"></i> Kyc Manager</a></li>`;
                    <?php endif; ?>

                    out +=  `<ul class="icons-list">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle mt-10" data-toggle="dropdown">
                                        <span class="label bg-slate">Action <i class="icon-arrow-down5"></i></span>
                                    </a>

                                    <ul class="dropdown-menu height-250">
                                        `+menu+`
                                    </ul>
                                </li>
                            </ul>`;
                    return out;
                }
            },
            { "data" : "agentcode",
                render:function(data, type, full, meta){
                    var check = "";
                    var type  = "";
                    if(full.status == "active"){
                        check = "checked='checked'";
                    }

                    return `<div>
                            <label class="switch">
                                <input type="checkbox" id="membarStatus" `+check+` value="`+full.id+`" actionType="`+type+`">
                                <span class="slider round"></span>
                            </label>
                        </div>`;
                }
            },
            { "data" : "agentcode",
                render:function(data, type, full, meta){
                    return `<a href="<?php echo e(url('profile/view')); ?>/`+full.id+`" target="_blank">`+full.name+`</a>`;
                }
            },
            { "data" : "email"},
            { "data" : "mobile"},
            { "data" : "mainwallet"},
            { "data" : "payoutwallet"},
            { "data" : "lockedamount"},
        ];

        datatableSetup(url, options, onDraw);

        $( "#transferForm").validate({
            rules: {
                type: {
                    required: true
                },
                amount: {
                    required: true,
                    min : 1
                }
            },
            messages: {
                type: {
                    required: "Please select transfer action",
                },
                amount: {
                    required: "Please enter amount",
                    min : "Amount value should be greater than 0"
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
                var form = $('#transferForm');
                var type = $('#transferForm').find('[name="type"]').val();
                form.ajaxSubmit({
                    dataType:'json',
                    beforeSubmit:function(){
                        form.find('button:submit').button('loading');
                    },
                    complete: function () {
                        form.find('button:submit').button('reset');
                    },
                    success:function(data){
                        if(data.status == "TXN"){
                            getbalance();
                            form.closest('.modal').modal('hide');
                            notify("Fund "+type+" Successfull", 'success');
                            $('#datatable').dataTable().api().ajax.reload();
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
        
        $( "#kycUpdateForm").validate({
            rules: {
                kyc: {
                    required: true
                }
            },
            messages: {
                kyc: {
                    required: "Please select kyc status",
                }
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
                var form = $('#kycUpdateForm');
                var type = $('#kycUpdateForm').find('[name="type"]').val();
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
                            getbalance();
                            form.closest('.modal').modal('hide');
                            notify("Member Kyc Updated Successfull", 'success');
                            $('#datatable').dataTable().api().ajax.reload();
                        }else{
                            notify(data.status , 'warning');
                        }
                    },
                    error: function(errors) {
                        showError(errors, form);
                    }
                });
            }
        });

        $( "#schemeForm").validate({
            rules: {
                scheme_id: {
                    required: true
                }
            },
            messages: {
                scheme_id: {
                    required: "Please select scheme",
                }
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
                var form = $('#schemeForm');
                var type = $('#schemeForm').find('[name="type"]').val();
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
                            getbalance();
                            form.closest('.modal').modal('hide');
                            notify("Member Scheme Updated Successfull", 'success');
                            $('#datatable').dataTable().api().ajax.reload();
                        }else{
                            notify(data.status , 'warning');
                        }
                    },
                    error: function(errors) {
                        showError(errors, form);
                    }
                });
            }
        });

        $('form#permissionForm').submit(function(){
    		var form= $(this);
            $(this).ajaxSubmit({
                dataType:'json',
                beforeSubmit:function(){
                    form.find('button[type="submit"]').button('loading');
                },
                complete: function(){
                    form.find('button[type="submit"]').button('reset');
                },
                success:function(data){
                    if(data.status == "success"){
                        notify('Permission Set Successfully', 'success');
                    }else{
                        notify('Transaction Failed', 'warning');
                    }
                },
                error: function(errors) {
                	showError(errors, form);
                }
            });
            return false;
    	});

        $('#selectall').click(function(event) {
            if(this.checked) {
                $('.case').each(function() {
                   this.checked = true;       
                });
                $('.selectall').each(function() {
                    this.checked = true;       
                });
             }else{
                $('.case').each(function() {
                   this.checked = false;
                });   
                $('.selectall').each(function() {
                    this.checked = false;       
                });
            }
        });

        $('.selectall').click(function(event) {
            if(this.checked) {
                $(this).closest('tr').find('.case').each(function() {
                   this.checked = true;       
                });
             }else{
                $(this).closest('tr').find('.case').each(function() {
                   this.checked = false;
                });      
            }
        });

        $( "#lockedAmountForm").validate({
            rules: {
                amount: {
                    required: true
                }
            },
            messages: {
                amount: {
                    required: "Please enter value",
                }
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
                var form = $('#lockedAmountForm');
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
                            form.closest('.modal').modal('hide');
                            notify("Request Successfull Completed", 'success');
                            $('#datatable').dataTable().api().ajax.reload();
                        }else{
                            notify(data.status , 'warning');
                        }
                    },
                    error: function(errors) {
                        showError(errors, form);
                    }
                });
            }
        });

        $( "#stockForm").validate({
            rules: {
                stock: {
                    required: true
                }
            },
            messages: {
                stock: {
                    required: "Please enter value",
                }
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
                var form = $('#stockForm');
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
                            form.closest('.modal').modal('hide');
                            notify("Request Successfull Completed", 'success');
                            $('#datatable').dataTable().api().ajax.reload();
                        }else{
                            notify(data.status , 'warning');
                        }
                    },
                    error: function(errors) {
                        showError(errors, form);
                    }
                });
            }
        });
    });

    function transfer(id){
        $('#transferForm').find('[name="payee_id"]').val(id);
        $('#transferModal').modal();
    }

    function getPermission(id) {
        if(id.length != ''){
            $.ajax({
                url: '<?php echo e(url('tools/get/permission')); ?>/'+id,
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            })
            .done(function(data) {
                $('#permissionForm').find('[name="payee_id"]').val(id);
                $('.case').each(function() {
                   this.checked = false;
                });
                $.each(data, function(index, val) {
                    $('#permissionForm').find('input[value='+val.permission_id+']').prop('checked', true);
                });
                $('#permissionModal').modal();
            })
            .fail(function() {
                notify('Somthing went wrong', 'warning');
            });
        }
    }

    function kycManage(id, kyc, remark){
        $('#kycUpdateForm').find('[name="id"]').val(id);
        $('#kycUpdateForm').find('[name="kyc"]').select2().val(kyc).trigger('change');
        $('#kycUpdateForm').find('[name="remark"]').val(remark);
        $('#kycUpdateModal').modal();
    }

    function scheme(id, scheme){
        $('#schemeForm').find('[name="id"]').val(id);
        if(scheme != '' && scheme != null && scheme != 'null'){
            $('#schemeForm').find('[name="scheme_id"]').select2().val(scheme).trigger('change');
        }
        $('#commissionModal').modal();
    }

    function addStock(id) {
        $('#idModal').find('input[name="id"]').val(id);
        $('#idModal').modal();
    }
    
    function rmupdate(id, reference) {
        $('#rmModal').find('input[name="id"]').val(id);
        $('#rmModal').find('input[name="reference"]').val(reference);
        $('#rmModal').modal();
    }

    function viewCommission(element) {
        var scheme_id = $(element).val();
        if(scheme_id != '' && scheme_id != 0){
            $.ajax({
                url: '<?php echo e(route("getMemberCommission")); ?>',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data : {"scheme_id" : scheme_id},
                beforeSend : function(){
                    swal({
                        title: 'Wait!',
                        text: 'Please wait, we are fetching commission details',
                        onOpen: () => {
                            swal.showLoading()
                        },
                        allowOutsideClick: () => !swal.isLoading()
                    });
                }
            })
            .success(function(data) {
                swal.close();
                $('#commissionModal').find('.commissioData').html(data);
            })
            .fail(function() {
                swal.close();
                notify('Somthing went wrong', 'warning');
            });
        }
    }

    function lockedAmount(id, amount) {
        $('#lockedAmountModal').find('input[name="id"]').val(id);
        $('#lockedAmountModal').find('input[name="lockedamount"]').val(amount);
        $('#lockedAmountModal').modal();
    }

    function stockmanager(id, stock) {
        $('#stockModal').find('input[name="id"]').val(id);
        $('#stockModal').modal();
    }
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u564371677/domains/dashboard.nanakpay.com/public_html/resources/views/member/index.blade.php ENDPATH**/ ?>