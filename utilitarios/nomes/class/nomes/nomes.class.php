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
		$nomes = explode("\n", file_get_contents($this->base_path.'txt/'.$nome.'.txt'));
		$this->nome = $nomes[rand(0,count($nomes)-1)];
	}
}