<?php
require_once '../../init.php';
require_once '../helper.php';

$gmtDate = gmdate("D, d M Y H:i:s");
header("Expires:{$gmtDate} GMT");
header("Last-Modified:{$gmtDate} GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

global $tag, $form;

$busca = $_GET['search'];
$personagem = new Personagens('');
$personagens = $personagem->select('personagens', null, [
											['nome', 'like', "%{$busca}%" ],
											['dono', 'like', "%{$busca}%" ],
											['sistema', 'like', "%{$busca}%" ],
											['tipo', 'like', "%{$busca}%" ],
											['lv', 'like', "%{$busca}%" ],
											['raca', 'like', "%{$busca}%" ],
											['classe', 'like', "%{$busca}%" ]
										], "OR");

if(isset($personagens) && is_array($personagens)):
	 for($i=0; $i<count($personagens); $i++):
	 	if($personagens[$i]['tipo'] == 'Personagem jogador'):
			$path = PERSONAGEMPATH;
		elseif($personagens[$i]['tipo'] == 'Monstro'):
			$path = MONSTROPATH;
		else:
			$path = 'undefined';
		endif;
		$tag->span('class="search-title"');
			$tag->a('href="'.ROOTPATHURL.$path.'view.php?id='.$personagens[$i]['id'].'" target="blank" onmouseover="show_image('.$personagens[$i]['img'].');"');
				$tag->imprime($personagens[$i]['nome']);
			$tag->a;
		$tag->span;
		$tag->br();
		$tag->imprime("{$personagens[$i]['tipo']} - Nível {$personagens[$i]['lv']}, Sitema {$personagens[$i]['sistema']}");
		$tag->br();
		$tag->imprime("{$personagens[$i]['raca']} ({$personagens[$i]['classe']}) - Criado por {$personagens[$i]['dono']}");
		$tag->br();
		$tag->small();
			$tag->a('href="'.ROOTPATHURL.$path.'view.php?id='.$personagens[$i]['id'].'" target="blank" class="show-picture"');
				$tag->imprime('Ver mais...');
			$tag->a;
		$tag->small;
		$tag->br();
		$tag->br();
	endfor;
else:
	echo "404";
endif;
$tag->script('src="'.ROOTPATHURL.JSPATH.'home.js"');
$tag->script;