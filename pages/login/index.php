<?php 
require_once '../../header.php';

$form->_container();
	$form->_col(12);
		helper_adsense_01();
	$form->col_();
$form->container_();

$tag->body('role="document"');
	global $parametros;

	new Components('menu', $parametros);
	$tag = new Tags();
	new Components('login');

require_once '../../footer.php';