<?php
	require_once 'class/aventuras.class.php';
	require_once 'header.php';
	$attr = [
    		[ ['titulo_objetivo',		'title panel-heading'], ['objetivo',	'panel-body'] ],
    		[ ['titulo_local',			'title panel-heading'], ['local',		'panel-body'] ],
    		[ ['titulo_antagonista',	'title panel-heading'], ['antagonista',	'panel-body'] ],
    		[ ['titulo_coadjuvante',	'title panel-heading'], ['coadjuvante',	'panel-body'] ],
    		[ ['titulo_complicacao',	'title panel-heading'], ['complicacao',	'panel-body'] ],
    		[ ['titulo_recompensa',		'title panel-heading'], ['recompensa',	'panel-body'] ]       
    	];

	$tag->br();
	$tag->div(['class'=>'row']);
		$tag->div(['class'=>'col-md-8']);
		   
		    $tag->span(['class'=>'help-inline']);
		        $tag->input(['class'=>'btn btn-success margin', 'type'=>'button', 'value'=>'Gerar Taverna', 'onclick'=>'rand_aventura_star_wars();']);
		    $tag->spam;
		
		    $tag->span(['class'=>'help-inline']);
		        $tag->input(['class'=>'btn btn-primary margin', 'type'=>'button', 'value'=>'Reset', 'onclick'=>'location.reload();']);
		    $tag->spam;
		$tag->div;

		$tag->div(['class'=>'col-md-12', 'id'=>'content']);
			$tag->br();
			$tag->div('class="title hide-title"');
				$tag->printer("Idéias para aventuras com tema baseado em Star Wars.");
			$tag->div;
		    $tag->div('class="row"');
		    	foreach($attr as $key => $value):
			    	$tag->div(['class'=>'col-md-6 hide-body', 'id'=>'content-show']);
				   		$tag->div('class="panel panel-default"');
				        	$tag->div('id="'.$value[0][0].'" class="'.$value[0][1].'"');
				        	$tag->div;
				        	$tag->div('id="'.$value[1][0].'" class="'.$value[1][1].'"');
				        	$tag->div;
				    	$tag->div;
				    $tag->div;
		   		endforeach;
			$tag->div;  
		    
		    $tag->div('class="row"');
		        //habilidades basicas
		         
		    $tag->div;

		$tag->div;

		$tag->div('id="editor"');
		$tag->div;
	$tag->div;

	require_once 'footer.php';