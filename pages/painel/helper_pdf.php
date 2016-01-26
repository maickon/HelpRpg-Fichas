<?php
function helper_pdf_header($pdf, $title){
	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(190, 10, 'Ficha do Personagem', 1, 1,'C');
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(190, 10, 'www.helprpg.com.br', 0, 0,'C');
}

/*
 * helper_pdf_add_cell
 * $largura = indica a largura da celula
 * $altura = indica se fica para cima oupara baixo.
 * $texto = o texto a ser exibido
 * $bordas = valor 1 indica ter bordas, valor 0 indica nao ter bordas
 * $pula_linha = valor 0 nao pula linha, valor 1 pula linha
 * $alinhamento = as letras indicam o alinhamento C-> centro L->esquerda e R->direita
 */
function helper_pdf_add_cell($pdf, $largura, $altura, $texto, $bordas, $pula_linha, $alinhamento){
	$pdf->Cell($largura, $altura, $texto, $bordas, $pula_linha, $alinhamento);
}