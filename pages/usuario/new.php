<?php

require_once '../../header.php';
require_once '../helper.php';


new Components('menu', $parametros);
$form = new Form();

if(isset($_REQUEST['action'])):
	$create_user = new Usuarios();
	$form->_row();
		$form->_container();
			$create_user->create($_REQUEST);
		$form->container_();
	$form->row_();
endif;

$form->_row();
	$form->_container();		
		$form->_form(['method'=>'post', 'name'=>'new-user', 'class'=>'form-group', 'data-toggle'=>'validator']);
		
			helper_form_input("Nome", ['name' => 'nome', 'type' => 'text', 'class'=>'form-control', 'required'=>'true']);
			
			helper_form_input("Nick", ['name' => 'login', 'type' => 'text', 'class'=>'form-control', 'required'=>'true']);
				
			helper_form_input("Email", ['name' => 'email', 'type' => 'email', 'id'=>'inputEmail', 'class'=>'form-control', 'data-error'=>'Este email não é válido!', 'required'=>'true']);
			
			helper_form_input("Senha", ['name' => 'senha', 'id'=>'senha', 'type' => 'password', 'class'=>'form-control', 'required'=>'true']);
			
			helper_form_input("Confirmar Senha", ['name' => 'confirma', 'id'=>'senha_confirmar', 'type' => 'password', 'class'=>'form-control', 'required'=>'true']);
			
			helper_form_button_submit_and_back(ROOTPATHURL);
		
		$form->form_();
		
	$form->_container();
$form->row_();

require_once '../../footer.php';
