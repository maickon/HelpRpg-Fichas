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
		$armadura 	= new Armaduras('');
		$arma 		= new Armas('');
		$artefato 	= new Artefatos('');
		$historias 	= new Historias();
		$contos 	= new Contos();
		$cronicas 	= new Cronicas();
		$aventuras 	= new Aventuras();
		
		$number_user 		= $user->select('usuarios');
		$number_armaduras 	= $armadura->select('armaduras');
		$number_armas 		= $arma->select('armas');
		$number_artefatos 	= $artefato->select('artefatos');
		$number_contos 		= $contos->select('contos');
		$number_cronicas 	= $cronicas->select('cronicas');
		$number_aventuras 	= $aventuras->select('aventuras');
		
		$qtd_user 		= count($number_user);
		$qtd_armaduras 	= count($number_armaduras);
		$qtd_armas 		= count($number_armas);
		$qtd_artefatos 	= count($number_artefatos);
		$qtd_aventuras 	= count($number_aventuras);
		$qtd_contos 	= count($number_contos);
		$qtd_cronicas 	= count($number_cronicas);
		
		$qtd_total_utilitarios = 5;
		$qtd_total_itens = ($qtd_armaduras+$qtd_armas+$qtd_artefatos);
		
		$img_title = [
						['jogadores.jpg',USUARIOS_CADASTRADOS, $qtd_user],
						['monstros.jpg',MONSTROS_CADASTRADOS, 0],
						['boss.jpg',CHEFES_DE_FASE, 0],
						['armas.jpg',ITENS_CADASTRADOS, $qtd_total_itens],
						['aventuras.jpg',AVENTURAS, $qtd_aventuras],
						['contos.jpg',CONTOS, $qtd_contos],
						['cronicas.jpg',CRONICAS, $qtd_cronicas],
						['utilitarios.jpg',UTILITARIOS, $qtd_total_utilitarios]
					];
		
		for($i=0; $i<count($img_title); $i++):
			$form->_col(3);
				$tag->div('class="panel panel-default panel-index"');
					$tag->img('src="'.ROOTPATHURL.IMGPATH.$img_title[$i][0].'" alt="dados" class="img-circle img-responsive"');		
					$tag->h3();
						$tag->imprime("<i>{$img_title[$i][2]}</i>");
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
