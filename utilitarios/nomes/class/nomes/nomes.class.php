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
		$this->define_base_path();
		$nomes = explode("\n", file_get_contents($this->base_path.'txt/'.$nome.'.txt'));
		$this->nome = $nomes[rand(0,count($nomes)-1)];
	}

	function define_base_path(){
		if(file_exists("{$_SERVER['DOCUMENT_ROOT']}/HelpRpg/utilitarios/nomes/class/nomes/")):
			$this->base_path = "{$_SERVER['DOCUMENT_ROOT']}/HelpRpg/utilitarios/nomes/class/nomes/";
		else:
			$this->base_path = "{$_SERVER['DOCUMENT_ROOT']}/utilitarios/nomes/class/nomes/";
		endif;			 
	}
}