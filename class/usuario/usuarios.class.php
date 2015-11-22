<?php
class Usuarios extends Db{
	private $atributos;
	private $table;
	
	function __construct(){
		parent::__construct();
		$this->table = strtolower(get_class($this));	
	}
	
	function __set($attr_name, $attr_value){
		
		$this->atributos["{$attr_name}"] = $attr_value;
	}
	
	function __get($attr){
		return $this->atributos["{$attr}"];
	}
	
	function create($params){
		$fields = [];
		$values = [];
		foreach($params as $key => $attr):
			if($key != 'confirma' && $key != 'action'):
				if($key == 'senha'):
					$this->$key = $attr;
					$fields[] = $key;
					$values[] = md5($attr);
				else:
					$this->$key = $attr;
					$fields[] = $key;
					$values[] = $attr;
				endif;
			endif;
		endforeach;

		if($this->check_duplicate_user($values) != ' '):
			new Flashmsg('warning', 'Email ou login duplicado.');	
		elseif($this->insert($this->table, $fields, $values)):
			new Flashmsg('success', 'cadastro realizado com sucesso.');
		else:
			new Flashmsg('danger', 'Um erro ocoreu, contate o administrador.');
		endif;
	}
	
	function check_duplicate_user($values){
		$alert = ' ';
		$s = $this->select($this->table, ['login','email']);
		for($i=0; $i<count($s); $i++):
			if($s[$i]['login'] == $values[1]):
				$alert .= "Login já existe!";
			endif;
			
			if($s[$i]['email'] == $values[2]):
				$alert .= "<br />Email já existe!";
			endif;
		endfor;
		
		return $alert;
		
	}
}