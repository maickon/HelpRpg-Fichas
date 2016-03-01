<?php
require_once '../../init.php';
require_once '../helper.php';
require_once 'menu.php';

global $tag, $form;



$tag->html('lang="pt-br"');
	$tag->head();
	
		$tag->meta('http-equiv="Content-Type" content="text/html;charset=utf-8"');
		$tag->meta('http-equiv="X-UA-Compatible" content="IE=edge"');
		$tag->meta('name="viewport" content="width=device-width, initial-scale=1"');
		//<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		$tag->meta('name="description" content="Help rpg - O maior repositório de fichas de RPG do Brasil."');
		$tag->meta('name="author" content="Maickon Rangel"');
		$tag->imprime('<link rel="shortcut icon" href="'.ROOTPATHURL.IMGPATH.'logo-icon.png" />');
		$tag->link('rel="icon" href="'.IMGPATH.'adm.png"');
		

		//Titulo do site
		$tag->title();
			$tag->imprime(PROJECTTITLE);
		$tag->title;
		
		$tag->link('href="'.SEARCHPATH.CSSPATH.'index.css" rel="stylesheet"');
		//<!-- index core CSS -->
		$tag->link('href="'.ROOTPATHURL.CSSPATH.'index.css" rel="stylesheet"');
		
		//<!-- Bootstrap core CSS -->
		$tag->link('href="'.ROOTPATHURL.CSSPATH.'bootstrap.min.css" rel="stylesheet"');
		
		//<!-- jquery CSS -->
		$tag->link('href="'.SEARCHPATH.CSSPATH.'jquery-ui.css" rel="stylesheet"');

		$tag->script('src="'.ROOTPATHURL.JSPATH.'jquery.min.js"');
		$tag->script;

	$tag->head;
$tag->body();
	
	$tag->form('action="search.php" method="post"');
		$tag->div('class="container search_box" id="search_box"');	
			$form->_row();
				$form->_col(2);
				$form->col_();
				
				$form->_col(8);	
					$tag->div('class="logo"');
						$tag->img('src="'.ROOTPATHURL.IMGPATH.'logo.png" class="logo"');
					$tag->div;
					$tag->div('class="ui-widget"');
						$form->input(['type'=>'text', 'name'=>'search', 'id'=>'search' ,'class'=>'form-control input-lg', 'aria-describedby'=>'basic-addon1','placeholder'=>'Busque: classe, raça, nome, dono da ficha, ficha tipo, sistema de rpg ou Lv']);	
					$tag->div;
				$form->col_();	
			$form->row_();
		$form->container_();
	$tag->form;
	
	require 'footer.php';

	$tag->script('src="'.SEARCHPATH.JSPATH.'jquery-ui.js"');
	$tag->script;

	$tag->script('src="'.SEARCHPATH.JSPATH.'index.js"'); 
	$tag->script;
$tag->body;