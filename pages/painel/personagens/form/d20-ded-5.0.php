<?php	
global $s;
$current_user = $s->get_session('nome');
$form->input(['name' => 'dono', 'type' => 'hidden', 'value'=> $current_user]);
$form->input(['name' => 'sistema', 'type' => 'hidden', 'value'=> 'Dungeons and Dragons 5.0']);
$form->input(['name' => 'tipo', 'type' => 'hidden', 'value'=> 'Personagem jogador']);

$atributos = [
				['Força','forca'],['Destreza','destreza'],['Constituição','constituicao'],
				['Inteligência','inteligencia'],['Sabedoria','sabedoria'],['Carisma','carisma'],
				
				['Res. Força','resistencia_forca'],['Res. Destreza','resistencia_destreza'],['Res. Constituição','resistencia_constituicao'],
				['Res. Inteligência','resistencia_inteligencia'],['Res. Sabedoria','resistencia_sabedoria'],['Res. Carisma','resistencia_carisma']
			];
/*
 * a variavel $objeto e um array e $atributos[$i][1] e o indice
 * verificamos dentro de helper_check_value() se o array $objeto
 * contem um indice conforme passado por parametro. Caso nao tenha
 * este indice subentendemos que se trata do indice dados com uma 
 * string serializada. Apos isso damos um unserialize e retornamos
 * uma nova lista com os arquivos serializado.
 */
for($i=0; $i<=count($atributos)-1; $i++):
	$form->_col(2);
		$form->label($atributos[$i][0]);
		$form->input(['name' => $atributos[$i][1], 'type' => 'text', 'class'=>'form-control', 'required'=>'true', 'value'=> helper_check_value($objeto[0], $atributos[$i][1])]);
	$form->col_();
endfor;

$atributos_secundarios = [
						['Nome','nome'], ['Raça','raca'], ['Classe','classe'],
						['Nível','lv'], ['Pontos de experiência','xp'],['Tamanho','tamanho'], 
						['Altura','altura'], ['Peso','peso'], ['Antecedente','antecedente'], 
						['Idade','idade'],['Sexo','sexo'],['Olhos','olhos'],['Pele','pele'],
						['Cabelo','cabelo'],
						
						['Sabedoria passiva (Percepção)', 'sabedoria_percepcao'],
	
						['Classe armadura','ca'], ['Bônus de proficiência','proficiencia'], ['Inspiração','inspiração'],
						['Pvs atuais','pvs_atuais'],['Deslocamento','deslocamento'],  
						['Tendencia','tendencia'],
						['Dado de vida','dado_vida'], ['Iniciativa','iniciativa'],
						['Habilidades de Conjuração','habilidade_de_conjuracao'],
						['CD de Resistência de Magia','cd_de_resistencia_de_magia'],
						['Bônus de Ataque de Magia','bonus_de_ataque_de_magia']
				   	];
for($i=0; $i<=count($atributos_secundarios)-1; $i++):
	$form->_col(3);
		if(!isset($caracteristicas[$i][2])):
			$required = 'false';
		else:
			$required = 'false';
		endif;
		$form->label($atributos_secundarios[$i][0]);
		$form->input(['name' => $atributos_secundarios[$i][1], 'type' => 'text', 'class'=>'form-control', 'required'=>'true', 'value'=> helper_check_value($objeto[0], $atributos_secundarios[$i][1])]);
	$form->col_();
endfor;


helper_form_input("Imagem", ['name' => 'img', 'type' => 'file', 'class'=>'form-control'], 6);

helper_form_text_area("Ataques & Conjuração", ['name' => 'ataques_e_conjuracao', 'class'=>'form-control', 'required'=>'true', 'rows'=>'5'], helper_check_value($objeto[0], 'ataques_e_conjuracao'), 6);

helper_form_text_area("Ideais", ['name' => 'ideais', 'class'=>'form-control', 'required'=>'true', 'rows'=>'5'], helper_check_value($objeto[0], 'ideais'), 6);

helper_form_text_area("Traços de Personalidade", ['name' => 'tracos_de_personalidade', 'class'=>'form-control', 'required'=>'true', 'rows'=>'5'], helper_check_value($objeto[0], 'tracos_de_personalidade'), 6);

helper_form_text_area("Vínculos", ['name' => 'vinculos', 'class'=>'form-control', 'required'=>'true', 'rows'=>'5'], helper_check_value($objeto[0], 'vinculos'), 6);

helper_form_text_area("Defeitos", ['name' => 'defeitos', 'class'=>'form-control', 'required'=>'true', 'rows'=>'5'], helper_check_value($objeto[0], 'defeitos'), 6);

helper_form_text_area("Perícias", ['name' => 'pericias', 'class'=>'form-control', 'required'=>'true', 'rows'=>'5'], helper_check_value($objeto[0], 'pericias'), 6);

helper_form_text_area("Outras Proficiências & Idiomas", ['name' => 'proficiencias_e_idiomas', 'class'=>'form-control', 'required'=>'true', 'rows'=>'5'], helper_check_value($objeto[0], 'proficiencias_e_idiomas'), 6);

helper_form_text_area("Equipamentos", ['name' => 'equipamentos', 'class'=>'form-control', 'required'=>'true', 'rows'=>'5'], helper_check_value($objeto[0], 'equipamentos'), 6);

helper_form_text_area("Características & Traços", ['name' => 'caracteristicas_tracos', 'class'=>'form-control', 'required'=>'true', 'rows'=>'5'], helper_check_value($objeto[0], 'caracteristicas_tracos'), 6);

helper_form_text_area("Proficiências e Idiomas", ['name' => 'proficiencias', 'class'=>'form-control', 'required'=>'true', 'rows'=>'5'], helper_check_value($objeto[0], 'proficiencias'), 6);

helper_form_text_area("Magias", ['name' => 'magias', 'class'=>'form-control', 'required'=>'true', 'rows'=>'5'], helper_check_value($objeto[0], 'magias'), 6);

helper_form_text_area("História", ['name' => 'historia', 'class'=>'form-control', 'required'=>'true', 'rows'=>'5'], helper_check_value($objeto[0], 'historia'), 6);