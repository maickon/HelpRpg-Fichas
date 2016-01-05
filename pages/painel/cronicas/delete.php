<?php
require_once '../../../header.php';
require_once '../helper.php';

global $s;

$s->restricted_access();

$delete_cronica = new Cronicas();
$objeto = $delete_cronica->select($delete_cronica->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);

$pass = helper_check_permitions($objeto[0]['dono']);
if(!$pass)
	header("Location: ".ROOTPATHURL.CRONICASPATH);

$delete = $delete_cronica->delete_data($objeto);
if($delete == 1):
	header("Location: ".ROOTPATHURL.CRONICASPATH.'?status=deleted');
else:
	header("Location: ".ROOTPATHURL.CRONICASPATH.'?status=error');
endif;