<?php

require_once( __DIR__ . '/tagStripperClass.php');
$put_dir  = __DIR__.'/put_dir';
$stripper = new tagStripper(put_dir:$put_dir);
$stripper->stripTags();

