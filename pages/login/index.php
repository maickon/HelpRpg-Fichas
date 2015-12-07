<?php 
require_once '../../header.php';

$form->_container();
	$form->_col(12);
		$tag->imprime('
					<div class="banner-center">
						<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
						<!-- anuncio_1 -->
						<ins class="adsbygoogle"
						     style="display:inline-block;width:728px;height:90px"
						     data-ad-client="ca-pub-3010334569259161"
						     data-ad-slot="8073846133"></ins>
						<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
						</script>
					</div>
					');
	$form->col_();
$form->container_();

$tag->body('role="document"');
	global $parametros;

	new Components('menu', $parametros);
	$tag = new Tags();
	new Components('login');

require_once '../../footer.php';