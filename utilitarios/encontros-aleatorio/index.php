<?php 
require_once 'header.php';

$tag->div(['class'=>'container']);
	$tag->div(['class'=>'row']); 	
		$tag->br();
		$tag->div('class="col-md-12"');

			$tag->div(['class'=>'btn-group']);
		       
		        $tag->button(['class'=>'btn btn-default dropdown-toggle', 'data-toggle'=>'dropdown', 'aria-haspopup'=>'true', 'aria-expanded'=>'false', 'type'=>'button']);
		        	$tag->printer("Selecione o ambiente de encontro");
			        
			        $tag->span('class="caret"');
			        $tag->span;

			        $tag->span('class="sr-only"');
				        $tag->printer("Toggle Dropdown");
			        $tag->span;
		        $tag->button;
		 
		        $tipos = [
		        			["#",'Cidade','cidade'],
		        			["#",'Alto mar','maritima'],
		        			["#",'Estrada','estrada'],
		        			["#",'Montanha','montanha'],
		        			["#",'Floresta','floresta'],
		        			["#",'Deserto','deserto'],
		        		];

		        $tag->ul('class="dropdown-menu"');
		        	for($i=0; $i<count($tipos); $i++):
			        	$tag->li('id="'.$tipos[$i][2].'" onclick="rand_encontro_aleatorio(\''.$tipos[$i][2].'\')"');
			        		$tag->a('href="'.$tipos[$i][0].'"');
			        			$tag->printer($tipos[$i][1]);
			        		$tag->a;
			        	$tag->li;
			        endfor;
		        $tag->ul;
		    $tag->div;

		$tag->div;	

		$tag->div('class="col-md-12"');
			$tag->h1('id="titulo"');
			$tag->h1;
			$tag->hr();
			$tag->span('id="local"');
			$tag->span;
		$tag->div;
	$tag->div;
$tag->div;
	

require 'footer.php';