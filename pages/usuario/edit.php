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

$tag->link('href="'.CSSPATH.'index.css" rel="stylesheet"');
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
		$form->_form(['method'=>'post', 'name'=>'new-user', 'id'=>'form_user_edit', 'class'=>'form-group', 'data-toggle'=>'validator'], 12);
			$form->_col(4);	
				helper_form_input(NOME, ['name' => 'nome', 'id' => 'nome', 'type' => 'text', 'class'=>'form-control', 'value'=> $user[0]['nome']], 12);
				
				helper_form_input(NICK, ['name' => 'login', 'id' => 'login', 'type' => 'text', 'class'=>'form-control', 'value'=> $user[0]['login']], 12);
					
				helper_form_input(EMAIL, ['name' => 'email', 'id' => 'email', 'type' => 'email', 'class'=>'form-control', 'value'=> $user[0]['email']], 12);
				
				helper_form_input(SENHA, ['name' => 'senha', 'id'=>'senha', 'type' => 'password', 'class'=>'form-control'], 12);
				
				helper_form_input(CONFIRMA, ['name' => 'confirma', 'id'=>'confirma', 'type' => 'password', 'class'=>'form-control'], 12);
			$form->col_();

			$form->_col(4);
				helper_form_input('Facebook Link', ['name' => 'facebook_link', 'id' => 'facebook_link', 'type' => 'text', 'class'=>'form-control', 'value'=> $user[0]['facebook_link']], 12);

				helper_form_input('Twitter Link', ['name' => 'twitter_link', 'id' => 'twitte_link', 'type' => 'text', 'class'=>'form-control', 'value'=> $user[0]['twitter_link']], 12);

				helper_form_input('G+ Link', ['name' => 'gplus_link', 'id' => 'gplus_link', 'type' => 'text', 'class'=>'form-control', 'value'=> $user[0]['gplus_link']], 12);

				helper_form_input('Fanpage', ['name' => 'pagina_social', 'id' => 'pagina_social', 'type' => 'text', 'class'=>'form-control', 'value'=> $user[0]['pagina_social']], 12);

				helper_form_input('Site Próprio', ['name' => 'site_pessoal', 'id' => 'site_pessoal', 'type' => 'text', 'class'=>'form-control', 'value'=> $user[0]['site_pessoal']], 12);
			$form->col_();

			$form->_col(4);
				helper_form_text_area("Descrição breve sobre você", ['name' => 'descricao', 'class'=>'form-control', 'ckeditor'=>'off', 'rows'=>'15'], strip_tags($user[0]['descricao']));
			$form->col_();

			$form->_col(12);	
				helper_form_button_update_and_back(ROOTPATHURL, 12);
			$form->col_();

		$form->form_();
	$form->_container();
$form->row_();
$tag->div;

$tag->script('src="js/index.js"'); $tag->script;
require_once '../../footer.php';
