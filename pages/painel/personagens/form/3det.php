<?php	
global $s;
$current_user = $s->get_session('nome');
$form->input(['name' => 'dono', 'type' => 'hidden', 'value'=> $current_user]);
$form->input(['name' => 'sistema', 'type' => 'hidden', 'value'=> '3D&T']);
$form->input(['name' => 'tipo', 'type' => 'hidden', 'value'=> 'Personagem jogador']);

$atributos = [
				[FORCA,'forca'],[HABILIDADE,'habilidade'],[RESISTENCIA,'resistencia'],
				[ARMADURAS,'armadura'],[PDF,'pdf'], [PVS,'pvs'],
				[PDM,'pms'],[PTS,'pts'],[XP,'experiencia']
			];
for($i=0; $i<=count($atributos)-1; $i++):
	$form->_col(2);
		$form->label($atributos[$i][0]);
		$form->input(['name' => $atributos[$i][1], 'type' => 'number', "pattern" => "[0-9]+$", 'class'=>'form-control', 'required'=>'true', 'value'=> helper_check_value($objeto[0], $atributos[$i][1])]);
	$form->col_();
endfor;

helper_form_input(IMAGEM, ['name' => 'img', 'type' => 'file', 'class'=>'form-control'], 6);

helper_new_line_in_form();

$caracteristicas = [
						[NOME,'nome'],[NIVEL,'lv'],[CLASSE,'classe'],[RACA,'raca']
				   ];

for($i=0; $i<=count($caracteristicas)-1; $i++):
	$form->_col(3);
		$form->label($caracteristicas[$i][0]);
		if(!isset($caracteristicas[$i][2])):
			$required = 'false';
		else:
			$required = 'false';
		endif;
		$form->input(['name' => $caracteristicas[$i][1], 'type' => 'text', 'class'=>'form-control', 'required'=>'true', 'value'=> helper_check_value($objeto[0], $caracteristicas[$i][1])]);
	$form->col_();
endfor;

helper_form_text_area(VANTAGENS, ['name' => 'vantagens', 'class'=>'form-control', 'required'=>'true', 'rows'=>'5'], helper_check_value($objeto[0], 'vantagens'), 6);

helper_form_text_area(DESVANTAGENS, ['name' => 'desvantagens', 'class'=>'form-control', 'required'=>'true', 'rows'=>'5'], helper_check_value($objeto[0], 'desvantagens'), 6);

helper_form_text_area(TIPO_DANO, ['name' => 'tipo_dano', 'class'=>'form-control', 'required'=>'true', 'rows'=>'5'], helper_check_value($objeto[0], 'tipo_dano'), 6);

helper_form_text_area(PODERES, ['name' => 'poderes', 'class'=>'form-control', 'required'=>'true', 'rows'=>'5'], helper_check_value($objeto[0], 'poderes'), 6);

helper_form_text_area(PERICIAS, ['name' => 'pericias', 'class'=>'form-control', 'required'=>'true', 'rows'=>'5'], helper_check_value($objeto[0], 'pericias'), 6);

helper_form_text_area(EQUIPAMENTOS, ['name' => 'equipamentos', 'class'=>'form-control', 'required'=>'true', 'rows'=>'5'], helper_check_value($objeto[0], 'equipamentos'), 6);

helper_form_text_area("Dinheiro e Itens", ['name' => 'dinheiro', 'class'=>'form-control', 'required'=>'true', 'rows'=>'5'], helper_check_value($objeto[0], 'dinheiro'), 6);

helper_form_text_area("Magias", ['name' => 'magias', 'class'=>'form-control', 'required'=>'true', 'rows'=>'5'], helper_check_value($objeto[0], 'magias'), 6);

helper_form_text_area("História", ['name' => 'historia', 'class'=>'form-control', 'required'=>'true', 'rows'=>'5'], helper_check_value($objeto[0], 'historia'), 12);
	
		