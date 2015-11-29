<?php	
global $s;
$current_user = $s->get_session('nome');
$form->input(['name' => 'dono', 'type' => 'hidden', 'value'=> $current_user]);
$form->input(['name' => 'sistema', 'type' => 'hidden', 'value'=> 'Dungeons and Dragons 4.0']);
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

$caracteristicas = [
						['Nome','nome'], ['Raça','raca'], ['Classe','classe'], ['Caminho exemplar','caminho_exemplar'],
						['Destino épico','destino_epico'], ['Tendencia','tendencia'], ['Nível','lv'], 
						['Idade','idade'], ['Altura','altura'], ['Peso','peso'], ['Divindade','divindade'], ['Sexo','sexo'],
						['Região de origem','regiao_origem'], ['Idiomas','idiomas']
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
							['Iniciativa','iniciativa'], ['Deslocamento','deslocamento'], ['Intuição passiva','intuicao_passiva'],
							['Percepção passiva','percepcao_passiva'],
							['Pontos de vida','pv'], ['Sangrando','sangrando'], ['Pulso de cura','cura'], ['Pulsos','dia'], ['Pontos de ação','pts_acao'],
							['Classe de armadura','ca'], ['Fortitude','fort'], ['Reflexos','refl'], ['Vontade','vont'],
							['Bônus de ataque','ataque'], ['Bônus de dano','dano'], ['Pontos de experiência','xp']
				   		];
for($i=0; $i<=count($atributos_secundarios)-1; $i++):
	$form->_col(2);
		if(!isset($caracteristicas[$i][2])):
			$required = 'false';
		else:
			$required = 'false';
		endif;
		$form->label($atributos_secundarios[$i][0]);
		$form->input(['name' => $atributos_secundarios[$i][1], 'type' => 'text', 'class'=>'form-control', 'value'=> helper_check_value($objeto[0], $atributos_secundarios[$i][1])]);
	$form->col_();
endfor;


helper_form_input("Imagem", ['name' => 'img', 'type' => 'file', 'class'=>'form-control'], 10);

helper_form_text_area("Ataques básicos", ['name' => 'ataque', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'ataque'), 6);

helper_form_text_area("Aspectos raciais", ['name' => 'aspectos_raciais', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'aspectos_raciais'), 6);

helper_form_text_area("Características de classe/trilha/destino", ['name' => 'caracteristicas', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'caracteristicas'), 6);

helper_form_text_area("Talentos", ['name' => 'talentos', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'talentos'), 6);

helper_form_text_area("Perícias", ['name' => 'pericias', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'pericias'), 6);

helper_form_text_area("Poderes", ['name' => 'poderes', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'poderes'), 6);

helper_form_text_area("Itens e equipamentos", ['name' => 'equipamentos', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'equipamentos'), 6);

helper_form_text_area("Habilidades especiais", ['name' => 'habilidades_especiais', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'habilidades_especiais'), 6);

helper_form_text_area("Costumes e aparência", ['name' => 'costumes', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'costumes'), 6);

helper_form_text_area("Traços e personalidades", ['name' => 'tracos', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'tracos'), 6);

helper_form_text_area("Antecedentes", ['name' => 'antecedentes', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'antecedentes'), 6);

helper_form_text_area("Outros", ['name' => 'outros', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'outros'), 6);