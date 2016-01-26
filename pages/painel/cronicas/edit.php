<?php
require_once '../../../header.php';
require_once '../helper.php';

global $tag, $form, $s, $parametros;

$s->restricted_access();

$show_cronicas = new Cronicas();
$objeto = $show_cronicas->select($show_cronicas->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);


$pass = helper_check_permitions($objeto[0]['dono']);

if($pass != 1)
	header("Location: ".ROOTPATHURL.CRONICASPATH);	

$tag->body('role="document"');

new Components('menu', $parametros);
$tag->br();
$tag->br();
	$form->_container();
		
		if(isset($_REQUEST['action'])):
			$form->_col(12);
				$create_cronicas = new Cronicas();
				$create_cronicas->update_data($_REQUEST);
			$form->col_();
		endif;
		
		$form->_col(10);
			$tag->span('class="span_title"');
				$tag->imprime(CRONICAS);
			$tag->span;
		$form->col_();
		$form->_col(1);
			$tag->a('href="'.ROOTPATHURL.CRONICASPATH.'view.php?id='.$_GET['id'].'" class="btn btn-success"');
				$tag->imprime(VER);
			$tag->a;
		$form->col_();
		$form->_col(1);
			$tag->a('href="'.ROOTPATHURL.CRONICASPATH.'" class="btn btn-info"');
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
			
				helper_form_input(TITULO, ['name' => 'titulo', 'type' => 'text', 'class'=>'form-control', 'required'=>'true', 'value'=> $objeto[0]['titulo']], 8);
			
				helper_form_input(AUTOR, ['name' => 'autor', 'type' => 'text', 'class'=>'form-control', 'required'=>'true', 'value'=> $objeto[0]['autor']], 4);
				
				helper_form_input(DESCRICAO_BREVE, ['name' => 'descricao_breve', 'type' => 'text', 'class'=>'form-control', 'required'=>'true', 'value'=> $objeto[0]['descricao_breve']], 12);
			
				helper_form_text_area(CRONICAS_DESCRICAO, ['name' => 'descricao_cronica', 'class'=>'form-control', 'rows'=>'5'], ($objeto[0]['descricao_cronica']));
			
				helper_form_button_update_and_back(ROOTPATHURL.CRONICASPATH);
			$form->form_();
			
		$form->_container();
	$form->row_();
$tag->div;

require_once '../../../footer.php';