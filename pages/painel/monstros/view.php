<?php
require_once '../../../header.php';
require_once '../helper.php';

$super = false;
global $tag, $form, $parametros;


$tag->body('role="document"');

new Components('menu', $parametros);
$tag->br();
$tag->br();
	
	$objeto = new Personagens(ROOTPATH.MONSTROIMGPATH);
	$monstros = $objeto->select($objeto->getTable(),null,[ ['id','=', $_GET['id']] ]);
	
	if(!isset($monstros[0]['id'])):
		$form->_container();
			$form->_col(12);
				$form->h1(REGISTRO_NAO_ENCONTRADO_MSG);
			$form->col_();
		$form->container_();
	else:
		$form->_container();
			$form->_col(2);
				$tag->span('class="span_title"');
					$tag->imprime(MONSTRO);
				$tag->span;
			$form->col_();
			
			helper_prev_next($objeto, $_GET['id'], 'monstros', 'Monstro');
			
			//verificando permiçoes
			foreach($permit as $p):
				if($s->get_session('nome') == $p):
					$super = true;
				endif;
			endforeach;
			
			helper_buttons_bar($super, 'monstros', $monstros[0]['id']);
			
			$tag->br();
			$tag->hr();
			
			helper_modal_alert_confirm();
			
			$form->_container();
				$form->_col(6);
					$img = !empty($monstros[0]['img'])?$monstros[0]['img']:'';
					require_once 'views/'.$rpg_sistemas_arquivo_nome[$monstros[0]['sistema']];
				$form->col_();
				
				$form->_col(6);
					$tag->div('class="center"');
						if($img != null):
							$tag->img('src="'.ROOTPATHURL.MONSTROIMGPATH.$img.'" class="img-responsive img-thumbnail size-img"');
						else:
							$tag->img('src="'.ROOTPATHURL.IMGPATH.'noimage.png" class="img-responsive img-thumbnail size-img"');
						endif;
					$tag->div;
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