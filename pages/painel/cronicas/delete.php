<?php
require_once '../../../header.php';
require_once '../helper.php';

$delete_cronica = new Cronicas();
$objeto = $delete_cronica->select($delete_cronica->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);

$pass = helper_check_permitions($objeto[0]['dono']);
if(!$pass):
	help_header(ROOTPATHURL.CRONICASPATH);
else:
	$delete = $delete_cronica->delete_data($objeto);
	if($delete == 1):
		header("Location: ".ROOTPATHURL.CRONICASPATH.'?status=deleted');
	else:
		header("Location: ".ROOTPATHURL.CRONICASPATH.'?status=error');
	endif;
endif;