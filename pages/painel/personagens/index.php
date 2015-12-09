<?php
require_once '../../../header.php';
require_once '../helper.php';
global $tag, $form, $s, $parametros;
$s->restricted_access();

$super = false;

$tag->body('role="document"');

new Components('menu', $parametros);
$tag->br();
$tag->br();
	$form->_row();
		$form->_container();
			if(isset($_GET['status']) && $_GET['status'] == 'deleted'):
				$tag->div('class="alert alert-success"');
					$tag->imprime('Registro deletado com sucesso.');
				$tag->div;
			elseif(isset($_GET['status']) && $_GET['status'] == 'error'):
				$tag->div('class="alert alert-danger"');
					$tag->imprime('Um erro ocoreu, contate o administrador.');
				$tag->div;
			endif;
		$form->container_();
	$form->row_();
			
	$objeto = new Personagens(ROOTPATHURL.PERSONAGEMIMGPATH);
	$personagens = $objeto->select($objeto->getTable(), null, [['tipo', '=', 'Personagem jogador']]);

	$tag->imprime('
			<script type="text/javascript" charset="utf-8">
				$(document).ready(function() {
					$(\'#example\').DataTable();
				} );
			</script>
			');
	
	$form->_container();
		$form->_col(11);
			$tag->span('class="span_title"');
				$tag->imprime(PERSONAGEM);
			$tag->span;
		$form->col_();
		$form->_col(1);
			$tag->a('href="'.ROOTPATHURL.PERSONAGEMPATH.'new.php" class="btn btn-primary"');
				$tag->imprime(NOVO);
			$tag->a;
		$form->col_();
		$tag->br();
		$tag->hr();
		
		$form->_table(['id'=>'example', 'class'=>'display', 'cellspacing'=>'0', 'width'=>'100%']);
			$tag->thead();
				$tag->tr();
					$form->th('Nome');
					$form->th('Criador');
					$form->th('Level');
					$form->th('Classe');
					$form->th('Raça');
					$form->th('Tipo');
					$form->th('Sistema');
					$form->th(' ');
					$form->th(' ');
					$form->th(' ');	
					$form->th(' ');
				$tag->tr;
			$tag->thead;

			$tag->tbody();
				foreach($personagens as $a):
					$tag->tr();
						$form->td($a['nome']);
						$form->td($a['dono']);
						$form->td($a['lv']);
						$form->td($a['classe']);
						$form->td($a['raca']);
						$form->td($a['tipo']);
						$form->td($a['sistema']);
						
						//verificando permiçoes
						foreach($permit as $p):
							if($s->get_session('nome') == $p):
								$super = true;
							endif;
						endforeach;
						
						if($super):
							helper_componentes_buttons('personagens', $a['id']);
						elseif($s->get_session('nome') != $a['dono']):
							//em cada linha onde o usuario atual for diferente do dono da arma, vai neutralizar as opçoes de editar e excluir 
							helper_componentes_buttons('personagens', $a['id'], $off = true);
						elseif($s->get_session('nome') == $a['dono']):
							//se o usuario logado for dono de alguma arma criada ele tera acesso total ao recurso
							helper_componentes_buttons('personagens', $a['id']);
						endif;
					$tag->tr;
				endforeach;
			$tag->tbody;
		$form->table_();
	$form->container_();
	
	//chama a mensagem de alert 
	helper_modal_alert_confirm();
	
	$tag->imprime('
			<script type="text/javascript">
				// For demo to fit into DataTables site builder...
				$(\'#example\')
					.removeClass( \'display\' )
					.addClass(\'table table-striped table-bordered\');
			</script>
			');
	
require_once '../../../footer.php';