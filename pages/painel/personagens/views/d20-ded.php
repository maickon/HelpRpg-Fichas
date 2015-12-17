<?php 
function helper_show_personagens_ded($personagem){
	global $tag, $form;
	$unserialize_params = unserialize($personagem['dados']);

	$tag->div('class="col-md-12 header_ded_3-5"');
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
				$tag->imprime('Humanóide('.$unserialize_params['tamanho'].')');
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold('Personagem de Nível '.$personagem['lv']));
				$tag->br();
				$tag->imprime(XP.' '.$unserialize_params['xp']);
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body1_ded_3-5"');
		$form->_row();
			$form->_col(6);
				$tag->imprime($form->bold(DADO_VIDA).': '.$personagem['lv'].$unserialize_params['dado_vida'].'+'.($personagem['lv']*mod($unserialize_params['constituicao'])).'('.$unserialize_params['pv'].')');	
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(INICIATIVA).$unserialize_params['iniciativa']);
			$form->col_();
			$form->_col(12);
				$tag->imprime($form->bold(CLASSE_DE_ARMADURA).': '.$unserialize_params['ca']);				
			$form->col_();
			$form->_col(12);
				$tag->imprime($form->bold(ATAQUE_TOTAL).': '.$unserialize_params['ataque']);	
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body2_ded_3-5"');
		$form->_row();
			$form->_col(6);
				$tag->imprime($form->bold(DESL).': '.$unserialize_params['deslocamento']);
			$form->col_();
			$form->_col(6);
				$tag->imprime(	$form->bold(FORTITUDE).' '.
								$unserialize_params['for'].' '.
								$form->bold(REFLEXO).' '.
								$unserialize_params['refl'].' '.
								$form->bold(VONTADE).' '.
								$unserialize_params['vont']);
			$form->col_();
			
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
	
	$tag->div('class="col-md-12 body1_ded_3-5"');
		$form->_row();
			$form->_col(12);
				$tag->imprime($form->bold(HABILIDADES_ESPECIAIS).'<br> '.$unserialize_params['habilidades_especiais']);
			$form->col_();
		
			$form->_col(12);
				$tag->imprime($form->bold(TALENTOS).'<br>'.$unserialize_params['talentos']);
			$form->col_();
		$form->row_();
	$tag->div;
			
	$tag->div('class="col-md-12 body2_ded_3-5"');
		$form->_row();
			$form->_col(12);
				$tag->imprime($form->bold(EQUIPAMENTOS).'<br>'.$unserialize_params['equipamentos']);
			$form->col_();
			
			$form->_col(12);
				$tag->imprime($form->bold(MAGIAS).'<br>'.$unserialize_params['magias']);
			$form->col_();
		$form->row_();
	$tag->div;
			
	$tag->div('class="col-md-12 body1_ded_3-5 border-button"');
		$form->_row();
			$form->_col(12);
				$tag->imprime($form->bold(HISTORIAS).'<br>'.$unserialize_params['descricao']);
			$form->col_();
			
			$form->_col(12);
				$tag->imprime($form->bold(OUTROS).'<br>'.$unserialize_params['outros']);
			$form->col_();
		$form->row_();
	$tag->div;
}