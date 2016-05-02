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
//proibe a exibicao de paginas restritas
restricted_access_config("http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);

global $permit;
$tag->html('lang="pt-br"');
	$tag->head();
		
		$tag->meta('http-equiv="Content-Type" content="text/html;charset=utf-8"');
		$tag->meta('http-equiv="X-UA-Compatible" content="IE=edge"');
		$tag->meta('name="viewport" content="width=device-width, initial-scale=1"');
		//<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		
		$tag->meta('name="keywords" content="Fichas de RPG, RPG games, RPG online, nomes de fantasia, gerador de nomes, nome de fantasia, nomes para jogos, nomes para games, nomes para videojogos, nomes para videogames, ideias para nomes, criar nomes, escolher um nome, fantasia, rpg, role playing game, criador de nomes, sugestões de nomes, nomes de elfos, nomes de anões, nomes de hobbits, nomes de halflings, nomes de orcs, nomes malignos, nomes evil, nomes orientais, nomes humanos, apelidos de fantasia, nomes de ficção científica, nomes de sf, nomes aleatórios, nomes de fantasia aleatórios, gerar nomes, nomes por raças, nomes portugueses, nomes lovecraftianos, nomes de lovecraft"');
		$tag->meta('name="description" content="Help rpg - Faça cadastro de Fichas de RPG, itens, armas, talentos, gere mapas de masmorra, nome de cidades, personagens, reinos e muito mais."');
		$tag->meta('name="author" content="Maickon Rangel"');
		$tag->imprime('<link rel="shortcut icon" href="'.ROOTPATHURL.IMGPATH.'logo-icon.png" />');
		$tag->link('rel="icon" href="'.IMGPATH.'adm.png"');
		
		$tag->link("rel='profile' href='http://gmpg.org/xfn/11'"); $tag->link;
		$tag->link("rel='pingback' href='https://helprpg.wordpress.com/xmlrpc.php'"); $tag->link;
		$tag->meta("name='google-site-verification' content='QC0R1WtOIkuix34BpV0VWRXvfqXOSgZVre6Ajs0yoB8'");
		$tag->meta("name='msvalidate.01' content='DE5E830BAA8981F56CAF7391CB18C43C'");
		$tag->meta("name='p:domain_verify' content='ed57b2f23f1c8c7a32615f041c018452'");
		$tag->meta("name='yandex-verification' content='498ec61ff48496ea'");
		$tag->link("rel='alternate' type='application/rss+xml' title='Feed de Help Rpg &raquo;' href='https://helprpg.wordpress.com/feed/'"); $tag->link;
		$tag->link("rel='alternate' type='application/rss+xml' title='Help Rpg &raquo;  Feed de comentários' href='https://helprpg.wordpress.com/comments/feed/'"); $tag->link;
		
		$tag->link("rel='EditURI' type='application/rsd+xml' href='https://helprpg.wordpress.com/xmlrpc.php?rsd'"); $tag->link;
		$tag->link("rel='wlwmanifest' type='application/wlwmanifest+xml' href='https://s1.wp.com/wp-includes/wlwmanifest.xml'"); $tag->link;
		$tag->meta("name='generator' content='WordPress.com'");
		$tag->link("rel='shortlink' href='http://wp.me/62ZRn'"); $tag->link;
		
		$tag->meta("property='og:type' content='website'");
		$tag->meta("property='og:title' content='Help Rpg Fichas'");
		$tag->meta("property='og:description' content='Help rpg - Faça cadastro de Fichas de RPG, itens, armas, talentos, gere mapas de masmorra, nome de cidades, personagens, reinos e muito mais.'");
		$tag->meta("property='og:url' content='http://helprpg.com.br'");
		$tag->meta("property='og:site_name' content='Help Rpg Fichas'");
		$tag->meta("property='og:image' content='https://secure.gravatar.com/blavatar/3664425b4887a751939b4c495523c4e1?s=200&amp;ts=1453210604'");
		$tag->meta("property='og:image:width' content='200'");
		$tag->meta("property='og:image:height' content='200'");
		$tag->meta("property='og:locale' content='pt_BR'");
		$tag->meta("name='twitter:site' content='@wordpressdotcom'");
		$tag->meta("property='fb:app_id' content='249643311490'");
		
		$tag->link("rel='shortcut icon' type='image/x-icon' href='https://secure.gravatar.com/blavatar/869cefc15a77fde2f7e09c6fb0b089f3?s=16' sizes='16x16'"); $tag->link;
		$tag->link("rel='icon' type='image/x-icon' href='https://secure.gravatar.com/blavatar/869cefc15a77fde2f7e09c6fb0b089f3?s=16' sizes='16x16'"); $tag->link;
		$tag->link("rel='apple-touch-icon-precomposed' href='https://secure.gravatar.com/blavatar/3664425b4887a751939b4c495523c4e1?s=114'"); $tag->link;
		$tag->link("rel='openid.server' href='https://helprpg.wordpress.com/?openidserver=1'"); $tag->link;
		$tag->link("rel='openid.delegate' href='https://helprpg.wordpress.com/'"); $tag->link;
		$tag->link("rel='search' type='application/opensearchdescription+xml' href='https://helprpg.wordpress.com/osd.xml' title='Help Rpg Fichas'"); $tag->link;
		$tag->link("rel='search' type='application/opensearchdescription+xml' href='https://s1.wp.com/opensearch.xml' title='helprpg.com.br'"); $tag->link;
		
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
			
		$tag->script('id="dsq-count-scr" src="//helprpgbr.disqus.com/count.js" async');
		$tag->script;

		$tag->script('src="'.ROOTPATHURL.JSPATH.'jquery.min.js"');
		$tag->script;
		
		$tag->script('src="'.ROOTPATHURL.JSPATH.'datatables.min.js"');
		$tag->script;

		$tag->script('src="'.ROOTPATHURL.JSPATH.'jquery.validate.js"'); 
		$tag->script;
		
		$tag->script('src="'.ROOTPATHURL.JSPATH.'bootstrap-select.js"');
		$tag->script;

		$tag->script('src="'.CKEDITORPATH.'ckeditor.js"');
		$tag->script;

		$tag->script('src="'.CKEDITORPATH.'/adapters/jquery.js"');
		$tag->script;

		$tag->script('src="'.CKEDITORPATH.'config.js"');
		$tag->script;

		$tag->script('src="'.CKEDITORPATH.'styles.js"');
		$tag->script;

		$tag->script('src="'.CKEDITORPATH.'build-config.js"');
		$tag->script;

	$tag->head;
	
	require_once 'menu.php';	
	