<?php
	require_once '../nomes/class/nomes/nomes.class.php';
	require_once 'class/taverna.class.php';

	require_once 'header.php';
	$tag->br();
	$tag->div(['class'=>'row']);
		$tag->div(['class'=>'col-md-8']);
		   
		    $tag->span(['class'=>'help-inline']);
		        $tag->input(['class'=>'btn btn-success margin', 'type'=>'button', 'value'=>'Gerar Taverna', 'onclick'=>'rand_taverna();']);
		    $tag->spam;
		
		    $tag->span(['class'=>'help-inline']);
		        $tag->input(['class'=>'btn btn-primary margin', 'type'=>'button', 'value'=>'Reset', 'onclick'=>'location.reload();']);
		    $tag->spam;
		$tag->div;

		$tag->div(['class'=>'col-md-12', 'id'=>'content']);
		    $tag->div('class="row"');
		        $tag->br();

				$tag->h1(); 
					$tag->personagem('id="taverna"'); $tag->personagem;
					$tag->br();
					$tag->small();
						$tag->personagem('id="nome"'); $tag->personagem;
						$tag->personagem('id="raca"'); $tag->personagem;
						$tag->personagem('id="idade"'); $tag->personagem;
						$tag->personagem('id="tempo_de_profissao"'); $tag->personagem;
					$tag->small;
				$tag->h1;
				$tag->h3();
					$tag->div('id="aspecto"');
					$tag->div;
					$tag->small();
						$personalidade = ['personalidade1','personalidade2','personalidade3'];
						foreach ($personalidade as $key => $value) {
							$tag->personagem('id="'.$value.'"'); 
							$tag->personagem;
							$tag->br();
						}
					$tag->small;
					$tag->hr();

					$tag->div('id="aparencia"');
					$tag->div;
					$aparencia = ['aparencia1','aparencia2','aparencia3'];
					$tag->small();
						foreach ($aparencia as $key => $value) {
							$tag->personagem('id="'.$value.'"'); 
							$tag->personagem;
							$tag->br();
						}
					$tag->small;
					$tag->hr();
				$tag->h3;

				$tag->h3();
					$tag->div('id="coisas_de_comer"');
					$tag->div;
					$comida = ['comida1','comida2','comida3','comida4','comida5','comida6','comida7','comida8'];
					$tag->small();
						foreach ($comida as $key => $value) {
							$tag->personagem('id="'.$value.'"'); 
							$tag->personagem;
							$tag->br();
						}
					$tag->small;
					$tag->hr();
				$tag->h3;

				$tag->h3();
					$tag->div('id="bebidas"');
					$tag->div;
					$bebidas = ['bebidas1','bebidas2','bebidas3'];
					$tag->small();
						foreach ($bebidas as $key => $value) {
							$tag->personagem('id="'.$value.'"'); 
							$tag->personagem;
							$tag->br();
						}
					$tag->small;
					$tag->hr();
				$tag->h3;
				
				$tag->h3();
					$tag->div('id="objetos_de_briga"');
					$tag->div;
					$objetos_de_briga = ['objetos_de_briga1','objetos_de_briga2','objetos_de_briga3'];
					$tag->small();
						foreach ($objetos_de_briga as $key => $value) {
							$tag->personagem('id="'.$value.'"'); 
							$tag->personagem;
							$tag->br();
						}
					$tag->small;
					$tag->hr();
				$tag->h3;
				
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