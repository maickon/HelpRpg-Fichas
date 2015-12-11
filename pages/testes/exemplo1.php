<?php
$gmtDate = gmdate("D, d M Y H:i:s");
header("Expires:{$gmtDate} GMT");
header("Last-Modified:{$gmtDate} GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

//array de precos
$lv = rand(1,20);
$classe = array(
		'guerreiro' => "<a href=\"#\">Um Guerreiro de Lv {$lv}</a> For 12+1 des 24+2 Con 16+3 Int 13+1 Sab 18+4 Car 12+1<br>",
		'mago' => "<a href=\"#\">Um Mago de Lv {$lv}</a> For 12+1 des 24+2 Con 16+3 Int 13+1 Sab 18+4 Car 12+1<br>",
		'paladino' => "<a href=\"#\">Um Palafino de Lv {$lv}</a> For 12+1 des 24+2 Con 16+3 Int 13+1 Sab 18+4 Car 12+1<br>",
		'barbaro' => "<a href=\"#\">Um Bárbaro de Lv {$lv}</a> For 12+1 des 24+2 Con 16+3 Int 13+1 Sab 18+4 Car 12+1<br>",
		'monge' => "<a href=\"#\">Um Monge de Lv {$lv}</a> For 12+1 des 24+2 Con 16+3 Int 13+1 Sab 18+4 Car 12+1<br>",
		'druida' => "<a href=\"#\">Um Druida de Lv {$lv}</a> For 12+1 des 24+2 Con 16+3 Int 13+1 Sab 18+4 Car 12+1<br>",
		
		);

$nome = $_GET['search'];
if(isset($classe[$nome])):
	$num = rand(4,9);
	 for($i=0; $i<$num; $i++):
		echo $classe[$nome];
	endfor;
else:
	echo "404";
endif;