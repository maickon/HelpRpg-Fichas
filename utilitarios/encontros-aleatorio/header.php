<!DOCTYPE html>
<?php
require_once "{$_SERVER['DOCUMENT_ROOT']}/HelpRpg/class/view/tags.class.php";
require_once "{$_SERVER['DOCUMENT_ROOT']}/HelpRpg/class/view/form.class.php";
require_once "{$_SERVER['DOCUMENT_ROOT']}/HelpRpg/rotas/rotas-url.php";
$tag = new Tags();
$form = new Form(); 

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
                 $tag->a(['href'=>ROOTPATHURL]);
                    $tag->printer('helprpg.com.br');
                $tag->a;
            $tag->div;
            $tag->hr();
        $tag->div;
    $tag->div;


      