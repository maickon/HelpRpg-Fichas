<?php
require_once '../../../header.php';
require_once '../helper.php';

$show_arma = new Armas(ROOTPATH	.ARMASIMGPATH);
$objeto = $show_arma->select($show_arma->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);

$pass = helper_check_permitions($objeto[0]['dono']);
if(!$pass):
	help_header(ROOTPATHURL.ARMASPATH);
else:
	$delete = $show_arma->delete_data($objeto);
	if($delete == 1):
		help_header(ROOTPATHURL.ARMASPATH.'?status=deleted');
	else:
		help_header(ROOTPATHURL.ARMASPATH.'?status=error');
	endif;
endif;