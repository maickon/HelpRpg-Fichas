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
				$create_artefato = new Artefatos(ROOTPATH.ARTEFATOSIMGPATH);
				$_REQUEST['img'] =  $_FILES['img'];
				$create_artefato->create($_REQUEST);
			$form->col_();
		endif;
		
		$form->_col(11);
			$tag->span('class="span_title"');
				$tag->imprime(ARTEFATOS);
			$tag->span;
		$form->col_();
		$form->_col(1);
			$tag->a('href="'.ROOTPATHURL.ARTEFATOSPATH.'" class="btn btn-info"');
				$tag->imprime(BACK);
			$tag->a;
		$form->col_();
		$tag->br();
		$tag->hr();
	$form->container_();
	
	$form->_row();
		$form->_container();	
			$form->_form(['method'=>'post', 'name'=>'new-user', 'enctype'=>'multipart/form-data', 'class'=>'form-group', 'data-toggle'=>'validator']);
			
				$current_user = $s->get_session('nome');
				$form->input(['name' => 'dono', 'type' => 'hidden', 'value'=> $current_user]);

				helper_form_input("Imagem", ['name' => 'img', 'type' => 'file', 'class'=>'form-control']);
	
				helper_form_input("Nome", ['name' => 'nome', 'type' => 'text', 'class'=>'form-control', 'required'=>'true']);
				
				helper_form_input("Level indicado", ['name' => 'lv', 'type' => 'text', 'class'=>'form-control']);
				
				helper_form_input("Preço/Custo", ['name' => 'preco', 'type' => 'text', 'class'=>'form-control']);
				
				helper_form_select_options("Raridade", ['class'=>'form-control', 'name'=>'raridade'], ['comum'=>'Comum', 'magico'=>'Mágico', 'raro'=>'Raro', 'lendario'=>'Lendário', 'unico' => 'Único']);
				
				helper_form_select_options_sistema();
				
				helper_form_text_field_descricao();
				
				helper_form_button_submit_and_back(ROOTPATHURL.ARMASPATH);
			$form->form_();
			
		$form->_container();
	$form->row_();

require_once '../../../footer.php';