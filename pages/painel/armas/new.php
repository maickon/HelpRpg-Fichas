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
				$create_arma = new Armas(ROOTPATH.ARMASIMGPATH);
				$_REQUEST['img'] =  $_FILES['img'];
				$create_arma->create($_REQUEST);
			$form->col_();
		endif;
		
		$form->_col(11);
			$tag->span('class="span_title"');
				$tag->imprime(ARMAS);
			$tag->span;
		$form->col_();
		$form->_col(1);
			$tag->a('href="'.ROOTPATHURL.ARMASPATH.'" class="btn btn-info"');
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
			
				helper_form_input("Imagem", ['name' => 'img', 'type' => 'file', 'class'=>'form-control']);

				helper_form_input("Nome", ['name' => 'nome', 'type' => 'text', 'class'=>'form-control', 'required'=>'true']);

				helper_form_input("Level indicado", ['name' => 'lv', 'type' => 'text', 'class'=>'form-control']);

				helper_form_input("Dano", ['name' => 'dano', 'type' => 'text', 'class'=>'form-control']);

				helper_form_input("Preço/Custo", ['name' => 'preco', 'type' => 'text', 'class'=>'form-control']);

				helper_form_input("Decisivo", ['name' => 'decisivo', 'type' => 'text', 'class'=>'form-control']);

				helper_form_input("Distância", ['name' => 'distancia', 'type' => 'text', 'class'=>'form-control']);

				helper_form_input("Peso", ['name' => 'peso', 'type' => 'text', 'class'=>'form-control']);

				helper_form_select_options_arma_tipo();

				helper_form_input("Iniciativa", ['name' => 'iniciativa', 'type' => 'text', 'class'=>'form-control']);
		
				helper_form_input("Pente", ['name' => 'pente', 'type' => 'text', 'class'=>'form-control']);

				helper_form_select_options_sistema();

				helper_form_select_options_categoria();
				
				helper_form_text_field_descricao();
			
				helper_form_button_submit_and_back(ROOTPATHURL.ARMASPATH);
				
			$form->form_();
			
		$form->_container();
	$form->row_();
	$tag->div;
require_once '../../../footer.php';