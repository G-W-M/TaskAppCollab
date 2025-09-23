<?php
require 'ClassAutoLoad.php';

$ObjLayouts->header($conf);
$ObjLayouts->navbar($conf);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $stmt = $conn->prepare("SELECT name FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result && $row = $result->fetch_assoc()) {
        echo "<div class='alert alert-success'>Welcome back, " . htmlspecialchars($row['name']) . "!</div>";
    } else {
        echo "<div class='alert alert-danger'>User not found.</div>";
    }
}

$ObjLayouts->form_content($conf, $ObjForms);
$ObjLayouts->footer($conf);
