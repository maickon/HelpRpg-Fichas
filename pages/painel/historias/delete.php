<?php
require_once '../../../header.php';
require_once '../helper.php';

$delete_historia = new Historias();
$objeto = $delete_historia->select($delete_historia->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);

$pass = helper_check_permitions($objeto[0]['dono']);
if(!$pass):
	help_header(ROOTPATHURL.HISTORIASPATH);
else:
	$delete = $delete_historia->delete_data($objeto);
	if($delete == 1):
		help_header(ROOTPATHURL.HISTORIASPATH.'?status=deleted');
	else:
		help_header(ROOTPATHURL.HISTORIASPATH.'?status=error');
	endif;
endif;