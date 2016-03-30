<?php
require_once '../../../header.php';
require_once '../helper.php';

global $tag, $form, $s, $parametros;

$show_bestiario = new Bestiario();
$objeto = $show_bestiario->select($show_bestiario->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);


$pass = helper_check_permitions($objeto[0]['dono']);

if($pass != 1):
	help_header(ROOTPATHURL.BESTIARIOPATH);
else:
	$tag->body('role="document"');

	new Components('menu', $parametros);
	$tag->br();
	$tag->br();
		$form->_container();
			
			if(isset($_REQUEST['action'])):
				$form->_col(12);
					$create_bestiario = new Bestiario();
					$create_bestiario->update_data($_REQUEST);
				$form->col_();
			endif;
			
			$form->_col(10);
				$tag->span('class="span_title"');
					$tag->imprime(BESTIARIO);
				$tag->span;
			$form->col_();
			$form->_col(1);
				$tag->a('href="'.ROOTPATHURL.BESTIARIOPATH.'view.php?id='.$_GET['id'].'" class="btn btn-success"');
					$tag->imprime(VER);
				$tag->a;
			$form->col_();
			$form->_col(1);
				$tag->a('href="'.ROOTPATHURL.BESTIARIOPATH.'" class="btn btn-info"');
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
				
					helper_form_input(NOME, ['name' => 'nome', 'type' => 'text', 'class'=>'form-control', 'required'=>'true', 'value'=> $objeto[0]['nome']], 8);
				
					helper_form_select_options(CLASSIFICACAO, ['class'=>'form-control', 'name'=>'classificacao'], ['value'=> $objeto[0]['classificacao'], 'fraco'=>'Fraco', 'medio'=>'Médio', 'forte'=>'Forte', 'epico'=>'Épico']);
					
					helper_form_text_area(CONTO, ['name' => 'descricao', 'class'=>'form-control', 'rows'=>'5'], ($objeto[0]['descricao']));
				
					helper_form_button_update_and_back(ROOTPATHURL.BESTIARIOPATH);
				$form->form_();
				
			$form->_container();
		$form->row_();
	$tag->div;

	require_once '../../../footer.php';
endif;