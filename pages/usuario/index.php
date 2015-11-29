<?php

require_once '../../header.php';

global $s;
new Components('menu', $parametros);
$form = new Form();

if(isset($_REQUEST['action'])):
	$user = new Usuarios();
	$form->_row();
		$form->_container();
			$current_user = $user->select($user->table, null, null, [['login','=', $s->get_session('login') ? $s->get_session('login') : ' ']]);
		$form->container_();
	$form->row_();
endif;

$form->_row();
	$form->_container();		
		
		print_r($current_user);
		
	$form->_container();
$form->row_();

require_once '../../footer.php';
