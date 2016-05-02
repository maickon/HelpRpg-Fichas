<!DOCTYPE html>
<?php
require_once "{$_SERVER['DOCUMENT_ROOT']}/HelpRpg/class/view/tags.class.php";
require_once "{$_SERVER['DOCUMENT_ROOT']}/HelpRpg/rotas/rotas-url.php";
$tag = new Tags();

$tag->html();
    $tag->head();
        $tag->link(['href'=>ROOTPATHURL.CSSPATH.'bootstrap.min.css', 'rel'=>'stylesheet']);
        $tag->link(['href'=>'css/index.css', 'rel'=>'stylesheet']);
        $tag->link(['rel'=>'stylesheet', 'href'=>ROOTPATHURL.CSSPATH.'bootstrap-select.css', ]);
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
                $tag->printer('Criado por Maickon Rangel - ');
                 $tag->a(['href'=>ROOTPATHURL]);
                    $tag->printer('helprpg.com.br');
                $tag->a;
            $tag->div;
            $tag->hr();
        $tag->div;