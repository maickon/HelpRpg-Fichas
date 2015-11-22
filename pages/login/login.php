<?php 
require_once '../../init.php';

if(isset($_REQUEST['login']) && isset($_REQUEST['senha']) && isset($_REQUEST['entrar'])):
	global $s;
	//autentica o usuario
	$login = $s->login($_REQUEST['login'], $_REQUEST['senha']);
	if($login):
		//redireciona o usuario para dentro do sistema	
		header('location: '.PAINEL_PATH);
	else:
		header('location: '.ROOTPATHURL);
	endif;	
endif;
