<?php
require_once '../../../header.php';
require_once '../helper.php';

global $tag, $form, $s, $parametros;

$s->restricted_access();

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
		$tag->br();
		$tag->hr();
	$form->container_();
	
	$form->_row();
		$form->_container();	
			$form->_form(['method'=>'post', 'name'=>'new-user', 'enctype'=>'multipart/form-data', 'class'=>'form-group', 'data-toggle'=>'validator']);
			
				$form->input(['name' => 'dono', 'type' => 'hidden', 'value'=> $objeto[0]['dono']]);
				helper_adm_label($objeto);
				
				$form->_col(4);
					$form->label("Imagem");
					$form->input(['name' => 'img', 'type' => 'file', 'class'=>'form-control']);
				$form->col_();
				
				$form->_col(4);
					$form->label("Nome");
					$form->input(['name' => 'nome', 'type' => 'text', 'class'=>'form-control', 'required'=>'true', 'value'=> $objeto[0]['nome']]);
				$form->col_();

				$form->_col(4);
					$form->label("Level (Círculo)");
					$form->input(['name' => 'lv', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['lv']]);
				$form->col_();
				
				$form->_col(4);
					$form->label("Classe");
					$form->input(['name' => 'classe', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['classe']]);
				$form->col_();
				
				$form->_col(4);
					$form->label("Sistema de Jogo");
					$form->select(['class'=>'form-control', 'name'=>'sistema'], ['value'=> $objeto[0]['sistema'],'ded'=>'Dungeons and Dragons', '3det'=>'3D&T', 'deamon'=>'Deamon']);
				$form->col_();
				
				$form->_col(4);
					$form->label("Componente");
					$form->input(['name' => 'componente', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['componente']]);
				$form->col_();
				
				$form->_col(4);
					$form->label("Tempo de execução");
					$form->input(['name' => 'tempo_execucao', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['tempo_execucao']]);
				$form->col_();
				
				$form->_col(4);
					$form->label("Alcance");
					$form->input(['name' => 'alcance', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['alcance']]);
				$form->col_();
				
				$form->_col(4);
					$form->label("Área");
					$form->input(['name' => 'area', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['area']]);
				$form->col_();
				
				$form->_col(4);
					$form->label("Dano");
					$form->input(['name' => 'dano', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['dano']]);
				$form->col_();
				
				$form->_col(4);
					$form->label("Alvo");
					$form->input(['name' => 'alvo', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['alvo']]);
				$form->col_();
				
				$form->_col(4);
					$form->label("Duração");
					$form->input(['name' => 'duracao', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['duracao']]);
				$form->col_();
				
				$form->_col(4);
					$form->label("Teste de resistência");
					$form->input(['name' => 'teste_resistencia', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['teste_resistencia']]);
				$form->col_();
				
				$form->_col(4);
					$form->label("Resistência a magia");
					$form->input(['name' => 'resistencia_magia', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['resistencia_magia']]);
				$form->col_();
				
				$form->_col(12);
					$form->label("Descrição");
					$form->area(['name' => 'descricao', 'class'=>'form-control', 'rows'=>'5'], strip_tags($objeto[0]['descricao']));
				$form->col_();
				
				$form->_col(4);
					$form->br();
					$form->link_button("Voltar", ROOTPATHURL.MAGIASPATH);
					echo "  ";
					$form->input_submit(['class'=>'btn btn-default', 'type'=>'submit', 'name'=>'action', 'value'=>'Atualizar']);
				$form->col_();
			$form->form_();
			
		$form->_container();
	$form->row_();

require_once '../../../footer.php';