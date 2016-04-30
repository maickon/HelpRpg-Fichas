<?php

require 'tempo/class/tempo.class.php';

$t = new Tempo();

require 'menu.php';

$tag->br();
$tag->br();
$tag->br();

$path = 'tempo/class/txt/';
$data_temperatura = [
        'object'=>$t,
        'method'=>'gerar_tempo',
        'path'=>$path.'temperatura.txt',
        'title'=>'Gerador de Tempo para aventuras',
        'attr'=>'temperatura'];

$t->show_tempo_test($data_temperatura);

$data_vento = [
        'object'=>$t,
        'method'=>'gerar_tempo',
        'path'=>$path.'vento.txt',
        'title'=>'',
        'attr'=>'vento'];

$t->show_tempo_test($data_vento);


$data_precipitacao = [
        'object'=>$t,
        'method'=>'gerar_tempo',
        'path'=>$path.'precipitacao.txt',
        'title'=>'',
        'attr'=>'precipitacao'];

$t->show_tempo_test($data_precipitacao);
