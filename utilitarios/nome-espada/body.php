<?php

	require_once 'header.php';
	$tag->br();
	$tag->div(['class'=>'row']);
		
		   
		$tag->div('class="col-md-3"');
			$tag->a('class="btn btn-default" onclick="rand_espada()"');
				$tag->printer("Gerar nome de espada");
			$tag->a;
	    $tag->div;


	$tag->div;
	
	$tag->div(['class'=>'col-md-12']);
		$tag->div(['class'=>'row']);
			$tag->br();
			$tag->div('class="panel panel-default" id="panel_sorte"');
				$tag->div('class="panel-heading"');
					$tag->printer('Nome da espada');
				$tag->div;

				$tag->div('class="panel-body"');
					$tag->span('id="primeiro_nome"');
					$tag->span;
					$tag->span('id="segundo_nome"');
					$tag->span;
				$tag->div;
			$tag->div;
		$tag->div;	
	$tag->div;

	require_once 'footer.php';