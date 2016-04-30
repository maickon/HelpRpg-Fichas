<?php
/*
 * Classe Atributos
 * Esta classe prover métodos para geração de 
 * valores de habilidade base de uma ficha de RPG
 * Dungeons and Dragons.
 * @author Mackon Rangel
 */
class Atributos{
	
	public $propriedades;
	
	function __construct($nivel, $classe){
		$this->forca 		= $this->dgd_habilidades();
		$this->destreza 	= $this->dgd_habilidades();
		$this->constituicao = $this->dgd_habilidades(); 
		$this->inteligencia = $this->dgd_habilidades();
		$this->sabedoria 	= $this->dgd_habilidades();
		$this->carisma 		= $this->dgd_habilidades();
		$mod_inteligencia = $this->dgd_modificador($this->inteligencia);
		$this->dgd_pericias($nivel, $classe, $mod_inteligencia);
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
	
	/*
	 * Metodo dgd_habilidades()
	 * Prover a simulação de uma rolagem de 4 dados de 6 faces
	 * descartando o menor número.
	 * @param nivel = Nível do personagem
	 */
	function dgd_habilidades(){
		do{
			$rol_1 = rand(1, 6);
			$rol_2 = rand(1, 6);
			$rol_3 = rand(1, 6);
			$rol_4 = rand(1, 6);
			
			$menor = $rol_1;
			if($menor > $rol_2):
				$menor = $rol_2;
			elseif($menor > $rol_3):
				$menor = $rol_3;
			elseif($menor > $rol_4):
				$menor = $rol_4;
			endif;
			
			$rolagem = $rol_1 + $rol_2 + $rol_3 + $rol_4;
			$rolagem -= $menor;
		}while($rolagem <= 8);
		
		return $rolagem;
		
	}
	
	/*
	 * Metodo dgd_modificador()
	 * Cria o modificado de cada habilidade base 
	 * de um personagem de Dungeons and Dragons
	 * @param attr = Valor do atributo
	 */
	function dgd_modificador($attr){
		$modificador = 0;
		$modificador_final = 0;
		
		switch($modificador):
			case -0.5: $modificador_final = -1;
			break;
			
			case -1.5: $modificador_final = -2;
			break;
			
			case -2.5: $modificador_final = -3;
			break;
			
			case -3.5: $modificador_final = -4;
			break;
			
			case -4.5: $modificador_final = -5;
			break;
			
			default: $modificador_final = $modificador;
			break;
		endswitch;
		
		if(intval($modificador_final) > 0):
			return '+' . strval(intval($modificador_final));
		elseif(intval($modificador_final) == 0):
			return '+' . strval(intval($modificador_final));
		else:
			return strval(intval($modificador_final));
		endif;
	}
	
	/*	Metodo dgd_bonus_adicional()
	 * 	Calcula o bonus de habilidade adicional a 
	 * 	cada 4 niveis de personagem conferme as regras de D&D
	 * 	@param nivel = O nivel do personagem
	 */
	
	function dgd_bonus_adicional($nivel){
		return intval($nivel/4);
	}
	
	/* Metodo dgd_pericias()
	 * Calcula os pontos de pericia de um personagem
	 * conforme o seu nivel
	 */
	function dgd_pericias($nivel, $classe, $mod_inteligencia){
		if($classe == 'Bárbaro' || $classe == 'Bárbara'):
			$this->pts_pericia = ((4+$mod_inteligencia)*4)*$nivel;

		elseif($classe == 'Bardo' || $classe == 'Barda'):
			$this->pts_pericia = ((6+$mod_inteligencia)*4)*$nivel;
		
		elseif($classe == 'Clérigo' || $classe == 'Clériga'):
			$this->pts_pericia = ((2+$mod_inteligencia)*4)*$nivel;
		
		elseif($classe == 'Druída' || $classe == 'Druída'):
			$this->pts_pericia = ((4+$mod_inteligencia)*4)*$nivel;
		
		elseif($classe == 'Feiticeiro' || $classe == 'Feiticeira'):
			$this->pts_pericia = ((2+$mod_inteligencia)*4)*$nivel;
		
		elseif($classe == 'Guerreiro' || $classe == 'Guerreira'):
			$this->pts_pericia = ((2+$mod_inteligencia)*4)*$nivel;
		
		elseif($classe == 'Ladino' || $classe == 'Ladina'):
			$this->pts_pericia = ((8+$mod_inteligencia)*4)*$nivel;
		
		elseif($classe == 'Mago' || $classe == 'Maga'):
			$this->pts_pericia = ((2+$mod_inteligencia)*4)*$nivel;
		
		elseif($classe == 'Monge' || $classe == 'Monge'):
			$this->pts_pericia = ((4+$mod_inteligencia)*4)*$nivel;
		endif;
	}
}