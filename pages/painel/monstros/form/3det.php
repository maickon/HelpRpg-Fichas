<?php	
global $s;
$current_user = $s->get_session('nome');
$form->input(['name' => 'dono', 'type' => 'hidden', 'value'=> $current_user]);
$form->input(['name' => 'sistema', 'type' => 'hidden', 'value'=> '3D&T']);
$form->input(['name' => 'tipo', 'type' => 'hidden', 'value'=> 'Personagem jogador']);

$atributos = [
				['Força','forca'],['Habilidade','habilidade'],['Resistência','resistencia'],
				['Armadura','armadura'],['Poder de Fogo','pdf'], ['Pvs','pvs'],
				['Pms','pms'],['Xp','experiencia']
			];
for($i=0; $i<=count($atributos)-1; $i++):
	$form->_col(2);
		$form->label($atributos[$i][0]);
		$form->input(['name' => $atributos[$i][1], 'type' => 'number', "pattern" => "[0-9]+$", 'class'=>'form-control', 'required'=>'required', 'value'=> helper_check_value($objeto[0], $atributos[$i][1])]);
	$form->col_();
endfor;

helper_new_line_in_form();

$caracteristicas = [
						['Nome','nome'],['Nível','lv'],['Classe','classe'],['Raça','raca'],
						['Tendencia','tendencia'],['Idade','idade'],['Peso','peso'],['Altura','altura']
				   ];

for($i=0; $i<=count($caracteristicas)-1; $i++):
	$form->_col(3);
		$form->label($caracteristicas[$i][0]);
		if(!isset($caracteristicas[$i][2])):
			$required = 'false';
		else:
			$required = 'false';
		endif;
		$form->input(['name' => $caracteristicas[$i][1], 'type' => 'text', 'class'=>'form-control', 'value'=> helper_check_value($objeto[0], $caracteristicas[$i][1])]);
	$form->col_();
endfor;

$atributos_secundarios = [
							['Kits','kits'],['Função','funcao'],['Pts','pts'],['Divindade','divindade'],
							['Vantagem Única','vantagem_unica'],['Aparência','aparencia'],['Iniciativa','iniciativa'],
							['Movimento','movimento'],['Carga','carga']
				   		];
for($i=0; $i<=count($atributos_secundarios)-1; $i++):
	$col = 2;
	if($i == 0)
		$col = 4;
	if($i == 5)
		$col = 4;
	$form->_col($col);
		if(!isset($caracteristicas[$i][2])):
			$required = 'false';
		else:
			$required = 'false';
		endif;
		$form->label($atributos_secundarios[$i][0]);
		$form->input(['name' => $atributos_secundarios[$i][1], 'type' => 'text', 'class'=>'form-control', 'value'=> helper_check_value($objeto[0], $atributos_secundarios[$i][1])]);
	$form->col_();
endfor;

helper_form_input("Imagem", ['name' => 'img', 'type' => 'file', 'class'=>'form-control'], 2);

helper_form_text_area("Combate", ['name' => 'combate', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'combate'), 6);

helper_form_text_area("Vantagens", ['name' => 'vantagens', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'vantagens'), 6);

helper_form_text_area("Desvantagens", ['name' => 'desvantagens', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'desvantagens'), 6);

helper_form_text_area("Poderes", ['name' => 'poderes', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'poderes'), 6);

helper_form_text_area("Perícias", ['name' => 'pericias', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'pericias'), 6);

helper_form_text_area("Equipamentos", ['name' => 'equipamentos', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'equipamentos'), 6);

helper_form_text_area("Dinheiro e riqueza", ['name' => 'dinheiro', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'dinheiro'), 6);

helper_form_text_area("Magias", ['name' => 'magias', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'magias'), 6);

helper_form_text_area("Outros", ['name' => 'outros', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'outros'), 12);
	
		