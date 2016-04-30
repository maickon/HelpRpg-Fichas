<?php
require 'header.php';
    $rpg_nomes = [
        'vilarejos'           => 'Vilarejos',
        'cidades'             => 'Cidades',
        'reinos'              => 'Reinos',
        'planetas'            => 'Planetas',
        'constelacoes'        => 'Constelações',
        'galaxias'            => 'Galáxias'
        ];

    $tag->div(['class'=>'row-fluid']);
        require 'body.php';
    $tag->div;

require 'footer.php';
