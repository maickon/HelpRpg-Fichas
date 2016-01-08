<?php 
function helper_show_monstro_sevage_worlds($personagem){
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
				$tag->imprime($form->bold(SISTEMA_DE_RPG).': '.$form->bold($personagem['sistema']));
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
				$tag->imprime($form->bold('Força').': '.helper_check_params('forca',$unserialize_params));
			$form->col_();
			$form->_col(4);
				$tag->imprime($form->bold('Agilidade').': '.helper_check_params('agilidade',$unserialize_params));
			$form->col_();
			$form->_col(4);
				$tag->imprime($form->bold('Astúcia').': '.helper_check_params('astucia',$unserialize_params));
			$form->col_();
			$form->_col(4);
				$tag->imprime($form->bold('Espírito').': '.helper_check_params('espirito',$unserialize_params));
			$form->col_();
			$form->_col(4);
				$tag->imprime($form->bold('Vigor').': '.helper_check_params('vigor',$unserialize_params));
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body2_fate"');
		$form->_row();
			$form->_col(4);
				$tag->imprime($form->bold('Aparar').': '.helper_check_params('aparar',$unserialize_params));
			$form->col_();
			$form->_col(4);
				$tag->imprime($form->bold('Movimentação').': '.helper_check_params('movimentacao',$unserialize_params));
			$form->col_();
			$form->_col(4);
				$tag->imprime($form->bold('Resistência').': '.helper_check_params('resistencia',$unserialize_params));
			$form->col_();
			$form->_col(4);
				$tag->imprime($form->bold('Carisma').': '.helper_check_params('carisma',$unserialize_params));
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body1_fate"');
		$form->_row();
			$form->_col(12);
				$tag->imprime($form->bold(DESCRICAO).'<br>'.helper_check_params('descricao',$unserialize_params));
			$form->col_();
			$form->_col(12);
				$tag->imprime($form->bold('Complicações/Vantagens').'<br>'.helper_check_params('complicacao_e_vantagens',$unserialize_params));
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body2_fate border-button"');
		$form->_row();
			$form->_col(12);
				$tag->imprime($form->bold('Habilidades').'<br>'.helper_check_params('habilidades',$unserialize_params));
			$form->col_();
			$form->_col(12);
				$tag->imprime($form->bold('Equipamentos').'<br>'.helper_check_params('equipamentos',$unserialize_params));
			$form->col_();
		$form->row_();
	$tag->div;
}

helper_show_monstro_sevage_worlds($monstros[0]);