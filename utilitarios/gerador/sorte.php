<?php

require_once '../sorte/class/sorte.class.php';

$s = new Sorte();
$tipos = [
	'tipo1'		=>'Sorteado',
	'tipo2'		=>'Você',
	'tipo3'		=>'Seu amor',
	'tipo4'		=>'Seu melhor amigo',
	'tipo5'		=>'Uma pessoa próxima',
	'tipo6'		=>'Seu inimigo',
	'tipo7'		=>'Seu rival',
	'tipo8'		=>'Um familiar',
	'tipo9'		=>'A próxima pessoa que tocar',
	'tipo10'	=>'A pessoa que esbarrar em você',
	'tipo11'	=>'A próxima pessoa que você vai conhecer',
	'tipo12'	=>'Uma mulher',
	'tipo13'	=>'Um homem'
	];

if($_POST['sorte'] == 'tipo1'):
	$s->gerar_sorte('../sorte/class/txt/acontecimento.txt', 'Acontecimento', 'acontecimento');
	$s->gerar_sorte('../sorte/class/txt/sorte-afetado.txt', 'Pessoa afetada', 'afetado');
else:
	$s->gerar_sorte('../sorte/class/txt/acontecimento.txt', 'Acontecimento', 'acontecimento');
	$s->afetado = $tipos[$_POST['sorte']];
endif;

$sorte = [$s->afetado, $s->acontecimento];
echo json_encode($sorte);