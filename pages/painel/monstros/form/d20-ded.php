<?php	
global $s;
$current_user = $s->get_session('nome');
$form->input(['name' => 'dono', 'type' => 'hidden', 'value'=> $current_user]);
$form->input(['name' => 'sistema', 'type' => 'hidden', 'value'=> 'Dungeons and Dragons 3.5']);
$form->input(['name' => 'tipo', 'type' => 'hidden', 'value'=> 'Monstro']);

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
						[NOME,'nome'],
						[RACA,'raca'],
						[TAMANHO,'tamanho'],
						[DADO_VIDA,'dv'],
						[PONTOS_DE_VIDA,'pv'],
						[INICIATIVA,'iniciativa'],
						[DESL,'deslocamento'],
						[CA,'ca'],
						[ATAQUE_AGARRA,'ataq_agarrar'],
						[ATAQUE,'ataque'],
						[ATAQUE_TOTAL,'ataque_total'],
						[ESPACO_ALCANCE,'espaco_alcance'],
						[ATAQUES_ESPECIAIS,'ataques_especiais'],
						[QUALIDADES_ESPECIAIS,'qualidades_especiais'],
						[TESTES_RESISTENCIA,'testes_resistencia'],
						[AMBIENTE,'ambiente'],
						[ORGANIZACAO,'organizacao'],
						[NIVEL,'lv'],
						[TENDENCIA,'tendencia'],
						[PROGRESSAO,'progressao'],
						[AJUSTE,'ajuste'],
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

helper_form_input(IMAGEM, ['name' => 'img', 'type' => 'file', 'class'=>'form-control'], 9);

helper_form_text_area(TALENTOS, ['name' => 'talentos', 'class'=>'form-control', 'required'=>'true', 'rows'=>'5'], helper_check_value($objeto[0], 'talentos'), 6);

helper_form_text_area(PERICIAS, ['name' => 'pericias', 'class'=>'form-control', 'required'=>'true', 'rows'=>'5'], helper_check_value($objeto[0], 'pericias'), 6);

helper_form_text_area(DESCRICAO, ['name' => 'descricao', 'class'=>'form-control', 'required'=>'true', 'rows'=>'5'], helper_check_value($objeto[0], 'descricao'), 6);

helper_form_text_area(COMBATE, ['name' => 'combate', 'class'=>'form-control', 'required'=>'true', 'rows'=>'5'], helper_check_value($objeto[0], 'combate'), 6);

helper_form_text_area(TESOURO, ['name' => 'tesouro', 'class'=>'form-control', 'required'=>'true', 'rows'=>'5'], helper_check_value($objeto[0], 'tesouro'), 12);