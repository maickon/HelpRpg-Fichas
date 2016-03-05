<?php
require_once '../../../header.php';
require_once '../helper.php';

global $tag, $form, $s, $parametros;

$show_magia = new Magias(ROOTPATH.MAGIASIMGPATH);
$objeto = $show_magia->select($show_magia->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);


$pass = helper_check_permitions($objeto[0]['dono']);

if($pass != 1)
	header("Location: ".ROOTPATHURL.MAGIASPATH);	

$tag->body('role="document"');

new Components('menu', $parametros);
$tag->br();
$tag->br();
	$form->_container();
		
		$old_file = $objeto[0]['img'];
		
		if(isset($_REQUEST['action'])):
			$form->_col(12);
				$create_magia = new Magias(ROOTPATH.MAGIASIMGPATH);
				if(empty($_FILES['img']['name'])):
					$_REQUEST['img'] = '';
					$_REQUEST['old_file'] = $old_file;
				else:
					$_REQUEST['img'] = $_FILES['img'];
					$_REQUEST['old_file'] = $old_file;
				endif;
				$create_magia->update_data($_REQUEST, true);
			$form->col_();
		endif;
		
		$form->_col(10);
			$tag->span('class="span_title"');
				$tag->imprime(MAGIAS);
			$tag->span;
		$form->col_();
		$form->_col(1);
			$tag->a('href="'.ROOTPATHURL.MAGIASPATH.'view.php?id='.$_GET['id'].'" class="btn btn-success"');
				$tag->imprime(VER);
			$tag->a;
		$form->col_();
		$form->_col(1);
			$tag->a('href="'.ROOTPATHURL.MAGIASPATH.'" class="btn btn-info"');
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
				
				helper_form_input("Imagem", ['name' => 'img', 'type' => 'file', 'class'=>'form-control']);

				helper_form_input("Nome", ['name' => 'nome', 'type' => 'text', 'class'=>'form-control', 'required'=>'true', 'value'=> $objeto[0]['nome']]);

				helper_form_input("Lv (Círculo)", ['name' => 'circulo', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['circulo']]);

				helper_form_input("classe", ['name' => 'classe', 'type' => 'text', 'class'=>'form-control', 'required'=>'true', 'value'=> $objeto[0]['classe']]);

				helper_form_select_options("Sistema de Jogo",['class'=>'form-control', 'name'=>'sistema'], ['value'=> $objeto[0]['sistema'],'ded'=>'Dungeons and Dragons', '3det'=>'3D&T', 'deamon'=>'Deamon']);

				helper_form_input("Componente", ['name' => 'componente', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['componente']]);

				helper_form_input("Tempo de execução", ['name' => 'tempo_execucao', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['tempo_execucao']]);

				helper_form_input("Alcance", ['name' => 'alcance', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['alcance']]);

				helper_form_input("Área", ['name' => 'area', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['area']]);

				helper_form_input("Dano", ['name' => 'dano', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['dano']]);

				helper_form_input("Alvo", ['name' => 'alvo', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['alvo']]);

				helper_form_input("Duração", ['name' => 'duracao', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['duracao']]);

				helper_form_input("Teste de resistência", ['name' => 'teste_resistencia', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['teste_resistencia']]);

				helper_form_input("Resistência a magia", ['name' => 'resistencia_magia', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['resistencia_magia']]);

				helper_form_text_area("Descrição", ['name' => 'descricao', 'class'=>'form-control', 'rows'=>'5'], strip_tags($objeto[0]['descricao']));

				helper_form_button_update_and_back(ROOTPATHURL.MAGIASPATH);
				
			$form->form_();
			
		$form->_container();
	$form->row_();
	$tag->div;
require_once '../../../footer.php';