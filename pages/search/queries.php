<?php
//lista de funcoes que fazem buscas precisas em cada modulo separado

function query_personagens($busca){
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
	for($i=0; $i<count($personagens); $i++):
		$personagens[$i]['table'] = 'personagens';
	endfor;
	return $personagens;
}

function query_armaduras($busca){
	$armadura 	= new Armaduras('');
	$armaduras = $armadura->select('armaduras', null, [
												['nome', 'like', "%{$busca}%" ],
												['dono', 'like', "%{$busca}%" ],
												['sistema', 'like', "%{$busca}%" ],
												['categoria', 'like', "%{$busca}%" ],
												['tipo', 'like', "%{$busca}%" ],
												['lv', 'like', "%{$busca}%" ]
											], "OR");
	for($i=0; $i<count($armaduras); $i++):
		$armaduras[$i]['table'] = 'armaduras';
	endfor;
	return $armaduras;
}

function query_armas($busca){
	$arma 		= new Armas('');
	$armas = $arma->select('armas', null, [
												['nome', 'like', "%{$busca}%" ],
												['dono', 'like', "%{$busca}%" ],
												['sistema', 'like', "%{$busca}%" ],
												['tipo', 'like', "%{$busca}%" ],
												['preco', 'like', "%{$busca}%" ],
												['dano', 'like', "%{$busca}%" ],
												['peso', 'like', "%{$busca}%" ],
												['lv', 'like', "%{$busca}%" ]
											], "OR");
	for($i=0; $i<count($armas); $i++):
		$armas[$i]['table'] = 'armas';
	endfor;
	return $armas;
}

function query_artefatos($busca){
	$artefato 	= new Artefatos('');
	$artefatos = $artefato->select('artefatos', null, [
												['nome', 'like', "%{$busca}%" ],
												['dono', 'like', "%{$busca}%" ],
												['sistema', 'like', "%{$busca}%" ],
												['raridade', 'like', "%{$busca}%" ],
												['preco', 'like', "%{$busca}%" ],
												['lv', 'like', "%{$busca}%" ]
											], "OR");
	for($i=0; $i<count($artefatos); $i++):
		$artefatos[$i]['table'] = 'artefatos';
	endfor;
	echo '<pre>';
	print_r($artefatos);
	exit();	
	return $artefatos;
}

function query_talentos($busca){
	$talento 	= new Talentos('');
	$talentos = $talento->select('talentos', null, [
												['nome', 'like', "%{$busca}%" ],
												['dono', 'like', "%{$busca}%" ],
												['sistema', 'like', "%{$busca}%" ],
												['pre_requisito', 'like', "%{$busca}%" ],
												['classe', 'like', "%{$busca}%" ],
												['lv', 'like', "%{$busca}%" ]
											], "OR");
	for($i=0; $i<count($talentos); $i++):
		$talentos[$i]['table'] = 'talentos';
	endfor;
	return $talentos;
}

function query_magias($busca){
	$magia 		= new Magias('');
	$magias = $magia->select('magias', null, [
												['nome', 'like', "%{$busca}%" ],
												['dono', 'like', "%{$busca}%" ],
												['sistema', 'like', "%{$busca}%" ],
												['classe', 'like', "%{$busca}%" ],
												['lv', 'like', "%{$busca}%" ]
											], "OR");
	for($i=0; $i<count($magias); $i++):
		$magias[$i]['table'] = 'magias';
	endfor;
	return $magias;
}

function query_pericias($busca){
	$pericia 	= new Pericias('');
	$pericias = $pericia->select('pericias', null, [
												['nome', 'like', "%{$busca}%" ],
												['dono', 'like', "%{$busca}%" ],
												['sistema', 'like', "%{$busca}%" ],
												['categoria', 'like', "%{$busca}%" ],
												['habilidade_chave', 'like', "%{$busca}%" ],
												['classe_favorecida', 'like', "%{$busca}%" ]
											], "OR");
	for($i=0; $i<count($pericias); $i++):
		$pericias[$i]['table'] = 'pericias';
	endfor;	
	return $pericias;
}

function query_aventuras($busca){
	$aventura 	= new Aventuras();
	$aventuras = $aventura->select('aventuras', null, [
												['titulo', 'like', "%{$busca}%" ],
												['dono', 'like', "%{$busca}%" ],
												['sistema', 'like', "%{$busca}%" ],
												['mestre', 'like', "%{$busca}%" ],
												['tipo', 'like', "%{$busca}%" ],
												['level_indicado', 'like', "%{$busca}%" ]
											], "OR");
	for($i=0; $i<count($aventuras); $i++):
		$aventuras[$i]['table'] = 'aventuras';
	endfor;	
	return $aventuras;
}

function query_historias($busca){
	$historia 	= new Historias();
	$historias = $historia->select('historias', null, [
												['titulo', 'like', "%{$busca}%" ],
												['dono', 'like', "%{$busca}%" ],
												['autor', 'like', "%{$busca}%" ],
												['descricao_breve', 'like', "%{$busca}%" ]
											], "OR");
	for($i=0; $i<count($historias); $i++):
		$historias[$i]['table'] = 'historias';
	endfor;	
	return $historias;
}

function query_contos($busca){
	$conto 	= new Contos();
	$contos = $conto->select('contos', null, [
												['titulo', 'like', "%{$busca}%" ],
												['dono', 'like', "%{$busca}%" ],
												['autor', 'like', "%{$busca}%" ],
												['descricao_breve', 'like', "%{$busca}%" ]
											], "OR");
	for($i=0; $i<count($contos); $i++):
		$contos[$i]['table'] = 'contos';
	endfor;
	return $contos;
}

function query_cronicas($busca){
	$cronica 	= new Cronicas();
	$cronicas = $cronica->select('cronicas', null, [
												['titulo', 'like', "%{$busca}%" ],
												['dono', 'like', "%{$busca}%" ],
												['autor', 'like', "%{$busca}%" ],
												['descricao_breve', 'like', "%{$busca}%" ]
											], "OR");
	for($i=0; $i<count($cronicas); $i++):
		$cronicas[$i]['table'] = 'cronicas';
	endfor;	
	return $cronicas;
}

function query_cenarios($busca){
	$cenario 	= new Cenarios();
	$cenarios = $cenario->select('cenarios', null, [
												['titulo', 'like', "%{$busca}%" ],
												['dono', 'like', "%{$busca}%" ],
												['autor', 'like', "%{$busca}%" ],
												['descricao_breve', 'like', "%{$busca}%" ]
											], "OR");
	for($i=0; $i<count($cenarios); $i++):
		$cenarios[$i]['table'] = 'cenarios';
	endfor;	
	return $cenarios;
}

function query_bestiarios($busca){
	$bestiario 	= new Bestiario();
	$bestiarios = $bestiario->select('bestiario', null, [
												['nome', 'like', "%{$busca}%" ],
												['dono', 'like', "%{$busca}%" ],
												['classificacao', 'like', "%{$busca}%" ]
											], "OR");
	for($i=0; $i<count($bestiarios); $i++):
		$bestiarios[$i]['table'] = 'bestiario';
	endfor;	
	return $bestiarios;
}

function query_filter($filter, $search_fiter){
	$result = [];
	if($filter == 'personagem' || $filter == 'personagens'){
		$result = query_personagens($search_fiter);

	}elseif($filter == 'armadura' || $filter == 'armaduras'){
		$result = query_armaduras($search_fiter);

	}elseif($filter == 'arma' || $filter == 'armas'){
		$result = query_armas($search_fiter);

	}elseif($filter == 'artefato' || $filter == 'artefatos'){
		$result = query_artefatos($search_fiter);

	}elseif($filter == 'talento' || $filter == 'talentos'){
		$result = query_talentos($search_fiter);

	}elseif($filter == 'magia' || $filter == 'magias'){
		$result = query_magias($search_fiter);

	}elseif($filter == 'pericia' || $filter == 'pericias'){
		$result = query_pericias($search_fiter);

	}elseif($filter == 'aventura' || $filter == 'aventuras'){
		$result = query_aventuras($search_fiter);

	}elseif($filter == 'historia' || $filter == 'historias'){
		$result = query_historias($search_fiter);

	}elseif($filter == 'conto' || $filter == 'contos'){
		$result = query_contos($search_fiter);

	}elseif($filter == 'cronica' || $filter == 'cronicas'){
		$result = query_cronicas($search_fiter);

	}elseif($filter == 'cenario' || $filter == 'cenarios'){
		$result = query_cenarios($search_fiter);

	}elseif($filter == 'bestiario' || $filter == 'bestiarios'){
		$result = query_bestiarios($search_fiter);
	}
	return $result;
}