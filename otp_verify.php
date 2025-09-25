<?php
require 'ClassAutoLoad.php';

$ObjLayouts->header($conf);
$ObjLayouts->navbar($conf);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = intval($_POST['user_id']);
    $enteredOtp = trim($_POST['otp']);

    $otpGen = new OTPGenerator($conn);

    if ($otpGen->verify($userId, $enteredOtp)) {
        // Mark user as verified
        $stmt = $conn->prepare("UPDATE users SET is_verified=1 WHERE id=?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();

        echo "<div class='alert alert-success'>OTP verified! You can now sign in.</div>";
        header("Refresh:2; url=signin.php");
    } else {
        echo "<div class='alert alert-danger'>Invalid or expired OTP.</div>";
    }
}

$ObjForms->otpForm();
$ObjLayouts->footer($conf);
