<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title'); ?> - <?php echo e($mydata['company']->companyname); ?></title>

    <!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('')); ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('')); ?>assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo e(asset('')); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?php echo e(asset('')); ?>assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="<?php echo e(asset('')); ?>assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('')); ?>assets/css/colors.css" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('')); ?>assets/css/snackbar.css" rel="stylesheet">
    <!-- /global stylesheets -->
    <style>
        .navbar-inverse {
            background-color: <?php echo e($mydata['topheadcolor']->value ?? ''); ?> !important;
            border-color: <?php echo e($mydata['topheadcolor']->value ?? ''); ?>!important;
        }

        .sidebar-default{
            background-color: <?php echo e($mydata['sidebarcolor']->value ?? ''); ?> !important;
        }

        .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td{
            text-transform: none;
        }

        .navigation > li.active > a {
            color: #fff !important;
            background-color: <?php echo e($mydata['sidebarlightcolor']->value ?? '#083260'); ?>;
            background-image: -webkit-linear-gradient(left, <?php echo e($mydata['sidebarlightcolor']->value ?? '#083260'); ?> 0%, <?php echo e($mydata['sidebardarkcolor']->value ?? '#2574ab'); ?> 100%);
            background-image: -o-linear-gradient(left, <?php echo e($mydata['sidebarlightcolor']->value ?? '#083260'); ?> 0%, <?php echo e($mydata['sidebardarkcolor']->value ?? '#2574ab'); ?> 100%);
            background-image: linear-gradient(to right, <?php echo e($mydata['sidebarlightcolor']->value ?? '#083260'); ?> 0%, <?php echo e($mydata['sidebardarkcolor']->value ?? '#2574ab'); ?> 100%);
            background-repeat: repeat-x;
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='<?php echo e($mydata['sidebarlightcolor']->value ?? '#083260'); ?>', endColorstr='<?php echo e($mydata['sidebardarkcolor']->value ?? '#2574ab'); ?>', GradientType=1);
        }

        .panel-default > .panel-heading{
            color: #fff !important;
            background-color: <?php echo e($mydata['sidebarlightcolor']->value ?? '#083260'); ?>;
            background-image: -webkit-linear-gradient(left, <?php echo e($mydata['sidebarlightcolor']->value ?? '#083260'); ?> 0%, <?php echo e($mydata['sidebardarkcolor']->value ?? '#2574ab'); ?> 100%);
            background-image: -o-linear-gradient(left, <?php echo e($mydata['sidebarlightcolor']->value ?? '#083260'); ?> 0%, <?php echo e($mydata['sidebardarkcolor']->value ?? '#2574ab'); ?> 100%);
            background-image: linear-gradient(to right, <?php echo e($mydata['sidebarlightcolor']->value ?? '#083260'); ?> 0%, <?php echo e($mydata['sidebardarkcolor']->value ?? '#2574ab'); ?> 100%);
            background-repeat: repeat-x;
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='<?php echo e($mydata['sidebarlightcolor']->value ?? '#083260'); ?>', endColorstr='<?php echo e($mydata['sidebardarkcolor']->value ?? '#2574ab'); ?>', GradientType=1);
        }
        
        .newservice{
            background-image: url(http://e-banker.in/assets/new.png);
            background-size: 60px;
            background-repeat: no-repeat;
            background-position: -5px -9px;
            padding-left: 35px !important;
        }

        .sidebar-default .navigation li.active > a,
        .sidebar-default .navigation li.active > a:hover,
        .sidebar-default .navigation li.active > a:focus {
          background-color: #3355291c;
          color: <?php echo e($mydata['sidebarchildhrefcolor']->value ?? '#3082ab'); ?>;
        }

        .sidebar-detached .sidebar-default .navigation li > a, .sidebar-detached .navigation li a > i {
            color: #333333;
        }

        .navigation li a > i {
          float: left;
          top: 0;
          margin-top: 2px;
          margin-right: 15px;
          -webkit-transition: opacity 0.2s ease-in-out;
          -o-transition: opacity 0.2s ease-in-out;
          transition: opacity 0.2s ease-in-out;
          color:<?php echo e($mydata['sidebariconcolor']->value ?? '#409cab'); ?>;
        }

        .navigation > li.active .hidden-ul:before {
            border-top: 7px solid <?php echo e($mydata['sidebarlightcolor']->value ?? '#083260'); ?>;
            border-left: 7px solid transparent;
            border-right: 7px solid transparent;
            content: "";
            display: inline-block;
            position: absolute;
            left: 22px;
            top: 44px;
            z-index: 999;
        }

        p.error{
            color: #F44336;
        }
        .changePic{
            position: absolute;
            width: 100%;
            height: 30%;
            left: 0px;
            bottom: 0px;
            background: #fff;
            color: #000;
            padding: 20px 0px;
            line-height: 0px;
        }
        .companyname{
            font-size: 20px;
        }
        .navbar-brand{
            padding: 20px;
            height: 100%!important;
        }
        .modal{
            overflow: auto;
        }
        .news {
            background-color: #000;
            padding: 12px;
            font-size: 22px;
            color: white;
            text-transform: capitalize;
            border-radius: 3px;
            text-align: center;
        }
        .animationClass {
            animation: blink 1.5s linear infinite;
            -webkit-animation: blink 1.5s linear infinite;
            -moz-animation: blink 1.5s linear infinite;
            -o-animation: blink 1.5s linear infinite;
        }

        table{
            width: 100% !important;
        }

        .news:hover .animationClass{
            opacity: 1!important;
            -webkit-animation-play-state: paused;
            -moz-animation-play-state: paused;
            -o-animation-play-state: paused;
            animation-play-state: paused;
        }
          
        @keyframes  blink{
            30%{opacity: .30;}
            50%{opacity: .5;}
            75%{opacity: .75;}
            100%{opacity: 1;}
        }

        input[type="number"]::-webkit-outer-spin-button, input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
         
        input[type="number"] {
            -moz-appearance: textfield;
        }

        .sidebar-default .navigation > li ul {
            background-color: #fff;
            margin: 10px 20px;
            border-radius: 7px;
            padding:10px;
        }

        /* width */
            ::-webkit-scrollbar {
              width: 7px;
            }

            /* Track */
            ::-webkit-scrollbar-track {
              background: #f1f1f1; 
            }
             
            /* Handle */
            ::-webkit-scrollbar-thumb {
              background: #888; 
            }

            /* Handle on hover */
            ::-webkit-scrollbar-thumb:hover {
              background: #555; 
            }
        .sidebar-mobile-main .sidebar-main{
            position: absolute;
            width: 350px;
        }
    </style>
    <?php echo $__env->yieldPushContent('style'); ?>
    <!-- Core JS files -->
	<script type="text/javascript" src="<?php echo e(asset('')); ?>assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?php echo e(asset('')); ?>assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo e(asset('')); ?>assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('')); ?>assets/js/plugins/loaders/blockui.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('')); ?>assets/js/plugins/ui/ripple.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('')); ?>assets/js/core/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('')); ?>assets/js/core/jquery.form.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('')); ?>assets/js/core/sweetalert2.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('')); ?>assets/js/plugins/forms/selects/select2.min.js"></script>
    <script src="<?php echo e(asset('')); ?>/assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo e(asset('')); ?>assets/js/core/snackbar.js"></script>
    <script src="<?php echo e(asset('/assets/js/core/jQuery.print.js')); ?>"></script>
    <!-- /core JS files -->
    
    <?php if(isset($table) && $table == "yes"): ?>
    <script type="text/javascript" src="<?php echo e(asset('')); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <?php endif; ?>

    <script type="text/javascript" src="<?php echo e(asset('')); ?>assets/js/core/app.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('')); ?>assets/js/core/dropzone.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            // $("#my-scrollbar").niceScroll({
            //     cursorwidth : "10px"
            // });

            // $("body").niceScroll({
            //     cursorwidth : "10px"
            // });

            // $("#my-scrollbar").scroll(function(){
            //     $("#my-scrollbar").getNiceScroll().resize();
            // });

            // $().click(function() {
            //     $("#my-scrollbar").niceScroll({
            //         cursorwidth : "10px",
            //         hwacceleration:true,
            //         autohidemode:false
            //     });
            // });

            getbalance();
            $('.select').select2();

            $('#profileImg').hover(function(){
                $('span.changePic').show('400');
            });

            $('.changePic').hover(function(){
                $('span.changePic').show('400');
            }, function(){
                $('span.changePic').hide('400');
            });

            $(document).ready(function() {
                $(".sidebar-default a").each(function() {
                    if (this.href == window.location.href) {
                        $(this).addClass("active");
                        $(this).parent().addClass("active");
                        $(this).parent().parent().prev().addClass("active");
                        $(this).parent().parent().prev().click();
                    }
                });
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

            Dropzone.options.profileupload = {
                paramName: "profiles", // The name that will be used to transfer the file
                maxFilesize: .5, // MB
                complete: function(file) {
                    this.removeFile(file);
                },
                success : function(file, data){
                    console.log(file);
                    if(data.status == "success"){
                        $('#profileImg').removeAttr('src');
                        $('#profileImg').attr('src', file.dataURL);
                        notify("Profile Successfully Uploaded", 'success');
                    }else{
                        notify("Something went wrong, please try again.", 'warning');
                    }
                }
            };

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
                var todate =  $(this).find('input[name="to_date"]').val();
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
            
            $(".navigation-menu a").each(function () {
                alert();
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
            // $.ajax({
            //     url: "<?php echo e(route('getbalance')); ?>",
            //     type: "GET",
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     },
            //     dataType:'json',
            //     success: function(result){
            //         $.each(result, function (index, value) {
            //             $('.'+index).text(value);
            //         });
            //     }
            // });

            $.ajax({
                url: "<?php echo e(url('mydata')); ?>",
                type: "GET",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType:'json',
                success: function(data){
                    $('.fundCount').text(data.fundrequest);
                    $('.aepsfundrequest').text(data.aepsfundrequest);
                    $('.payoutfundrequest').text(data.payoutfundrequest);

                    $('.aepsfundCount').text(data.aepsfundrequest + data.payoutfundrequest);

                    $('.deviceCount').text(data.devicerequest);
                    $('.retaileridCount').text(data.retaileridrequest);
                    $('.member').text(data.member);
                    $('.complaint').text(data.complaint);
                    $('.apitoken').text(data.apitoken);
                    $('.payoutbank').text(data.payoutbank);
                    $('.pendingApprovals').text(data.pendingApprovals);

                    $('.kycpending').text(data.kycpending);
                    $('.kycsubmitted').text(data.kycsubmitted);
                    $('.kycrejected').text(data.kycrejected);
                    $('.kycuser').text(data.kycpending+ data.kycsubmitted + data.kycrejected);
                }
            });
        }

        <?php if(isset($table) && $table == "yes"): ?>
        function datatableSetup(urls, datas, onDraw=function () {}, ele="#datatable", element={}) {
            var options = {
                dom: '<"datatable-scroll"t><"datatable-footer"ipl>',
                processing: true,
                serverSide: true,
                ordering: false,
                stateSave: true,
                columnDefs: [{
                    orderable: false,
                    width: '130px',
                    targets: [ 0 ]
                }],  
                lengthMenu: [10, 25, 50, 100],
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
                let snackbar  = new SnackBar;
                snackbar.make("message",[
                    msg,
                    null,
                    "bottom",
                    "right",
                    "text-"+type
                ], 10000);
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
                    notify(errors.statusText , 'warning');
                }
            }else{
                if(errors.responseJSON.message){
                    notify(errors.responseJSON.message , 'warning');
                }else{
                    notify(errors.responseJSON.status , 'warning');
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
                    $.notify("Oops! "+errors.responseJSON.message, "error");
                }else{
                    if(errors.message){
                        $.notify("Oops! "+errors.message, "error");
                    }else{
                        $.notify("Oops! "+errors.statusText, "error");
                    }
                }
            },

            NOTIFY: function(msg, type="success", element="none"){
                if(element == "none"){
                    if(type == "success"){
                        $.notify("Success! "+msg, "success");
                    }else{
                        $.notify("Oops! "+msg, "error");
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
</script>
<?php echo $__env->yieldPushContent('script'); ?>
</head>

<body class="navbar-top <?php echo $__env->yieldContent('bodyClass'); ?>">
    <input type="hidden" name="dataType" value="">
    <?php echo $__env->make('layouts.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="page-container">
        <div class="page-content">
            <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <div class="content-wrapper">
                <?php echo $__env->make('layouts.pageheader', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>
    <snackbar></snackbar>

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
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        
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
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
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
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

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
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</body>

</html>
