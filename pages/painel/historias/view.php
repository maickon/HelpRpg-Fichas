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
	
	helper_adsense();
	
	if(!isset($historias[0]['id'])):
		$form->_container();
			$form->_col(12);
				$form->h1(REGISTRO_NAO_ENCONTRADO_MSG);
			$form->col_();
		$form->container_();
	else:
		$form->_container();
			$form->_col(2);
				$tag->p('class="span_title"');
					$tag->imprime(HISTORIAS);
				$tag->p;
			$form->col_();
			
			//botoes de anterior e proximo
			helper_prev_next($objeto, $_GET['id'], 'historias');
			
			//verificando permiçoes
			foreach($permit as $p):
				if($s->get_session('nome') == $p):
					$super = true;
				endif;
			endforeach;
			
			helper_buttons_bar($super, 'historias', $historias[0]['id']);

			$form->_col(12);
				$tag->hr();
			$form->col_();
			
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
	endif;
	
require_once '../../../footer.php';