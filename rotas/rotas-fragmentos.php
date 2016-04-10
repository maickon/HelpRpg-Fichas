<?php
//Todos os fragmentos de URL ficam aqui
define('ID', "id");
define('VIEW_BY_ID', "view.php?".ID."=");
define("CONTADOR_MAIS_CEM", "100+");

$url = explode('/', $_SERVER['REQUEST_URI']);
if(empty($url[count($url)-1])):
	define('PTBR_PATH', '?l=pt-br');
	define('EN_PATH', '?l=en');	
else:
	define('PTBR_PATH', $_SERVER['REQUEST_URI'].'&l=pt-br');
	define('EN_PATH', $_SERVER['REQUEST_URI'].'&l=en');
endif;