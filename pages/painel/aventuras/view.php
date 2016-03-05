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
	
	helper_adsense();
	
	if(!isset($aventura[0]['id'])):
		$form->_container();
			$form->_col(12);
				$form->h1(REGISTRO_NAO_ENCONTRADO_MSG);
			$form->col_();
		$form->container_();
	else:
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
			
			helper_buttons_bar($super, 'aventuras', $aventura[0]['id']);
			
			$form->_container();
				$form->_col(12);
					$tag->hr();
				$form->col_();
			$form->container_();
			
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
	endif;	
require_once '../../../footer.php';