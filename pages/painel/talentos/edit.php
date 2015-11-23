<?php
require_once '../../../header.php';
require_once '../helper.php';

global $tag, $form, $s, $parametros;

$s->restricted_access();

$show_talento = new Talentos(ROOTPATH.TALENTOSIMGPATH);
$objeto = $show_talento->select($show_talento->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);


$pass = helper_check_permitions($objeto[0]['dono']);

if($pass != 1)
	header("Location: ".ROOTPATHURL.TALENTOSPATH);	

$tag->body('role="document"');

new Components('menu', $parametros);
$tag->br();
$tag->br();
	$form->_container();
		
		if(isset($_REQUEST['action'])):
			$form->_col(12);
				$create_talento = new Talentos(ROOTPATH.TALENTOSIMGPATH);
				$create_talento->update_data($_REQUEST, false);
			$form->col_();
		endif;
		
		$form->_col(10);
			$tag->span('class="span_title"');
				$tag->imprime(TALENTOS);
			$tag->span;
		$form->col_();
		$form->_col(1);
			$tag->a('href="'.ROOTPATHURL.TALENTOSPATH.'view.php?id='.$_GET['id'].'" class="btn btn-success"');
				$tag->imprime(VER);
			$tag->a;
		$form->col_();
		$form->_col(1);
			$tag->a('href="'.ROOTPATHURL.TALENTOSPATH.'" class="btn btn-info"');
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
				
				helper_form_input("Nome", ['name' => 'nome', 'type' => 'text', 'class'=>'form-control', 'required'=>'true', 'value'=> $objeto[0]['nome']]);

				helper_form_input("Lv", ['name' => 'lv', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['lv']]);

				helper_form_input("Classe", ['name' => 'classe', 'type' => 'text', 'class'=>'form-control', 'required'=>'true', 'value'=> $objeto[0]['classe']]);

				helper_form_select_options("Sistema de Jogo", ['class'=>'form-control', 'name'=>'sistema'], ['value'=> $objeto[0]['sistema'],'ded'=>'Dungeons and Dragons', '3det'=>'3D&T', 'deamon'=>'Deamon']);

				helper_form_input("Pré-requisito", ['name' => 'pre_requisito', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['pre_requisito']]);

				helper_form_text_area("Descrição", ['name' => 'descricao', 'class'=>'form-control', 'rows'=>'5'], strip_tags($objeto[0]['descricao']));	
				
				helper_form_button_update_and_back(ROOTPATHURL.TALENTOSPATH);
				
			$form->form_();
			
		$form->_container();
	$form->row_();

require_once '../../../footer.php';