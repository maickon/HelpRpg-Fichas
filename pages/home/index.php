<?php
if(isset($_GET['v'])):
	echo $_GET['v'];
endif;

$form = new Form();
$tag = new Tags();

$form->_row();
	$form->_container();
		$user = new Usuarios();
		$armadura 	= new Armaduras('');
		$arma 		= new Armas('');
		$artefato 	= new Artefatos('');
		$personagem = new Personagens('');
		$talento 	= new Talentos('');
		$magia 		= new Magias('');
		$pericia 	= new Pericias('');
		
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
		
		$qtd_total_itens = ($qtd_armaduras+$qtd_armas+$qtd_artefatos);
		
		$img_title = [
						['jogadores.jpg','Usuários Cadastrados', $qtd_user],
						['monstros.jpg','Monstros cadastrados', $qtd_monstros],
						['boss.jpg','Chefes de fase', 0],
						['armas.jpg','Itens Cadastrados', $qtd_total_itens]
					];
		
		//Lista fictiia de categorias
		$categorias = [
						['Fichas Jogador', $qtd_jogador, ROOTPATHURL.PERSONAGEMPATH.'view.php?id='.$number_jogador[0]['id']],
						['Fichas Npc', $qtd_npc, ROOTPATHURL.PERSONAGEMPATH.'view.php?id=1'],
						['Fichas Monstros', $qtd_monstros, ROOTPATHURL.MONSTROPATH.'view.php?id='.$number_monstros[0]['id']],
						['Armas', $qtd_armas, ROOTPATHURL.ARMASPATH.'view.php?id='.$number_armas[0]['id']],
						['Armaduras', $qtd_armaduras, ROOTPATHURL.ARMADURASPATH.'view.php?id='.$number_armaduras[0]['id']],
						['Artefatos', $qtd_artefatos, ROOTPATHURL.ARTEFATOSPATH.'view.php?id='.$number_artefatos[0]['id']],
						['Talentos', $qtd_talentos, ROOTPATHURL.TALENTOSPATH.'view.php?id='.$number_talentos[0]['id']],
						['Magias', $qtd_magias, ROOTPATHURL.MAGIASPATH.'view.php?id='.$number_magias[0]['id']],
						['Perícias', $qtd_pericias, ROOTPATHURL.PERICIASPATH.'view.php?id='.$number_pericias[0]['id']],
						['Ficha Aleatória', "100+", ROOTPATHURL.NPCGENERATEPATH],
						['Monstro Aleatório', "100+", ROOTPATHURL.MONSTERGENERATEPATH]
					];
		$tag->imprime('
			<div class="banner-center">
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- anuncio_3 -->
				<ins class="adsbygoogle"
				     style="display:inline-block;width:728px;height:90px"
				     data-ad-client="ca-pub-3010334569259161"
				     data-ad-slot="2027312537"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script>
			</div>
			');
			
		$form->_container();
			$form->h2("O que você procura está aqui no <b>Help Rpg</b>", ['class'=>'titulo-index']);
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
			$tag->imprime('
					<div class="banner-center">
						<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
						<!-- anuncio_1 -->
						<ins class="adsbygoogle"
						     style="display:inline-block;width:728px;height:90px"
						     data-ad-client="ca-pub-3010334569259161"
						     data-ad-slot="8073846133"></ins>
						<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
						</script>
					</div>
					');
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
			$tag->imprime("<b>
				Contribua com o Help Rpg, faça uma doação para motivar a evolução deste site a assim termos um ambiente cada vez
				melhor para nossas campanhas de RPG. Contamos com você.</b>");
		
			$tag->imprime('
					<!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
					<form action="https://pagseguro.uol.com.br/checkout/v2/donation.html" method="post">
					<!-- NÃO EDITE OS COMANDOS DAS LINHAS ABAIXO -->
					<input type="hidden" name="currency" value="BRL" />
					<input type="hidden" name="receiverEmail" value="helprpg.br@gmail.com" />
					<input type="image" src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/doacoes/184x42-doar-cinza-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
					</form>
					<!-- FINAL FORMULARIO BOTAO PAGSEGURO -->
					');
		$tag->div;
		
	$form->container_();
	
	$tag->imprime('
				<div class="banner-center">
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<!-- anuncio_2 -->
					<ins class="adsbygoogle"
					     style="display:inline-block;width:728px;height:90px"
					     data-ad-client="ca-pub-3010334569259161"
					     data-ad-slot="9550579333"></ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
				</div>
				');
	$form->row_();

$form->hr();
