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
			$update_user->delete_data($user[0]['id']);
		$form->container_();
	$form->row_();
endif;

$tag->br();

$form->_row();
	$form->_container();
		$form->_col(12);
			$tag->span('class="span_title"');
				$tag->imprime("Cancelar sua conta");
			$tag->span;
			$tag->hr();
			$tag->imprime("Após cancelar a sua conta todos os seus cadastros ainda serão mantidos no Help Rpg Fichas.");
			$tag->br();
			$tag->br();
		$form->col_();
	$form->container_();
$form->row_();



$form->_row();
	$form->_container();		
		$form->_form(['method'=>'post', 'name'=>'new-user', 'class'=>'form-group', 'data-toggle'=>'validator']);
		
			helper_form_input("Nome", ['name' => 'nome', 'type' => 'text', 'class'=>'form-control', 'required'=>'true', 'value'=> $user[0]['nome'], 'readonly'=>'']);
			
			helper_form_input("Login", ['name' => 'login', 'type' => 'text', 'class'=>'form-control', 'required'=>'true', 'value'=> $user[0]['login'], 'readonly'=>'']);
				
			helper_form_input("Email", ['name' => 'email', 'type' => 'email', 'id'=>'inputEmail', 'class'=>'form-control', 'data-error'=>'Este email não é válido!', 'required'=>'true', 'value'=> $user[0]['email'], 'readonly'=>'']);
			
			$form->_col(4);
				$form->br();
				$form->link_button("Voltar", ROOTPATHURL);
				echo "  ";
				$form->input_submit(['class'=>'btn btn-default', 'type'=>'submit', 'name'=>'action', 'value'=>'Desejo deletar a minha conta.']);
			$form->col_();
		
		$form->form_();
		
	$form->_container();
$form->row_();

require_once '../../footer.php';
