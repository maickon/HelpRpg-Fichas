<?php

require_once 'queries.php';
//Faz uma busca select nos campos selecionados no array
//isso para cada entidade no DB

function helper_remove_acento($string){
	return preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $string ) );;
}

$filter = explode(' ', $busca);
$nomes_permitidos = array(
	'personagens','personagem','armaduras','armadura','armas','arma',
	'artefatos','artefato','talentos','talento','magias','magia',
	'pericia','pericias','aventuras','aventura','historias','histórias',
	'historia','história','contos','conto','cronicas','cronica','crônica',
	'crônicas','cenario','cenarios','bestiario','bestiário',
	'bestiarios','bestiários','fichas','ficha');

if(array_key_exists(1, $filter)):
	$lower_filter = strtolower($filter[0]);
	if(in_array($lower_filter, $nomes_permitidos)):
		if($lower_filter == 'bestiarios' || $lower_filter == 'bestiários' || $lower_filter == 'bestiário'):
			if(substr($lower_filter, -1) == 's'):
				$lower_filter = 'bestiario';
			else:
				$lower_filter = 'bestiario';
			endif;
		endif;
		$search_term = '';
		for($i=1; $i<count($filter); $i++):
			if($i == count($filter)-1):
				$search_term .= "{$filter[$i]}";
			else:
				$search_term .= "{$filter[$i]} ";
			endif;
		endfor;
		$filter_result = query_filter(helper_remove_acento($lower_filter), $search_term);
	else:	
		$filter = $filter[1];
		$personagens = query_personagens($filter);
		//----------------------------------------------------------------------------------------
		$fichas = query_fichas($filter);
		//----------------------------------------------------------------------------------------
		$armaduras = query_armaduras($filter);
		//----------------------------------------------------------------------------------------
		$armas = query_armas($filter);
		//----------------------------------------------------------------------------------------
		$artefatos = query_artefatos($filter);
		//----------------------------------------------------------------------------------------
		$talentos = query_talentos($filter);	
		//----------------------------------------------------------------------------------------
		$magias = query_magias($filter);	
		//----------------------------------------------------------------------------------------
		$pericias = query_pericias($filter);
		//----------------------------------------------------------------------------------------
		$aventuras = query_aventuras($filter);
		//----------------------------------------------------------------------------------------
		$historias = query_historias($filter);
		//----------------------------------------------------------------------------------------
		$contos = query_contos($filter);	
		//----------------------------------------------------------------------------------------
		$cronicas = query_cronicas($filter);
		//----------------------------------------------------------------------------------------
		$cenarios = query_cenarios($filter);
		//----------------------------------------------------------------------------------------
		$bestiarios = query_bestiarios($filter);

		//lista de todos os arrays de forma reordenada  atraves da funcao array_values()
		$union_result = array(
							$personagens, 
							$fichas,
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
else:
	$filter = $filter[0];
	$personagens = query_personagens($filter);
	//----------------------------------------------------------------------------------------
	$fichas = query_fichas($filter);
	//----------------------------------------------------------------------------------------
	$armaduras = query_armaduras($filter);
	//----------------------------------------------------------------------------------------
	$armas = query_armas($filter);
	//----------------------------------------------------------------------------------------
	$artefatos = query_artefatos($filter);
	//----------------------------------------------------------------------------------------
	$talentos = query_talentos($filter);	
	//----------------------------------------------------------------------------------------
	$magias = query_magias($filter);	
	//----------------------------------------------------------------------------------------
	$pericias = query_pericias($filter);
	//----------------------------------------------------------------------------------------
	$aventuras = query_aventuras($filter);
	//----------------------------------------------------------------------------------------
	$historias = query_historias($filter);
	//----------------------------------------------------------------------------------------
	$contos = query_contos($filter);	
	//----------------------------------------------------------------------------------------
	$cronicas = query_cronicas($filter);
	//----------------------------------------------------------------------------------------
	$cenarios = query_cenarios($filter);
	//----------------------------------------------------------------------------------------
	$bestiarios = query_bestiarios($filter);

	//lista de todos os arrays de forma reordenada  atraves da funcao array_values()
	$union_result = array(
						$personagens,
						$fichas, 
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