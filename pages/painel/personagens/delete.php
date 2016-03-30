<?php
require_once '../../../header.php';
require_once '../helper.php';

$show_personagem = new Personagens(ROOTPATH.PERSONAGEMIMGPATH);
$objeto = $show_personagem->select($show_personagem->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);

$pass = helper_check_permitions($objeto[0]['dono']);
if(!$pass):
	help_header(ROOTPATHURL.PERSONAGEMPATH);
else:
	$delete = $show_personagem->delete_data($objeto);
	if($delete == 1):
		header("Location: ".ROOTPATHURL.PERSONAGEMPATH.'?status=deleted');
	else:
		header("Location: ".ROOTPATHURL.PERSONAGEMPATH.'?status=error');
	endif;
endif;