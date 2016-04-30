<?php

class Aventuras{
	
	public $base_path;
	public $objetivo;
	public $localidade;
	public $antagonista;
	public $coadjuvante;
	public $complicacao;
	public $recompensa;
	public $titulos;

	function __construct(){
		$this->base_path = 'C:/xampp/htdocs/utilitarios/aventuras-star-wars/class/';
		$this->objetivo();
		$this->local();
		$this->antagonista();
		$this->coadjuvante();
		$this->complicacao();
		$this->recompensa();
	}

	function objetivo(){
		$this->titulos['objetivo'] 	= "Um objetivo";
	
		$lista 						= $this->get_list("objetivos.txt");
		$escolhido 					= $lista[rand(0,count($lista)-1)];

		$this->objetivo 			= "{$escolhido}";
	}

	function local(){
		$this->titulos['local'] 	= "Um local";
	
		$lista 						= $this->get_list("localidades.txt");
		$escolhido 					= $lista[rand(0,count($lista)-1)];

		$this->localidade 			= "{$escolhido}";
	}

	function antagonista(){
		$this->titulos['antagonista'] 	= "Um antagonista";
	
		$lista 						= $this->get_list("antagonistas.txt");
		$escolhido 					= $lista[rand(0,count($lista)-1)];

		$this->antagonista 			= "{$escolhido}";
	}

	function coadjuvante(){
		$this->titulos['coadjuvante'] 	= "Um coadjuvante";
	
		$lista 						= $this->get_list("coadjuvantes.txt");
		$escolhido 					= $lista[rand(0,count($lista)-1)];

		$this->coadjuvante 			= "{$escolhido}";
	}

	function complicacao(){
		$this->titulos['complicacao'] 	= "Uma complicacao";
	
		$lista 						= $this->get_list("complicacoes.txt");
		$escolhido 					= $lista[rand(0,count($lista)-1)];

		$this->complicacao 			= "{$escolhido}";
	}

	function recompensa(){
		$this->titulos['recompensa'] 	= "Uma recompensa";
	
		$lista 						= $this->get_list("recompensas.txt");
		$escolhido 					= $lista[rand(0,count($lista)-1)];

		$this->recompensa 			= "{$escolhido}";
	}

	function get_list($file){
		return explode("\n", file_get_contents($this->base_path.'txt/'.$file)); 
	}
}