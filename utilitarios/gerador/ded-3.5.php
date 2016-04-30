<?php
require_once '../class/personagem.class.php';
require_once '../class/ded/3.5/racas.class.php';
require_once '../class/ded/3.5/classes.class.php';
require_once '../class/ded/3.5/testes_resistencia.class.php';
require_once '../class/ded/atributos.class.php';

$p = new Personagem();
$c = new classes($p->propriedades['sexo']);
$a = new Atributos($p->propriedades['nivel'], $c->propriedades['classe']);
$r = new Racas($p->propriedades['sexo']);

$personagem = [
          'nome'    				=> $p->propriedades['nome'],
          'nivel'   				=> $p->propriedades['nivel'],
          'sexo'    				=> $p->propriedades['sexo'],
          'cor_dos_olhos'   		     => $p->propriedades['cor_dos_olhos'],
          'cor_da_pele'  			=> $p->propriedades['cor_da_pele'],
          'cor_do_cabelo'   	 	     => $p->propriedades['cor_do_cabelo'],
          'estilo_da_boca'  		     => $p->propriedades['estilo_da_boca'],
          'estilo_do_cabelo'		     => $p->propriedades['estilo_do_cabelo'],
          'estilo_da_sobrancelha'	     => $p->propriedades['estilo_da_sobrancelha'],
          'estilo_do_rosto'  	  	     => $p->propriedades['estilo_do_rosto'],
          'estilo_do_olho'    		=> $p->propriedades['estilo_do_olho'],
          'estilo_do_queixo'   	 	=> $p->propriedades['estilo_do_queixo'],
          'estilo_da_testa'			=> $p->propriedades['estilo_da_testa'],

          'classe'                      => $c->propriedades['classe'],
          'raca'                        => $r->propriedades['raca'],
          'altura'                      => $r->propriedades['altura'],
          'peso'                        => $r->propriedades['peso'],
          'idade'                       => $r->propriedades['idade'],
          'deslocamento'                => $r->propriedades['deslocamento'],

          'forca' 					=> $a->propriedades['forca'],
          'destreza' 				=> $a->propriedades['destreza'],
          'constituicao' 			=> $a->propriedades['constituicao'],
          'inteligencia' 			=> $a->propriedades['inteligencia'],
          'sabedoria' 				=> $a->propriedades['sabedoria'],
          'carisma' 				=> $a->propriedades['carisma']
        ];

echo json_encode($personagem);