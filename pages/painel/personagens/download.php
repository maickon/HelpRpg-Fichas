<?php
//$pdf = new Pdf();
require '../../../init.php';
require_once '../helper.php';

global $tag, $form, $s, $parametros;

$s->restricted_access();

$show_personagem = new Personagens(ROOTPATH.PERSONAGEMIMGPATH);
$objeto = $show_personagem->select($show_personagem->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);
$unserialize_personagem = unserialize($objeto[0]['dados']);

$pass = helper_check_permitions($objeto[0]['dono']);

if($pass != 1)
	header("Location: ".ROOTPATHURL.PERSONAGEMPATH);	


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190, 10, 'Ficha do Personagem', 1, 1,'C');

$pdf->SetFont('Arial','',8);
$pdf->ln();

$pdf->Cell(10, 5, 'FOR', 1, 0,'C');
$pdf->Cell(10, 5, $unserialize_personagem['forca'], 1, 0,'C');
$pdf->Cell(10, 5, (($unserialize_personagem['forca']-10)/2), 1, 0,'C');

$pdf->Output();