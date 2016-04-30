<?php
/*
**	Gerador de lugares - Help Rpg
**	@outhor Maickon Rangel
**	@project Help Rpg
**	@date 2016
**
*/


class Nomes{

	public $nome;
	public $base_path;

	function __construct($nome){
		$this->base_path = 'C:/xampp/htdocs/utilitarios/nomes/class/nomes/';
		$this->nome = $this->$nome();
	}

	function anjos(){
		$nomes = explode("\n", file_get_contents($this->base_path.'txt/anjos.txt'));
		return $nomes[rand(0,count($nomes)-1)];
	}

	function demonios(){
		$nomes = explode("\n", file_get_contents($this->base_path.'txt/demonios.txt'));
		return $nomes[rand(0,count($nomes)-1)];
	}

	function cidades(){
		$nomes = explode("\n", file_get_contents($this->base_path.'txt/cidades.txt'));
		return $nomes[rand(0,count($nomes)-1)];
	}

	function reinos(){
		$nomes = explode("\n", file_get_contents($this->base_path.'txt/reinos.txt'));
		return $nomes[rand(0,count($nomes)-1)];
	}

	function vilarejos(){
		$nomes = explode("\n", file_get_contents($this->base_path.'txt/vilarejos.txt'));
		return $nomes[rand(0,count($nomes)-1)];
	}

	function humanos_masculino(){
		$nomes = explode("\n", file_get_contents($this->base_path.'txt/humanos-masculinos.txt'));
		return $nomes[rand(0,count($nomes)-1)];
	}

	function humanos_feminino(){
		$nomes = explode("\n", file_get_contents($this->base_path.'txt/humanos-feminino.txt'));
		return $nomes[rand(0,count($nomes)-1)];
	}

	function arabicos(){
		$nomes = explode("\n", file_get_contents($this->base_path.'txt/arabicos.txt'));
		return $nomes[rand(0,count($nomes)-1)];
	}

	function asiaticos(){
		$nomes = explode("\n", file_get_contents($this->base_path.'txt/asiaticos.txt'));
		return $nomes[rand(0,count($nomes)-1)];
	}

	function orcs(){
		$nomes = explode("\n", file_get_contents($this->base_path.'txt/orcs.txt'));
		return $nomes[rand(0,count($nomes)-1)];
	}

	function barbaros(){
		$nomes = explode("\n", file_get_contents($this->base_path.'txt/barbaros.txt'));
		return $nomes[rand(0,count($nomes)-1)];
	}

	function hobbits(){
		$nomes = explode("\n", file_get_contents($this->base_path.'txt/hobbits.txt'));
		return $nomes[rand(0,count($nomes)-1)];
	}

	function halflings(){
		$nomes = explode("\n", file_get_contents($this->base_path.'txt/halflings.txt'));
		return $nomes[rand(0,count($nomes)-1)];
	}

	function anoes(){
		$nomes = explode("\n", file_get_contents($this->base_path.'txt/anoes.txt'));
		return $nomes[rand(0,count($nomes)-1)];
	}

	function elfos(){
		$nomes = explode("\n", file_get_contents($this->base_path.'txt/elfos.txt'));
		return $nomes[rand(0,count($nomes)-1)];
	}

	function homem_rato(){
		$nomes = explode("\n", file_get_contents($this->base_path.'txt/homens_ratos.txt'));
		return $nomes[rand(0,count($nomes)-1)];
	}

	function egipcio(){
		$nomes = explode("\n", file_get_contents($this->base_path.'txt/egipcios.txt'));
		return $nomes[rand(0,count($nomes)-1)];
	}

	function goticos(){
		$nomes = explode("\n", file_get_contents($this->base_path.'txt/goticos.txt'));
		return $nomes[rand(0,count($nomes)-1)];
	}

	function animais(){
		$nomes = explode("\n", file_get_contents($this->base_path.'txt/animais.txt'));
		return $nomes[rand(0,count($nomes)-1)];
	}

	function asteca(){
		$nomes = explode("\n", file_get_contents($this->base_path.'txt/asteca.txt'));
		return $nomes[rand(0,count($nomes)-1)];
	}

	function constelacoes(){
		$nomes = explode("\n", file_get_contents($this->base_path.'txt/constelacoes.txt'));
		return $nomes[rand(0,count($nomes)-1)];
	}

	function galaxias(){
		$nomes = explode("\n", file_get_contents($this->base_path.'txt/galaxias.txt'));
		return $nomes[rand(0,count($nomes)-1)];
	}

	function naves(){
		$nomes = explode("\n", file_get_contents($this->base_path.'txt/naves.txt'));
		return $nomes[rand(0,count($nomes)-1)];
	}

	function deuses(){
		$nomes = explode("\n", file_get_contents($this->base_path.'txt/deuses.txt'));
		return $nomes[rand(0,count($nomes)-1)];
	}

	function piratas(){
		$nomes = explode("\n", file_get_contents($this->base_path.'txt/piratas.txt'));
		return $nomes[rand(0,count($nomes)-1)];
	}

	function reis(){
		$nomes = explode("\n", file_get_contents($this->base_path.'txt/reis.txt'));
		return $nomes[rand(0,count($nomes)-1)];
	}

	function super_herois(){
		$nomes = explode("\n", file_get_contents($this->base_path.'txt/super-herois.txt'));
		return $nomes[rand(0,count($nomes)-1)];
	}

	function super_herois_br(){
		$nomes = explode("\n", file_get_contents($this->base_path.'txt/super-herois-pt-br.txt'));
		return $nomes[rand(0,count($nomes)-1)];
	}

	function titulos_divinos(){
		$nomes = explode("\n", file_get_contents($this->base_path.'txt/titulos-divinos.txt'));
		return $nomes[rand(0,count($nomes)-1)];
	}

}