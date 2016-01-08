<?php 
require_once '../../header.php';

new Components('menu', $parametros);
$form = new Form();
$tag->link('href="'.ROOTPATHURL.CSSPATH.'dungeon.css" rel="stylesheet"');
$tag->script('src="'.ROOTPATHURL.JSPATH.'prototype.js"');
$tag->script;
	$tag->form('method="get" onsubmit="return false;"');
		$tag->div('class="row banner-center"');
			$form->h1("Help Rpg - Gerador de Masmorra Aleatório");
		$tag->div;
		$form->_container();
			$form->_row();
				$tag->div('class="row banner-center"');
					helper_adsense_02();
					$tag->div;
					$tag->br();
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
								$tag->imprime($menus[$i]['label']);
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
						$tag->imprime('&nbsp;');
						$tag->input('type="button" value="Dar Print" class="btn btn-default" onclick="window.print();"');
					$tag->div;

				$tag->div;
			$form->row_();
		$form->container_();
	$tag->form;

	$tag->div('class="center"');
		$tag->h1('id="dungeon_title" class="title"');
		$tag->h1;
		$tag->canvas('id="map" width="1" height="1"');
			$tag->p();
				$tag->imprime('Seu navegador não tem suporte ao HTML5 &lt;canvas&gt; element.');
			$tag->p;
		$tag->canvas;

		$tag->p();
			$tag->img('src="'.ROOTPATHURL.IMGPATH.'/footer_dungeon.gif" alt="Legendas"');
		$tag->p;
	$tag->div;

	$tag->script('src="'.ROOTPATHURL.JSPATH.'prng.js"');
	$tag->script;

	$tag->script('src="'.ROOTPATHURL.JSPATH.'dice.js"');
	$tag->script;

	$tag->script('src="'.ROOTPATHURL.JSPATH.'generator.js"');
	$tag->script;

	$tag->script('src="'.ROOTPATHURL.JSPATH.'name.js"');
	$tag->script;

	$tag->script('src="'.ROOTPATHURL.JSPATH.'gen_data.js"');
	$tag->script;

	$tag->script('src="'.ROOTPATHURL.JSPATH.'name_set.js"');
	$tag->script;

	$tag->script('src="'.ROOTPATHURL.JSPATH.'canvas.js"');
	$tag->script;

	$tag->script('src="'.ROOTPATHURL.JSPATH.'dungeon.js"');
	$tag->script;

	$tag->div('id="debug"');
	$tag->div;

	$tag->br();

	$tag->div('class="center"');
		$tag->imprime('Masmorra adaptada do site <b>donjon.bin.sh</b> e mantida pela licensa <b>Creative Commons</b> (creativecommons.org/licenses/by-nc/3.0)');
	$tag->div;

	$tag->div('class="row banner-center"');
					helper_adsense_03();

	require '../../footer.php';

 
    
	