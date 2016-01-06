<?php	
global $s;
$current_user = $s->get_session('nome');
$form->input(['name' => 'dono', 'type' => 'hidden', 'value'=> $current_user]);
$form->input(['name' => 'sistema', 'type' => 'hidden', 'value'=> 'Dungeons and Dragons 5.0']);
$form->input(['name' => 'tipo', 'type' => 'hidden', 'value'=> 'Monstro']);

$atributos = [
				['Força','forca',2],['Destreza','destreza',2],['Constituição','constituicao',2],
				['Inteligência','inteligencia',2],['Sabedoria','sabedoria',2],['Carisma','carisma',2],
				['Nome','nome',3], ['Classe','classe',3], ['Raça','raca',3], ['Nível','lv',1],
				['Tipo','tipo',2], ['Tendência','tendencia',3], 
				['CA','ca',2], ['PV','pv',2], 
				['Deslocamento','deslocamento',2],
				['Fortitude','fort',3], ['Reflexos','refle',3],['Vontade','vontade',3],
				['Nível de Desafio','nivel_de_desafio',3],
				['Xp','xp',3],
				['Perícias','pericias',12], 
				['Sentidos','sentidos',7],
				['Idiomas','idiomas',5]
			];

for($i=0; $i<=count($atributos)-1; $i++):
	$form->_col($atributos[$i][2]);
		$form->label($atributos[$i][0]);
		$form->input(['name' => $atributos[$i][1], 'type' => 'text', 'class'=>'form-control', 'required' => 'true' , 'value'=> helper_check_value($objeto[0], $atributos[$i][1])]);
	$form->col_();
endfor;

helper_form_input("Imagem", ['name' => 'img', 'type' => 'file', 'class'=>'form-control'], 12);

helper_form_text_area("Descrição", ['name' => 'descricao', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'descricao'), 12);

helper_form_text_area("Ataques", ['name' => 'ataques', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'ataques'), 6);

helper_form_text_area("Habilidades", ['name' => 'habilidades', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'habilidades'), 6);