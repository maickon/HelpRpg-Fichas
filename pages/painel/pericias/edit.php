<?php
require_once '../../../header.php';
require_once '../helper.php';

global $tag, $form, $s, $parametros;

$show_pericia = new Pericias(ROOTPATH.PERICIASIMGPATH);
$objeto = $show_pericia->select($show_pericia->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);


$pass = helper_check_permitions($objeto[0]['dono']);

if($pass != 1):
	help_header(ROOTPATHURL.PERICIASPATH);
else:
	$tag->body('role="document"');

	new Components('menu', $parametros);
	$tag->br();
	$tag->br();
		$form->_container();
			
			if(isset($_REQUEST['action'])):
				$form->_col(12);
					$create_pericia = new Pericias(ROOTPATH.PERICIASIMGPATH);
					$create_pericia->update_data($_REQUEST, false);
				$form->col_();
			endif;
			
			$form->_col(10);
				$tag->span('class="span_title"');
					$tag->imprime(PERICIAS);
				$tag->span;
			$form->col_();
			$form->_col(1);
				$tag->a('href="'.ROOTPATHURL.PERICIASPATH.'view.php?id='.$_GET['id'].'" class="btn btn-success"');
					$tag->imprime(VER);
				$tag->a;
			$form->col_();
			$form->_col(1);
				$tag->a('href="'.ROOTPATHURL.PERICIASPATH.'" class="btn btn-info"');
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
				
					$form->input(['name' => 'dono', 'type' => 'hidden', 'value'=> $objeto[0]['dono']]);
					
					helper_adm_label($objeto);
					
					helper_form_input("Nome", ['name' => 'nome', 'type' => 'text', 'class'=>'form-control', 'required'=>'true', 'value'=> $objeto[0]['nome']]);

					helper_form_input("Categoria", ['name' => 'categoria', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['categoria']]);

					helper_form_input("Habilidade chave", ['name' => 'habilidade_chave', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['habilidade_chave']]);

					helper_form_input("Classe", ['name' => 'classe_favorecida', 'type' => 'text', 'class'=>'form-control', 'required'=>'true', 'value'=> $objeto[0]['classe_favorecida']]);
					
					helper_form_select_options("Sistema de Jogo", ['class'=>'form-control selectpicker', 'data-live-search'=>'true', 'name'=>'sistema'], array_merge(array('value'=> $objeto[0]['sistema']), $rpg_sistemas));
					
					helper_form_text_area("Descrição", ['name' => 'descricao', 'class'=>'form-control', 'rows'=>'5'], strip_tags($objeto[0]['descricao']));
				
					helper_form_button_update_and_back(ROOTPATHURL.PERICIASPATH);
		
				$form->form_();
				
			$form->_container();
		$form->row_();
		$tag->div;
	require_once '../../../footer.php';
endif;