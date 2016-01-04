<?php
require_once '../../../header.php';
require_once '../helper.php';

$super = false;
global $tag, $form, $parametros;

$tag->body('role="document"');

new Components('menu', $parametros);
$tag->br();
$tag->br();
	
	$objeto = new Contos();
	$contos = $objeto->select($objeto->getTable(),null,[ ['id','=', $_GET['id']] ]);
	if(empty($contos[0]['id']))
		header('Location: '.ROOTPATHURL.CONTOSPATH);
	
	helper_adsense();
	
	$form->_container();
		$form->_col(2);
			$tag->p('class="span_title"');
				$tag->imprime(CONTOS);
			$tag->p;
		$form->col_();
		
		//botoes de anterior e proximo
		helper_prev_next($objeto, $_GET['id'], 'contos');
		
		//verificando permiçoes
		foreach($permit as $p):
			if($s->get_session('nome') == $p):
				$super = true;
			endif;
		endforeach;
		
		if($super):
			helper_componentes_buttons_view('contos', $contos[0]['id']);
		elseif($s->get_session('nome') != $contos[0]['dono']):
			//em cada linha onde o usuario atual for diferente do dono da arma, vai neutralizar as opçoes de editar e excluir 
			helper_componentes_buttons_view('contos', $contos[0]['id'], $off = true);
		elseif($s->get_session('nome') == $contos[0]['dono']):
			//se o usuario logado for dono de alguma arma criada ele tera acesso total ao recurso
			helper_componentes_buttons_view('contos', $contos[0]['id']);
		endif;
		
		$tag->br();
		$tag->hr();
		
		helper_modal_alert_confirm();
		
		$form->_container();
			$form->_col(12);
				$form->h1($contos[0]['titulo']);
				$tag->imprime(CRIADO_NO_DIA);
				echo date('d/m/Y', strtotime($contos[0]['data_criacao'])).' às '.date(' H:i:s', strtotime($contos[0]['data_criacao']));
				$tag->imprime(CADASTRADO_POR." {$contos[0]['dono']} | ".AUTOR.": {$contos[0]['autor']}");
				$tag->imprime("| ".DESCRICAO_BREVE.": <i>{$contos[0]['descricao_breve']}</i>");
				$tag->br();
				$tag->br();
				$tag->imprime($contos[0]['descricao_conto']);
			$form->col_();	
		$form->container_();
	$form->div_();
	
require_once '../../../footer.php';