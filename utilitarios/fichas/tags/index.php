<?php
require 'tags.php';


$tag = new Tag();

$tag->html();
    $tag->head();
        $tag->link(['href'=>'//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css', 'rel'=>'stylesheet']);
        $tag->link(['rel'=>'stylesheet', 'href'=>'//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css', ]);
    $tag->head;

    $tag->div(['class'=>'container']);
        $tag->div(['class'=>'row']);
            $tag->h2();
                $tag->printer('Bootstrap-select example');
            $tag->h2;
            $tag->p();
                $tag->printer('This uses');
                $tag->a(['href'=>'http://silviomoreto.github.io/bootstrap-select/']);
                    $tag->printer('http://silviomoreto.github.io/bootstrap-select/');
                $tag->a;
            $tag->p;
            $tag->hr();
        $tag->div;

        $tag->div(['class'=>'row-fluid']);
            $tag->select('class="selectpicker" data-show-subtext="true" data-live-search="true"');
                $tag->option('data-subtext="Rep California"');
                    $tag->printer('Tom Foolery');
                $tag->option;

                $tag->option('data-subtext="Sen California"');
                    $tag->printer('Bill Gordon');
                $tag->option;

                $tag->option('data-subtext="Sen Massacusetts"');
                    $tag->printer('Elizabeth Warren');
                $tag->option;

                $tag->option('data-subtext="Rep Alabama"');
                    $tag->printer('Mario Flores');
                $tag->option;

                $tag->option('data-subtext="Rep Alaska"');
                    $tag->printer('Don Young');
                $tag->option;

                $tag->option('data-subtext="Rep California" disabled="disabled"');
                    $tag->printer('Marvin Martinez');
                $tag->option;
            $tag->select;

            $tag->span(['class'=>'help-inline']);
                $tag->printer('with');
                $tag->code();
                    $tag->printer('ata-show-subtext="true" data-live-search="true"');
                $tag->code;
                $tag->printer('. Try searching for california');
            $tag->spam;
        $tag->div;
    $tag->div;

    $tag->script(['src'=>'https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js']); $tag->script;
    $tag->script(['src'=>'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js']); $tag->script;
    $tag->script(['src'=>'//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js']); $tag->script;
$tag->html;
