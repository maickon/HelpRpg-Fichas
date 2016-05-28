<?php
require 'header.php';

$tag->br();

$attr = [
    		[ ['titulo_negativos',	'title panel-heading'], ['negativos',	'panel-body'] ],
    		[ ['titulo_positivos',	'title panel-heading'], ['positivos',	'panel-body'] ],
    		[ ['titulo_gerais',		'title panel-heading'], ['gerais',		'panel-body'] ],
    		[ ['titulo_ideologia',	'title panel-heading'], ['ideologia',	'panel-body'] ],
    		[ ['titulo_medos',		'title panel-heading'], ['medos',		'panel-body'] ],
    		[ ['titulo_tendencia',	'title panel-heading'], ['tendencia',	'panel-body'] ]       
    	];

$tag->div(['class'=>'container']);
    $tag->div(['class'=>'row']);
        $tag->div(['class'=>'col-md-12']);
		    $tag->span(['class'=>'help-inline']);
		        $tag->input(['class'=>'btn btn-default margin', 'type'=>'button', 'value'=>'Gerar Personalidade', 'onclick'=>'rand_personalidades();']);
		    $tag->spam;

		    $tag->span(['class'=>'help-inline']);
		        $tag->input(['class'=>'btn btn-default margin', 'type'=>'button', 'value'=>'Resetar', 'onclick'=>'reload();']);
		    $tag->spam;

		    $tag->span(['class'=>'help-inline']);
		        $tag->input(['class'=>'btn btn-default margin', 'type'=>'checkbox', 'id'=>'checkbox_sorteio']);
		        $tag->printer("Desativar modo sorteio");
		    $tag->spam;
		$tag->div;

		$tag->div(['class'=>'col-md-12', 'id'=>'content']);
			$tag->br();
			$tag->div('class="title hide-title"');
				$tag->printer("Idéias para modelos/tipos de personalidade.");
			$tag->div;
		     $tag->div('class="row"');
		    	foreach($attr as $key => $value):
			    	$tag->div(['class'=>'col-md-6 hide-body', 'id'=>'content-show']);
				   		$tag->div('class="panel panel-default"');
				   			$tag->div('class="title panel-heading"');
				        		$tag->input('id="'.$value[0][0].'"');
				        	$tag->div;
				        	
				        	$tag->div('class="panel-body"');
				        		$tag->textarea('id="'.$value[1][0].'"');
				        		$tag->textarea;
				        	$tag->div;
				    	$tag->div;
				    $tag->div;
		   		endforeach;
			$tag->div;  
		    
		    $tag->div('class="row"');
		        //habilidades basicas
		         
		    $tag->div;

		$tag->div;
	$tag->div;
$tag->div;

require_once 'footer.php';