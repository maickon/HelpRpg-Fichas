<?php
/**
 * @project PainelAdm
 * @author Maickon Rangel
 * @date 02/07/2015
 * @contact maickon4developers@gmail.com
 * @version 1.0
 * @link https://github.com/maickon/PainelAdm
 *
 * roteador.class.php
 * Classe respons�vel por rotear as p�ginas do 
 * sistema, ela aceita um solicita��o de a��o que normalmente
 * � uma vari�vel via $_GET com o nome de 'acao' cada tipo de 
 * valor armazenado na vari�vel a��o vai levar para uma p�gina 
 * espec�fica dentro do sistem.
 **/
class Roteador{

	function __construct($acao){
		$this->rotear_pagina($acao);
	}

	function rotear_pagina($acao){
		switch($acao):
			case 'login': require LOGINPATH;
			break;
			
			case ' ':require SERVER_NAME.PHP_SELF;
			break;
				
			default: require_once HOME_PATH;
			break;
		endswitch;
	}
}
?>