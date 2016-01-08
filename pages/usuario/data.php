<?php
global $s;

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

$aventuras = new Aventuras('');
$current_aventuras = $user->select('aventuras', null, [['dono','=', $nome ? $nome : ' ']]);
$qtd_aventuras = count($current_aventuras);

$contos = new Contos('');
$current_contos = $user->select('contos', null, [['dono','=', $nome ? $nome : ' ']]);
$qtd_contos = count($current_contos);

$cronicas = new Cronicas('');
$current_cronicas = $user->select('cronicas', null, [['dono','=', $nome ? $nome : ' ']]);
$qtd_cronicas = count($current_cronicas);

$historias = new Historias('');
$current_historias = $user->select('historias', null, [['dono','=', $nome ? $nome : ' ']]);
$qtd_historias = count($current_historias);