<?php
require __DIR__ . "/conf.php";

// Create DB connection
$conn = new mysqli(
    $conf['db_host'],
    $conf['db_user'],
    $conf['db_pass'],
    $conf['db_name']
);

if ($conn->connect_error) {
    die("❌ DB Connection failed: " . $conn->connect_error);
}

class OTPGenerator {
    private $conn;
    private $expiryMinutes = 5;

    public function __construct($dbConn) {
        $this->conn = $dbConn;
    }

    public function generate($userId) {
        $otp = rand(100000, 999999);
        $expiry = date("Y-m-d H:i:s", strtotime("+{$this->expiryMinutes} minutes"));

        $sql = "UPDATE users SET otp_code=?, otp_expiry=? WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $otp, $expiry, $userId);
        $stmt->execute();

        return $otp;
    }

}
