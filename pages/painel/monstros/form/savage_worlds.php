<?php	
global $s;
$current_user = $s->get_session('nome');
$form->input(['name' => 'dono', 'type' => 'hidden', 'value'=> $current_user]);
$form->input(['name' => 'sistema', 'type' => 'hidden', 'value'=> 'Savage Worlds']);
$form->input(['name' => 'tipo', 'type' => 'hidden', 'value'=> 'Monstro']);

helper_form_select_options("Força", [ 'class'=>'form-control'], ['d4','d6','d8','d10','d12'], 3);

helper_form_select_options("Agilidade", [ 'class'=>'form-control'], ['d4','d6','d8','d10','d12'], 2);

helper_form_select_options("Astúcia", [ 'class'=>'form-control'], ['d4','d6','d8','d10','d12'], 2);

helper_form_select_options("Espírito", [ 'class'=>'form-control'], ['d4','d6','d8','d10','d12'], 2);

helper_form_select_options("Vigor", [ 'class'=>'form-control'], ['d4','d6','d8','d10','d12'], 3);

$atributos = [
				['Nome','nome',3],
				['Aparar','aparar',2],['Movimentação','movimentacao',2],['Resistência','resistencia',2],
				['Carisma','carisma',3],
				['Perícias','pericias',12]
				
			];

for($i=0; $i<=count($atributos)-1; $i++):
	$form->_col($atributos[$i][2]);
		$form->label($atributos[$i][0]);
		$form->input(['name' => $atributos[$i][1], 'type' => 'text', 'class'=>'form-control', 'required' => 'true' , 'value'=> helper_check_value($objeto[0], $atributos[$i][1])]);
	$form->col_();
endfor;

helper_form_input("Imagem", ['name' => 'img', 'type' => 'file', 'class'=>'form-control'], 12);


helper_form_text_area("Descrição", ['name' => 'descricao', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'descricao'), 6);

helper_form_text_area("Complicações/Vantagens", ['name' => 'complicacao_e_vantagens', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'complicacao_e_vantagens'), 6);

helper_form_text_area("Habilidades", ['name' => 'habilidades', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'habilidades'), 6);

helper_form_text_area("Equipamentos", ['name' => 'equipamentos', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'equipamentos'), 6);
	