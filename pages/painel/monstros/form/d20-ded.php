<?php	
global $s;
$current_user = $s->get_session('nome');
$form->input(['name' => 'dono', 'type' => 'hidden', 'value'=> $current_user]);
$form->input(['name' => 'sistema', 'type' => 'hidden', 'value'=> 'Dungeons and Dragons 3.5']);
$form->input(['name' => 'tipo', 'type' => 'hidden', 'value'=> 'Monstro']);

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
						['Nome','nome'],
						['Raça','raca'],
						['Tamanho','tamanho'],
						['Dado de Vida','dv'],
						['Pontos de Vida','pv'],
						['Iniciativa','iniciativa'],
						['Deslocamento','deslocamento'],
						['CA','ca'],
						['Ataque Base/Agarrar','ataq_agarrar'],
						['Ataque','ataque'],
						['Ataque Total','ataque_total'],
						['Espaço/Alcance','espaco_alcance'],
						['Ataques Especiais','ataques_especiais'],
						['Qualidades Especiais','qualidades_especiais'],
						['Testes de Resistência','testes_resistencia'],
						['Ambiente','ambiente'],
						['Organização','organizacao'],
						['Nível','lv'],
						['Tendencia','tendencia'],
						['Progressão','progressao'],
						['Ajuste de Nível','ajuste'],
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

helper_form_input("Imagem", ['name' => 'img', 'type' => 'file', 'class'=>'form-control'], 9);

helper_form_text_area("Talentos", ['name' => 'talentos', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'talentos'), 6);

helper_form_text_area("Perícias", ['name' => 'pericias', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'pericias'), 6);

helper_form_text_area("Descrição", ['name' => 'descricao', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'descricao'), 6);

helper_form_text_area("Combate", ['name' => 'combate', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'combate'), 6);

helper_form_text_area("Tesouro", ['name' => 'tesouro', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'tesouro'), 12);