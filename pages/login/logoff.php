<?php
require_once '../../init.php';
global $s;
$s->destroy_all_session();
header('location: '.ROOTPATHURL);