<?php
require_once '../../../header.php';
require_once '../helper.php';

$super = false;
global $tag, $form, $parametros;

$tag->body('role="document"');

new Components('menu', $parametros);
$tag->br();
$tag->br();
	
	$objeto = new Artefatos(ROOTPATH.ARTEFATOSIMGPATH);
	$artefatos = $objeto->select($objeto->getTable(),null,[ ['id','=', $_GET['id']] ]);
	
	if(!isset($artefatos[0]['id'])):
		$form->_container();
			$form->_col(12);
				$form->h1(REGISTRO_NAO_ENCONTRADO_MSG);
			$form->col_();
		$form->container_();
	else:
		$form->_container();
			$form->_col(2);
				$tag->p('class="span_title"');
					$tag->imprime(ARTEFATOS);
				$tag->p;
			$form->col_();
			
			//botoes de anterior e proximo
			helper_prev_next($objeto, $_GET['id'], 'artefatos');
			
			//verificando permiçoes
			foreach($permit as $p):
				if($s->get_session('nome') == $p):
					$super = true;
				endif;
			endforeach;
			
			//monsta a cadeia de botoes que sao exibitos de acordo com o tipo de usuario
			//caso esteja logado
			helper_buttons_bar($super, 'artefatos', $artefatos[0]['id']);
			
			$form->_col(12);
				$tag->hr();
			$form->col_();
			
			helper_modal_alert_confirm();
			
			$form->_container();
				$form->_col(9);
					$form->h1($artefatos[0]['nome']);
					$tag->b();
					$tag->imprime(CRIADO_NO_DIA);
					echo date('d/m/Y', strtotime($artefatos[0]['criado_em'])).' às '.date(' H:i:s', strtotime($artefatos[0]['criado_em']));
					$tag->imprime(" | ".CADASTRADO_POR." {$artefatos[0]['dono']} | ".CLASSIFICACAO.": {$artefatos[0]['classificacao']}");
					$tag->imprime(" | ".SISTEMA.": {$artefatos[0]['sistema']}");
					$tag->b;
					$tag->br();
					$tag->br();
					$tag->imprime($artefatos[0]['descricao']);
				$form->col_();

				$form->_col(3);	
					$form->h1(PUBLICIDADE);
					helper_adsense_responsivo_02();
				$form->col_();

				$form->_col(12);
					helper_disqus_comment();	
				$form->col_();						
			$form->container_();
		$form->div_();
	endif;	
require_once '../../../footer.php';