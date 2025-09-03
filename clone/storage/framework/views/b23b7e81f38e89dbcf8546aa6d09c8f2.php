<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $title = ($_SERVER['HTTP_HOST'] == "login.mdrpay.com") ? "MDRPay" : "DefaultTitle";
    ?>
    <title>Login - <?php echo e($title); ?></title>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- [Favicon] icon -->
    <link rel="icon" href="<?php echo e(asset('')); ?>new_assests/images/favicon.svg" type="image/x-icon" />
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

</head>
<body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme="light">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <div class="auth-main v1">
        <div class="auth-wrapper">
            <div class="auth-form">
                <div class="card my-5">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="https://mdrpay.com/images/MDR-Logo.png" alt="images" class="img-fluid mb-3" width="250" />
                            <h4 class="f-w-500 mb-1">Login with your email</h4>
                        </div>
                        <form action="<?php echo e(route('authCheck')); ?>" method="post" id="login-form" autocomplete="off">
                            <?php echo csrf_field(); ?>
                            <div class="mb-3">
                                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                            </div>
                            <div class="d-flex mt-1 justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked="" />
                                    <label class="form-check-label text-muted" for="customCheckc1">Remember me</label>
                                </div>
                            </div>
                            <div class="d-grid mt-4">
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
    </div>
    <!-- [ Main Content ] end -->
    <!-- Required Js -->
    <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

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

       
    <script>
      layout_change('light');
      layout_sidebar_change('light');
      change_box_container('false');
      layout_caption_change('true');
      layout_rtl_change('false');
      preset_change('preset-1');
    </script>
    
    <script src="<?php echo e(asset('assets/js/core/jquery.validate.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/core/jquery.form.min.js')); ?>"></script>
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
<?php /**PATH /home/u690537273/domains/login.mdrpay.com/public_html/clone/resources/views/welcome.blade.php ENDPATH**/ ?>