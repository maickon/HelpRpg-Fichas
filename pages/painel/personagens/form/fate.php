<?php	
global $s;
$current_user = $s->get_session('nome');
$form->input(['name' => 'dono', 'type' => 'hidden', 'value'=> $current_user]);
$form->input(['name' => 'sistema', 'type' => 'hidden', 'value'=> 'FATE']);
$form->input(['name' => 'tipo', 'type' => 'hidden', 'value'=> 'Personagem jogador']);
$form->input(['name' => 'lv', 'type' => 'hidden', 'value'=> '-']);

//$data_array = ['aparencia'=>'', 'pulso_cura'=>'', 'pulsos'=>'', 'ataque_basico'=>'', 'stress'=>'', 'consequencias'=>''];
//$unserialize_personagem = array_merge($unserialize_personagem, array_diff_key($data_array, $unserialize_personagem));


$atributos = [
				[CUIDADOSO,'cuidadoso'],[INTELIGENTE,'inteligente'],[CHAMATIVO,'chamativo'],
				[FORTE,'forte'],[RAPIDO,'rapido'], [SORRATEIRO,'sorrateiro']
			];
for($i=0; $i<=count($atributos)-1; $i++):
	$form->_col(2);
		$form->label($atributos[$i][0]);
		$form->input(['name' => $atributos[$i][1], 'type' => 'number', "pattern" => "[0-9]+$", 'class'=>'form-control', 'required'=>'required', 'value'=> helper_check_value($objeto[0], $atributos[$i][1])]);
	$form->col_();
endfor;

helper_new_line_in_form();

$caracteristicas = [
						[NOME,'nome'],[RACA,'raca'],[CLASSE_OCUPACAO,'classe'],
						[REFRESH,'refresh'],[PONTOS_FATE_ATUAIS,'fate']
				   ];

for($i=0; $i<=count($caracteristicas)-1; $i++):
	$form->_col(3);
		$form->label($caracteristicas[$i][0]);
		if(!isset($caracteristicas[$i][2])):
			$required = 'false';
		else:
			$required = 'false';
		endif;
		$form->input(['name' => $caracteristicas[$i][1], 'type' => 'text', 'class'=>'form-control', 'required'=>'required', 'value'=> helper_check_value($objeto[0], $caracteristicas[$i][1])]);
	$form->col_();
endfor;

helper_form_input(IMAGEM, ['name' => 'img', 'type' => 'file', 'class'=>'form-control'], 9);

helper_form_text_area(APARENCIA, ['name' => 'aparencia', 'class'=>'form-control', 'required'=>'required', 'rows'=>'5'], helper_check_value($objeto[0], 'aparencia'), 6);

helper_form_text_area(CONCEITO_CHAVE, ['name' => 'aspecto_chave', 'class'=>'form-control', 'required'=>'required', 'rows'=>'5'], helper_check_value($objeto[0], 'aspecto_chave'), 6);

helper_form_text_area(COMPLICACAO, ['name' => 'aspecto_complicacao', 'class'=>'form-control', 'required'=>'required', 'rows'=>'5'], helper_check_value($objeto[0], 'aspecto_complicacao'), 6);

helper_form_text_area(OUTROS_ASPECTOS, ['name' => 'aspectos', 'class'=>'form-control', 'required'=>'required', 'rows'=>'5'], helper_check_value($objeto[0], 'aspectos'), 6);

helper_form_text_area(DESCRICAO, ['name' => 'descricao', 'class'=>'form-control', 'required'=>'required', 'rows'=>'5'], helper_check_value($objeto[0], 'descricao'), 6);

helper_form_text_area(STRESS, ['name' => 'stress', 'class'=>'form-control', 'required'=>'required', 'rows'=>'5'], helper_check_value($objeto[0], 'stress'), 6);

helper_form_text_area(CONSEQUENCIAS, ['name' => 'consequencias', 'class'=>'form-control', 'required'=>'required', 'rows'=>'5'], helper_check_value($objeto[0], 'consequencias'), 6);

helper_form_text_area(PROEZAS, ['name' => 'proezas', 'class'=>'form-control', 'required'=>'required', 'rows'=>'5'], helper_check_value($objeto[0], 'proezas'), 6);

helper_form_text_area(OUTROS, ['name' => 'outros', 'class'=>'form-control', 'required'=>'required', 'rows'=>'5'], helper_check_value($objeto[0], 'outros'), 12);
	
		