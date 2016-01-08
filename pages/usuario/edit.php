<?php

require_once '../../header.php';
require_once '../helper.php';

new Components('menu', $parametros);
$form = new Form();
$tag->br();

$get_user = new Usuarios();
$nome = $s->get_session('login');
$user = $get_user->select('usuarios', null, [['email','=', $nome ? $nome : ' ']]);

if(isset($_REQUEST['action'])):
	$update_user = new Usuarios();
	$form->_row();
		$form->_container();
			$update_user = new Usuarios();
			$update_user->edit($_REQUEST);
		$form->container_();
	$form->row_();
endif;

$tag->br();

$form->_row();
	$form->_container();
		$form->_col(12);
			$tag->span('class="span_title"');
				$tag->imprime("Editar dados");
			$tag->span;
			$tag->hr();
		$form->col_();
	$form->container_();
$form->row_();



$form->_row();
	$form->_container();		
		$form->_form(['method'=>'post', 'name'=>'new-user', 'class'=>'form-group', 'data-toggle'=>'validator']);
		
			helper_form_input("Nome", ['name' => 'nome', 'type' => 'text', 'class'=>'form-control', 'required'=>'true', 'value'=> $user[0]['nome']]);
			
			helper_form_input("Login", ['name' => 'login', 'type' => 'text', 'class'=>'form-control', 'required'=>'true', 'value'=> $user[0]['login']]);
				
			helper_form_input("Email", ['name' => 'email', 'type' => 'email', 'id'=>'inputEmail', 'class'=>'form-control', 'data-error'=>'Este email não é válido!', 'required'=>'true', 'value'=> $user[0]['email']]);
			
			helper_form_input("Senha", ['name' => 'senha', 'id'=>'senha', 'type' => 'password', 'class'=>'form-control', 'required'=>'true']);
			
			helper_form_input("Confirmar Senha", ['name' => 'confirma', 'id'=>'senha_confirmar', 'type' => 'password', 'class'=>'form-control', 'required'=>'true']);
			
			helper_form_button_update_and_back(ROOTPATHURL);
		
		$form->form_();
		
	$form->_container();
$form->row_();
$tag->div;
require_once '../../footer.php';
