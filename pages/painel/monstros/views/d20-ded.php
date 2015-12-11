<?php 
function helper_ficha_view_monstro($personagem){
	global $tag, $form;
	$unserialize_params = unserialize($personagem['dados']);
	
	//$data_array = array('nome'=>'', 'id'=>'');
	//$unserialize_params = array_merge($unserialize_params, array_diff_key($data_array, $unserialize_params));
	
	$tag->div('class="col-md-12 header_monstros"');
		$form->_row();
			$form->_col(6);
				$tag->imprime($form->bold($personagem['nome']));
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(CODIGO).$form->bold($personagem['id']));
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(CRIADOR).' '.$form->bold($personagem['dono']));
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold("Monstro de").' ND '.$form->bold($personagem['lv']));
			$form->col_();
			$form->_col(6);
				$tag->imprime($personagem['sistema']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($personagem['raca'].'('.$unserialize_params['tamanho'].')');
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body1_monstros"');
		$form->_row();
			$form->_col(6);
				$tag->imprime($form->bold(DADO_VIDA).': '.$personagem['lv'].$unserialize_params['dv'].(mod($unserialize_params['constituicao']*$personagem['lv']).' '.$unserialize_params['pv'].PONTOS_DE_VIDA_ABREVIADO));
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(INICIATIVA).': '.$unserialize_params['iniciativa']);
			$form->col_();
			$form->_col(12);
				$tag->imprime($form->bold(DESL).': '.$unserialize_params['deslocamento']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(CA).': '.$unserialize_params['ca']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(TENDENCIA).': '.$unserialize_params['tendencia']);
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body2_monstros"');
		$form->_row();
			$form->_col(2);
				$tag->imprime($form->bold(FOR_2_5));
			$form->col_();
			
			$form->_col(2);
				$tag->imprime($form->bold(DES_2_5));	
			$form->col_();

			$form->_col(2);
				$tag->imprime($form->bold(CON_2_5));
			$form->col_();
			
			$form->_col(2);
				$tag->imprime($form->bold(INT_2_5));	
			$form->col_();
			
			$form->_col(2);
				$tag->imprime($form->bold(SAB_2_5));
			$form->col_();
			
			$form->_col(2);
				$tag->imprime($form->bold(CAR_2_5));	
			$form->col_();
			
			$form->_col(2);
				$tag->imprime($form->bold($unserialize_params['forca']).' ('.mod($unserialize_params['forca']).')');
			$form->col_();
			
			$form->_col(2);
				$tag->imprime($form->bold($unserialize_params['destreza']).' ('.mod($unserialize_params['destreza']).')');	
			$form->col_();

			$form->_col(2);
				$tag->imprime($form->bold($unserialize_params['constituicao']).' ('.mod($unserialize_params['constituicao']).')');
			$form->col_();
			
			$form->_col(2);
				$tag->imprime($form->bold($unserialize_params['inteligencia']).' ('.mod($unserialize_params['inteligencia']).')');	
			$form->col_();
			
			$form->_col(2);
				$tag->imprime($form->bold($unserialize_params['sabedoria']).' ('.mod($unserialize_params['sabedoria']).')');
			$form->col_();
			
			$form->_col(2);
				$tag->imprime($form->bold($unserialize_params['carisma']).' ('.mod($unserialize_params['carisma']).')');	
			$form->col_();
		$form->row_();
	$tag->div;
			
	$tag->div('class="col-md-12 body1_monstros"');
		$form->_row();
			$form->_col(6);
				$tag->imprime($form->bold(ATAQUE_AGARRA).': '.$unserialize_params['ataq_agarrar']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(ATAQUE).': '.$unserialize_params['ataque']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(ATAQUE_TOTAL).': '.$unserialize_params['ataque_total']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(ESPACO_ALCANCE).': '.$unserialize_params['espaco_alcance']);
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body2_monstros"');
		$form->_row();
			$form->_col(6);
				$tag->imprime($form->bold(ATAQUES_ESPECIAIS).': '.$unserialize_params['ataques_especiais']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(QUALIDADES_ESPECIAIS).': '.$unserialize_params['qualidades_especiais']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(TESTES_RESISTENCIA).': '.$unserialize_params['testes_resistencia']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(HABILIDADES_BASICAS).': '.$unserialize_params['espaco_alcance']);
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body1_monstros"');
		$form->_row();
			$form->_col(6);
				$tag->imprime($form->bold(AMBIENTE).': '.$unserialize_params['ambiente']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(ORGANIZACAO).': '.$unserialize_params['organizacao']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(PROGRESSAO).': '.$unserialize_params['progressao']);
			$form->col_();
			$form->_col(12);
				$tag->imprime($form->bold(DESCRICAO).'<br>'.$unserialize_params['descricao']);
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body2_monstros border-button"');
		$form->_row();
			$form->_col(12);
				$tag->imprime($form->bold(PERICIAS).'<br>'.$unserialize_params['pericias']);
			$form->col_();
			$form->_col(12);
				$tag->imprime($form->bold(TALENTOS).'<br>'.$unserialize_params['talentos']);
			$form->col_();
			$form->_col(12);
				$tag->imprime($form->bold(TESOURO).'<br>'.$unserialize_params['tesouro']);
			$form->col_();
			$form->_col(12);
				$tag->imprime($form->bold(COMBATE).'<br>'.$unserialize_params['combate']);
			$form->col_();
		$form->row_();
	$tag->div;
}