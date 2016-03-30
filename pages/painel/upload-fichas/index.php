<?php
require_once '../../../header.php';
require_once '../helper.php';
global $tag, $form, $s, $parametros;

$super = false;

$tag->body('role="document"');

new Components('menu', $parametros);
$tag->br();
$tag->br();
	$form->_row();
		$form->_container();
			if(isset($_GET['status']) && $_GET['status'] == 'deleted'):
				$tag->div('class="alert alert-success"');
					$tag->imprime(SUCESSO_MSG);
				$tag->div;
			elseif(isset($_GET['status']) && $_GET['status'] == 'error'):
				$tag->div('class="alert alert-danger"');
					$tag->imprime(PERIGO_MSG);
				$tag->div;
			endif;
		$form->container_();
	$form->row_();
			
	$objeto = new UploadFichas();
	$ficha = $objeto->select($objeto->getTable());

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
				$tag->imprime(FICHA_DE_PERSONAGEM);
			$tag->span;
		$form->col_();
		$form->_col(1);
			$tag->a('href="'.ROOTPATHURL.FICHASUPLOADPATH.'new.php" class="btn btn-primary"');
				$tag->imprime(NOVO);
			$tag->a;
		$form->col_();
		$form->_col(12);
			$tag->hr();
		$form->col_();
			
		$form->_table(['id'=>'example', 'class'=>'display', 'cellspacing'=>'0', 'width'=>'100%']);
			$tag->thead();
				$tag->tr();
					$form->th(NOME);
					$form->th(DONO);
					$form->th(RACA);
					$form->th(CLASSE);
					$form->th(SISTEMA);
					$form->th(CRIADO_EM);
					$form->th(' ');
					$form->th(' ');
					$form->th(' ');	
					$form->th(' ');
				$tag->tr;
			$tag->thead;

			$tag->tbody();
				foreach($ficha as $a):
					$tag->tr();
						$form->td($a['nome']);
						$form->td($a['dono']);
						$form->td($a['raca']);
						$form->td($a['classe']);
						$form->td($a['sistema']);
						$form->td(date('d/m/Y', strtotime($a['data_cadastro'])).' às '.date(' H:i:s', strtotime($a['data_cadastro'])));
						
						//verificando permiçoes
						foreach($permit as $p):
							if($s->get_session('nome') == $p):
								$super = true;
							endif;
						endforeach;
						
						if($super):
							helper_componentes_buttons('ficha', $a['id']);
						elseif($s->get_session('ficha') != $a['dono']):
							//em cada linha onde o usuario atual for diferente do dono da arma, vai neutralizar as opçoes de editar e excluir 
							helper_componentes_buttons('ficha', $a['id'], $off = true);
						elseif($s->get_session('ficha') == $a['dono']):
							//se o usuario logado for dono de alguma arma criada ele tera acesso total ao recurso
							helper_componentes_buttons('ficha', $a['id']);
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
