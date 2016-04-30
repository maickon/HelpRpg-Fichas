<?php
	$tag->br();
	$tag->div(['class'=>'row']);
		$tag->div(['class'=>'col-md-8']);
		    $tag->select('class="selectpicker margin" data-show-subtext="true" data-live-search="true" id="select"');
		        foreach($rpg_nomes as $key => $value):
		            $tag->option('data-subtext="Nome de '.$value.'" value="'.$key.'"');
		                $tag->printer($value);
		            $tag->option;
		        endforeach;
		    $tag->select;
		
		    $tag->span(['class'=>'help-inline']);
		        $tag->input(['class'=>'btn btn-success margin', 'type'=>'button', 'value'=>'Gerar Nome', 'onclick'=>'rand_nomes();']);
		    $tag->spam;
		
		    $tag->span(['class'=>'help-inline']);
		        $tag->input(['class'=>'btn btn-primary margin', 'type'=>'button', 'value'=>'Download como PDF', 'onclick'=>'download_para_pdf();']);
		    $tag->spam;
		$tag->div;

		$tag->div(['class'=>'col-md-12', 'id'=>'content']);
		    $tag->div('class="row"');
		        $tag->br();

	            $tag->div(['class'=>'col-md-4']);
	            	$page = str_replace(".php","",basename($_SERVER['REQUEST_URI']));
	               $tag->img("src='img/{$page}/{$page}-01.jpg' class='lugares img-responsive img-thumbnail'");
	            $tag->div;

		        for($i=1; $i<9; $i++):

		            $tag->div(['class'=>'col-md-4']);
		                $tag->span(['id'=>'nome-'.$i.'', 'class'=>'nome form-control input-md no-border background-gradiente-silver']);
		                $tag->span;
		                $tag->br;
		            $tag->div;

		        endfor;
	            
	  
		    $tag->div;

		    $tag->hr();
		    
		    $tag->div('class="row"');
		        //habilidades basicas
		         
		    $tag->div;

		$tag->div;

		$tag->div('id="editor"');
		$tag->div;
	$tag->div;