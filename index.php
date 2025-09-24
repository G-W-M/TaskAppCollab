<?php
require 'ClassAutoLoad.php';

// Render header + navbar
$ObjLayouts->header($conf);
$ObjLayouts->navbar($conf);

// --- Page Content ---

$ObjLayouts->welcome_banner($conf);
$ObjLayouts->welcome_body($conf);


// Render footer
$ObjLayouts->footer($conf);
