<?php 
require_once 'header.php';

$tag->form('method="get" onsubmit="return false;"');
    $form->_container();
        $menus = [
                    ['col-number' => 3, 'label' => 'ID aleatório:',             'id' => 'seed',             'type' => 'input'],
                    ['col-number' => 3, 'label' => 'Projeção:',                 'id' => 'projection',       'type' => 'select'],
                    ['col-number' => 3, 'label' => 'Paleta:',                   'id' => 'palette',          'type' => 'select'],
                    ['col-number' => 3, 'label' => '% de água no mundo:',       'id' => 'pct_water',        'type' => 'input'],
                    ['col-number' => 3, 'label' => '% de gelo no mundo:',       'id' => 'pct_ice',          'type' => 'input'],
                    ['col-number' => 3, 'label' => 'Tamanho da imagem:',        'id' => 'height',           'type' => 'input'],
                    ['col-number' => 3, 'label' => 'Intereções:',               'id' => 'iter',             'type' => 'input'],
                    ['col-number' => 3, 'label' => 'Rotação:',                  'id' => 'rotate',           'type' => 'input']
                ];
        $form->_col(12);
            for($i=0; $i<count($menus); $i++):
                $tag->div('class="col-md-'.$menus[$i]['col-number'].'"');
                    $tag->label('class="control-label"');
                        $tag->printer($menus[$i]['label']);
                    $tag->label;
                    if($menus[$i]['type'] == 'select'):
                        $tag->select('id="'.$menus[$i]['id'].'" class="form-control"');
                        $tag->select;
                    elseif($menus[$i]['type'] == 'input'):
                        $tag->input('id="'.$menus[$i]['id'].'" class="form-control"');
                    endif;
                $tag->div;
            endfor;
            
            $tag->div('class="col-md-2"');
                $tag->br();
                $tag->input('type="button" class="btn btn-default" id="new_seed" value="Novo"');
            $tag->div;

            $tag->div('class="col-md-2"');
                $tag->br();
                $tag->input('type="button" value="Salvar como PNG" class="btn btn-default" onclick="save_map();"');
            $tag->div;

            $tag->div('class="col-md-2"');
                $tag->br();
                $tag->printer('&nbsp;');
                $tag->input('type="button" value="Dar print" class="btn btn-default" onclick="window.print();"');
            $tag->div;
            
        $form->col_();
    $form->container_();
$tag->form;

$tag->div('class="center"');
    $tag->h1('id="dungeon_title" class="title"');
    $tag->h1;
    $tag->canvas('id="map" width="1" height="1"');
        $tag->p();
            $tag->printer('Seu navegador não tem suporte ao HTML5 &lt;canvas&gt; element.');
        $tag->p;
    $tag->canvas;
$tag->div;

$tag->br();

require 'footer.php';