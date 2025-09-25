<?php
require 'ClassAutoLoad.php';

$ObjLayouts->header($conf);
$ObjLayouts->navbar($conf);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

     $stmt = $conn->prepare("SELECT id, name, password, is_verified FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (!$row['is_verified']) {
            echo "<div class='alert alert-warning'>Please verify your account first.</div>";
        } elseif (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            header("Location: dashboard.php");
            exit;
        } else {
            echo "<div class='alert alert-danger'>Invalid password.</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>User not found.</div>";
    }
    // send welcome email
        $mailCnt = [
            "mail_from" => $conf['site_email'],
            "name_from" => $conf['site_name'],
            "mail_to"   => $email,
            "name_to"   => $name,
            "subject"   => "Welcome to Task App",
            "body"      => "Hello <b>$name</b>, welcome to Task App!"
        ];
        $ObjSendMail->Send_Mail($conf, $mailCnt);
}

$ObjLayouts->formContent($conf, $ObjForms);
$ObjLayouts->footer($conf);
