<?php
require '../itens/class/itens.class.php';

$itens = new Itens();

$file = [
            'itens_estupidos'=>'itens_estupidos.txt',
            'armas_magicas'=>'arma.txt',
            'habilidade'=>'habilidade_magica.txt',
            'escudos_magicos'=>'escudos_magicos.txt',
            'armaduras_magicas'=>'armaduras_magicas.txt',
            'botas'=>'botas.txt',
            'capa'=>'capa.txt',
            'colar'=>'colar.txt',
            'coroa'=>'coroa.txt',
            'elmo'=>'elmo.txt',
            'mascara'=>'mascara.txt',
            'medalhao'=>'medalhao.txt',
            'oculos'=>'oculos.txt',
            'tiara'=>'tiara.txt',
            'aneis_magicos'=>'aneis_magicos.txt',
            'grimorios'=>'grimorios.txt'
        ];

$path = $itens->base_path.$file[$_POST['item']];


switch($_POST['item']):
    case 'itens_estupidos': $itens->gerar_item($path, 'Encontro aleatório de um item estúpido.', $_POST['item']);
    break;

    case 'armas_magicas': 
        $itens->gerar_item($path, 'Encontro aleatório de uma arma mágica', $_POST['item']);
        $itens->gerar_item($itens->base_path.$file['habilidade'], '', 'habilidade');
        $itens->armas_magicas = "{$itens->armas_magicas} {$itens->habilidade}";
    break;

    case 'escudos_magicos': $itens->gerar_item($path, 'Encontro aleatório de escudos mágicos', $_POST['item']);
    break;

    case 'botas': $itens->gerar_item($path, 'Encontro aleatório de botas', $_POST['item']);
    break;

    case 'capa': $itens->gerar_item($path, 'Encontro aleatório de capas', $_POST['item']);
    break;

    case 'colar': $itens->gerar_item($path, 'Encontro aleatório de colar', $_POST['item']);
    break;

    case 'coroa': $itens->gerar_item($path, 'Encontro aleatório de coroa', $_POST['item']);
    break;

    case 'elmo': $itens->gerar_item($path, 'Encontro aleatório de elmo', $_POST['item']);
    break;

    case 'mascara': $itens->gerar_item($path, 'Encontro aleatório de mascaras', $_POST['item']);
    break;

    case 'medalhao': $itens->gerar_item($path, 'Encontro aleatório de medalhão', $_POST['item']);
    break;

    case 'oculos': $itens->gerar_item($path, 'Encontro aleatório de óculos', $_POST['item']);
    break;

    case 'tiara': $itens->gerar_item($path, 'Encontro aleatório de tiara', $_POST['item']);
    break;

    case 'armaduras_magicas': $itens->gerar_item($path, 'Encontro aleatório armaduras mágicas', $_POST['item']);
    break;  

    case 'aneis_magicos': $itens->gerar_item($path, 'Encontro aleatório de aneis mágicos', $_POST['item']);
    break; 

    case 'grimorios': $itens->gerar_item($path, 'Encontro aleatório de grimórios', $_POST['item']);
    break;     
endswitch;


$encontro = [
          'descricao'   => $itens->$_POST['item'],
          'titulo'      => $itens->titulo[$_POST['item']]
        ];

echo json_encode($encontro);