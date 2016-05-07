<?php
require_once '../../../header.php';
require_once '../helper.php';

if(empty($_SESSION)):
	help_header(ROOTPATHURL.BESTIARIOPATH);
else:
	global $tag, $form, $s, $parametros;

	$tag->body('role="document"');

	new Components('menu', $parametros);
	$tag->br();
	$tag->br();
		$form->_container();
			if(isset($_REQUEST['action'])):
				$form->_col(12);
					$create_bestiario = new Bestiario();
					$create_bestiario->create($_REQUEST);
				$form->col_();
			endif;
			
			$form->_col(11);
				$tag->span('class="span_title"');
					$tag->imprime(BESTIARIO);
				$tag->span;
			$form->col_();
			$form->_col(1);
				$tag->a('href="'.ROOTPATHURL.BESTIARIOPATH.'" class="btn btn-info"');
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
				
					$current_user = $s->get_session('nome');
					$classificacao = [
					'mediocre'	=>'medíocre',
					'fraco'		=>'Fraco', 
					'medio'		=>'Médio', 
					'forte'		=>'Forte', 
					'incrivel' 	=>'Incrível',
					'descomunal'=>'Descomunal',
					'eíco'		=>'Épico', 
					'divino'	=>'Divino',
					'cosmico' 	=>'cósmico'];

					$form->input(['name' => 'dono', 'type' => 'hidden', 'value'=> $current_user]);
				
					helper_form_input(NOME, ['name' => 'nome', 'type' => 'text', 'class'=>'form-control', 'required'=>'true'], 3);
	
					helper_form_input(PALAVRACHAVE, ['name' => 'palavras_chave', 'type' => 'text', 'class'=>'form-control', 'required'=>'true'], 6);
				
					helper_form_select_options(CLASSIFICACAO, ['class'=>'form-control', 'name'=>'classificacao'], $classificacao, 3);
					
					helper_form_text_area(CONTO, ['name' => 'descricao', 'class'=>'form-control', 'rows'=>'5']);	
					
					helper_form_button_submit_and_back(ROOTPATHURL.BESTIARIOPATH);
				$form->form_();
				
			$form->_container();
		$form->row_();
	$tag->div;
	require_once '../../../footer.php';
endif;