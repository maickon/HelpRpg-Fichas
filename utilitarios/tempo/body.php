<?php

	require_once 'header.php';
	$tag->br();
	$tag->div(['class'=>'row']);
		
		   
		$tag->div('class="col-md-3"');
			$tag->a('class="btn btn-default" onclick="rand_tempo_atual()"');
				$tag->printer("Simular estado do tempo");
			$tag->a;
	    $tag->div;


	$tag->div;
	
	$tag->div(['class'=>'col-md-12']);
		$tag->div(['class'=>'row']);
			$tag->br();
			$tag->div('class="panel panel-default" id="panel_tempo"');
				$tag->div('class="panel-heading"');
					$tag->printer('Hoje o dia/noite está...');
				$tag->div;

				$tag->div('class="panel-body"');
					$tag->span('id="temperatura"');
					$tag->span;
					$tag->span('id="vento"');
					$tag->span;
					$tag->span('id="precipitacao"');
					$tag->span;
				$tag->div;
			$tag->div;
		$tag->div;	
	$tag->div;

	require_once 'footer.php';