<?php
//Faz uma busca select nos campos selecionados no array
//isso para cada entidade no DB
$filter = explode(' ', $busca);

if(array_key_exists(1, $filter)):
	echo 'OK';
else:
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
	//----------------------------------------------------------------------------------------
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
	//----------------------------------------------------------------------------------------
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
	//----------------------------------------------------------------------------------------
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
	//----------------------------------------------------------------------------------------
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
	//----------------------------------------------------------------------------------------
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
	//----------------------------------------------------------------------------------------
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
	//----------------------------------------------------------------------------------------
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
	//----------------------------------------------------------------------------------------
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
	//----------------------------------------------------------------------------------------
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
	//----------------------------------------------------------------------------------------
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
	//----------------------------------------------------------------------------------------
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
	//----------------------------------------------------------------------------------------
	$bestiario 	= new Bestiario();
	$bestiarios = $bestiario->select('bestiario', null, [
												['nome', 'like', "%{$busca}%" ],
												['dono', 'like', "%{$busca}%" ],
												['classificacao', 'like', "%{$busca}%" ]
											], "OR");
	for($i=0; $i<count($bestiarios); $i++):
		$bestiarios[$i]['table'] = 'bestiario';
	endfor;	

	$union_result = array(
						$personagens, 
						$armaduras, 
						$armas, 
						$artefatos,
						$talentos, 
						$magias,
						$pericias, 
						$aventuras, 
						$historias, 
						$contos, 
						$cronicas, 
						$cenarios, 
						$bestiarios );

	$filter_result = array_values($union_result);
endif;