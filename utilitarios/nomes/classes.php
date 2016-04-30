<?php
require 'header.php';
    $rpg_nomes = [ 
        'goticos'             => 'Gótico',
        'piratas'             => 'Piratas',
        'reis'                => 'Reis'
        ];

    $tag->div(['class'=>'row-fluid']);
        require 'body.php';
    $tag->div;

require 'footer.php';
