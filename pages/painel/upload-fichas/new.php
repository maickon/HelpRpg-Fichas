<?php
require_once '../../../header.php';
require_once '../helper.php';

global $tag, $form, $s, $parametros;

$tag->body('role="document"');

new Components('menu', $parametros);
$tag->br();
$tag->br();
	$form->_container();
		if(isset($_REQUEST['action'])):
			$form->_col(12);
				$create_ficha = new UploadFichas();
				$create_ficha->create($_REQUEST);
			$form->col_();
		endif;
		
		$form->_col(11);
			$tag->span('class="span_title"');
				$tag->imprime(FICHA_DE_PERSONAGEM);
			$tag->span;
		$form->col_();
		$form->_col(1);
			$tag->a('href="'.ROOTPATHURL.FICHASUPLOADPATH.'" class="btn btn-info"');
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
			
				helper_form_input(NOME, ['name' => 'nome', 'type' => 'text', 'class'=>'form-control', 'required'=>'true'], 3);

				helper_form_input(RACA, ['name' => 'raca', 'type' => 'text', 'class'=>'form-control', 'required'=>'true'], 3);

				helper_form_input(CLASSE, ['name' => 'classe', 'type' => 'text', 'class'=>'form-control', 'required'=>'true'], 2);

				helper_form_input(NIVEL, ['name' => 'lv', 'type' => 'text', 'class'=>'form-control', 'required'=>'true'], 1);
			
				helper_form_select_options(SISTEMA, ['class'=>'form-control selectpicker', 'name'=>'sistema', 'data-live-search'=>'true'], $rpg_sistemas, 3);
				
				helper_form_input(URL_ARQUIVO, ['name' => 'url_arquivo_externo', 'type' => 'text', 'class'=>'form-control'], 9);

				helper_form_select_options(TIPO_FICHA, ['class'=>'form-control selectpicker', 'name'=>'tipo', 'data-live-search'=>'true'], $tipo_ficha, 3);
				//helper_form_input(UPLOAD_FILE, ['name' => '	url_arquivo', 'type' => 'file', 'class'=>'form-control'], 6);

				helper_form_text_area(DESCRICAO, ['name' => 'descricao', 'class'=>'form-control', 'rows'=>'5']);	
				
				helper_form_button_submit_and_back(ROOTPATHURL.FICHASUPLOADPATH);
			$form->form_();
			
		$form->_container();
	$form->row_();
$tag->div;
require_once '../../../footer.php';
