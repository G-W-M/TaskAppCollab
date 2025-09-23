<?php
require 'Plugins/PHPMailer/vendor/autoload.php';
require 'conf.php';

// connect to DB
$conn = new mysqli(
    $conf['db_host'],
    $conf['db_user'],
    $conf['db_pass'],
    $conf['db_name']
);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// autoload classes
$directories = ["Forms", "Globals", "Layouts"];
spl_autoload_register(function ($class_name) use ($directories) {
    foreach ($directories as $dir) {
        $file = __DIR__ . "/$dir/" . $class_name . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// create objects
$ObjSendMail = new Mail();   // ✅ updated
$ObjLayouts  = new Layouts();
$ObjForms    = new Forms();
