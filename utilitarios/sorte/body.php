<?php

	require_once 'header.php';
	$tag->br();
	$tag->div(['class'=>'row']);
		
		   
		$tag->div('class="col-md-3"');
			$tag->div(['class'=>'btn-group']);
		       
		        $tag->button(['class'=>'btn btn-default dropdown-toggle', 'data-toggle'=>'dropdown', 'aria-haspopup'=>'true', 'aria-expanded'=>'false', 'type'=>'button']);
		        	$tag->printer("Selecione a pessoa envolvida");
			        
			        $tag->span('class="caret"');
			        $tag->span;

			        $tag->span('class="sr-only"');
				        $tag->printer("Toggle Dropdown");
			        $tag->span;
		        $tag->button;
		 
		        $tipos = [
		        			["#",'Sorteado','tipo1'],
		        			["#",'Você','tipo2'],
		        			["#",'Seu amor','tipo3'],
		        			["#",'Seu melhor amigo','tipo4'],
		        			["#",'Uma pessoa próxima','tipo5'],
		        			["#",'Seu inimigo','tipo6'],
		        			["#",'Seu rival','tipo7'],
		        			["#",'Um familiar','tipo8'],
		        			["#",'A próxima pessoa que tocar','tipo8'],
		        			["#",'A pessoa que esbarrar em você','tipo9'],
		        			["#",'A próxima pessoa que você vai conhecer','tipo10'],
		        			["#",'Uma mulher','tipo11'],
		        			["#",'Um homem','tipo12'],
		        		];

		        $tag->ul('class="dropdown-menu"');
		        	for($i=0; $i<count($tipos); $i++):
			        	$tag->li('id="'.$tipos[$i][2].'" onclick="rand_sorte(\''.$tipos[$i][2].'\')"');
			        		$tag->a('href="'.$tipos[$i][0].'"');
			        			$tag->printer($tipos[$i][1]);
			        		$tag->a;
			        	$tag->li;
			        endfor;
		        $tag->ul;
		    $tag->div;
	    $tag->div;


	$tag->div;
	
	$tag->div(['class'=>'col-md-12']);
		$tag->div(['class'=>'row']);
			$tag->br();
			$tag->div('class="panel panel-default" id="panel_sorte"');
				$tag->div('id="afetado" class="panel-heading"');
				$tag->div;

				$tag->div('id="acontecimento" class="panel-body"	');
				$tag->div;
			$tag->div;
		$tag->div;	
	$tag->div;

	require_once 'footer.php';