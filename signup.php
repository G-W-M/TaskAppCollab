<?php
require 'ClassAutoLoad.php';

$ObjLayouts->header($conf);
$ObjLayouts->navbar($conf);
$ObjLayouts->banner();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name  = trim($_POST['name']);
    $email = trim($_POST['email']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<div class='alert alert-danger'>Invalid email format</div>";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $email);
        $stmt->execute();

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

        echo "<div class='alert alert-success'>Signup successful! A welcome email has been sent.</div>";
    }
}

$ObjLayouts->form_content($conf, $ObjForms);
$ObjLayouts->footer($conf);
