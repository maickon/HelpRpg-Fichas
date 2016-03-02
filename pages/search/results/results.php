<?php

function personagem($filter_result){
	global $tag;
	if($filter_result['tipo'] == 'Personagem jogador'):
		$path = PERSONAGEMPATH;
 		$image = PERSONAGEMPATH.$filter_result['img'];
	elseif($filter_result['tipo'] == 'Monstro'):
		$path = MONSTROPATH;
		$image = MONSTROPATH.$filter_result['img'];
	else:
		$path = 'undefined';
		$image = $filter_result['img'];
	endif;
	$tag->tr();
		$tag->td();
			$tag->span('class="search-title"');
				$tag->a('href="'.ROOTPATHURL.$path.'view.php?id='.$filter_result['id'].'" target="blank"');
					$tag->imprime($filter_result['nome']);
				$tag->a;
			$tag->span;
			$tag->br();
			$tag->imprime("{$filter_result['tipo']} - Nível {$filter_result['lv']}, Sitema {$filter_result['sistema']}");
			$tag->br();
			$tag->imprime("{$filter_result['raca']} ({$filter_result['classe']}) - Criado por {$filter_result['dono']}");
			$tag->br();
			$tag->small();
				$tag->a('href="'.ROOTPATHURL.$path.'view.php?id='.$filter_result['id'].'" target="blank" class="show-picture"');
					$tag->imprime('Ver mais...');
				$tag->a;
			$tag->small;
			$tag->br();
			$tag->br();
		$tag->td;
	$tag->tr;
}

function armadura($filter_result){
	global $tag;
	$path = ARMADURASPATH;
	$tag->tr();
		$tag->td();
			$tag->span('class="search-title"');
				$tag->a('href="'.ROOTPATHURL.$path.'view.php?id='.$filter_result['id'].'" target="blank"');
					$tag->imprime($filter_result['nome']);
				$tag->a;
			$tag->span;
			$tag->br();
			$tag->imprime("Tipo {$filter_result['tipo']} - Nível {$filter_result['lv']}, Sitema {$filter_result['sistema']}");
			$tag->br();
			$tag->imprime("Preço {$filter_result['custo']} Categoria({$filter_result['categoria']}) - Criado por {$filter_result['dono']}");
			$tag->br();
			$tag->small();
				$tag->a('href="'.ROOTPATHURL.$path.'view.php?id='.$filter_result['id'].'" target="blank" class="show-picture"');
					$tag->imprime('Ver mais...');
				$tag->a;
			$tag->small;
			$tag->br();
			$tag->br();
		$tag->td;
	$tag->tr;
}