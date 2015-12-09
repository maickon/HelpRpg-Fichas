<?php	
global $s;
$current_user = $s->get_session('nome');
$form->input(['name' => 'dono', 'type' => 'hidden', 'value'=> $current_user]);
$form->input(['name' => 'sistema', 'type' => 'hidden', 'value'=> 'Dungeons and Dragons 5.0']);
$form->input(['name' => 'tipo', 'type' => 'hidden', 'value'=> 'Personagem jogador']);

$atributos = [
				['Força','forca'],['Destreza','destreza'],['Constituição','constituicao'],
				['Inteligência','inteligencia'],['Sabedoria','sabedoria'],['Carisma','carisma']
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
		$form->input(['name' => $atributos[$i][1], 'type' => 'text', 'class'=>'form-control', 'required'=>'false', 'value'=> helper_check_value($objeto[0], $atributos[$i][1])]);
	$form->col_();
endfor;

$atributos_secundarios = [
						['Força - Jogada de proteção','forca_protecao'], ['Força - Atletismo','forca_atletismo'], 
						
						['Destreza - Jogada de proteção','destreza_protecao'], ['Destreza - Acrobáticos','destreza_acrobaticos'], 
						['Destreza - Furtividade','destreza_furtividade'], ['Destreza - Punga','destreza_punga'],
						
						['Constituição - Jogada de proteção', 'constituicao_protecao'],
						
						['Inteligência - Jogada de proteção','inteligencia_protecao'], ['Inteligência - Arcana','inteligencia_arcana'],
						['Inteligência - História','inteligencia_historia'], ['Inteligência - Investigação','inteligencia_investigacao'],
						['Inteligência - Natureza','inteligencia_natureza'], ['Inteligência - Religião','inteligencia_religiao'],
						
						['Sabedoria - Jogada de proteção','sabedoria_protecao'], ['Sabedoria - Adestrar animais','sabedoria_adestrar_animais'],
						['Sabedoria - Intuição','sabedoria_intuicao'], ['Sabedoria - Medicina','sabedoria_medicina'],
						['Sabedoria - Percepção','sabedoria_percepcao'], ['Sabedoria - Sobrevivência','sabedoria_sobrevivencia'],
						
						['Carisma - Jogada de proteção','sabedoria_protecao'], ['Carisma - Atuação','carisma_atuacao'],
						['Carisma - Enganação','carisma_enganacao'], ['Carisma - Intimidação','carisma_intimidacao'],
						['Carisma - Persuasão','carisma_persuasao'],
						
						['Sabedoria passiva (Percepção)', 'sabedoria_percepcao'],

						['Nome','nome'], ['Raça','raca'], ['Classe','classe'],
						['Nível','lv'], ['Pontos de experiência','xp'], 
						['Altura','altura'], ['Peso','peso'], ['Divindade','divindade'], 
						['Idade','idade'],['Sexo','sexo'],
	
						['Classe armadura','ca'], ['Bônus de proficiência','proficiencia'], ['Inspiração','inspiração'],
						['Pvs atuais','pvs_atuais'],  
						
						['Dado de vida','dado_vida'], ['Iniciativa','iniciativa'], ['Velocidade','velocidade'],
						['Visão','visao']
				   	];
for($i=0; $i<=count($atributos_secundarios)-1; $i++):
	$form->_col(3);
		if(!isset($caracteristicas[$i][2])):
			$required = 'false';
		else:
			$required = 'false';
		endif;
		$form->label($atributos_secundarios[$i][0]);
		$form->input(['name' => $atributos_secundarios[$i][1], 'type' => 'text', 'class'=>'form-control', 'value'=> helper_check_value($objeto[0], $atributos_secundarios[$i][1])]);
	$form->col_();
endfor;


helper_form_input("Imagem", ['name' => 'img', 'type' => 'file', 'class'=>'form-control'], 3);

helper_form_text_area("Ataques (Corporais/Distância/Mágicos)", ['name' => 'ataques', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'ataques'), 6);

helper_form_text_area("Equipamentos", ['name' => 'equipamentos', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'equipamentos'), 6);

helper_form_text_area("Características de classe e Raça", ['name' => 'caracteristicas', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'caracteristicas'), 6);

helper_form_text_area("Proficiências e Idiomas", ['name' => 'proficiencias', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'proficiencias'), 6);

helper_form_text_area("História", ['name' => 'historia', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'historia'), 6);

helper_form_text_area("Outros", ['name' => 'outros', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'outros'), 6);