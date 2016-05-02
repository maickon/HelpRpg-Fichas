<?php

/**
 * @project PainelAdm
 * @author Maickon Rangel
 * @date 02/07/2015
 * @contact maickon4developers@gmail.com
 * @version 1.0
 * @link https://github.com/maickon/PainelAdm
 *
 * components.class.php
 * Instancia um tipo de componente para adicionar ao site
 * o componente pode ser um menu ou um rodap�
 * 
 * Este arquivo possui tres classes:
 * A classe components que define qual componente instanciar.
 * A classe menu bar que cria um menu baseado no framework twitter bootstrap
 * A classe footer bar que define um rodap� para o site
 **/

class Components{
	
	/**
	 * 
	 * @param componente $component
	 * o parametro vai definir qual tipo de componente ser� instanciado.
	 * ele pode ser footer = redape ou menu para criar a barra de menu do site
	 */
	function __construct($component, $parametros = null){
		global $tag;
		switch($component):
			case 'menu': new MenuBar($parametros['nomes'], $parametros['links']);
			break;
		
			case 'footer': new FooterBar($parametros['nomes'], $parametros['links'], $parametros['programer'], $parametros['copy']);
			break;
			
			case 'login': new Login($parametros['img']);
			break;
			
			case 'painel': new Painel($parametros['nomes'], $parametros['links'],$parametros['title'], $parametros['content']);
			break;
			
			default: $tag->imprime('<div class="alert alert-danger" role="alert">Parâmetro inválido!</div>','encode');
		endswitch;
	}
}

class MenuBar{

	private $site_name; //nome do site
	private $menus; //lista de menus 
	private $links; //lista de links para cada menu
	private $login; //tela de login
	private $tag;
	/*
		M�todo construtor __construct()
		Respons�vel por inicializar dois arrays,
		um contendo as refer�ncias para os nomes de cada menu
		e outra para cada link deste menu.
		@param $site_name = nome do site
		@param $menus = array contendo o nome de todos os menus
		@param $links = array contendo todos os links
	*/

	public function __construct(array $nomes, array $links){
		global $tag;
		$this->tag = $tag;
		$this->site_name = PROJECTTITLE;
		$this->menus = $nomes;
		$this->links = $links;
		$this->show();
	}

	/*
		M�todo logo()
		Escolhe uma classe css dentro de uma lista de
		classe de forma aleat�ria.
	*/

	function menu_bar(){
		$this->tag->nav('class="navbar navbar-inverse navbar-fixed-top""');
			$this->tag->div('class="container"');
				$this->tag->div('class="navbar-header"');
					$this->tag->button('type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"');
						$this->tag->span('class="sr-only"');
							$this->tag->imprime('Toggle navigation');
						$this->tag->span;
						
						$this->tag->span('class="icon-bar"');
						$this->tag->span;
						
						$this->tag->span('class="icon-bar"');
						$this->tag->span;
						
						$this->tag->span('class="icon-bar"');
						$this->tag->span;
					$this->tag->button;
					
					$this->tag->a('class="navbar-brand" href="'.ROOTPATHURL.'"');
							$this->tag->imprime(PROJECTTITLE);
					$this->tag->a;
					
				$this->tag->div;//navbar-header
					
				$this->tag->div('id="navbar" class="navbar-collapse collapse"');
					
					$this->tag->ul('class="nav navbar-nav"');
						for($m=0; $m<count($this->menus); $m++):					
							if(is_array($this->menus[$m]))://identifica se é um menu dropdown
								$this->tag->li('class="dropdown"');
									$this->tag->a('href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"');
										$this->tag->imprime($this->menus[$m][0]);
										$this->tag->span('class="caret"');
										$this->tag->span;	
									$this->tag->a;	
									$this->tag->ul('class="dropdown-menu"');
										for($d=1; $d<count($this->menus[$m]); $d++):
											$this->tag->li('id="menu_'.$m.'"');																	
												$this->tag->a('href="'.$this->links[$m][$d].'"');
													$this->tag->imprime($this->menus[$m][$d]);
												$this->tag->a;																				
											$this->tag->li;
										endfor;
									$this->tag->ul;
								$this->tag->li;
							else:									
								$this->tag->li();
									$this->tag->a('href="'.$this->links[$m].'"');
										$this->tag->imprime(($this->menus[$m]),'decode');
									$this->tag->a;
								$this->tag->li;											
							endif;				
						endfor;
						
						
						global $s;
						$user = $s->get_session('nome');
						if($user):
							$this->tag->li();
								$this->tag->a('href="'.PAINEL_PATH.'"');
									$this->tag->imprime("Você está logado como $user");
								$this->tag->a;
							$this->tag->li;
							
							$this->tag->li();
								$this->tag->a('href="'.ROOTPATHURL.LOGOFF_PATH.'"');
									$this->tag->imprime(SAIR);
								$this->tag->a;
							$this->tag->li;
						else:
							$this->tag->li();
								$this->tag->a('href="'.LOGIN_PATH.'"');
									$this->tag->imprime(LOGAR);
								$this->tag->a;
							$this->tag->li;
						endif;			
						
					$this->tag->ul;
											
				$this->tag->div;//nav-collapse collapse
						
			$this->tag->div;//container
		$this->tag->nav;//navbar navbar-fixed-top
	}

	/*
		M�todo show()
		Exibe o rodap�.
	*/

	public function show(){
		$this->menu_bar();
	}
}


class FooterBar{

	private $menus;
	private $links;
	private $programer;
	private $copyright;
	private $tag;
	/*
		M�todo construtor __construct()
		Respons�vel por inicializar dois arrays,
		um contendo as refer�ncias para os nomes de cada menu
		e outra para cada link deste menu.
	*/

	public function __construct(array $nomes, array $links, $programer, $copy){
		global $tag;
		$this->menus = $nomes;
		$this->links = $links;
		$this->programer = $programer;
		$this->copyright = $copy;	
		$this->tag = $tag;
		$this->show();
	}

	/*
		Metodo footer_bar()
		Responsavel por montar uma barra de 
		rpdape atrav�s de um array de labels menus e links.
	*/

	public function footer_bar(){
		$this->tag->div('class="footer" align="center"');
			$this->tag->div('class="row"');
				$this->tag->br();
				$this->tag->br();
				for($m=0; $m<count($this->menus); $m++):
					$this->tag->imprime(' - ');
					$this->tag->a('href="'.$this->links[$m].'" class="footer-fonte"');
						$this->tag->imprime($this->menus[$m]);
					$this->tag->a;
		
					if($m == count($this->menus)-1):
						$this->tag->imprime(' - ');
						$this->tag->br();
						$this->tag->br();
						
					
						$this->tag->imprime($this->programer);
					
						
						$this->tag->br();
						$this->tag->br();
						
						
						$this->tag->imprime($this->copyright);
						
						
						$this->tag->br();
						$this->tag->br();
					endif;
				endfor;
			$this->tag->div;
		$this->tag->div;
	}

	/*
		M�todo show()
		Exibe o rodap�.
	*/

	public function show(){
		$this->footer_bar();
	}
}


class Login{
	
	function __construct(){
		$this->login();
	}
	
	function login(){
		global $tag;
		$tag->div('class="row"');
			$tag->div('class="col-sm-4 col-sm-offset-4"');
				if(isset($_GET['l']) && $_GET['l'] == 'f')
					new Flashmsg('danger', PERIGO_MSG);
				$tag->div('class="panel panel-default"');
					$tag->div('class="panel-heading"');
						$tag->h3('class="center"');
							$tag->imprime(LOGIN_TEXT_TITULO);
						$tag->h3;
					$tag->div;
				
					$tag->form('class="form-signin" action="'.LOGIN_VALIDATION_PATH.'" method="post"');
						$tag->h4('class="panel-title"');
							$tag->imprime(LOGIN_MSG_TEXT);
						$tag->h4;
						$tag->br();
						$tag->label('for="inputEmail" class="sr-only"');
							$tag->imprime(ENDERECO_EMAIL_LOGIN);
						$tag->label;
						
						$tag->input('type="text" id="inputLogin" name="login" class="form-control input-login" placeholder="'.ENDERECO_EMAIL_LOGIN.'" required autofocus');
						$tag->label('for="inputPassword" class="sr-only"');
							$tag->imprime(SENHA_LOGIN);
						$tag->label;
						$tag->br();
						$tag->input('type="password" id="inputPassword" name="senha" class="form-control input-login" placeholder="'.SENHA_LOGIN.'" required');
						$tag->div('class="checkbox"');
						$tag->label();
						$tag->input('type="checkbox" value="remember-me" class="input-login"'); 
							$tag->imprime(ESQUECEU_SENHA);
						$tag->label;
						$tag->div;
						$tag->input('name="entrar" value="'.BOTAO_ENTRAR_LOGIN.'" class="btn btn-lg btn-primary btn-block button-login" type="submit"');
					$tag->form;
				$tag->div;
			$tag->div;
		$tag->div;
	}
}

class Painel{
	private $nomes;
	private $links;
	
	function __construct(array $nomes, array $links, array $title, array $content){
		$this->nomes = $nomes;
		$this->links = $links;
		$this->title = $title;
		$this->content = $content;
		$this->show();
	}
	
	function painel(){
		global $tag;
		
		$tag->div('id="painel_adm"');
			$tag->div('class="bs-example"');
				$tag->ul('class="nav nav-tabs"');
				
					for($m=0; $m<count($this->nomes); $m++):
						$tag->li();
							$tag->a('data-toggle="tab" href="#'.$this->links[$m].'"');
								$tag->imprime($this->nomes[$m]);
							$tag->a;
						$tag->li;
					endfor;
					
				$tag->ul; //close ul
				
				$tag->div('class="tab-content"');
					
					for($m=0; $m<count($this->nomes); $m++):
						$tag->div('id="'.$this->links[$m].'" class="tab-pane fade"');
							$tag->h3();
								$tag->imprime($this->title[$m]);
							$tag->h3;
							
							$tag->p();
								require_once "{$this->content[$m]}";
							$tag->p;
						$tag->div;
					endfor;
					
				$tag->div;
					
			$tag->div;
		$tag->div;
	}
	
	public function show(){
		$this->painel();
	}
}