<?php
require_once '../../../header.php';
require_once '../helper.php';

$super = false;
global $tag, $form, $parametros;

$objeto = new Personagens(ROOTPATH.MONSTROIMGPATH);
$monstros = $objeto->select($objeto->getTable(),null,[ ['id','=', $_GET['id']] ]);

if(empty($monstros[0]['id']))
	header('Location: '.ROOTPATHURL.MONSTROPATH);

$tag->body('role="document"');

new Components('menu', $parametros);
$tag->br();
$tag->br();
	
	helper_adsense();
	
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
		
		if($super):
			helper_componentes_buttons_view('monstros', $monstros[0]['id']);
		elseif($s->get_session('nome') != $monstros[0]['dono']):
			//em cada linha onde o usuario atual for diferente do dono da arma, vai neutralizar as opçoes de editar e excluir 
			helper_componentes_buttons_view('monstros', $monstros[0]['id'], $off = true);
		elseif($s->get_session('nome') == $monstros[0]['dono']):
			//se o usuario logado for dono de alguma arma criada ele tera acesso total ao recurso
			helper_componentes_buttons_view('monstros', $monstros[0]['id']);
		endif;
		
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
				
		$form->container_();
	$form->div_();
	
require_once '../../../footer.php';