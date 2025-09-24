<?php
// 1. Include the Composer autoloader to load the PHPMailer classes
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// 2. Function to generate a random 6-digit OTP
function generate_otp($length = 6) {
    return rand(pow(10, $length-1), pow(10, $length)-1);
}

// 3. Main logic to send the OTP
function send_otp_email($recipient_email) {
    // Generate the OTP
    $otp = generate_otp();
    
    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.example.com';                     // Set the SMTP server to send through (e.g., smtp.gmail.com)
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'Juliet.Nyakiamo@strathmore.edu';               // SMTP username
        $mail->Password   = '';                        // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Enable implicit TLS encryption
        $mail->Port       = 465;                                    // TCP port to connect to; use 587 for TLS, or 465 for SMTPS

        // Recipients
        $mail->setFrom('no-reply@your_domain.com', 'Your App Name');
        $mail->addAddress($recipient_email);                        // Add a recipient

        // Content
        $mail->isHTML(true);                                        // Set email format to HTML
        $mail->Subject = 'Your OTP for Verification';
        $mail->Body    = "Hello,<br><br>Your One-Time Password (OTP) is: <strong>" . $otp . "</strong><br><br>This OTP is valid for a limited time. Do not share it with anyone.<br><br>Thank you,<br>Your App Team";
        $mail->AltBody = "Your One-Time Password (OTP) is: " . $otp . ". This OTP is valid for a limited time. Do not share it with anyone.";

        // Send the email
        $mail->send();
        
        // Return a success message and the OTP (for testing)
        return ['status' => 'success', 'message' => 'OTP sent successfully.'];

    } catch (Exception $e) {
        // 4. Handles failed delivery
        return ['status' => 'error', 'message' => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"];
    }
}

// Example usage: You would get the recipient's email from a form or another script
// This part might be provided by Person 2's work.
if (isset($_GET['email'])) {
    $recipient_email = $_GET['email'];
    $result = send_otp_email($recipient_email);
    
    // Return a JSON response
    header('Content-Type: application/json');
    echo json_encode($result);
} else {
    // Handle case where email is not provided
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error', 'message' => 'Recipient email not provided.']);
}