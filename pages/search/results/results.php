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

function arma($filter_result){
	global $tag;
	$path = ARMASPATH;
	$tag->tr();
		$tag->td();
			$tag->span('class="search-title"');
				$tag->a('href="'.ROOTPATHURL.$path.'view.php?id='.$filter_result['id'].'" target="blank"');
					$tag->imprime($filter_result['nome']);
				$tag->a;
			$tag->span;
			$tag->br();
			$tag->imprime("Dano {$filter_result['dano']} - Nível {$filter_result['lv']}, Sitema {$filter_result['sistema']}");
			$tag->br();
			$tag->imprime("Criado por {$filter_result['dono']}");
			$tag->br();
			$tag->imprime("<i>{$filter_result['descricao']}</i>");
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

function artefato($filter_result){
	global $tag;
	$path = ARTEFATOSPATH;
	$tag->tr();
		$tag->td();
			$tag->span('class="search-title"');
				$tag->a('href="'.ROOTPATHURL.$path.'view.php?id='.$filter_result['id'].'" target="blank"');
					$tag->imprime($filter_result['nome']);
				$tag->a;
			$tag->span;
			$tag->br();
			$tag->imprime("Nível {$filter_result['lv']}, Sitema {$filter_result['sistema']}");
			$tag->br();
			$tag->imprime("Criado por {$filter_result['dono']}");
			$tag->br();
			$tag->imprime("<i>{$filter_result['descricao']}</i>");
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

function talento($filter_result){
	global $tag;
	$path = TALENTOSPATH;
	$tag->tr();
		$tag->td();
			$tag->span('class="search-title"');
				$tag->a('href="'.ROOTPATHURL.$path.'view.php?id='.$filter_result['id'].'" target="blank"');
					$tag->imprime($filter_result['nome']);
				$tag->a;
			$tag->span;
			$tag->br();
			$tag->imprime("Nível {$filter_result['lv']}, Sitema {$filter_result['sistema']}");
			$tag->br();
			$tag->imprime("Criado por {$filter_result['dono']}");
			$tag->br();
			$tag->imprime("<i>{$filter_result['descricao']}</i>");
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

function magia($filter_result){
	global $tag;
	$path = MAGIASPATH;
	$tag->tr();
		$tag->td();
			$tag->span('class="search-title"');
				$tag->a('href="'.ROOTPATHURL.$path.'view.php?id='.$filter_result['id'].'" target="blank"');
					$tag->imprime($filter_result['nome']);
				$tag->a;
			$tag->span;
			$tag->br();
			$tag->imprime("Nível {$filter_result['lv']}, Sitema {$filter_result['sistema']}");
			$tag->br();
			$tag->imprime("Criado por {$filter_result['dono']}");
			$tag->br();
			$tag->imprime("<i>{$filter_result['descricao']}</i>");
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

function pericia($filter_result){
	global $tag;
	$path = PERICIASPATH;
	$tag->tr();
		$tag->td();
			$tag->span('class="search-title"');
				$tag->a('href="'.ROOTPATHURL.$path.'view.php?id='.$filter_result['id'].'" target="blank"');
					$tag->imprime($filter_result['nome']);
				$tag->a;
			$tag->span;
			$tag->br();
			$tag->imprime("Nível {$filter_result['lv']}, Sitema {$filter_result['sistema']}");
			$tag->br();
			$tag->imprime("Criado por {$filter_result['dono']}");
			$tag->br();
			$tag->imprime("<i>{$filter_result['descricao']}</i>");
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

function aventura($filter_result){
	global $tag;
	$path = AVENTURAPATH;
	$tag->tr();
		$tag->td();
			$tag->span('class="search-title"');
				$tag->a('href="'.ROOTPATHURL.$path.'view.php?id='.$filter_result['id'].'" target="blank"');
					$tag->imprime($filter_result['nome']);
				$tag->a;
			$tag->span;
			$tag->br();
			$tag->imprime("Nível {$filter_result['lv']}, Sitema {$filter_result['sistema']}");
			$tag->br();
			$tag->imprime("Criado por {$filter_result['dono']}");
			$tag->br();
			$tag->imprime("<i>{$filter_result['descricao']}</i>");
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

function historia($filter_result){
	global $tag;
	$path = ARTEFATOSPATH;
	$tag->tr();
		$tag->td();
			$tag->span('class="search-title"');
				$tag->a('href="'.ROOTPATHURL.$path.'view.php?id='.$filter_result['id'].'" target="blank"');
					$tag->imprime($filter_result['nome']);
				$tag->a;
			$tag->span;
			$tag->br();
			$tag->imprime("Nível {$filter_result['lv']}, Sitema {$filter_result['sistema']}");
			$tag->br();
			$tag->imprime("Criado por {$filter_result['dono']}");
			$tag->br();
			$tag->imprime("<i>{$filter_result['descricao']}</i>");
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

function conto($filter_result){
	global $tag;
	$path = ARTEFATOSPATH;
	$tag->tr();
		$tag->td();
			$tag->span('class="search-title"');
				$tag->a('href="'.ROOTPATHURL.$path.'view.php?id='.$filter_result['id'].'" target="blank"');
					$tag->imprime($filter_result['nome']);
				$tag->a;
			$tag->span;
			$tag->br();
			$tag->imprime("Nível {$filter_result['lv']}, Sitema {$filter_result['sistema']}");
			$tag->br();
			$tag->imprime("Criado por {$filter_result['dono']}");
			$tag->br();
			$tag->imprime("<i>{$filter_result['descricao']}</i>");
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

function cronica($filter_result){
	global $tag;
	$path = ARTEFATOSPATH;
	$tag->tr();
		$tag->td();
			$tag->span('class="search-title"');
				$tag->a('href="'.ROOTPATHURL.$path.'view.php?id='.$filter_result['id'].'" target="blank"');
					$tag->imprime($filter_result['nome']);
				$tag->a;
			$tag->span;
			$tag->br();
			$tag->imprime("Nível {$filter_result['lv']}, Sitema {$filter_result['sistema']}");
			$tag->br();
			$tag->imprime("Criado por {$filter_result['dono']}");
			$tag->br();
			$tag->imprime("<i>{$filter_result['descricao']}</i>");
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

function cenario($filter_result){
	global $tag;
	$path = ARTEFATOSPATH;
	$tag->tr();
		$tag->td();
			$tag->span('class="search-title"');
				$tag->a('href="'.ROOTPATHURL.$path.'view.php?id='.$filter_result['id'].'" target="blank"');
					$tag->imprime($filter_result['nome']);
				$tag->a;
			$tag->span;
			$tag->br();
			$tag->imprime("Nível {$filter_result['lv']}, Sitema {$filter_result['sistema']}");
			$tag->br();
			$tag->imprime("Criado por {$filter_result['dono']}");
			$tag->br();
			$tag->imprime("<i>{$filter_result['descricao']}</i>");
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

function bestiario($filter_result){
	global $tag;
	$path = ARTEFATOSPATH;
	$tag->tr();
		$tag->td();
			$tag->span('class="search-title"');
				$tag->a('href="'.ROOTPATHURL.$path.'view.php?id='.$filter_result['id'].'" target="blank"');
					$tag->imprime($filter_result['nome']);
				$tag->a;
			$tag->span;
			$tag->br();
			$tag->imprime("Nível {$filter_result['lv']}, Sitema {$filter_result['sistema']}");
			$tag->br();
			$tag->imprime("Criado por {$filter_result['dono']}");
			$tag->br();
			$tag->imprime("<i>{$filter_result['descricao']}</i>");
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