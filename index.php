<?php 
	/**
	 * index.php
	 * renderiza o arquivo de cabeçalho header.php
	 * Depois verificar se existe alguma vari�vel via $_GET chamada 'e' de erro.
	 * Se ela existir, significar que existem erros para serem exibidos na tela.
	 * A vari�vel 'e' � uma �nica string dividida por '_' caso contenha mais de
	 * uma mensagem de erro. A string e dividia e armazenada na vari�vel $erro.
	 * Esta vari�vel � um array contendo os tipos de erros que foram divididos 
	 * pelo '_'. Ap�s isso cada mensagem � exibida na tela atrav�s do la�o 
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
?>

