<?php
require_once '../../../header.php';
require_once '../helper.php';

$super = false;
global $tag, $form, $parametros;

$tag->body('role="document"');

new Components('menu', $parametros);
$tag->br();
$tag->br();
	
	$objeto = new Pericias(ROOTPATH.PERICIASIMGPATH);
	$pericias = $objeto->select($objeto->getTable(),null,[ ['id','=', $_GET['id']] ]);
	
	if(!isset($pericias[0]['id'])):
		$form->_container();
			$form->_col(12);
				$form->h1(REGISTRO_NAO_ENCONTRADO_MSG);
			$form->col_();
		$form->container_();
	else:
		$form->_container();
			$form->_col(2);
				$tag->span('class="span_title"');
					$tag->imprime(PERICIAS);
				$tag->span;
			$form->col_();
			
			helper_prev_next($objeto, $_GET['id'], 'pericias');
			
			//verificando permiçoes
			foreach($permit as $p):
				if($s->get_session('nome') == $p):
					$super = true;
				endif;
			endforeach;
			
			helper_buttons_bar($super, 'pericias', $pericias[0]['id']);
			
			$form->_col(12);
				$tag->hr();
			$form->col_();
			
			helper_modal_alert_confirm();
			
			$form->_container();
				$form->_col(12);
					helper_show_pericias($pericias);
				$form->col_();

				$form->_col(12);
					helper_adsense();	
				$form->col_();
				
				$form->_col(12);
					helper_disqus_comment();	
				$form->col_();	
			$form->container_();
		$form->div_();
	endif;

require_once '../../../footer.php';