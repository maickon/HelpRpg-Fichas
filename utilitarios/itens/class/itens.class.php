<?php
/*
**      Classe  Itens
**      Produz itens magicos aleatorios
**      para uma aventura de RPG
**
**      @author Maickon Rangel - 2016
*/

class Itens{

  public $base_path;
  public $itens_estupidos;
  public $armas_magicas;
  public $habilidade;
  public $escudos_magicos;
  public $armaduras_magicas;
  public $aneis_magicos;
  public $grimorios;
  public $titulo;

  function __construct(){
          $this->base_path = "C:/xampp/htdocs/utilitarios/itens/class/txt/";
  }

  function gerar_item($path, $title, $attr){
          $this->titulo[$attr] = $title;
          $file = $this->get_file($path);
          $file_lines = explode("\n", $file);
          $escolhido = $file_lines[rand(0, count($file_lines)-1)];
          $this->$attr = $escolhido;
  }

  function show_item_test($data){
          $data['object']->$data['method']($data['path'],$data['title'],$data['attr']);
          echo $data['object']->titulo[$data['attr']];
          echo '<br>';
          echo $data['object']->$data['attr'];
          echo '<hr>';
  }

  function get_file($file){
          return file_get_contents($file);
  }
}
