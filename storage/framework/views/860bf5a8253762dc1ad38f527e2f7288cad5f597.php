<!DOCTYPE html>
<html lang="zxx">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title>Login <?php echo e($_SERVER['HTTP_HOST']); ?></title>
        <link rel="shortcut icon" type="image/icon" href="images/favicon-16x16.png"/>
        <link  rel="stylesheet" href="<?php echo e(asset('')); ?>login/css/login3-style.css">
        <link href="<?php echo e(asset('')); ?>assets/css/snackbar.css" rel="stylesheet">
        <link href="<?php echo e(asset('')); ?>assets/css/jquery-confirm.min.css" rel="stylesheet" type="text/css">
  </head>
  
  <body>
    <div id="preload-block">
      <div class="square-block"></div>
    </div>
    
    <div class="container-fluid">
      <div class="row">
        <div class="authfy-container col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3">
          <div class="col-sm-5 authfy-panel-left">
            <div class="brand-col">
              <div class="headline">
                <!-- brand-logo start -->
                <div class="brand-logo">
                    <?php if($mydata['company']->logo): ?>
                    <img src="<?php echo e(asset('')); ?>public/<?php echo e($mydata['company']->logo); ?>" class=" img-responsive" alt="" style="
                        width: 150px;
                        height: 40px;
                    ">
                    <?php endif; ?>
                </div><!-- ./brand-logo -->
                <p>Login to <?php echo e($mydata['company']->companyname); ?></p>
                <!-- social login buttons start -->
                <div class="row social-buttons">
                  <div class="col-xs-4 col-sm-4 col-md-12">
                    <a href="#" class="btn btn-block btn-facebook">
                      <i class="fa fa-facebook"></i> <span class="hidden-xs hidden-sm">Signin with facebook</span>
                    </a>
                  </div>
                  <div class="col-xs-4 col-sm-4 col-md-12">
                    <a href="#" class="btn btn-block btn-twitter">
                      <i class="fa fa-twitter"></i> <span class="hidden-xs hidden-sm">Signin with twitter</span>
                    </a>
                  </div>
                  <div class="col-xs-4 col-sm-4 col-md-12">
                    <a href="#" class="btn btn-block btn-google">
                      <i class="fa fa-google-plus"></i> <span class="hidden-xs hidden-sm">Signin with google</span>
                    </a>
                  </div>
                </div><!-- ./social-buttons -->
              </div>
            </div>
          </div>
          <div class="col-sm-7 authfy-panel-right">
            <!-- authfy-login start -->
            <div class="authfy-login">
              <!-- panel-login start -->
              <div class="authfy-panel panel-login text-center active">
                <div class="authfy-heading">
                  <h3 class="auth-title">Login to your account</h3>
                </div>
                <div class="row">
                  <div class="col-xs-12 col-sm-12">
                    <form class="login-form" id="login" method="POST" action="<?php echo e(route('authCheck')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="gps_location">
                      <div class="form-group">
                        <input type="text" class="form-control" name="mobile" placeholder="Username">
                      </div>
                      <div class="form-group">
                        <div class="pwdMask">
                          <input type="password" class="form-control password" name="password" placeholder="Password">
                          <span class="fa fa-eye-slash pwd-toggle"></span>
                        </div>
                      </div>
                      <!-- start remember-row -->
                      <div class="row remember-row">
                        <div class="col-xs-6 col-sm-6">
                          <label class="checkbox text-left">
                            <input type="checkbox" value="remember-me">
                            <span class="label-text">Remember me</span>
                          </label>
                        </div>
                        <div class="col-xs-6 col-sm-6">
                          <p class="forgotPwd">
                            <a onclick="LOGINSYSTEM.PASSWORDRESET()" href="javascript:void(0)">Forgot password?</a>
                          </p>
                        </div>
                      </div> <!-- ./remember-row -->
                      <div class="form-group">
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <div class="authfy-panel panel-forgot">
                <div class="row">
                  <div class="col-xs-12 col-sm-12">
                    <div class="authfy-heading">
                      <h3 class="auth-title">Recover your password</h3>
                      <p>Fill in your e-mail address below and we will send you an email with further instructions.</p>
                    </div>
                    <form name="forgetForm" class="forgetForm" action="#" method="POST">
                      <div class="form-group">
                        <input type="email" class="form-control" name="username" placeholder="Username">
                      </div>
                      <div class="form-group">
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Recover your password</button>
                      </div>
                      <div class="form-group">
                        <a class="lnk-toggler" data-panel=".panel-login" href="#">Already have an account?</a>
                      </div>
                    </form>
                  </div>
                </div>
              </div> 
            </div> 
          </div>
        </div>
      </div>
    </div>

    <div id="passwordResetModal" class="modal fade" data-backdrop="false" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title pull-left">Password Reset Request</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="passwordRequestForm" action="<?php echo e(route('authReset')); ?>" method="post">
                        <b><p class="text-danger"></p></b>
                        <input type="hidden" name="type" value="request">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number" required="">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block text-uppercase waves-effect waves-light" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> Resetting">Reset Request</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <div id="passwordModal" class="modal fade" data-backdrop="false" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title pull-left">Password Reset</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="alert bg-success alert-styled-left">
                        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                        <span class="text-semibold">Success!</span> Your password reset token successfully sent on your registered e-mail id & Mobile number.
                    </div>
                    <form id="passwordForm" action="<?php echo e(route('authReset')); ?>" method="post">
                        <b><p class="text-danger"></p></b>
                        <input type="hidden" name="mobile">
                        <input type="hidden" name="type" value="reset">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <label>Reset Token</label>
                            <input type="text" name="token" class="form-control" placeholder="Enter OTP" required="">
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter New Password" required="">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block text-uppercase waves-effect waves-light" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> Resetting">Reset Password</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <snackbar></snackbar>
    <script src="<?php echo e(asset('')); ?>login/js/jquery-2.2.4.min.js"></script>
    <script src="<?php echo e(asset('')); ?>login/js/bootstrap.min.js"></script>
    <script src="<?php echo e(asset('')); ?>login/js/custom.js"></script>
  
    <script type="text/javascript" src="<?php echo e(asset('')); ?>assets/js/core/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('')); ?>assets/js/core/jquery.form.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('')); ?>assets/js/core/sweetalert2.min.js"></script>
    <script src="<?php echo e(asset('')); ?>assets/js/core/snackbar.js"></script>
    <script src="<?php echo e(asset('')); ?>assets/js/crytojs/cryptojs-aes-format.js"></script>
    <script src="<?php echo e(asset('')); ?>assets/js/crytojs/cryptojs-aes.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('')); ?>assets/js/core/jquery-confirm.min.js"></script>

    <script type="text/javascript">
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />'); 
            else $('head > link').filter(':first').replaceWith(defaultCSS); 
        }

        $(document).ready(function() {
            $.fn.extend({
                myalert: function(value, type, time = 5000) {
                    var tag = $(this);
                    tag.find('.myalert').remove();
                    tag.append('<p id="" class="myalert text-' + type + '">' + value + '</p>');
                    tag.find('input').focus();
                    tag.find('select').focus();
                    setTimeout(function() {
                        tag.find('.myalert').remove();
                    }, time);
                    tag.find('input').change(function() {
                        if (tag.find('input').val() != '') {
                            tag.find('.myalert').remove();
                        }
                    });
                    tag.find('select').change(function() {
                        if (tag.find('select').val() != '') {
                            tag.find('.myalert').remove();
                        }
                    });
                },

                mynotify: function(value, type, time = 5000) {
                    var tag = $(this);
                    tag.find('.mynotify').remove();
                    tag.prepend(`<div class="mynotify alert alert-` + type + ` alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        ` + value + `
                    </div>`);
                    setTimeout(function() {
                        tag.find('.mynotify').remove();
                    }, time);
                }
            });

            LOGINSYSTEM = {
                    DEFAULT: function() {
                        LOGINSYSTEM.BEFORE_SUBMIT();
                    },

                    BEFORE_SUBMIT: function() {
                        $('#login').submit(function() {
                            var username = $("[name='mobile']").val();
                            var password = $("[name='password']").val();

                            if (username == "") {
                                $("[name='mobile']").closest('.form-group').myalert('Enter username', 'danger');
                            }else if (password == "") {
                                $("[name='password']").closest('.form-group').myalert('Enter Password', 'danger');
                            } else {
                                var form = $('#login');
                                swal({
                                    title: 'Wait!',
                                    text: 'Please wait, we are working on your request',
                                    onOpen: () => {
                                        swal.showLoading()
                                    }
                                });
                                if (navigator.geolocation){
                                    navigator.geolocation.getCurrentPosition(
                                        function(position){
                                            form.find("[name='gps_location']").val(position.coords.latitude+"/"+position.coords.longitude);
                                            localStorage.setItem("gps_location", position.coords.latitude+"/"+position.coords.longitude);
                                            form.find("[name='password']").val(CryptoJSAesJson.encrypt(JSON.stringify(form.serialize()), "<?php echo e(csrf_token()); ?>"));
                                            LOGINSYSTEM.LOGIN();
                                        },function(error){
                                            switch(error.code) {
                                                case error.PERMISSION_DENIED:
                                                    swal({
                                                        type  : 'error',
                                                        title : 'Location Access Denied',
                                                        text  : 'Kindly allow permission to access location for secure browsing',
                                                    });
                                                    return false;
                                                break;

                                                default:
                                                    LOGINSYSTEM.LOGIN();
                                                break;
                                            }
                                        }
                                    );
                                }
                            }

                            return false;
                        });

                        $("#registerForm").validate({
                            rules: {
                                name: {
                                    required: true,
                                },
                                mobile: {
                                    required: true,
                                    number: true
                                },
                                email: {
                                    required: true,
                                    email: true
                                }
                            },
                            messages: {
                                mobile: {
                                    required: "Please enter mobile",
                                    number: "mobile should be numeric",
                                },
                                name: {
                                    required: "Please enter your name",
                                },
                                email: {
                                    required: "Please enter your email",
                                    email: "Please enter valid email"
                                }
                            },
                            errorElement: "p",
                            errorPlacement: function(error, element) {
                                if (element.prop("tagName").toLowerCase() === "select") {
                                    error.insertAfter(element.closest(".form-group").find(".select2"));
                                } else {
                                    error.insertAfter(element);
                                }
                            },
                            submitHandler: function() {
                                LOGINSYSTEM.REGISTRATION()
                            }
                        });

                        $( "#passwordForm" ).validate({
                            rules: {
                                token: {
                                    required: true,
                                    number : true
                                },
                                password: {
                                    required: true,
                                }
                            },
                            messages: {
                                token: {
                                    required: "Please enter reset token",
                                    number: "Reset token should be numeric",
                                },
                                password: {
                                    required: "Please enter password",
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
                                var form = $('#passwordForm');
                                form.ajaxSubmit({
                                    dataType:'json',
                                    beforeSubmit:function(){
                                        swal({
                                            title: 'Wait!',
                                            text: 'We are checking your login credential',
                                            onOpen: () => {
                                                swal.showLoading()
                                            },
                                            allowOutsideClick: () => !swal.isLoading()
                                        });
                                    },
                                    success:function(data){
                                        swal.close();
                                        if(data.status == "TXN"){
                                            $('#passwordModal').modal('hide');
                                            swal({
                                                type: 'success',
                                                title: 'Reset!',
                                                text: 'Password Successfully Changed',
                                                showConfirmButton: true
                                            });
                                        }else{
                                            notify(data.message, 'warning');
                                        }
                                    },
                                    error: function(errors) {
                                        swal.close();
                                        if(errors.status == '400'){
                                            notify(errors.responseJSON.status, 'warning');
                                        }else{
                                            notify('Something went wrong, try again later.', 'warning');
                                        }
                                    }
                                });
                            }
                        });
                    },

                    LOGIN: function() {
                        var form = $('#login');
                        SYSTEM.FORMSUBMIT($('#login'), function(data) {
                            swal.close();
                            if (!data.statusText) {
                                if (data.status == "TXN") {
                                    form.find("[name='password']").val(null);
                                    swal({
                                        type: 'success',
                                        title: 'Successfully Logged In.',
                                        showConfirmButton: false,
                                        timer: 2000,
                                        onClose: () => {
                                            window.location.reload();
                                        }
                                    });
                                }else if(data.status == "TXNOTP"){
                                    var otpConfirm = $.confirm({
                                        lazyOpen: true,
                                        title: 'Otp Verification',
                                        content: '' +
                                        '<form action="javascript:void(0)" id="otpValidateForm">' +
                                        '<div class="form-group">' +
                                        '<input type="password" placeholder="Enter Otp" name="otp" class="name form-control" required />' +
                                        '</div>' +
                                        '<p class="text-success"><b>'+data.message+'</b></p>'+
                                        '</form>',
                                        buttons: {
                                            formSubmit: {
                                                text: 'Submit',
                                                keys: ['enter', 'shift'],
                                                btnClass: 'btn-blue',
                                                action: function () {
                                                    var otp = this.$content.find('[name="otp"]').val();
                                                    var mobile  = $('#login').find('[name="mobile"]').val();
                                                    var password = $('#login').find('[name="password"]').val();
                                                    if(!otp){
                                                        $.alert({
                                                            title: 'Oops!',
                                                            content: 'Provide a valid otp',
                                                            type: 'red'
                                                        });
                                                        return false;
                                                    }
                                                    otpConfirm.close();
                                                    var data = { 
                                                        "_token" : "<?php echo e(csrf_token()); ?>", 
                                                        "mobile" : mobile, 
                                                        "otp" : CryptoJSAesJson.encrypt(JSON.stringify("otp="+otp), "<?php echo e(csrf_token()); ?>"), 
                                                        "password" : password,
                                                        "gps_location" : localStorage.getItem("gps_location")
                                                    };

                                                    form.find("[name='password']").val(null);
                                                    SYSTEM.AJAX("<?php echo e(route('authCheck')); ?>", "POST", data, function(data){
                                                        if(!data.statusText){
                                                            if(data.status == "TXN"){
                                                                form.find("[name='password']").val(null);
                                                                $.alert({
                                                                    title: 'Login',
                                                                    content: "Successfully Login",
                                                                    type: 'green'
                                                                });

                                                                setTimeout(function(){
                                                                    window.location.reload();
                                                                }, 2000);
                                                            }else{
                                                                if(data.status == 400){
                                                                    $.alert({
                                                                        title: 'Oops!',
                                                                        content: data.responseJSON.status,
                                                                        type: 'red'
                                                                    });
                                                                }else{
                                                                    if(data.status){
                                                                        $.alert({
                                                                            title: 'Oops!',
                                                                            content: data.status,
                                                                            type: 'red'
                                                                        });
                                                                    }else{
                                                                        $.alert({
                                                                            title: 'Oops!',
                                                                            content: data.statusText,
                                                                            type: 'red'
                                                                        });
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    });
                                                    return false;
                                                }
                                            },
                                            cancel: function () {
                                                form.find("[name='password']").val(null);
                                            },
                                            'Resend Otp': function () {
                                                OTPRESEND();
                                                return false;
                                            },
                                        }
                                    });  
                                    otpConfirm.open();
                                }else {
                                    form.find("[name='password']").val(null);
                                    SYSTEM.SHOWERROR(data, $('#login'));
                                }
                            } else {
                                    form.find("[name='password']").val(null);
                                SYSTEM.SHOWERROR(data, $('#login'));
                            }
                        });
                    },

                    REGISTRATION: function() {
                        SYSTEM.FORMSUBMIT($('#registerForm'), function(data) {
                            swal.close();
                            if (!data.statusText) {
                                if (data.status == "TXN") {
                                    $('#registerForm')[0].reset();
                                    $('#registerModal').modal('hide');
                                    swal({
                                        type: 'success',
                                        title: 'Success',
                                        text: 'Thank You for join us, your accont details will be sent on your mobile number and email id',
                                        showConfirmButton: true
                                    });
                                } else {
                                    SYSTEM.SHOWERROR(data, $('#registerForm'));
                                }
                            } else {
                                SYSTEM.SHOWERROR(data, $('#registerForm'));
                            }
                        });
                    },

                    PASSWORDRESET: function() {
                        var mobile = $('input[name="mobile"]').val();
                        var ele = $(this);
                        if (mobile.length > 0) {
                            $.ajax({
                                    url: '<?php echo e(route("authReset")); ?>',
                                    type: 'post',
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    beforeSend: function() {
                                        swal({
                                            title: 'Wait!',
                                            text: 'Please wait, we are working on your request',
                                            onOpen: () => {
                                                swal.showLoading()
                                            }
                                        });
                                    },
                                    data: {
                                        'type': 'request',
                                        'mobile': mobile
                                    },
                                    complete: function() {
                                        swal.close();
                                    }
                                })
                                .done(function(data) {
                                    swal.close();
                                    if (data.status == "TXN") {
                                        $('#passwordForm').find('input[name="mobile"]').val(mobile);
                                        $('#passwordModal').modal('show');
                                    } else {
                                        notify(data.message, 'warning');
                                    }
                                })
                                .fail(function() {
                                    swal.close();
                                    notify('Something went wrong, try again', 'warning');
                                });
                        } else {
                            notify('Enter mobile number to reset password', 'warning');
                        }
                    }
                },

                SYSTEM = {
                    NOTIFY: function(type, title, message) {
                        swal({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 10000,
                            type: type,
                            title: title,
                            text: message
                        });
                    },

                    FORMSUBMIT: function(form, callback) {
                        form.ajaxSubmit({
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            beforeSubmit: function() {
                            },
                            complete: function() {
                            },
                            success: function(data) {
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
                                swal({
                                    title: 'Wait!',
                                    text: 'Please wait, we are working on your request',
                                    onOpen: () => {
                                        swal.showLoading()
                                    }
                                });
                            },
                            complete: function () {
                                swal.close();
                            },
                            success:function(data){
                                callback(data);
                            },
                            error: function(errors) {
                                callback(errors);
                            }
                        });
                    },

                    SHOWERROR: function(errors, form, type = "inline") {
                        if (type == "inline") {
                            if (errors.statusText) {
                                if (errors.status == 422) {
                                    form.find('p.error').remove();
                                    $.each(errors.responseJSON, function(index, value) {
                                        form.find('[name="' + index + '"]').closest('div.form-group').myalert(value, 'danger');
                                    });
                                } else if (errors.status == 400) {
                                    form.mynotify(errors.responseJSON.message, 'danger');
                                } else {
                                    form.mynotify(errors.statusText, 'danger');
                                }
                            } else {
                                form.mynotify(errors.message, 'danger');
                            }
                        } else {
                            if (errors.statusText) {
                                if (errors.status == 400) {
                                    SYSTEM.NOTIFY('error', 'Oops', errors.responseJSON.message);
                                } else {
                                    SYSTEM.NOTIFY('error', 'Oops', errors.statusText);
                                }
                            } else {
                                SYSTEM.NOTIFY('error', 'Oops', errors.message);
                            }
                        }
                    }
                }

            LOGINSYSTEM.DEFAULT();
        });

        function OTPRESEND() {
            var mobile = $('input[name="mobile"]').val();
            var password = $('input[name="password"]').val();
            if(mobile.length > 0){
                $.ajax({
                    url: '<?php echo e(route("authCheck")); ?>',
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data :  {'mobile' : mobile, 'password' : password , 'otp' : "resend", "_token" : "<?php echo e(csrf_token()); ?>", },
                    beforeSend:function(){
                        swal({
                            title: 'Wait!',
                            text: 'Please wait, we are working on your request',
                            onOpen: () => {
                                swal.showLoading()
                            }
                        });
                    },
                    complete: function(){
                        swal.close();
                    }
                })
                .done(function(data) {
                    if(data.status == "TXNOTP"){
                        $.alert({
                            title: 'Login',
                            content: "Otp sent successfully",
                            type: 'green'
                        });
                    }else{
                        $.alert({
                            title: 'Oops!',
                            content: data.message,
                            type: 'red'
                        });
                    }
                })
                .fail(function() {
                    $.alert({
                        title: 'Oops!',
                            content: data.message,
                        type: 'red'
                    });
                });
            }else{
                $.alert({
                    title: 'Oops!',
                    content: "Enter your registered mobile number",
                    type: 'red'
                });
            }
        }

        function notify(msg, type="success"){
            let snackbar  = new SnackBar;
            snackbar.make("message",[
                msg,
                null,
                "bottom",
                "right",
                "text-"+type
            ], 5000);
        }
    </script>
  </body>   
</html>
