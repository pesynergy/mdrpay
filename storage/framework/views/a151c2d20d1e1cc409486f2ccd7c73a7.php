<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <?php
        $title = ($_SERVER['HTTP_HOST'] == "login.mdrpay.com") ? "MDRPay" : "DefaultTitle";
    ?>
    <title>Register - <?php echo e($title); ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="https://mdrpay.com/images/MDR-Logo.png">
    <link href="<?php echo e(asset('new_assests/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('new_assests/css/style.css')); ?>" rel="stylesheet">
</head>
<body class="h-100">
    <div class="login-account">
        <div class="row h-100">
            <!-- Left Section -->
            <div class="col-lg-4 align-self-start">
                <div class="text-center mb-4"><img src="https://mdrpay.com/images/MDR-Logo.png" alt="<?php echo e($title); ?>" width="250"></div>
                <div class="account-info-area" style="background-image: url('<?php echo e(asset('new_assests/images/rainbow.gif')); ?>'); max-height:200px;">
                    <div class="login-content">
                        <p class="sub-title">Register in to your admin dashboard with your credentials</p>
                        <p class="text">Efficient and reliable payment solutions at your fingertips.</p>
                    </div>
                </div>
            </div>
            <!-- Right Section -->
            <div class="col-lg-8 col-md-12 col-sm-12 mx-auto align-self-center">
                <div class="login-form">
                    <div class="login-head">
                        <h3 class="title">Register With Us!!!</h3>
                    </div>
                </div>
                <div class="register-form">
                    <!-- Success Placeholder -->
                    <div id="success-message" class="text-success text-center mb-3"></div>
                    <form class="registerForm" action="<?php echo e(route('register.store')); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="panel-title">Business Information</h5>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <input type="hidden" name="reseller_id" class="form-control" value="">
                                                    <input type="hidden" name="role_id" class="form-control" value="3" required="">
                                                    <input type="hidden" name="scheme_id" class="form-control" value="6" required="">
                                                    <input type="hidden" name="company_id" class="form-control" value="1" required="">
                                                    <label>Shop Name</label>
                                                    <input type="text" name="shopname" class="form-control" value="" required="" placeholder="Enter Value">
                                                </div>
                    
                                                <div class="form-group col-md-4">
                                                    <label>Pancard Number</label>
                                                    <input type="text" name="pancard" class="form-control" value="" required="" placeholder="Enter Value">
                                                </div>
                    
                                                <div class="form-group col-md-4">
                                                    <label>Adhaarcard Number</label>
                                                    <input type="text" name="aadharcard" class="form-control" value="" required="" placeholder="Enter Value" maxlength="12" minlength="12">
                                                </div>
                                            </div>
                                            <h5 class="panel-title">Personal Information</h5>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label>Name</label>
                                                    <input type="text" name="name" class="form-control" value="" required="" placeholder="Enter Value">
                                                </div>
                    
                                                <div class="form-group col-md-4">
                                                    <label>Mobile</label>
                                                    <input type="number" name="mobile" required="" class="form-control" placeholder="Enter Value">
                                                </div>
                    
                                                <div class="form-group col-md-4">
                                                    <label>Email</label>
                                                    <input type="email" name="email" class="form-control" value="" required="" placeholder="Enter Value">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label>Address</label>
                                                    <textarea name="address" class="form-control" rows="2" required="" placeholder="Enter Value"></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-3">
                                                    <label>State</label>
                                                    <input type="text" name="state" class="form-control" value="" required="" placeholder="Enter Value">
                                                </div>
                    
                                                <div class="form-group col-md-3">
                                                    <label>District</label>
                                                    <input type="text" name="district" class="form-control" value="" required="" placeholder="Enter Value">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>City</label>
                                                    <input type="text" name="city" class="form-control" value="" required="" placeholder="Enter Value">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Pincode</label>
                                                    <input type="number" name="pincode" class="form-control" value="" required="" maxlength="6" minlength="6" placeholder="Enter Value">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4"></div>
                                                <div class="form-group col-md-4">
                                                    <button class="btn btn-primary btn-raised legitRipple btn-block" type="submit" data-loading-text="Please Wait...">Submit</button>
                                                </div>
                                                <div class="form-group col-md-4"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Scripts -->
    <script src="<?php echo e(asset('new_assests/vendor/global/global.min.js')); ?>"></script>
    <script src="<?php echo e(asset('new_assests/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')); ?>"></script>
    <script src="<?php echo e(asset('new_assests/js/custom.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/core/jquery.validate.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/core/jquery.form.min.js')); ?>"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $( ".registerForm" ).validate({
                rules: {
                    name: {required: true,},
                    mobile: {required: true, minlength: 10, number : true, maxlength: 10},
                    email: {required: true, email : true},
                    state: {required: true,},
                    city: {required: true,},
                    pincode: {required: true, minlength: 6, number : true, maxlength: 6},
                    address: {required: true,},
                    aadharcard: {required: true, minlength: 12, number : true, maxlength: 12}
                },
                messages: {
                    name: {required: "Please enter name",},
                    mobile: {required: "Please enter mobile", number: "Mobile number should be numeric", minlength: "Your mobile number must be 10 digit", maxlength: "Your mobile number must be 10 digit"},
                    email: {required: "Please enter email", email: "Please enter valid email address",},
                    state: {required: "Please select state",},
                    city: {required: "Please enter city",},
                    pincode: {required: "Please enter pincode", number: "Mobile number should be numeric", minlength: "Your mobile number must be 6 digit", maxlength: "Your mobile number must be 6 digit"},
                    address: {required: "Please enter address",},
                    aadharcard: {required: "Please enter aadharcard", number: "Aadhar should be numeric", minlength: "Your aadhar number must be 12 digit", maxlength: "Your aadhar number must be 12 digit"}
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
                    var form = $('form.registerForm');
                    form.find('span.text-danger').remove();
                    $('form.registerForm').ajaxSubmit({
                        dataType:'json',
                        beforeSubmit:function(){
                            form.find('button:submit').button('loading');
                        },
                        complete: function () {
                            form.find('button:submit').button('reset');
                        },
                        success:function(data){
                            console.log("Data:", data);
                            if(data.status == "success"){
                                alert("Registration Successful! Try logging in using your email and password as mobile number.");
                                form[0].reset();
                            }else{
                                alert('Registration failed');
                            }
                        },
                        error: function(errors) {
                            console.log("Error Response:", errors); // Log errors to the console
                            alert("An error occurred. Check the console for details."); // Show alert
                            showError(errors, form);
                        }
                    });
                }
            });
        });
    </script>
    <script>
        function getUrlParameter(name) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(name);
        }
        $(document).ready(function() {
            const resellerId = getUrlParameter('reseller_id');
            if (resellerId) {
                $("input[name='reseller_id']").val(resellerId);
            }
        });
    </script>
</body>
</html><?php /**PATH /home/u690537273/domains/login.mdrpay.com/public_html/resources/views/register.blade.php ENDPATH**/ ?>