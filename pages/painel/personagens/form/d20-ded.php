<?php	
$form->_row();
	$form->_container();	
		$form->_form(['method'=>'post', 'name'=>'new-user', 'enctype'=>'multipart/form-data', 'class'=>'form-group', 'data-toggle'=>'validator']);
			global $s;
			$current_user = $s->get_session('nome');
			$form->input(['name' => 'dono', 'type' => 'hidden', 'value'=> $current_user]);
			$form->input(['name' => 'sistema', 'type' => 'hidden', 'value'=> 'Dungeons and Dragons']);
			$form->input(['name' => 'tipo', 'type' => 'hidden', 'value'=> 'Personagem jogador']);
			
			$atributos = [
							['Força','forca'],['Destreza','destreza'],['Constituição','constituicao'],
							['Inteligência','inteligencia'],['Sabedoria','sabedoria'],['Carisma','carisma']
						];
			for($i=0; $i<=count($atributos)-1; $i++):
				$form->_col(2);
					$form->label($atributos[$i][0]);
					$form->input(['name' => $atributos[$i][1], 'type' => 'text', 'class'=>'form-control'/*, 'required'=>'false'*/]);
				$form->col_();
			endfor;
			
			$caracteristicas = [
									['Nome','nome'],['Nível','lv'],['Classe','classe'],['Raça','raca'],
									['Tendencia','tendencia'],['Idade','idade'],['Peso','peso'],['Altura','altura']
							   ];
			
			for($i=0; $i<=count($caracteristicas)-1; $i++):
				$form->_col(3);
					$form->label($caracteristicas[$i][0]);
					if(!isset($caracteristicas[$i][2])):
						$required = 'false';
					else:
						$required = 'false';
					endif;
					$form->input(['name' => $caracteristicas[$i][1], 'type' => 'text', 'class'=>'form-control'/*, 'required'=>$required*/]);
				$form->col_();
			endfor;
			
			$atributos_secundarios = [
										['Pontos de vida','pv'],['Classe armadura','ca'],['Deslocamento','deslocamento'],['Tamanho','tamanho'],
										['Iniciativa','iniciativa'],['Bônus base de ataque','bba'],['Pontos de Experiência','xp','false'],
										['Dado de vida','dado_vida']
							   		];
			for($i=0; $i<=count($atributos_secundarios)-1; $i++):
				$form->_col(3);
					if(!isset($caracteristicas[$i][2])):
						$required = 'false';
					else:
						$required = 'false';
					endif;
					$form->label($atributos_secundarios[$i][0]);
					$form->input(['name' => $atributos_secundarios[$i][1], 'type' => 'text', 'class'=>'form-control'/*, 'required'=>$required*/]);
				$form->col_();
			endfor;
			
			$testes_resistencia = [
										['Fortitude','for'],['Vontade','vont'],['Reflexos','refl']
							   	  ];
			for($i=0; $i<=count($testes_resistencia)-1; $i++):
				$form->_col(3);
					$form->label($testes_resistencia[$i][0]);
					$form->input(['name' => $testes_resistencia[$i][1], 'type' => 'text', 'class'=>'form-control'/*, 'required'=>'false'*/]);
				$form->col_();
			endfor;
			
			helper_form_input("Imagem", ['name' => 'img', 'type' => 'file', 'class'=>'form-control'], 3);

			helper_form_text_area("Ataque Total", ['name' => 'ataque', 'class'=>'form-control', 'rows'=>'5'], '', 6);

			helper_form_text_area("Talentos", ['name' => 'talentos', 'class'=>'form-control', 'rows'=>'5'], '', 6);

			helper_form_text_area("Perícias", ['name' => 'pericias', 'class'=>'form-control', 'rows'=>'5'], '', 6);

			helper_form_text_area("Magias", ['name' => 'magias', 'class'=>'form-control', 'rows'=>'5'], '', 6);

			helper_form_text_area("História", ['name' => 'descricao', 'class'=>'form-control', 'rows'=>'5'], '', 6);

			helper_form_text_area("Equipamentos", ['name' => 'equipamentos', 'class'=>'form-control', 'rows'=>'5'], '', 6);

			helper_form_text_area("Habilidades especiais", ['name' => 'habilidades_especiais', 'class'=>'form-control', 'rows'=>'5'], '', 6);

			helper_form_text_area("Outros", ['name' => 'outros', 'class'=>'form-control', 'rows'=>'5'], '', 6);

			helper_form_button_submit_and_back(ROOTPATHURL.TALENTOSPATH);
	
		$form->form_();
		
	$form->_container();
$form->row_();