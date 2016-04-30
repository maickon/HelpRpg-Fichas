<!DOCTYPE html>
<?php
require_once '../class/tags/tags.php';
$tag = new Tag();

$tag->html();
    $tag->head();
        $tag->link(['href'=>'//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css', 'rel'=>'stylesheet']);
        //$tag->link(['href'=>'../css/fonts.css', 'rel'=>'stylesheet']);
        $tag->link(['href'=>'css/index.css', 'rel'=>'stylesheet']);
        $tag->link(['rel'=>'stylesheet', 'href'=>'//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css', ]);
    $tag->head;

    $tag->div(['class'=>'container']);
        $tag->div(['class'=>'row']);
            $tag->div(['class'=>'col-md-12']);
                $tag->h2();
                    $tag->printer('Gerador de Aventuras - Help RPG');
                $tag->h2;
                $tag->printer('|');
                $tag->a(['href'=>'../index.php']);
                    $tag->printer('Home');
                $tag->a;
                $tag->printer('|');
                 $tag->a(['href'=>'../aventuras-medieval/']);
                    $tag->printer('Aventura Medieval');
                $tag->a;
                $tag->printer('|');
                 $tag->a(['href'=>'../aventuras-apocaliptica/']);
                    $tag->printer('Aventura Apocaliptica');
                $tag->a;
                $tag->printer('|');
                 $tag->a(['href'=>'../aventuras-star-wars/']);
                    $tag->printer('Aventura Star Wars');
                $tag->a;
                $tag->printer('|');
            $tag->div;
            $tag->hr();
        $tag->div;