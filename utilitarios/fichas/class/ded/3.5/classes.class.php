<?php
/*
	Classes
	Classe responsavel por gerar uma classe 
	de D&D 3.5 de forma aleatoria
*/

class Classes{

	public $propriedades;
	
	function __construct($sexo){
		$this->dgd_classe($sexo);
	}
	
	function __set($propriedade, $valor){
		if($propriedade):
			$this->propriedades[$propriedade] = $valor;
		else:
			echo 'Parametro não Informado.';
		endif;
	}
	
	function __get($propriedade){
		if($propriedade):
			return $this->propriedades[$propriedade];
		else:
			echo 'Parametro não Informado.';
		endif;
	}

	function dgd_classe($sexo){
		$classes = [];
		if($sexo == 'Masculino' || $sexo == 'masculino'):
			$classes = ['Bárbaro', 'Bardo', 'Clérigo', 'Druida', 'Feiticeiro', 'Ladino', 'Mago', 'Monge', '	Paladino', ' Ranger'];
		else:
			$classes = ['Bárbara', 'Barda', 'Clériga', 'Druida', 'Feiticeira', 'Ladina', 'Maga', 'Monge', '	Paladina', ' Ranger'];
		endif;
		$classe_escolhida = $classes[rand(0, count($classes)-1)];
		$this->classe = ($classe_escolhida);
	}
}