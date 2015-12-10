<?php
	/**
	 * index.php
	 * renderiza o arquivo de cabeçalho header.php
	 * Depois verificar se existe alguma variavel via $_GET chamada 'e' de erro.
	 * Se ela existir, significar que existem erros para serem exibidos na tela.
	 * A variavel 'e' e uma string dividida por '_' caso contenha mais de
	 * uma mensagem de erro. A string e dividia e armazenada na variavel $erro.
	 * Esta variavel e um array contendo os tipos de erros que foram divididos 
	 * pelo '_'. Isso cada mensagem e exibida na tela atraves do lado 
	 * foreach como uma msg de erro.
	 *
	 */
	
	require_once 'header.php';
	
	$tag->body('role="document"');
		
		global $parametros;
		new Components('menu', $parametros);
		$tag->div('class="container"');
			require_once 'pages/home/index.php';
		$tag->div;
		
	require_once 'footer.php';
