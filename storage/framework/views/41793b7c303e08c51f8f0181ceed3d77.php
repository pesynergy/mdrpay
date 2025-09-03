<!DOCTYPE html>
<html lang="zxx">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title>Login <?php echo e($_SERVER['HTTP_HOST']); ?></title>
        <link rel="shortcut icon" type="image/icon" href="images/favicon-16x16.png"/>
        <link rel="stylesheet" href="<?php echo e(asset('')); ?>login/css/login3-style.css">
        <link href="<?php echo e(asset('')); ?>assets/js/plugins/materialToast/mdtoast.min.css" rel="stylesheet" type="text/css">

        <style>
            * {
              font-family: -apple-system, BlinkMacSystemFont, "San Francisco", Helvetica, Arial, sans-serif;
              font-weight: 300;
              margin: 0;
            }

            html, body {
              height: 100vh;
              width: 100vw;
              margin: 0 0;
              display: flex;
              align-items: flex-start;
              justify-content: flex-start;
              background: #f3f2f2;
            }

            h4 {
              font-size: 24px;
              font-weight: 600;
              color: #000;
              opacity: 0.85;
            }

            label {
              font-size: 12.5px;
              color: #000;
              opacity: 0.8;
              font-weight: 400;
            }

            form {
              padding: 40px 30px;
              background: #fefefe;
              display: flex;
              flex-direction: column;
              align-items: flex-start;
              padding-bottom: 20px;
              width: 400px;
            }
            form h4 {
              margin-bottom: 20px;
              color: rgba(0, 0, 0, 0.5);
            }
            form h4 span {
              color: black;
              font-weight: 700;
            }
            form p {
              line-height: 155%;
              margin-bottom: 5px;
              font-size: 14px;
              color: #000;
              opacity: 0.65;
              font-weight: 400;
              max-width: 200px;
              margin-bottom: 40px;
            }

            a.discrete {
              color: rgba(0, 0, 0, 0.4);
              font-size: 14px;
              border-bottom: solid 1px rgba(0, 0, 0, 0);
              padding-bottom: 4px;
              margin-left: auto;
              font-weight: 300;
              transition: all 0.3s ease;
              margin-top: 40px;
            }
            a.discrete:hover {
              border-bottom: solid 1px rgba(0, 0, 0, 0.2);
            }

            button {
              -webkit-appearance: none;
              width: auto;
              min-width: 100px;
              border-radius: 24px;
              text-align: center;
              padding: 15px 40px;
              margin-top: 5px;
              background-color: #b08bf8;
              color: #fff;
              font-size: 14px;
              margin-left: auto;
              font-weight: 500;
              box-shadow: 0px 2px 6px -1px rgba(0, 0, 0, 0.13);
              border: none;
              transition: all 0.3s ease;
              outline: 0;
            }
            button:hover {
              transform: translateY(-3px);
              box-shadow: 0 2px 6px -1px rgba(182, 157, 230, 0.65);
            }
            button:hover:active {
              transform: scale(0.99);
            }

            input {
              font-size: 16px;
              padding: 20px 0px;
              height: 56px;
              border: none;
              border-bottom: solid 1px rgba(0, 0, 0, 0.1);
              background: #fff;
              width: 280px;
              box-sizing: border-box;
              transition: all 0.3s linear;
              color: #000;
              font-weight: 400;
              -webkit-appearance: none;
            }
            input:focus {
              border-bottom: solid 1px #b69de6;
              outline: 0;
              box-shadow: 0 2px 6px -8px rgba(182, 157, 230, 0.45);
            }

            .floating-label {
              position: relative;
              margin-bottom: 10px;
              width: 100%;
            }

            .floating-label label {
              position: absolute;
              top: calc(50% - 7px);
              left: 0;
              opacity: 0;
              transition: all 0.3s ease;
              padding-left: 44px;
            }

            .floating-label input {
              width: calc(100% - 44px);
              margin-left: auto;
              display: flex;
            }
            .floating-label .icon {
              position: absolute;
              top: 0;
              left: 0;
              height: 56px;
              width: 44px;
              display: flex;
            }
            .floating-label .icon svg {
              height: 30px;
              width: 30px;
              margin: auto;
              opacity: 0.15;
              transition: all 0.3s ease;
            }
            .floating-label .icon svg path {
              transition: all 0.3s ease;
            }
            .floating-label input:not(:-moz-placeholder-shown) {
              padding: 28px 0px 12px 0px;
            }
            .floating-label input:not(:-ms-input-placeholder) {
              padding: 28px 0px 12px 0px;
            }
            .floating-label input:not(:placeholder-shown) {
              padding: 28px 0px 12px 0px;
            }
            .floating-label input:not(:-moz-placeholder-shown) + label {
              transform: translateY(-10px);
              opacity: 0.7;
            }
            .floating-label input:not(:-ms-input-placeholder) + label {
              transform: translateY(-10px);
              opacity: 0.7;
            }
            .floating-label input:not(:placeholder-shown) + label {
              transform: translateY(-10px);
              opacity: 0.7;
            }
            .floating-label input:valid:not(:-moz-placeholder-shown) + label + .icon svg {
              opacity: 1;
            }
            .floating-label input:valid:not(:-ms-input-placeholder) + label + .icon svg {
              opacity: 1;
            }
            .floating-label input:valid:not(:placeholder-shown) + label + .icon svg {
              opacity: 1;
            }
            .floating-label input:valid:not(:-moz-placeholder-shown) + label + .icon svg path {
              fill: #b69de6;
            }
            .floating-label input:valid:not(:-ms-input-placeholder) + label + .icon svg path {
              fill: #b69de6;
            }
            .floating-label input:valid:not(:placeholder-shown) + label + .icon svg path {
              fill: #b69de6;
            }
            .floating-label input:not(:valid):not(:focus) + label + .icon {
              -webkit-animation-name: shake-shake;
                      animation-name: shake-shake;
              -webkit-animation-duration: 0.3s;
                      animation-duration: 0.3s;
            }

            @-webkit-keyframes shake-shake {
              0% {
                transform: translateX(-3px);
              }
              20% {
                transform: translateX(3px);
              }
              40% {
                transform: translateX(-3px);
              }
              60% {
                transform: translateX(3px);
              }
              80% {
                transform: translateX(-3px);
              }
              100% {
                transform: translateX(0px);
              }
            }

            @keyframes shake-shake {
              0% {
                transform: translateX(-3px);
              }
              20% {
                transform: translateX(3px);
              }
              40% {
                transform: translateX(-3px);
              }
              60% {
                transform: translateX(3px);
              }
              80% {
                transform: translateX(-3px);
              }
              100% {
                transform: translateX(0px);
              }
            }
            .session {
              display: flex;
              flex-direction: row;
              width: auto;
              height: auto;
              margin: auto auto;
              background: #ffffff;
              border-radius: 4px;
              box-shadow: 0px 2px 6px -1px rgba(0, 0, 0, 0.12);
            }

            .left {
              width: 220px;
              height: auto;
              min-height: 100%;
              position: relative;
              background: radial-gradient(60.25% 73.6% at 14.86% 21.69%, #136165 0.82%, #0B3B48 30.73%, #072A36 64.58%, rgba(3, 21, 33, 0.00) 100%);
              background-size: auto;
              border-top-left-radius: 4px;
              border-bottom-left-radius: 4px;
            }
            .left img {
              height: 80px;
              width: auto;
              margin: 20px;
            }
            </style>
    </head>
  
    <body>
        <div class="session">
            <div class="left">
                <img src="<?php echo e(asset('')); ?>/<?php echo e($company->logo); ?>" class=" img-responsive" alt="">   
            </div>

            <form action="<?php echo e(route('authCheck')); ?>" method="post" class="log-in" autocomplete="off" id="login"> 
                <h4>We are <span><?php echo e($company->companyname); ?></span></h4>
                <p>Welcome back! Log in to your account:</p>
                <div class="floating-label">
                    <input placeholder="Email" type="email" name="email" id="email" autocomplete="off">
                    <label for="email">Email:</label>
                    <div class="icon">                
                        <svg enable-background="new 0 0 100 100" version="1.1" viewBox="0 0 100 100" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                            <style type="text/css">
                                .st0{fill:none;}
                            </style>
                            <g transform="translate(0 -952.36)">
                                <path d="m17.5 977c-1.3 0-2.4 1.1-2.4 2.4v45.9c0 1.3 1.1 2.4 2.4 2.4h64.9c1.3 0 2.4-1.1 2.4-2.4v-45.9c0-1.3-1.1-2.4-2.4-2.4h-64.9zm2.4 4.8h60.2v1.2l-30.1 22-30.1-22v-1.2zm0 7l28.7 21c0.8 0.6 2 0.6 2.8 0l28.7-21v34.1h-60.2v-34.1z"/>
                            </g>
                            <rect class="st0" width="100" height="100"/>
                        </svg>
                    </div>
                </div>
                
                <div class="floating-label">
                    <input placeholder="Password" type="password" name="password" id="password" autocomplete="off">
                    <label for="password">Password:</label>
                    <div class="icon">
                        <svg enable-background="new 0 0 24 24" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                            <style type="text/css">
                                .st0{fill:none;}
                                .st1{fill:#010101;}
                            </style>
                            <rect class="st0" width="24" height="24"/>
                            <path class="st1" d="M19,21H5V9h14V21z M6,20h12V10H6V20z"/>
                            <path class="st1" d="M16.5,10h-1V7c0-1.9-1.6-3.5-3.5-3.5S8.5,5.1,8.5,7v3h-1V7c0-2.5,2-4.5,4.5-4.5s4.5,2,4.5,4.5V10z"/>
                            <path class="st1" d="m12 16.5c-0.8 0-1.5-0.7-1.5-1.5s0.7-1.5 1.5-1.5 1.5 0.7 1.5 1.5-0.7 1.5-1.5 1.5zm0-2c-0.3 0-0.5 0.2-0.5 0.5s0.2 0.5 0.5 0.5 0.5-0.2 0.5-0.5-0.2-0.5-0.5-0.5z"/>
                        </svg>
                    </div>
                </div>
                <button type="submit">Log in</button>
            </form>
        </div>
    </body>

    <script src="<?php echo e(asset('')); ?>login/js/jquery-2.2.4.min.js"></script>
    <script src="<?php echo e(asset('')); ?>login/js/bootstrap.min.js"></script>
    <script src="<?php echo e(asset('')); ?>login/js/custom.js"></script>
  
    <script type="text/javascript" src="<?php echo e(asset('')); ?>assets/js/core/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('')); ?>assets/js/core/jquery.form.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('')); ?>assets/js/plugins/loaders/blockui.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('')); ?>assets/js/plugins/materialToast/mdtoast.min.js"></script>

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
                        $('#login').submit(function() {
                            SYSTEM.FORMSUBMIT($('#login'), function(data) {
                                if (!data.statusText) {
                                    if (data.status == "TXN") {
                                        SYSTEM.NOTIFY("success", "Successfully Logged In");
                                        setTimeout(function(){
                                            window.location.reload(); 
                                        }, 2000);
                                    }else {
                                        SYSTEM.SHOWERROR(data, $('#login'));
                                    }
                                } else {
                                    SYSTEM.SHOWERROR(data, $('#login'));
                                }
                            }, $('#login'));
                            return false;
                        });
                    }
                },

                SYSTEM = {
                    NOTIFY: function(type, message) {
                        switch(type){
                            case "success":
                                mdtoast.success("Success : "+message, { position: "top center" });
                            break;

                            default:
                                mdtoast.error("Oops! "+message, { position: "top center" });
                                break;
                        }
                    },

                    FORMBLOCK:function (form) {
                        form.block({
                            message:'<div class="spinner-border text-white" role="status"></div>',
                            timeout:1e3,
                            css:{
                                backgroundColor:"transparent",
                                border:"0"
                            },
                            overlayCSS:{
                                opacity:.5
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
                                block.block({
                                    message:'<div class="spinner-border text-white" role="status"></div>',
                                    timeout:1e3,
                                    css:{
                                        backgroundColor:"transparent",
                                        border:"0"
                                    },
                                    overlayCSS:{
                                        opacity:.5
                                    }
                                });
                            },
                            complete: function(){
                                block.unblock();
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
                                    SYSTEM.NOTIFY('error', errors.responseJSON.message);
                                } else {
                                    SYSTEM.NOTIFY('error', errors.statusText);
                                }
                            } else {
                                SYSTEM.NOTIFY('error', errors.message);
                            }
                        }
                    }
                }

            LOGINSYSTEM.DEFAULT();
        });
    </script>
</html>
<?php /**PATH /home/u564371677/domains/dashboard.nanakpay.com/public_html/resources/views/welcome.blade.php ENDPATH**/ ?>