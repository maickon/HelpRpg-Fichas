<?php
require_once '../../../header.php';
require_once '../helper.php';

global $tag, $form, $s, $parametros;

$s->restricted_access();

$objeto = new Armaduras(ROOTPATH.ARMADURASIMGPATH);
$armadura = $objeto->select($objeto->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);


$pass = helper_check_permitions($armadura[0]['dono']);
if(!$pass)
	header("Location: ".ROOTPATHURL.ARMADURASPATH);	

$tag->body('role="document"');

new Components('menu', $parametros);
$tag->br();
$tag->br();
	$form->_container();
		
		$old_file = $armadura[0]['img'];
		
		if(isset($_REQUEST['action'])):
			$form->_col(12);
				$create_armadura = new Armaduras(ROOTPATH.ARMADURASIMGPATH);
				if(empty($_FILES['img']['name'])):
					$_REQUEST['img'] = '';
					$_REQUEST['old_file'] = $old_file;
				else:
					$_REQUEST['img'] = $_FILES['img'];
					$_REQUEST['old_file'] = $old_file;
				endif;
				$create_armadura->update_data($_REQUEST);
			$form->col_();
		endif;
		
		$form->_col(10);
			$tag->span('class="span_title"');
				$tag->imprime(ARMADURAS);
			$tag->span;
		$form->col_();
		$form->_col(1);
			$tag->a('href="'.ROOTPATHURL.ARMADURASPATH.'view.php?id='.$_GET['id'].'" class="btn btn-success"');
				$tag->imprime(VER);
			$tag->a;
		$form->col_();
		$form->_col(1);
			$tag->a('href="'.ROOTPATHURL.ARMADURASPATH.'" class="btn btn-info"');
				$tag->imprime(BACK);
			$tag->a;
		$form->col_();
		$tag->br();
		$tag->hr();
	$form->container_();
	
	$form->_row();
		$form->_container();	
			$form->_form(['method'=>'post', 'name'=>'new-user', 'enctype'=>'multipart/form-data', 'class'=>'form-group', 'data-toggle'=>'validator']);
			
				$form->input(['name' => 'dono', 'type' => 'hidden', 'value'=> $armadura[0]['dono']]);
				helper_adm_label($armadura);
				
				$form->_col(4);
					$form->label("Imagem");
					$form->input(['name' => 'img', 'type' => 'file', 'class'=>'form-control', 'value'=> $armadura[0]['img']]);
				$form->col_();
					
				$form->_col(4);
					$form->label("Nome");
					$form->input(['name' => 'nome', 'type' => 'text', 'class'=>'form-control', 'required'=>'true', 'value'=> $armadura[0]['nome']]);
				$form->col_();
				
				$form->_col(4);
					$form->label("Preço/Custo");
					$form->input(['name' => 'custo', 'type' => 'text', 'class'=>'form-control', 'value'=> $armadura[0]['custo']]);
				$form->col_();
				
				$form->_col(4);
					$form->label("Bônus na CA/Defesa");
					$form->input(['name' => 'bonusNaCa', 'type' => 'text', 'class'=>'form-control', 'value'=> $armadura[0]['bonusNaCa']]);
				$form->col_();
				
				$form->_col(4);
					$form->label("Destreza máxima");
					$form->input(['name' => 'destrezaMaxima', 'type' => 'text', 'class'=>'form-control', 'value'=> $armadura[0]['destrezaMaxima']]);
				$form->col_();
				
				$form->_col(4);
					$form->label("Penalidade perícia");
					$form->input(['name' => 'penalidadeNaPericia', 'type' => 'text', 'class'=>'form-control', 'value'=> $armadura[0]['penalidadeNaPericia']]);
				$form->col_();
				
				$form->_col(4);
					$form->label("Falha de magia arcana");
					$form->input(['name' => 'falhaDeMagiaArcana', 'type' => 'text', 'class'=>'form-control', 'value'=> $armadura[0]['falhaDeMagiaArcana']]);
				$form->col_();
				
				$form->_col(4);
					$form->label("Deslocamento médio");
					$form->input(['name' => 'deslocamentoMedio', 'type' => 'text', 'class'=>'form-control', 'value'=> $armadura[0]['deslocamentoMedio']]);
				$form->col_();
				
				$form->_col(4);
					$form->label("Deslocamento pequeno");
					$form->input(['name' => 'deslocamentoPequeno', 'type' => 'text', 'class'=>'form-control', 'value'=> $armadura[0]['deslocamentoPequeno']]);
				$form->col_();
				
				$form->_col(4);
					$form->label("Peso");
					$form->input(['name' => 'peso', 'type' => 'text', 'class'=>'form-control', 'value'=> $armadura[0]['peso']]);
				$form->col_();
				
				$form->_col(4);
					$form->label("Tipo");
					$form->select(['class'=>'form-control', 'name'=>'tipo'], ['value'=> $armadura[0]['tipo'], 'simples'=>'Armadura simples', 'magica'=>'Armadura mágica']);
				$form->col_();
				
				$form->_col(4);
					$form->label("Sistema de Jogo");
					$form->select(['class'=>'form-control', 'name'=>'sistema'], ['value'=> $armadura[0]['sistema'],'ded'=>'Dungeons and Dragons', '3det'=>'3D&T', 'deamon'=>'Deamon']);
				$form->col_();
				
				$form->_col(4);
					$form->label("Categoria");
					$form->select(['class'=>'form-control', 'name'=>'categoria'], ['value'=> $armadura[0]['categoria'], 'comum'=>'Arma Comum', 'exotica'=>'Arma Exótica', 'simples'=>'Arma Simples', 'tecnologica'=>'Arma Tecnológica']);
				$form->col_();
				
				$form->_col(12);
					$form->label("Descrição");
					$form->area(['name' => 'descricao', 'class'=>'form-control', 'rows'=>'5'], strip_tags($armadura[0]['descricao']));
				$form->col_();
				
				$form->_col(4);
					$form->br();
					$form->link_button("Voltar", ROOTPATHURL.ARMADURASPATH);
					echo "  ";
					$form->input_submit(['class'=>'btn btn-default', 'type'=>'submit', 'name'=>'action', 'value'=>'Atualizar']);
				$form->col_();
			$form->form_();
			
		$form->_container();
	$form->row_();

require_once '../../../footer.php';