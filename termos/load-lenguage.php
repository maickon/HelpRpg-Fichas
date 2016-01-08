<?php
$ip = $_SERVER['REMOTE_ADDR'];
$pais = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip));
if(isset($pais['geoplugin_countryName']) && $pais['geoplugin_countryName'] == 'United States'):
$carregar_traducao = $pais['geoplugin_countryName'];
else:
$carregar_traducao = 'Brazil';
endif;

switch('Brazil'):
	case 'Brazil':
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
	
	case 'United States':
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