<?php	
global $s;
$current_user = $s->get_session('nome');
$form->input(['name' => 'dono', 'type' => 'hidden', 'value'=> $current_user]);
$form->input(['name' => 'sistema', 'type' => 'hidden', 'value'=> 'Savage Worlds']);
$form->input(['name' => 'tipo', 'type' => 'hidden', 'value'=> 'Monstro']);

function helper_form_sevage($array_a_ser_mesclado){
	$opcoes_valores_atributos = ['d4','d6','d8','d10','d12'];
	
	if(isset($array_a_ser_mesclado)):
		$novo_array = array_merge($array_a_ser_mesclado, $opcoes_valores_atributos);
		return $novo_array;
	else:
		return $opcoes_valores_atributos;
	endif;
}

helper_form_select_options("Força", [ 'class'=>'form-control', 'name' => 'forca'], helper_form_sevage([helper_check_value($objeto[0],'forca')]), 3);

helper_form_select_options("Agilidade", [ 'class'=>'form-control', 'name' => 'agilidade'], helper_form_sevage([helper_check_value($objeto[0],'agilidade')]), 2);

helper_form_select_options("Astúcia", [ 'class'=>'form-control', 'name' => 'astucia'], helper_form_sevage([helper_check_value($objeto[0],'astucia')]), 2);

helper_form_select_options("Espírito", [ 'class'=>'form-control', 'name' => 'espirito'], helper_form_sevage([helper_check_value($objeto[0],'espirito')]), 2);

helper_form_select_options("Vigor", [ 'class'=>'form-control', 'name' => 'vigor'], helper_form_sevage([helper_check_value($objeto[0],'vigor')]), 3);

$atributos = [
				[NOME,'nome',3],
				['Aparar','aparar',2],['Movimentação','movimentacao',2],['Resistência','resistencia',2],
				['Carisma','carisma',3],
				['Perícias','pericias',12],
				[NIVEL,'lv',2],
				[CLASSE,'classe',3],
				[RACA,'raca',3]
				
			];

for($i=0; $i<=count($atributos)-1; $i++):
	$form->_col($atributos[$i][2]);
		$form->label($atributos[$i][0]);
		$form->input(['name' => $atributos[$i][1], 'type' => 'text', 'class'=>'form-control', 'required' => 'true' , 'value'=> helper_check_value($objeto[0], $atributos[$i][1])]);
	$form->col_();
endfor;

helper_form_input("Imagem", ['name' => 'img', 'type' => 'file', 'class'=>'form-control'], 4);


helper_form_text_area("Descrição", ['name' => 'descricao', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'descricao'), 6);

helper_form_text_area("Complicações/Vantagens", ['name' => 'complicacao_e_vantagens', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'complicacao_e_vantagens'), 6);

helper_form_text_area("Habilidades", ['name' => 'habilidades', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'habilidades'), 6);

helper_form_text_area("Equipamentos", ['name' => 'equipamentos', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'equipamentos'), 6);
	