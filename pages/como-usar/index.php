<?php 
require_once '../../header.php';

new Components('menu', $parametros);
$form = new Form();
$tag = new Tags();

$form->_row();
	$form->_container();
		helper_ads_cursos();
		$form->h2("Como usar o site <b>Help Rpg Fichas</b>", ['class'=>'titulo-index']);
		$tag->p();
			$tag->imprime("
				Após feito o seu cadastro no site, você vai encontrar opção para diversos tipos de cadastro. Estes cadastros
				podem ser classificados conforme o sistema de RPG disponível no site. Assim você poderá fazer um cadastro
				de alguma arma ou armadura específica para utilizar em sua campanha ou simplesmente pesquisar pelo
				mesmo tipo de item feito por outros jogadores.");
		$tag->p;
		$tag->p();
			$tag->imprime("
				Na página de cadastro você vai perceber que todos os possíveis campos de entrada estão habilitados para os
				diversos tipos de sistema. Isso significa que você não é obrigado a preencher todos os campos do cadastro.
				Normalmente por padrão, somente o termo \"nome\" é obrigatório no ato do cadastro.");
		$tag->p;

		$tag->p();
			$tag->imprime("
				Você perceberá também que alguns cadastros como armas, armaduras e etc vão oferecer um campo de imagem para 
				que você detalhe melhor o item na qual esteja cadastrando. Este campo não é obrigatório, caso deixe vazio
				o seu item cadastrado não terá imagem. Outra observação é que quando você for editar um item, você deverá 
				fornecer novamente uma imagem, pois caso não a preencha, o seu registro ficará sem imagem. ");
		$tag->p;
			
		$tag->p();
			$tag->imprime("
				Você vai perceber também que dentro do painel administrativo, alguns registros só estarão disponíveis para
				você visualizar ou baixar. Isso significa que aquele item cadastrado não é seu e somente o usuário que o
				cadastrou pode edita-lo. Entretanto você poderá contacta-lo através de e-mail ou pelo facebook caso este
				usuário desejou disponibilizar seu perfil para troca de informações com outros jogadores. ");
		$tag->p;
		
		helper_adsense_03();
		
		$form->h2("Algumas perguntas frequentes.", ['class'=>'titulo-index']);
		$tag->p();
			$tag->imprime("
				Abaixo uma pequena lista de perguntas frequentes que os usuários podem ter e possíveis sugestãos para o site.");
		$tag->p;
		

		$tag->imprime("<h3>Existe limite de itens, fichas e etc? posso cadastrar o quanto eu quiser?</h3>");
		$tag->p();
			$tag->imprime("
				Sim! No Help Rpg Fichas não existe limite para o npumero de cadastro de armas, itens, fichas e etc que você venha 
				cadastrar. Na verdade desque não estore o limite que o plano de hospedagem oferece, esta tudo OK! rsrs");
		$tag->p;

	

		$tag->imprime("<h3>Esqueci minha senha, como recupero?</h3>");
		$tag->p();
		$tag->imprime("
				Caso você tenha esquecido a sua senha, envie um email para <b>(helprpg.br@gmail.com)</b> com o assunto perdi minha senha
				que retornaremos o mais rápido possível com uma nova senha para você.");
		$tag->p;

	
	
		$tag->imprime("<h3>Tem como implementar suporte a mais sistemas de RPG?</h3>");
		$tag->p();
		$tag->imprime("
				Sim! tem como. Entretanto eu não conheço todos os sistemas de RPG, portanto na medida do possível eu tentarei
				adicionar novos sistemas ao site para que os usuários possam cadastrar novos registros para o seu sistema de 
				RPG preferido. O interessante é que me envie dicas de como as coisas poderiam ser feitas para um determinado
				sistema. Ex: Quais campos são importantes para se cadastrar e etc.");
		$tag->p;
			
		$tag->imprime("<h3>Tem como implementar novas funcionalidades?</h3>");
		$tag->p();
		$tag->imprime("
				Sim! tem como. Mas isso depende da complexidade da coisa. Infelizmente não tenho tempo para me dedicar ao site
				100%. Além disso tem coisas que talvez sejam inviáveis neste momento para mim, certas funcionalidades podem ser
				simples de serem implementadas e outras não. Dessa forma tudo dependerá da complexidade da nova funcionalidade 
				sugerida.");
		$tag->p;
		
		$tag->imprime("<h3>Propagandas, links adfly... Nossa! que chato!</h3>");
		$tag->p();
		$tag->imprime("
				Este site gera gastos para mante-lo no ar. Dessa forma a única maneira que encontrei de disponibilizar esta ferramenta
				de forma gratuita para os jogadores de RPG foi monetizando este site. Os links disponíveis para download são monetizados,
				as propagandas no site são para a sobrevivência do mesmo. Então tente entender isso numa boa.");
		$tag->p;
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
		
		helper_adsense_02();
$form->row_();

require_once '../../footer.php';
