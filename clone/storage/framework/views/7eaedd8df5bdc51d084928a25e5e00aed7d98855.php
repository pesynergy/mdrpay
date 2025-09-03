<?php $__env->startSection('title', "Api Setting"); ?>
<?php $__env->startSection('pagetitle', "Api Setting"); ?>

<?php
    $table = "yes";
?>

<?php
    $search = "hide";
?>

<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5 class="panel-title">Api Tokens</h5>
                    <div class="heading-elements">
                        <button type="button" class="btn btn-sm bg-slate btn-raised heading-btn legitRipple" onclick="addSetup()">
                            <i class="icon-plus2"></i> Add New
                        </button>
                    </div>
                </div>
                <table class="table table-striped table-hover mt-20" id="datatable">
                    <thead>
                        <tr>
                            <th>IP</th>
                            <th>Token</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5 class="panel-title">Call Back</h5>
                </div>
                <form id="callbackForm" action="<?php echo e(route('profileUpdate')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="id" value="<?php echo e(Auth::user()->id); ?>">
                    <input type="hidden" name="actiontype" value="callbackurl">
                    <div class="panel-body" style="padding:16px">
                        <div class="form-group">
                            <textarea name="callbackurl" class="form-control" cols="30" rows="3" required placeholder="Enter Callback Url"><?php echo e(Auth::user()->callbackurl ?? ""); ?></textarea>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button class="btn bg-slate btn-raised legitRipple pull-right" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> Updating...">Update Info</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <form id="profileForm" action="<?php echo e(route('profileUpdate')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="actiontype" value="gateway">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title">Gateway Information</h5>
                    </div>
                    <div class="panel-body p-b-0">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Merchant ID</label>
                                <input type="text" name="merchant_id" class="form-control" value="<?php echo e(\Auth::user()->merchant_id); ?>" required="" placeholder="Enter Value">
                            </div>
                            <div class="form-group  col-md-6">
                                <label>Merchant Key</label>
                                <input type="text" name="merchant_key" class="form-control" value="<?php echo e(\Auth::user()->merchant_key); ?>" required="" placeholder="Enter Value">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group  col-md-6">
                                <label>My QrCode Image</label><br>
                                <button class="btn bg-slate btn-raised btn-xs legitRipple" data-toggle="modal" data-target="#qrModal" type="button">Upload</button>
                            </div>

                            <div class="form-group  col-md-6">
                                <label>Merchant Upi</label>
                                <input type="text" name="merchant_upi" class="form-control" value="<?php echo e(\Auth::user()->merchant_upi); ?>" required="" placeholder="Enter Value">
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button class="btn bg-slate btn-raised legitRipple pull-right" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> Updating...">Update Info</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5 class="panel-title">Your Services</h5>
                </div>
                <table class="table table-striped table-hover mt-20" id="datatable">
                    <thead>
                        <tr>
                            <th>Service</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th><?php echo e($service->name); ?></th>
                                <th class="<?php echo e($service->id); ?>"><label class="label label-danger">Not Active</label></th>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <form id="qrtestForm" action="<?php echo e(route('qrtest')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title">Qr Test</h5>
                    </div>
                    <div class="panel-body p-b-0">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Qr Type</label>
                                <select name="type" class="form-control" onchange="getAmount(this)" required>
                                    <option value="static">Static Qr</option>
                                    <option value="dynamic">Dynamic Qr</option>
                                </select>
                            </div>

                            <div class="form-group  col-md-6">
                                <label>Txnid</label>
                                <input type="text" name="txnid" class="form-control" required="" placeholder="Enter Value">
                            </div>

                            <div class="extra">
                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group  col-md-6">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" required="" placeholder="Enter Value">
                            </div>

                            <div class="form-group  col-md-6">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" required="" placeholder="Enter Value">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group  col-md-12">
                                <label>Callback</label>
                                <input type="text" name="callback" class="form-control" placeholder="Enter Value">
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button class="btn bg-slate btn-raised legitRipple pull-right" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> Updating...">Update Info</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

<div id="setupModal" class="modal fade" data-backdrop="false" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-slate">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Generate Token</h6>
            </div>
            <form id="setupManager" action="<?php echo e(route('apitokenstore')); ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <label>IP</label>
                        <input type="text" name="ip" class="form-control" placeholder="Enter your server ip" required="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-raised legitRipple" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button class="btn bg-slate btn-raised legitRipple" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> Submitting">Generate Token</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="qrModal" class="modal fade" data-backdrop="false" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-slate">
                <h6 class="modal-title">Qr Code</h6>
            </div>
            <div class="modal-body">
                <form class="dropzone" id="qrupload" action="<?php echo e(route('setupupdate')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="actiontype" value="qrcode">
                    <input type="hidden" name="name" value="qrcode">
                    <input type="hidden" name="code" value="qrcode">
                </form>

                <p>Info - Image size should be 800*600 for better view.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-raised legitRipple" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="qrshowModal" class="modal fade" data-backdrop="false" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-slate">
                <h6 class="modal-title">Qr Code</h6>
            </div>
            <div class="modal-body">
                <p class="qrlink"></p>
                <div class="qrimage"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-raised legitRipple" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.qrcode/1.0/jquery.qrcode.min.js"></script> 
<script type="text/javascript">
    $(document).ready(function () {
        var url = "<?php echo e(url('statement/list/fetch')); ?>/apitoken/0";
        <?php $__currentLoopData = $user_permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            $(".<?php echo e($user_permission->permission_id); ?>").html(`<label class="label label-success">Active</label>`);
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        Dropzone.options.qrupload = {
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 1, // MB
            complete: function(file) {
                this.removeFile(file);
            },
            success : function(file, data){
                $("[name='merchant_upi']").val(data);
                $("#qrModal").modal("hide");
            }
        };

        var onDraw = function() {};

        var options = [
            { "data" : "ip"},
            { "data" : "token"},
            { "data" : "name",
                render:function(data, type, full, meta){
                    var check = "<label class='label label-danger'>In-Active</label>";
                    if(full.status == "1"){
                        check = "<label class='label label-success'>Active</label>";
                    }

                    return check;
                }
            },
            { "data" : "action",
                render:function(data, type, full, meta){
                    return `<button type="button" class="btn bg-danger btn-raised legitRipple btn-xs" onclick="deleteToken(`+full.id+`)"> <i class="fa fa-trash"></i></button>`;
                }
            },
        ];
        datatableSetup(url, options, onDraw);

        $( "#setupManager" ).validate({
            rules: {
                ip: {
                    required: true,
                },
                domain: {
                    required: true,
                }
            },
            messages: {
                ip: {
                    required: "Please enter ip",
                },
                domain: {
                    required: "Please enter domain",
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
                var form = $('#setupManager');
                var id = form.find('[name="id"]').val();
                form.ajaxSubmit({
                    dataType:'json',
                    beforeSubmit:function(){
                        form.find('button[type="submit"]').button('loading');
                    },
                    success:function(data){
                        if(data.status == "success"){
                            if(id == "new"){
                                form[0].reset();
                                form.closest('.modal').modal('hide');
                            }
                            form.find('button[type="submit"]').button('reset');
                            notify("Token Successfully Generated", 'success');
                            $('#datatable').dataTable().api().ajax.reload();
                        }else{
                            notify(data.status, 'warning');
                        }
                    },
                    error: function(errors) {
                        showError(errors, form);
                    }
                });
            }
        });

        $( "#callbackForm" ).validate({
            rules: {
                callback: {
                    required: true,
                }
            },
            messages: {
                callback: {
                    required: "Please enter callback url",
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
                var form = $('#callbackForm');
                var id = form.find('[name="id"]').val();
                form.ajaxSubmit({
                    dataType:'json',
                    beforeSubmit:function(){
                        form.find('button[type="submit"]').button('loading');
                    },
                    success:function(data){
                        if(data.status == "success"){
                            form.find('button[type="submit"]').button('reset');
                            notify("Callback Successfully Updated", 'success');
                            $('#datatable').dataTable().api().ajax.reload();
                        }else{
                            notify(data.status, 'warning');
                        }
                    },
                    error: function(errors) {
                        showError(errors, form);
                    }
                });
            }
        });

        $( "#profileForm").validate({
            rules: {
                merchant_id: {
                    required: true,
                },
                merchant_key: {
                    required: true,
                },
                merchant_upi: {
                    required: true,
                }
            },
            messages: {
                merchant_id: {
                    required: "Please enter value",
                },
                merchant_key: {
                    required: "Please enter value",
                },
                merchant_upi: {
                    required: "Please enter value",
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
                var form = $('form#profileForm');
                form.find('span.text-danger').remove();
                $('form#profileForm').ajaxSubmit({
                    dataType:'json',
                    beforeSubmit:function(){
                        form.find('button:submit').button('loading');
                    },
                    complete: function () {
                        form.find('button:submit').button('reset');
                    },
                    success:function(data){
                        if(data.status == "success"){
                            notify("Details Successfully Updated" , 'success');
                        }else{
                            notify(data.status , 'warning');
                        }
                    },
                    error: function(errors) {
                        showError(errors, form.find('.panel-body'));
                    }
                });
            }
        });

        $( "#qrtestForm").validate({
            rules: {
                merchant_id: {
                    required: true,
                },
                merchant_key: {
                    required: true,
                },
                merchant_upi: {
                    required: true,
                }
            },
            messages: {
                merchant_id: {
                    required: "Please enter value",
                },
                merchant_key: {
                    required: "Please enter value",
                },
                merchant_upi: {
                    required: "Please enter value",
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
                var form = $('form#qrtestForm');
                form.find('span.text-danger').remove();
                $('form#qrtestForm').ajaxSubmit({
                    dataType:'json',
                    beforeSubmit:function(){
                        form.find('button:submit').button('loading');
                    },
                    complete: function () {
                        form.find('button:submit').button('reset');
                    },
                    success:function(data){
                        if(data.statuscode == "TXN"){
                            $("#qrshowModal").find("p.qrlink").text(data.upi_string);
                            jQuery("div.qrimage").qrcode({
                                width  : 250,
                                height : 250,
                                text: data.upi_string
                            });
                            $("#qrshowModal").modal("show");
                        }else{
                            notify(data.status , 'warning');
                        }
                    },
                    error: function(errors) {
                        showError(errors, form.find('.panel-body'));
                    }
                });
            }
        });
    });

    function addSetup(){
    	$('#setupModal').find('.msg').text("Add");
    	$('#setupModal').find('input[name="id"]').val("new");
    	$('#setupModal').modal('show');
    }

    function getAmount(element){
        var type = $(element).val();

        if(type == "dynamic"){
            $(".extra").html(`
                <div class="form-group  col-md-6">
                    <label>Amount</label>
                    <input type="text" name="amount" class="form-control" required="" placeholder="Enter Value">
                </div>
            `);
        }else{
            $(".extra").html('');
        }
    }
    
    function deleteToken(id){
        swal({
            title: 'Are you sure ?',
            text: "You want to delete token",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: 'Yes delete it!',
            showLoaderOnConfirm: true,
            allowOutsideClick: () => !swal.isLoading(),
            preConfirm: () => {
                return new Promise((resolve) => {
                    $.ajax({
                        url: "<?php echo e(route('tokenDelete')); ?>",
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType:'json',
                        data: {'id':id},
                        success: function(result){
                            resolve(result);
                        },
                        error: function(error){
                            resolve(error);
                        }
                    });
                });
            },
        }).then((result) => {
            if(result.value.status == "1"){
                notify("Token Successfully Deleted", 'success');
                $('#datatable').dataTable().api().ajax.reload();
            }else{
                notify('Something went wrong, try again', 'Oops', 'error');
            }
        });
    }
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>