<?php 
require_once 'header.php';

$tag->div(['class'=>'container']);
	$tag->div(['class'=>'row']); 	
		$tag->br();
		$tag->div('class="col-md-12"');

			$tag->div(['class'=>'btn-group']);
		       
		        $tag->button(['class'=>'btn btn-default dropdown-toggle', 'data-toggle'=>'dropdown', 'aria-haspopup'=>'true', 'aria-expanded'=>'false', 'type'=>'button']);
		        	$tag->printer("Selecione o tipo de item desejado");
			        
			        $tag->span('class="caret"');
			        $tag->span;

			        $tag->span('class="sr-only"');
				        $tag->printer("Toggle Dropdown");
			        $tag->span;
		        $tag->button;
		 
		        $tipos = [
		        			["#",'Arma','armas'],
		        			["#",'Armadura ou Escudo','armaduras']
			        	];

		        $tag->ul('class="dropdown-menu"');
		        	for($i=0; $i<count($tipos); $i++):
			        	$tag->li('id="'.$tipos[$i][2].'" onclick="rand_item_comum_aleatorio(\''.$tipos[$i][2].'\')"');
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
			
			$tag->h4('id="armadura"');
			$tag->h4;

			$tag->h4('id="arma"');
			$tag->h4;

			$tag->h1('id="titulo_poder"');
			$tag->h1;

			$tag->h4('id="poder_armadura"');
			$tag->h4;

			$tag->h4('id="poder_arma"');
			$tag->h4;
			
			$tag->h1('id="titulo_aprimoramento"');
			$tag->h1;

			$tag->h4('id="aprimoramento"');
			$tag->h4;

			$tag->h1('id="titulo_material"');
			$tag->h1;

			$tag->h4('id="material"');
			$tag->h4;
		$tag->div;
	$tag->div;
$tag->div;
	

require 'footer.php';