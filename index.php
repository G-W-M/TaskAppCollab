<?php
require 'ClassAutoLoad.php';

// Render header + navbar
$ObjLayouts->header($conf);
$ObjLayouts->navbar($conf);

// --- Page Content ---
$ObjLayouts->banner($conf);
$ObjLayouts->welcomeBody($conf);


// Render footer
$ObjLayouts->footer($conf);
