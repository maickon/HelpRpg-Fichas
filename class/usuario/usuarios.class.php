<?php
//o usuario extende diretamente de Db
class Usuarios extends db{
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
			global $s, $tag;
			if($s->login($params['email'], $params['senha'])):
				$tag->imprime("<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=".PAINEL_PATH."'>");
			endif;
		else:
			new Flashmsg('danger', 'Um erro ocoreu, contate o administrador.');
		endif;
	}
	
	function edit($params){
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

		if($this->check_duplicate_edit_user($values) != ' '):
			new Flashmsg('warning', 'Email ou login duplicado.');	
		elseif($this->update('usuarios', $fields, $values, "email", $params['email'])):
			global $s;
			new Flashmsg('success', 'Registro editado com sucesso.');
			sleep(3);
			$s->destroy_session(['login','nome','id']);
			$tag->imprime("<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=".ROOTPATHURL."'>");
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
	
	function check_duplicate_edit_user($values){
		global $s;
		$alert = ' ';
		$nome = $s->get_session('login');
		$user = $this->select($this->table, null, [['email','=', $nome ? $nome : ' ']]);
		
		$user_edit = $this->select($this->table, ['login','email'], [ ['login', '!=', $user[0]['login'] ], ['email', '!=', $user[0]['email']] ]);

	
		for($i=0; $i<count($user_edit); $i++):
			if($user_edit[$i]['login'] == $values[1]):
				$alert .= "Login já existe!";
			endif;
			
			if($user_edit[$i]['email'] == $values[2]):
				$alert .= "<br />Email já existe!";
			endif;
		endfor;
		
		return $alert;
		
	}
	
	function delete_data($id){
		global $s;
		if($this->delete('usuarios', [['id', '=', $id]])):	
			new Flashmsg('success', 'Sua conta foi deletada com sucesso. Você será redirecionado para página principal do Help Rpg.');
			sleep(3);
			$s->destroy_session(['login','nome','id']);
			header('location:'.ROOTPATHURL);
		else:
			new Flashmsg('danger', 'Registro editado com sucesso.');
		endif;
	}
}