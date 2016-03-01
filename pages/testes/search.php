<?php
require_once '../../init.php';
require_once '../helper.php';
require_once 'menu.php';

$gmtDate = gmdate("D, d M Y H:i:s");
header("Expires:{$gmtDate} GMT");
header("Last-Modified:{$gmtDate} GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

global $tag, $form;

$tag->html('lang="pt-br"');
	$tag->head();
	
		$tag->meta('http-equiv="Content-Type" content="text/html;charset=utf-8"');
		$tag->meta('http-equiv="X-UA-Compatible" content="IE=edge"');
		$tag->meta('name="viewport" content="width=device-width, initial-scale=1"');
		//<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		$tag->meta('name="description" content="Help rpg - O maior repositório de fichas de RPG do Brasil."');
		$tag->meta('name="author" content="Maickon Rangel"');
		$tag->imprime('<link rel="shortcut icon" href="'.ROOTPATHURL.IMGPATH.'logo-icon.png" />');
		$tag->link('rel="icon" href="'.IMGPATH.'adm.png"');
		

		//Titulo do site
		$tag->title();
			$tag->imprime(PROJECTTITLE);
		$tag->title;

		//<!-- datatable css -->
		$tag->link('href="'.ROOTPATHURL.CSSPATH.'datatables.min.css" rel="stylesheet"');

		//<!-- Bootstrap core CSS -->
		$tag->link('href="'.ROOTPATHURL.CSSPATH.'bootstrap.min.css" rel="stylesheet"');
			
		//<!-- index core CSS -->
		$tag->link('href="'.ROOTPATHURL.CSSPATH.'index.css" rel="stylesheet"');
		$tag->link('href="'.TESTEPATH.CSSPATH.'index.css" rel="stylesheet"');
		//<!-- selec core CSS -->
		$tag->link('href="'.ROOTPATHURL.CSSPATH.'bootstrap-select.css" rel="stylesheet"');

		$tag->script('src="'.ROOTPATHURL.JSPATH.'jquery.min.js"');
		$tag->script;


		$tag->script('src="'.ROOTPATHURL.JSPATH.'datatables.min.js"');
		$tag->script;

		$tag->script('src="'.ROOTPATHURL.JSPATH.'jquery.min.js"');
		$tag->script;

		$tag->script('src="'.ROOTPATHURL.JSPATH.'datatables.min.js"');
		$tag->script;

		if(isset($_POST['search'])):
			$busca = $_POST['search'];
		else:
			$busca = '';
		endif;

		$personagem = new Personagens('');
		$personagens = $personagem->select('personagens', null, [
													['nome', 'like', "%{$busca}%" ],
													['dono', 'like', "%{$busca}%" ],
													['sistema', 'like', "%{$busca}%" ],
													['tipo', 'like', "%{$busca}%" ],
													['lv', 'like', "%{$busca}%" ],
													['raca', 'like', "%{$busca}%" ],
													['classe', 'like', "%{$busca}%" ]
												], "OR", "LIMIT 1,4");

		$tag->imprime('
					<script type="text/javascript" charset="utf-8">
						

					</script>
					');

		$form->_col(12);

			
				$form->_row();
					$form->_col(12);
						$tag->form('action="search.php" method="post"');
							$form->h2("Nova busca geral...");
							$tag->div('class="ui-widget"');
								$form->input(['type'=>'text', 'name'=>'search', 'id'=>'search_result' ,'class'=>'form-control input-lg', 'aria-describedby'=>'basic-addon1','placeholder'=>'Digite sua busca. Ex: Espada Larga']);
							$tag->div;
						$tag->form;
					$form->col_();
				$form->row_();
			
			$tag->span('id="classe_personagem"');
						
				if(isset($personagens) && is_array($personagens)):
					$tag->table('id="search_resulted" class="table table-striped table-bordered" cellspacing="0" width="100%"');
						$tag->thead();
							$tag->tr();
								$tag->th();
									echo 'Resultado...';
								$tag->th;
							$tag->tr;
						$tag->thead;
						$tag->tbody();
						 $image = '';
						 for($i=0; $i<count($personagens); $i++):
						 	if($personagens[$i]['tipo'] == 'Personagem jogador'):
								$path = PERSONAGEMPATH;
						 		$image = PERSONAGEMPATH.$personagens[$i]['img'];
							elseif($personagens[$i]['tipo'] == 'Monstro'):
								$path = MONSTROPATH;
								$image = MONSTROPATH.$personagens[$i]['img'];
							else:
								$path = 'undefined';
								$image = $personagens[$i]['img'];
							endif;
							$tag->tr();
								$tag->td();
									$tag->span('class="search-title"');
										$tag->a('href="'.ROOTPATHURL.$path.'view.php?id='.$personagens[$i]['id'].'" target="blank"');
											$tag->imprime($personagens[$i]['nome']);
										$tag->a;
									$tag->span;
									$tag->br();
									$tag->imprime("{$personagens[$i]['tipo']} - Nível {$personagens[$i]['lv']}, Sitema {$personagens[$i]['sistema']}");
									$tag->br();
									$tag->imprime("{$personagens[$i]['raca']} ({$personagens[$i]['classe']}) - Criado por {$personagens[$i]['dono']}");
									$tag->br();
									$tag->small();
										$tag->a('href="'.ROOTPATHURL.$path.'view.php?id='.$personagens[$i]['id'].'" target="blank" class="show-picture"');
											$tag->imprime('Ver mais...');
										$tag->a;
									$tag->small;
									$tag->br();
									$tag->br();
								$tag->td;
							$tag->tr;
						endfor;
						$tag->tbody;
					$tag->table;
				else:
					echo "404";
				endif;
			$tag->span;
		$form->col_();

		//<!-- jquery CSS -->
		$tag->link('href="'.TESTEPATH.CSSPATH.'jquery-ui.css" rel="stylesheet"');

		$tag->script('src="'.TESTEPATH.JSPATH.'jquery-ui.js"');
		$tag->script;

		$tag->script('src="'.TESTEPATH.JSPATH.'index.js"'); 
		$tag->script;

require 'footer.php';