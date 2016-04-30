<?php 
require_once '../../header.php';


$tag->body('role="document"');
	
	global $parametros;

	new Components('menu', $parametros);

	
	$form->_container();
		$form->_col(4);
		$form->col_();
		
		$form->_col(4);
			$form->_col(12);
				$tag->br();
				helper_adsense_responsivo_02();
				$tag->br();
			$form->col_();
		$form->col_();

		$form->_col(12);
			new Components('login');
		$form->col_();
	$form->container_();

require_once '../../footer.php';