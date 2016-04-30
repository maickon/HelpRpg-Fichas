<?php
global $tag, $form;

$tag->div('class="container"');
	$tag->hr();
	$tag->div('class="rodape-search-page"');
		helper_footer_bar_page_search($links, $nomes);
	$tag->div;
	$tag->div('class="copy"');
		$tag->imprime(PROGRAMER." - ".PROJECTTITLE);
		$tag->br();
		$tag->imprime(COPY);
	$tag->div;
$tag->div;