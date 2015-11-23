<?php
require_once '../../../header.php';
require_once '../helper.php';

global $tag, $form, $s, $parametros;
$s->restricted_access();

$tag->body('role="document"');

new Components('menu', $parametros);
$tag->br();
$tag->br();
	$form->_container();
		if(isset($_REQUEST['action'])):
			$form->_col(12);
				$create_armadura = new Armaduras(ROOTPATH.ARMADURASIMGPATH);
				$_REQUEST['img'] =  $_FILES['img'];
				$create_armadura->create($_REQUEST);
			$form->col_();
		endif;
		
		$form->_col(11);
			$tag->span('class="span_title"');
				$tag->imprime(ARMADURAS);
			$tag->span;
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
			
				$current_user = $s->get_session('nome');
				$form->input(['name' => 'dono', 'type' => 'hidden', 'value'=> $current_user]);
				
				helper_form_input("Imagem", ['name' => 'img', 'type' => 'file', 'class'=>'form-control']);
				
				helper_form_input("Nome", ['name' => 'nome', 'type' => 'text', 'class'=>'form-control', 'required'=>'true']);
				
				helper_form_input("Lv", ['name' => 'lv', 'type' => 'text', 'class'=>'form-control', 'required'=>'true']);

				helper_form_input("Preço/Custo", ['name' => 'custo', 'type' => 'text', 'class'=>'form-control']);			
			
				helper_form_input("Bônus na CA/Defesa", ['name' => 'bonusNaCa', 'type' => 'text', 'class'=>'form-control']);

				helper_form_input("Destreza máxima", ['name' => 'destrezaMaxima', 'type' => 'text', 'class'=>'form-control']);

				helper_form_input("Penalidade em perícia", ['name' => 'penalidadeNaPericia', 'type' => 'text', 'class'=>'form-control']);

				helper_form_input("Falha de magia arcana", ['name' => 'falhaDeMagiaArcana', 'type' => 'text', 'class'=>'form-control']);

				helper_form_input("Deslocamento médio", ['name' => 'deslocamentoMedio', 'type' => 'text', 'class'=>'form-control']);

				helper_form_input("Deslocamento pequeno", ['name' => 'deslocamentoPequeno', 'type' => 'text', 'class'=>'form-control']);

				helper_form_input("Peso", ['name' => 'peso', 'type' => 'text', 'class'=>'form-control']);

				helper_form_select_options("Tipo", ['class'=>'form-control', 'name'=>'tipo'], ['simples'=>'Armadura simples', 'magica'=>'Armadura mágica']);

				helper_form_select_options_sistema();

				helper_form_select_options("Categoria", ['class'=>'form-control', 'name'=>'categoria'], ['leve'=>'Armadura leve', 'media'=>'Armadura Média', 'pesada'=>'Armadura Pesada', 'exotica'=>'Armadura Exótica', 'tecnologica'=>'Armadura Tecnológica']);				
				
				helper_form_text_field_descricao();
			
				helper_form_button_submit_and_back(ROOTPATHURL.ARMADURASPATH);
				
			$form->form_();
			
		$form->_container();
	$form->row_();

require_once '../../../footer.php';