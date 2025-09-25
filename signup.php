<?php
require 'ClassAutoLoad.php';
require __DIR__ . "/otp_generator.php";  // ensure class is available
require 'vendor/autoload.php';           // PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$ObjLayouts->header($conf);
$ObjLayouts->navbar($conf);



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name  = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<div class='alert alert-danger'>Invalid email format</div>";
    } else {
        //Insert new user into database
        $stmt = $conn->prepare("INSERT INTO users (name, email, password, is_verified) VALUES (?, ?, ?, 0)");
        $stmt->bind_param("sss", $name, $email, $password);
        $stmt->execute();
        $userId = $stmt->insert_id;

        // Generate and send OTP
        $otpGen = new OTPGenerator($conn);
        $otp = $otpGen->generate($userId);
        send_otp_email($email, $otp); // use your PHPMailer logic

        // Redirect to OTP page
        header("Location: otp_verify.php?user=$userId");
        exit;

        echo "<div class='alert alert-success'>Signup successful! A welcome email has been sent.</div>";
    }
}

$ObjLayouts->formContent($conf, $ObjForms);
$ObjLayouts->footer($conf);
