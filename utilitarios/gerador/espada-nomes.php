<?php

require_once '../nome-espada/class/nome-espada.class.php';

$nome = new NomeEspada();

$nome->gerar_nome('../nome-espada/class/txt/primeiro-nome.txt', '', 'primeiro_nome');
$nome->gerar_nome('../nome-espada/class/txt/segundo-nome.txt', '', 'segundo_nome');


$nome_espada = [$nome->primeiro_nome, $nome->segundo_nome];
echo json_encode($nome_espada);