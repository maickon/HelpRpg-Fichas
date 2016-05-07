<?php

require_once '../tempo/class/tempo.class.php';

$tempo = new Tempo();

$tempo->gerar_tempo('../tempo/class/txt/temperatura.txt', 'Temperatura: ', 'temperatura');
$tempo->gerar_tempo('../tempo/class/txt/vento.txt', 'Vento: ', 'vento');
$tempo->gerar_tempo('../tempo/class/txt/precipitacao.txt', 'Precipitacao: ', 'precipitacao');


$estado_do_tempo = [$tempo->temperatura,  $tempo->vento, $tempo->precipitacao];
echo json_encode($estado_do_tempo);