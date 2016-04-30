<!DOCTYPE html>
<?php
require_once 'class/tags/tags.php';
$tag = new Tag();

$tag->html();
    $tag->head();
        $tag->link(['href'=>'//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css', 'rel'=>'stylesheet']);
        $tag->link(['href'=>'css/index.css', 'rel'=>'stylesheet']);
        $tag->link(['rel'=>'stylesheet', 'href'=>'//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css', ]);
    $tag->head;

    $tag->div(['class'=>'container']);
        $tag->div(['class'=>'row']);
            $tag->h2();
                $tag->printer('Central de aplicativos para RPG');
            $tag->h2;
            $tag->p();
                $tag->printer('Criado por Maickon Rangel - ');
                $tag->a(['href'=>'#']);
                    $tag->printer('helprpg.com.br');
                $tag->a;
            $tag->p;
            $tag->hr();
        $tag->div;

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
                  $tag->div('class="col-md-2"');
                    $tag->div('class="thumbnail"');
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
