<?php
require_once '../../../header.php';
require_once '../helper.php';

global $s;

$s->restricted_access();

$delete_aventura = new Aventuras();
$objeto = $delete_aventura->select($delete_aventura->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);

$pass = helper_check_permitions($objeto[0]['dono']);
if(!$pass)
	header("Location: ".ROOTPATHURL.ARMASPATH);

$delete = $delete_aventura->delete_data($objeto);
if($delete == 1):
	header("Location: ".ROOTPATHURL.AVENTURASPATH.'?status=deleted');
else:
	header("Location: ".ROOTPATHURL.AVENTURASPATH.'?status=error');
endif;