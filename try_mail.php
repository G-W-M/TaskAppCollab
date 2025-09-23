<?php
require 'ClassAutoLoad.php';

$mailCnt = [
    'name_from' => $conf['site_name'],
    'mail_from' => $conf['site_email'],
    'name_to' => 'Cera',
    'mail_to' => 'gracecmungai@gmail.com',
    'subject' => 'Welcome to BBIT Enterprise',
    'body' => 'This is a new semester <b>Let\'s get started!</b>'
];

$ObjSendMail->Send_Mail($conf, $mailCnt);