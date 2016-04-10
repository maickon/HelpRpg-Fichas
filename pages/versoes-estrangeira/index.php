<?php 
require_once '../../header.php';

new Components('menu', $parametros);
global $s, $tag, $form;

$form->_row();
	$form->_container();
		$form->_col(12);
			$file = file_get_contents(ROOTPATH.'txt/pages/versoes-estrangeira/'.$s->get_session('linguagem').'/versoes-estrangeira.html');
			echo $file;
		$form->col_();	
$form->row_();

require_once '../../footer.php';
