<?php
require __DIR__ . "/conf.php";
require __DIR__ . "/otp_generator.php";

// Create DB connection
$conn = new mysqli(
    $conf['db_host'],
    $conf['db_user'],
    $conf['db_pass'],
    $conf['db_name']
);

if ($conn->connect_error) {
    die(" DB Connection failed: " . $conn->connect_error);
}

// Use OTPGenerator class
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
?>
