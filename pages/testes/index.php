<?php
require_once '../../init.php';
require_once '../helper.php';

global $tag, $form;

$nomes = array('Home','Cadastro','Sobre','Rola dados','Gerador de NPCs','Gerador de Monstros','Como Usar');
$links = array(ROOTPATHURL.BASE_PATH, ROOTPATHURL.USERNEWPATH, ROOTPATHURL.ABOUTPATH, ROLLDICE, NPCGENERATEPATH, MONSTERGENERATEPATH, ROOTPATHURL.HOWTOUSE);


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
		
		//<!-- datatable css -->
		$tag->link('href="'.ROOTPATHURL.CSSPATH.'datatables.min.css" rel="stylesheet"');
		
		//<!-- Bootstrap core CSS -->
		$tag->link('href="'.ROOTPATHURL.CSSPATH.'bootstrap.min.css" rel="stylesheet"');
  		
		//<!-- index core CSS -->
		$tag->link('href="'.ROOTPATHURL.CSSPATH.'index.css" rel="stylesheet"');
		
		//<!-- selec core CSS -->
		$tag->link('href="'.ROOTPATHURL.CSSPATH.'bootstrap-select.css" rel="stylesheet"');
		
		$tag->script('src="'.ROOTPATHURL.JSPATH.'jquery.min.js"');
		$tag->script;
		
		$tag->script('src="'.ROOTPATHURL.JSPATH.'datatables.min.js"');
		$tag->script;
		
		$tag->script('src="'.ROOTPATHURL.JSPATH.'bootstrap-select.js"');
		$tag->script;
		
		$tag->script('src="'.ROOTPATHURL.JSPATH.'bibliotecaAjax.js"');
		$tag->script;

		$tag->script('src="'.ROOTPATHURL.JSPATH.'teste.js"');
		$tag->script;
	$tag->head;
$tag->body();
	
	$tag->form('action="javascript:void%200" onSubmit="buscar_classe(this.search.value); return false" ');
		$tag->div('class="container search_box" id="search_box"');	
			$form->_row();
				$form->_col(3);
				$form->col_();
				
				$form->_col(6);	
					$tag->div('class="logo"');
						$tag->img('src="'.ROOTPATHURL.IMGPATH.'logo.png" class="logo"');
					$tag->div;
					$form->input(['type'=>'text', 'id'=>'search' ,'class'=>'form-control input-lg', 'aria-describedby'=>'basic-addon1','placeholder'=>'Digite sua busca. Ex: Espada Larga']);	
				$form->col_();	
			$form->row_();
		$form->container_();
	$tag->form;
	
	$tag->div('class="container" id="box-result"');
		$form->_row();
			$form->_col(6);
				$tag->form('action="javascript:void%200" onSubmit="buscar_classe_form_search(this.search.value); return false" ');
					$form->h2("Nova busca...");
					$form->input(['type'=>'text', 'id'=>'search' ,'class'=>'form-control input-lg', 'aria-describedby'=>'basic-addon1','placeholder'=>'Digite sua busca. Ex: Espada Larga']);
				$tag->form;
			$form->col_();
			
			$form->_col(6);
				$form->h2("Publicidade");
				$tag->div('class="propaganda"');
				
				$tag->div;
			$form->col_();
			
			$form->_col(12);
				$form->h3("Resultado...");
			$form->col_();

			$form->_col(12);
				$tag->span('id="classe_personagem"');
				$tag->span;
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="container"');
		$tag->div('class="rodape-search-page"');
			helper_footer_bar_page_search($links, $nomes);
		$tag->div;
		$tag->div('class="copy"');
			$tag->imprime("Desenvolvimento Equipe Help RPG - Todos os direitos reservados");
			$tag->br();
			$tag->imprime("2013-2015");
		$tag->div;
	$tag->div;
$tag->body;