<?php
require_once '../../../header.php';
require_once '../helper.php';

$super = false;
global $tag, $form, $parametros;

$tag->body('role="document"');

new Components('menu', $parametros);
$tag->br();
$tag->br();
	
	$objeto = new Cronicas();
	$cronica = $objeto->select($objeto->getTable(),null,[ ['id','=', $_GET['id']] ]);
	
	if(!isset($cronica[0]['id'])):
		$form->_container();
			$form->_col(12);
				$form->h1(REGISTRO_NAO_ENCONTRADO_MSG);
			$form->col_();
		$form->container_();
	else:
		$form->_container();
			$form->_col(2);
				$tag->p('class="span_title"');
					$tag->imprime(CRONICAS);
				$tag->p;
			$form->col_();
			
			//botoes de anterior e proximo
			helper_prev_next($objeto, $_GET['id'], 'cronicas');
			
			//verificando permiçoes
			foreach($permit as $p):
				if($s->get_session('nome') == $p):
					$super = true;
				endif;
			endforeach;
			
			helper_buttons_bar($super, 'cronicas', $cronica[0]['id']);
			
			$form->_col(12);
				$tag->hr();
			$form->col_();
			
			helper_modal_alert_confirm();
			
			$form->_container();
				$form->_col(12);
					$form->h1($cronica[0]['titulo']);
					$tag->b();
					$tag->imprime(CRIADO_NO_DIA);
					echo date('d/m/Y', strtotime($cronica[0]['data_criacao'])).' às '.date(' H:i:s', strtotime($cronica[0]['data_criacao']));
					$tag->imprime(CADASTRADO_POR." {$cronica[0]['dono']} | ".AUTOR.": {$cronica[0]['autor']}");
					$tag->imprime("| ".DESCRICAO_BREVE.": <i>{$cronica[0]['descricao_breve']}</i>");
					$tag->b;
					$tag->br();
					$tag->br();
					$tag->imprime($cronica[0]['descricao_cronica']);
				$form->col_();

				$form->_col(12);
					helper_adsense();
					helper_disqus_comment();	
				$form->col_();
					
				$form->_col(12);
					helper_disqus_comment();	
				$form->col_();	
			$form->container_();
		$form->div_();
	endif;
	
require_once '../../../footer.php';