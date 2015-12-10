<?php 
function helper_show_personagens_3det($personagem){
	global $tag, $form;
	$unserialize_params = unserialize($personagem['dados']);
	
	$data_array = [TIPO_DANO=>'', HISTORIA=>''];
	$unserialize_params = array_merge($unserialize_params, array_diff_key($data_array, $unserialize_params));
	
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
				$tag->imprime($form->bold(PTS).' '.$form->bold($unserialize_params['pts']));
			$form->col_();
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
				$tag->imprime($form->bold(PVS).' '.$form->bold($unserialize_params['pvs']));
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(PDM).' '.$form->bold($unserialize_params['pms']));
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(PDE).' '.$form->bold($unserialize_params['experiencia']));
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body2_3det"');
		$form->_row();
			$form->_col(12);
				$tag->imprime($form->bold(VANTAGENS).'<br>'.$unserialize_params['vantagens']);
			$form->col_();
			$form->_col(12);
				$tag->imprime($form->bold(DESVANTAGENS).'<br>'.$unserialize_params['desvantagens']);
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body1_3det"');
		$form->_row();
			$form->_col(12);
				$tag->imprime($form->bold(TIPO_DANO).'<br>'.$unserialize_params['tipo_dano']);
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body2_3det"');
		$form->_row();
			$form->_col(12);
				$tag->imprime($form->bold(MAGIAS_CONHECIDAS).'<br>'.$unserialize_params['magias']);
			$form->col_();
			$form->_col(12);
				$tag->imprime($form->bold(PODERES).'<br>'.$unserialize_params['poderes']);
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body1_3det border-button"');
		$form->_row();
			$form->_col(12);
				$tag->imprime($form->bold(DINHEIRO_ITENS).'<br>'.$unserialize_params['dinheiro']);
			$form->col_();
			$form->_col(12);
				$tag->imprime($form->bold(HISTORIAS).'<br>'.$unserialize_params['historia']);
			$form->col_();
		$form->row_();
	$tag->div;
}