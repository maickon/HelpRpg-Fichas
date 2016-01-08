<?php

require_once '../../header.php';
require_once '../helper.php';
require_once 'data.php';

new Components('menu', $parametros);
$form = new Form();
$tag->br();

$get_user = new Usuarios();
$nome = $s->get_session('login');
$user = $get_user->select('usuarios', null, [['email','=', $nome ? $nome : ' ']]);



$tag->br();

$form->_row();
	$form->_container();
		$form->_col(12);
			$tag->span('class="span_title"');
				$tag->imprime("Seus dados");
			$tag->span;
			$tag->hr();
		$form->col_();
	$form->container_();
$form->row_();



$form->_row();
	$form->_container();		
		$data = date('d/m/Y', strtotime($user[0]['criado_em'])).' às '.date(' H:i:s', strtotime($user[0]['criado_em']));
		$ativo = ($user[0]['ativo'] == 's') ? 'Ativo' : 'Não ativo';
		
		$dados = [
					[ARMAS,$qtd_armas],
					[ARMADURAS,$qtd_armaduras],
					[ARTEFATOS,$qtd_artefatos],
					[MAGIAS,$qtd_magias],
					[PERICIAS,$qtd_pericias],
					[TALENTOS,$qtd_talentos],
					[PERSONAGEM,$qtd_personagem_jogador],
					[CHEFES_DE_FASE,$qtd_personagem_boss],
					[MONSTRO,$qtd_personagem_monstro],
					[AVENTURAS,$qtd_aventuras],
					[CONTOS,$qtd_contos],
					[CRONICAS,$qtd_cronicas],
					[HISTORIAS,$qtd_historias]
				];
		
		$form->_col(6);
			$form->h2("{$user[0]['nome']}, você se cadastrou no dia {$data}.");
			$tag->br();
			$form->h4("Seu código de usuário: <b>#{$user[0]['id']}</b>");
			$tag->br();
			$form->h4("Seu nick: <b>{$user[0]['login']}</b>");
			$tag->br();
			$form->h4("Seu E-mail: <b>{$user[0]['email']}</b>, o seu e-mail você usa para logar no sistema.");
			$tag->br();
			$form->h4("Sua senha <b>*********************</b> é confidêncial, somente você sabe.");
			$tag->br();
			$form->h4("Você é um usuário <b>{$ativo}</b>");
		$form->col_();
		
		$form->_col(6);
			$form->h2("Seus cadastros em nosso sistema");
			foreach($dados as $value):
				$form->h4($value[0].': '.$value[1]);
			endforeach;
		$form->col_();
	$form->_container();
$form->row_();
$tag->div;
require_once '../../footer.php';
