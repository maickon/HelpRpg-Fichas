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
				
				helper_form_input("Imagem", ['name' => 'img', 'type' => 'file', 'class'=>'form-control', 'value'=> $armadura[0]['img']]);
				
				helper_form_input("Nome", ['name' => 'nome', 'type' => 'text', 'class'=>'form-control', 'required'=>'true', 'value'=> $armadura[0]['nome']]);
				
				helper_form_input("Lv", ['name' => 'lv', 'type' => 'text', 'class'=>'form-control', 'required'=>'true', 'value'=> $armadura[0]['lv']]);

				helper_form_input("Preço/Custo", ['name' => 'custo', 'type' => 'text', 'class'=>'form-control', 'value'=> $armadura[0]['custo']]);			
			
				helper_form_input("Bônus na CA/Defesa", ['name' => 'bonusNaCa', 'type' => 'text', 'class'=>'form-control', 'value'=> $armadura[0]['bonusNaCa']]);

				helper_form_input("Destreza máxima", ['name' => 'destrezaMaxima', 'type' => 'text', 'class'=>'form-control', 'value'=> $armadura[0]['destrezaMaxima']]);

				helper_form_input("Penalidade em perícia", ['name' => 'penalidadeNaPericia', 'type' => 'text', 'class'=>'form-control', 'value'=> $armadura[0]['penalidadeNaPericia']]);

				helper_form_input("Falha de magia arcana", ['name' => 'falhaDeMagiaArcana', 'type' => 'text', 'class'=>'form-control', 'value'=> $armadura[0]['falhaDeMagiaArcana']]);

				helper_form_input("Deslocamento médio", ['name' => 'deslocamentoMedio', 'type' => 'text', 'class'=>'form-control', 'value'=> $armadura[0]['deslocamentoMedio']]);

				helper_form_input("Deslocamento pequeno", ['name' => 'deslocamentoPequeno', 'type' => 'text', 'class'=>'form-control', 'value'=> $armadura[0]['deslocamentoPequeno']]);

				helper_form_input("Peso", ['name' => 'peso', 'type' => 'text', 'class'=>'form-control', 'value'=> $armadura[0]['peso']]);

				helper_form_select_options("Tipo", ['class'=>'form-control', 'name'=>'tipo'], ['value'=> $armadura[0]['tipo'], 'simples'=>'Armadura simples', 'magica'=>'Armadura mágica']);
				
				helper_form_select_options("Sistema de Jogo", ["name" => "sistema", "id" => "sistema", "class" => "selectpicker form-control", "data-live-search" => "true"], array_merge(array('value'=> $armadura[0]['sistema']), $rpg_sistemas));

				helper_form_select_options("Categoria", ['class'=>'form-control', 'name'=>'categoria'], ['value'=> $armadura[0]['categoria'], 'leve'=>'Armadura leve', 'media'=>'Armadura Média', 'pesada'=>'Armadura Pesada', 'exotica'=>'Armadura Exótica', 'tecnologica'=>'Armadura Tecnológica']);				
				
				helper_form_text_area("Descrição", ['name' => 'descricao', 'class'=>'form-control', 'rows'=>'5'], strip_tags($armadura[0]['descricao']) );
				
				helper_form_button_update_and_back(ROOTPATHURL.ARMADURASPATH);
				
			$form->form_();
			
		$form->_container();
	$form->row_();

require_once '../../../footer.php';