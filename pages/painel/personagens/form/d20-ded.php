<?php	
global $s;
$current_user = $s->get_session('nome');
$form->input(['name' => 'dono', 'type' => 'hidden', 'value'=> $current_user]);
$form->input(['name' => 'sistema', 'type' => 'hidden', 'value'=> 'Dungeons and Dragons 3.5']);
$form->input(['name' => 'tipo', 'type' => 'hidden', 'value'=> 'Personagem jogador']);

$atributos = [
				[FORCA,'forca'],[DES,'destreza'],[CON,'constituicao'],
				[INTELIGENCIA,'inteligencia'],[SAB,'sabedoria'],[CAR,'carisma']
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

$caracteristicas = [
						[NOME,'nome'],[NIVEL,'lv'],[CLASSE,'classe'],[RACA,'raca'],
						[TENDENCIA,'tendencia'],[IDADE,'idade'],[PESO,'peso'],[ALTURA,'altura']
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

$atributos_secundarios = [
							[PONTOS_DE_VIDA,'pv'],[CLASSE_ARMADURA,'ca'],[DESL,'deslocamento'],[TAMANHO,'tamanho'],
							[INICIATIVA,'iniciativa'],[BONUS_DE_ATAQUE,'bba'],[PONTOS_DE_EXPERIENCIA,'xp','false'],
							[DADO_VIDA,'dado_vida']
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

$testes_resistencia = [
							['Fortitude','for'],['Vontade','vont'],['Reflexos','refl']
				   	  ];
for($i=0; $i<=count($testes_resistencia)-1; $i++):
	$form->_col(3);
		$form->label($testes_resistencia[$i][0]);
		$form->input(['name' => $testes_resistencia[$i][1], 'type' => 'text', 'class'=>'form-control', 'required'=>'true', 'value'=> helper_check_value($objeto[0], $testes_resistencia[$i][1])]);
	$form->col_();
endfor;

helper_form_input(IMAGEM, ['name' => 'img', 'type' => 'file', 'class'=>'form-control'], 3);

helper_form_text_area(ATAQUE_TOTAL, ['name' => 'ataque', 'class'=>'form-control' , 'required'=>'true', 'rows'=>'5'], helper_check_value($objeto[0], 'ataque'), 6);

helper_form_text_area(TALENTOS, ['name' => 'talentos', 'class'=>'form-control', 'required'=>'true' , 'rows'=>'5'], helper_check_value($objeto[0], 'talentos'), 6);

helper_form_text_area(PERICIAS, ['name' => 'pericias', 'class'=>'form-control', 'required'=>'true' , 'rows'=>'5'], helper_check_value($objeto[0], 'pericias'), 6);

helper_form_text_area(MAGIAS, ['name' => 'magias', 'class'=>'form-control', 'required'=>'true' , 'rows'=>'5'], helper_check_value($objeto[0], 'magias'), 6);

helper_form_text_area(HISTORIAS, ['name' => 'descricao', 'class'=>'form-control', 'required'=>'true' , 'rows'=>'5'], helper_check_value($objeto[0], 'descricao'), 6);

helper_form_text_area(EQUIPAMENTOS, ['name' => 'equipamentos', 'class'=>'form-control', 'required'=>'true' , 'rows'=>'5'], helper_check_value($objeto[0], 'equipamentos'), 6);

helper_form_text_area(HABILIDADES_ESPECIAIS, ['name' => 'habilidades_especiais', 'class'=>'form-control', 'required'=>'true' , 'rows'=>'5'], helper_check_value($objeto[0], 'habilidades_especiais'), 6);

helper_form_text_area(OUTROS, ['name' => 'outros', 'class'=>'form-control' , 'required'=>'true', 'rows'=>'5'], helper_check_value($objeto[0], 'outros'), 6);