<?php

require 'peculiaridades-sociais/class/peculiaridades-sociais.class.php';

$p = new PeculiaridadesSociais();

require 'menu.php';

$tag->br();
$tag->br();
$tag->br();

$path = 'peculiaridades-sociais/class/txt/';
$data_sociais = [
        'object'=>$p,
        'method'=>'gerar_aspecto',
        'path'=>$path.'peculiaridades-sociais.txt',
        'title'=>'Um tipo de perfil para uma sociedade',
        'attr'=>'descricao'];

$p->show_aspecto_test($data_sociais);
