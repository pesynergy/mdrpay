<!doctype html>
<html lang="en">
<head>
    <title><?php echo $__env->yieldContent('title'); ?> - <?php echo e($mydata['company']->companyname); ?></title>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">


    <!-- [Favicon] icon -->
    <link rel="icon" href="<?php echo e(asset('')); ?>new_assests/images/favicon.svg" type="image/x-icon" />
    <!-- map-vector css -->
    <link rel="stylesheet" href="<?php echo e(asset('')); ?>new_assests/css/plugins/jsvectormap.min.css" />
    <!-- [Google Font : Public Sans] icon -->
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet" />
    <!-- [phosphor Icons] https://phosphoricons.com/ -->
    <link rel="stylesheet" href="<?php echo e(asset('')); ?>new_assests/fonts/phosphor/duotone/style.css" />
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="<?php echo e(asset('')); ?>new_assests/fonts/tabler-icons.min.css" />
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="<?php echo e(asset('')); ?>new_assests/fonts/feather.css" />
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="<?php echo e(asset('')); ?>new_assests/fonts/fontawesome.css" />
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="<?php echo e(asset('')); ?>new_assests/fonts/material.css" />
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="<?php echo e(asset('')); ?>new_assests/css/style.css" id="main-style-link" />
    <link rel="stylesheet" href="<?php echo e(asset('')); ?>new_assests/css/style-preset.css" />
    
    <style>
        span.select2.select2-container.select2-container--default {
            display: none !important;
        }
    </style>
</head>
<body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme="light">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ Sidebar Menu ] start -->
    <?php echo $__env->make('layouts.newsidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- [ Sidebar Menu ] end -->
    <!-- [ Header Topbar ] start -->
    <?php echo $__env->make('layouts.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- [ Header ] end -->



    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pc-content">
            <!-- [ breadcrumb ] start -->
            <?php echo $__env->make('layouts.pageheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- [ breadcrumb ] end -->

            <!-- [ Main Content ] start -->
            <?php echo $__env->yieldContent('content'); ?>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>


    <!-- [Page Specific JS] start -->
    <!--<script src="<?php echo e(asset('')); ?>new_assests/js/plugins/apexcharts.min.js"></script>-->
    <!--<script src="<?php echo e(asset('')); ?>new_assests/js/plugins/jsvectormap.min.js"></script>-->
    <!--<script src="<?php echo e(asset('')); ?>new_assests/js/plugins/world.js"></script>-->
    <!--<script src="<?php echo e(asset('')); ?>new_assests/js/plugins/world-merc.js"></script>-->
    <!--<script src="<?php echo e(asset('')); ?>new_assests/js/widgets/earnings-users-chart.js"></script>-->
    <!--<script src="<?php echo e(asset('')); ?>new_assests/js/widgets/world-map-markers.js"></script>-->
    <!--  -->
    <!-- [Page Specific JS] end -->
    <!-- Required Js -->
    <script src="<?php echo e(asset('')); ?>new_assests/js/plugins/popper.min.js"></script>
    <script src="<?php echo e(asset('')); ?>new_assests/js/plugins/simplebar.min.js"></script>
    <script src="<?php echo e(asset('')); ?>new_assests/js/plugins/bootstrap.min.js"></script>
    <script src="<?php echo e(asset('')); ?>new_assests/js/plugins/i18next.min.js"></script>
    <script src="<?php echo e(asset('')); ?>new_assests/js/plugins/i18nextHttpBackend.min.js"></script>
    <script src="<?php echo e(asset('')); ?>new_assests/js/icon/custom-font.js"></script>
    <script src="<?php echo e(asset('')); ?>new_assests/js/script.js"></script>
    <script src="<?php echo e(asset('')); ?>new_assests/js/theme.js"></script>
    <script src="<?php echo e(asset('')); ?>new_assests/js/multi-lang.js"></script>
    <script src="<?php echo e(asset('')); ?>new_assests/js/plugins/feather.min.js"></script>

    <!--Old Script-->
    <script type="text/javascript" src="<?php echo e(asset('')); ?>assets/js/core/app.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('')); ?>assets/js/core/dropzone.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('')); ?>assets/js/plugins/materialToast/mdtoast.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('')); ?>assets/js/core/momentjs.js"></script>
	<script type="text/javascript" src="<?php echo e(asset('')); ?>assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('')); ?>assets/js/plugins/loaders/blockui.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('')); ?>assets/js/plugins/ui/ripple.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('')); ?>assets/js/core/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('')); ?>assets/js/core/jquery.form.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('')); ?>assets/js/core/sweetalert2.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('')); ?>assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('/assets/js/core/jQuery.print.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('')); ?>assets/js/plugins/forms/selects/select2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            getbalance();

            $('.select').select2();
            
            $(".navbar-default a").each(function() {
                if (this.href == window.location.href) {
                    $(this).addClass("active");
                    $(this).parent().addClass("active");
                    $(this).parent().parent().parent().addClass("active");
                    $(this).parent().parent().parent().parent().parent().parent().parent().addClass("active");
                }
            });

            $('#reportExport').click(function(){
                var type     = $('[name="dataType"]').val();
                var fromdate = $('#searchForm').find('input[name="from_date"]').val();
                var todate   = $('#searchForm').find('input[name="to_date"]').val();
                var agent    = $('#searchForm').find('input[name="agent"]').val();
                var status   = $('#searchForm').find('[name="status"]').val();

                <?php if(isset($id)): ?>
                    agent = "<?php echo e($id); ?>";
                <?php endif; ?>

                window.location.href = "<?php echo e(url('export/report')); ?>/"+type+"?fromdate="+fromdate+"&todate="+todate+"&agent="+agent+"&status="+status;
            });

            $('.mydate').datepicker({
                'autoclose':true,
                'clearBtn':true,
                'todayHighlight':true,
                'format':'yyyy-mm-dd'
            });

            $('input[name="from_date"]').datepicker("setDate", new Date());
            $('input[name="to_date"]').datepicker('setStartDate', new Date());

             $('input[name="to_date"]').focus(function(){
                if($('input[name="from_date"]').val().length == 0){
                    $('input[name="to_date"]').datepicker('hide');
                    $('input[name="from_date"]').focus();
                }
            });

            $('input[name="from_date"]').datepicker().on('changeDate', function(e) {
                $('input[name="to_date"]').datepicker('setStartDate', $('input[name="from_date"]').val());
                $('input[name="to_date"]').datepicker('setDate', $('input[name="from_date"]').val());
            });

            $('form#searchForm').submit(function(){
                $('#searchForm').find('button:submit').button('loading');
                var fromdate =  $(this).find('input[name="from_date"]').val();
                var todate   =  $(this).find('input[name="to_date"]').val();
                if(fromdate.length !=0 || todate.length !=0){
                    $('#datatable').dataTable().api().ajax.reload();
                }

                return false;
            });

            $('#formReset').click(function () {
                $('form#searchForm')[0].reset();
                $('form#searchForm').find('[name="from_date"]').datepicker().datepicker("setDate", new Date());
                $('form#searchForm').find('[name="to_date"]').datepicker().datepicker("setDate", null);
                $('form#searchForm').find('select').select2().val(null).trigger('change')
                $('#formReset').button('loading');
                $('#datatable').dataTable().api().ajax.reload();
            });
            
            $('select').change(function(event) {
                var ele = $(this);
                if(ele.val() != ''){
                    $(this).closest('div.form-group').find('p.error').remove();
                }
            });

            $( "#editForm" ).validate({
                rules: {
                    status: {
                        required: true,
                    },
                    txnid: {
                        required: true,
                    },
                    payid: {
                        required: true,
                    },
                    refno: {
                        required: true,
                    }
                },
                messages: {
                    name: {
                        required: "Please select status",
                    },
                    txnid: {
                        required: "Please enter txn id",
                    },
                    payid: {
                        required: "Please enter payid",
                    },
                    refno: {
                        required: "Please enter ref no",
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
                    var form = $('#editForm');
                    var id = form.find('[name="id"]').val();
                    form.ajaxSubmit({
                        dataType:'json',
                        beforeSubmit:function(){
                            form.find('button[type="submit"]').button('loading');
                        },
                        success:function(data){
                            if(data.status == "success"){
                                form.find('button[type="submit"]').button('reset');
                                notify("Task Successfully Completed", 'success');
                                $('#datatable').dataTable().api().ajax.reload(null, false);
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

            $(".modal").on('hidden.bs.modal', function () {
                if($(this).find('form').length){
                    $(this).find('form')[0].reset();
                }
    
                if($(this).find('.select').length){
                    $(this).find('.select').val(null).trigger('change');
                }
            });

            $( "#walletLoadForm").validate({
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
                    var form = $('#walletLoadForm');
                    form.ajaxSubmit({
                        dataType:'json',
                        beforeSubmit:function(){
                            form.find('button:submit').button('loading');
                        },
                        complete: function () {
                            form.find('button:submit').button('reset');
                        },
                        success:function(data){
                            if(data.status){
                                form[0].reset();
                                getbalance();
                                form.closest('.modal').modal('hide');
                                notify("Wallet successfully loaded", 'success');
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

            $( "#complaintForm").validate({
                rules: {
                    subject: {
                        required: true,
                    },
                    description: {
                        required: true,
                    }
                },
                messages: {
                    subject: {
                        required: "Please select subject",
                    },
                    description: {
                        required: "Please enter your description",
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
                    var form = $('#complaintForm');
                    form.ajaxSubmit({
                        dataType:'json',
                        beforeSubmit:function(){
                            form.find('button:submit').button('loading');
                        },
                        complete: function () {
                            form.find('button:submit').button('reset');
                        },
                        success:function(data){
                            if(data.status){
                                if(data.status == "success"){
                                    form[0].reset();
                                    form.closest('.modal').modal('hide');
                                    notify("Complaint successfully submitted", 'success');
                                }else{
                                    notify(data.status , 'warning');
                                }
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
            
            $( "#notifyForm").validate({
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
                    var form = $('#notifyForm');
                    form.ajaxSubmit({
                        dataType:'json',
                        beforeSubmit:function(){
                            form.find('button:submit').button('loading');
                        },
                        complete: function () {
                            form.find('button:submit').button('reset');
                        },
                        success:function(data){
                            if(data.status){
                                form[0].reset();
                                getbalance();
                                form.closest('.modal').modal('hide');
                                notify("Send successfully", 'success');
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

        function getbalance(){
            $.ajax({
                url: "<?php echo e(url('mydata')); ?>",
                type: "GET",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType:'json',
                success: function(data){
                    $('.fundCount').text(data.fundrequest);
                    $(".payin").text(data.payin);
                    $(".payout").text(data.payout);
                }
            });
        }

        <?php if(isset($table) && $table == "yes"): ?>
            function datatableSetup(urls, datas, onDraw=function () {}, ele="#datatable", element={}) {
                var options = {
                    dom: '<"datatable-header"l><"datatable-scroll"t><"datatable-footer"ip>',
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    ordering:   false,
                    stateSave:  true,
                    lengthMenu: [25, 50, 100],
                    language: {
                        paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
                    },
                    drawCallback: function () {
                        $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
                    },
                    preDrawCallback: function() {
                        $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
                    },    
                    ajax:{
                        url : urls,
                        type: "post",
                        data:function( d )
                            {
                                d._token   = $('meta[name="csrf-token"]').attr('content');
                                d.type     = $('[name="dataType"]').val();
                                d.fromdate = $('#searchForm').find('[name="from_date"]').val();
                                d.todate   = $('#searchForm').find('[name="to_date"]').val();
                                d.searchtext = $('#searchForm').find('[name="searchtext"]').val();
                                d.agent    = $('#searchForm').find('[name="agent"]').val();
                                d.status   = $('#searchForm').find('[name="status"]').val();
                                d.product  = $('#searchForm').find('[name="product"]').val();
                            },
                        beforeSend: function(){
                        },
                        complete: function(){
                            $('#searchForm').find('button:submit').button('reset');
                            $('#formReset').button('reset');
                        },
                        error:function(response) {
                        }
                    },
                    columns: datas
                };

                $.each(element, function(index, val) {
                    options[index] = val; 
                });

                var DT = $(ele).DataTable(options).on('draw.dt', onDraw);
                return DT;
            }
        <?php endif; ?>

        function notify(msg, type="success", notitype="popup", element="none"){
            if(notitype == "popup"){
                switch(type){
                    case "success":
                        mdtoast.success("Success : "+msg, { position: "top center" });
                    break;

                    default:
                        mdtoast.error("Oops! "+msg, { position: "top center" });
                        break;
                }
            }else{
                element.find('div.alert').remove();
                element.prepend(`<div class="alert bg-`+type+` alert-styled-left">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button> `+msg+`
                </div>`);

                setTimeout(function(){
                    element.find('div.alert').remove();
                }, 10000);
            }
        }

        function showError(errors, form="withoutform"){
            if(form != "withoutform"){
                form.find('button[type="submit"]').button('reset');
                $('p.error').remove();
                $('div.alert').remove();
                if(errors.status == 422){
                    $.each(errors.responseJSON.errors, function (index, value) {
                        form.find('[name="'+index+'"]').closest('div.form-group').append('<p class="error">'+value+'</span>');
                    });
                    form.find('p.error').first().closest('.form-group').find('input').focus();
                    setTimeout(function () {
                        form.find('p.error').remove();
                    }, 5000);
                }else if(errors.status == 400){
                    if(errors.responseJSON.message){
                        form.prepend(`<div class="alert bg-danger alert-styled-left">
                            <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                            <span class="text-semibold">Oops !</span> `+errors.responseJSON.message+`
                        </div>`);
                    }else{
                        form.prepend(`<div class="alert bg-danger alert-styled-left">
                            <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                            <span class="text-semibold">Oops !</span> `+errors.responseJSON.status+`
                        </div>`);
                    }

                    setTimeout(function () {
                        form.find('div.alert').remove();
                    }, 10000);
                }else{
                    mdtoast.error("Oops! "+errors.statusText , { position: "top center" });
                }
            }else{
                if(errors.responseJSON.message){
                    mdtoast.error("Oops! "+errors.responseJSON.message, { position: "top center" });
                }else{
                    mdtoast.error("Oops! "+errors.responseJSON.status, { position: "top center" });
                }
            }
        }

        function sessionOut(){
            window.location.href = "<?php echo e(route('logout')); ?>";
        }

        function status(id, type){
            $.ajax({
                url: `<?php echo e(route('statementStatus')); ?>`,
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType:'json',
                beforeSend:function(){
                    swal({
                        title: 'Wait!',
                        text: 'Please wait, we are fetching transaction details',
                        onOpen: () => {
                            swal.showLoading()
                        },
                        allowOutsideClick: () => !swal.isLoading()
                    });
                },
                data:{'id':id, "type":type}
            })
            .done(function(data) {
                if(data.status == "success"){
                    if(data.refno){
                        var refno = "Operator Refrence is "+data.refno
                    }else{
                        var refno = data.remark;
                    }
                    swal({
                        type: 'success',
                        title: data.status,
                        text : refno,
                        onClose: () => {
                            $('#datatable').dataTable().api().ajax.reload(null, false);
                        },
                    });
                }else{
                    swal({
                        type: 'success',
                        title: data.status,
                        text : "Transaction status is "+data.status,
                        onClose: () => {
                            $('#datatable').dataTable().api().ajax.reload(null, false);
                        },
                    });
                }
            })
            .fail(function(errors) {
                swal.close();
                showError(errors, "withoutform");
            });
        }

        function editReport(id, refno, txnid, payid, remark, status, actiontype){
            $('#editModal').find('[name="id"]').val(id);
            $('#editModal').find('[name="status"]').val(status).trigger('change');
            $('#editModal').find('[name="refno"]').val(refno);
            $('#editModal').find('[name="txnid"]').val(txnid);
            if(actiontype == "billpay"){
                $('#editModal').find('[name="payid"]').closest('div.form-group').remove();
            }else{
                $('#editModal').find('[name="payid"]').val(payid);
            }
            $('#editModal').find('[name="remark"]').val(remark);
            $('#editModal').find('[name="actiontype"]').val(actiontype);
            $('#editModal').modal('show');
        }

        function complaint(id, product){
            $('#complaintModal').find('[name="transaction_id"]').val(id);
            $('#complaintModal').find('[name="product"]').val(product);
            $('#complaintModal').modal('show');
        }
    </script>
    
    <script type="text/javascript">
        var ROOT = "<?php echo e(url('')); ?>" , SYSTEM;

        $(document).ready(function () {
            SYSTEM = {
                DEFAULT: function () {
                },

                FORMBLOCK:function (form) {
                    form.block({
                        message: '<span class="text-semibold"><i class="icon-spinner4 spinner position-left"></i>&nbsp; Working on request</span>',
                        overlayCSS: {
                            backgroundColor: '#fff',
                            opacity: 0.8,
                            cursor: 'wait'
                        },
                        css: {
                            border: 0,
                            padding: '10px 15px',
                            color: '#fff',
                            width: 'auto',
                            '-webkit-border-radius': 2,
                            '-moz-border-radius': 2,
                            backgroundColor: '#333'
                        }
                    });
                },

                FORMUNBLOCK: function (form) {
                    form.unblock();
                },

                FORMSUBMIT: function(form, callback, block="none"){
                    form.ajaxSubmit({
                        dataType:'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        beforeSubmit:function(){
                            form.find('button[type="submit"]').button('loading');
                            if(block == "none"){
                                form.block({
                                    message: '<span class="text-semibold"><i class="icon-spinner4 spinner position-left"></i>&nbsp; Working on request</span>',
                                    overlayCSS: {
                                        backgroundColor: '#fff',
                                        opacity: 0.8,
                                        cursor: 'wait'
                                    },
                                    css: {
                                        border: 0,
                                        padding: '10px 15px',
                                        color: '#fff',
                                        width: 'auto',
                                        '-webkit-border-radius': 2,
                                        '-moz-border-radius': 2,
                                        backgroundColor: '#333'
                                    }
                                });
                            }
                        },
                        complete: function(){
                            form.find('button[type="submit"]').button('reset');
                            if(block == "none"){
                                form.unblock();
                            }
                        },
                        success:function(data){
                            callback(data);
                        },
                        error: function(errors) {
                            callback(errors);
                        }
                    });
                },

                AJAX: function(url, method, data, callback, loading="none", msg="Updating Data"){
                    $.ajax({
                        url: url,
                        type: method,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType:'json',
                        data: data,
                        beforeSend:function(){
                            if(loading != "none"){
                                $(loading).block({
                                    message: '<span class="text-semibold"><i class="icon-spinner4 spinner position-left"></i> '+msg+'</span>',
                                    overlayCSS: {
                                        backgroundColor: '#fff',
                                        opacity: 0.8,
                                        cursor: 'wait'
                                    },
                                    css: {
                                        border: 0,
                                        padding: '10px 15px',
                                        color: '#fff',
                                        width: 'auto',
                                        '-webkit-border-radius': 2,
                                        '-moz-border-radius': 2,
                                        backgroundColor: '#333'
                                    }
                                });
                            }
                        },
                        complete: function () {
                            $(loading).unblock();
                        },
                        success:function(data){
                            callback(data);
                        },
                        error: function(errors) {
                            callback(errors);
                        }
                    });
                },

                SHOWERROR: function(errors, form){
                    if(errors.status == 422){
                        $.each(errors.responseJSON.errors, function (index, value) {
                            form.find('[name="'+index+'"]').closest('div.form-group').append('<p class="error">'+value+'</span>');
                        });
                        form.find('p.error').first().closest('.form-group').find('input').focus();
                        setTimeout(function () {
                            form.find('p.error').remove();
                        }, 5000);
                    }else if(errors.status == 400){
                        mdtoast.error("Oops! "+errors.responseJSON.message, { position: "top center" });
                    }else{
                        if(errors.message){
                            mdtoast.error("Oops! "+errors.message, { position: "top center" });
                        }else{
                            mdtoast.error("Oops! "+errors.statusText, { position: "top center" });
                        }
                    }
                },

                NOTIFY: function(msg, type="success",element="none"){
                    if(element == "none"){
                        switch(type){
                            case "success":
                                mdtoast.success("Success : "+msg, { position: "top center" });
                            break;

                            default:
                                mdtoast.error("Oops! "+msg, { position: "top center" });
                                break;
                        }
                    }else{
                        element.find('div.alert').remove();
                        element.prepend(`<div class="alert bg-`+type+` alert-styled-left">
                            <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button> `+msg+`
                        </div>`);

                        setTimeout(function(){
                            element.find('div.alert').remove();
                        }, 10000);
                    }
                }
            }
            SYSTEM.DEFAULT();
        });
        // Function to set a cookie
        function setCookie(name, value, days) {
            let expires = "";
            if (days) {
                const date = new Date();
                date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }
        
        // Function to get a cookie
        function getCookie(name) {
            const nameEQ = name + "=";
            const cookies = document.cookie.split(';');
            for (let i = 0; i < cookies.length; i++) {
                let c = cookies[i];
                while (c.charAt(0) === ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }
        
        // Function to delete a cookie
        function eraseCookie(name) {
            document.cookie = name + "=; Max-Age=-99999999;";
        }
    </script>
    
    <script>
      layout_change('light');
      layout_sidebar_change('light');
      change_box_container('false');
      layout_caption_change('true');
      layout_rtl_change('false');
      preset_change('preset-1');
    </script>
    <?php echo $__env->yieldPushContent('script'); ?>

  </body>
</html>
<?php /**PATH /home/u690537273/domains/login.mdrpay.com/public_html/clone/resources/views/layouts/app.blade.php ENDPATH**/ ?>