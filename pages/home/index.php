<?php
if(isset($_GET['v'])):
	echo $_GET['v'];
endif;

$form = new Form();
$tag = new Tags();

$form->_row();
	$form->_container();
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
		$form->h2("Observação! O site <b>Help Rpg</b> está em desenvolvimento...", ['class'=>'titulo-index']);
		
		$tag->p();
			$tag->imprime("
				Por enquanto esta versão que vocês estão acessando eu a tornei disponível para que possam 
				estar acompanhando a evolução do site. Além disso vocês já têm uma prévia sobre o que está 
				por vir. Eu não divulguei o link na página oficial do Facebook porque eu ainda não acho 
				interessante sair divulgando algo que ainda não está pronto.");
		$tag->p;
		$tag->p();
			$tag->imprime("
				Portanto esta explicação só está aqui para caso alguém encontre este site por acaso. Para que você
				não fique frustrado tentando acessar as funcionalidades que ainda não existem, já estou avisando de antemão.");
		$tag->p;

		$tag->p();
			$tag->imprime("
				Os dados aqui presentes por enquanto são fictícios, assim como suas funcionalidades. Mas isso em breve mudará!<br />
				Att,<br />
				Maickon Rangel - Criador do Help Rpg");
		$tag->p;
		$number = rand(1000, 99999);
		$img_title = [
						['jogadores.jpg','Usuários Cadastrados'],
						['monstros.jpg','Monstros cadastrados'],
						['boss.jpg','Chefes de fase'],
						['armas.jpg','Itens Cadastrados']
					];
		$form->h2("Faça parte desta equipe, una-se a uma campanha e seja feliz com o <b>Help Rpg</b>", ['class'=>'titulo-index']);
		for($i=0; $i<count($img_title); $i++):
			$form->_col(3);
				$tag->div('class="panel panel-default panel-index"');
					$tag->img('src="'.ROOTPATHURL.IMGPATH.$img_title[$i][0].'" alt="dados" class="img-circle img-responsive"');		
					$tag->h3();
						$tag->imprime("<i>{$number}</i>");
						$tag->br();
						$tag->small();
							$tag->imprime($img_title[$i][1]);
						$tag->small;
					$tag->h3;
				$tag->div;
			$form->col_();
		endfor;
		
		$tag->imprime("
				Contribua com o Help Rpg, faça uma doação para motivar a evolução deste site a assim termos um ambiente cada vez
				melhor para nossas campanhas de RPG. Contamos com você.");
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
	
	
	//Lista fictiia de categorias
	$categorias = [
		'Fichas Jogador','Fichas Npc','Fichas Monstros',
		'Armas','Armaduras','Artefatos','Escudos','Histórias',
		'Aventuras','Ficha Aleatória'
				];
	$form->_container();
		$form->h2("O que você procura está aqui no <b>Help Rpg</b>", ['class'=>'titulo-index']);
		foreach($categorias as $key => $cat):
			$form->_col(3);
				$form->_button(['class'=>'btn btn-primary btn-index', 'type'=>'button']);
					$tag->imprime($cat);
					$tag->span('class="badge"');
						$tag->imprime("<i>{$number}</i>");
					$tag->span;
				$form->button_();
			$form->col_();
		endforeach;
	$form->container_();
	
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
$form->row_();

$form->hr();
