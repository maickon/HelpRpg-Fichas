<?php 
require_once 'header.php';

$tag->div(['class'=>'container']);
	$tag->div(['class'=>'row']); 	
		$tag->form('method="get" onsubmit="return false;"');
			$menus = [
						['col-number' => 6, 'label' => 'Nome da Masmora:', 			'id' => 'dungeon_name', 	'type' => 'input'],
						['col-number' => 3, 'label' => 'Estilo de Mapa:', 			'id' => 'map_style', 		'type' => 'select'],
						['col-number' => 3, 'label' => 'Grid:', 					'id' => 'grid', 			'type' => 'select'],
						['col-number' => 3, 'label' => 'Layout da Masmorra:', 		'id' => 'dungeon_layout', 	'type' => 'select'],
						['col-number' => 3, 'label' => 'Tamanho da Masmorra:',		'id' => 'dungeon_size', 	'type' => 'select'],
						['col-number' => 3, 'label' => 'Escadas:', 					'id' => 'add_stairs', 		'type' => 'select'],
						['col-number' => 3, 'label' => 'Layout da Sala:', 			'id' => 'room_layout', 		'type' => 'select'],
						['col-number' => 3, 'label' => 'Tamanho da Sala:', 			'id' => 'room_size', 		'type' => 'select'],
						['col-number' => 3, 'label' => 'Portas:', 					'id' => 'doors', 			'type' => 'select'],
						['col-number' => 3, 'label' => 'Corredores:', 				'id' => 'corridor_layout', 	'type' => 'select'],
						['col-number' => 3, 'label' => 'Remover becos sem saída?:', 'id' => 'remove_deadends', 	'type' => 'select']
					];

			for($i=0; $i<count($menus); $i++):
				$tag->div('class="col-md-'.$menus[$i]['col-number'].'"');
					$tag->label('class="control-label"');
						$tag->printer($menus[$i]['label']);
					$tag->label;
					if($menus[$i]['type'] == 'select'):
						$tag->select('id="'.$menus[$i]['id'].'" class="form-control"');
						$tag->select;
					elseif($menus[$i]['type'] == 'input'):
						$tag->input('id="'.$menus[$i]['id'].'" class="form-control"');
					endif;
				$tag->div;
			endfor;

			$tag->div('class="col-md-2"');
				$tag->br();
				$tag->input('type="button" class="btn btn-default" id="new_name" value="Novo Mapa"');
			$tag->div;

			$tag->div('class="col-md-2"');
				$tag->br();
				$tag->input('type="button" value="Salvar como PNG" class="btn btn-default" onclick="save_map();"');
			$tag->div;

			$tag->div('class="col-md-2"');
				$tag->br();
				$tag->printer('&nbsp;');
				$tag->input('type="button" value="Dar Print" class="btn btn-default" onclick="window.print();"');
			$tag->div;
		$tag->form;

		$tag->div('class="center"');
			$tag->h1('id="dungeon_title" class="title"');
			$tag->h1;
			$tag->canvas('id="map" width="1" height="1"');
				$tag->p();
					$tag->printer('Seu navegador não tem suporte ao HTML5 &lt;canvas&gt; element.');
				$tag->p;
			$tag->canvas;
			$tag->p();
				$tag->img('class="legendas" src="img/footer_dungeon.gif" alt="Legendas"');
			$tag->p;
		$tag->div;
	
		$tag->br();
	
		$tag->div('class="col-md-12"');
			$tag->div('class="col-md-6"');
				$tag->div('class="panel panel-default"');
					$tag->div('class="panel-heading" id="heading"');
						$tag->printer("Lista de monstros ou armadilhas nas salas");
					$tag->div;

					$tag->div('class="panel-body" id="body"');
						for($i=0; $i<=300; $i++):
							$tag->input("name='sala_".$i."' id='sala_".$i."' class='sala' ");
						endfor;
					$tag->div;
				$tag->div;
			$tag->div;
			
			$tag->div('class="col-md-6"');
				$tag->div('class="panel panel-default"');
					$tag->div('class="panel-heading"');
						$tag->printer("Breve explicação");
					$tag->div;

					$tag->div('class="panel-body"');
						$tag->printer("
							A lista ao lado serve apenas de idéias para possíveis desafios dentro da masmorra.
							Estes desafios podem ser criaturas ou armadilhas. O mestre é livre para decidir 
							quais criaturas usar. Ele pode deixar algumas salas vazias ou não. O nível dos desafios
							deve ser adequado ao nível do grupo. Caso não conhece a criatura, faça uma pesquisa no google.
							Uma outra observação é que eu não consegui atualizar a lista de desafio por completo,
							dessa forma, quando você escolhe uma nova masmorra com menas salas. Os novos desafios
							vão aparecer conforme o número de salas, mas os que sobrarem vão continuar aparecendo.     

							");
					$tag->div;
				$tag->div;
			$tag->div;
		$tag->div;

		$tag->div;	
	$tag->div;
$tag->div;
	

require 'footer.php';