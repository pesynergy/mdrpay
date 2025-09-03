<?php $__env->startSection('title', "Company Profile"); ?>
<?php $__env->startSection('pagetitle', "Company Profile"); ?>
<?php $__env->startSection('bodyClass', "has-detached-left"); ?>
<?php
    $table = "yes";
    $agentfilter = "hide";
?>

<?php
    $search = "hide";
?>

<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="sidebar-detached">
        <div class="sidebar sidebar-default sidebar-separate">
            <div class="sidebar-content">
                <div class="content-group">
                    <div class="panel-body bg-primary border-radius-top text-center" style="background-image: url(http://demo.interface.club/limitless/assets/images/bg.png); background-size: contain;">
                        <div class="content-group-sm">
                            <h6 class="text-semibold no-margin-bottom">
                                <?php echo e(ucfirst($company->companyname)); ?>

                            </h6>
                        </div>
                    </div>

                    <div class="panel no-border-top no-border-radius-top">
                        <ul class="navigation">
                            <li class="navigation-header">Navigation</li>
                            <li class="active"><a href="#profile" data-toggle="tab" class="legitRipple" aria-expanded="false"><i class="icon-chevron-right"></i> Company Details</a></li>
                            <li class=""><a href="#logo" data-toggle="tab" class="legitRipple" aria-expanded="false"><i class="icon-chevron-right"></i> Company Logo</a></li>
                            <li class=""><a href="#news" data-toggle="tab" class="legitRipple" aria-expanded="false"><i class="icon-chevron-right"></i> Company News</a></li>
                            <li class=""><a href="#support" data-toggle="tab" class="legitRipple" aria-expanded="false"><i class="icon-chevron-right"></i> Company Support Details</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-detached">
        <div class="content-detached">
            <div class="tab-content">

                <div class="tab-pane fade in active" id="profile">
                    <form id="profileForm" action="<?php echo e(route('resourceupdate')); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="id" value="<?php echo e($company->id); ?>">
                        <input type="hidden" name="actiontype" value="company">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title">Company Information</h5>
                            </div>
                            <div class="panel-body p-b-0">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>Company Name</label>
                                        <input type="text" name="companyname" class="form-control" value="<?php echo e($company->companyname); ?>" required="" placeholder="Enter Value">
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <button class="btn bg-slate btn-raised legitRipple pull-right" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> Updating...">Update Info</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade" id="logo">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">Company Logo</h4>
                        </div>
                        <div class="panel-body p-5">
                            <form class="dropzone" id="logoupload" action="<?php echo e(route('resourceupdate')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="actiontype" value="company">
                                <input type="hidden" name="id" value="<?php echo e($company->id); ?>">
                            </form>
                            <p>Note : Prefered image size is 260px * 56px</p>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="news">
                    <form id="newsForm" action="<?php echo e(route('resourceupdate')); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="id" value="<?php echo e($companydata->id ?? 'new'); ?>">
                        <input type="hidden" name="company_id" value="<?php echo e($company->id); ?>">
                        <input type="hidden" name="actiontype" value="companydata">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title">Company News</h5>
                            </div>
                            <div class="panel-body p-b-0">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>News</label>
                                        <textarea name="news" class="form-control" cols="30" rows="3" placeholder="Enter News"><?php echo e($companydata->news ?? ""); ?></textarea>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Bill Notice</label>
                                        <textarea name="billnotice" class="form-control" cols="30" rows="3" placeholder="Enter News"><?php echo e($companydata->billnotice ?? ""); ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <button class="btn bg-slate btn-raised legitRipple pull-right" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> Updating...">Update Info</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade" id="notice">
                    <form id="noticeForm" action="<?php echo e(route('resourceupdate')); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="id" value="<?php echo e($companydata->id ?? 'new'); ?>">
                        <input type="hidden" name="company_id" value="<?php echo e($company->id); ?>">
                        <input type="hidden" name="actiontype" value="companydata">
                        <input type="hidden" name="notice">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title">Company Notice</h5>
                            </div>
                            <div class="panel-body no-padding">
                                <div class="form-group summernote">
                                    <?php echo nl2br($companydata->notice ?? ''); ?>

                                </div>
                            </div>
                            <div class="panel-footer">
                                <button class="btn bg-slate btn-raised legitRipple pull-right" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> Updating...">Update Info</button>
                            </div>
                        </div>
                    </form>
                </div>
                
                <div class="tab-pane fade" id="loginslider">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">Login Slider List</h4>
                            <div class="heading-elements">
                                <button type="button" class="btn btn-sm bg-slate btn-raised heading-btn legitRipple" data-toggle="modal" data-target="#frontslideModal">
                                    <i class="icon-plus2"></i> Add New
                                </button>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped table-hover" id="datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Page</th>
                                    <th>Slider</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="bannerslider">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">App Banner List</h4>
                            <div class="heading-elements">
                                <button type="button" class="btn btn-sm bg-slate btn-raised heading-btn legitRipple" data-toggle="modal" data-target="#appslideModal">
                                    <i class="icon-plus2"></i> Add New
                                </button>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped table-hover" id="mydatatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Page</th>
                                    <th>Slider</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="support">
                    <form id="supportForm" action="<?php echo e(route('resourceupdate')); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="company_id" value="<?php echo e($company->id); ?>">
                        <input type="hidden" name="actiontype" value="companydata">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title">Company Support Information</h5>
                            </div>
                            <div class="panel-body p-b-0">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Contact Number</label>
                                        <textarea name="number" class="form-control" cols="30" rows="3" placeholder="Enter Value" required=""><?php echo e($companydata->number ?? ""); ?></textarea>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Contact Email</label>
                                        <textarea name="email" class="form-control" cols="30" rows="3" placeholder="Enter Value" required=""><?php echo e($companydata->email ?? ""); ?></textarea>
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
    </div>
</div>

<div id="frontslideModal" class="modal fade" data-backdrop="false" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-slate">
                <h6 class="modal-title">Slide Upload</h6>
            </div>
            <div class="modal-body">
                <form class="dropzone" id="slideupload" action="<?php echo e(route('setupupdate')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="actiontype" value="slides">
                    <input type="hidden" name="name" value="Login Slider">
                    <input type="hidden" name="code" value="slides">
                </form>

                <p>Info - Image size should be 800*600 for better view.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-raised legitRipple" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="appslideModal" class="modal fade" data-backdrop="false" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-slate">
                <h6 class="modal-title">App Slide Upload</h6>
            </div>
            <div class="modal-body">
                <form class="dropzone" id="appslideupload" action="<?php echo e(route('setupupdate')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="actiontype" value="slides">
                    <input type="hidden" name="name" value="App Banner">
                    <input type="hidden" name="code" value="appslides">
                </form>

                <p>Info - Image size should be 800*600 for better view.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-raised legitRipple" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>
    <style>
        .dropzone {
            min-height: 127px;
        }
        .dropzone .dz-default.dz-message:before{
            font-size: 50px;
            top: 60px;
        }
        .dropzone .dz-default.dz-message span{
            font-size: 18px;
            margin-top: 100px;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>

<script type="text/javascript" src="<?php echo e(asset('')); ?>assets/js/plugins/editors/summernote/summernote.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $( "#profileForm" ).validate({
            rules: {
                companyname: {
                    required: true,
                }
            },
            messages: {
                companyname: {
                    required: "Please enter name",
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
                            notify("Company Profile Successfully Updated" , 'success');
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

        $( "#newsForm" ).validate({
            rules: {
                company_id: {
                    required: true,
                }
            },
            messages: {
                company_id: {
                    required: "Please enter id",
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
                var form = $('form#newsForm');
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
                            notify("Company News Successfully Updated" , 'success');
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

        $( "#supportForm" ).validate({
            rules: {
                number: {
                    required: true,
                },
                email: {
                    required: true,
                }
            },
            messages: {
                number: {
                    required: "Number value is required",
                },
                email: {
                    required: "Email value is required",
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
                var form = $('form#supportForm');
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
                            notify("Company Support Details Successfully Updated" , 'success');
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

        $( "#noticeForm" ).validate({
            rules: {
                news: {
                    required: true,
                }
            },
            messages: {
                news: {
                    required: "Please enter name",
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
                var form = $('form#noticeForm');
                $('input[name="notice"]').val($('.note-editable').html());
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
                            notify("Company Notice Successfully Updated" , 'success');
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

        $('.summernote').summernote({
            height: 350,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: false                 // set focus to editable area after initializing summernote
        });

        var url = "<?php echo e(url('statement/list/fetch')); ?>/loginslide/0";

        var onDraw = function() {
        };

        var options = [
            { "data" : "id"},
            { "data" : "name"},
            { "data" : "action",
              "className" : "text-center",
                render:function(data, type, full, meta){
                    return `<a href="<?php echo e(asset('public')); ?>/`+full.value+`" target="_blank"><img src="<?php echo e(asset('public')); ?>/`+full.value+`" width="100px" height="50px"></a>`;
                }
            },
            { "data" : "action",
                render:function(data, type, full, meta){
                    return `<button type="button" class="btn bg-slate btn-raised legitRipple btn-xs" onclick="deleteSlide('`+full.value+`')"> Delete</button>`;
                }
            }
        ];
        datatableSetup(url, options, onDraw);

        var url = "<?php echo e(url('statement/list/fetch')); ?>/appslide/0";

        datatableSetup(url, options, onDraw, '#mydatatable');

        Dropzone.options.slideupload = {
            paramName: "slides", // The name that will be used to transfer the file
            maxFilesize: 1, // MB
            complete: function(file) {
                this.removeFile(file);
            },
            success : function(file, data){
                console.log(file);
                if(data.status == "success"){
                    $('#datatable').dataTable().api().ajax.reload();
                    notify("Slide Successfully Uploaded", 'success');
                }else{
                    notify("Something went wrong, please try again.", 'warning');
                }
            }
        };

        Dropzone.options.appslideupload = {
            paramName: "slides", // The name that will be used to transfer the file
            maxFilesize: 1, // MB
            complete: function(file) {
                this.removeFile(file);
            },
            success : function(file, data){
                console.log(file);
                if(data.status == "success"){
                    $('#datatable').dataTable().api().ajax.reload();
                    notify("Slide Successfully Uploaded", 'success');
                }else{
                    notify("Something went wrong, please try again.", 'warning');
                }
            }
        };
    });
    
    function deleteSlide(id) {
        $.ajax({
            url: '<?php echo e(route("statementDelete")); ?>',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data : {"slide" : id, 'type' : 'slide'},
            beforeSend : function(){
                swal({
                    title: 'Wait!',
                    text: 'Please wait, we are deleting slides',
                    onOpen: () => {
                        swal.showLoading()
                    },
                    allowOutsideClick: () => !swal.isLoading()
                });
            }
        })
        .success(function(data) {
            swal.close();
            $('#datatable').dataTable().api().ajax.reload();
            notify("Slide Successfully Deleted", 'success');
        })
        .fail(function() {
            swal.close();
            notify('Somthing went wrong', 'warning');
        });
    }
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>