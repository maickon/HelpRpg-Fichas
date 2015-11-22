<?php
require_once '../../../header.php';
require_once '../helper.php';

global $s;

$s->restricted_access();

$show_talento = new Talentos(ROOTPATH.TALENTOSIMGPATH);
$talento = $show_talento->select($show_talento->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);

$pass = helper_check_permitions($talento[0]['dono']);
if(!$pass)
	header("Location: ".ROOTPATHURL.TALENTOSPATH);

$delete = $show_talento->delete_data($talento);
if($delete == 1):
	header("Location: ".ROOTPATHURL.TALENTOSPATH.'?status=deleted');
else:
	header("Location: ".ROOTPATHURL.TALENTOSPATH.'?status=error');
endif;