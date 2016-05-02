<?php

/*
** Class Personalidades 
**
** Cria padroes de personalidade para 
** personagens de RPG.
**
** @author Maickon Rangel - 2016
*/

class Personalidades{
	
	public $titulos;
	public $aspecto_positivo;
	public $aspecto_negativo;
	public $caracteristicas_gerais;
	public $ideologias;
	public $medos;
	public $profissao;
	public $tendencia;
	public $base_path;

	function __construct(){
		$this->define_base_path();
	}

	function define_base_path(){
		if(file_exists("{$_SERVER['DOCUMENT_ROOT']}/HelpRpg/utilitarios/personalidades/class/")):
			$this->base_path = "{$_SERVER['DOCUMENT_ROOT']}/HelpRpg/utilitarios/personalidades/class/";
		else:
			$this->base_path = "{$_SERVER['DOCUMENT_ROOT']}/utilitarios/personalidades/class/";
		endif;			 
	}

	function gerar_aspecto($arquivo, $titulos, $qtd = 1){
		$aspecto = $this->get_list($arquivo.".txt");
		if($qtd > 1):
			$aspecto_escolhido = "";
			$this->titulos[$titulos[0]] = $titulos[1];
			for($i=0; $i<$qtd; $i++):
				$esc = $aspecto[rand(0,count($aspecto)-1)];
				if($i == ($qtd-1)):
					$aspecto_escolhido 	.= "{$esc} ";
				else:
					$aspecto_escolhido 	.= "{$esc}, ";
				endif;
			endfor;
		else:
			$this->titulos[$titulos[0]] = $titulos[2];
			$aspecto_escolhido 	= $aspecto[rand(0,count($aspecto)-1)];
		endif;


		$this->$titulos[0] = "{$aspecto_escolhido}";
	}

	function get_list($file){
		return explode("\n", file_get_contents($this->base_path.'txt/'.$file)); 
	}
}