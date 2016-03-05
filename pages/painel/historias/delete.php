<?php
require_once '../../../header.php';
require_once '../helper.php';

$delete_historia = new Historias();
$objeto = $delete_historia->select($delete_historia->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);

$pass = helper_check_permitions($objeto[0]['dono']);
if(!$pass)
	header("Location: ".ROOTPATHURL.HISTORIASPATH);

$delete = $delete_historia->delete_data($objeto);
if($delete == 1):
	header("Location: ".ROOTPATHURL.HISTORIASPATH.'?status=deleted');
else:
	header("Location: ".ROOTPATHURL.HISTORIASPATH.'?status=error');
endif;