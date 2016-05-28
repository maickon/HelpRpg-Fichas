<?php

require "{$_SERVER['DOCUMENT_ROOT']}/HelpRpg/utilitarios/nomes/class/nomes/nomes.class.php";

Class Cidades{
	public $nome;
	public $tamanho;
	public $populacao_total;
	public $populacao_adulta;
	public $populacao_idosa;
	public $populacao_cianca;
	public $economia;
	public $base_path;

	function define_base_path(){
		if(file_exists("{$_SERVER['DOCUMENT_ROOT']}/HelpRpg/utilitarios/cidades/class/")):
			$this->base_path = "{$_SERVER['DOCUMENT_ROOT']}/HelpRpg/utilitarios/cidades/class/";
		else:
			$this->base_path = "{$_SERVER['DOCUMENT_ROOT']}/utilitarios/cidades/class/";
		endif;		 
	}

	function gerar_nome(){
		$this->nome = new Nomes('cidades');
	}

	function gerar_cidade($path, $title, $attr){
	    $this->titulo[$attr] = $title;
	    $file = $this->get_file($path);
	    $file_lines = explode("\n", $file);
	    $escolhido = $file_lines[rand(0, count($file_lines)-1)];
	    $this->$attr = $escolhido;
	}

	function populacao($populacao){
		$redutor = rand(1,10);
		$margem_idoso = rand(10,25) - $redutor;
		$margem_crianca = rand(10,25) - $redutor;

		if($margem_idoso == 0) $margem_idoso = 10;
		if($margem_crianca == 0) $margem_crianca = 10;

		$pupulacao_produtiva = 100 - ($margem_idoso + $margem_crianca);

		$this->populacao_adulta 	= ceil($populacao*$pupulacao_produtiva/100);
		$this->populacao_idosa 		= ceil($populacao*$margem_idoso/100);
		$this->populacao_cianca 	= ceil($populacao*$margem_crianca/100);
		$this->populacao_total 		= $populacao;
	}

	function gerar_populacao($tamanho){
		switch($tamanho):
			case 'Lugarejo':
				$p = rand(20,80);
				$this->populacao($p);
			break;

			case 'Povoado':
				$p = rand(81,400);
				$this->populacao($p);
			break;

			case 'Aldeia':
				$p = rand(401,1200);
				$this->populacao($p);
			break;

			case 'Vila pequena':
				$p = rand(1201,2500);
				$this->populacao($p);
			break;

			case 'Vila grande':
				$p = rand(2501,7000);
				$this->populacao($p);
			break;

			case 'Cidade pequena':
				$p = rand(7001,350000);
				$this->populacao($p);
			break;

			case 'Cidade grande':
				$p = rand(350001,800000);
				$this->populacao($p);
			break;

			case 'Metrópole':
				$p = rand(800001,1800000);
				$this->populacao($p);

			case 'Metrópole central':
				$p = rand(1800001,5800000);
				$this->populacao($p);
			break;
		endswitch;
	}

	function gerar_economia($moeda = 'PO'){

	}

	function get_file($file){
    	return file_get_contents($file);
  	}

}

$cidade = new Cidades;

$cidade->gerar_nome();

echo $cidade->nome->nome;

$cidade->gerar_cidade('txt/tamanho.txt', 'Tamanho', 'tamanho');
echo '<br>';
$cidade->gerar_populacao($cidade->tamanho);
// = 'Cidade pequena';
// Povoado
// Aldeia
// Vila pequena
// Vila grande
// Cidade pequena
// Cidade grande
// Metrópole
// Metrópole central

echo '<br>';
echo 'Adultos: '.$cidade->populacao_adulta;
echo '<br>';
echo 'Idosos: '.$cidade->populacao_idosa;
echo '<br>';
echo 'crancas: '.$cidade->populacao_cianca;
echo '<br>';
echo 'Total: '.$cidade->populacao_total;
