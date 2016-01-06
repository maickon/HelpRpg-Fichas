<?php	
global $s;
$current_user = $s->get_session('nome');
$form->input(['name' => 'dono', 'type' => 'hidden', 'value'=> $current_user]);
$form->input(['name' => 'sistema', 'type' => 'hidden', 'value'=> '3D&T']);
$form->input(['name' => 'tipo', 'type' => 'hidden', 'value'=> 'Monstro']);

$atributos = [
				['Força','forca',3],['Habilidade','habilidade',2],['Resistência','resistencia',2],
				['Armadura','armadura',2],['Poder de Fogo','pdf',3],
				['Nome','nome',3],
				['Classe','classe',3],
				['Raça','raca',3],
				['Vida','pvs',3],
				['Magia','pms',2],['Força de Ataque','forca_ataque',2],
				['Nível','lv',2],
				['Kit','kit',12],
				['Vantagens','vantagens',12],
				['Desvantagens','desvantagens',12]
			];
for($i=0; $i<=count($atributos)-1; $i++):
	$form->_col($atributos[$i][2]);
		$form->label($atributos[$i][0]);
		$form->input(['name' => $atributos[$i][1], 'type' => 'text', 'class'=>'form-control', 'required' => 'true' , 'value'=> helper_check_value($objeto[0], $atributos[$i][1])]);
	$form->col_();
endfor;

helper_form_input("Imagem", ['name' => 'img', 'type' => 'file', 'class'=>'form-control'], 12);

helper_form_text_area("História", ['name' => 'historia', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'historia'), 6);

helper_form_text_area("Características", ['name' => 'caracteristicas', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'caracteristicas'), 6);

		