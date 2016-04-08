<?php
require_once '../../../header.php';
require_once '../helper.php';

$super = false;
global $tag, $form, $parametros;

$tag->body('role="document"');

new Components('menu', $parametros);
$tag->br();
$tag->br();
	
	$objeto = new UploadFichas();
	$ficha = $objeto->select($objeto->getTable(),null,[ ['id','=', $_GET['id']] ]);
	
	if(!isset($ficha[0]['id'])):
		$form->_container();
			$form->_col(12);
				$form->h1(REGISTRO_NAO_ENCONTRADO_MSG);
			$form->col_();
		$form->container_();
	else:
		$form->_container();
			$form->_col(2);
				$tag->p('class="span_title"');
					$tag->imprime(FICHA_DE_PERSONAGEM);
				$tag->p;
			$form->col_();
			
			//botoes de anterior e proximo
			helper_prev_next($objeto, $_GET['id'], 'ficha');
			
			//verificando permiçoes
			foreach($permit as $p):
				if($s->get_session('nome') == $p):
					$super = true;
				endif;
			endforeach;
			
			helper_buttons_bar($super, 'ficha', $ficha[0]['id']);
			
			$form->_col(12);
				$tag->hr();
			$form->col_();
			
			helper_modal_alert_confirm();
			
			$form->_container();
				$form->_col(12);
					$form->h1($ficha[0]['nome']);
					$tag->b();
						$tag->imprime(CRIADO_NO_DIA);
						$tag->imprime(date('d/m/Y', strtotime($ficha[0]['data_cadastro']))).' às '.date(' H:i:s', strtotime($ficha[0]['data_cadastro']));
						$tag->imprime(CADASTRADO_POR." {$ficha[0]['dono']} | ". SISTEMA	.": {$ficha[0]['sistema']} | ". TIPO_FICHA.": {$ficha[0]['tipo']}");
						$tag->br();
						$tag->imprime(NIVEL." {$ficha[0]['lv']}");
						$tag->imprime(RACA.": {$ficha[0]['raca']} | ".CLASSE. ": {$ficha[0]['classe']}");
						$tag->br();
						if(empty($ficha[0]['url_arquivo_externo']) || ($ficha[0]['url_arquivo_externo'] == '-')):
						else:
							$tag->imprime(LINK. ": <a href=\"{$ficha[0]['url_arquivo_externo']}\">".$ficha[0]['nome']."</a>");
							$tag->br();
							$tag->imprime(FONTE." : <a href=\"{$ficha[0]['url_arquivo_externo']}\">".$ficha[0]['url_arquivo_externo']."</a>");
						endif;
					$tag->b;
					$tag->br();
					$tag->br();

					$tag->imprime($ficha[0]['descricao']);
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
