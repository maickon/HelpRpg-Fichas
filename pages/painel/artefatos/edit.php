<?php
require_once '../../../header.php';
require_once '../helper.php';

global $tag, $form, $s, $parametros;

$s->restricted_access();

$show_artefato = new Artefatos(ROOTPATH.ARTEFATOSIMGPATH);
$objeto = $show_artefato->select($show_artefato->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);


$pass = helper_check_permitions($objeto[0]['dono']);

if($pass != 1)
	header("Location: ".ROOTPATHURL.ARTEFATOSPATH);	

$tag->body('role="document"');

new Components('menu', $parametros);
$tag->br();
$tag->br();
	$form->_container();
		
		$old_file = $objeto[0]['img'];
		
		if(isset($_REQUEST['action'])):
			$form->_col(12);
				$create_artefato = new Artefatos(ROOTPATH.ARTEFATOSIMGPATH);
				if(empty($_FILES['img']['name'])):
					$_REQUEST['img'] = '';
					$_REQUEST['old_file'] = $old_file;
				else:
					$_REQUEST['img'] = $_FILES['img'];
					$_REQUEST['old_file'] = $old_file;
				endif;
			
				$create_artefato->update_data($_REQUEST);
			$form->col_();
		endif;
		
		$form->_col(10);
			$tag->span('class="span_title"');
				$tag->imprime(ARTEFATOS);
			$tag->span;
		$form->col_();
		$form->_col(1);
			$tag->a('href="'.ROOTPATHURL.ARTEFATOSPATH.'view.php?id='.$_GET['id'].'" class="btn btn-success"');
				$tag->imprime(VER);
			$tag->a;
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
			
				$form->input(['name' => 'dono', 'type' => 'hidden', 'value'=> $objeto[0]['dono']]);
				
				helper_adm_label($objeto);
				
				helper_form_input("Imagem", ['name' => 'img', 'type' => 'file', 'class'=>'form-control']);
				
				helper_form_input("Nome", ['name' => 'nome', 'type' => 'text', 'class'=>'form-control', 'required'=>'true', 'value'=> $objeto[0]['nome']]);
				
				helper_form_input("Level indicado", ['name' => 'lv', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['lv']]);
				
				helper_form_input("Preço/Custo", ['name' => 'preco', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['preco']]);
				
				helper_form_select_options("Raridade", ['class'=>'form-control', 'name'=>'raridade'], ['value'=> $objeto[0]['raridade'] ,'comum'=>'Comum', 'magico'=>'Mágico', 'raro'=>'Raro', 'lendario'=>'Lendário', 'unico' => 'Único']);
				
				helper_form_select_options("Sistema de RPG", ['class'=>'form-control', 'name'=>'sistema'], ['value'=> $objeto[0]['sistema'],'ded'=>'Dungeons and Dragons', '3det'=>'3D&T', 'deamon'=>'Deamon']);
				
				helper_form_text_area("Descrição", ['name' => 'descricao', 'class'=>'form-control', 'rows'=>'5'], strip_tags($objeto[0]['descricao']));
				
				helper_form_button_update_and_back(ROOTPATHURL.ARTEFATOSPATH);
			
			$form->form_();
			
		$form->_container();
	$form->row_();
	$tag->div;
require_once '../../../footer.php';