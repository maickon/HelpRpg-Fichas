<?php
require_once '../../../header.php';
require_once '../helper.php';

global $tag, $form, $s, $parametros;

$s->restricted_access();

$show_aventura = new Aventuras();
$objeto = $show_aventura->select($show_aventura->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);


$pass = helper_check_permitions($objeto[0]['dono']);

if($pass != 1)
	header("Location: ".ROOTPATHURL.AVENTURASPATH);	

$tag->body('role="document"');

new Components('menu', $parametros);
$tag->br();
$tag->br();
	$form->_container();
		
		if(isset($_REQUEST['action'])):
			$form->_col(12);
				$create_aventura = new Aventuras();
				$create_aventura->update_data($_REQUEST);
			$form->col_();
		endif;
		
		$form->_col(10);
			$tag->span('class="span_title"');
				$tag->imprime(AVENTURAS);
			$tag->span;
		$form->col_();
		$form->_col(1);
			$tag->a('href="'.ROOTPATHURL.AVENTURASPATH.'view.php?id='.$_GET['id'].'" class="btn btn-success"');
				$tag->imprime(VER);
			$tag->a;
		$form->col_();
		$form->_col(1);
			$tag->a('href="'.ROOTPATHURL.AVENTURASPATH.'" class="btn btn-info"');
				$tag->imprime(BACK);
			$tag->a;
		$form->col_();
		$tag->br();
	$form->container_();
	
	$form->_container();
		$form->_col(12);
			$tag->hr();
		$form->col_();
	$form->container_();
	
	$form->_row();
		$form->_container();	
			$form->_form(['method'=>'post', 'name'=>'new-user', 'enctype'=>'multipart/form-data', 'class'=>'form-group', 'data-toggle'=>'validator']);
			
				$form->input(['name' => 'dono', 'type' => 'hidden', 'value'=> $objeto[0]['dono']]);
				
				helper_adm_label($objeto);
				
				helper_form_input(TITULO, ['name' => 'titulo', 'type' => 'text', 'class'=>'form-control', 'required'=>'true', 'value'=> $objeto[0]['titulo']], 8);
				
				helper_form_input(NIVEL_INDICADO_AVENTURA, ['name' => 'level_indicado', 'type' => 'text', 'class'=>'form-control', 'required'=>'true', 'value'=> $objeto[0]['level_indicado']], 4);
				
				helper_form_input(MESTRE_DA_AVENTURA, ['name' => 'mestre', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['mestre']]);
				
				helper_form_select_options(TIPO_DE_AVENTURA, ['class'=>'form-control', 'name'=>'tipo'], ['value'=> $objeto[0]['tipo'], 'curta'=>'Curta', 'longa'=>'Longa', 'campanha'=>'Campanha', 'epico'=>'Campanha épica']);
				
				helper_form_select_options(SISTEMA_DE_RPG, ['class'=>'form-control', 'name'=>'sistema'], ['value'=> $objeto[0]['sistema'],'ded'=>'Dungeons and Dragons', '3det'=>'3D&T', 'deamon'=>'Deamon']);
				
				helper_form_text_area(HISTORIA_DA_AVENTURA, ['name' => 'aventura', 'class'=>'form-control', 'rows'=>'5'], ($objeto[0]['aventura']));
				
				helper_form_button_update_and_back(ROOTPATHURL.AVENTURASPATH);
			$form->form_();
			
		$form->_container();
	$form->row_();
$tag->div;

require_once '../../../footer.php';