<?php
require_once ROOTPATH.'/init.php';

$s = new Session();
if(isset($_GET['l'])):
	if(isset($_SESSION['linguagem'])):
		$s->set_session('linguagem', $_GET['l']);
	else:
		$s->set_session('linguagem', $_GET['l']);
	endif;
elseif(!isset($_SESSION['linguagem'])):
	$s->set_session('linguagem', 'pt-br');
endif;

switch($s->get_session('linguagem')):
	case 'pt-br':
			require_once 'pt-br/geral.php';
			require_once 'pt-br/3det.php';
			require_once 'pt-br/d20.php';
			require_once 'pt-br/deamon.php';
			require_once 'pt-br/d20-ded-4.0.php';
			require_once 'pt-br/d20-ded-5.0.php';
			require_once 'pt-br/fate.php';
			require_once 'pt-br/itens.php';
			require_once 'pt-br/magias.php';
			require_once 'pt-br/pericias.php';
			require_once 'pt-br/login.php';
		break;
	
	case 'en':
			require_once 'en/geral.php';
			require_once 'en/3det.php';
			require_once 'en/d20.php';
			require_once 'en/deamon.php';
			require_once 'en/d20-ded-4.0.php';
			require_once 'en/d20-ded-5.0.php';
			require_once 'en/fate.php';
			require_once 'en/itens.php';
			require_once 'en/magias.php';
			require_once 'en/pericias.php';
			require_once 'en/login.php';
		break;
endswitch;