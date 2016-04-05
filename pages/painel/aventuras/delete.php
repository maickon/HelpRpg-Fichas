<?php
require_once '../../../header.php';
require_once '../helper.php';

$delete_aventura = new Aventuras();
$objeto = $delete_aventura->select($delete_aventura->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);

$pass = helper_check_permitions($objeto[0]['dono']);
if(!$pass):
	help_header(ROOTPATHURL.AVENTURASPATH);
else:
	$delete = $delete_aventura->delete_data($objeto);
	if($delete == 1):
		help_header(ROOTPATHURL.AVENTURASPATH.'?status=deleted');
	else:
		help_header(ROOTPATHURL.AVENTURASPATH.'?status=error');
	endif;
endif;