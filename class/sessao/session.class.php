<?php 
class Session{
	//O construtor ja cria uma sessao por padrao
	function __construct(){
		@session_start();
	}

	//inicializa os parametros na sessao ativa para identifica la 
	public function set_session($name, $value){
		$_SESSION[$name] = $value;
	}
	 
	//retorna o nome da sessao atual a fim de identificar se ela esta ativa
	function get_session($name){
		if(isset($_SESSION[$name])):
			return $_SESSION[$name];
		else:
			return false;
		endif;
	}

	//destroi a sessao ativa
	function destroy_session($keys = array('login')){
		foreach($keys as $key):
			unset($_SESSION[$key]);
		endforeach;
	}

	//destroi todas as sessoes ativas
	function destroy_all_session(){
		session_destroy();
	}

	//percorre a sessao atual a fim de identificar se determinao nome consta na sessao atual
	function authenticate($name){
		$valid = false;
		foreach($_SESSION as $key):
			if($key == $_SESSION[$name])
				$valid = true;
		endforeach;

		return $valid;
	}

	//vei verificar se o nome passado por parametro consta na sessao atual 
	//se for falso, redireciona para a pagina raiz
	function restricted_access($url = ROOTPATHURL){
		global $tag;
		if(!$this->authenticate('login')):
			$tag->imprime("<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=".$url."'>");
			//@header('location:'.$url);
		endif;
	}

	//verifica a integridade de determinado nome na sessao
	//retorna false caso o nome nao exista 
	public function exist($name) {
		if(isset($_SESSION[$name]) && (!empty($_SESSION[$name]))):
			return true;
		else:
			return false;
		endif;
	}
	
	//funcao usada para checar se os dados de user e senha conferem com a do DB
	//caso nao exista user no db, retorna false
	//do contrario, cria se uma sessao com o nome do seu login, senha e um ID de sessao e retorna true
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
