<!DOCTYPE html>
<?php

/**
 * @project Help Rpg
 * @author Maickon Rangel
 * @date 09/10/2015
 * @contact maickon4developers@gmail.com
 * @version 1.0
 * @link https://github.com/maickon/HelpRpg-Fichas
 *
 * header.php
 * Arquivo responsável pela apresentação de header do site.
 * Ele carrega o arquivo init.php, este arquivo carrega a função
 * __autoload($class_name). Com esta função as classes podem ser carregadas 
 * através do require_once no momento de sua instanciação.
 * Além disso o arquivo init.php carrega o arquivo config.php através do
 * require_once, neste arquivo conta a definição de todoas os termos necessários
 * para o sistema como links permanentes, nome de pastas, título do site, mensagens e etc.
 * 
 * Em seguida é declarado duas variáveis que são objetos. Um referente a tag e o outro representa 
 * uma conexão ativa com o banco de dados.
 */

require_once 'init.php';
global $permit;
$tag->html('lang="pt-br"');
	$tag->head();
	
		$tag->meta('http-equiv="Content-Type" content="text/html;charset=utf-8"');
		$tag->meta('http-equiv="X-UA-Compatible" content="IE=edge"');
		$tag->meta('name="viewport" content="width=device-width, initial-scale=1"');
		//<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		$tag->meta('name="description" content="Help rpg - O maior repositório de fichas de RPG do Brasil."');
		$tag->meta('name="author" content="Maickon Rangel"');
		$tag->imprime('<link rel="shortcut icon" href="'.ROOTPATHURL.IMGPATH.'logo-icon.png" />');
		$tag->link('rel="icon" href="'.IMGPATH.'adm.png"');
		
		//Titulo do site
		$tag->title();
			$tag->imprime(PROJECTTITLE);
		$tag->title;
		
		//<!-- datatable css -->
		$tag->link('href="'.ROOTPATHURL.CSSPATH.'datatables.min.css" rel="stylesheet"');
		
		//<!-- Bootstrap core CSS -->
		$tag->link('href="'.ROOTPATHURL.CSSPATH.'bootstrap.min.css" rel="stylesheet"');
  		
		//<!-- index core CSS -->
		$tag->link('href="'.ROOTPATHURL.CSSPATH.'index.css" rel="stylesheet"');
		
		//<!-- selec core CSS -->
		$tag->link('href="'.ROOTPATHURL.CSSPATH.'bootstrap-select.css" rel="stylesheet"');
		
		$tag->script('src="'.ROOTPATHURL.JSPATH.'jquery.min.js"');
		$tag->script;
		
		$tag->script('src="'.ROOTPATHURL.JSPATH.'datatables.min.js"');
		$tag->script;
		
		$tag->script('src="'.ROOTPATHURL.JSPATH.'bootstrap-select.js"');
		$tag->script;
	$tag->head;
	
	//variaveis de menu
	$parametros = array();
	
	if($s->exist('login')):
		$tag->br();
		$tag->br();
		
		require_once 'pages/painel/helper.php';
		if(helper_check_admin() != 0):
			$options_menu_root_label = array('Você','Usuários','Estatísticas','Editar dados','Cancelar conta');
			$options_menu_root_links = array("#", USERSLISTPATH, USERPATH, USEREDITPATH, USERDELETEPATH);
		else:
			$options_menu_root_label = array('Você','Estatísticas','Editar dados','Cancelar conta');
			$options_menu_root_links = array("#", USERPATH, USEREDITPATH, USERDELETEPATH);
		endif;
		
		
		$parametros['nomes'] = array(
									array('Personagem', 'Criar um personagem', 'Criar um monstro', 'Criar um BOSS'),
							   		array(CADASTRAR, ARMAS, ARMADURAS, ARTEFATOS, TALENTOS, MAGIAS, PERICIAS),
									array('Utilitários', 'Rolar Daos', 'Gerador de mundos', 'Gerador de Masmorras', 'Gerador de NPC', 'Gerador de Monstros'),
									$options_menu_root_label
									);
		
		$parametros['links']  = array(
									array("#", ROOTPATHURL.PERSONAGEMPATH, ROOTPATHURL.MONSTROPATH, ROOTPATHURL.BOSSPATH),
									array("#", ROOTPATHURL.ARMASPATH, ROOTPATHURL.ARMADURASPATH, ROOTPATHURL.ARTEFATOSPATH, ROOTPATHURL.TALENTOSPATH, ROOTPATHURL.MAGIASPATH,ROOTPATHURL.PERICIASPATH),
									array("#", ROLLDICE, MAPWORDPATH, DUNGEONPATH, NPCGENERATEPATH, MONSTERGENERATEPATH),
									$options_menu_root_links
									);
		
		$parametros['programer']  = PROGRAMER;
		$parametros['copy']  = COPY;
	else:
		$tag->div('class="jumbotron"');
	    	$tag->div('class="container"');
	        	$tag->img('src="'.ROOTPATHURL.IMGPATH.'logo.png" id="logo"');
	        $tag->div;
	    $tag->div;
	
		
		// array('Idioma', utf8_encode('Português - BR'), 'English - En')
		//array('#','?v=pt-br', '?v=en')
		$utilitarios_label = array('Utilitários', 'Rolar Daos', 'Gerador de mundos', 'Gerador de Masmorras', 'Gerador de NPC', 'Gerador de Monstros');
		$utilitarios_link = array("#", ROLLDICE, MAPWORDPATH, DUNGEONPATH, NPCGENERATEPATH, MONSTERGENERATEPATH);
		
		$parametros['nomes'] = array('Home','Cadastro','Sobre',$utilitarios_label,'Como Usar');
		$parametros['links']  = array(BASE_PATH, USERNEWPATH, ABOUTPATH, $utilitarios_link, HOWTOUSE);
		$parametros['programer']  = PROGRAMER;
		$parametros['copy']  = COPY;
	endif;	
	