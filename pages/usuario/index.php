<?php

require_once '../../header.php';
require_once '../helper.php';

global $s;
new Components('menu', $parametros);
$form = new Form();

$tag->br();

$form->_row();
	$form->_container();		
		$user = new Usuarios();
		$nome = $s->get_session('nome');
		$current_user = $user->select('usuarios', null, [['nome','=', $nome ? $nome : ' ']]);

		$personagem_jogador = new Personagens('');
		$current_personagem_jogador = $personagem_jogador->select('personagens', null, [['dono','=', $nome ? $nome : ' '], ['tipo','=', 'Personagem jogador'] ]);
		$qtd_personagem_jogador = count($current_personagem_jogador);
		
		$personagem_boss = new Personagens('');
		$current_personagem_boss = $personagem_boss->select('personagens', null, [['dono','=', $nome ? $nome : ' '], ['tipo','=', 'Boss'] ]);
		$qtd_personagem_boss = count($current_personagem_boss);
		
		$personagem_monstro = new Personagens('');
		$current_personagem_monstro = $personagem_monstro->select('personagens', null, [['dono','=', $nome ? $nome : ' '], ['tipo','=', 'Monstro'] ]);
		$qtd_personagem_monstro = count($current_personagem_monstro);
		
		$armas = new Armas('');
		$current_armas = $user->select('armas', null, [['dono','=', $nome ? $nome : ' ']]);
		$qtd_armas = count($current_armas);
		
		$armaduras = new Armaduras('');
		$current_armaduras = $user->select('armaduras', null, [['dono','=', $nome ? $nome : ' ']]);
		$qtd_armaduras = count($current_armaduras);
		
		$artefatos = new Artefatos('');
		$current_artefatos = $user->select('artefatos', null, [['dono','=', $nome ? $nome : ' ']]);
		$qtd_artefatos = count($current_artefatos);
		
		$magias = new Magias('');
		$current_magias = $user->select('magias', null, [['dono','=', $nome ? $nome : ' ']]);
		$qtd_magias = count($current_magias);
		
		$paricias = new Pericias('');
		$current_pericias = $user->select('pericias', null, [['dono','=', $nome ? $nome : ' ']]);
		$qtd_pericias = count($current_pericias);
		
		$talentos = new Talentos('');
		$current_talentos = $user->select('talentos', null, [['dono','=', $nome ? $nome : ' ']]);
		$qtd_talentos = count($current_talentos);
		
		$registro_total = ($qtd_armas+$qtd_armaduras+$qtd_artefatos+$qtd_magias+$qtd_pericias+$qtd_talentos+
						   $qtd_personagem_jogador+$qtd_personagem_boss+$qtd_personagem_monstro);
		
		$data_user = [
						["Ficha pessoais", "personagens",$current_personagem_jogador, ROOTPATHURL.PERSONAGEMPATH],
						["Chefes de Fase", "Npcs",$current_personagem_boss, ROOTPATHURL.PERSONAGEMPATH],
						["Monstros", "Monstros",$current_personagem_monstro, ROOTPATHURL.PERSONAGEMPATH],
						["Suas armas", "armas",$current_armas, ROOTPATHURL.ARMASPATH],
						["Suas armaduras", "armaduras", $current_armaduras, ROOTPATHURL.ARMADURASPATH],
						["Seus artefatos", "artefatos", $current_artefatos, ROOTPATHURL.ARTEFATOSPATH],
						["Seus magias", "magias", $current_magias, ROOTPATHURL.MAGIASPATH],
						["Seus perícias", "pericias", $current_pericias, ROOTPATHURL.ARTEFATOSPATH],
						["Seus talentos", "talentos", $current_talentos, ROOTPATHURL.TALENTOSPATH]
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

require_once '../../footer.php';
