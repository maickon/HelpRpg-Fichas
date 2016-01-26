<?php
require_once '../../../header.php';
require_once '../helper.php';

$super = false;
global $tag, $form, $parametros;

$tag->body('role="document"');

new Components('menu', $parametros);
$tag->br();
$tag->br();
	
	$objeto = new Armaduras(ROOTPATH.ARMADURASIMGPATH);
	$armadura = $objeto->select($objeto->getTable(),null,[ ['id','=', $_GET['id']] ]);
	
	if(empty($armadura[0]['id']))
		header('Location: '.ROOTPATHURL.ARMADURASPATH);
	$form->_container();
		$form->_col(2);
			$tag->span('class="span_title"');
				$tag->imprime(ARMADURAS);
			$tag->span;
		$form->col_();
		
		//botoes de anterior e proximo
		helper_prev_next($objeto, $_GET['id'], 'armaduras');
		
		//verificando permiçoes
		foreach($permit as $p):
			if($s->get_session('nome') == $p):
				$super = true;
			endif;
		endforeach;
		
		if($super):
			helper_componentes_buttons_view('armaduras', $armadura[0]['id']);
		elseif($s->get_session('nome') != $armadura[0]['dono']):
			//em cada linha onde o usuario atual for diferente do dono da arma, vai neutralizar as opçoes de editar e excluir 
			helper_componentes_buttons_view('armaduras', $armadura[0]['id'], $off = true);
		elseif($s->get_session('nome') == $armadura[0]['dono']):
			//se o usuario logado for dono de alguma arma criada ele tera acesso total ao recurso
			helper_componentes_buttons_view('armaduras', $armadura[0]['id']);
		endif;
		
		$form->_container();
			$form->_col(12);
				$tag->hr();
			$form->col_();
		$form->container_();
		
		helper_modal_alert_confirm();
		
		$form->_container();
			$form->_col(6);
				$img = $armadura[0]['img'];
				helper_show_armaduras($armadura);
			$form->col_();
			
			$form->_col(6);
				$tag->div('class="center"');
					if($img != null):
						$tag->img('src="'.ROOTPATHURL.ARMADURASIMGPATH.$img.'" class="img-responsive img-thumbnail size-img"');
					else:
						$tag->img('src="'.ROOTPATHURL.IMGPATH.'noimage.png" class="img-responsive img-thumbnail size-img"');
					endif;
				$tag->div;
			$form->col_();
				
		$form->container_();
	$form->div_();
	$tag->div;
require_once '../../../footer.php';