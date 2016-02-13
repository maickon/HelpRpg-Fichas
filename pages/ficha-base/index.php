<?php 
require_once '../../header.php';
require_once 'nomes.php';

new Components('menu', $parametros);
$form = new Form();
$tag->link('href="'.CSSPATH.'index.css" rel="stylesheet"');
$tag->script('src="'.JSPATH.'sorteio_uma_palavra.js"'); $tag->script;

$tag->br();
$form->_container();
	$form->_row();
		$form->_col(12);
			helper_adsense_01();	
		$form->col_();
		
		$form->_col(12);
			$form->h1("Gerador de personagens base!");
			$tag->p();
				$tag->imprime('
				Este gerador será útil para você que é mestre e deseja descrever por base um personagem 
				Npc que você venha colocar em sua aventura.
				');
				$tag->br();
				$tag->br();
				$tag->imprime('
				Para personagens jogadores o gerador de habilidades chave pode ajudar pois ele 
				simula a rolagem de 4d6 descartando a rolagem mais baixa conforme a regra. Além disso
				valores abaixo de 8 não são aceitos. Dessa forma acredito que a rolagem gerada fica de
				forma bem bacana e equilibrada.
				');
				$tag->br();
				$tag->br();
				$tag->imprime('
				Se você desejar poderá escolher uma classe e uma raça. Estas palavras chave devem ajuda-lo a definir 
				um perfil para o seu personagem, através delas você deve imaginar um escopo base de
				uma história com as caracteristicas geradas. Talvez em alguns sorteios pode vir de cair palavras opostas
				como honesto e corruptível, mentiroso e verdadeiro e etc... Nestes casos descarte uma delas ou sortei novamente.
				');
			$tag->p;
		$form->col_();

        $form->_col(3);
			$form->_row();
                helper_form_select_options("Classe", ["name" => "classes", "id" => "classes", "class" => "selectpicker", "data-live-search" => "true"], $classes);
        	$form->row_();
		$form->col_();
		
		$form->_col(3);
			$form->_row();
                helper_form_select_options("Raças", ["name" => "racas", "id" => "racas", "class" => "selectpicker", "data-live-search" => "true"], $racas);
        	$form->row_();
		$form->col_();
		
		$form->_col(3);
			$form->_row();
				helper_form_input("", ["name" => "caracteristicas", "value" => "Gerar Características...", "type" => "button", "class" => "btn btn-default","id" => "caracteristicas", 'onclick'=>'load_caracteristica();']);
			$form->row_();
		$form->col_();
		
		$form->_col(12);
			$tag->br();
		$form->col_();
		
		$campos = ['campo1','campo2','campo3','campo4'];
		
		$form->_col(12);
		    $form->h3("Características");
		    $tag->hr();
		$form->col_();
		for($i=0; $i<count($campos); $i++):
			$form->_col(3);
				$form->input(['id'=>$campos[$i], 'type'=>'text', 'class'=>'form-control']);
			$form->col_();
		endfor;
		
		$campos_labels      = ['Força', 'Constituição','Destreza','Sabedoria','Inteligência','Carisma'];
		$campos_habilidades = ['hab1','hab2','hab3','hab4','hab5','hab6'];
		
		$form->_col(12);
		    $form->h3("Habilidades");
		    $tag->hr();
		$form->col_();
		for($i=0; $i<count($campos_habilidades); $i++):
		    helper_form_input($campos_labels[$i], ['id'=>$campos_habilidades[$i], 'name' => 'form_habilidade', 'type'=>'text', 'class'=>'form-control'], 2);
		endfor;
		
		$labels   = [CLASSE, RACA];
		$campos   = ['campo_classe','campo_raca'];
		
		$form->_col(12);
			$form->h3("Classe e Raça");
		    $tag->hr();
		$form->col_();
		for($i=0; $i<count($campos); $i++):
		    helper_form_input($labels[$i], ['id'=>$campos[$i], 'name' => 'form_habilidade', 'type'=>'text', 'class'=>'form-control'], 6);
		endfor;
		
		$form->_col(12);
			helper_adsense_02();
		$form->col_();
	$form->row_();
$form->container_();

require_once '../../footer.php';

$tag->script('src="'.JSPATH.'name_set.js"'); $tag->script;
