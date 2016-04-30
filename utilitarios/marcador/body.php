<?php

	require_once 'header.php';
	$tag->br();
	$tag->div(['class'=>'row']);
		
		   
		$tag->div('class="col-md-3"');
			$tag->div(['class'=>'btn-group']);
		       
		        $tag->button(['class'=>'btn btn-default dropdown-toggle', 'data-toggle'=>'dropdown', 'aria-haspopup'=>'true', 'aria-expanded'=>'false', 'type'=>'button']);
		        	$tag->printer("Selecione os tipos de campos");
			        
			        $tag->span('class="caret"');
			        $tag->span;

			        $tag->span('class="sr-only"');
				        $tag->printer("Toggle Dropdown");
			        $tag->span;
		        $tag->button;
		 
		        $tipos = [
		        			["#",'Nome, PV, CA e Dano','tipo1'],
		        			["#",'Nome, PV, Dano, Defesa e Mana','tipo2'],
		        			["#",'Nome, PV, Dano e Defesa','tipo3'],
		        			["#",'Nome, Vida, Dano (Magic)','tipo4'],
		        			["#",'Nome, Raça, Classe, PV e Dano','tipo5'],
		        			["#",'Nome, Raça, Classe, PV, Dano e CA','tipo6'],
		        			["#",'Nome, Raça, Classe, PV, Dano, Defesa e Mana','tipo7'],
		        			["#",'Nome, Raça, Classe, PV, Dano e Defesa','tipo8'],
		        		];

		        $tag->ul('class="dropdown-menu"');
		        	for($i=0; $i<count($tipos); $i++):
			        	$tag->li('id="'.$tipos[$i][2].'" onclick="campo(\''.$tipos[$i][2].'\')"');
			        		$tag->a('href="'.$tipos[$i][0].'"');
			        			$tag->printer($tipos[$i][1]);
			        		$tag->a;
			        	$tag->li;
			        endfor;
		        $tag->ul;
		    $tag->div;
	    $tag->div;

	    $tag->div('class="col-md-3"');
		    $tag->span(['class'=>'help-inline']);
		        $tag->input(['class'=>'btn btn-primary margin', 'type'=>'button', 'value'=>'Reset', 'onclick'=>'location.reload();']);
		    $tag->span;

		$tag->div;

	$tag->div;
	
	$tag->div(['class'=>'col-md-12', 'id'=>'marcador_content']);
		$tag->div(['class'=>'row']);
		$tag->div;	
	$tag->div;

	require_once 'footer.php';