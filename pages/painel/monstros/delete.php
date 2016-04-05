<?php
require_once '../../../header.php';
require_once '../helper.php';

$show_monstro = new Personagens(ROOTPATH.MONSTROIMGPATH);
$objeto = $show_monstro->select($show_monstro->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);

$pass = helper_check_permitions($objeto[0]['dono']);
if(!$pass):
	help_header(ROOTPATHURL.MONSTROPATH);
else:
	$delete = $show_monstro->delete_data($objeto);
	if($delete == 1):
		help_header(ROOTPATHURL.MONSTROPATH.'?status=deleted');
	else:
		help_header(ROOTPATHURL.MONSTROPATH.'?status=error');
	endif;
endif;