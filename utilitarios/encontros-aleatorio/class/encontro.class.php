<?php
/*
**      Classe  Encontros
**      Produz encontros aleatorios
**      para um aventura de RPG
**
**      @author Maickon Rangel - 2016
*/

class Encontros{
        public $base_parh;
        public $cidade;
        public $maritima;
        public $estrada;
        public $montanha;
        public $floresta;
        public $deserto;
        public $titulo;

        function __construct(){
                $this->define_base_path();
        }

        function define_base_path(){
                if(file_exists("{$_SERVER['DOCUMENT_ROOT']}/HelpRpg/utilitarios/encontros-aleatorio/class/txt/")):
                        $this->base_path = "{$_SERVER['DOCUMENT_ROOT']}/HelpRpg/utilitarios/encontros-aleatorio/class/txt/";
                else:
                        $this->base_path = "{$_SERVER['DOCUMENT_ROOT']}/utilitarios/encontros-aleatorio/class/txt/";
                endif;                   
        }

        function gerar_encontro($path, $title, $attr){
                $this->titulo[$attr] = $title;
                $file = $this->get_file($path);
                $file_lines = explode("\n", $file);
                $escolhido = $file_lines[rand(0, count($file_lines)-1)];
                $this->$attr = $escolhido;
        }

        function show_encontro_test($data){
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
