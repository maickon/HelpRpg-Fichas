<?php
require_once '../../../header.php';
require_once '../helper.php';

$super = false;
global $tag, $form, $parametros;

$tag->body('role="document"');

new Components('menu', $parametros);
$tag->br();
$tag->br();
	
	$objeto = new Magias(ROOTPATH.MAGIASIMGPATH);
	$magias = $objeto->select($objeto->getTable(),null,[ ['id','=', $_GET['id']] ]);
	if(empty($magias[0]['id']))
		header('Location: '.ROOTPATHURL.MAGIASPATH);
	
	$form->_container();
		$form->_col(2);
			$tag->span('class="span_title"');
				$tag->imprime(MAGIAS);
			$tag->span;
		$form->col_();
		
		helper_prev_next($objeto, $_GET['id'], 'magias');
		
		//verificando permiçoes
		foreach($permit as $p):
			if($s->get_session('nome') == $p):
				$super = true;
			endif;
		endforeach;
		
		helper_buttons_bar($super, 'magias', $magias[0]['id']);
		
		$form->_col(12);
			$tag->hr();
		$form->col_();
		
		helper_modal_alert_confirm();
		
		$form->_container();
			$form->_col(6);
				$img = $magias[0]['img'];
				helper_show_magias($magias);
			$form->col_();
			
			$form->_col(6);
				$tag->div('class="center"');
					if($img != null):
						$tag->img('src="'.ROOTPATHURL.MAGIASIMGPATH.$img.'" class="img-responsive img-thumbnail size-img"');
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
	
require_once '../../../footer.php';