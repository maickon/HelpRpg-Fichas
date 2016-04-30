<?php
require_once '../nomes/class/nomes/nomes.class.php';
require_once '../taverna/class/taverna.class.php';

$t = new Taverna();

$comida = array_merge($t->carnes, $t->frutas, $t->legumes);

$taverna = [ 
				'taverna' 			=> $t->taverna,
				'nome' 				=> "Dono: {$t->nome->nome}",
				'raca' 				=> " - {$t->raca[0]} - ",
				'idade' 			=> "Com {$t->idade} anos.",
				'tempo_de_profissao'=> "{$t->tempo_profissao}",
				
				'aspecto' 			=> "Aspecto de personalidade e outras características: <br>",
				'personalidade1' 	=> "&#10148; {$t->personalidade[0]}",
				'personalidade2'	=> "&#10148; {$t->personalidade[1]}",
				'personalidade3'	=> "&#10148; {$t->personalidade[2]}",
				
				'aparencia' 		=> "Aparencia: <br>",
				'aparencia1'		=> "&#10148; {$t->aparencia[0]}",
				'aparencia2'		=> "&#10148; {$t->aparencia[1]}",
				'aparencia3'		=> "&#10148; {$t->aparencia[2]}",

				'coisas_de_comer' 	=> "Algumas possíveis coisas de comer: <br>",
				'comida1'			=> "&#10148; {$comida[0]}",
				'comida2'			=> "&#10148; {$comida[2]}",
				'comida3'			=> "&#10148; {$comida[3]}",
				'comida4'			=> "&#10148; {$comida[4]}",
				'comida5'			=> "&#10148; {$comida[5]}",
				'comida6'			=> "&#10148; {$comida[6]}",
				'comida7'			=> "&#10148; {$comida[7]}",
				'comida8'			=> "&#10148; {$comida[8]}",

				'bebidas' 			=> "Algumas bebidas disponíveis: <br>",
				'bebidas1' 			=> "&#10148; {$t->bebidas[0]}",
				'bebidas2' 			=> "&#10148; {$t->bebidas[1]}",
				'bebidas3' 			=> "&#10148; {$t->bebidas[2]}",

				'objetos_de_briga'	=> "Em caso de briga! saiba o que pode estar próximo a você: <br>",
				'objetos_de_briga1' => "&#10148; {$t->objetos_de_briga[0]}",
				'objetos_de_briga2' => "&#10148; {$t->objetos_de_briga[1]}",
				'objetos_de_briga3' => "&#10148; {$t->objetos_de_briga[2]}"
			];
			
echo json_encode($taverna);