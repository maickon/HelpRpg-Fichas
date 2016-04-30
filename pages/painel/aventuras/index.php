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
			
	$objeto = new Aventuras(ROOTPATHURL.AVENTURASPATH);
	$aventuras = $objeto->select($objeto->getTable());

	$tag->imprime('
			<script type="text/javascript" charset="utf-8">
				$(document).ready(function() {
					$(\'#example\').DataTable();
				} );
			</script>
			');
	
	$form->_container();
		$form->_col(10);
			$tag->span('class="span_title"');
				$tag->imprime(AVENTURAS);
			$tag->span;
		$form->col_();
		$form->_col(2);
			if($s->get_session('nome')):
				helper_new_or_register_button(ROOTPATHURL.AVENTURASPATH.'new.php', NOVO);
			else:
				helper_new_or_register_button(USERPATH.'new.php', CRIAR_CONTA);
			endif;
		$form->col_();
		$form->_col(12);
			$tag->hr();
		$form->col_();
		
		$form->_table(['id'=>'example', 'class'=>'display', 'cellspacing'=>'0', 'width'=>'100%']);
			$tag->thead();
				$tag->tr();
					$form->th(TITULO);
					$form->th(MESTRE);
					$form->th(LEVEL_INDICADO);
					$form->th(TIPO);
					$form->th(CRIADO_EM);
					$form->th(SISTEMA);
					$form->th(CRIADOR);
					$form->th(' ');
					$form->th(' ');
					$form->th(' ');	
					$form->th(' ');
				$tag->tr;
			$tag->thead;

			$tag->tbody();
				foreach($aventuras as $a):
					$tag->tr();
						$form->td($a['titulo']);
						$form->td($a['mestre']);
						$form->td($a['level_indicado']);
						$form->td($a['tipo']);
						$form->td(date('d/m/Y', strtotime($a['data_criacao'])).' às '.date(' H:i:s', strtotime($a['data_criacao'])));
						$form->td($a['sistema']);
						$form->td($a['dono']);
						
						//verificando permiçoes
						foreach($permit as $p):
							if($s->get_session('nome') == $p):
								$super = true;
							endif;
						endforeach;
						
						if($super):
							helper_componentes_buttons('aventuras', $a['id']);
						elseif($s->get_session('aventuras') != $a['dono']):
							//em cada linha onde o usuario atual for diferente do dono da arma, vai neutralizar as opçoes de editar e excluir 
							helper_componentes_buttons('aventuras', $a['id'], $off = true);
						elseif($s->get_session('aventuras') == $a['dono']):
							//se o usuario logado for dono de alguma arma criada ele tera acesso total ao recurso
							helper_componentes_buttons('aventuras', $a['id']);
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