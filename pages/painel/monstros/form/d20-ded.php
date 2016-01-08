<?php	
global $s;
$current_user = $s->get_session('nome');
$form->input(['name' => 'dono', 'type' => 'hidden', 'value'=> $current_user]);
$form->input(['name' => 'sistema', 'type' => 'hidden', 'value'=> 'Dungeons and Dragons 3.5']);
$form->input(['name' => 'tipo', 'type' => 'hidden', 'value'=> 'Monstro']);

$atributos = [
				['Força','forca',2],['Destreza','destreza',2],['Constituição','constituicao',2],
				['Inteligência','inteligencia',2],['Sabedoria','sabedoria',2],['Carisma','carisma',2],
				['Nome','nome',3], ['Tipo','tipo_monstro',3], 
				['Pv','pv',1],
				['Dados de Vida','dv',2], ['Iniciativa','iniciativa',1],
				['Deslocamento','deslocamento',2], 
				['Nível','lv',1],['Classe','classe',2],
				['Fortitude','fort',2],['Reflexos','refl',2],['Vontade','vont',2],['Tendência','tendencia',3],
				['Classe Armadura','ca',6], 
				['Ataque Base/Agarrar','ataque_base_agarrar',2],
				['Espaço/Alcance','espaco_alcance',2],
				['Raça','raca',2],
				['Tesouro','tesouro',6],
				['Ataque Especial','ataque_especial',6],
				['Ataque','ataque',12], 
				['Ataque Total','ataque_total',12], ['Qualidades Especiais','qualidades_especiais',12], 
				['Ambiente','ambiente',6],
				['Nível de Desafio','nd',6],
				['Organização', 'organizacao',10],
				['Progressão','progressao',2]
				
			];

for($i=0; $i<=count($atributos)-1; $i++):
	$form->_col($atributos[$i][2]);
		$form->label($atributos[$i][0]);
		$form->input(['name' => $atributos[$i][1], 'type' => 'text', 'class'=>'form-control', 'required' => 'true' , 'value'=> helper_check_value($objeto[0], $atributos[$i][1])]);
	$form->col_();
endfor;

helper_form_input(IMAGEM, ['name' => 'img', 'type' => 'file', 'class'=>'form-control'], 12);

helper_form_text_area(DESCRICAO, ['name' => 'descricao', 'class'=>'form-control', 'required'=>'true', 'rows'=>'5'], helper_check_value($objeto[0], 'descricao'), 6);

helper_form_text_area(COMBATE, ['name' => 'combate', 'class'=>'form-control', 'required'=>'true', 'rows'=>'5'], helper_check_value($objeto[0], 'combate'), 6);

helper_form_text_area(PERICIAS, ['name' => 'pericias', 'class'=>'form-control', 'required'=>'true', 'rows'=>'5'], helper_check_value($objeto[0], 'pericias'), 6);

helper_form_text_area(TALENTOS, ['name' => 'talentos', 'class'=>'form-control', 'required'=>'true', 'rows'=>'5'], helper_check_value($objeto[0], 'talentos'), 6);