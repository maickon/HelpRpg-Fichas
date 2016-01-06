<?php 
function helper_show_monstro_3det($personagem){
	global $tag, $form;
	$unserialize_params = unserialize($personagem['dados']);

	$tag->div('class="col-md-12 header_3det"');
		$form->_row();
			$form->_col(6);
				$tag->imprime($form->bold($personagem['nome']));
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(CODIGO).$form->bold($personagem['id']));
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(SISTEMA_DE_RPG).' '.$form->bold($personagem['sistema']));
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(CRIADOR).' '.$form->bold($personagem['dono']));
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold($personagem['raca']));
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold($personagem['classe']).' de '.$form->bold($personagem['lv'].'º Nível'));
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body1_3det"');
		$form->_row();
			$form->_col(6);
				$tag->imprime(
							$form->bold(F).$unserialize_params['forca'].' '.
							$form->bold(H).$unserialize_params['habilidade'].' '.
							$form->bold(R).$unserialize_params['resistencia'].' '.
							$form->bold(A).$unserialize_params['armadura'].' '.
							$form->bold(PDF).$unserialize_params['pdf']
							);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(PVS).' '.($unserialize_params['pvs']));
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(PDM).' '.($unserialize_params['pms']));
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold('Força de Ataque').' '.$unserialize_params['forca_ataque']);
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body2_3det"');
		$form->_row();
			$form->_col(12);
				$tag->imprime($form->bold(VANTAGENS).'<br>'.$unserialize_params['vantagens']);
			$form->col_();
			$form->_col(12);
				$tag->imprime($form->bold('Kit').'<br>'.$unserialize_params['kit']);
			$form->col_();
			$form->_col(12);
				$tag->imprime($form->bold(DESVANTAGENS).'<br>'.$unserialize_params['desvantagens']);
			$form->col_();
		$form->row_();
	$tag->div;
		
	$tag->div('class="col-md-12 body1_3det border-button"');
		$form->_row();
			$form->_col(12);
				$tag->imprime($form->bold('Características').'<br>'.$unserialize_params['caracteristicas']);
			$form->col_();
			$form->_col(12);
				$tag->imprime($form->bold(HISTORIAS).'<br>'.$unserialize_params['historia']);
			$form->col_();
		$form->row_();
	$tag->div;
}

helper_show_monstro_3det($monstros[0]);