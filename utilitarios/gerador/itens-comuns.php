<?php
require '../itens/class/itens-comuns.class.php';

$itens = new ItensComuns();

$item_gerado;

$file = [
            'armas'=>'armas.txt',
            'armaduras'=>'armaduras.txt'
        ];

$path = $itens->base_path.$file[$_POST['item']];


switch($_POST['item']):
    case 'armas': 
        $itens->poderes_armas = '';
        $itens->material = '';
        $itens->aprimoramentos_armas = '';
        $itens->titulo['poderes_armas'] = '';
        $itens->titulo['material'] = '';
        $itens->titulo['aprimoramentos_armas'] = '';

        $itens->gerar_item($path, 'Encontro aleatório de uma arma', 'arma');
        if(5>rand(1,10)):
            $itens->gerar_item($itens->base_path.'poderes-armas.txt', 'Poder especial', 'poderes_armas');
        endif;
        if(3>rand(1,10)):
            $itens->gerar_item($itens->base_path.'material.txt', 'Material especial', 'material');
        endif;
        if(2>rand(1,10)):
            $itens->gerar_item($itens->base_path.'aprimoramentos-armas.txt', 'Aprimoramento especial', 'aprimoramentos_armas');
        endif;
        $item_gerado = [
                        'poder_arma'=>$itens->poderes_armas,
                        'material'=>$itens->material,
                        'aprimoramento'=>$itens->aprimoramentos_armas,
                        'arma'=>$itens->arma,
                        'titulo'=>$itens->titulo['arma'],
                        'titulo_poder'=>$itens->titulo['poderes_armas'],
                        'titulo_material'=>$itens->titulo['material'],
                        'titulo_aprimoramento'=>$itens->titulo['aprimoramentos_armas']
                       ];
    break;

    case 'armaduras': 
        $itens->poderes_armaduras_escudos = '';
        $itens->material = '';
        $itens->aprimoramentos_armaduras = '';
        $itens->titulo['poderes_armaduras_escudos'] = '';
        $itens->titulo['material'] = '';
        $itens->titulo['aprimoramentos_armaduras'] = '';
        
        $itens->gerar_item($path, 'Encontro aleatório de uma armadura ou escudo', 'armadura');
        if(9>rand(1,10)):
            $itens->gerar_item($itens->base_path.'poderes-armaduras-escudos.txt', 'Poder especial', 'poderes_armaduras_escudos');
        endif;
        if(3>rand(1,10)):
            $itens->gerar_item($itens->base_path.'material.txt', 'Material especial', 'material');
        endif;
        if(2>rand(1,10)):
            $itens->gerar_item($itens->base_path.'aprimoramentos-armaduras.txt', 'Aprimoramento especial', 'aprimoramentos_armaduras');
        endif;

        $item_gerado = [
                        'poderes_armaduras_escudos'=>$itens->poderes_armaduras_escudos,
                        'material'=>$itens->material,
                        'aprimoramento'=>$itens->aprimoramentos_armaduras,
                        'armadura'=>$itens->armadura,
                        'titulo'=>$itens->titulo['armadura'],
                        'titulo_poder'=>$itens->titulo['poderes_armaduras_escudos'],
                        'titulo_material'=>$itens->titulo['material'],
                        'titulo_aprimoramento'=>$itens->titulo['aprimoramentos_armaduras']
                       ];
    break;
endswitch;

echo json_encode($item_gerado);