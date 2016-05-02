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
                  $tag->printer('Central de utilitários para RPG - By Help RPG');
              $tag->h2;
              $tag->p();
                  $tag->printer('Criado por Maickon Rangel - ');
                  $tag->a(['href'=>ROOTPATHURL]);
                      $tag->printer('helprpg.com.br');
                  $tag->a;
              $tag->p;
            $tag->div;
        $tag->div;
        $tag->hr();

        $options = [['Rolar Dados','d20.jpg','dados/'], 
                    ['Nomes','nomes.jpg','nomes/'], 
                    ['Fichas','ficha.jpg','fichas/'], 
                    ['Aventuras','aventura.jpg','aventuras-medieval/'], 
                    ['Tavernas','taverna.jpg','taverna/'], 
                    ['Encontros','encontro.jpg','encontros-aleatorio/'],
                    ['Mapas Mundi','mapa-mundi.jpg','mapa-mundi/'],
                    ['Masmorras','dungeon.jpg','masmorras/'],
                    ['Personalidades','personalidades.jpg','personalidades/'],
                    ['Cidades','cidades.jpg','cidades/'],
                    ['Marcadores','abacus.jpg','marcador/'],
                    ['Itens','itens.jpg','itens/']
                   ];
        $tag->div(['class'=>'row-fluid']);
          $tag->div(['class'=>'col-md-12', 'id'=>'content']);
              $tag->div('class="row"');
                for($i=0; $i<count($options); $i++):
                  $css_class = substr_replace($options[$i][2], '', -1);
                  $tag->div('class="col-md-2"');
                    $tag->div('class="thumbnail '.$css_class.'"');
                      $tag->img('src="img/'.$options[$i][1].'" alt="..."');
                      $tag->div('class="caption"');
                        
                        $tag->h4('class="center"');
                          $tag->a('href="'.$options[$i][2].'" class="btn btn-default" role="button"');
                            $tag->printer($options[$i][0]);
                          $tag->a;
                        $tag->h4;

                      $tag->div;
                    $tag->div;
                  $tag->div;
                endfor;
              $tag->div;
          $tag->div;
        $tag->div;
    $tag->div;

    require_once 'footer.php';
$tag->html;
