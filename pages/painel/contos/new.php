<?php
require_once '../../../header.php';
require_once '../helper.php';

global $tag, $form, $s, $parametros;
$s->restricted_access();

$tag->body('role="document"');

new Components('menu', $parametros);
$tag->br();
$tag->br();
	$form->_container();
		if(isset($_REQUEST['action'])):
			$form->_col(12);
				$create_contos = new Contos();
				$create_contos->create($_REQUEST);
			$form->col_();
		endif;
		
		$form->_col(11);
			$tag->span('class="span_title"');
				$tag->imprime(CONTOS);
			$tag->span;
		$form->col_();
		$form->_col(1);
			$tag->a('href="'.ROOTPATHURL.CONTOSPATH.'" class="btn btn-info"');
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
	
				helper_form_input(TITULO, ['name' => 'titulo', 'type' => 'text', 'class'=>'form-control', 'required'=>'true'], 8);
				
				helper_form_input(AUTOR, ['name' => 'autor', 'type' => 'text', 'class'=>'form-control', 'required'=>'true'], 4);
							
				helper_form_input(DESCRICAO_BREVE, ['name' => 'descricao_breve', 'type' => 'text', 'class'=>'form-control', 'required'=>'true'], 12);
				
				helper_form_text_field_conto();
				
				helper_form_button_submit_and_back(ROOTPATHURL.CONTOSPATH);
			$form->form_();
			
		$form->_container();
	$form->row_();
$tag->div;
require_once '../../../footer.php';