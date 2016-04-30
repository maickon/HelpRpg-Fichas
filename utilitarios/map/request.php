<?php
require 'class/map.php';
require 'class/char.php';

if(isset($_POST['c']) && isset($_POST['r'])):
    $map = new MapTile("img/tile/2.png");
	$map->set_map_size($_POST['r'], $_POST['c']);
    $map->make_world();
endif;

echo json_encode($map->get_map());

// $map->make_world();

// $char  = new Char("img/character/character_2.gif");
// $map->add_char_to_world($char);
// $map->update_world();

// echo json_encode(array('valor' => $_POST['key_code']));
// $map->forward();
// $map->forward();
// $map->down();
// $map->forward();
// $map->forward();
// $map->back();
// $map->back();
// $map->down();
// $map->down();
// $map->down();
// $map->down();
// $map->down();
// $map->down();
// $map->down();

// $map->display_size();
// $map->display_area();
// $map->get_height();
// $map->get_width();
// $map->draw_map();
