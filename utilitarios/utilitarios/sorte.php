<?php

require 'sorte/class/sorte.class.php';

$s = new Sorte();

require 'menu.php';

$tag->br();
$tag->br();
$tag->br();

$path = 'sorte/class/txt/';
$data_afetado = [
        'object'=>$s,
        'method'=>'gerar_sorte',
        'path'=>$path.'sorte-afetado.txt',
        'title'=>'Sorte - Lendo o futuro de um personagem',
        'attr'=>'afetado'];


$s->show_sorte_test($data_afetado);

$data_acontecimento = [
        'object'=>$s,
        'method'=>'gerar_sorte',
        'path'=>$path.'acontecimento.txt',
        'title'=>'',
        'attr'=>'acontecimento'];


$s->show_sorte_test($data_acontecimento);
