<?php
require_once '../../../header.php';
require_once '../helper.php';

$delete_ficha = new UploadFichas();
$objeto = $delete_ficha->select($delete_ficha->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);

$pass = helper_check_permitions($objeto[0]['dono']);
if(!$pass):
	help_header(ROOTPATHURL.FICHASUPLOADPATH);	
else:
	$delete = $delete_ficha->delete_data($objeto);
	if($delete == 1):
		help_header(ROOTPATHURL.FICHASUPLOADPATH.'?status=deleted');
	else:
		help_header(ROOTPATHURL.FICHASUPLOADPATH.'?status=error');
	endif;
endif;