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
	
	if(!isset($talentos[0]['id'])):
		$form->_container();
			$form->_col(12);
				$form->h1(REGISTRO_NAO_ENCONTRADO_MSG);
			$form->col_();
		$form->container_();
	else:
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
			
			helper_buttons_bar($super, 'talentos', $talentos[0]['id']);
			
			$form->_col(12);
				$tag->hr();
			$form->col_();
			
			helper_modal_alert_confirm();
			
			$form->_container();
				$form->_col(3);
					helper_adsense_responsivo_01();
				$form->col_();
				
				$form->_col(9);
					helper_show_talentos($talentos);
					$tag->br();
				$form->col_();
				
				$form->_col(9);
					helper_disqus_comment();	
				$form->col_();
			$form->container_();
		$form->div_();
	endif;

require_once '../../../footer.php';