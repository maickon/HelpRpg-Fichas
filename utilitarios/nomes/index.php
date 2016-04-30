<?php
require 'header.php';
    $rpg_nomes = [
        'animais'             => 'Animais de Estimação',
        'anjos'               => 'Anjos',
        'demonios'            => 'Demônios',
        'anoes'               => 'Anões',
        'elfos'               => 'Elfos',
        'halflings'           => 'Halfling',
        'hobbits'             => 'Hobbits',
        'orcs'                => 'Orcs',
        'homens_ratos'        => 'Homen Rato',
        'humanos_feminino'    => 'Humanos - Mulheres',
        'humanos_masculino'   => 'Humanos - Homens',
        ];

    $tag->div(['class'=>'row-fluid']);
        require 'body.php';
    $tag->div;

require 'footer.php';
