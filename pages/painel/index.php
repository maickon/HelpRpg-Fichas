<?php

require_once '../../header.php';

new Components('menu', $parametros);
global $s, $form, $tag;


$form->_row();
	$form->_container();
		$form->h1("Painel - Bem vindo ao Help Rpg Fichas");
		if($s->get_session('login')):
			$tag->h3();
				$tag->imprime("Ola ".$_SESSION['nome']);
			$tag->h3;
		else:
			$tag->h3();
				$tag->div('class="alert alert-danger"');
					$tag->imprime('erro');
				$tag->div;
			$tag->h3;
			 $s->restricted_access();
		endif;
		$form->hr();
		
		$user = new Usuarios();
		$numbr_user = $user->select('usuarios');
			
		$number = count($numbr_user);
		$img_title = [
						['jogadores.jpg','Usuários Cadastrados'],
						['monstros.jpg','Monstros cadastrados'],
						['boss.jpg','Chefes de fase'],
						['armas.jpg','Itens Cadastrados']
					];
		
		for($i=0; $i<count($img_title); $i++):
			$form->_col(3);
				$tag->div('class="panel panel-default panel-index"');
					$tag->img('src="'.ROOTPATHURL.IMGPATH.$img_title[$i][0].'" alt="dados" class="img-circle img-responsive"');		
					$tag->h3();
						$tag->imprime("<i>{$number}</i>");
						$tag->br();
						$tag->small();
							$tag->imprime($img_title[$i][1]);
						$tag->small;
					$tag->h3;
				$tag->div;
			$form->col_();
		endfor;
		
	$form->container_();
$form->row_();

require_once '../../footer.php';
