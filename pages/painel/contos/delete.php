<?php
require_once '../../../header.php';
require_once '../helper.php';

$delete_contos = new Contos();
$objeto = $delete_contos->select($delete_contos->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);

$pass = helper_check_permitions($objeto[0]['dono']);
if(!$pass)
	header("Location: ".ROOTPATHURL.CONTOSPATH);

$delete = $delete_contos->delete_data($objeto);
if($delete == 1):
	header("Location: ".ROOTPATHURL.CONTOSPATH.'?status=deleted');
else:
	header("Location: ".ROOTPATHURL.CONTOSPATH.'?status=error');
endif;