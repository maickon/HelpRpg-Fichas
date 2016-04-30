<?php

require 'arma-magica/class/arma-magica.class.php';

$a = new ArmaMagica();

require 'menu.php';

$tag->br();
$tag->br();
$tag->br();

$path = 'arma-magica/class/txt/';
$data_arma = [
        'object'=>$a,
        'method'=>'gerar_arma',
        'path'=>$path.'arma.txt',
        'title'=>'Armas - Gerando uma arma mágica',
        'attr'=>'arma'];


$a->show_arma_test($data_arma);

$data_habilidade = [
        'object'=>$a,
        'method'=>'gerar_arma',
        'path'=>$path.'habilidade-magica.txt',
        'title'=>'',
        'attr'=>'habilidade_magica'];


$a->show_arma_test($data_habilidade);
