<?php
require_once '../../../header.php';
require_once '../helper.php';

global $s;

$s->restricted_access();

$show_arma = new Armas(ROOTPATH	.ARMASIMGPATH);
$objeto = $show_arma->select($show_arma->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);

$pass = helper_check_permitions($objeto[0]['dono']);
if(!$pass)
	header("Location: ".ROOTPATHURL.ARMASPATH);

$delete = $show_arma->delete_data($objeto);
if($delete == 1):
	header("Location: ".ROOTPATHURL.ARMASPATH.'?status=deleted');
else:
	header("Location: ".ROOTPATHURL.ARMASPATH.'?status=error');
endif;