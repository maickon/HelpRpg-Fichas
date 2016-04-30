<?php

require 'itens/class/itens.class.php';

$i = new ItensEstupidos();

require 'menu.php';

$tag->br();
$tag->br();
$tag->br();

$path = 'itens/class/txt/';
$data_itens = [
        'object'=>$i,
        'method'=>'gerar_item_estupido',
        'path'=>$path.'itens.txt',
        'title'=>'Um item estúpido aleatório',
        'attr'=>'descricao'];

$i->show_item_estupido_test($data_itens);
