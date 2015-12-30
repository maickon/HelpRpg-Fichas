<?php
require_once '../../../header.php';
require_once '../helper.php';

global $s;

$s->restricted_access();

$delete_artefato = new Artefatos(ROOTPATH.ARTEFATOSIMGPATH);
$objeto = $delete_artefato->select($delete_artefato->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);

$pass = helper_check_permitions($objeto[0]['dono']);
if(!$pass)
	header("Location: ".ROOTPATHURL.ARMASPATH);

$delete = $delete_artefato->delete_data($objeto);
if($delete == 1):
	header("Location: ".ROOTPATHURL.ARTEFATOSPATH.'?status=deleted');
else:
	header("Location: ".ROOTPATHURL.ARTEFATOSPATH.'?status=error');
endif;