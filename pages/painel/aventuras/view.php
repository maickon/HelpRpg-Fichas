<?php
require_once '../../../header.php';
require_once '../helper.php';

$super = false;
global $tag, $form, $parametros;

$tag->body('role="document"');

new Components('menu', $parametros);
$tag->br();
$tag->br();
	
	$objeto = new Aventuras();
	$aventura = $objeto->select($objeto->getTable(),null,[ ['id','=', $_GET['id']] ]);
	if(empty($aventura[0]['id']))
		header('Location: '.ROOTPATHURL.AVENTURASPATH);
	
	helper_adsense();
	
	$form->_container();
		$form->_col(2);
			$tag->p('class="span_title"');
				$tag->imprime(AVENTURAS);
			$tag->p;
		$form->col_();
		
		//botoes de anterior e proximo
		helper_prev_next($objeto, $_GET['id'], 'aventuras');
		
		//verificando permiçoes
		foreach($permit as $p):
			if($s->get_session('nome') == $p):
				$super = true;
			endif;
		endforeach;
		
		if($super):
			helper_componentes_buttons_view('aventuras', $aventura[0]['id']);
		elseif($s->get_session('nome') != $aventura[0]['dono']):
			//em cada linha onde o usuario atual for diferente do dono da arma, vai neutralizar as opçoes de editar e excluir 
			helper_componentes_buttons_view('aventuras', $aventura[0]['id'], $off = true);
		elseif($s->get_session('nome') == $aventura[0]['dono']):
			//se o usuario logado for dono de alguma arma criada ele tera acesso total ao recurso
			helper_componentes_buttons_view('aventuras', $aventura[0]['id']);
		endif;
		
		$tag->br();
		$tag->hr();
		
		helper_modal_alert_confirm();
		
		$form->_container();
			$form->_col(12);
				$form->h1($aventura[0]['titulo']);
				$tag->b();
				$tag->imprime(AVENTURA_INDICADA_NIVEL." {$aventura[0]['level_indicado']}, mestre {$aventura[0]['mestre']}");
				$tag->br();
				$tag->imprime(CRIADO_NO_DIA);
				echo date('d/m/Y', strtotime($aventura[0]['data_criacao'])).' às '.date(' H:i:s', strtotime($aventura[0]['data_criacao']));
				$tag->imprime(SISTEMA_DE_RPG." {$aventura[0]['sistema']}, ".CADASTRADO_POR);
				$tag->imprime($aventura[0]['dono']);
				$tag->b;
				$tag->br();
				$tag->br();
				$tag->imprime($aventura[0]['aventura']);
			$form->col_();	
		$form->container_();
	$form->div_();
	
require_once '../../../footer.php';