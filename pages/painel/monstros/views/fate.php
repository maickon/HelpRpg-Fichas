<?php 
function helper_show_monstro_fate($personagem){
	global $tag, $form;
	$unserialize_params = unserialize($personagem['dados']);
	$tag->div('class="col-md-12 header_fate"');
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
				$tag->imprime($form->bold(CLASSE).': '.$form->bold($personagem['classe']));
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(RACA).': '.$form->bold($personagem['raca']));
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body1_fate"');
		$form->_row();
			$form->_col(4);
				$tag->imprime($form->bold(CUIDADOSO).'<br>'.helper_bug_do_traco($unserialize_params['cuidadoso']).'('.helper_escala_fate_rpg($unserialize_params['cuidadoso']).')');
			$form->col_();
			$form->_col(4);
				$tag->imprime($form->bold(INTELIGENTE).'<br>'.helper_bug_do_traco($unserialize_params['inteligente']).'('.helper_escala_fate_rpg($unserialize_params['inteligente']).')');
			$form->col_();
			$form->_col(4);
				$tag->imprime($form->bold(CHAMATIVO).'<br>'.helper_bug_do_traco($unserialize_params['chamativo']).'('.helper_escala_fate_rpg($unserialize_params['chamativo']).')');
			$form->col_();
			$form->_col(4);
				$tag->imprime($form->bold(FORTE).'<br>'.helper_bug_do_traco($unserialize_params['forte']).'('.helper_escala_fate_rpg($unserialize_params['forte']).')');
			$form->col_();
			$form->_col(4);
				$tag->imprime($form->bold(RAPIDO).'<br>'.helper_bug_do_traco($unserialize_params['rapido']).'('.helper_escala_fate_rpg($unserialize_params['rapido']).')');
			$form->col_();
			$form->_col(4);
				$tag->imprime($form->bold(SORRATEIRO).'<br>'.helper_bug_do_traco($unserialize_params['sorrateiro']).'('.helper_escala_fate_rpg($unserialize_params['sorrateiro']).')');
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body2_fate"');
		$form->_row();
			$form->_col(6);
				$form->h1(STRESS);
			$form->col_();
			$tag->br();
			$form->_col(2);
				helper_check_checkbox('stress1', $unserialize_params);
			$form->col_();
			
			$form->_col(2);
				helper_check_checkbox('stress2', $unserialize_params);
			$form->col_();
			
			$form->_col(2);
				helper_check_checkbox('stress3', $unserialize_params);
			$form->col_();
			
			$form->_col(12);
				$tag->imprime($form->bold(NIVEL).' '.helper_check_params('lv', $personagem));
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body2_fate"');
		$form->_row();
			$form->_col(12);
				$tag->imprime($form->bold(CONCEITO_CHAVE).'<br>'.$unserialize_params['conceito_chave']);
			$form->col_();
			$form->_col(12);
				$tag->imprime($form->bold(COMPLICACAO).'<br>'.$unserialize_params['complicacao']);
			$form->col_();
		$form->row_();
	$tag->div;
			
	$tag->div('class="col-md-12 body1_fate"');
		$form->_row();
			$form->_col(12);
				$tag->imprime($form->bold(OUTROS_ASPECTOS).'<br>'.$unserialize_params['outros_aspectos']);
			$form->col_();
			$form->_col(12);
				$tag->imprime($form->bold(CONSEQUENCIAS).'<br>'.$unserialize_params['consequencias']);
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body2_fate border-button"');
		$form->_row();
			$form->_col(12);
				$tag->imprime($form->bold(DESCRICAO).'<br>'.$unserialize_params['descricao']);
			$form->col_();
			$form->_col(12);
			$form->col_();
		$form->row_();
	$tag->div;
}

function helper_bug_do_traco($valor){
	if($valor == '-'):
		return '0';
	else:
		return $valor;
	endif;
}

helper_show_monstro_fate($monstros[0]);