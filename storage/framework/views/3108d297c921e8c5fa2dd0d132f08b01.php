<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <?php
        $title = ($_SERVER['HTTP_HOST'] == "login.mdrpay.com") ? "MDRPay" : "DefaultTitle";
    ?>
    <title>Login - <?php echo e($title); ?></title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="https://mdrpay.com/images/MDR-Logo.png">
    
    <!-- Styles -->
    <link href="<?php echo e(asset('new_assests/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('new_assests/css/style.css')); ?>" rel="stylesheet">
    <style>
        /* Modal Styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }
        .modal-content {
            background-color: #fff;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 30%;
            text-align: center;
            border-radius: 5px;
        }
    </style>
</head>
<body class="h-100">
    <div class="login-account">
        <div class="row h-100">
            <!-- Left Section -->
            <div class="col-lg-6 align-self-start">
                <div class="account-info-area" style="background-image: url('<?php echo e(asset('new_assests/images/rainbow.gif')); ?>')">
                    <div class="login-content">
                        <p class="sub-title">Log in to your admin dashboard with your credentials</p>
                        <h1 class="title">The Evolution of <span>MDRPa</span>y</h1>
                        <p class="text">Efficient and reliable payment solutions at your fingertips.</p>
                    </div>
                </div>
            </div>
            
            <!-- Right Section -->
            <div class="col-lg-6 col-md-7 col-sm-12 mx-auto align-self-center">
                <div class="login-form">
                    <div class="login-head">
                        <img src="https://mdrpay.com/images/MDR-Logo.png" alt="<?php echo e($title); ?>" width="250">
                        <h3 class="title">Welcome Back</h3>
                    </div>
                    
                    <!-- Success Placeholder -->
                    <div id="success-message" class="text-success text-center mb-3"></div>
                    
                    <h6 class="login-title"><span>Login</span></h6>
                    <form action="<?php echo e(route('authCheck')); ?>" method="post" id="login-form" autocomplete="off">
                        <?php echo csrf_field(); ?>
                        <!-- Email Field -->
                        <div class="mb-4">
                            <label for="email" class="form-label required">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                        </div>
                        
                        <!-- Password Field -->
                        <div class="mb-4 position-relative">
                            <label for="password" class="form-label required">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                            <button type="button" class="show-pass eye" aria-label="Toggle Password Visibility">
                                <i class="fa fa-eye-slash"></i>
                            </button>
                        </div>
                        
                        <!-- Submit Button -->
                        <div class="text-center mb-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                        </div>
                        
                        <!-- Error Placeholder -->
                        <div id="error-message" class="text-danger text-center"></div>
                    </form>
                    
                    <!-- OTP Modal -->
                    <div id="otpModal" class="modal">
                        <div class="modal-content">
                            <h3>Enter OTP</h3>
                            <p>Kindly check your registered email id for OTP</p>
                            <input type="text" id="otpInput" placeholder="Enter OTP"><br>
                            <button id="submitOtp" class="btn btn-primary btn-block">Submit OTP</button>
                        </div>
                    </div>
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
    
    <script>
        $(document).ready(function() {
            // Password Toggle
            $('.show-pass').on('click', function() {
                const passwordField = $('#password');
                const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
                passwordField.attr('type', type);
                $(this).find('i').toggleClass('fa-eye fa-eye-slash');
            });

            // Form Submission with AJAX
            // $('#login-form').on('submit', function(e) {
            //     e.preventDefault();

            //     const form = $(this);
            //     const errorMessage = $('#error-message');

            //     $.ajax({
            //         url: form.attr('action'),
            //         type: 'POST',
            //         data: form.serialize(),
            //         beforeSend: function() {
            //             errorMessage.text('');
            //             form.find('button[type="submit"]').prop('disabled', true).text('Signing In...');
            //         },
            //         success: function(response) {
            //             if (response.status === 'TXN') {
            //                 window.location.reload();
            //             } else {
            //                 errorMessage.text(response.message || 'Login failed. Please try again.');
            //             }
            //         },
            //         error: function(xhr) {
            //             const errors = xhr.responseJSON || {};
            //             errorMessage.text(errors.message || 'An error occurred. Please try again.');
            //         },
            //         complete: function() {
            //             form.find('button[type="submit"]').prop('disabled', false).text('Sign Me In');
            //         }
            //     });
            // });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Handle Login Form Submission
            $('#login-form').on('submit', function(e) {
                e.preventDefault();

                const form = $(this);
                const successMessage = $('#success-message');
                const errorMessage = $('#error-message');

                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: form.serialize(),
                    beforeSend: function() {
                        // Clear messages and disable submit button
                        successMessage.text('');
                        errorMessage.text('');
                        form.find('button[type="submit"]').prop('disabled', true).text('Signing In...');
                    },
                    success: function(response) {
                        if (response.status === 'TXN') {
                            successMessage.text('Login successful! Redirecting...');
                            window.location.reload();
                        } else if (response.status === 'TXNOTP') {
                            successMessage.text(response.message || 'OTP required. Check your email.');
                            $('#otpModal').show(); // Show OTP Modal
                        } else {
                            errorMessage.text(response.message || 'Login failed. Please try again.');
                        }
                    },
                    error: function(xhr) {
                        const errors = xhr.responseJSON || {};
                        errorMessage.text(errors.message || 'An error occurred. Please try again.');
                    },
                    complete: function() {
                        form.find('button[type="submit"]').prop('disabled', false).text('Sign Me In');
                    }
                });
            });

            // Handle OTP Submission
            $('#submitOtp').on('click', function() {
                const otp = $('#otpInput').val();
                const form = $('#login-form');
                const successMessage = $('#success-message');
                const errorMessage = $('#error-message');

                const formData = form.serialize() + '&otp=' + otp;

                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: formData,
                    beforeSend: function() {
                        errorMessage.text('');
                        successMessage.text('Verifying OTP...');
                        console.log(formData);
                    },
                    success: function(response) {
                        if (response.status === 'TXN') {
                            successMessage.text('OTP verified, login successful! Redirecting...');
                            window.location.reload();
                        } else {
                            errorMessage.text(response.message || 'Invalid OTP. Please try again.');
                        }
                    },
                    error: function(xhr) {
                        const errors = xhr.responseJSON || {};
                        errorMessage.text(errors.message || 'An error occurred while verifying OTP.');
                    }
                });
            });
        });
    </script>
</body>
</html>
<?php /**PATH D:\xampp\htdocs\mdrpay\resources\views/welcome.blade.php ENDPATH**/ ?>