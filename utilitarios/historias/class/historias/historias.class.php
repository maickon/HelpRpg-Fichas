<?php
/*
**	Gerador de historias - Help Rpg
**	@outhor Maickon Rangel
**	@project Help Rpg
**	@date 2016
**
*/

class Historias{
	Personagem $personagem;
	Lugares $lugar
	$pronome;
	$artigo;

	function __construct($personagem){
		$this->nome = $personagem;
		if($sexo == 'Masculino'):
			$this->pronome 	= 'ele';
			$this->artigo 	= 'um';
		elseif($sexo == 'Feminino'):
			$this->pronome 	= 'ela';
			$this->artigo 	= 'uma';
		endif;
	}

	function historia_passo_1(){
		$historias['passo-1'] = "{$this->personagem->nome} tem {$this->personagem->idade}, nasceu em <place>, <palce_description>. Lá <genere> cresceu e se tornou <>";
	}
}