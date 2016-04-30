<?php
	require_once '../futuro/class/futuro.class.php';
	require_once 'header.php';
	require_once '../config.php';

	$afetados = explode("\n", file_get_contents($BASE_PAPAH.'futuro/class/txt/afetados.txt'));
	$tag->br();
	$tag->div(['class'=>'row']);
		$tag->div(['class'=>'col-md-8']);
		   
		    $tag->span(['class'=>'help-inline']);
		        $tag->input(['class'=>'btn btn-success margin', 'type'=>'button', 'value'=>'Gerar futuro', 'onclick'=>'rand_futuro();']);
		    $tag->spam;
		
		    $tag->span(['class'=>'help-inline']);
		        $tag->input(['class'=>'btn btn-primary margin', 'type'=>'button', 'value'=>'Reset', 'onclick'=>'location.reload();']);
		    $tag->spam;

		    // $tag->select('class="selectpicker margin" data-show-subtext="true" data-live-search="true" id="select"');
		    //     $tag->option();
	     //            $tag->printer('');
	     //        $tag->option;
		    //     foreach($afetados as $key => $value):
		    //         $tag->option('data-subtext="Sobre '.$value.'" value="'.$key.'"');
		    //             $tag->printer($value);
		    //         $tag->option;
		    //     endforeach;
		    // $tag->select;
		$tag->div;

		$tag->div(['class'=>'col-md-12', 'id'=>'content']);
		    $tag->div('class="row"');
		        $tag->br();

				$tag->h1(); 
					$tag->sorte('id="afetado"'); $tag->sorte;
					$tag->br();
					$tag->small();
						$tag->sorte('id="acontecimento"'); $tag->sorte;
					$tag->small;
				$tag->h1;
				
		    $tag->div;

		    $tag->hr();
		    
		    $tag->div('class="row"');
		        //habilidades basicas
		         
		    $tag->div;

		$tag->div;

		$tag->div('id="editor"');
		$tag->div;
	$tag->div;

	require_once 'footer.php';