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
				$create_magia = new Magias(ROOTPATH.MAGIASIMGPATH);
				$_REQUEST['img'] =  $_FILES['img'];
				$create_magia->create($_REQUEST);
			$form->col_();
		endif;
		
		$form->_col(11);
			$tag->span('class="span_title"');
				$tag->imprime(MAGIAS);
			$tag->span;
		$form->col_();
		$form->_col(1);
			$tag->a('href="'.ROOTPATHURL.MAGIASPATH.'" class="btn btn-info"');
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

				helper_form_input("Lv (Círculo)", ['name' => 'circulo', 'type' => 'text', 'class'=>'form-control']);

				helper_form_input("classe", ['name' => 'classe', 'type' => 'text', 'class'=>'form-control', 'required'=>'true']);

				helper_form_select_options_sistema();

				helper_form_input("Componente", ['name' => 'componente', 'type' => 'text', 'class'=>'form-control']);

				helper_form_input("Tempo de execução", ['name' => 'tempo_execucao', 'type' => 'text', 'class'=>'form-control']);

				helper_form_input("Alcance", ['name' => 'alcance', 'type' => 'text', 'class'=>'form-control']);

				helper_form_input("Área", ['name' => 'area', 'type' => 'text', 'class'=>'form-control']);

				helper_form_input("Dano", ['name' => 'dano', 'type' => 'text', 'class'=>'form-control']);

				helper_form_input("Alvo", ['name' => 'alvo', 'type' => 'text', 'class'=>'form-control']);

				helper_form_input("Duração", ['name' => 'duracao', 'type' => 'text', 'class'=>'form-control']);

				helper_form_input("Teste de resistência", ['name' => 'teste_resistencia', 'type' => 'text', 'class'=>'form-control']);

				helper_form_input("Resistência a magia", ['name' => 'resistencia_magia', 'type' => 'text', 'class'=>'form-control']);

				helper_form_text_field_descricao();

				helper_form_button_submit_and_back(ROOTPATHURL.MAGIASPATH);				
			
			$form->form_();
			
		$form->_container();
	$form->row_();

require_once '../../../footer.php';