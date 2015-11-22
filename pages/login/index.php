<?php 
require_once '../../header.php';

$tag->body('role="document"');
	global $parametros;

	new Components('menu', $parametros);
	$tag = new Tags();
	new Components('login');

require_once '../../footer.php';