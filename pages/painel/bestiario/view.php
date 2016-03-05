<?php
require_once '../../../header.php';
require_once '../helper.php';

$super = false;
global $tag, $form, $parametros;

$tag->body('role="document"');

new Components('menu', $parametros);
$tag->br();
$tag->br();
	
	$objeto = new Bestiario();
	$bestiario = $objeto->select($objeto->getTable(),null,[ ['id','=', $_GET['id']] ]);
	
	helper_adsense();
	
	if(!isset($bestiario[0]['id'])):
		$form->_container();
			$form->_col(12);
				$form->h1(REGISTRO_NAO_ENCONTRADO_MSG);
			$form->col_();
		$form->container_();
	else:
		$form->_container();
			$form->_col(2);
				$tag->p('class="span_title"');
					$tag->imprime(BESTIARIO);
				$tag->p;
			$form->col_();
			
			//botoes de anterior e proximo
			helper_prev_next($objeto, $_GET['id'], 'bestiario');
			
			//verificando permiçoes
			foreach($permit as $p):
				if($s->get_session('nome') == $p):
					$super = true;
				endif;
			endforeach;
			
			helper_buttons_bar($super, 'bestiario', $bestiario[0]['id']);
			
			$form->_col(12);
				$tag->hr();
			$form->col_();
			
			helper_modal_alert_confirm();
			
			$form->_container();
				$form->_col(12);
					$form->h1($bestiario[0]['nome']);
					$tag->b();
					$tag->imprime(CRIADO_NO_DIA);
					echo date('d/m/Y', strtotime($bestiario[0]['criado_em'])).' às '.date(' H:i:s', strtotime($bestiario[0]['criado_em']));
					$tag->imprime(CADASTRADO_POR." {$bestiario[0]['dono']} | ".CLASSIFICACAO.": {$bestiario[0]['classificacao']}");
					$tag->b;
					$tag->br();
					$tag->br();
					$tag->imprime($bestiario[0]['descricao']);
				$form->col_();	
			$form->container_();
		$form->div_();
	endif;
	
require_once '../../../footer.php';
