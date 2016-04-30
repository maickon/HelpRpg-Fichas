<!DOCTYPE html>
<?php
require_once '../class/tags/tags.php';
require_once '../../helpRpg/class/view/form.class.php';
$tag = new Tag();
$form = new Form(); 

$tag->html();
    $tag->head();
        $tag->link(['href'=>'//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css', 'rel'=>'stylesheet']);
        $tag->link(['href'=>'css/index.css', 'rel'=>'stylesheet']);
        $tag->link(['rel'=>'stylesheet', 'href'=>'//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css', ]);
    $tag->head;

    $tag->div(['class'=>'container']);
        $tag->div(['class'=>'row']);
            $tag->div(['class'=>'col-md-12']);
                $tag->h2();
                    $tag->printer('Encontro aleatório - Help RPG');
                $tag->h2;
                $menu = [
                    ['label'=>'Home', 'link'=>'../'],
                    ['label'=>'Cidade', 'link'=>'../'],
                    ['label'=>'Alto mar', 'link'=>'../'],
                    ['label'=>'Estrada', 'link'=>'../'],
                    ['label'=>'Montanha', 'link'=>'../'],
                    ['label'=>'Floresta', 'link'=>'../'],
                    ['label'=>'Deserto', 'link'=>'../'],
                ];
                $tag->printer('|');
                $tag->a(['href'=>'../index.php']);
                    $tag->printer('Home');
                $tag->a;
                $tag->printer('|');
                $tag->printer('Criado por Maickon Rangel - ');
                 $tag->a(['href'=>'#']);
                    $tag->printer('helprpg.com.br');
                $tag->a;
            $tag->div;
            $tag->hr();
        $tag->div;
    $tag->div;


      