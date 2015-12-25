<?php
require_once '../../../header.php';

new Components('menu', $parametros);
$form = new Form();

$form->_row();
$form->_container();
$form->h1("Help Rpg Fichas - Downloads");
$form->hr();

$tag->imprime('
			<div class="banner-center">
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- anuncio_3 -->
				<ins class="adsbygoogle"
				     style="display:inline-block;width:728px;height:90px"
				     data-ad-client="ca-pub-3010334569259161"
				     data-ad-slot="2027312537"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script>
			</div>
			');

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
				<a href="'.HELPRPGBLOG.'" target="blank">Nosso Blog </a>
				</p>
				'
);

$tag->imprime('
				<div class="banner-center">
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<!-- anuncio_2 -->
					<ins class="adsbygoogle"
					     style="display:inline-block;width:728px;height:90px"
					     data-ad-client="ca-pub-3010334569259161"
					     data-ad-slot="9550579333"></ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
				</div>
				');
$form->hr();
$form->container_();
$form->row_();