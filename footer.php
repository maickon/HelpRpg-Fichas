<?php
	/**
	 * @project PainelAdm
	 * @author Maickon Rangel
	 * @date 02/07/2015
	 * @contact maickon4developers@gmail.com
	 * @version 1.0
	 * @link https://github.com/maickon/PainelAdm
	 * 
	 * footer.php
	 * Arquivo referente ao rodape do site. Ele exibe o rodep� atrav�s do objeto component
	 * especificando por parametro o nome 'footer'. O termo $parametros est� definido no
	 * arquivo index.php junto com o objeto $tag.
	 * Al�m de exibir o rodap�, ele chama uns arquivos de script respons�vel pelos efeitos de
	 * menu responsivo.
	 * Mais abaixo � fechado a tag body e html.	
	 */

	$parametros_footer['nomes'] = array('Home','Cadastro','Sobre');
	$parametros_footer['links']  = array(BASE_PATH, USERNEWPATH, ABOUTPATH);
	$parametros_footer['programer']  = PROGRAMER;
	$parametros_footer['copy']  = COPY;
	global $tag;
	$tag->hr('id="linha"');
	new Components('footer', $parametros_footer);
		
		
		
	//<!-- Bootstrap core JavaScript -->
	//================================================== 
    //<!-- Placed at the end of the document so the pages load faster -->

		
	$tag->script('src="'.ROOTPATHURL.JSPATH.'validator.js"');
	$tag->script;
		
	$tag->script('src="'.ROOTPATHURL.JSPATH.'bibliotecaAjax.js"');
	$tag->script;
	$tag->body;
$tag->html;