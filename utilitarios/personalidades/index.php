<?php
require 'header.php';

$tag->br();

$tag->div(['class'=>'container']);
    $tag->div(['class'=>'row']);
        $tag->div(['class'=>'col-md-12']);
		    $tag->span(['class'=>'help-inline']);
		        $tag->input(['class'=>'btn btn-default margin', 'type'=>'button', 'value'=>'Gerar Personalidade', 'onclick'=>'rand_nomes();']);
		    $tag->spam;
		$tag->div;
	$tag->div;
$tag->div;