<?php
global $tag, $form;

$tag->div('class="container"');
	$tag->hr();
	$tag->div('class="rodape-search-page"');
		helper_footer_bar_page_search($links, $nomes);
	$tag->div;
	$tag->div('class="copy"');
		$tag->imprime("Desenvolvimento Maickon Rangel - Todos os direitos reservados");
		$tag->br();
		$tag->imprime("2013-2016");
	$tag->div;
$tag->div;