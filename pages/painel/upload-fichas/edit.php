<?php
require_once '../../../header.php';
require_once '../helper.php';

global $tag, $form, $s, $parametros;

$show_fichas = new UploadFichas();
$objeto = $show_fichas->select($show_fichas->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);


$pass = helper_check_permitions($objeto[0]['dono']);

if($pass != 1)
	header("Location: ".ROOTPATHURL.FICHASUPLOADPATH);	

$tag->body('role="document"');

new Components('menu', $parametros);
$tag->br();
$tag->br();
	$form->_container();
		
		if(isset($_REQUEST['action'])):
			$form->_col(12);
				$create_ficha = new UploadFichas();
				$create_ficha->update_data($_REQUEST);
			$form->col_();
		endif;
		
		$form->_col(10);
			$tag->span('class="span_title"');
				$tag->imprime(FICHA_DE_PERSONAGEM);
			$tag->span;
		$form->col_();
		$form->_col(1);
			$tag->a('href="'.ROOTPATHURL.FICHASUPLOADPATH.'view.php?id='.$_GET['id'].'" class="btn btn-success"');
				$tag->imprime(VER);
			$tag->a;
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
			
				$edit_list_sistemas = array_merge([$objeto[0]['sistema']], $rpg_sistemas);
				$tipo_fichas = array_merge([$objeto[0]['tipo']], $tipo_ficha);

				helper_form_input(NOME, ['name' => 'nome', 'type' => 'text', 'class'=>'form-control', 'required'=>'true', 'value'=> $objeto[0]['nome']], 3);

				helper_form_input(RACA, ['name' => 'raca', 'type' => 'text', 'class'=>'form-control', 'required'=>'true', 'value'=> $objeto[0]['raca']], 3);

				helper_form_input(CLASSE, ['name' => 'classe', 'type' => 'text', 'class'=>'form-control', 'required'=>'true', 'value'=> $objeto[0]['classe']], 2);

				helper_form_input(NIVEL, ['name' => 'lv', 'type' => 'text', 'class'=>'form-control', 'required'=>'true', 'value'=> $objeto[0]['lv']], 1);
			
				helper_form_select_options(SISTEMA, ['class'=>'form-control selectpicker', 'name'=>'sistema', 'data-live-search'=>'true'], $edit_list_sistemas, 3);
				
				helper_form_input(URL_ARQUIVO, ['name' => 'url_arquivo_externo', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['url_arquivo_externo']], 9);

				helper_form_select_options(TIPO_FICHA, ['class'=>'form-control selectpicker', 'name'=>'tipo', 'data-live-search'=>'true'], $tipo_ficha, 3);

				//helper_form_input(UPLOAD_FILE, ['name' => '	url_arquivo', 'type' => 'file', 'class'=>'form-control'], 6);

				helper_form_text_area(DESCRICAO, ['name' => 'descricao', 'class'=>'form-control', 'rows'=>'5'], ($objeto[0]['descricao']));
				
				helper_form_button_update_and_back(ROOTPATHURL.FICHASUPLOADPATH);

			$form->form_();
			
		$form->_container();
	$form->row_();
$tag->div;

require_once '../../../footer.php';