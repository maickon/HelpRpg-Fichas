<?php
require_once '../../init.php';
require_once '../helper.php';
require_once 'menu.php';

$gmtDate = gmdate("D, d M Y H:i:s");
header("Expires:{$gmtDate} GMT");
header("Last-Modified:{$gmtDate} GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

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

		//<!-- datatable css -->
		$tag->link('href="'.ROOTPATHURL.CSSPATH.'datatables.min.css" rel="stylesheet"');

		//<!-- Bootstrap core CSS -->
		$tag->link('href="'.ROOTPATHURL.CSSPATH.'bootstrap.min.css" rel="stylesheet"');
			
		//<!-- index core CSS -->
		$tag->link('href="'.ROOTPATHURL.CSSPATH.'index.css" rel="stylesheet"');
		$tag->link('href="'.SEARCHPATH.CSSPATH.'index.css" rel="stylesheet"');
		//<!-- selec core CSS -->
		$tag->link('href="'.ROOTPATHURL.CSSPATH.'bootstrap-select.css" rel="stylesheet"');

		$tag->script('src="'.ROOTPATHURL.JSPATH.'jquery.min.js"');
		$tag->script;


		$tag->script('src="'.ROOTPATHURL.JSPATH.'datatables.min.js"');
		$tag->script;

		$tag->script('src="'.ROOTPATHURL.JSPATH.'jquery.min.js"');
		$tag->script;

		$tag->script('src="'.ROOTPATHURL.JSPATH.'datatables.min.js"');
		$tag->script;

	$tag->head;
	$tag->body();
		if(isset($_POST['search'])):
			$busca = $_POST['search'];
		else:
			$busca = '';
		endif;

		require_once 'filter.php';

	
		$form->_col(12);
				helper_adsense_02();
				$form->_row();
					$form->_col(12);
						$tag->form('action="search.php" method="post"');
							$form->h2("Nova busca geral...");
							$tag->div('class="ui-widget"');
								$form->input(['type'=>'text', 'name'=>'search', 'id'=>'search_result' ,'class'=>'form-control input-lg', 'aria-describedby'=>'basic-addon1','placeholder'=>'Digite sua busca. Ex: Espada Larga']);
							$tag->div;
						$tag->form;
					$form->col_();
				$form->row_();
			
			$tag->span('id="classe_personagem"');
						
				require_once 'results/results.php';
				if(isset($filter_result) && is_array($filter_result)):
					$tag->table('id="search_resulted" class="table table-striped table-bordered" cellspacing="0" width="100%"');
						$tag->thead();
							$tag->tr();
								$tag->th();
									echo 'Resultado...';
								$tag->th;
							$tag->tr;
						$tag->thead;
						$tag->tbody();
							$image = '';
							if(isset($filter_result[0]['table'])):
								for($i=0; $i<count($filter_result); $i++):
									switch_filter($filter_result[$i]['table'], $filter_result[$i]);
								endfor;
							else:
							 	for($i=0; $i<count($filter_result); $i++):
							 		for($j=0; $j<count($filter_result[$i]); $j++):
							 			switch_filter($filter_result[$i][$j]['table'], $filter_result[$i][$j]);
							 		endfor;
								endfor;
							endif;
						$tag->tbody;
					$tag->table;
				else:
					echo "404";
				endif;
			$tag->span;
		$form->col_();

		//<!-- jquery CSS -->
		$tag->link('href="'.SEARCHPATH.CSSPATH.'jquery-ui.css" rel="stylesheet"');

		$tag->script('src="'.SEARCHPATH.JSPATH.'jquery-ui.js"');
		$tag->script;

		$tag->script('src="'.SEARCHPATH.JSPATH.'index.js"'); 
		$tag->script;
		
		require 'footer.php';

	$tag->body;
$tag->html;