<?php
require_once '../../../header.php';
require_once '../helper.php';

$super = false;
global $tag, $form, $parametros;

$tag->body('role="document"');

new Components('menu', $parametros);
$tag->br();
$tag->br();
	
	$talento = new Talentos(ROOTPATH.TALENTOSIMGPATH);
	$talentos = $talento->select($talento->getTable(),null,[ ['id','=', $_GET['id']] ]);
	if(empty($talentos[0]['id']))
		header('Location: '.ROOTPATHURL.TALENTOSPATH);
	$form->_container();
		$form->_col(2);
			$tag->span('class="span_title"');
				$tag->imprime(TALENTOS);
			$tag->span;
		$form->col_();
		
		helper_prev_next($talento, $_GET['id'], 'talentos');
		
		//verificando permiçoes
		foreach($permit as $p):
			if($s->get_session('nome') == $p):
				$super = true;
			endif;
		endforeach;
		
		if($super):
			helper_componentes_buttons_view('talentos', $talentos[0]['id']);
		elseif($s->get_session('nome') != $talentos[0]['dono']):
			//em cada linha onde o usuario atual for diferente do dono da arma, vai neutralizar as opçoes de editar e excluir 
			helper_componentes_buttons_view('talentos', $talentos[0]['id'], $off = true);
		elseif($s->get_session('nome') == $talentos[0]['dono']):
			//se o usuario logado for dono de alguma arma criada ele tera acesso total ao recurso
			helper_componentes_buttons_view('talentos', $talentos[0]['id']);
		endif;
		
		$tag->br();
		$tag->hr();
		
		helper_modal_alert_confirm();
		
		$form->_container();
			$form->_col(12);
				helper_show_talentos($talentos);
				$tag->br();
			$form->col_();	
		$form->container_();
	$form->div_();
	
require_once '../../../footer.php';