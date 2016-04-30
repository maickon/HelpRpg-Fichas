<?php
require_once '../../../header.php';
require_once '../helper.php';

$super = false;
global $tag, $form, $parametros;

$tag->body('role="document"');

new Components('menu', $parametros);
$tag->br();
$tag->br();
	
	$objeto = new Armas(ROOTPATH.ARMASIMGPATH);
	$arma = $objeto->select($objeto->getTable(),null,[ ['id','=', $_GET['id']] ]);
	
	if(!isset($arma[0]['id'])):
		$form->_container();
			$form->_col(12);
				$form->h1(REGISTRO_NAO_ENCONTRADO_MSG);
			$form->col_();
		$form->container_();
	else:
		$form->_container();
			$form->_col(2);
				$tag->span('class="span_title"');
					$tag->imprime(ARMAS);
				$tag->span;
			$form->col_();
			
			//botoes de anterior e proximo
			helper_prev_next($objeto, $_GET['id'], 'armas');
			
			//verificando permiçoes
			foreach($permit as $p):
				if($s->get_session('nome') == $p):
					$super = true;
				endif;
			endforeach;
			
			helper_buttons_bar($super, 'armas', $arma[0]['id']);
			
			$form->_col(12);
				$tag->hr();
			$form->col_();
			
			helper_modal_alert_confirm();
			
			$form->_container();
				$form->_col(6);
					$img = $arma[0]['img'];
					helper_show_armas($arma);
				$form->col_();
				
				$form->_col(6);
					$form->_col(12);
						$tag->div('class="center"');
							if($img != null):
								$tag->img('src="'.ROOTPATHURL.ARMASIMGPATH.$img.'" class="img-responsive img-thumbnail size-img"');
							else:
								$tag->img('src="'.ROOTPATHURL.IMGPATH.'noimage.png" class="img-responsive img-thumbnail size-img"');
							endif;
						$tag->div;
					$form->col_();

					$form->_col(12);
						$tag->br();
						$tag->br();
					$form->col_();
					
					$form->_col(12);
						helper_adsense_responsivo_01();
					$form->col_();
				$form->col_();

				$form->_col(12);
					helper_disqus_comment();	
				$form->col_();
			$form->container_();
		$form->div_();
	endif;
	
require_once '../../../footer.php';