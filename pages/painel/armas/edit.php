<?php
require_once '../../../header.php';
require_once '../helper.php';

global $tag, $form, $s, $parametros;

$s->restricted_access();

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
					$form->input(['name' => 'img', 'type' => 'file', 'class'=>'form-control', 'value'=> $objeto[0]['img']]);
				$form->col_();
					
				$form->_col(4);
					$form->label("Nome");
					$form->input(['name' => 'nome', 'type' => 'text', 'class'=>'form-control', 'required'=>'true', 'value'=> $objeto[0]['nome']]);
				$form->col_();

				$form->_col(4);
					$form->label("Level indicado");
					$form->input(['name' => 'lv', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['lv']]);
				$form->col_();
				
				$form->_col(4);
					$form->label("Dano");
					$form->input(['name' => 'dano', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['dano']]);
				$form->col_();
				
				$form->_col(4);
					$form->label("Preço/Custo");
					$form->input(['name' => 'preco', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['preco']]);
				$form->col_();
				
				$form->_col(4);
					$form->label("Decisivo");
					$form->input(['name' => 'decisivo', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['decisivo']]);
				$form->col_();
				
				$form->_col(4);
					$form->label("Distância");
					$form->input(['name' => 'distancia', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['distancia']]);
				$form->col_();
				
				$form->_col(4);
					$form->label("Peso");
					$form->input(['name' => 'peso', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['peso']]);
				$form->col_();
				
				$form->_col(4);
					$form->label("Tipo");
					$form->select(['class'=>'form-control', 'name'=>'tipo'], ['value'=> $objeto[0]['tipo'], 'atq_distancia'=>'Armas de Ataque à Distância', 'leve'=>'Armas Leves - Corpo a Corpo', 'uma_mao'=>'Armas de Uma Mão - Corpo a Corpo', 'duas_maos'=>'Armas de Duas Mãos - Corpo a Corpo']);
				$form->col_();
				
				$form->_col(4);
					$form->label("Iniciativa");
					$form->input(['name' => 'iniciativa', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['iniciativa']]);
				$form->col_();
				
				$form->_col(4);
					$form->label("Pente");
					$form->input(['name' => 'pente', 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0]['pente']]);
				$form->col_();
				
				$form->_col(4);
					$form->label("Sistema de Jogo");
					$form->select(['class'=>'form-control', 'name'=>'sistema'], ['value'=> $objeto[0]['sistema'],'ded'=>'Dungeons and Dragons', '3det'=>'3D&T', 'deamon'=>'Deamon']);
				$form->col_();
				
				$form->_col(4);
					$form->label("Categoria");
					$form->select(['class'=>'form-control', 'name'=>'categoria'], ['value'=> $objeto[0]['categoria'], 'comum'=>'Arma Comum', 'exotica'=>'Arma Exótica', 'simples'=>'Arma Simples', 'tecnologica'=>'Arma Tecnológica']);
				$form->col_();
				
				$form->_col(12);
					$form->label("Descrição");
					$form->area(['name' => 'descricao', 'class'=>'form-control', 'rows'=>'5'], strip_tags($objeto[0]['descricao']));
				$form->col_();
				
				$form->_col(4);
					$form->br();
					$form->link_button("Voltar", ROOTPATHURL.ARMASPATH);
					echo "  ";
					$form->input_submit(['class'=>'btn btn-default', 'type'=>'submit', 'name'=>'action', 'value'=>'Atualizar']);
				$form->col_();
			$form->form_();
			
		$form->_container();
	$form->row_();

require_once '../../../footer.php';