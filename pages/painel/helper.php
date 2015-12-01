<?php

$modulos_path = [
'armas'			=> ARMASPATH,
'armaduras'		=> ARMADURASPATH,
'escudos'		=> ESCUDOSPATH,
'artefatos'		=> ARTEFATOSPATH,
'talentos'		=> TALENTOSPATH,
'magias'		=> MAGIASPATH,
'habilidades'	=> HABILIDADESPATH,
'historias'		=> HISTORIASPATH,
'pericias'		=> PERICIASPATH,
'personagens'	=> PERSONAGEMPATH,
'usuarios'		=> USERPATH
];

function helper_componentes_buttons($modulo, $id, $off = false){
	global $form, $modulos_path;
	$form->td('<a href="'.ROOTPATHURL.$modulos_path[$modulo].'view.php?id='.$id.'" class="icon-link"><span class="glyphicon glyphicon-list-alt"></span></a>');
	if(!$off):
		$form->td('<a href="'.ROOTPATHURL.$modulos_path[$modulo].'edit.php?id='.$id.'" class="icon-link"><span class="glyphicon glyphicon-wrench"></span></a>');
		$form->td('<a href="#id_url" class="icon-link" data-toggle="modal" data-id="'.ROOTPATHURL.$modulos_path[$modulo].'delete.php?id='.$id.'" data-target=".bs-example-modal-sm" ><span class="glyphicon glyphicon-minus-sign"></span></a>');
	else:
		$form->td('<span class="glyphicon glyphicon-wrench"></span>');
		$form->td('<span class="glyphicon glyphicon-minus-sign"></span>');
	endif;
	$form->td('<a href="'.ROOTPATHURL.$modulos_path[$modulo].'download.php?id='.$id.'" class="icon-link"><span class="glyphicon glyphicon-download-alt"></span></a>');
}

function helper_componentes_buttons_view($modulo, $id, $off = false){
	global $form, $tag, $modulos_path;
	$form->_col(1);
		$tag->a('href="'.ROOTPATHURL.$modulos_path[$modulo].'new.php" class="btn btn-primary"');
			$tag->imprime(NOVO);
		$tag->a;
	$form->col_();
	if(!$off):
		$form->_col(1);
			$tag->a('href="'.ROOTPATHURL.$modulos_path[$modulo].'edit.php?id='.$_GET['id'].'" class="btn btn-warning"');
				$tag->imprime(EDITAR);
			$tag->a;
		$form->col_();
	
		$form->_col(1);
		#id_url" class="icon-link" data-toggle="modal
			$tag->a('href="'.ROOTPATHURL.$modulos_path[$modulo].'#id_url" data-toggle="modal" data-id="'.ROOTPATHURL.$modulos_path[$modulo].'delete.php?id='.$_GET['id'].'" data-target=".bs-example-modal-sm" class="delete-bt btn btn-danger"');
				$tag->imprime(DELETAR);
			$tag->a;
		$form->col_();
	endif;
	
	$form->_col(1);
		$tag->a('href="'.ROOTPATHURL.$modulos_path[$modulo].'download.php?id='.$_GET['id'].'" class="btn btn-success"');
			$tag->imprime(DOWNLOAD);
		$tag->a;
	$form->col_();
	
	$form->_col(1);
		$tag->a('href="'.ROOTPATHURL.$modulos_path[$modulo].'" class="btn btn-info"');
			$tag->imprime(BACK);
		$tag->a;
	$form->col_();
}

function helper_check_value($objeto, $key){
	global $unserialize_personagem;
	if($objeto == null):
		return '';
	elseif(array_key_exists($key, $objeto)):
		return $objeto[$key];
	else:
		return $unserialize_personagem[$key];
	endif;	
}

function helper_check_value_presence($value){
	if(empty($value)):
		return '';
	else:
		return $value;
	endif;
}

function helper_check_permitions($dono){
	global $permit, $s;
	$super = null;
	//verificando permiçoes
	foreach($permit as $p):
		if($s->get_session('nome') == $p):
			$super = 1;
			return $super;
		endif;
	endforeach;
	
	if($s->get_session('nome') != $dono):
		$super = 0;
	elseif($s->get_session('nome') == $dono):
		$super = 1;
	endif;
	return $super;
}

function helper_check_admin(){
	global $permit, $s;
	$super = null;
	//verificando permiçoes
	foreach($permit as $p):
		if($s->get_session('nome') == $p):
			$super = 1;
			return $super;
		else:
			$super = 0;
		endif;
	endforeach;
	
	return $super;
}

function helper_check_update($object){
	global $s;
	if($s->get_session('nome') != $object[0]['dono']):
		return 1;
	endif;	
}

function helper_adm_label($object){
	global $tag, $form, $s;
	$date = date("d/m/Y H:i:s");
	if(helper_check_update($object)):
		$form->input(['name' => 'editado_por', 'type' => 'hidden', 'class'=>'form-control', 'value'=> "Editado por {$s->get_session('nome')} administrador em {$date}"]);		
	endif;
}

function helper_modal_alert_confirm(){
	global $form, $tag;
	
	$tag->imprime('
		<script type="text/javascript">
			$(document).on("click", ".icon-link, .delete-bt", function () {
			     var myId = $(this).data(\'id\');
				 var link = document.getElementById(\'btnYes\');
				 link.href = myId;
			});
		</script>
		');
	
	//display de alert para cnfirmar exclusão
	$tag->div('class="modal fade bs-example-modal-sm" id="id_url" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"');
		$tag->div('class="modal-dialog"');
			$tag->div('class="modal-content alert alert-danger" role="danger"');
				
				$tag->div('class="modal-header"');	
					//botao de X de fechar
					$tag->button('type="button" class="close" data-dismiss="modal" aria-label="Close"');
						$tag->span('aria-hidden="true"');
							$tag->imprime('&times;');
						$tag->span;
					$tag->button;
					
					//titulo
					$tag->h3();
						$tag->imprime('Apagar dados');
					$tag->h3;
				$tag->div; //fim header
			
				$tag->div('class="modal-body"');
					$tag->div('class="alert alert-danger" role="alert"');
						$tag->imprime('Você tem certeza que deseja deletar isto?');
						$tag->br();
						$tag->imprime('Ao fazer isso você estará apagando estas informações de vez da base de dados.');
					$tag->div;
				$tag->div;
			
				$tag->div('class="modal-footer"');
						
					$tag->a('href="" id="btnYes" class="btn btn-success"');
						$tag->imprime('Sim');
					$tag->a;
				
					$tag->a('href="#" data-dismiss="modal" aria-hidden="true" class="btn btn-danger"');
						$tag->imprime('Não');
					$tag->a;
				$tag->div;
				
			$tag->div;
		$tag->div;
	$tag->div;
	//fim do display de alerte
}

function helper_check_array_key($array, $position){
	foreach($array as $key => $value):
		if($value == $position)
			return $key;
	endforeach;
}

function helper_tabs($options){
	global $form, $tag;
	$form->_ul(['id' => 'myTabs','class' => 'nav nav-tabs', 'role' => 'tablist']);
		$i = 0;
		foreach($options as $key => $value):
			$active = $i == 0 ? 'active' : '';
			$form->_li(['role' => 'presentation', 'class' => $active]);
				$tag->a('href="'.$value['href'].'" aria-controls="'.$value['aria-controls'].'" role="'.$value['role'].'" data-toggle="tab"');
					$tag->imprime($value['role']);
				$tag->a;
				$i++;
			$form->li_();
			
		endforeach;
	$form->ul_();
}

function helper_panes($params){
	global $form, $tag;
	$tag->div('id="myTabContent" class="tab-content"');
		foreach($params as $key => $value):
			if($value['active'] == true):
				$tag->div('role="tabpanel" class="tab-pane fade" aria-labelledby="home-tab" id="'.$value['id'].'"');
					require_once $value['require'];
				$tag->div;
			else:
				$tag->div('role="tabpanel" class="tab-pane fade active in" aria-labelledby="profile-tab" id="'.$value['id'].'"');
					require_once $value['require'];
				$tag->div;
			endif;
		endforeach;
	$tag->div;
}

function helper_form_pages($system){
	switch($system):
		case 'ded': require_once 'form/d20-ded.php';
		break;
		
		case 'daemon': require_once 'form/daemon.php';
		break;
		
		case '3det': require_once 'form/3det.php';
		break;
	endswitch;
}

function helper_params_personagem($params){
	$serialize_params = array();
	$_REQUEST = null;
	foreach($params as $key => $value):
		if($key == 'id' || $key == 'dono' || $key == 'nome' || $key == 'sistema' || $key == 'tipo' || $key == 'lv' || $key == 'raca' || $key == 'classe' || $key == 'action' || $key == 'img' || $key == 'old_file'):
			$_REQUEST[$key] = empty($value)?'':$value;
		else:
			$serialize_params[$key] = empty($value)?'-':$value;
		endif;
	endforeach;
	
	$serialize = serialize($serialize_params);
	$_REQUEST['dados'] = $serialize;
	
	return $_REQUEST;
}

function helper_show_personagens_ded($personagem){
	global $tag;
	$unserialize_params = unserialize($personagem['dados']);
	
	$habilidades = helper_habilidades_ded_rpg([
												["For", helper_check_value_presence($unserialize_params['forca'])], 
												["Des", $unserialize_params['destreza']],
												["Con", $unserialize_params['constituicao']],
												["Int", $unserialize_params['inteligencia']], 
												["Sab", $unserialize_params['sabedoria']], 
												["Car", $unserialize_params['carisma']]
											  ]);
	
	$testes_resistencia = helper_testes_de_resistencia_ded_rpg([
															  	["Fortitude ",$unserialize_params['for']], 
																["Reflexos ", $unserialize_params['refl']], 
																["Vontade ", $unserialize_params['vont']]
															  ]);
	
	//regra do modificador = subtrai 10 e divide por 2
	$pvs = $personagem['lv']*($unserialize_params['constituicao']-10)/2;
	$attr = [
		'<b>Dado de vida:</b>' 			=> "{$personagem['lv']}{$unserialize_params['dado_vida']}+$pvs ({$unserialize_params['pv']} pvs)",
		'<b>Iniciativa:</b>' 			=> "{$unserialize_params['iniciativa']}",
		'<b>Deslocamento:</b>' 			=> "{$unserialize_params['deslocamento']}",
		'<b>Classe de armadura:</b>' 	=> "{$unserialize_params['ca']}",
		'<b>Ataque Total:</b>' 			=> "{$unserialize_params['ataque']}",
		'<b>Ataque especial:</b>' 		=> "{$unserialize_params['habilidades_especiais']}",
		'<b>Testes de resistência:</b>' => "{$testes_resistencia}",
		'<b>Habilidades:</b>' 			=> "{$habilidades}",
		'<b>Perícias:</b>' 				=>  helper_check_value_presence($unserialize_params['pericias']),
		'<b>Talentos:</b>' 				=> "{$unserialize_params['talentos']}",
		'<b>Tendencia:</b>' 			=> "{$unserialize_params['tendencia']}",
		'<b>Equipamentos:</b>' 			=> "{$unserialize_params['equipamentos']}",
		'<b>Magias:</b>' 				=> "{$unserialize_params['magias']}",
		'<b>Habilidades especiais:</b>' => "{$unserialize_params['habilidades_especiais']}",
		'<b>Outras coisas:</b>' 		=> "{$unserialize_params['outros']}",
		'<b>História:</b>' 				=> "{$unserialize_params['descricao']}",
			];

	helper_show_header_attr_personagem($personagem);
	helper_show_body_attr_personagens($attr);
}

function helper_show_personagens_fate($personagem){
	global $tag;
	$unserialize_params = unserialize($personagem['dados']);
	
	$atitudes = helper_atitudes_fate_rpg([
				["Cuidadose",$unserialize_params['cuidadoso']],
				["Inteligente",$unserialize_params['inteligente']],
				["Chamativo",$unserialize_params['chamativo']],
				["Forte",$unserialize_params['forte']],
				["Rápido",$unserialize_params['rapido']],
				["Sorrateiro",$unserialize_params['sorrateiro']]
			]);
	
	$attr = [
		//FATE RPG
		'<b>Atitudes:</b>' 				=> "{$atitudes}",
		'<b>Conceito chave:</b>' 		=> "{$unserialize_params['aspecto_chave']}",
		'<b>Complicação:</b>' 			=> "{$unserialize_params['aspecto_complicacao']}",
		'<b>Refresh:</b>' 				=> "{$unserialize_params['refresh']}",
		'<b>Pontos de Fate atuais:</b>' => "{$unserialize_params['fate']}",
		'<b>Stress 1:</b>' 				=> "{$unserialize_params['stress1']}",
		'<b>Stress 2:</b>' 				=> "{$unserialize_params['stress2']}",
		'<b>Stress 3:</b>' 				=> "{$unserialize_params['stress3']}",
		'<b>Consequência leve:</b>' 	=> "{$unserialize_params['consequencia_leve']}",
		'<b>Consequência moderada:</b>' => "{$unserialize_params['consequencia_moderada']}",
		'<b>Consequência severa:</b>' 	=> "{$unserialize_params['consequencia_severa']}",
	];
	
	helper_show_header_attr_personagem($personagem);
	helper_show_body_attr_personagens($attr);
}

function helper_show_personagens_deamon($personagem){
	
}

function helper_show_personagens_3det($personagem){
	global $tag;
	$unserialize_params = unserialize($personagem['dados']);
	
	$atributos = helper_habilidades_3det_rpg([
			['Força',$unserialize_params['forca']],['Habilidade',$unserialize_params['habilidade']],['Resistência',
			$unserialize_params['resistencia']],['Armadura',$unserialize_params['armadura']],
			['Poder de Fogo',$unserialize_params['pdf']], 
			]);
	
	$attr = [
	//3D&T RPG
	'<b>Atributos:</b>' 	=> "{$atributos}",
	'<b>Pvs:</b>' 			=> "{$unserialize_params['pvs']}",
	'<b>Pms:</b>' 			=> "{$unserialize_params['pms']}",
	'<b>Nome:</b>' 			=> "{$personagem['nome']}",
	'<b>Nível:</b>' 		=> "{$personagem['lv']}",
	'<b>Classe:</b>' 		=> "{$personagem['classe']}",
	'<b>Raça:</b>' 			=> "{$personagem['raca']}",
	'<b>Tendencia:</b>' 	=> "{$unserialize_params['tendencia']}",
	'<b>Idade:</b>' 		=> "{$unserialize_params['idade']}",
	'<b>Peso:</b>' 			=> "{$unserialize_params['peso']}",
	'<b>Altura:</b>' 		=> "{$unserialize_params['altura']}",
	'<b>Xp:</b>' 			=> "{$unserialize_params['experiencia']}",
	'<b>Kits:</b>' 			=> "{$unserialize_params['kits']}",
	'<b>Função:</b>' 		=> "{$unserialize_params['funcao']}",
	'<b>Pts:</b>' 			=> "{$unserialize_params['pts']}",
	'<b>Divindade:</b>' 	=> "{$unserialize_params['divindade']}",
	'<b>Vantagem Única:</b>' => "{$unserialize_params['vantagem_unica']}",
	'<b>Aparência:</b>' 	=> "{$unserialize_params['aparencia']}",
	'<b>Iniciativa:</b>' 	=> "{$unserialize_params['iniciativa']}",
	'<b>Movimento:</b>' 	=> "{$unserialize_params['movimento']}",
	'<b>Carga:</b>' 		=> "{$unserialize_params['carga']}",

	'<b>Combate:</b>' 		=> "{$unserialize_params['combate']}",
	'<b>Vantagens:</b>' 	=> "{$unserialize_params['vantagens']}",
	'<b>Desvantagens:</b>' 	=> "{$unserialize_params['desvantagens']}",
	'<b>Poderes:</b>' 		=> "{$unserialize_params['poderes']}",
	'<b>Perícias:</b>' 		=> "{$unserialize_params['pericias']}",
	'<b>Equipamentos:</b>' 	=> "{$unserialize_params['equipamentos']}",
	'<b>Dinheiro e riqueza:</b>' => "{$unserialize_params['dinheiro']}",
	'<b>Magias:</b>' 		=> "{$unserialize_params['magias']}",
	'<b>Outros:</b>' 		=> "{$unserialize_params['outros']}",
	];
	
	helper_show_header_attr_personagem($personagem);
	helper_show_body_attr_personagens($attr);
}

function helper_show_personagens_ded4_0($personagem){
	global $tag;
	$unserialize_params = unserialize($personagem['dados']);
	
	$habilidades = helper_habilidades_ded_rpg([
			["For", helper_check_value_presence($unserialize_params['forca'])],
			["Des", $unserialize_params['destreza']],
			["Con", $unserialize_params['constituicao']],
			["Int", $unserialize_params['inteligencia']],
			["Sab", $unserialize_params['sabedoria']],
			["Car", $unserialize_params['carisma']]
			]);
	
	$testes_resistencia = helper_testes_de_resistencia_ded_rpg([
			["Fortitude ",$unserialize_params['fort']],
			["Reflexos ", $unserialize_params['refl']],
			["Vontade ", $unserialize_params['vont']]
			]);
	
	//regra do modificador = subtrai 10 e divide por 2
	$pvs = $personagem['lv']*($unserialize_params['constituicao']-10)/2;
	$attr = [
	//'<b>Dado de vida:</b>' 		=> "{$personagem['lv']}{$unserialize_params['dado_vida']}+$pvs ({$unserialize_params['pv']} pvs)",
	'<b>Caminho exemplar:</b>' 		=> "{$unserialize_params['caminho_exemplar']}",
	'<b>Destino épico:</b>' 		=> "{$unserialize_params['destino_epico']}",
	'<b>Tendencia:</b>' 			=> "{$unserialize_params['tendencia']}",
	'<b>Idade:</b>' 				=> "{$unserialize_params['idade']}",
	'<b>Altura:</b>' 				=> "{$unserialize_params['altura']}",
	'<b>Peso:</b>' 					=> "{$unserialize_params['peso']}",
	'<b>Divindade:</b>' 			=> "{$unserialize_params['divindade']}",
	'<b>Sexo:</b>' 					=> "{$unserialize_params['sexo']}",
	'<b>Região de origem:</b>' 		=> "{$unserialize_params['regiao_origem']}",
	'<b>Idiomas:</b>' 				=> "{$unserialize_params['idiomas']}",
	'<b>Iniciativa:</b>' 			=> "{$unserialize_params['iniciativa']}",
	'<b>Deslocamento:</b>' 			=> "{$unserialize_params['deslocamento']}",
	'<b>Intuição passiva:</b>' 		=> "{$unserialize_params['intuicao_passiva']}",
	'<b>Percepção passiv:</b>' 		=> "{$unserialize_params['percepcao_passiva']}",
	'<b>Pontos de :</b>' 			=> "{$unserialize_params['pv']}",
	'<b>Sangrando:</b>' 			=> "{$unserialize_params['sangrando']}",
	'<b>Pulso de cura:</b>' 		=> "{$unserialize_params['cura']}",
	'<b>Pulsos:</b>' 				=> "{$unserialize_params['dia']}",
	'<b>Pontos de ação:</b>' 		=> "{$unserialize_params['pts_acao']}",
	'<b>Classe de armadura:</b>' 	=> "{$unserialize_params['ca']}",
	'<b>Testes de resistência:</b>' => "{$testes_resistencia}",
	'<b>Bônus de ataque:</b>' 		=> "{$unserialize_params['ataque']}",
	'<b>Bônus de dano:</b>' 		=> "{$unserialize_params['dano']}",
	'<b>Pontos de experiência:</b>' => "{$unserialize_params['xp']}",
	'<b>Habilidades:</b>' 			=> "{$habilidades}",
	'<b>Perícias:</b>' 				=>  helper_check_value_presence($unserialize_params['pericias']),
	'<b>Ataques básicos:</b>' 		=> "{$unserialize_params['ataque']}",
	'<b>Aspectos raciais:</b>' 		=> "{$unserialize_params['aspectos_raciais']}",
	'<b>Talentos:</b>' 				=> "{$unserialize_params['talentos']}",
	'<b>Características de classe/trilha/destino:</b>' 		=> "{$unserialize_params['caracteristicas']}",
	'<b>Perícias:</b>' 					=> "{$unserialize_params['pericias']}",
	'<b>Poderes:</b>' 					=> "{$unserialize_params['poderes']}",
	'<b>Itens e equipamentos:</b>' 		=> "{$unserialize_params['equipamentos']}",
	'<b>Habilidades especiais:</b>' 	=> "{$unserialize_params['habilidades_especiais']}",
	'<b>Costumes e aparência:</b>' 		=> "{$unserialize_params['costumes']}",
	'<b>Traços e personalidades:</b>' 	=> "{$unserialize_params['tracos']}",
	];
	
	helper_show_header_attr_personagem($personagem);
	helper_show_body_attr_personagens($attr);
}

function helper_show_personagens_ded5_0(){
	
}

function helper_show_personagens_savage_worlds(){
	
}

function helper_show_rpg_system($rpg_system, $character){
	switch($rpg_system):
		case 'Dungeons and Dragons 3.5': helper_show_personagens_ded($character);
		break;
	
		case 'FATE': helper_show_personagens_fate($character);
		break;
		
		case 'Deamon': helper_show_personagens_deamon($character);
		break;
		
		case '3D&T': helper_show_personagens_3det($character);
		break;
		
		case 'Dungeons and Dragons 4.0': helper_show_personagens_ded4_0($character);
		break;
		
		case 'Dungeons and Dragons 5.0': helper_show_personagens_ded5_0($character);
		break;
		
		case 'Savage Worlds': helper_show_personagens_savage_worlds($character);
		break;
	endswitch;	
}

function helper_sow_artefatos($artefato){
	global $tag;
	
	$tag->h1('class="margin-zero"');
		$tag->imprime("{$artefato['nome']} <br><span class=\"small\">(ID {$artefato['id']}, Criador: {$artefato['dono']})</span>");
	$tag->h1;
	$tag->b();
		$tag->imprime("Raridade ({$artefato['raridade']})");
	$tag->br();
	$tag->b;
	$tag->imprime("<b>Nível indicado para uso:</b>{$artefato['lv']}");
	$tag->br();
	$tag->imprime("<b>Preço:</b>{$artefato['preco']}");
	$tag->br();
	$tag->imprime("<b>Sistema de RPG:</b>{$artefato['sistema']}");
	$tag->br();
	$tag->imprime("<b>Descrição:</b>{$artefato['descricao']}");
	$tag->br();
}

function helper_show_armaduras($armadura){
	global $tag;
	$attr = [
		'<b>Preço:</b>' 							=> 'preco', 
		'<b>Categoria:</b>' 						=> 'categoria', 
		'<b>Tipo de armadura:</b>' 					=> 'tipo', 
		'<b>Bônus de defesa/CA:</b>' 				=> 'bonusNaCa', 
		'<b>Comporta destreza até:</b>' 			=> 'destrezaMaxima',
		'<b>Chance de falha de Magia Arcana:</b>'	=> 'falhaDeMagiaArcana', 
		'<b>Deslocamento médio:</b>' 				=> 'deslocamentoMedio',
		'<b>Deslocamento pequeno:</b>' 				=> 'deslocamentoPequeno', 
		'<b>Esta armadura pesa:</b>' 				=> 'peso', 
		'<b>Descrição:</b>' 						=> 'descricao'
			];
	helper_show_header_attr($armadura);
	helper_show_body_attr($armadura, $attr);
	
	$tag->br();
}

function helper_show_armas($armas){
	global $tag;
	$attr = [
	'<b>Editado por:</b>' 			=> 'editado_por',
	'<b>Dano:</b>' 					=> 'dano',
	'<b>Preço:</b>' 				=> 'preco',
	'<b>Margem de decisivo:</b>' 	=> 'decisivo',
	'<b>Distância:</b>'			 	=> 'distancia',
	'<b>Peso:</b>' 					=> 'peso',
	'<b>Tipo:</b>' 					=> 'tipo',
	'<b>Categoria:</b>' 			=> 'categoria',
	'<b>Descrição:</b>'			 	=> 'descricao'
			];
	helper_show_header_attr($armas);
	helper_show_body_attr($armas, $attr);

	$tag->br();
}

function helper_show_talentos($talentos){
	global $tag;
	$attr = [
		'<b>Editado por:</b>' 		=> 'editado_por', 
		'<b>Classe:</b>' 			=> 'classe', 
		'<b>Pré requisito:</b>' 	=> 'pre_requisito',
		'<b>Descrição:</b>' 		=> 'descricao'
			];
	helper_show_header_attr($talentos);
	helper_show_body_attr($talentos, $attr);
	
	$tag->br();
}

function helper_show_pericias($pericias){
	global $tag;
	$attr = [
	'<b>Categoria:</b>' 			=> 'categoria',
	'<b>Habilidade chave:</b>' 		=> 'habilidade_chave ',
	'<b>Classes favorecidas:</b>' 	=> 'classe_favorecida',
	'<b>Descrição:</b>' 			=> 'descricao'
			];
	helper_show_header_attr($pericias);
	helper_show_body_attr($pericias, $attr);

	$tag->br();
}

function helper_show_magias($magias){
	global $tag;
	$attr = [
	'<b>Nível:</b>' 				=> 'circulo',
	'<b>Editado por:</b>' 			=> 'editado_por',
	'<b>Classe:</b>' 				=> 'classe',
	'<b>Componente:</b>' 			=> 'componente',
	'<b>Tempo de execução:</b>' 	=> 'tempo_execucao',
	'<b>Alcance:</b>' 				=> 'alcance',
	'<b>Área:</b>' 					=> 'area',
	'<b>Dano:</b>' 					=> 'dano',
	'<b>Alvo:</b>' 					=> 'alvo',
	'<b>Duração:</b>' 				=> 'duracao',
	'<b>Teste de resistência:</b>' 	=> 'teste_resistencia',
	'<b>Resistência a magia:</b>' 	=> 'resistencia_magia',
	'<b>Descrição:</b>' 			=> 'descricao'
			];
	helper_show_header_attr($magias);
	helper_show_body_attr($magias, $attr);

	$tag->br();
}

function helper_show_header_attr($object){
	global $tag;
	
	$tag->h1('class="margin-zero"');
		$tag->imprime("{$object[0]['nome']} <br><span class=\"small\">(ID {$object[0]['id']}, Criador: {$object[0]['dono']})</span>");
	$tag->h1;
	
	$tag->b();
		!empty($object[0]['lv'])?$tag->imprime("Indicada para personagem de {$object[0]['lv']}º Nível"):'';
		$tag->br();
		$tag->imprime("Sistema de Rpg ({$object[0]['sistema']})");
	$tag->b;
}

function helper_show_header_attr_personagem($object){
	global $tag;
	$unserialize_params = unserialize($object['dados']);
	
	$tag->h1('class="margin-zero"');
		$tag->imprime("{$object['nome']} <span class=\"small\">(ID {$object['id']}, Criador: {$object['dono']})</span>");
	$tag->h1;
	$tag->b();
		$tag->imprime("Sistema de Rpg: {$object['sistema']}");
		$raca = helper_check_value($object, 'raca');
		if($raca != ''):
			$tag->imprime("{$raca}, de {$object['lv']}º Nível");
			//$tag->br();
		endif;
		
		$tamanho = helper_check_value($object, 'tamanho');
		if($tamanho != '')
			$tag->imprime("Humanoide({$tamanho})");
	$tag->b;
}

function helper_show_body_attr($object, $attr){
	global $tag;
	
	foreach($attr as $key => $value):
		!empty($object[0][$value])?$tag->br():'';
		!empty($object[0][$value]) ? $tag->imprime("{$key} {$object[0][$value]}") : '';
	endforeach;	
}

function helper_show_body_attr_personagens($attr){
	global $tag;

	foreach($attr as $key => $value):
		!empty($value)?$tag->br():'';
		!empty($value)?$tag->imprime("{$key} {$value}"):'';
	endforeach;
}

function helper_prev_next($object, $id, $modulo){
	global $tag, $form, $modulos_path;
	$ids = [];
	$get_ids = $object->select($object->getTable());
	$current_position = 0;
	
	foreach($get_ids as $key => $value):
		if($value['id'] == $id) $current_position = $key;
		$ids[] = $value['id'];
	endforeach;
	
	$tag->br();
	
	$form->_col(5);
		$id_prev = array_key_exists($current_position-1, $ids) ? $ids[$current_position-1] : $current_position;
		if($id_prev == 0) $id_prev = $ids[count($ids)-1];	
		$tag->a('href="'.ROOTPATHURL.$modulos_path[$modulo].'view.php?id='.$id_prev.'" class="btn btn-primary"');
			$tag->imprime('<<< Anterior');
		$tag->a;

		$id_next = array_key_exists($current_position+1, $ids) ? $ids[$current_position+1] : $current_position;
		if($id_next == count($ids)) $id_next = 1;
		$tag->a('href="'.ROOTPATHURL.$modulos_path[$modulo].'view.php?id='.$id_next.'" class="btn btn-primary"');
			$tag->imprime('Próximo >>>');
		$tag->a;
	$form->col_();
}

function helper_name_of_form_fie($name){
	global $rpg_sistemas_arquivo_nome;
	return $rpg_sistemas_arquivo_nome[$name];
}

function helper_new_line_in_form(){
	global $form;
	$form->_col(12);
	$form->col_();
}

//3D&T
function helper_habilidades_3det_rpg($habilidades){
	$escala = '';
	$str = '';
	if(empty($habilidades[0][1])):
		return '';
	else:
		for($i=0; $i<count($habilidades); $i++):
			if($i == (count($habilidades)-1)):
				$str .= "{$habilidades[$i][0]} ".$habilidades[$i][1];
			else:
				$str .= "{$habilidades[$i][0]} ".$habilidades[$i][1]. ", ";
			endif;
		endfor;
	endif;
	return $str;
}

//D&D
function helper_testes_de_resistencia_ded_rpg($testes){
	$escala = '';
	$str = '';
	if(empty($testes[0][1])):
		return '';
	else:
		for($i=0; $i<count($testes); $i++):
			if($i == (count($testes)-1)):
				$str .= "{$testes[$i][0]} ".$testes[$i][1];
			else:
				$str .= "{$testes[$i][0]} ".$testes[$i][1]. ", ";
			endif;
		endfor;
	endif;
	return $str;
}

function helper_habilidades_ded_rpg($habilidades){
	$escala = '';
	$str = '';
	if(empty($habilidades[0][1])):
		return '';
	else:
		for($i=0; $i<count($habilidades); $i++):
			$modificador = (($habilidades[$i][1])-10)/2;
			if($i == (count($habilidades)-1)):
				$str .= "{$habilidades[$i][0]} ".$habilidades[$i][1]. "({$modificador})";
			else:
				$str .= "{$habilidades[$i][0]} ".$habilidades[$i][1]. "({$modificador}), ";
			endif;
		endfor;
	endif;
	return $str;
}

//FATE RPG
function helper_atitudes_fate_rpg($atitudes){
	$escala = '';
	$str = '';
	for($i=0; $i<count($atitudes); $i++):
		$escala = helper_escala_fate_rpg($atitudes[$i][1]);
		if($i == (count($atitudes)-1)):
			$str .= "{$atitudes[$i][0]}: ".$escala. "({$atitudes[$i][1]})";
		else:
			$str .= "{$atitudes[$i][0]}: ".helper_escala_fate_rpg($atitudes[$i][1]). "({$atitudes[$i][1]}), ";
		endif;
	endfor;
	return $str;
}

function helper_escala_fate_rpg($escala){
	$atitudes = ['-2'=>'Terrível', '-1'=>'Pobre', '0'=>'Medíocre', '1'=>'Médio', '2'=>'Razoável', '3'=>'Bom', '4'=>'Grande', '5'=>'Soberbo', '6'=>'Fantástico', '7'=>'Épico', '8'=>'Lendário'];
	return $atitudes[$escala];
}
/*
 * Helper
 * Fomulários em geral
 */

function helper_form_input($name, $parameters, $size = 4){
	global $tag, $form;
	$form->_col($size);
		$form->label($name);
		$form->input($parameters);
	$form->col_();
}

function helper_form_select_options($name, $parameters, $options, $size = 4){
	global $tag, $form;
	$form->_col($size);
		if(empty($name)):
		else:
			$form->label($name);
		endif;
		$form->select($parameters, $options);
	$form->col_();	
}

function helper_form_text_area($name, $parameters, $options = '', $size = 12){
	global $tag, $form;
	$form->_col($size);
		$form->label($name);
		$form->area($parameters, $options);
	$form->col_();
}

//************************************************************************************************************************************
//************************************************************************************************************************************
//************************************************************************************************************************************
//************************************************************************************************************************************
//************************************************************************************************************************************

/*
 * Helper
 * Formulários - especifico para o help rpg
 */

function helper_form_select_options_categoria($size = 4){
	global $tag, $form;
	$form->_col($size);
		$form->label("Categoria");
		$form->select(['class'=>'form-control', 'name'=>'categoria'], ['comum'=>'Arma Comum', 'exotica'=>'Arma Exótica', 'simples'=>'Arma Simples', 'tecnologica'=>'Arma Tecnológica']);
	$form->col_();
}

function helper_form_select_options_arma_tipo($size = 4){
	global $tag, $form;
	$form->_col($size);
		$form->label("Tipo");
		$form->select(['class'=>'form-control', 'name'=>'tipo'], ['atq_distancia'=>'Armas de Ataque à Distância', 'leve'=>'Armas Leves - Corpo a Corpo', 'uma_mao'=>'Armas de Uma Mão - Corpo a Corpo', 'duas_maos'=>'Armas de Duas Mãos - Corpo a Corpo']);
	$form->col_();
}

function helper_form_select_options_sistema($size = 4){
	global $tag, $form, $rpg_sistemas;
	$form->_col($size);
		$form->label("Sistema de jogo");
		$form->select(['class'=>'form-control selectpicker', "data-live-search" => "true", 'name'=>'sistema'], $rpg_sistemas);
	$form->col_();
}

function helper_form_text_field_descricao($size = 12){
	global $tag, $form;
	$form->_col($size);
		$form->label("Descrição");
		$form->area(['name' => 'descricao', 'class'=>'form-control', 'rows'=>'5']);
	$form->col_();
}

function helper_form_button_submit_and_back($path, $size = 4){
	global $tag, $form;
	$form->_col($size);
		$form->br();
		$form->link_button("Voltar", $path);
		echo "  ";
		$form->input_submit(['class'=>'btn btn-default', 'type'=>'submit', 'name'=>'action', 'value'=>'Cadastrar']);
	$form->col_();
}

function helper_form_button_update_and_back($path, $size = 4){
	global $tag, $form;
	$form->_col(4);
		$form->br();
		$form->link_button("Voltar", $path);
		echo "  ";
		$form->input_submit(['class'=>'btn btn-default', 'type'=>'submit', 'name'=>'action', 'value'=>'Atualizar']);
	$form->col_();
}