<?php 
require_once '../../header.php';

new Components('menu', $parametros);
$form = new Form();
$tag->link('href="'.CSSPATH.'index.css" rel="stylesheet"');
$tag->script('src="'.JSPATH.'antagonistas.js"'); $tag->script;
$tag->script('src="'.JSPATH.'coadjuvantes.js"'); $tag->script;
$tag->script('src="'.JSPATH.'complicacao.js"'); $tag->script;
$tag->script('src="'.JSPATH.'index.js"'); $tag->script;
$tag->script('src="'.JSPATH.'localidades.js"'); $tag->script;
$tag->script('src="'.JSPATH.'objetivos.js"'); $tag->script;
$tag->script('src="'.JSPATH.'recompensas.js"'); $tag->script;

$tag->br();
$form->_container();
	$form->_row();
		$form->_col(12);
			helper_adsense_01();	
		$form->col_();
		
		$form->_col(12);
			$form->_row();
				$form->h1("Gerador de aventuras! Help RPG");
				$tag->p();
					$tag->imprime('
					Este gerador será útil para lhe dar idéias em suas próximas aventuras.
					');
					$tag->br();
					$tag->br();
					$tag->imprime('
					Ele foi retirado do site pontos de experiência, link 
					<a href="http://www.pontosdeexperiencia.com.br/2014/02/bruxos-barbaros-gerador-de-aventuras.html">(www.pontosdeexperiencia.com.br)
					</a>. Eu simplesmente achei super interessante este gerador e por conta disso resolvi fazer uma automatização
					deste gerador.
					');
					$tag->br();
					$tag->br();
					$tag->imprime('
					Ele é bem simples! ao gerar uma aventura você terá a sua disposição um: objetivo, uma localidade, um antagonista, coadjuvantes,
					possíveis complicações e recompensas. Se você ficou animado, eu fico feliz e espero que tenham um ótimo divertimento em suas 
					aventuras.  
					');
				$tag->p;
			$form->row_();
		$form->col_();
		
		$form->_col(12);
			$form->_row();
				helper_form_input("", ["name" => "aventuras", "value" => "Gerar aventura!", "type" => "button", "class" => "btn btn-default","id" => "aventuras", 'onclick'=>'load();']);
			$form->row_();
		$form->col_();
		
		$form->_col(6);
			$form->_row();
				$form->h1("Objetivo");
				$tag->textarea('id="objetivo"');
				$tag->textarea;
			$form->row_();
		$form->col_();
		
		$form->_col(6);
			$form->_row();
				$form->h1("Local");
				$tag->textarea('id="local"');
				$tag->textarea;
			$form->row_();
		$form->col_();
		
		$form->_col(6);
			$form->_row();
				$form->h1("Antagonistas");
				$tag->textarea('id="antagonistas"');
				$tag->textarea;
			$form->row_();
		$form->col_();
		
		$form->_col(6);
			$form->_row();
				$form->h1("Coadjuvantes");
				$tag->textarea('id="coadjuvantes"');
				$tag->textarea;
			$form->row_();
		$form->col_();
		
		$form->_col(6);
			$form->_row();
				$form->h1("Complicação");
				$tag->textarea('id="complicacao"');
				$tag->textarea;
			$form->row_();
		$form->col_();
		
		$form->_col(6);
			$form->_row();
				$form->h1("Recompensa");
				$tag->textarea('id="recompensa"');
				$tag->textarea;
			$form->row_();
		$form->col_();
		
		$form->_col(12);
			helper_adsense_02();
		$form->col_();
	$form->row_();
$form->container_();

require_once '../../footer.php';


