<?php 
function helper_show_personagens_ded5_0($personagem){
	global $tag, $form;
	$unserialize_params = unserialize($personagem['dados']);
	
	$data_array = [
	TAMANHO=>' ', DESL=>'', TENDENCIA=>'', ANTECEDENTE=>'',
	OLHOS=>'', PELE=>'', CABELO=>'', RESISTENCIA_FOR_5_0=>'',
	RESISTENCIA_DES_5_0=>'', RESISTENCIA_CON_5_0=>'',
	RESISTENCIA_INT_5_0=>'',
	RESISTENCIA_SAB_5_0=>'',
	RESISTENCIA_CAR_5_0=>'', PERICIAS=>'',TRACOS_DE_PERSONALIDADE=>'',
	IDEAIS=>'',
	VINCULOS=>'',
	DEFEITOS=>'',
	ATAQUES_E_CONJURACAO=>'',
	PROFICIENCIAS_E_IDIOMAS=>'',
	CARACTERISTICAS_E_TRACOS=>'',
	HABILIDADES_DE_CONJURACAO=>'',
	CD_DE_RESISTENCIA_DE_MAGIA=>'',
	BONUS_DE_ATAQUE_DE_MAGIA=>'',
	MAGIAS=>''
			];
	
	$unserialize_params = array_merge($unserialize_params, array_diff_key($data_array, $unserialize_params));
	
	
	$tag->div('class="col-md-12 header_ded_5-0"');
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
	
	$tag->div('class="col-md-12 body1_ded_5-0"');
		$form->_row();
			$form->_col(6);
				$tag->imprime($form->bold(CLASSE_DE_ARMADURA).' '.$unserialize_params['ca']);
			$form->col_();
			
			$form->_col(6);
				$tag->imprime($form->bold(PVS).' '.$unserialize_params['pvs_atuais'].'('.$personagem['lv'].$unserialize_params['dado_vida'].'+'.($personagem['lv']*mod($unserialize_params['constituicao']).')'));	
			$form->col_();

			$form->_col(6);
				$tag->imprime($form->bold(INICIATIVA).' '.$unserialize_params['iniciativa']);
			$form->col_();
			
			$form->_col(6);
				$tag->imprime($form->bold(DESL).' '.$unserialize_params['deslocamento']);
			$form->col_();
			
			$form->_col(6);
				$tag->imprime($form->bold(TENDENCIA).' '.$unserialize_params['tendencia']);
			$form->col_();
				
			$form->_col(6);
				$tag->imprime($form->bold(ANTECEDENTE).' '.$unserialize_params['antecedente']);
			$form->col_();
		$form->row_();
	$tag->div;	
	
	$tag->div('class="col-md-12 body2_ded_5-0"');
		$form->_row();
			$form->_col(4);
				$tag->imprime($form->bold(IDADE).' '.$unserialize_params['idade']);
			$form->col_();
			
			$form->_col(4);
				$tag->imprime($form->bold(ALTURA).' '.$unserialize_params['altura']);
			$form->col_();
			
			$form->_col(4);
				$tag->imprime($form->bold(PESO).' '.$unserialize_params['peso']);
			$form->col_();
			
			$form->_col(4);
				$tag->imprime($form->bold(OLHOS).' '.$unserialize_params['olhos']);
			$form->col_();
			
			$form->_col(4);
				$tag->imprime($form->bold(PELE).' '.$unserialize_params['pele']);
			$form->col_();
			
			$form->_col(4);
				$tag->imprime($form->bold(CABELO).' '.$unserialize_params['cabelo']);
			$form->col_();
		
			$form->_col(2);
				$tag->imprime($form->bold(FOR_5_0));
			$form->col_();
			
			$form->_col(2);
				$tag->imprime($form->bold(DES_5_0));	
			$form->col_();

			$form->_col(2);
				$tag->imprime($form->bold(CON_5_0));
			$form->col_();
			
			$form->_col(2);
				$tag->imprime($form->bold(INT_5_0));	
			$form->col_();
			
			$form->_col(2);
				$tag->imprime($form->bold(SAB_5_0));
			$form->col_();
			
			$form->_col(2);
				$tag->imprime($form->bold(CAR_5_0));	
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
	
	$tag->div('class="col-md-12 body1_ded_5-0"');
		$form->_row();
			$form->_col(6);
				$tag->imprime($form->bold(INSPIRACAO).' '.$unserialize_params['inspiração']);
			$form->col_();
			
			$form->_col(6);
				$tag->imprime($form->bold(BONUS_DE_PROFICIENCIA).' '.$unserialize_params['proficiencias']);
			$form->col_();
			
			$form->_col(12);
				$tag->imprime($form->bold(TESTES_RESISTENCIA).' '. 
							$form->bold(RESISTENCIA_FOR_5_0).' '.$unserialize_params['resistencia_forca'].' '.
							$form->bold(RESISTENCIA_DES_5_0).' '.$unserialize_params['resistencia_destreza'].' '.
							$form->bold(RESISTENCIA_CON_5_0).' '.$unserialize_params['resistencia_constituicao'].' '.
							$form->bold(RESISTENCIA_INT_5_0).' '.$unserialize_params['resistencia_inteligencia'].' '.
							$form->bold(RESISTENCIA_SAB_5_0).' '.$unserialize_params['resistencia_sabedoria'].' '.
							$form->bold(RESISTENCIA_CAR_5_0).' '.$unserialize_params['resistencia_carisma']);
			$form->col_();
			
			$form->_col(12);
				$tag->imprime($form->bold(PERICIAS).'<br>'.$unserialize_params['pericias']);	
			$form->col_();

			$form->_col(12);
				$tag->imprime($form->bold(SABEDORIA_PERCEPCAO_PASSIVA).' '.$unserialize_params['sabedoria_percepcao']);
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body1_ded_5-0"');
		$form->_row();				
			$form->_col(12);
				$tag->imprime($form->bold(TRACOS_DE_PERSONALIDADE).'<br>'.$unserialize_params['tracos_de_personalidade']);
			$form->col_();
		
			$form->_col(12);
				$tag->imprime($form->bold(IDEAIS).'<br>'.$unserialize_params['ideais']);
			$form->col_();
			
			$form->_col(12);
				$tag->imprime($form->bold(VINCULOS).'<br>'.$unserialize_params['vinculos']);
			$form->col_();
			
			$form->_col(12);
				$tag->imprime($form->bold(DEFEITOS).'<br>'.$unserialize_params['defeitos']);
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body2_ded_5-0"');
		$form->_row();				
			$form->_col(12);
				$tag->imprime($form->bold(ATAQUES_E_CONJURACAO).'<br>'.$unserialize_params['ataques_e_conjuracao']);
			$form->col_();
			
			$form->_col(12);
				$tag->imprime($form->bold(EQUIPAMENTOS).'<br>'.$unserialize_params['equipamentos']);
			$form->col_();
			
			$form->_col(12);
				$tag->imprime($form->bold(OUTRAS_PROFICIENCIAS_E_IDIOMAS).'<br>'.$unserialize_params['proficiencias_e_idiomas']);
			$form->col_();
			
			$form->_col(12);
				$tag->imprime($form->bold(CARACTERISTICAS_E_TRACOS).'<br>'.$unserialize_params['caracteristicas_tracos']);
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body1_ded_5-0"');
		$form->_row();				
			$form->_col(4);
				$tag->imprime($form->bold(HABILIDADES_DE_CONJURACAO).' '.$unserialize_params['habilidade_de_conjuracao']);	
			$form->col_();

			$form->_col(4);
				$tag->imprime($form->bold(CD_DE_RESISTENCIA_DE_MAGIA).' '.$unserialize_params['cd_de_resistencia_de_magia']);
			$form->col_();
			
			$form->_col(4);
				$tag->imprime($form->bold(BONUS_DE_ATAQUE_DE_MAGIA).' '.$unserialize_params['bonus_de_ataque_de_magia']);
			$form->col_();
			
			$form->_col(12);
				$tag->imprime($form->bold(MAGIAS).'<br>'.$unserialize_params['magias']);
			$form->col_();
		$form->row_();
	$tag->div;
}
