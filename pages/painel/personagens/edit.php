<?php
require_once '../../../header.php';
require_once '../helper.php';

global $tag, $form, $s, $parametros;

$s->restricted_access();

$show_personagem = new Personagens(ROOTPATH.PERSONAGEMIMGPATH);
$objeto = $show_personagem->select($show_personagem->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);
$unserialize_personagem = unserialize($objeto[0]['dados']);

$pass = helper_check_permitions($objeto[0]['dono']);

if($pass != 1)
	header("Location: ".ROOTPATHURL.PERSONAGEMPATH);	

$tag->body('role="document"');

new Components('menu', $parametros);
$tag->br();
$tag->br();
	$form->_container();
		
		$old_file = $objeto[0]['img'];
		$_REQUEST['old_file'] = $old_file;
		
		if(isset($_REQUEST['action'])):
			$form->_col(12);
				$create_personagem = new Personagens(ROOTPATH.PERSONAGEMIMGPATH);
				
				if(empty($_FILES['img']['name'])):
					$_REQUEST['img'] = '';
				else:
					$_REQUEST['img'] = $_FILES['img'];
				endif;
				$create_personagem->update_data(helper_params_personagem($_REQUEST));
			$form->col_();
		endif;
		
		$form->_col(10);
			$tag->span('class="span_title"');
				$tag->imprime(PERSONAGEM);
			$tag->span;
		$form->col_();
		$form->_col(1);
			$tag->a('href="'.ROOTPATHURL.PERSONAGEMPATH.'view.php?id='.$_GET['id'].'" class="btn btn-success"');
				$tag->imprime(VER);
			$tag->a;
		$form->col_();
		$form->_col(1);
			$tag->a('href="'.ROOTPATHURL.PERSONAGEMPATH.'" class="btn btn-info"');
				$tag->imprime(BACK);
			$tag->a;
		$form->col_();
		$tag->br();
		$tag->hr();
	$form->container_();
	
	$form->_row();
		$form->_container();	
			$form->_form(['method'=>'post', 'name'=>'new-user', 'enctype'=>'multipart/form-data', 'class'=>'form-group', 'data-toggle'=>'validator']);
			
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
						$form->input(['name' => $atributos[$i][1], 'type' => 'text', 'class'=>'form-control', 'value'=> $unserialize_personagem[$atributos[$i][1]]]);
					$form->col_();
				endfor;
				
				$caracteristicas = [
										['Nome','nome'],['Nível','lv'],['Classe','classe'],['Raça','raca']
								   ];
					
				for($i=0; $i<=count($caracteristicas)-1; $i++):
					$form->_col(3);
						$form->label($caracteristicas[$i][0]);
						$form->input(['name' => $caracteristicas[$i][1], 'type' => 'text', 'class'=>'form-control', 'value'=> $objeto[0][$caracteristicas[$i][1]]]);
					$form->col_();
				endfor;
				
				$caracteristicas_part_2 = [
												['Tendencia','tendencia'],['Idade','idade'],['Peso','peso'],['Altura','altura']
										   ];
				for($i=0; $i<=count($caracteristicas_part_2)-1; $i++):
					$form->_col(3);
						$form->label($caracteristicas_part_2[$i][0]);
						$position = $caracteristicas_part_2[$i][1];
						$form->input(['name' => $caracteristicas_part_2[$i][1], 'type' => 'text', 'class'=>'form-control', 'value'=> $unserialize_personagem[$position] ]);
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
						$position = $atributos_secundarios[$i][1];
						$form->input(['name' => $atributos_secundarios[$i][1], 'type' => 'text', 'class'=>'form-control', 'value'=> $unserialize_personagem[$position]]);
					$form->col_();
				endfor;
				
				$testes_resistencia = [
										['Fortitude','for'],['Vontade','vont'],['Reflexos','refl']
							   	  ];
				for($i=0; $i<=count($testes_resistencia)-1; $i++):
					$form->_col(3);
						$form->label($testes_resistencia[$i][0]);
						$position = $testes_resistencia[$i][1];
						$form->input(['name' => $testes_resistencia[$i][1], 'type' => 'text', 'class'=>'form-control', 'value'=> $unserialize_personagem[$position]]);
					$form->col_();
				endfor;
				
				$form->_col(3);
					$form->label("Imagem");
					$form->input(['name' => 'img', 'type' => 'file', 'class'=>'form-control']);
				$form->col_();
			
				$form->_col(6);
					$form->label("Ataque Total");
					$form->area(['name' => 'ataque', 'class'=>'form-control', 'rows'=>'5'], $unserialize_personagem['ataque']);
				$form->col_();
				
				$form->_col(6);
					$form->label("Talentos");
					$form->area(['name' => 'talentos', 'class'=>'form-control', 'rows'=>'5'], $unserialize_personagem['talentos']);
				$form->col_();
				
				$form->_col(6);
					$form->label("Perícias");
					$form->area(['name' => 'pericias', 'class'=>'form-control', 'rows'=>'5'], $unserialize_personagem['pericias']);
				$form->col_();
				
				$form->_col(6);
					$form->label("Magias");
					$form->area(['name' => 'magias', 'class'=>'form-control', 'rows'=>'5'], $unserialize_personagem['magias']);
				$form->col_();
				
				$form->_col(6);
					$form->label("História");
					$form->area(['name' => 'descricao', 'class'=>'form-control', 'rows'=>'5'], $unserialize_personagem['descricao']);
				$form->col_();
				
				$form->_col(6);
					$form->label("Equipamentos");
					$form->area(['name' => 'equipamentos', 'class'=>'form-control', 'rows'=>'5'], $unserialize_personagem['equipamentos']);
				$form->col_();
					
				$form->_col(6);
					$form->label("Habilidades especiais");
					$form->area(['name' => 'habilidades_especiais', 'class'=>'form-control', 'rows'=>'5'], $unserialize_personagem['habilidades_especiais']);
				$form->col_();
				
				$form->_col(6);
					$form->label("Outros");
					$form->area(['name' => 'outros', 'class'=>'form-control', 'rows'=>'5']);
				$form->col_();
				
				$form->_col(3);
					$form->br();
					$form->link_button("Voltar", ROOTPATHURL.TALENTOSPATH);
					echo "  ";
					$form->input_submit(['class'=>'btn btn-default', 'type'=>'submit', 'name'=>'action', 'value'=>'Atualizar']);
				$form->col_();
			$form->form_();
			
		$form->_container();
	$form->row_();

require_once '../../../footer.php';