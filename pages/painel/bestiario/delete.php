<?php
require_once '../../../header.php';
require_once '../helper.php';

global $s;

$s->restricted_access();

$delete_bestiario = new Bestiario();
$objeto = $delete_bestiario->select($delete_bestiario->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);

$pass = helper_check_permitions($objeto[0]['dono']);
if(!$pass)
	header("Location: ".ROOTPATHURL.BESTIARIOPATH);

$delete = $delete_bestiario->delete_data($objeto);
if($delete == 1):
	header("Location: ".ROOTPATHURL.BESTIARIOPATH.'?status=deleted');
else:
	header("Location: ".ROOTPATHURL.BESTIARIOPATH.'?status=error');
endif;
