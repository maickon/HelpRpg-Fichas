<?php
require_once '../../../header.php';
require_once '../helper.php';

$super = false;
global $tag, $form, $parametros;

$tag->body('role="document"');

new Components('menu', $parametros);
$tag->br();
$tag->br();
	
	$objeto = new Cenarios();
	$cenarios = $objeto->select($objeto->getTable(),null,[ ['id','=', $_GET['id']] ]);
	if(empty($cenarios[0]['id']))
		header('Location: '.ROOTPATHURL.CENARIOSPATH);
	
	helper_adsense();
	
	$form->_container();
		$form->_col(2);
			$tag->p('class="span_title"');
				$tag->imprime(CENARIOS);
			$tag->p;
		$form->col_();
		
		//botoes de anterior e proximo
		helper_prev_next($objeto, $_GET['id'], 'cenarios');
		
		//verificando permiçoes
		foreach($permit as $p):
			if($s->get_session('nome') == $p):
				$super = true;
			endif;
		endforeach;
		
		if($super):
			helper_componentes_buttons_view('cenarios', $cenarios[0]['id']);
		elseif($s->get_session('nome') != $cenarios[0]['dono']):
			//em cada linha onde o usuario atual for diferente do dono da arma, vai neutralizar as opçoes de editar e excluir 
			helper_componentes_buttons_view('cenarios', $cenarios[0]['id'], $off = true);
		elseif($s->get_session('nome') == $cenarios[0]['dono']):
			//se o usuario logado for dono de alguma arma criada ele tera acesso total ao recurso
			helper_componentes_buttons_view('cenarios', $cenarios[0]['id']);
		endif;
	
		$form->_container();
			$form->_col(12);
				$tag->hr();
			$form->col_();
		$form->container_();
		
		helper_modal_alert_confirm();
		
		$form->_container();
			$form->_col(12);
				$form->h1($cenarios[0]['titulo']);
				$tag->b();
				$tag->imprime(CRIADO_NO_DIA);
				echo date('d/m/Y', strtotime($cenarios[0]['data_criacao'])).' às '.date(' H:i:s', strtotime($cenarios[0]['data_criacao']));
				$tag->imprime(CADASTRADO_POR." {$cenarios[0]['dono']} | ".AUTOR.": {$cenarios[0]['autor']}");
				$tag->imprime("| ".DESCRICAO_BREVE.": <i>{$cenarios[0]['descricao_breve']}</i>");
				$tag->b;
				$tag->br();
				$tag->br();
				$tag->imprime($cenarios[0]['descricao_cenario']);
			$form->col_();	
		$form->container_();
	$form->div_();
	
require_once '../../../footer.php';