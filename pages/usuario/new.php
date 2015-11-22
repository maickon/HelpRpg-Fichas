<?php

require_once '../../header.php';

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
			$form->_col(4);
				$form->label("Nome");
				$form->input(['name' => 'nome', 'type' => 'text', 'class'=>'form-control', 'required'=>'true']);
			$form->col_();
				
			$form->_col(4);
				$form->label("Login");
				$form->input(['name' => 'login', 'type' => 'text', 'class'=>'form-control', 'required'=>'true']);
			$form->col_();
			
			$form->_col(4);
				$form->label("Email");
				$form->input(['name' => 'email', 'type' => 'email', 'id'=>'inputEmail', 'class'=>'form-control', 'data-error'=>'Este email n�o � v�lido!', 'required'=>'true']);
			$form->col_();
			
			$form->_col(4);
				$form->label("Senha");
				$form->input(['name' => 'senha', 'id'=>'senha', 'type' => 'password', 'class'=>'form-control', 'required'=>'true']);
			$form->col_();
			
			$form->_col(4);
				$form->label("Confirmar Senha");
				$form->input(['name' => 'confirma', 'id'=>'senha_confirmar', 'type' => 'password', 'class'=>'form-control', 'required'=>'true']);
			$form->col_();
			
			$form->_col(4);
				$form->br();
				$form->link_button("Voltar", ROOTPATHURL);
				echo "  ";
				$form->input_submit(['class'=>'btn btn-default', 'type'=>'submit', 'name'=>'action', 'value'=>'Cadastrar']);
			$form->col_();
		$form->form_();
		
	$form->_container();
$form->row_();

require_once '../../footer.php';
