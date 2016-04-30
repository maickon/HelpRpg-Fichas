<!DOCTYPE html>
<?php
require_once '../class/tags/tags.php';
$tag = new Tag();

$tag->html();
    $tag->head();
        $tag->link(['href'=>'//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css', 'rel'=>'stylesheet']);
        $tag->link(['href'=>'../css/fonts.css', 'rel'=>'stylesheet']);
        $tag->link(['href'=>'css/index.css', 'rel'=>'stylesheet']);
        $tag->link(['rel'=>'stylesheet', 'href'=>'//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css', ]);
    $tag->head;

    $tag->div(['class'=>'container']);
        $tag->div(['class'=>'row']);
            $tag->div(['class'=>'col-md-12']);
                $tag->h2();
                    $tag->printer('Gerador de nomes - Help RPG');
                $tag->h2;
                $tag->printer('|');
                $tag->a(['href'=>'../index.php']);
                    $tag->printer('Home');
                $tag->a;
                $tag->printer('|');
                 $tag->a(['href'=>'lugares.php']);
                    $tag->printer('Lugares');
                $tag->a;
                $tag->printer('|');
                 $tag->a(['href'=>'classes.php']);
                    $tag->printer('Classes');
                $tag->a;
                $tag->printer('|');
                 $tag->a(['href'=>'../nomes/']);
                    $tag->printer('Raças');
                $tag->a;
                $tag->printer('|');
                 $tag->a(['href'=>'culturais.php']);
                    $tag->printer('Culturais');
                $tag->a;
                $tag->printer('|');
                 $tag->a(['href'=>'outros.php']);
                    $tag->printer('Outros');
                $tag->a;
                $tag->printer('|');
            $tag->div;
            $tag->hr();
        $tag->div;