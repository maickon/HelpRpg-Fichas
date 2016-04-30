<?php
require_once '../futuro/class/futuro.class.php';

//$selecionado = $_POST['select'];

$s = new Futuro();

$futuro = [
          'afetado'    				 => $s->afetado,
          'acontecimento'            => $s->acontecimento
        ];

echo json_encode($futuro);