<?php 
class Session{

	function __construct(){
		session_start();
	}

	public function set_session($name, $value){
		$_SESSION[$name] = $value;
	}
	 
	function get_session($name){
		if(isset($_SESSION[$name])):
			return $_SESSION[$name];
		else:
			return false;
		endif;
	}

	function destroy_session($keys = array('login')){
		foreach($keys as $key):
			unset($_SESSION[$key]);
		endforeach;
	}

	function destroy_all_session(){
		session_destroy();
	}

	function authenticate($name){
		foreach($_SESSION as $key):
			if($key == $_SESSION[$name]):
				return true;
			else:
				return false;
			endif;
		endforeach;
	}

	function restricted_access($url = ROOTPATHURL){
		if(!$this->authenticate('login'))
			header('location:'.$url);
	}

	public function exist($name) {
		if(isset($_SESSION[$name]) && (!empty($_SESSION[$name]))):
			return true;
		else:
			return false;
		endif;
	}
	
	public function login($email, $senha){
		$senha_md5 = md5($senha);
		$user = new Usuarios();
		$s = $user->select('usuarios', ['nome','email','senha'],
				[
					['email','=', $email],
					['senha','=', $senha_md5]
				]
		);
		if(empty($s)):
			return false;
		else:
			if($email == $s[0]['email'] && $senha_md5 == $s[0]['senha']):
				$this->set_session('login', $email);
				$this->set_session('nome', $s[0]['nome']);
				$this->set_session('id', session_id());
				return true;
			else:
				return false;
			endif;
		endif;
	}
}
