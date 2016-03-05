<?php
require_once '../../../header.php';
require_once '../helper.php';

$show_monstro = new Personagens(ROOTPATH.MONSTROIMGPATH);
$objeto = $show_monstro->select($show_monstro->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);

$pass = helper_check_permitions($objeto[0]['dono']);
if(!$pass)
	header("Location: ".ROOTPATHURL.MONSTROPATH);

$delete = $show_monstro->delete_data($objeto);
if($delete == 1):
	header("Location: ".ROOTPATHURL.MONSTROPATH.'?status=deleted');
else:
	header("Location: ".ROOTPATHURL.MONSTROPATH.'?status=error');
endif;