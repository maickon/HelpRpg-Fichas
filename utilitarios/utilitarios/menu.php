<?php
require 'tags.class.php';
$tag = new Tag;

$menu = [
  ['label'=>'Home',                      'link'=>'index.php'],
  ['label'=>'Encontro',                  'link'=>'encontro-aleatorio.php'],
  ['label'=>'Itens',                        'link'=>'itens-estupidos.php'],
  ['label'=>'Cidades',                   'link'=>'peculiaridades-sociais.php'],
  ['label'=>'Sorte',                       'link'=>'sorte.php'],
  ['label'=>'Tempo',                     'link'=>'tempo.php'],
  ['label'=>'Nome de espada',      'link'=>'nome-espada.php'],
  ['label'=>'Arma mágica',           'link'=>'arma-magica.php']
];

foreach($menu as $value):
  $tag->a('href="'.$value['link'].'"');
          $tag->printer($value['label']." | ");
  $tag->a;
endforeach;
