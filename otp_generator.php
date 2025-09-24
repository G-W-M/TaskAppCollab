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
    die(" DB Connection failed: " . $conn->connect_error);
}

class OTPGenerator {
    private $conn;
    private $expiryMinutes = 3;

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
        public function verify($userId, $enteredOtp) {
        $sql = "SELECT otp_code, otp_expiry FROM users WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        if (!$result) return false;

        if ($result['otp_code'] == $enteredOtp && strtotime($result['otp_expiry']) > time()) {
            $clear = $this->conn->prepare("UPDATE users SET otp_code=NULL, otp_expiry=NULL WHERE id=?");
            $clear->bind_param("i", $userId);
            $clear->execute();
            return true;
        }
        return false;
    }
}
?>


