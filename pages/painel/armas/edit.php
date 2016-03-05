<?php
require_once '../../../header.php';
require_once '../helper.php';

global $tag, $form, $parametros;

$show_arma = new Armas(ROOTPATH.ARMASIMGPATH);
$objeto = $show_arma->select($show_arma->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);


$pass = helper_check_permitions($objeto[0]['dono']);

if($pass != 1)
	header("Location: ".ROOTPATHURL.ARMASPATH);	

$tag->body('role="document"');

new Components('menu', $parametros);
$tag->br();
$tag->br();
	$form->_container();
		
		$old_file = $objeto[0]['img'];
		
		if(isset($_REQUEST['action'])):
			$form->_col(12);
				$create_arma = new Armas(ROOTPATH.ARMASIMGPATH);
				if(empty($_FILES['img']['name'])):
					$_REQUEST['img'] = '';
					$_REQUEST['old_file'] = $old_file;
				else:
					$_REQUEST['img'] = $_FILES['img'];
					$_REQUEST['old_file'] = $old_file;
				endif;
			
				$create_arma->update_data($_REQUEST);
			$form->col_();
		endif;
		
		$form->_col(10);
			$tag->span('class="span_title"');
				$tag->imprime(ARMAS);
			$tag->span;
		$form->col_();
		$form->_col(1);
			$tag->a('href="'.ROOTPATHURL.ARMASPATH.'view.php?id='.$_GET['id'].'" class="btn btn-success"');
				$tag->imprime(VER);
			$tag->a;
		$form->col_();
		$form->_col(1);
			$tag->a('href="'.ROOTPATHURL.ARMASPATH.'" class="btn btn-info"');
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
				
				helper_form_input("Imagem", ['name' => 'img', 'type' => 'file', 'class'=>'form-control', 'value'=> $objeto[0]['img']]);

				helper_form_input("Nome", ['name' => 'nome', 'type' => 'text', 'class'=>'form-control', 'required'=>'true', 'value'=> $objeto[0]['nome']]);

				helper_form_input("Level indicado", ['name' => 'lv', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['lv']]);

				helper_form_input("Dano", ['name' => 'dano', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['dano']]);

				helper_form_input("Preço/Custo", ['name' => 'preco', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['preco']]);

				helper_form_input("Decisivo", ['name' => 'decisivo', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['decisivo']]);

				helper_form_input("Distância", ['name' => 'distancia', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['distancia']]);

				helper_form_input("Peso", ['name' => 'peso', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['peso']]);

				helper_form_select_options("Tipo", ['class'=>'form-control', 'name'=>'tipo'], ['value'=> $objeto[0]['tipo'], 'atq_distancia'=>'Armas de Ataque à Distância', 'leve'=>'Armas Leves - Corpo a Corpo', 'uma_mao'=>'Armas de Uma Mão - Corpo a Corpo', 'duas_maos'=>'Armas de Duas Mãos - Corpo a Corpo']);

				helper_form_input("Iniciativa", ['name' => 'iniciativa', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['iniciativa']]);
		
				helper_form_input("Pente", ['name' => 'pente', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['pente']]);

				helper_form_select_options("Sistema de Jogo", ['class'=>'form-control', 'name'=>'sistema'], ['value'=> $objeto[0]['sistema'],'ded'=>'Dungeons and Dragons', '3det'=>'3D&T', 'deamon'=>'Deamon']);

				helper_form_select_options("Categoria", ['class'=>'form-control', 'name'=>'categoria'], ['value'=> $objeto[0]['categoria'], 'comum'=>'Arma Comum', 'exotica'=>'Arma Exótica', 'simples'=>'Arma Simples', 'tecnologica'=>'Arma Tecnológica']);
				
				helper_form_text_area("Descrição", ['name' => 'descricao', 'class'=>'form-control', 'rows'=>'5'], strip_tags($objeto[0]['descricao']));

				helper_form_button_update_and_back(ROOTPATHURL.ARMASPATH);
				
			$form->form_();
			
		$form->_container();
	$form->row_();
	$tag->div;
require_once '../../../footer.php';