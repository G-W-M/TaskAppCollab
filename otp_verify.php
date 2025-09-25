<?php
require 'ClassAutoLoad.php';

$ObjLayouts->header($conf);
$ObjLayouts->navbar($conf);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = intval($_POST['user_id']);
    $enteredOtp = trim($_POST['otp']);

    $otpGen = new OTPGenerator($conn);

$userId = 1; // example user ID
$generatedOtp = $otpGen->generate($userId);
echo "Generated OTP: " . $generatedOtp . "<br>";

// Simulate user input
$userInput = $generatedOtp; // change to wrong number to test failure

if ($otpGen->verify($userId, $userInput)) {
    echo " OTP verified successfully!";
} else {
    echo "OTP invalid or expired.";
}

$ObjForms->otpForm();
$ObjLayouts->footer($conf);
}