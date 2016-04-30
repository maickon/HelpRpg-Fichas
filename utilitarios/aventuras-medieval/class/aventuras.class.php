<?php

class Aventuras{
	
	public $base_path;
	public $objetivo;
	public $titulos;

	function __construct(){
		$this->base_path = 'C:/xampp/htdocs/utilitarios/aventuras-medieval/class/';
		$this->objetivo();
		$this->local();
		$this->antagonista();
		$this->coadjuvante();
		$this->complicacao();
		$this->recompensa();
	}

	function objetivo(){
		$this->titulos['objetivo'] 	= "Um objetivo";
		$indice 					= rand(1,6);

		$objetivos 					= $this->get_list("objetivos/objetivo-{$indice}.txt");
		$objetivo_escolhido 		= $objetivos[rand(0,count($objetivos)-1)];
		
		$objetivos_opcao 			= $this->get_list("objetivos/objetivo-opcao-{$indice}.txt");
		$objetivos_opcao_escolhido 	= $objetivos_opcao[rand(0,count($objetivos_opcao)-1)];

		$this->objetivo 			= "{$objetivo_escolhido} {$objetivos_opcao_escolhido}";
	}

	function local(){
		$this->titulos['local'] 	= "Um local";
		$indice 					= rand(1,6);

		$local 						= $this->get_list("localidade/localidade-{$indice}.txt");
		$local_escolhido 			= $local[rand(0,count($local)-1)];
		
		$local_opcao 				= $this->get_list("localidade/localidade-opcao-{$indice}.txt");
		$local_opcao_escolhido 		= $local_opcao[rand(0,count($local_opcao)-1)];

		$this->localidade 			= "{$local_escolhido} {$local_opcao_escolhido}";
	}

	function antagonista(){
		$this->titulos['antagonista'] 	= "Um antagonista";
		$indice 						= rand(1,6);

		$antagonista 					= $this->get_list("antagonista/antagonista-{$indice}.txt");
		$antagonista_escolhido 			= $antagonista[rand(0,count($antagonista)-1)];
		
		$antagonista_opcao 				= $this->get_list("antagonista/antagonista-opcao-{$indice}.txt");
		$antagonista_opcao_escolhido	= $antagonista_opcao[rand(0,count($antagonista_opcao)-1)];

		$this->antagonista 				= "{$antagonista_escolhido} {$antagonista_opcao_escolhido}";
	}

	function coadjuvante(){
		$this->titulos['coadjuvante'] 	= "Um coadjuvante";
		$indice 						= rand(1,6);

		$coadjuvante 					= $this->get_list("coadjuvantes/coadjuvantes-{$indice}.txt");
		$coadjuvante_escolhido 			= $coadjuvante[rand(0,count($coadjuvante)-1)];
		
		$coadjuvante_opcao 				= $this->get_list("coadjuvantes/coadjuvantes-opcao-{$indice}.txt");
		$coadjuvante_opcao_escolhido	= $coadjuvante_opcao[rand(0,count($coadjuvante_opcao)-1)];

		$this->coadjuvante 				= "{$coadjuvante_escolhido} - {$coadjuvante_opcao_escolhido}";
	}

	function complicacao(){
		$this->titulos['complicacao'] 	= "Uma complicacao";
		$indice 						= rand(1,6);

		$complicacao 					= $this->get_list("complicacao/complicacao-{$indice}.txt");
		$complicacao_escolhido 			= $complicacao[rand(0,count($complicacao)-1)];
		
		$complicacao_opcao 				= $this->get_list("complicacao/complicacao-opcao-{$indice}.txt");
		$complicacao_opcao_escolhido	= $complicacao_opcao[rand(0,count($complicacao_opcao)-1)];

		$this->complicacao 				= "{$complicacao_escolhido} - {$complicacao_opcao_escolhido}";
	}

	function recompensa(){
		$this->titulos['recompensa'] 	= "Uma recompensa";
		$indice 						= rand(1,6);

		$recompensa 					= $this->get_list("recompensas/recompensa-{$indice}.txt");
		$recompensa_escolhido 			= $recompensa[rand(0,count($recompensa)-1)];
		
		$recompensa_opcao 				= $this->get_list("recompensas/recompensa-opcao-{$indice}.txt");
		$recompensa_opcao_escolhido	= $recompensa_opcao[rand(0,count($recompensa_opcao)-1)];

		$this->recompensa 				= "{$recompensa_escolhido} - {$recompensa_opcao_escolhido}";
	}

	function get_list($file){
		return explode("\n", file_get_contents($this->base_path.'txt/'.$file)); 
	}
}