<?php
require_once '../../init.php';

$f = new Arquivo();
$f->open_file(ROOTPATH.DOWNLOADPATH.'Teste.txt');
$f->write_file("Mamcikon \n jose ");

