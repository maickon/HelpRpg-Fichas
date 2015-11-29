<?php	
global $s;
$current_user = $s->get_session('nome');
$form->input(['name' => 'dono', 'type' => 'hidden', 'value'=> $current_user]);
$form->input(['name' => 'sistema', 'type' => 'hidden', 'value'=> 'Deamon']);
$form->input(['name' => 'tipo', 'type' => 'hidden', 'value'=> 'Personagem jogador']);

$atributos = [
				['Constituição','constituicao'],['Força','forca'],['Destreza','destreza'],
				['Agilidade','agilidade'],['Inteligência','inteligencia'],
				['Percepção','percepcao'],['Carisma','carisma'],['Força de Vontade','will'],
				['Pontos de vida','pv'],['Índice de proteção','ip'],['Pontos Heróicos','ph'],['Pontos de magia','pm'],
				['Pontos de fé','pf'],['Nível','lv']
			];
for($i=0; $i<=count($atributos)-1; $i++):
	$col = 2;
	$form->_col($col);
		$form->label($atributos[$i][0]);
		$form->input(['name' => $atributos[$i][1], 'type' => 'number', "pattern" => "[0-9]+$", 'class'=>'form-control', 'required'=>'required', 'value'=> helper_check_value($objeto[0], $atributos[$i][1])]);
	$form->col_();
endfor;

helper_new_line_in_form();

$caracteristicas = [
						['Nome','nome'],['Data de nascimento', 'data_nascimento'],['Local de nascimento', 'local_nascimento'],
						['Sexo','sexo'],['Altura','altura'],['Peso','peso'],['Classe Social/Profissão','profissao'],
						['Idade aparente','idade_aparente'],['Idade real','idade_real'],['Armadura','armadura'],
						['Idiomas','idiomas'],['Religião','religiao'],['Classe','classe'],['Raça','raca']
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

helper_form_input("Imagem", ['name' => 'img', 'type' => 'file', 'class'=>'form-control'], 6);

helper_form_text_area("Perícias com armas", ['name' => 'pericias_com_armas', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'pericias_com_armas'), 6);

helper_form_text_area("Aprimoramentos", ['name' => 'aprimoramentos', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'aprimoramentos'), 6);

helper_form_text_area("Perícias", ['name' => 'pericias', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'pericias'), 6);

helper_form_text_area("Poderes", ['name' => 'poderes', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'poderes'), 6);

helper_form_text_area("Magias", ['name' => 'magias', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'magias'), 6);

helper_form_text_area("Outros", ['name' => 'outros', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'outros'), 6);