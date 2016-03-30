<?php
require_once '../../../header.php';
require_once '../helper.php';

$delete_ficha = new UploadFichas();
$objeto = $delete_ficha->select($delete_ficha->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);

$pass = helper_check_permitions($objeto[0]['dono']);
if(!$pass)
	header("Location: ".ROOTPATHURL.FICHASUPLOADPATH);

$delete = $delete_ficha->delete_data($objeto);
if($delete == 1):
	header("Location: ".ROOTPATHURL.FICHASUPLOADPATH.'?status=deleted');
else:
	header("Location: ".ROOTPATHURL.FICHASUPLOADPATH.'?status=error');
endif;
