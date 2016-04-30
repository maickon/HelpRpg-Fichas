<?php
/*
**      Classe  NomeEspada
**      Produz um nome aleatorio para
**      uma espada
**
**      @author Maickon Rangel - 2016
*/

class NomeEspada{

  public $base_path;
  public $primeiro_nome;
  public $segundo_nome;
  public $titulo;

  function __construct(){
          $this->base_parh = "/var/www/html/encontros-aleatorio/";
  }

  function gerar_nome($path, $title, $attr){
          $this->titulo[$attr] = $title;
          $file = $this->get_file($path);
          $file_lines = explode("\n", $file);
          $escolhido = $file_lines[rand(0, count($file_lines)-1)];
          $this->$attr = $escolhido;
  }

  function show_nome_test($data){
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
