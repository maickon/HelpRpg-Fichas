<?php
require 'header.php';
    $rpg_nomes = [ 
        'naves'               => 'Naves Espaciais',
        'super_herois'        => 'Super Heróis',
        'super_herois_pt_br'  => 'Super Heróis Br',
        'apelidos_ingles'     => 'Apelidos em inglês',
        'titulos_divinos'     => 'Títulos Divinos',
        'deuses'              => 'Deuses'  
        ];

    $tag->div(['class'=>'row-fluid']);
        require 'body.php';
    $tag->div;

require 'footer.php';
