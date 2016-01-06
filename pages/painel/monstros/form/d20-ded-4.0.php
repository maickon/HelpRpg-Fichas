<?php	
global $s;
$current_user = $s->get_session('nome');
$form->input(['name' => 'dono', 'type' => 'hidden', 'value'=> $current_user]);
$form->input(['name' => 'sistema', 'type' => 'hidden', 'value'=> 'Dungeons and Dragons 4.0']);
$form->input(['name' => 'tipo', 'type' => 'hidden', 'value'=> 'Monstro']);

$atributos = [
				['Força','forca',2],['Destreza','destreza',2],['Constituição','constituicao',2],
				['Inteligência','inteligencia',2],['Sabedoria','sabedoria',2],['Carisma','carisma',2],
				['Nome','nome',3], ['Classe','classe',3], ['Raça','raca',3], ['Nível','lv',1],
				['Tipo','tipo_monstro',2], ['Xp','xp',3], 
				['Iniciativa','iniciativa',2], ['Sentidos','sentidos',7], 
				['PV','pv',2], ['Sangrando','sangrando',2], 
				['CA','ca',2], ['Fortitude','fort',3], ['Reflexos','refl',3],['Vontade','vont',3],
				['Imunidades','imunidades',7], 
				['Testes de Resistência','testes_de_resistencia',2],
				['Deslocamento','deslocamento',9],
				['Pontos de Ação', 'pontos_de_acao',3],
				['Tendência','tendencia',4],
				['Idiomas','idiomas',8],
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

helper_form_text_area("Ataque", ['name' => 'ataque', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'ataque'), 6);

helper_form_text_area("Habilidades", ['name' => 'habilidades', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'habilidades'), 6);

helper_form_text_area("Táticas", ['name' => 'taticas', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'taticas'), 6);