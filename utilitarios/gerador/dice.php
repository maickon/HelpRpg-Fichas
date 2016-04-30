<?php
require_once '../dados/class/dice.class.php';

$d = new Dice();
$result = [];

if(isset($_POST['q']) && isset($_POST['dado'])):
	$r = 0;
	for($i=0; $i<$_POST['q']; $i++):
		$d = new Dice();
		$r++;
		if($d->$_POST['dado'] == 1):
			$class_css = 'result-rol-fail';
		elseif($d->$_POST['dado'] == substr($_POST['dado'], 1)):
			$class_css = 'result-rol-critical';
		else:
			$class_css = 'result-rol-normal';
		endif;
		$result[] = "<br><span class=\"{$class_css}\">Rolagem[n°{$r}]::=><span id=\"resultados_{$_POST['dado']}\">{$d->$_POST['dado']}</span></span>";
	endfor;
elseif(isset($_POST['dado'])):
	$result = $d->$_POST['dado'];
endif;

echo(json_encode($result));	