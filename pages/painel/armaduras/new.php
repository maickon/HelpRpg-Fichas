<?php
require_once '../../../header.php';
require_once '../helper.php';

global $tag, $form, $s, $parametros;
$s->restricted_access();

$tag->script('src="js/index.js"');
$tag->script;

$tag->body('role="document"');

new Components('menu', $parametros);
$tag->br();
$tag->br();
	$form->_container();
		if(isset($_REQUEST['action'])):
			$form->_col(12);
				$create_armadura = new Armaduras(ROOTPATH.ARMADURASIMGPATH);
				$_REQUEST['img'] =  $_FILES['img'];
				$create_armadura->create($_REQUEST);
			$form->col_();
		endif;
		
		$form->_col(11);
			$tag->span('class="span_title"');
				$tag->imprime(ARMADURAS);
			$tag->span;
		$form->col_();
		$form->_col(1);
			$tag->a('href="'.ROOTPATHURL.ARMADURASPATH.'" class="btn btn-info"');
				$tag->imprime(BACK);
			$tag->a;
		$form->col_();
		$form->_col(12);
			$tag->hr();
		$form->col_();
	$form->container_();
	
	$form->_row();
		$form->_container();	
			$form->_form(['method'=>'post', 'name'=>'new-user', 'enctype'=>'multipart/form-data', 'class'=>'form-group', 'data-toggle'=>'validator']);
			
				$current_user = $s->get_session('nome');
				$form->input(['name' => 'dono', 'type' => 'hidden', 'value'=> $current_user]);
				
				helper_form_input("Imagem", ['name' => 'img', 'id' => 'img', 'type' => 'file', 'class'=>'form-control']);
				
				helper_form_select_options_sistema();
				
				require 'form/form.php';
				
				helper_form_button_submit_and_back(ROOTPATHURL.ARMADURASPATH);
				
			$form->form_();
			
		$form->_container();
	$form->row_();
	
require_once '../../../footer.php';