<?php
require '../../../init.php';
require_once '../helper.php';
require_once '../helper_pdf.php';

global $tag, $form, $s, $parametros;

$pdf = new FPDF();

$s->restricted_access();

$show_personagem = new Personagens(ROOTPATH.PERSONAGEMIMGPATH);
$objeto = $show_personagem->select($show_personagem->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);
$unserialize_personagem = unserialize($objeto[0]['dados']);

$pass = helper_check_permitions($objeto[0]['dono']);

if($pass != 1)
	header("Location: ".ROOTPATHURL.PERSONAGEMPATH);	

$pdf->AddPage();
helper_pdf_header($pdf, "Ficha de Personagem");

$pdf->SetFont('Arial','',8);
$pdf->ln();

$atributos = [
				[ [	5, 5,  $objeto[0]['id'], 		0, 0, 'L'], [5, 5, 'Id:', 				0, 0, 'L'] ],
				[ [ 30, 5, $objeto[0]['nome'], 		0, 0, 'L'],	[12, 5, 'Nome:', 			0, 0, 'L'] ],
				[ [ 12, 5, $objeto[0]['dono'], 		0, 1, 'L'], [11, 5, 'Dono:', 			0, 0, 'L'] ],
				[ [ 25, 5, $objeto[0]['sistema'], 	0, 1, 'L'], [30, 5, 'Sistema de RPG:', 	0, 0, 'L'] ],
				[ [ 25, 5, $objeto[0]['tipo'], 		0, 1, 'L'], [25, 5, 'Tipo de Ficha:', 	0, 0, 'L'] ],
				[ [ 5, 5, $objeto[0]['lv'], 		0, 0, 'L'], [10, 5, 'Nível:', 			0, 0, 'L'] ],
				[ [ 25, 5, $objeto[0]['raca'], 		0, 0, 'L'], [10, 5, 'Raça:', 			0, 0, 'L'] ],
				[ [ 25, 5, $objeto[0]['classe'], 	0, 1, 'L'], [13, 5, 'Classe:',	 		0, 0, 'L'] ],
			 ];

foreach($atributos as $value):
	$pdf->SetFont('Arial','B',10);
	helper_pdf_add_cell($pdf, $value[1][0], $value[1][1], utf8_decode($value[1][2]), $value[1][3], $value[1][4], $value[1][5]);
	$pdf->SetFont('Arial','',10);
	helper_pdf_add_cell($pdf, $value[0][0], $value[0][1], utf8_decode($value[0][2]), $value[0][3], $value[0][4], $value[0][5]);
endforeach;


$pdf->Image(ROOTPATH.PERSONAGEMIMGPATH.$objeto[0]['img'],120,30,-152);
$pdf->Output();