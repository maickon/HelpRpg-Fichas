<?php 
require_once '../../header.php';

new Components('menu', $parametros);
$form = new Form();
$tag->link('href="'.CSSPATH.'index.css" rel="stylesheet"');
$tag->script('src="'.JSPATH.'sorteio_uma_palavra.js"'); $tag->script;

$tipos = [
	'Dracônico', 'Demônho', 'Anjos', 'Gótico', 'Generalizado', 'Mulheres', 'Homens', 'Homem Rato', 'Elfos', 
	'Anões', 'Halflings', 'Hobbits', 'Bárbaros', 'Orc', 'Asiático', 'Arábico', 'Reinos','Cidades'];
$tag->br();
$form->_container();
	$form->_row();
		$form->_col(12);
			helper_adsense_01();	
		$form->col_();
		
		$form->_col(12);
			$form->h3("Gerador de nomes!");
			$tag->p();
				$tag->imprime('
				Com esta ferramenta você pode gerar nomes de forma aleatória. Caso esteja num dia sem criatividade em sua aventura de RPG,
				utilize esta ferramenta e dê nome ao seus NPCs através das opções abaixo. Além disso temos como útimas opções temos nome de reinos e cidades.');
			$tag->p;
		$form->col_();

		$form->_col(3);
			$form->_row();
				helper_form_select_options("Tipo", ["name" => "tipo", "id" => "tipo", 'onchange'=>'load_name();', "class" => "selectpicker", "data-live-search" => "true"], $tipos);
			$form->row_();
		$form->col_();
		
		$form->_col(12);
			$tag->br();
		$form->col_();
		
		$campos = ['campo1','campo2','campo3','campo4','campo5','campo6','campo7','campo8'];
		
		for($i=0; $i<count($campos); $i++):
			$form->_col(3);
				$form->input(['id'=>$campos[$i], 'type'=>'text', 'class'=>'form-control']);
			$form->col_();
		endfor;
		
		$form->_col(12);
			$tag->br();
			$tag->hr();
		$form->col_();
		
		/*
		$form->_col(6);
			$tag->textarea('id="output" class="form-control" cols="100" rows="10" readonly');
			$tag->textarea;
		$form->col_();
		
		$tag->br();
		$tag->br();
		
		$form->_col(3);
			$form->_row();
				helper_form_select_options("Tipo", ["name" => "lista_nomes", "id" => "lista_nomes", 'onchange'=>'load_name_list();', "class" => "selectpicker", "data-live-search" => "true"], $tipos);
			$form->row_();
		$form->col_();
		*/	
		$form->_col(12);
			helper_adsense_02();
		$form->col_();
	$form->row_();
$form->container_();

require_once '../../footer.php';

$tag->script('src="'.JSPATH.'name_set.js"'); $tag->script;
$tag->script('src="'.JSPATH.'corrente-markov.js"'); $tag->script;
