<?php
require_once '../../../header.php';
require_once '../helper.php';

$delete_bestiario = new Bestiario();
$objeto = $delete_bestiario->select($delete_bestiario->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);

$pass = helper_check_permitions($objeto[0]['dono']);
if(!$pass):
	help_header(ROOTPATHURL.BESTIARIOPATH);
else:
	$delete = $delete_bestiario->delete_data($objeto);
	if($delete == 1):
		header("Location: ".ROOTPATHURL.BESTIARIOPATH.'?status=deleted');
	else:
		header("Location: ".ROOTPATHURL.BESTIARIOPATH.'?status=error');
	endif;
endif;
