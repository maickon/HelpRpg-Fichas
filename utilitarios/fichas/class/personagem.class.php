<?php
/*
 * Class Personagem
 * CLasse responsável por estabelecer a forma de um personagem
 * de Dungeons and Dragons
 * @author Mackon Rangel
 * @date 01/05/2015
 */
class Personagem{

  public $propriedades;

  function __construct(){
    $this->dgd_nivel();
    $this->dgd_sexo();
    $this->dgd_nome();
    $this->dgd_cor_dos_olhos();
    $this->dgd_cor_da_pele();
    $this->dgd_cor_do_cabelo();
    $this->dgd_estilo_da_boca();
    $this->dgd_estilo_do_cabelo($this->sexo);
    $this->dgd_estilo_da_sobrancelha();
    $this->dgd_estilo_do_rosto();
    $this->dgd_estilo_de_olho();
    $this->dgd_estilo_de_queixo();
    $this->dgd_estilo_de_testa();
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
   * Metodo nivel()
   * Retorna o nível do personagem
   * @param $nivel =  é o nível do personagem
   */

  public function dgd_nivel($nivel = null){
    if($nivel):
      $this->nivel = $nivel;
    else:
      $this->nivel = rand(1, 99);
    endif;
  }

  /*
   * Metodo nome()
   * Retorna um nome aleatorio para o personagem
   */

  public function dgd_nome(){
    require_once '../listas/nomes/nomes.php';
    if($this->sexo == 'Masculino'):
      $this->nome = $nomesMasculinos[rand(0, count($nomesMasculinos))];
    else:
      $this->nome = $nomesFemininos[rand(0, count($nomesFemininos))];
    endif;
  }

  /*
   * Metodo dgd_sexo()
   * Define o sexo do personage de forma aleatoria
   */

  public function dgd_sexo(){
    $sexo_id = rand(1,2);
    if($sexo_id == 1)
      $this->sexo = 'Masculino';
    else
      $this->sexo = 'Feminino';
  }

  /*
   *  Metodo dgd_cor_de_cabelo()
   *  Define de forma aleatoria uma cor para o cabelo do personagem
   */

  public function dgd_cor_do_cabelo(){
    $cor_cabelo = array(
        'Preto','Branco','Azul','Cinza','Verde','Vermelho','Loiro','Violeta','Castanhos','Ruivo',
        'Rosa', 'Lilás', 'Roxo', 'Azul Mar', 'Bege', 'Amarelo');

    $this->cor_do_cabelo = ($cor_cabelo[rand(0,count($cor_cabelo)-1)]);
  }

  /*  Metodo dgd_estilo_do_cabelo()
   *  Define como é o estilo do cabelo do personagem
   *  @param sexo = O parametro sexo indica sobre qual metodo
   *  chamar para definir o estilo de cabelo correto
   */

  public function dgd_estilo_do_cabelo($sexo){

    switch($sexo):
      case 'Masculino':
        $this->estilo_do_cabelo = $this->dgd_estilo_do_cabelo_masculino();
      break;

      case 'Feminino':
        $this->estilo_do_cabelo = $this->dgd_estilo_do_cabelo_feminino();
      break;
    endswitch;
  }

  /*  Metodo dgd_estilo_do_cabelo_masculino()
   *  Define de forma aleatoria um estilo de cabelo
   *  para o sexo masculino
   */

  public function dgd_estilo_do_cabelo_masculino(){
    $estilos = array(
        'Cabelo Longo', 'Cabelo Cacheado', 'Cabelo curto', 'Cebelo muito Curto (Militar)',
        'Cabelo curto para trás', 'Cabelo Dividido no meio', 'Cabelo Bagunçado', 'Cabelo Arrepiado',
        'Cabelo com Topete', 'Cabelo Moecano', 'Cabelo com Franja', 'Cabelo Indígena', 'Cabelo Raça-fare',
        'Cabelo com Dred', 'Cabelo Afro', 'Cabelo Black Power', 'Cabelo Muito Liso', 'Cabeça raspada');

    $escolhido = $estilos[rand(0, count($estilos)-1)];
    if($escolhido == 'Cabeça raspada'):
      $this->cor_do_cabelo = 'Cabelo sem cor';
    endif;
    return ($escolhido);
  }

  /*  Metodo dgd_estilo_do_cabelo_feminino()
   *  Define de forma aleatoria um estilo de cabelo
   *  para o sexo feminino
   */

  public function dgd_estilo_do_cabelo_feminino(){
    $estilos = array(
        'Cabelo longo', 'Cabelo Muito longo', 'Cabelo cacheado curto', 'Cabelo Cacheado longo',
        'Cabelo cacheado','Black Power', 'Cabelo muito liso curto', 'Cabelo Trançado longo',
        'Cabelo curto', 'Cabelo curto com franja', 'Cabelo longo com franja', 'Cabelo curto espetado',
        'Cabelo curto divididoa ao meio', 'Cabelo emo', 'Cabelo Raça-fare longo', 'Cabelo raça-fare curto',
        'Cabelo maria chiquinha', 'Cabelo bagunçado', 'Cabeça raspada', 'Cabelo Levemente Ondulado', 'Cabelo Ondulado',
        'Cabelo Afro', );

    $escolhido = $estilos[rand(0, count($estilos)-1)];
    if($escolhido == 'Cabeça raspada'):
      $this->cor_do_cabelo = 'Cabelo sem cor';
    endif;
    return ($escolhido);
  }

  /*  Metodo dgd_cor_dos_olhos()
   *  Define a cor dos oslhos do personagem
   */

  public function dgd_cor_dos_olhos(){
    $cor_dos_olhos = array('Preto','Branco','Azul','Azul-esverdeado','Cinza','Verde','Vermelho','Castanho','violeta');
    $this->cor_dos_olhos = $cor_dos_olhos[rand(0, count($cor_dos_olhos)-1)];
  }

  /*  Metodo dgd_cor_da_pele()
   *  Define a cor da pele do personagem
   */

  public function dgd_cor_da_pele(){
    $cor_da_pele = array('Muito clara','Clara','Parda','Negra','Morena','Branca');
    $this->cor_da_pele = $cor_da_pele[rand(0, count($cor_da_pele)-1)];
  }

  /* Metodo dgd_estilo_do_nariz
   * Define como é o nariz do personagem
   */

  public function dgd_estilo_do_nariz(){
    $tipo_de_nariz = array('Grande','Pequeno','Longo','Curto','Reto','Curvo para Cima','Adunco','Romano','Ondulado','Arrebitado','Pontudo','Arredondado','Achatado e Largo','Núbio');
    $this->estilo_do_nariz = ($tipo_de_nariz[rand(0, count($tipo_de_nariz)-1)]);
  }

  /* Metodo dgd_estilo_da_boca
   * Define como é a boca do personagem
  */

  public function dgd_estilo_da_boca(){
    $tipo_da_boca = array('Lábios Carnudos','Boca Grande','Labio superior predominante ','Lábio inferior predominante',
                'Boca pequena','Lábios Finos','Lábio superior mais fino','Lábio Inferior mais fino',
                'Lábios Grossos','Labios Caídos','Lábios Pequenos');
    $this->estilo_da_boca = ($tipo_da_boca[rand(0, count($tipo_da_boca)-1)]);
  }

  /* Metodo dgd_estilo_da_sobrancelha
   * Define como são as sobrancelhas do personagem
  */

  public function dgd_estilo_da_sobrancelha(){
    $tipo_da_sobrancelha = array(
        'Sobrancelhas retas','Sobrancelhas redondas','Sobrancelhas caídas','Sobrancelhas arqueadas',
        'Sobrancelhas finas', 'Sobrancelhas Grossas', 'Sobrancelhas curvadas');
    $this->estilo_da_sobrancelha = $tipo_da_sobrancelha[rand(0, count($tipo_da_sobrancelha)-1)];
  }

  /* Metodo dgd_estilo_do_rosto
   * Define como é a forma do rosto do personagem
  */

  public function dgd_estilo_do_rosto(){
    $estilo_do_rosto = array(
        'Oval','Redondo','Triângulo Invertido','Quadrado',
        'Retângulo', 'Diamante', 'Rosto Longo','Pêra');
    $this->estilo_do_rosto = ($estilo_do_rosto[rand(0, count($estilo_do_rosto)-1)]);
  }

  /* Metodo dgd_estilo_de_olho
   * Define como é a forma dos olhos do personagem
  */

  public function dgd_estilo_de_olho(){
    $estilo_de_olho = array(
        'Olhos Amendoados','Olhos Profundos','Olhos encapsulados','Olhos salientes',
        'Olhos sonolentos', 'Olhos com pálpebra voltada para Baixo', 'Olhos separados',
        'Olhos aproximados', 'Olhos asiáticos');
    $this->estilo_do_olho = ($estilo_de_olho[rand(0, count($estilo_de_olho)-1)]);
  }

  /* Metodo dgd_estilo_de_queixo
   * Define como é a forma do queixo do personagem
  */

  public function dgd_estilo_de_queixo(){
    $estilo_de_queixo = array(
        'Padrão','Pontudo','Pronunciado','Redondo',
        'Reto', 'Retraído', 'Largo', 'Estreito', 'Redondo', 'Longo e pontudo', 'Pontudo não pronunciado', 'Pequeno e bem-feito',
        'Para dentro','Com furinho','Muito pequeno','Duplo');
    $this->estilo_do_queixo = ($estilo_de_queixo[rand(0, count($estilo_de_queixo)-1)]);
  }

  /* Metodo dgd_estilo_de_testa
   * Define como é a forma da testa do personagem
  */

  public function dgd_estilo_de_testa(){
    $estilo_de_testa = array(
        'Longo','Oval','Redondo','Retangular','Quadrado','Triangular','Diamante','Triango Invertido','Coração');
    $this->estilo_da_testa = ($estilo_de_testa[rand(0, count($estilo_de_testa)-1)]);
  }
}
