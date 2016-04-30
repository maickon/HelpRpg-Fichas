<?php
require_once '../aventuras-star-wars/class/aventuras.class.php';

$a = new Aventuras();

$a->objetivo();
$aventura = [
				'titulo_objetivo' 		=> $a->titulos['objetivo'],
				'objetivo'				=> $a->objetivo,

				'titulo_local' 			=> $a->titulos['local'],
				'local'					=> $a->localidade,

				'titulo_antagonista'	=> $a->titulos['antagonista'],
				'antagonista'			=> $a->antagonista,

				'titulo_coadjuvante'	=> $a->titulos['coadjuvante'],
				'coadjuvante' 			=> $a->coadjuvante,
				
				'titulo_complicacao' 	=> $a->titulos['complicacao'],
				'complicacao'			=> $a->complicacao,

				'titulo_recompensa'		=> $a->titulos['recompensa'],
				'recompensa'			=> $a->recompensa
			];

echo json_encode($aventura);