<?php

require_once '../../header.php';
require_once '../helper.php';

global $s;
new Components('menu', $parametros);
$form = new Form();

$tag->br();

$form->_row();
	$form->_container();		
		
		require_once 'data.php';	
	
		$registro_total = ($qtd_armas+$qtd_armaduras+$qtd_artefatos+$qtd_magias+$qtd_pericias+$qtd_talentos+
						   $qtd_personagem_jogador+$qtd_personagem_boss+$qtd_personagem_monstro+$qtd_aventuras+
						   $qtd_contos+$qtd_cronicas+$qtd_historias);
		
		$data_user = [
						["Ficha pessoais", "personagens",$current_personagem_jogador, ROOTPATHURL.PERSONAGEMPATH],
						["Chefes de Fase", "Npcs",$current_personagem_boss, ROOTPATHURL.PERSONAGEMPATH],
						["Monstros", "Monstros",$current_personagem_monstro, ROOTPATHURL.PERSONAGEMPATH],
						["Suas armas", "armas",$current_armas, ROOTPATHURL.ARMASPATH],
						["Suas armaduras", "armaduras", $current_armaduras, ROOTPATHURL.ARMADURASPATH],
						["Seus artefatos", "artefatos", $current_artefatos, ROOTPATHURL.ARTEFATOSPATH],
						["Seus magias", "magias", $current_magias, ROOTPATHURL.MAGIASPATH],
						["Seus perícias", "pericias", $current_pericias, ROOTPATHURL.ARTEFATOSPATH],
						["Seus talentos", "talentos", $current_talentos, ROOTPATHURL.TALENTOSPATH],
						["Suas aventuras", "aventuras", $current_aventuras, ROOTPATHURL.AVENTURASPATH],
						["Seus contos", "contos", $current_contos, ROOTPATHURL.CONTOSPATH],
						["Sas crônicas", "cronicas", $current_contos, ROOTPATHURL.CRONICASPATH],
						["Suas histórias", "historias", $current_contos, ROOTPATHURL.HISTORIASPATH]
					];
		
		$form->_col(12);
			$form->h3("Fala {$current_user[0]['nome']}, Blz? Seja bem vindo ao Help Rpg Fichas");
			$tag->hr();
			$current_data = helper_current_data();
			$tag->imprime("Você se cadastrou no dia ".date("d/m/Y", strtotime($current_user[0]['criado_em'])));
			$tag->imprime("Atualmente você tem <b>{$registro_total}</b> registros em nossa base de dados.");
			$tag->br();
			$tag->br();
			$tag->br();
			for($i=0; $i<count($data_user); $i++):
				helper_panel_data_user($data_user[$i][0], $data_user[$i][1], $data_user[$i][2], $data_user[$i][3]);
			endfor;
		$form->col_();
	$form->_container();
$form->row_();
$tag->div;
require_once '../../footer.php';
