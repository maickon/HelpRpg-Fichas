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
'boss'			=> BOSSPATH,
'monstros'		=> MONSTROPATH,
'usuarios'		=> USERPATH,
'aventuras'		=> AVENTURASPATH
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

function helper_check_value($objeto, $key, $unserialize = null){
	global $unserialize_monstro, $unserialize_personagem;
	$unserialize = null;
	if($objeto['tipo'] == 'Monstro'):
		$unserialize = $unserialize_monstro;
	else:
		$unserialize = $unserialize_personagem;
	endif;
	

	if($objeto == null):
		return '';
	elseif(array_key_exists($key, $objeto)):
		return $objeto[$key];
	else:
		return $unserialize[$key];
	endif;	
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
/*
 * Helper para exibir cada ficha conforme o sistema de RPG
 */

function helper_show_header_attr_personagem($object){
	global $tag;
	$unserialize_params = unserialize($object['dados']);
	
	$tag->h1('class="margin-zero"');
		$tag->imprime("{$object['nome']} <span class=\"small\"><br>(Código #{$object['id']}, Criador: {$object['dono']})</span>");
	$tag->h1;
	$tag->b();
		$tag->imprime("Sistema de Rpg: {$object['sistema']}");
		$tag->br();
		$tag->imprime("<b>{$object['classe']} ({$object['raca']})</b>");
		if(isset($object['lv']))
			$tag->imprime("de {$object['lv']}º Nível");
	$tag->b;
}

function mod($value){
	$mod = abs( intval( ($value-10)/2));
	if(intval($mod) > 0):
		return "+{$mod}";
	elseif(intval($mod) < 0):
		return "-{$mod}";
	else:
		return '0';
	endif;
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
	global $tag, $form;
	
	$tag->div('class="col-md-12 header_itens"');
		$form->_row();
			$form->_col(6);
				$tag->imprime($form->bold(ARMADURA_NOME).' '.$form->bold($artefato['nome']));
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(CODIGO).$form->bold($artefato['id']));
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(CRIADOR).' '.$form->bold($artefato['dono']));
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(INDICADA_AO_NIVEL).' '.$form->bold($artefato['lv']));
			$form->col_();
			$form->_col(6);
				$tag->imprime(SISTEMA_DE_RPG.' '.$artefato['sistema']);
			$form->col_();
			if($artefato['editado_por']):
				$form->_col(6);
					$tag->imprime($artefato['editado_por']);
				$form->col_();
			endif;
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body1_itens"');
		$form->_row();
			$form->_col(6);
				$tag->imprime($form->bold(PRECO).': '.$artefato['raridade']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(CATEGORIA_ARMADURA).': '.$artefato['preco']);
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body2_itens border-button"');
		$form->_row();
			$form->_col(12);
				$tag->imprime($form->bold(DESCRICAO).': '.$artefato['descricao']);
			$form->col_();
		$form->row_();
	$tag->div;
}

function helper_show_armaduras($armadura){
	global $tag, $form;
	$armadura = $armadura[0];
	
	$tag->div('class="col-md-12 header_itens"');
		$form->_row();
			$form->_col(6);
				$tag->imprime($form->bold(ARMADURA_NOME).' '.$form->bold($armadura['nome']));
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(CODIGO).$form->bold($armadura['id']));
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(CRIADOR).' '.$form->bold($armadura['dono']));
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(INDICADA_AO_NIVEL).' '.$form->bold($armadura['lv']));
			$form->col_();
			$form->_col(6);
				$tag->imprime(SISTEMA_DE_RPG.' '.$armadura['sistema']);
			$form->col_();
			if($armadura['editado_por']):
				$form->_col(6);
					$tag->imprime($armadura['editado_por']);
				$form->col_();
			endif;
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body1_itens"');
		$form->_row();
			$form->_col(6);
				$tag->imprime($form->bold(PRECO).': '.$armadura['custo']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(CATEGORIA_ARMADURA).': '.$armadura['categoria']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(TIPO_DE_ARMADURA).': '.$armadura['tipo']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(BONUS_DE_DEFESA).': '.$armadura['bonusNaCa']);
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body2_itens"');
		$form->_row();
			$form->_col(6);
				$tag->imprime($form->bold(COMPORTA_DESTREZA).': '.$armadura['destrezaMaxima']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(CHANCE_DE_FALHA_MAGIA).': '.$armadura['falhaDeMagiaArcana']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(DESLOCAMENTO_MEDIO).': '.$armadura['deslocamentoMedio']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(PESO_ARMADURA).': '.$armadura['peso']);
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body2_itens border-button"');
		$form->_row();
			$form->_col(12);
				$tag->imprime($form->bold(DESCRICAO_ARMADURA).'<br>'.$armadura['descricao']);
			$form->col_();
		$form->row_();
	$tag->div;
}

function helper_show_armas($armas){
	global $tag, $form;
	$armas = $armas[0];
	
	$tag->div('class="col-md-12 header_itens"');
		$form->_row();
			$form->_col(6);
				$tag->imprime($form->bold(ARMADURA_NOME).' '.$form->bold($armas['nome']));
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(CODIGO).$form->bold($armas['id']));
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(CRIADOR).' '.$form->bold($armas['dono']));
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(INDICADA_AO_NIVEL).' '.$form->bold($armas['lv']));
			$form->col_();
			$form->_col(6);
				$tag->imprime(SISTEMA_DE_RPG.' '.$armas['sistema']);
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body1_itens"');
		$form->_row();
			$form->_col(6);
				$tag->imprime($form->bold(DANO).': '.$armas['dano']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(PRECO_ARMA).': '.$armas['preco']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(DECISIVO).': '.$armas['decisivo']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(DISTANCIA).': '.$armas['distancia']);
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body2_itens"');
		$form->_row();
			$form->_col(12);
				$tag->imprime($form->bold(TIPO_ARMA).': '.$armas['tipo']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(PESO).': '.$armas['peso']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(CATEGORIA_ARMADURA).': '.$armas['categoria']);
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body2_itens border-button"');
		$form->_row();
			$form->_col(12);
				$tag->imprime($form->bold(DESCRICAO).'<br>'.$armas['descricao']);
			$form->col_();
		$form->row_();
	$tag->div;
}

function helper_show_talentos($talentos){
	global $tag, $form;
	$talentos = $talentos[0];
	
	$tag->div('class="col-md-12 header_itens"');
		$form->_row();
			$form->_col(6);
				$tag->imprime($form->bold(ARMADURA_NOME).' '.$form->bold($talentos['nome']));
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(CODIGO).$form->bold($talentos['id']));
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(CRIADOR).' '.$form->bold($talentos['dono']));
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(INDICADA_AO_NIVEL).' '.$form->bold($talentos['lv']));
			$form->col_();
			$form->_col(6);
				$tag->imprime(SISTEMA_DE_RPG.' '.$talentos['sistema']);
			$form->col_();
		$form->row_();
	$tag->div;

	$tag->div('class="col-md-12 body1_itens"');
		$form->_row();
			$form->_col(6);
				$tag->imprime($form->bold(TALENTO_CLASSE).': '.$talentos['classe']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(PRE_REQUISITO).': '.$talentos['pre_requisito']);
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body2_itens border-button"');
		$form->_row();
			$form->_col(12);
				$tag->imprime($form->bold(DESCRICAO).'<br>'.$talentos['descricao']);
			$form->col_();
		$form->row_();
	$tag->div;
}

function helper_show_pericias($pericias){
	global $tag, $form;
	$pericias = $pericias[0];
	
	$tag->div('class="col-md-12 header_itens"');
		$form->_row();
			$form->_col(6);
				$tag->imprime($form->bold(PERICIA).' '.$form->bold($pericias['nome']));
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(CODIGO).$form->bold($pericias['id']));
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(CRIADOR).' '.$form->bold($pericias['dono']));
			$form->col_();
			$form->_col(6);
				$tag->imprime(SISTEMA_DE_RPG.' '.$pericias['sistema']);
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body1_itens"');
		$form->_row();
			$form->_col(6);
				$tag->imprime($form->bold(CATEGORIA_PERICIA).': '.$pericias['categoria']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(HABILIDADE_CHAVE).': '.$pericias['habilidade_chave']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(CLASSE_FAVORECIDA).': '.$pericias['classe_favorecida']);
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body2_itens border-button"');
		$form->_row();
			$form->_col(12);
				$tag->imprime($form->bold(DESCRICAO).'<br>'.$pericias['descricao']);
			$form->col_();
		$form->row_();
	$tag->div;

	$tag->br();
}

function helper_show_magias($magias){
	global $tag,$form;
	$magias = $magias[0];
	
	$tag->div('class="col-md-12 header_itens"');
		$form->_row();
			$form->_col(6);
				$tag->imprime($form->bold(MAGIA_NOME).' '.$form->bold($magias['nome']));
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(CODIGO).$form->bold($magias['id']));
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(CRIADOR).' '.$form->bold($magias['dono']));
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(INDICADA_AO_NIVEL).' '.$form->bold($magias['lv']));
			$form->col_();
			$form->_col(6);
				$tag->imprime(SISTEMA_DE_RPG.' '.$magias['sistema']);
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body1_itens"');
		$form->_row();
			$form->_col(6);
				$tag->imprime($form->bold(CIRCULO).': '.$magias['circulo']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(CLASSE).': '.$magias['classe']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(COMPONENTE).': '.$magias['componente']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(TEMPO_EXECUCAO).': '.$magias['tempo_execucao']);
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body2_itens"');
		$form->_row();
			$form->_col(6);
				$tag->imprime($form->bold(ALCANCE).': '.$magias['alcance']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(AREA).': '.$magias['area']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(DANO).': '.$magias['dano']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(ALVO).': '.$magias['alvo']);
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body1_itens border-button"');
		$form->_row();
			$form->_col(12);
				$tag->imprime($form->bold(TESTES_RESISTENCIA).': '.$magias['teste_resistencia']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(RESISTENCIA_MAGIA).': '.$magias['resistencia_magia']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(DURACAO).': '.$magias['duracao']);
			$form->col_();
			$form->_col(12);
				$tag->imprime($form->bold(DESCRICAO).'<br>'.$magias['descricao']);
			$form->col_();
		$form->row_();
	$tag->div;
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
		if($value == '' || $value == '-'):
		else:
			!empty($value)?$tag->br():'';
			!empty($value)?$tag->imprime("{$key} {$value}"):'';
		endif;
	endforeach;
}

function helper_prev_next($object, $id, $modulo, $tipo = null){
	global $tag, $form, $modulos_path;
	$ids = [];
	if($tipo != null):
		$get_ids = $object->select($object->getTable(),null,[ ['tipo','=', $tipo] ]);
	else:
		$get_ids = $object->select($object->getTable());
	endif;
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
		if($id_next == $ids[count($ids)-1]) $id_next = $ids[0];
		$tag->a('href="'.ROOTPATHURL.$modulos_path[$modulo].'view.php?id='.$id_next.'" class="btn btn-primary"');
			$tag->imprime('Próximo >>>');
		$tag->a;
	$form->col_();
}

function helper_adsense(){
	global $tag, $s;
	$tag->div('class="adsense"');
		if(!$s->exist('nome')):
			$baners = [
					'<div class="banner-center">
						<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
						<!-- anuncio_3 -->
						<ins class="adsbygoogle"
						     style="display:inline-block;width:728px;height:90px"
						     data-ad-client="ca-pub-3010334569259161"
						     data-ad-slot="2027312537"></ins>
						<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
						</script>
					</div>',
					'<div class="banner-center">
						<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
						<!-- anuncio_2 -->
						<ins class="adsbygoogle"
						     style="display:inline-block;width:728px;height:90px"
						     data-ad-client="ca-pub-3010334569259161"
						     data-ad-slot="9550579333"></ins>
						<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
						</script>
					</div>',
					'<div class="banner-center">
						<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
						<!-- anuncio_1 -->
						<ins class="adsbygoogle"
						     style="display:inline-block;width:728px;height:90px"
						     data-ad-client="ca-pub-3010334569259161"
						     data-ad-slot="8073846133"></ins>
						<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
						</script>
					</div>'
					];
			$tag->imprime($baners[rand(0, count($baners)-1)]);
		endif;
	$tag->div;	
}

function helper_name_of_form_file($name){
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

//Deamon RPG
function helper_atitudes_deamon_rpg($habilidades){
	$escala = '';
	$str = '';
	if(empty($habilidades[0][1])):
		return '';
	else:
		for($i=0; $i<count($habilidades); $i++):
			$modificador = (($habilidades[$i][1])*4);
			if($i == (count($habilidades)-1)):
				$str .= "{$habilidades[$i][0]} ".$habilidades[$i][1]. " ({$modificador}%)";
			else:
				$str .= "{$habilidades[$i][0]} ".$habilidades[$i][1]. " ({$modificador}%), ";
			endif;
		endfor;
	endif;
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
		$form->label($name, ['id' => 'label_'.$parameters['name']]);
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
		$form->select(['class'=>'form-control selectpicker', 'id'=>'sistema_de_jogo', 'onchange'=>'select_form(this.value);', "data-live-search" => "true", 'name'=>'sistema'], $rpg_sistemas);
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

require 'personagens/views/3det.php';
require 'personagens/views/d20-ded-4.0.php';
require 'personagens/views/d20-ded-5.0.php';
require 'personagens/views/d20-ded.php';
require 'personagens/views/daemon.php';
require 'personagens/views/savage_worlds.php';
require 'personagens/views/fate.php';
require 'monstros/views/d20-ded.php';