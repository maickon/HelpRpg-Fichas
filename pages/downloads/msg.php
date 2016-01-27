<?php
require_once '../../../header.php';

new Components('menu', $parametros);
$form = new Form();

$form->_row();
$form->_container();
$form->h1("Help Rpg Fichas - Downloads");
$form->hr();

helper_adsense_03();

$form->p(
		'
				Está página será implementada em breve.
				<br />
				<br />
				<h3>O que propomos aqui?</h3>
				<p>
				Pretendemos deixar um único campo de busca similar ao google onde os usuários vão fazer uma busca pelos 
				arquivos do site. Nossos arquivos estarão disponíveis em formato PDF e PNG a princípio. Mas nada impede 
				que outros formatos estejam disponíveis para download.
				<h3>Links monetizados...</h3>
				Uma outra observação importante é que os links para download serão monetizado via adfly. Isso significa que 
				você deverá aguardar 5 segundos por conta de anúncios até que seje redirecionado para a página de download.
				<h3>Canais de contato</h3>
				Enquanto isso, continue utilizando os outros recursos do site. Qualquer novidade você ficará sabendo através de
				nossos canais de comunicação.
				<br>
				<br>
				<a href="'.FACEBOOK.'" target="blank">Nossa página no facebook </a>
				<br>
				<a href="'.YOUTUBE.'" target="blank">Nosso Canal no YouTube </a>
				<br>
				<a href="'.WORDPRESS_BLOG.'" target="blank">Nosso Blog </a>
				</p>
				'
);

helper_adsense_02();

$form->hr();
$form->container_();
$form->row_();