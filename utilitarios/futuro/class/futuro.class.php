<?php

/*
** Gerador de Sorte para RPG
** @autor Maickon Rangel - 26/03/2016
** Inspirado em http://www.pontosdeexperiencia.com.br/2016/02/gerador-de-sorte-lendo-mao-de-seu.html
*/
class Futuro{
	public $base_path;
	public $afetado;
	public $acontecimento;

	function __construct(){
		$this->base_path = 'C:/xampp/htdocs/utilitarios/futuro/class/';
		$this->afetado();
		$this->acontecimento();
	}

	function afetado(){
		$afetado = $this->get_list('afetados.txt');
		$this->afetado = $afetado[rand(0,count($afetado)-1)];
	}

	function acontecimento(){
		$acontecimento = $this->get_list('acontecimentos.txt');
		$this->acontecimento = $acontecimento[rand(0,count($acontecimento)-1)];
	}

	function get_list($file){
		return explode("\n", file_get_contents($this->base_path.'txt/'.$file)); 
	}


}