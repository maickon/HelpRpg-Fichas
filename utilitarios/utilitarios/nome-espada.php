<?php

require 'nome-espada/class/nome-espada.class.php';

$esp = new NomeEspada();

require 'menu.php';

$tag->br();
$tag->br();
$tag->br();

$path = 'nome-espada/class/txt/';
$data_primeiro_nome = [
        'object'=>$esp,
        'method'=>'gerar_nome',
        'path'=>$path.'primeiro-nome.txt',
        'title'=>'Gerador de nome de espada',
        'attr'=>'primeiro_nome'];


$esp->show_nome_test($data_primeiro_nome);

$data_segundo_nome = [
        'object'=>$esp,
        'method'=>'gerar_nome',
        'path'=>$path.'segundo-nome.txt',
        'title'=>'',
        'attr'=>'segundo_nome'];


$esp->show_nome_test($data_segundo_nome);
