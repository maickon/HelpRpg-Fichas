<?php	
global $s;
$current_user = $s->get_session('nome');
$form->input(['name' => 'dono', 'type' => 'hidden', 'value'=> $current_user]);
$form->input(['name' => 'sistema', 'type' => 'hidden', 'value'=> 'FATE']);
$form->input(['name' => 'tipo', 'type' => 'hidden', 'value'=> 'Personagem jogador']);

$atributos = [
				['Cuidadoso','cuidadoso'],['Inteligente','inteligente'],['Chamativo','chamativo'],
				['Forte','forte'],['Rápido','rapido'], ['Sorrateiro','sorrateiro']
			];
for($i=0; $i<=count($atributos)-1; $i++):
	$form->_col(2);
		$form->label($atributos[$i][0]);
		$form->input(['name' => $atributos[$i][1], 'type' => 'number', "pattern" => "[0-9]+$", 'class'=>'form-control', 'required'=>'required', 'value'=> helper_check_value($objeto[0], $atributos[$i][1])]);
	$form->col_();
endfor;

helper_new_line_in_form();

$caracteristicas = [
						['Nome','nome'],['Conceito chave','aspecto_chave'],['Complicação','aspecto_complicacao'],
						['Refresh','refresh'],['Pontos de Fate atuais','fate'],['Stress 1','stress1'],
						['Stress 2','stress2'],['Stress 3','stress3'],['Consequência leve','consequencia_leve'],
						['Consequência moderada','consequencia_moderada'],['Consequência severa','consequencia_severa']
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

helper_form_input("Imagem", ['name' => 'img', 'type' => 'file', 'class'=>'form-control'], 3);

helper_form_text_area("Descrição", ['name' => 'descricao', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'descricao'), 6);

helper_form_text_area("Proezas", ['name' => 'proezas', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'proezas'), 6);

helper_form_text_area("Outros aspectos", ['name' => 'aspectos', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'aspectos'), 6);

helper_form_text_area("Outros", ['name' => 'outros', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'outros'), 6);
	
		