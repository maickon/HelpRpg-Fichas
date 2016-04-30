<?php
require_once 'header.php';

$options = ['d4.png','d6.png','d8.png','d10.png','d12.png','d20.png','d100.png'];
		$tag->br();
        
        $tag->div(['class'=>'row']);
          $tag->div(['class'=>'col-md-12']);    
            $tag->div('class="btn btn-primary" onclick="location.reload();"');
              $tag->printer("Limpar");
            $tag->div;
            
            $tag->div('class="btn btn-success" onclick="rolar_todos();"');
              $tag->printer("Rolar Todos");
            $tag->div;
?>
            <div class="btn-group"> 
              <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Configuração
                <span class="caret"></span>
              </button> 
              <ul class="dropdown-menu"> 
                <li><a href="#" onclick="configuracao(3);">2x4 (2 linhas e 4 colunas)</a></li> 
                <li><a href="#" onclick="configuracao(2);">2x6 (2 linhas e 6 colunas)</a></li> 
                <li><a href="#" onclick="configuracao(4);">3x3 (3 linhas e 3 colunas)</a></li>
                <li><a href="#" onclick="configuracao(12);">7x1 (7 linhas e 1 coluna)</a></li> 
              </ul> 
            </div>
          <?php
          $tag->div;
        $tag->div;
        
        $tag->br();

        $tag->div(['class'=>'row']);
          $tag->div(['class'=>'col-md-12', 'id'=>'content']);
              $tag->div('class="row"');
                for($i=0; $i<count($options); $i++):
                	$id = explode('.', $options[$i]);
                	$tag->div('class="col-md-2" id="gride_'.$id[0].'"');
              			$tag->div('class="thumbnail"');
              				$tag->div('class="dice" onclick="rolar_'.$id[0].'();"');
	                      		$tag->img('src="img/'.$options[$i].'" alt="Dado de '.$id[0].' faces."');
        	              	$tag->div;
	                      	$tag->div('class="dice-text thumbnail" id="value_'.$id[0].'"');
    	                  		echo '0';
        	              	$tag->div;
        	              	$tag->span('class="span-dice"');
        	              		$tag->printer('Rolar +');
        	              	$tag->span;
        	              	$tag->input('class="input-dice" id="input_'.$id[0].'"');
        	              	$tag->span('class="span-dice"');
        	              		$tag->printer($id[0]);
        	              	$tag->span;
        	              	$tag->span('class="small btn btn-default" onclick="processar_rolagem(input_'.$id[0].',\''.$id[0].'\');"');
        	              		$tag->printer("Go");
        	              	$tag->span;
        	              	$tag->div('id="rolagem_'.$id[0].'" class="rolagem"');
        	              		
        	              	$tag->div;
                          $tag->div('class="total" id="total_'.$id[0].'" class="rolagem" onclick="total(\''.$id[0].'\');"');
                            $tag->printer("Ver total");
                          $tag->div;

                  		$tag->div;
                  		$tag->br();
                  	$tag->div;
                endfor;
              $tag->div;
          $tag->div;
        $tag->div;
    $tag->div;

require_once 'footer.php';