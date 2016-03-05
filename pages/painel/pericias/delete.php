<?php
require_once '../../../header.php';
require_once '../helper.php';

$show_personagem = new Pericias(ROOTPATH.PERICIASIMGPATH);
$objeto = $show_personagem->select($show_personagem->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);

$pass = helper_check_permitions($objeto[0]['dono']);
if(!$pass)
	header("Location: ".ROOTPATHURL.PERICIASPATH);

$delete = $show_personagem->delete_data($objeto);
if($delete == 1):
	header("Location: ".ROOTPATHURL.PERICIASPATH.'?status=deleted');
else:
	header("Location: ".ROOTPATHURL.PERICIASPATH.'?status=error');
endif;