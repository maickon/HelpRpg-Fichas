<!DOCTYPE html>
<?php
require_once 'tags/tags.php';
require_once 'tags/rpg-names.php';
$tag = new Tag();
$descricao = [
              'Nome'                    =>'nome',            
              'Nível'                   =>'nivel',           
              'Sexo'                    =>'sexo',            
              'Cor dos Olhos'           =>'cor_dos_olhos',       
              'Cor da Pele'             =>'cor_da_pele',       
              'Cor do Cabelo'           =>'cor_do_cabelo',       
              'Estilo da Boca'          =>'estilo_da_boca',      
              'Estilo do Cabelo'        =>'estilo_do_cabelo',    
              'Estilo da Sobrancelha'   =>'estilo_da_sobrancelha', 
              'Estilo do Rosto'         =>'estilo_do_rosto',       
              'Estilo do Olho'          =>'estilo_do_olho',      
              'Estilo do Queixo'        =>'estilo_do_queixo',
              'Estilo da Testa'         =>'estilo_da_testa',
              'Classe'                  =>'classe',
              'Raça'                    =>'raca',
              'Altura'                  =>'altura',
              'Peso'                    =>'peso',
              'Idade'                   =>'idade',
              'Deslocamento'            =>'deslocamento'
            ];

$atributos = [
            'Força'                   =>'forca',
            'Destreza'                =>'destreza',
            'Constituiçao'            =>'constituicao',
            'Inteligência'            =>'inteligencia',
            'Sabedoria'               =>'sabedoria',
            'Carisma'                 =>'carisma'
            ];

$tag->html();
    $tag->head();
        $tag->link(['href'=>'//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css', 'rel'=>'stylesheet']);
        $tag->link(['href'=>'css/index.css', 'rel'=>'stylesheet']);
        $tag->link(['rel'=>'stylesheet', 'href'=>'//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css', ]);
    $tag->head;

    $tag->div(['class'=>'container']);
        $tag->div(['class'=>'row-fuid']);
          $tag->div(['class'=>'col-md-12']);
            $tag->h2();
                $tag->printer('Gerador de fichas aleatória - RPG');
            $tag->h2;
            $tag->p();
                $tag->printer('|');
                $tag->a(['href'=>'../index.php']);
                    $tag->printer('Home');
                $tag->a;
                $tag->printer('|');
                $tag->printer('Criado por Maickon Rangel - ');
                $tag->a(['href'=>'#']);
                    $tag->printer('help.rpg.com.br');
                $tag->a;
            $tag->p;
            $tag->hr();
          $tag->div;
        $tag->div;

        $tag->div(['class'=>'row-fluid']);
            $tag->div(['class'=>'col-md-3']);
                $tag->select('class="selectpicker" data-show-subtext="true" data-live-search="true"');
                    foreach($rpg_sistemas as $key => $value):
                        $tag->option('data-subtext="Rpg - '.$value.'"');
                            $tag->printer($value);
                        $tag->option;
                    endforeach;
                $tag->select;
            $tag->div;

             $tag->div(['class'=>'col-md-9']);
                $tag->span(['class'=>'help-inline']);
                    $tag->input(['class'=>'btn btn-success', 'type'=>'button', 'value'=>'Gerar Ficha', 'onclick'=>'rand_personagem();']);
                $tag->spam;

                $tag->span(['class'=>'help-inline']);
                    $tag->input(['class'=>'btn btn-primary', 'type'=>'button', 'value'=>'Download como PDF', 'onclick'=>'download_para_pdf();']);
                $tag->spam;
            $tag->div;

            $tag->div(['class'=>'col-md-12', 'id'=>'content']);
                $tag->div('class="row"');
                    $tag->br();

                    foreach($descricao as $key => $value):
                        $tag->div(['class'=>'col-md-3']);
                            $tag->b();
                                $tag->printer("{$key}: ");
                            $tag->b;
                            $tag->span(['id'=>''.$value.'', 'class'=>'form-control input-md no-border background-gradiente-silver']);
                            $tag->span;
                        $tag->div;
                    endforeach;
              
                $tag->div;

                $tag->hr();
                
                $tag->div('class="row"');
                    //habilidades basicas
                     foreach($atributos as $key => $value):
                        $tag->div(['class'=>'col-md-2']);
                            $tag->b();
                                $tag->printer("{$key}: ");
                            $tag->b;
                            $tag->span(['id'=>''.$value.'', 'class'=>'form-control input-md no-border background-gradiente-silver']);
                            $tag->span;
                        $tag->div;

                    endforeach;
                $tag->div;
            
            $tag->div;

            $tag->div('id="editor"');
            $tag->div;
        $tag->div;
    $tag->div;

    $tag->script(['src'=>'js/config.js']); $tag->script;
    $tag->script(['src'=>'js/ded-3.5.js']); $tag->script;
    $tag->script(['src'=>'js/jspdf.js']); $tag->script;
    $tag->script(['src'=>'https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js']); $tag->script;
    $tag->script(['src'=>'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js']); $tag->script;
    $tag->script(['src'=>'//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js']); $tag->script;
$tag->html;
