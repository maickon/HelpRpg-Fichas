<?php 
function helper_show_monstro_ded4_0($personagem){
	global $tag, $form;
	$unserialize_params = unserialize($personagem['dados']);
	
	$tag->div('class="col-md-12 header_ded_4-0"');
		$form->_row();
			$form->_col(6);
				$tag->imprime($form->bold($personagem['nome']));
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(CODIGO).$personagem['id']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold($personagem['sistema']));
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(CRIADOR.' ('.$personagem['dono'].')'));				
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold($personagem['raca'].' '.$personagem['classe']));	
				$tag->br();
				$tag->imprime('('.$unserialize_params['tipo_monstro'].')');
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold('Personagem de Nível '.$personagem['lv']));
				$tag->br();
				$tag->imprime(XP.' '.$unserialize_params['xp']);
			$form->col_();
		$form->row_();
	$tag->div;	
	$tag->div('class="col-md-12 body1_ded_4-0"');
		$form->_row();
			$form->_col(6);
				$tag->imprime($form->bold(INICIATIVA).' '.helper_check_params('iniciativa',$unserialize_params));
			$form->col_();
			
			$form->_col(6);
				$tag->imprime($form->bold(SENTIDOS).' '.$unserialize_params['sentidos']);	
			$form->col_();
		$form->row_();
	$tag->div;	
	$tag->div('class="col-md-12 body1_ded_4-0"');
		$form->_row();
			$form->_col(6);
				$tag->imprime($form->bold(PONTOS_VIDA).' '.$unserialize_params['pv']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(SANGRANDO).' '.$unserialize_params['sangrando']);
			$form->col_();
		$form->row_();
	$tag->div;	
	
	$tag->div('class="col-md-12 body1_ded_4-0"');
		$form->_row();
			$form->_col(12);
				$tag->imprime($form->bold(CA).' '.$unserialize_params['ca'].';');
				$tag->imprime($form->bold(FORTITUDE).' '.$unserialize_params['fort'].';');
				$tag->imprime($form->bold(VONTADE).' '.$unserialize_params['vont'].';');
				$tag->imprime($form->bold(REFLEXO).' '.$unserialize_params['refl'].';');
			$form->col_();
		$form->row_();
	$tag->div;	
	
	$tag->div('class="col-md-12 body1_ded_4-0"');
		$form->_row();
			$form->_col(6);
				$tag->imprime($form->bold(DESL).' '.$unserialize_params['deslocamento'].';');
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold('Imunidades').' '.$unserialize_params['imunidades'].';');
			$form->col_();
		$form->row_();
	$tag->div;	
	
	$tag->div('class="col-md-12 body2_ded_4-0"');
		$form->_row();
			$form->_col(6);
				$tag->imprime($form->bold(TESTES_RESISTENCIA).' '.helper_check_params('testes_de_resistencia',$unserialize_params).';');
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(PONTO_DE_ACAO).' '.helper_check_params('pontos_de_acao',$unserialize_params).';');
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(TENDENCIA).' '.helper_check_params('tendencia',$unserialize_params).';');
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(IDIOMAS).' '.helper_check_params('idiomas',$unserialize_params).';');
			$form->col_();
			$form->_col(12);
				$tag->imprime($form->bold(PERICIAS).' '.helper_check_params('pericias', $unserialize_params).';');
			$form->col_();
		$form->row_();
	$tag->div;	
	
	$tag->div('class="col-md-12 body2_ded_4-0"');
		$form->_row();
			$form->_col(4);
				$tag->imprime($form->bold(FORCA)."{$unserialize_params['forca']}".' ('.mod($unserialize_params['forca']).')');
			$form->col_();
			$form->_col(4);
				$tag->imprime($form->bold(CON)."{$unserialize_params['constituicao']}".' ('.mod($unserialize_params['constituicao']).')');
			$form->col_();
			$form->_col(4);
				$tag->imprime($form->bold(DES)."{$unserialize_params['destreza']}".' ('.mod($unserialize_params['destreza']).')');
			$form->col_();
			$form->_col(4);
				$tag->imprime($form->bold(INTELIGENCIA)."{$unserialize_params['inteligencia']}".' ('.mod($unserialize_params['inteligencia']).')');
			$form->col_();
			$form->_col(4);
				$tag->imprime($form->bold(SAB)."{$unserialize_params['sabedoria']}".' ('.mod($unserialize_params['sabedoria']).')');
			$form->col_();
			$form->_col(4);
				$tag->imprime($form->bold(CAR)."{$unserialize_params['carisma']}".' ('.mod($unserialize_params['carisma']).')');
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body1_ded_4-0"');
		$form->_row();
			$form->_col(12);
				$tag->imprime($form->bold(DESCRICAO).'<br>'.helper_check_params('descricao',$unserialize_params));
			$form->col_();
			$form->_col(12);
				$tag->imprime($form->bold(ATAQUE).'<br>'.helper_check_params('ataque',$unserialize_params));
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body2_ded_4-0 border-button"');
		$form->_row();
			$form->_col(12);
				$tag->imprime($form->bold(HABILIDADES).'<br>'.helper_check_params('habilidades',$unserialize_params));
			$form->col_();
			
			$form->_col(12);
				$tag->imprime($form->bold('Táticas').'<br>'.helper_check_params('taticas',$unserialize_params));
			$form->col_();
		$form->row_();
	$tag->div;
	
}


helper_show_monstro_ded4_0($monstros[0]);