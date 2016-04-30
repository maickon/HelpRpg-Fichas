<?php
/*
**      Classe  Tempo
**      Produz aspectos aleatorios sobre o clima
**      atual de um local para uma aventura de RPG
**
**      @author Maickon Rangel - 2016
*/

class Tempo{

  public $base_path;
  public $temperatura;
  public $vento;
  public $precipitacao;
  public $titulo;

  function __construct(){
          $this->base_parh = "/var/www/html/encontros-aleatorio/";
  }

  function gerar_tempo($path, $title, $attr){
          $this->titulo[$attr] = $title;
          $file = $this->get_file($path);
          $file_lines = explode("\n", $file);
          $escolhido = $file_lines[rand(0, count($file_lines)-1)];
          $this->$attr = $escolhido;
  }

  function show_tempo_test($data){
          $data['object']->$data['method']($data['path'],$data['title'],$data['attr']);
          echo $data['object']->titulo[$data['attr']];
          echo '<br>';
          echo ucfirst($data['attr'].': ');
          echo $data['object']->$data['attr'];
          echo '<hr>';
  }

  function get_file($file){
          return file_get_contents($file);
  }
}
