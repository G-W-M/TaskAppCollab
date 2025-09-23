<?php
require "../config/db.php";

class OTPGenerator {
    private $conn;
    private $expiryMinutes = 5; // OTP valid for 5 minutes

    public function __construct($dbConn) {
        $this->conn = $dbConn;
    }}