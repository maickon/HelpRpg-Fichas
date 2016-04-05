<?php
require_once '../../../header.php';
require_once '../helper.php';

$delete_cenario = new Cenarios();
$objeto = $delete_cenario->select($delete_cenario->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);

$pass = helper_check_permitions($objeto[0]['dono']);
if(!$pass):
	help_header(ROOTPATHURL.CENARIOSPATH);
else:
	$delete = $delete_cenario->delete_data($objeto);
	if($delete == 1):
		help_header(ROOTPATHURL.CENARIOSPATH.'?status=deleted');
	else:
		help_header(ROOTPATHURL.CENARIOSPATH.'?status=error');
	endif;
endif;