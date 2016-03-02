<?php
require_once '../../header.php';

if(isset($_GET['v'])):
	echo $_GET['v'];
endif;

global $parametros, $tag;
$form = new Form();
	
	$tag->body('role="document" onLoad="slide1()"');
		
		new Components('menu', $parametros);
		$tag->div('class="container"');
			$tag = new Tags();

			$form->_row();
				$form->_container();
					$user 		= new Usuarios();
					$armadura 	= new Armaduras('');
					$arma 		= new Armas('');
					$artefato 	= new Artefatos('');
					$personagem = new Personagens('');
					$talento 	= new Talentos('');
					$magia 		= new Magias('');
					$pericia 	= new Pericias('');
					$aventuras 	= new Aventuras();
					$historias 	= new Historias();
					$contos 	= new Contos();
					$cronicas 	= new Cronicas();
					$cenarios 	= new Cenarios();
					$bestiario 	= new Bestiario();
					
					$number_user 		= $user->select('usuarios');
					$number_armaduras 	= $armadura->select('armaduras');
					$number_armas 		= $arma->select('armas');
					$number_talentos 	= $talento->select('talentos');
					$number_magias 		= $magia->select('magias');
					$number_pericias 	= $pericia->select('pericias');
					$number_monstros	= $personagem->select('personagens', null, [["tipo","=","Monstro"]]);
					$number_jogador		= $personagem->select('personagens', null, [["tipo","=","Personagem jogador"]]);
					$number_npc			= $personagem->select('personagens', null, [["tipo","=","Personagem npc"]]);
					$number_artefatos 	= $artefato->select('artefatos');
					$number_aventuras 	= $aventuras->select('aventuras');
					$number_historias 	= $historias->select('historias');
					$number_contos 		= $contos->select('contos');
					$number_cronicas 	= $cronicas->select('cronicas');
					$number_cenarios 	= $cenarios->select('cenarios');
					$number_bestiario	= $bestiario->select('bestiario');
					
					$qtd_user 		= count($number_user);
					$qtd_armaduras 	= count($number_armaduras);
					$qtd_armas 		= count($number_armas);
					$qtd_artefatos 	= count($number_artefatos);
					$qtd_talentos 	= count($number_talentos);
					$qtd_magias 	= count($number_magias);
					$qtd_pericias 	= count($number_pericias);
					$qtd_jogador 	= count($number_jogador);
					$qtd_monstros 	= count($number_monstros);
					$qtd_npc 		= count($number_npc);
					$qtd_aventuras 	= count($number_aventuras);
					$qtd_historias 	= count($number_historias);
					$qtd_contos 	= count($number_contos);
					$qtd_cronicas 	= count($number_cronicas);
					$qtd_cenarios 	= count($number_cenarios);
					$qtd_bestiario 	= count($number_bestiario);
					
					$qtd_total_itens = ($qtd_armaduras+$qtd_armas+$qtd_artefatos);
					
					$img_title = [
									['jogadores.jpg',USUARIOS_CADASTRADOS, $qtd_user],
									['monstros.jpg',MONSTROS_CADASTRADOS, $qtd_monstros],
									['bestiario.jpg',BESTIARIO_CADASTRADOS, $qtd_bestiario],
									['armas.jpg',ITENS_CADASTRADOS, $qtd_total_itens]
								];
					
					//Lista fictiia de categorias
					$categorias = [
									[FICHA_DE_PERSONAGEM, $qtd_jogador, ROOTPATHURL.PERSONAGEMPATH.VIEW_BY_ID.helper_check_id(ID,$number_jogador)],
									//[FICHA_DE_NPC, $qtd_npc, ROOTPATHURL.PERSONAGEMPATH.VIEW_BY_ID.'1'],
									[FICHA_DE_MONSTRO, $qtd_monstros, ROOTPATHURL.MONSTROPATH.VIEW_BY_ID.helper_check_id(ID,$number_monstros)],
									[ARMAS, $qtd_armas, ROOTPATHURL.ARMASPATH.VIEW_BY_ID.helper_check_id(ID,$number_armas)],
									[ARMADURAS, $qtd_armaduras, ROOTPATHURL.ARMADURASPATH.VIEW_BY_ID.helper_check_id(ID,$number_armaduras)],
									[ARTEFATOS, $qtd_artefatos, ROOTPATHURL.ARTEFATOSPATH.VIEW_BY_ID.helper_check_id(ID,$number_artefatos)],
									[TALENTOS, $qtd_talentos, ROOTPATHURL.TALENTOSPATH.VIEW_BY_ID.helper_check_id(ID,$number_talentos)],
									[MAGIAS, $qtd_magias, ROOTPATHURL.MAGIASPATH.VIEW_BY_ID.helper_check_id(ID,$number_magias)],
									[PERICIAS, $qtd_pericias, ROOTPATHURL.PERICIASPATH.VIEW_BY_ID.helper_check_id(ID,$number_pericias)],
									[FICHA_ALEATORIA, CONTADOR_MAIS_CEM, ROOTPATHURL.NPCGENERATEPATH],
									[MONSTRO_ALEATORIO, CONTADOR_MAIS_CEM, ROOTPATHURL.MONSTERGENERATEPATH],
									[AVENTURAS, $qtd_aventuras, ROOTPATHURL.AVENTURASPATH.VIEW_BY_ID.helper_check_id(ID,$number_aventuras)],
									[HISTORIAS, $qtd_historias, ROOTPATHURL.HISTORIASPATH.VIEW_BY_ID.helper_check_id(ID,$number_historias)],
									[CONTOS, $qtd_contos, ROOTPATHURL.CONTOSPATH.VIEW_BY_ID.helper_check_id(ID,$number_contos)],
									[CRONICAS, $qtd_cronicas, ROOTPATHURL.CRONICASPATH.VIEW_BY_ID.helper_check_id(ID,$number_cronicas)],
									[CENARIOS, $qtd_cenarios, ROOTPATHURL.CENARIOSPATH.VIEW_BY_ID.helper_check_id(ID,$number_cenarios)],
									[ROLAR_DADOS, 1, ROLLDICE],
									[GERADOR_DE_MUNDOS, CONTADOR_MAIS_CEM, MAPWORDPATH],
									[GERADOR_DE_FICHAS_BASE, CONTADOR_MAIS_CEM, FICHASBASEGENERATION],
									[GERADOR_DE_CARACTERISTICAS, CONTADOR_MAIS_CEM, CARACTERISTICASGENERATION],
									[GERADOR_DE_NOMES, CONTADOR_MAIS_CEM, NAMEGENERATION],
									[BESTIARIO, $qtd_bestiario, ROOTPATHURL.BESTIARIOPATH.VIEW_BY_ID.helper_check_id(ID,$number_bestiario)],
									[GERADOR_DE_AVENTURAS, CONTADOR_MAIS_CEM, ADVENTUREGENERATION]
								];
					
					$form->_col(12);
						helper_ads_cursos();
					$form->col_();
						
					$form->_container();
						$form->h2(MSG_BEM_VINDO_INDEX."<b> Help Rpg </b>", ['class'=>'titulo-index']);
						foreach($categorias as $key => $cat):
							$form->_col(3);
								$tag->a('href="'.$cat[2].'" class="btn btn-primary btn-index"');
									$tag->imprime($cat[0]);
									$tag->span('class="badge"');
										$tag->imprime("<i>{$cat[1]}</i>");
									$tag->span;
								$tag->a;
							$form->col_();
						endforeach;
					$form->container_();
						
					$form->_col(12);
						helper_adsense_01();
					$form->col_();
					
							
					for($i=0; $i<count($img_title); $i++):
						$form->_col(3);
							$tag->div('class="panel panel-default panel-index"');
								$tag->img('src="'.ROOTPATHURL.IMGPATH.$img_title[$i][0].'" alt="dados" class="img-circle img-responsive"');		
								$tag->h3();
									$tag->imprime("<i>{$img_title[$i][2]}</i>");
									$tag->br();
									$tag->small();
										$tag->imprime($img_title[$i][1]);
									$tag->small;
								$tag->h3;
							$tag->div;
						$form->col_();
					endfor;
					
					
					$tag->div('class="center"');
						$tag->b();
							$tag->imprime(MSG_TEXT_INDEX_01);
						$tag->b;
						helper_pague_seguro_form();
					$tag->div;
					
					$form->_col(12);
						helper_adsense_02();
					$form->col_();
					
				$form->container_();	
			$form->row_();

			$form->hr();
		$tag->div;
		
	require_once '../../footer.php';
