<?php
	//variaveis de menu
	$parametros = array();
	//verifica se existe alguma sessao aberta
	if($s->exist('login')):
		$tag->br();
		$tag->br();
		//chama o arquivo helper para a pagina de painel adm.
		require_once 'pages/painel/helper.php';
		//se o usuario ativo na sessao for um adm, um menu com maiores opcoes serao apresentado.
		if(helper_check_admin() != 0):
			//declarra uma lista de labels de submenus para serem exibidas dentro do item de menu chamado "Voce".
			//sendo um usuario adm, a listagem de cada item de submenu sera maior
			$options_menu_root_label = array(
											VOCE, 
											USUARIOS, 
											ESTATISTICAS, 
											SEUS_DADOS, 
											EDITAR_DADOS, 
											CANCELAR_CONTA);
			//declara uma lista de fragmentos de URL dentro de um submenu.
			$options_menu_root_links = array(
											"#", 
											USERSLISTPATH, 
											USERPATH, 
											USEREVIEWPATH, 
											USEREDITPATH, 
											USERDELETEPATH); 
		//caso nao seja um adm, sera apresentado um menu para usuarios com menores privilegios.  
		else:
			//esta lista de submenu possui uma listagem inferior.
			//lista com labes para menu.
			$options_menu_root_label = array(
											VOCE, 
											ESTATISTICAS, 
											SEUS_DADOS, 
											EDITAR_DADOS, 
											CANCELAR_CONTA);
			//lista com fragmentos de URL para os labels listado acima.
			$options_menu_root_links = array(
											"#", 
											'', 
											USEREVIEWPATH, 
											USEREDITPATH, 
											USERDELETEPATH);
		endif;
		
		//formando a listagem completa da barra de menu dentro da area adm
		//adicionando cada label ao array $parametros['nomes'] que indica que 
		//neste array so serao passados nomes(labels) para serem exibidas.
		$parametros['nomes'] = array(
									//quando o item de menu possui submenus, um array sera passado ao inves de uma string
									//Menu - Personagem e seus submenus
									array(
											PERSONAGEM_MENU, 
											CRIAR_PERSONAGEM,
											CRIAR_PERSONAGEM_LINK, 
											CRIAR_MONSTRO,
											CRIAR_MONSTRO_LINK, 
											BESTIARIO),

									//Menu - Campanhas e seus submenus
									array(
											CAMPANHAS, 
											AVENTURAS,
											HISTORIAS, 
											CENARIOS, 
											CONTOS, 
											CRONICAS),

									//Menu - Cadastrar e seus submenus
							   		array(
							   				CADASTRAR, 
							   				ARMAS, 
							   				ARMADURAS, 
							   				ARTEFATOS, 
							   				TALENTOS, 
							   				MAGIAS_MENU, 
							   				PERICIAS),

							   		//Menu - Utilitarios e seus submenus
									array(
											UTILITARIOS, 
											UTILITARIOS_INDEX,
											ROLAR_DADOS, 
											GERADOR_DE_NOMES, 
											GERADOR_DE_FICHAS_BASE, 
											GERADOR_DE_AVENTURAS, 
											GERADOR_DE_TAVERNAS,
											GERADOR_DE_ENCONTROS,
											GERADOR_DE_MUNDOS, 
											GERADOR_DE_MASMORRAS,
											GERADOR_DE_PERSONALIDADES, 
											GERADOR_DE_CIDADES, 
											GERADOR_DE_MARCADOR, 
											GERADOR_DE_NPCS, 
											GERADOR_DE_MONSTROS),

									//Menu - Voce e seus submenus
									//este menu foi declarado acima na variavel $options_menu_root_label
									$options_menu_root_label
									);
		
		//adicionando links a listagem para cada label no menu e aos seus submenus.
		$parametros['links']  = array(
									//Links - label Personagem e seus submenus 
									//Observe que todo label de titulo que aparece no menu e exibe os submenus
									//nao linkam para lugar nenhum, logo sua URL e um # no array abaixo.
									array(
											"#", 
											ROOTPATHURL.PERSONAGEMPATH, 
											ROOTPATHURL.PERSONAGEMPATHLINK, 
											ROOTPATHURL.MONSTROPATH,
											ROOTPATHURL.MONSTROPATHLINK, 
											ROOTPATHURL.BESTIARIOPATH),

									//Links - label Campanhas e seus submenus 
									array(
											"#", 
											ROOTPATHURL.AVENTURASPATH, 
											ROOTPATHURL.HISTORIASPATH, 
											ROOTPATHURL.CENARIOSPATH, 
											ROOTPATHURL.CONTOSPATH, 
											ROOTPATHURL.CRONICASPATH),

									//Links - label Cadastrar e seus submenus 
									array(
											"#", 
											ROOTPATHURL.ARMASPATH, 
											ROOTPATHURL.ARMADURASPATH, 
											ROOTPATHURL.ARTEFATOSPATH, 
											ROOTPATHURL.TALENTOSPATH, 
											ROOTPATHURL.MAGIASPATH,
											ROOTPATHURL.PERICIASPATH),

									//Links - label Utilitarios e seus submenus 
									array(
											"#", 
											UTILITARIOSPATH,
											ROLLDICE, 
											NAMEGENERATION, 
											FICHASBASEGENERATION, 
											ADVENTUREGENERATION, 
											TAVERNA_PATH, 
											ENCONTROS_PATH, 
											MAPWORDPATH, 
											DUNGEONPATH,
											PERSONALIDADES_PATH, 
											CIDADES_PATH, 
											MARCADORES_PATH, 
											NPCGENERATEPATH, 
											MONSTERGENERATEPATH),

									//Links - label Voce e seus submenus
									//esta lista de links foi declarada acima na variavel $options_menu_root_links 
									$options_menu_root_links
									);
		
		//informa que e o programador do site e o copyright, este termos so sao usado quando estes arrays de label e links
		//sao usados no rodape do site
		$parametros['programer']  = PROGRAMER;
		$parametros['copy']  = COPY;
	else:
		//caso nao haja sessao, apresentaremos uma listagem de menu simples sem opcoes administrativas
		require_once 'pages/helper.php';
		//carregamento da barra com horizontal com a logo do site.
		$tag->div('class="jumbotron"');
	    	$tag->div('class="container"');
	        	$tag->img('src="'.ROOTPATHURL.IMGPATH.'logo.png" id="logo"');
	        $tag->div;
	    $tag->div;
	
		//Listagem de menus e links 
		// array('Idioma', utf8_encode('Português - BR'), 'English - En')
		//array('#','?v=pt-br', '?v=en')
		//Menu utilitario e seus labels de submenus 
		$utilitarios_label 		= array(
										UTILITARIOS, 
										UTILITARIOS_INDEX,
										ROLAR_DADOS, 
										GERADOR_DE_NOMES, 
										GERADOR_DE_FICHAS_BASE, 
										GERADOR_DE_AVENTURAS, 
										GERADOR_DE_TAVERNAS,
										GERADOR_DE_ENCONTROS,
										GERADOR_DE_MUNDOS, 
										GERADOR_DE_MASMORRAS,
										GERADOR_DE_PERSONALIDADES, 
										GERADOR_DE_CIDADES, 
										GERADOR_DE_MARCADOR, 
										GERADOR_DE_NPCS, 
										GERADOR_DE_MONSTROS);
	
		//Links para cada item de submenu de utilitarios
		$utilitarios_link 		= array(
										"#", 
										UTILITARIOSPATH,
										ROLLDICE, 
										NAMEGENERATION, 
										FICHASBASEGENERATION, 
										ADVENTUREGENERATION, 
										TAVERNA_PATH, 
										ENCONTROS_PATH, 
										MAPWORDPATH, 
										DUNGEONPATH,
										PERSONALIDADES_PATH, 
										CIDADES_PATH, 
										MARCADORES_PATH, 
										NPCGENERATEPATH, 
										MONSTERGENERATEPATH);
		
		//$campanhas_label 		= array(CAMPANHAS, AVENTURAS, HISTORIAS, CENARIOS, CONTOS, CRONICAS);
		//$campanhas_link 		= array("#", ROOTPATHURL.AVENTURASPATH, ROOTPATHURL.HISTORIASPATH, ROOTPATHURL.CENARIOSPATH, ROOTPATHURL.CONTOSPATH, ROOTPATHURL.CRONICASPATH);

		//submenus para labels e links da opcao de download
		$downloads_label 		= array(
										DOWNLOADS, 
										TAVERNA_DO_ELFO, 
										BIBLIOTECA_ELFICA, 
										MASMORRAS, 
										MAPAS, 
										FICHAS, 
										ITENS, 
										MAGIAS);

		$downloads_link 		= array(
										"#", 
										TAVERNA_DO_ELFO_URL, 
										BIBLIOTECA_ELFICA_URL, 
										DOWNLOADPATHMASMORRAS, 
										DOWNLOADPATHMAPASMUNDI, 
										DOWNLOADPATHFICHAS, 
										DOWNLOADPATHITENS, 
										DOWNLOADPATHMAGIAS);

		//lista de labels e links para submenus das rede sociais
		$midias_sociais_label 	= array(
										MEDIAS_SOCIAIS, 
										FACEBOOK, 
										YOUTUBE, 
										WORDPRESS_BLOG);

		$midias_sociais_link 	= array(
										"#", 
										FACEBOOK_URL, 
										YOUTUBE_URL, 
										WORDPRESS_BLOG_URL);

		//preenchando o array de menus com os labels e links declarados acima.
		//Labels
		$parametros['nomes'] = array(
										HOME, 
										CADASTRO, 
										array(	SOBRE, 
												SOBRE_HELP, 
												COMO_USAR, 
												VERSAO_ESTRANGEIRA,
												DOACAO,
												PARCERIA, 
												QUEM_SOU),
										$utilitarios_label, 
										$downloads_label, 
										$midias_sociais_label, 
										array(LINGUAGEM,PT_BR,EN)
									);
		//Links
		$parametros['links']  = array(
										HOME_PATH, 
										USERNEWPATH, 
										array(	"#",	
												ABOUTPATH, 
												COMO_USAR_PATH, 
												VERSAO_ESTRANGEIRA_PATH, 
												DOACAO_PATH, 
												PARCERIA_PATH, 
												QUEM_SOU_PATH
											),
										$utilitarios_link, 
										$downloads_link, 
										$midias_sociais_link,
										array("#",PTBR_PATH,EN_PATH)
									);
		//informa que e o programador do site e o copyright, este termos so sao usado quando estes arrays de label e links
		//sao usados no rodape do site
		$parametros['programer']  = PROGRAMER;
		$parametros['copy']  = COPY;
	endif;