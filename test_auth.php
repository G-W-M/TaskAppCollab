<?php
session_start(); // Needed for OTP and session handling

// ===== User storage (temporary, replace with DB in real app) =====
$users = [];

// ===== Registration =====
function register($username, $password) {
    global $users;
    if(isset($users[$username])) {
        return "User already exists.";
    }
    $users[$username] = password_hash($password, PASSWORD_DEFAULT);
    return "User '$username' registered successfully.";
}

// ===== Login =====
function login($username, $password) {
    global $users;
    if(isset($users[$username]) && password_verify($password, $users[$username])) {
        $_SESSION['user'] = $username;
        return "Login successful for '$username'.";
    }
    return "Invalid credentials for '$username'.";
}

// ===== OTP generation =====
function generate_otp($length = 6) {
    return str_pad(rand(0, pow(10, $length)-1), $length, '0', STR_PAD_LEFT);
}

// ===== OTP security measures =====
function send_otp() {
    if(!isset($_SESSION['otp_requests'])) {
        $_SESSION['otp_requests'] = [];
    }

    $current_time = time();
    // Keep only requests in the last 60 seconds
    $_SESSION['otp_requests'] = array_filter($_SESSION['otp_requests'], fn($t) => $t > $current_time - 60);

    if(count($_SESSION['otp_requests']) < 3) {
        $otp = generate_otp();
        $_SESSION['otp'] = $otp;
        $_SESSION['otp_requests'][] = $current_time;
        return "OTP sent: $otp";
    } else {
        return "OTP request limit reached. Try again later.";
    }
}

function verify_otp($input_otp) {
    if(isset($_SESSION['otp']) && $input_otp === $_SESSION['otp']) {
        unset($_SESSION['otp']); // Destroy OTP after use
        return "OTP verified successfully.";
    }
    return "Invalid OTP.";
}

// ===== Testing flows =====
echo "<h3>Registration</h3>";
echo register("testuser", "password123") . "<br>";

echo "<h3>Login</h3>";
echo login("testuser", "password123") . "<br>";

echo "<h3>OTP Flow</h3>";
echo send_otp() . "<br>";

// Simulate OTP input (replace with actual input in real use)
$input_otp = $_SESSION['otp'] ?? '';
echo "Verifying OTP '$input_otp': " . verify_otp($input_otp) . "<br>";

// Try verifying again to show OTP destruction
echo "Verifying OTP again: " . verify_otp($input_otp) . "<br>";
