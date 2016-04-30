<?php
require 'class/htmltags.php';

$tag = new Tag();
$tag->printer("<!DOCTYPE html>");

$tag->link('href="css/bootstrap.min.css" rel="stylesheet"');
$tag->link('href="css/map.css" rel="stylesheet"');
$tag->script('src="js/jquery-1.11.3.js"'); $tag->script;
$tag->script('src="js/index.js"'); $tag->script;


$tag->html('id="target"');
    $tag->head();
        $tag->title();
            $tag->printer("Map");
        $tag->title;
    $tag->head;

    $tag->body();
        $tag->div('class="container"');

            $tag->div('class="row"');
                $tag->div('class="col-md-2"');
                    $tag->br();
                    $tag->h1();
                        $tag->printer("Map");
                    $tag->h1;
                $tag->div;

                $tag->div('class="col-md-1"');
                    $tag->br();
                    $tag->span();
                        $tag->printer("Linhas");
                    $tag->span;
                    $tag->input('class="form-control" id="rows"');
                $tag->div;

                $tag->div('class="col-md-1"');
                    $tag->br();
                    $tag->span();
                        $tag->printer("Colunas");
                    $tag->span;
                    $tag->input('class="form-control" id="columns"');
                $tag->div;

            $tag->div;

            $tag->div('class="col-md-12"');
                $tag->div('id="world"');
                $tag->div;
            $tag->div;

        $tag->div;

    $tag->body;
$tag->html;
