<?php
/*
** Gerador de tavernas
** Criado por Maickon Rangel 20/03/2016
** Fontes de inspiracoes para este projeto:
** @link http://www.pontosdeexperiencia.com.br/2016/01/gerador-de-nomes-de-tavernas.html
** @link https://carismazero.wordpress.com/2015/02/21/10-bebidas-fantasticas-para-voce-usar-em-sua-campanha/
** @link https://newtonrocha.wordpress.com/2008/12/04/diversao-na-taverna-artigos-de-rpg-do-bau-do-tio-nitro/
** @helprpg.com.br
*/

require_once '../fichas/class/ded/3.5/racas.class.php'; 

class Taverna{
	
	public $aparencia;
	public $base_path;
	public $sexo;
	public $nome;
	public $idade;
	public $raca;
	public $personalidade;
	public $taverna;
	public $objetos_de_briga;
	public $tempo_profissao;

	function __construct(){
		$this->define_base_path();
		$this->sexo = array_rand([0,1]);
		$this->taverna_nome();
		$this->taverna_raca_taverneiro();
		$this->taverna_nome_taverneiro();
		$this->taverna_aparencia_taverneiro(5);
		$this->taverna_idade_taverneiro();
		$this->taverna_tempo_de_profissao();
		$this->taverna_personalidade_taverneiro(3);
		$this->taverna_carnes(3);
		$this->taverna_frutas(3);
		$this->taverna_legumes(3);
		$this->taverna_verduras(3);
		$this->taverna_bebidas(3);
		$this->taverna_objetos_de_briga();
	}

	function define_base_path(){
		if(file_exists("{$_SERVER['DOCUMENT_ROOT']}/HelpRpg/utilitarios/taverna/class/")):
			$this->base_path = "{$_SERVER['DOCUMENT_ROOT']}/HelpRpg/utilitarios/taverna/class/";
		else:
			$this->base_path = "{$_SERVER['DOCUMENT_ROOT']}/utilitarios/taverna/class/";
		endif;
			 
	}

	function taverna_nome_taverneiro(){
		if($this->sexo == 0):
			$this->nome = new Nomes('humanos-masculino');
		else:
			$this->nome = new Nomes('humanos-feminino');
		endif;
	}

	function taverna_aparencia_taverneiro($qtd){
		$aparencia_final = '';
		$lista = $this->get_list('aparencias.txt');
		$this->aparencia = $this->chek_list($lista, 5);
	}

	function taverna_idade_taverneiro(){
		$racas = $this->raca;
		$idade = [
					'Humano'	=> rand(15,100),
					'Elfo'		=> rand(35,600),
					'Gnomo' 	=> rand(85,1200),
					'Gnoma'		=> rand(85,1200),
					'Meio elfo' => rand(30,400),
					'Meio orc' 	=> rand(15,500),
					'Halfling' 	=> rand(10,85),
					'Humana'	=> rand(15,200),
					'Anã'		=> rand(15,100),
					'Anão'		=> rand(15,100),
					'Elfa'		=> rand(35,600),
					'Gnoma'		=> rand(85,1200),
					'Meio elfa'	=> rand(30,400)
				];

		$this->idade = $idade[$racas[0]];
	}

	function taverna_tempo_de_profissao(){
		$experiencia = ['anos', 'meses', 'dias'];
		$divisor = rand(2,4);
		$tempo = $experiencia[rand(0,2)];
		$carreira = intval($this->idade/$divisor);
		if($carreira == 1)
			$carreira = 2;
		$this->tempo_profissao = "Possui {$carreira} {$tempo} de experiência.";

	}

	function taverna_raca_taverneiro(){
		$lista = $this->get_list('racas.txt');
		$this->raca = $this->chek_list($lista, 1);
	}

	function taverna_personalidade_taverneiro($qtd){
		$lista = $this->get_list('personalidades.txt');
		$this->personalidade = $this->chek_list($lista, $qtd);
	}

	function taverna_carnes($qtd){
		$lista = $this->get_list('carnes.txt');
		$this->carnes = $this->chek_list($lista, $qtd);
	}

	function taverna_frutas($qtd){
		$lista = $this->get_list('frutas.txt');
		$this->frutas = $this->chek_list($lista, $qtd);
	}

	function taverna_legumes($qtd){
		$lista = $this->get_list('legumes.txt');
		$this->legumes = $this->chek_list($lista, $qtd);
	}

	function taverna_verduras($qtd){
		$lista = $this->get_list('verduras.txt');
		$this->legumes = $this->chek_list($lista, $qtd);
	}

	function taverna_bebidas($qtd){
		$lista = $this->get_list('bebidas.txt');
		$this->bebidas = $this->chek_list($lista, $qtd);
	}

	function taverna_objetos_de_briga(){
		$lista = $this->get_list('objetos_na_hora_da_briga.txt');
		$this->objetos_de_briga = $this->chek_list($lista, 3);
	}

	function taverna_nome(){
		$tipo = ['Taverna','Estalagem do'];
		$nome = $tipo[rand(0, count($tipo)-1)];

		//pq = [personagem][qualidade]
		//oo = [objeto][objeto]
		//pp = [personagem][personagem]
		//oq = [objeto][qualidade]

		$nome_taverna = [];
		$forma = ['pq','oo','pp','oq','np'];
		$forma_escolhida = $forma[rand(0, count($forma)-1)];
	
		switch($forma_escolhida):
			case 'pq': 
				$nome_taverna1 	= $this->chek_list($this->get_list('personagem.txt'),1);
				$nome_taverna2		= $this->chek_list($this->get_list('qualidade_personagem.txt'),1);
				$nome_taverna[]		= $nome_taverna1[0];
				$nome_taverna[]		= $nome_taverna2[0];
			break;

			case 'oo':
				$objetos_escolhidos = $this->chek_list($this->get_list('objetos.txt'), 2);
				$nome_taverna[]		= $objetos_escolhidos[0];
				$nome_taverna[]		= $objetos_escolhidos[1];
			break;

			case 'pp':
				$escolhidos 		= $this->chek_list($this->get_list('personagem.txt'), 2);
				$nome_taverna[]		= $escolhidos[0];
				$nome_taverna[]		= $escolhidos[1];
			break;

			case 'oq':
				$nome_taverna1 		= $this->chek_list($this->get_list('objetos.txt'),1);
				$nome_taverna2		= $this->chek_list($this->get_list('qualidade_objetos.txt'),1);
				$nome_taverna[]		= $nome_taverna1[0];
				$nome_taverna[]		= $nome_taverna2[0];
			break;

			case 'np':
				$lista = $this->get_list('tavernas_nomes.txt');
				$nome_taverna[]		= $lista[rand(0, count($lista)-1)];
			break;
		endswitch;

		
		$taverna = "{$nome} ";
		
		for($i=0; $i<count($nome_taverna); $i++):
			if($forma_escolhida != 'np'):
				if($i == 0 and stristr(substr($nome_taverna[0],2),'a') || stristr(substr($nome_taverna[0],2),'ã') ):
					$taverna = 'Estalagem da ';
				elseif($i == 0 and stristr(substr($nome_taverna[0],2),'o') || stristr(substr($nome_taverna[0],2),'ã') ):
					$taverna = 'Estalagem do ';
				elseif($i == 0 and stristr(substr($nome_taverna[0],2),'s') && stristr(substr($nome_taverna[0],3),'a') ):
					$taverna = 'Estalagem das ';
				endif;
			endif;
			$taverna .= "{$nome_taverna[$i]} ";
		endfor;

		$this->taverna = $taverna;
	}

	function chek_list($lista, $qtd){
		$aparencia_final = '';
		$aparencia_definitiva = [];

		for($i=0; $i<$qtd; $i++):
			$key = rand(0,count($lista)-1);
			$aparencia_bruta = $lista[$key];
			unset($lista[$key]);
			$lista = array_values($lista);
			if(strstr($aparencia_bruta, '|')):
				$aparencia_filtro1 = explode('|', $aparencia_bruta);
				$key2 = rand(0,count($aparencia_filtro1)-1);
				if(strstr($aparencia_filtro1[$key2], '/')):
					$aparencia_filtro2 = explode('/', $aparencia_filtro1[$key2]);
					$aparencia_final = $aparencia_filtro2[$this->sexo];
				else:
					$aparencia_final = $aparencia_filtro1[$key2];
				endif;
			elseif(strstr($aparencia_bruta, '/')):
				$aparencia_filtro2 = explode('/', $aparencia_bruta);
				$aparencia_final = $aparencia_filtro2[$this->sexo];
			else:
				$aparencia_final = $aparencia_bruta;
			endif;
			$aparencia_definitiva[$i] = $aparencia_final;
		endfor;
		return $aparencia_definitiva;
	}

	function get_list($file){
		return explode("\n", file_get_contents($this->base_path.'txt/'.$file)); 
	}
}

