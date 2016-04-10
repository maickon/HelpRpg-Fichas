<?php

require_once '../../header.php';
require_once '../helper.php';


new Components('menu', $parametros);
$form = new Form();

if(isset($_REQUEST['action'])):
	$create_user = new Usuarios();
	$tag->br();
	$form->_container();
		$form->_col(12);
			$create_user->create($_REQUEST);
		$form->col_();
	$form->container_();
endif;

$tag->link('href="'.CSSPATH.'index.css" rel="stylesheet"');

$form->_row();
	$form->_container();
		$form->_col(4);
		
		$form->col_();	

		$form->_col(4);
			$form->_col(12);
				$tag->h1('class="helper_txt"');
					$tag->imprime(CADASTRO_USER_MSG);
				$tag->h1;
			$form->col_();
			
			$form->_col(12);
				helper_adsense_responsivo_02();
			$form->col_();
			
			$form->_form(['method'=>'post', 'id'=>'form_user', 'name'=>'new-user', 'class'=>'form-group', 'data-toggle'=>'validator']);
				
				helper_form_input(NOME, ['id' => 'nome','name' => 'nome', 'type' => 'text', 'class'=>'form-control'], 12);
				
				helper_form_input(NICK, ['id' => 'login','name' => 'login', 'type' => 'text', 'class'=>'form-control'], 12);
					
				helper_form_input(EMAIL, ['id' => 'email','name' => 'email', 'type' => 'email', 'id'=>'inputEmail', 'class'=>'form-control', 'data-error'=>'Este email não é válido!'], 12);
				
				helper_form_input(SENHA, ['id' => 'senha','name' => 'senha', 'id'=>'senha', 'type' => 'password', 'class'=>'form-control'], 12);
				
				helper_form_input(CONFIRMA, ['id' => 'confirma','name' => 'confirma', 'id'=>'senha_confirmar', 'type' => 'password', 'class'=>'form-control'], 12);
				
				helper_form_button_submit_and_back(ROOTPATHURL, 12);
			
			$form->form_();

		$form->col_();	

	$form->_container();
$form->row_();
$tag->div;

$tag->script('src="js/index.js"'); $tag->script;
require_once '../../footer.php';
