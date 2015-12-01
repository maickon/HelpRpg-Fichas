<?php
require_once '../../header.php';
require_once '../painel/helper.php';
global $tag, $form, $s, $parametros;
$s->restricted_access();

if(helper_check_admin() == 0)
	header('location:'.ROOTPATHURL);

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
			
	$objeto = new Usuarios();
	$usuarios = $objeto->select('usuarios');

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
				$tag->imprime('Usuários');
			$tag->span;
		$form->col_();
		$form->_col(1);
			$tag->a('href="'.ROOTPATHURL.USERPATH.'new.php" class="btn btn-primary"');
				$tag->imprime(NOVO);
			$tag->a;
		$form->col_();
		$tag->br();
		$tag->hr();
		
		$form->_table(['id'=>'example', 'class'=>'display', 'cellspacing'=>'0', 'width'=>'100%']);
			$tag->thead();
				$tag->tr();
					$form->th('Nome');
					$form->th('Nick');
					$form->th('email');
					$form->th('Data de cadastro');
					$form->th(' ');
					$form->th(' ');
					$form->th(' ');	
					$form->th(' ');
				$tag->tr;
			$tag->thead;

			$tag->tbody();
				foreach($usuarios as $a):
					$tag->tr();
						$form->td($a['nome']);
						$form->td($a['login']);
						$form->td($a['email']);
						$form->td($a['criado_em']);
						
						//verificando permiçoes
						foreach($permit as $p):
							if($s->get_session('nome') == $p):
								$super = true;
							endif;
						endforeach;
						
						if($super):
							helper_componentes_buttons('usuarios', $a['id']);
						elseif($s->get_session('nome') != $a['nome']):
							//em cada linha onde o usuario atual for diferente do dono da arma, vai neutralizar as opçoes de editar e excluir 
							helper_componentes_buttons('usuarios', $a['id'], $off = true);
						elseif($s->get_session('nome') == $a['nome']):
							//se o usuario logado for dono de alguma arma criada ele tera acesso total ao recurso
							helper_componentes_buttons('usuarios', $a['id']);
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
	
require_once '../../footer.php';