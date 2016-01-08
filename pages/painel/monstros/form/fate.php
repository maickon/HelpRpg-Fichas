<?php	
global $s;
$current_user = $s->get_session('nome');
$form->input(['name' => 'dono', 'type' => 'hidden', 'value'=> $current_user]);
$form->input(['name' => 'sistema', 'type' => 'hidden', 'value'=> 'FATE']);
$form->input(['name' => 'tipo', 'type' => 'hidden', 'value'=> 'Monstro']);


function helper_form_merge_select_fate($array_a_ser_mesclado){
	$opcoes_valores_atributos = ['-2','-1','0','1','2','3','4','5','6','7','8'];
	
	if(isset($array_a_ser_mesclado)):
		$novo_array = array_merge($array_a_ser_mesclado, $opcoes_valores_atributos);
		return $novo_array;
	else:
		return $opcoes_valores_atributos;
	endif;
}

helper_form_select_options("Cuidadoso", ['name' => 'cuidadoso', 'class'=>'form-control'], helper_form_merge_select_fate([helper_check_value($objeto[0],'cuidadoso')]) , 2);

helper_form_select_options("Inteligente", ['name' => 'inteligente','class'=>'form-control'], helper_form_merge_select_fate([helper_check_value($objeto[0],'inteligente')]), 2);

helper_form_select_options("Chamativo", ['name' => 'chamativo','class'=>'form-control'], helper_form_merge_select_fate([helper_check_value($objeto[0],'chamativo')]), 2);

helper_form_select_options("Forte", ['name' => 'forte','class'=>'form-control'], helper_form_merge_select_fate([helper_check_value($objeto[0],'forte')]), 2);

helper_form_select_options("Rápido", ['name' => 'rapido','class'=>'form-control'], helper_form_merge_select_fate([helper_check_value($objeto[0],'rapido')]), 2);

helper_form_select_options("Sorrateiro", ['name' => 'sorrateiro','class'=>'form-control'], helper_form_merge_select_fate([helper_check_value($objeto[0],'sorrateiro')]), 2);


$atributos = [
				['Conceito Chave','conceito_chave',12],
				['Complicação','complicacao',12],
				['Outros Aspectos','outros_aspectos',12],
				['Consequências','consequencias',12],
				['Nome','nome',3],
				['Classe','classe',3],
				['Raça','raca',3],
				['Refresh','refresh',2],
				['Level','lv',1]
			];

for($i=0; $i<=count($atributos)-1; $i++):
	$form->_col($atributos[$i][2]);
		$form->label($atributos[$i][0]);
		$form->input(['name' => $atributos[$i][1], 'type' => 'text', 'class'=>'form-control', 'required' => 'true' , 'value'=> helper_check_value($objeto[0], $atributos[$i][1])]);
	$form->col_();
endfor;

helper_form_input("Imagem", ['name' => 'img', 'type' => 'file', 'class'=>'form-control'], 7);

helper_form_text("Stress", 2);

helper_check_checkbox_edit('stress1', $objeto[0]);
helper_check_checkbox_edit('stress2', $objeto[0]);
helper_check_checkbox_edit('stress3', $objeto[0]);

helper_form_text_area("Descrição", ['name' => 'descricao', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'descricao'), 6);

helper_form_text_area("Proezas", ['name' => 'proezas', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'proezas'), 6);
	