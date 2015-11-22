<?php

require_once '../../header.php';

new Components('menu', $parametros);
$form = new Form();


$form->_row();
	$form->_container();
		$form->h1("Help Rpg Fichas");
		$form->hr();
		
		$form->p(
				'
				O Help Rpg agora se tornou um repositório de fichas de RPG online. Aqui você fará um cadastro e poderá
				armazenar quantas fichas de personagens quiser. Temos suporte a diversos sistemas e com isso buscamos 
				tornar suas partidadas de RPG mais produtiva.
				<br />
				<br />
				Alguns exemplos de produtividade com o Help Rpg Fichas...
				<ul>
					<li>Fichas mais rápidas</li>
					Com uma conta ativa aqui, você terá acesso ao grande acervo de fichas que outros RPGistas cadastram aqui.
					<li>Local seguro</li>
					Agora você não corre o risco de perder a ficha do seu personagem.
					<li>Acesso a geradores de BOSS, itens mágico, e muito mais..</li>
					Além de fichas de personagens jogadores, você também terá acesso a intens, artefatos e muitos outros recursos.  
				</ul>
				'
		);
		
		$form->_ul();
			$form->_li();
				$form->h3("Como funciona");
				$form->p(
						'
						Após feito o seu cadastro você terá a sua disposição um painel administrativo para você
						criar fichas, armas, talentos, itens mágicos e muitos outros...	
						'
						);
			$form->li_();
		$form->ul_();
		$form->hr();
	$form->container_();
$form->row_();

require_once '../../footer.php';
