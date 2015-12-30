<?php
class Talentos extends Db_persistence{
	private $attr;
	
	function __construct($path, $warning_msg = 'Já existe um talento com este nome!'){
		parent::__construct(strtolower(get_class($this)), $path, $warning_msg);
	}
	
	function __set($attr_name, $attr_value){
	
		$this->attr["{$attr_name}"] = $attr_value;
	}
	
	function __get($attr){
		return $this->attr["{$attr}"];
	}
	
	function getTable(){
		return $this->table;
	}
}