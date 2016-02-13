<?php 
require_once '../../header.php';

new Components('menu', $parametros);
$form = new Form();
$tag->link('href="'.CSSPATH.'index.css" rel="stylesheet"');
$tag->script('src="'.JSPATH.'sorteio_uma_palavra.js"'); $tag->script;

$tag->br();
$form->_container();
	$form->_row();
		$form->_col(12);
			helper_ads_cursos();	
		$form->col_();
		
		$form->_col(12);
			$form->h3("Gerador de Características!");
			$tag->p();
				$tag->imprime('
				Este gerador sorteia 4 palavras chaves com o intuito de definir uma estrutura base para um perfil de personagem. Das 4 eu sugiro que você escolha 3.
				');
				$tag->imprime('
				Com esta ferramenta você pode gerar palavras chaves que definam uma personalidade/característica de um personagem. Isso se torna muito útil quando um mestre deseja definir tais características de 
				um Npc em sua campanha. Agora com esta ferramenta os personagens criados em suas aventuras serão uma surpresa até para você que é mestre.
				Outra coisa a resaltar é que a mesma ferramenta tembém pode ser usada na criação de personagens jogadores. Basta o grupo combinar de criarem seus personagens deste
				modo e experimentarem um novo jeito de criarem personagens.');
				$tag->br();
				$tag->br();
				$tag->imprime('
				As supostas personalidades/características disponíveis aqui tentam trazer palavras chaves que permitam ao jogador tem uma base de como será o comportamento do personagem. Através destas
				palavras o próprio jogador ou mestre se encarregará de combinar estas características para dar forma ao seu novo personagem. É certo que em algumas rolagens
				você irá se deparar com tipos de perfis inusitados. É aí que vem a graça desta ferramenta que desafia a sua criatividade a criar uma história interessante para este personagem 
				com tais características sorteadas. 
				');
				$tag->br();
				$tag->br();
				$tag->imprime('
				Caso caia palavras que seja meio que opostas tipo (corajoso e medroso), lembre-se que você deve ser criativo o suficiente para dar uma justificativa para isso. Neste caso o personagem pode ser realmente corajoso
				mas infelizmente tem medo de ratos (essa poderia ser uma explicação como exemplo...).
				');
				$tag->br();
				$tag->br();
				$tag->imprime('
				Obs: Palavras sorteadas que indicam algum sexo em específico como por exemplo: medo de mulheres, caso seu personagem seja do sexo oposto você poderá interpretar esta característica 
				conforme o sexo do seu personagem.
				');
				$tag->br();
				$tag->imprime('Espero que se divirtam... by Maickon Rangel');
			$tag->p;
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
