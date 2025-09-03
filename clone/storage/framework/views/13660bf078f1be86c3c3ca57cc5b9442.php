<!DOCTYPE html>
<html>
<head>
    <title>Your OTP Code</title>
</head>
<body>
    <p>Hi <?php echo e($data['name']); ?>,</p>
    <p>Your OTP code is: <strong><?php echo e($data['otp']); ?></strong></p>
    <p>Please use this code to complete your login.</p>
    <p>Thanks,<br>The Team</p>
</body>
</html>
<?php /**PATH /home/u564371677/domains/dashboard.nanakpay.com/public_html/new/resources/views/emails/otp.blade.php ENDPATH**/ ?>