<?php
require_once '../../../header.php';
require_once '../helper.php';

$super = false;
global $tag, $form, $parametros;

$tag->body('role="document"');

new Components('menu', $parametros);
$tag->br();
$tag->br();
	
	$objeto = new Historias();
	$historias = $objeto->select($objeto->getTable(),null,[ ['id','=', $_GET['id']] ]);
	if(empty($historias[0]['id']))
		header('Location: '.ROOTPATHURL.HISTORIASPATH);
	
	helper_adsense();
	
	$form->_container();
		$form->_col(2);
			$tag->p('class="span_title"');
				$tag->imprime(HISTORIAS);
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
			helper_componentes_buttons_view('historias', $historias[0]['id']);
		elseif($s->get_session('nome') != $historias[0]['dono']):
			//em cada linha onde o usuario atual for diferente do dono da arma, vai neutralizar as opçoes de editar e excluir 
			helper_componentes_buttons_view('historias', $historias[0]['id'], $off = true);
		elseif($s->get_session('nome') == $historias[0]['dono']):
			//se o usuario logado for dono de alguma arma criada ele tera acesso total ao recurso
			helper_componentes_buttons_view('historias', $historias[0]['id']);
		endif;
		
		$tag->br();
		$tag->hr();
		
		helper_modal_alert_confirm();
		
		$form->_container();
			$form->_col(12);
				$form->h1($historias[0]['titulo']);
				$tag->b();
				$tag->imprime(CRIADO_NO_DIA);
				echo date('d/m/Y', strtotime($historias[0]['data_criacao'])).' às '.date(' H:i:s', strtotime($historias[0]['data_criacao']));
				$tag->imprime(CADASTRADO_POR." {$historias[0]['dono']} | ".AUTOR.": {$historias[0]['autor']}");
				$tag->imprime("| ".DESCRICAO_BREVE.": <i>{$historias[0]['descricao_breve']}</i>");
				$tag->b;
				$tag->br();
				$tag->br();
				$tag->imprime($historias[0]['descricao_historia']);
			$form->col_();	
		$form->container_();
	$form->div_();
	
require_once '../../../footer.php';