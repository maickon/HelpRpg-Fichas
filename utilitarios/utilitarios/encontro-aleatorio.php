<?php
require 'encontros-aleatorio/class/encontro.class.php';

require 'menu.php';

$s = new Encontros();

$tag->br();
$tag->br();
$tag->br();

$path = 'encontros-aleatorio/class/txt/';
$data_cidade = [
        'object'=>$s,
        'method'=>'gerar_encontro',
        'path'=>$path.'viagem-cidade.txt',
        'title'=>'Encontro aleatório em cidades',
        'attr'=>'cidade'];
//-------------------------------------------------------------------
$data_maritmo = [
        'object'=>$s,
        'method'=>'gerar_encontro',
        'path'=>$path.'viagem-maritima.txt',
        'title'=>'Encontro aleatório em alto mar',
        'attr'=>'maritima'];
//-------------------------------------------------------------------
$data_estrada = [
        'object'=>$s,
        'method'=>'gerar_encontro',
        'path'=>$path.'/viagem-estrada.txt',
        'title'=>'Encontro aleatório em uma estrada',
        'attr'=>'estrada'];
//-------------------------------------------------------------------
$data_montanha = [
        'object'=>$s,
        'method'=>'gerar_encontro',
        'path'=>$path.'/viagem-montanha.txt',
        'title'=>'Encontro aleatório em uma montanha',
        'attr'=>'montanha'];
//-------------------------------------------------------------------
$data_floresta = [
        'object'=>$s,
        'method'=>'gerar_encontro',
        'path'=>$path.'/viagem-floresta.txt',
        'title'=>'Encontro aleatório em uma florestar',
        'attr'=>'floresta'];
//-------------------------------------------------------------------
$data_deserto = [
        'object'=>$s,
        'method'=>'gerar_encontro',
        'path'=>$path.'/viagem-deserto.txt',
        'title'=>'Encontro aleatório em um deserto',
        'attr'=>'deserto'];

$s->show_encontro_test($data_cidade);
$s->show_encontro_test($data_maritmo);
$s->show_encontro_test($data_estrada);
$s->show_encontro_test($data_montanha);
$s->show_encontro_test($data_floresta);
$s->show_encontro_test($data_deserto);
