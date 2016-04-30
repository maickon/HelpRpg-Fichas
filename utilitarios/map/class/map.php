<?php
/*
**  MapTile
**  Classe para criação de mapas
**  e moovimentação de personagens.
**
**  @author Maickon Rangel - 2016
**
*/

class MapTile{
  private $map;
  private $size;
  private $img_tile;
  private $cel;
  private $width;
  private $height;
  private $chars;

  function __construct($img_tile){
    $this->img_tile = $img_tile;
    $this->cel();
  }

  function set_map_size($x, $y){
    $this->columns    = $x;
    $this->rows       = $y;
    $this->size       = $x*$y;
    $this->width      = $x*1.5;
    $this->height     = $y*1.5;
  }

  function add_char_to_world($char){
    $this->chars = $char;
  }

  function cel(){
    $this->cel = "<img src={$this->img_tile} draggable='true' class='img_tile'>";
  }

  function get_width(){
    print("Largura: {$this->width}m");
  }

  function get_height(){
    print("Comprimento: {$this->height}m");
  }

  function get_map(){
    return $this->map;
  }

  function display_area(){
    $base = 0;
    for($r=0; $r<$this->rows; $r++):
      for($c=0; $c<$this->columns; $c++):
        $base += 1.5;
      endfor;
    endfor;
    $total = (($base*$base)/2);
    $area  = number_format($total);
    print("Área: {$area}m°");
  }

  function display_size(){
    print("Mapa - {$this->rows}x{$this->columns}");
  }

  function save_map_world(){
    $file_name = "map_{$this->columns}x{$this->rows}_".mt_getrandmax(). date("His");;
    $file = file_put_contents('../maps/{$file_name}');
  }

  function make_world(){
    for($r=0; $r<$this->rows; $r++):
      for($c=0; $c<$this->columns; $c++):
        $this->map[$r][$c] = $this->cel;
      endfor;
    endfor;
  }

  function update_world(){
    $old_x = $this->chars->get_old_position_x();
    $old_y = $this->chars->get_old_position_y();

    $x = $this->chars->get_position_x();
    $y = $this->chars->get_position_y();

    $this->map[$old_x][$old_y]  = $this->cel;
    $this->map[$x][$y]          = $this->chars->get_cel();
  }

  function draw_map(){
    for($r=0; $r<$this->rows; $r++):
      print("<tr class='row'>");
      for($c=0; $c<$this->columns; $c++):
        print("<th class='column'>");
          print($this->map[$r][$c]);
        print("</th>");
      endfor;
      print("</tr>");
    endfor;
    $x = $this->chars->get_position_x();
    $y = $this->chars->get_position_y();
    $this->map[$x][$y] = $this->chars->get_cel();
  }

  function check_char_initial_position(){
    if(($this->char->position_x == 0) && ($this->char->position_y == 0)):
      return true;
    else:
      return false;
    endif;
  }

  function show_char(){
    print("Posicao x: {$this->chars->get_position_x()}");
    print("Posicao y: {$this->chars->get_position_y()}");
    print("Posicao img: {$this->chars->get_cel()}");
  }

  function top(){
    $x = $this->chars->get_position_x();
    $y = $this->chars->get_position_y();
    if(($x-1)<2 || ($x-1) > $this->height):
      $x = $x;
    else:
      $this->chars->set_old_position_x($x);
      $this->chars->set_old_position_y($y);
      $x = $x-1;
    endif;
    $this->chars->set_position_x($x);
    $this->update_world();
  }

  function down(){
    // aumentar o X faz descer o personagem (+x desce)
    $x = $this->chars->get_position_x();
    $y = $this->chars->get_position_y();
    if(($x+1)<1 || ($x+1) > $this->height):
      $x = $x;
    else:
      $this->chars->set_old_position_x($x);
      $this->chars->set_old_position_y($y);
      $x = $x+1;
    endif;
    $this->chars->set_position_x($x);
    $this->update_world();
  }

  function forward(){
    //aumentar o Y faz andar p/ frente
    $x = $this->chars->get_position_x();
    $y = $this->chars->get_position_y();
    if(($y+1)<1 || ($y+1) > $this->width):
      $y = $y;
    else:
      $this->chars->set_old_position_x($x);
      $this->chars->set_old_position_y($y);
      $y = $y+1;
    endif;
    $this->chars->set_position_y($y);
    $this->update_world();
  }

  function back(){
    //diminuir o Y faz andar p/ tras
    $x = $this->chars->get_position_x();
    $y = $this->chars->get_position_y();
    if(($y-1)<1 || ($y-1) > $this->width):
      $y = $y;
    else:
      $this->chars->set_old_position_x($x);
      $this->chars->set_old_position_y($y);
      $y = $y-1;
    endif;
    $this->chars->set_position_y($y);
    $this->update_world();
  }
}
