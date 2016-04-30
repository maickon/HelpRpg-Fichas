<?php
require_once '../nomes/class/nomes/nomes.class.php';

$selecionado = $_POST['select'];

$n1 = new Nomes($selecionado);
$n2 = new Nomes($selecionado);
$n3 = new Nomes($selecionado);
$n4 = new Nomes($selecionado);
$n5 = new Nomes($selecionado);
$n6 = new Nomes($selecionado);
$n7 = new Nomes($selecionado);
$n8 = new Nomes($selecionado);

$nomes = [
          'nome-1'    				 => $n1->nome,
          'nome-2'                   => $n2->nome,
          'nome-3'                   => $n3->nome,
          'nome-4'                   => $n4->nome,
          'nome-5'                   => $n5->nome,
          'nome-6'                   => $n6->nome,
          'nome-7'                   => $n7->nome,
          'nome-8'                   => $n8->nome
        ];

echo json_encode($nomes);