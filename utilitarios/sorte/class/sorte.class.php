<?php
/*
**      Classe  Sorte
**      Produz aspectos aleatorios sobre a sorte
**      de personagens para uma aventura de RPG
**
**      @author Maickon Rangel - 2016
*/

class Sorte{

  public $base_path;
  public $afetado;
  public $acontecimento;
  public $titulo;

  function __construct(){
          $this->define_base_path();
  }

  function define_base_path(){
    if(file_exists("{$_SERVER['DOCUMENT_ROOT']}/HelpRpg/utilitarios/nomes/class/nomes/")):
      $this->base_path = "{$_SERVER['DOCUMENT_ROOT']}/HelpRpg/utilitarios/nomes/class/nomes/";
    else:
      $this->base_path = "{$_SERVER['DOCUMENT_ROOT']}/utilitarios/nomes/class/nomes/";
    endif;       
  }

  function gerar_sorte($path, $title, $attr){
          $this->titulo[$attr] = $title;
          $file = $this->get_file($path);
          $file_lines = explode("\n", $file);
          $escolhido = $file_lines[rand(0, count($file_lines)-1)];
          $this->$attr = $escolhido;
  }

  function show_sorte_test($data){
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
