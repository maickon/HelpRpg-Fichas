<?php
require '../encontros-aleatorio/class/encontro.class.php';

$enc = new Encontros();
$file = [
            'cidade'=>'viagem-cidade.txt',
            'deserto'=>'viagem-deserto.txt',
            'estrada'=>'viagem-estrada.txt',
            'floresta'=>'viagem-floresta.txt',
            'maritima'=>'viagem-maritima.txt',
            'montanha'=>'viagem-montanha.txt',
        ];

$path = $enc->base_path.$file[$_POST['attr']];

switch($_POST['attr']):
    case 'cidade': $enc->gerar_encontro($path, 'Encontro aleatório em cidades', $_POST['attr']);
    break;

    case 'maritima': $enc->gerar_encontro($path, 'Encontro aleatório em alto mar', $_POST['attr']);
    break;

    case 'estrada': $enc->gerar_encontro($path, 'Encontro aleatório em uma estrada', $_POST['attr']);
    break;

    case 'montanha': $enc->gerar_encontro($path, 'Encontro aleatório em uma montanha', $_POST['attr']);
    break;  

    case 'floresta': $enc->gerar_encontro($path, 'Encontro aleatório em uma floresta', $_POST['attr']);
    break; 

    case 'deserto': $enc->gerar_encontro($path, 'Encontro aleatório em um deserto', $_POST['attr']);
    break;     
endswitch;


$encontro = [
          'local'  => $enc->$_POST['attr'],
          'titulo' => $enc->titulo[$_POST['attr']]
        ];

echo json_encode($encontro);