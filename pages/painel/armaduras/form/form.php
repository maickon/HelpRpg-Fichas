<?php
helper_form_select_options("Tipo", ['class'=>'form-control', 'id' => 'tipo', 'name'=>'tipo'], ['simples'=>'Armadura simples', 'magica'=>'Armadura mágica']);

helper_form_input("Nome", ['name' => 'nome', 'id' => 'nome', 'type' => 'text', 'class'=>'form-control', 'required'=>'true']);

helper_form_input("Lv", ['name' => 'lv', 'id' => 'lv', 'type' => 'text', 'class'=>'form-control', 'required'=>'true']);

helper_form_input("Preço/Custo", ['name' => 'custo', 'id' => 'custo', 'type' => 'text', 'class'=>'form-control']);
	
helper_form_input("Bônus na CA/Defesa", ['name' => 'bonusNaCa', 'id' => 'bonusNaCa', 'type' => 'text', 'class'=>'form-control']);

helper_form_input("Destreza máxima", ['name' => 'destrezaMaxima', 'id' => 'destrezaMaxima', 'type' => 'text', 'class'=>'form-control']);

helper_form_input("Penalidade em perícia", ['name' => 'penalidadeNaPericia', 'id' => 'penalidadeNaPericia', 'type' => 'text', 'class'=>'form-control']);

helper_form_input("Falha de magia arcana", ['name' => 'falhaDeMagiaArcana', 'id' => 'falhaDeMagiaArcana', 'type' => 'text', 'class'=>'form-control']);

helper_form_input("Deslocamento médio", ['name' => 'deslocamentoMedio', 'id' => 'deslocamentoMedio', 'type' => 'text', 'class'=>'form-control']);

helper_form_input("Deslocamento pequeno", ['name' => 'deslocamentoPequeno','id' => 'deslocamentoPequeno', 'type' => 'text', 'class'=>'form-control']);

helper_form_input("Peso", ['name' => 'peso', 'id' => 'peso', 'type' => 'text', 'class'=>'form-control']);

helper_form_select_options("Categoria", ['class'=>'form-control', 'id' => 'categoria', 'name'=>'categoria'], ['leve'=>'Armadura leve', 'media'=>'Armadura Média', 'pesada'=>'Armadura Pesada', 'exotica'=>'Armadura Exótica', 'tecnologica'=>'Armadura Tecnológica']);

helper_form_text_field_descricao();