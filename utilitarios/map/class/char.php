<?php
/*
**  Char
**  Classe para criação de um personagem
**  que se movimenta denrto de um mapa.
**
**  @author Maickon Rangel - 2016
**
*/

class Char{
  private $position_x;
  private $position_y;
  private $old_position_x;
  private $old_position_y;
  private $img_tile;
  private $current_position;
  private $cel;

  function __construct($img){
    $this->img_tile     = $img;
    $this->cel();
    $this->position_x  = 0;
    $this->position_y  = 0;
    $this->old_position_x  = 0;
    $this->old_position_y  = 0;
  }

  function set_position_x($x){
    $this->position_x = $x;
  }

  function get_position_x(){
    return $this->position_x;
  }

  function set_old_position_x($x){
    $this->old_position_x = $x;
  }

  function get_old_position_x(){
    return $this->old_position_x;
  }

  function set_old_position_y($y){
    $this->old_position_y = $y;
  }

  function get_old_position_y(){
    return $this->old_position_y;
  }

  function set_position_y($y){
    $this->position_y = $y;
  }

  function get_position_y(){
    return $this->position_y;
  }

  function get_cel(){
    return $this->cel;
  }

  function set_position_cel($cel){
    $this->cel = $cel;
  }

  function cel(){
    $this->cel = "<img src={$this->img_tile} draggable='true' class='img_tile_char'>";
  }

  function current_position(){
    $this->current_position = [$this->$position_x, $this->$position_y];
  }

  function show_char(){
    print("Posicao x: {$this->position_x}");
    print("Posicao y: {$this->position_y}");
    print("Posicao img: {$this->img_tile}");
  }
}
