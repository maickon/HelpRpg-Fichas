<?php
require_once '../../../header.php';

global $tag, $form, $s, $parametros;
$s->restricted_access();

$tag->body('role="document"');

new Components('menu', $parametros);
$tag->br();
$tag->br();
	$form->_container();
		if(isset($_REQUEST['action'])):
			$form->_col(12);
				$create_talento = new Talentos(ROOTPATH.TALENTOSIMGPATH);
				$create_talento->create($_REQUEST);
			$form->col_();
		endif;
		
		$form->_col(11);
			$tag->span('class="span_title"');
				$tag->imprime(TALENTOS);
			$tag->span;
		$form->col_();
		$form->_col(1);
			$tag->a('href="'.ROOTPATHURL.TALENTOSPATH.'" class="btn btn-info"');
				$tag->imprime(BACK);
			$tag->a;
		$form->col_();
		$tag->br();
		$tag->hr();
	$form->container_();
	
	$form->_row();
		$form->_container();	
			$form->_form(['method'=>'post', 'name'=>'new-user', 'enctype'=>'multipart/form-data', 'class'=>'form-group', 'data-toggle'=>'validator']);
			
				$current_user = $s->get_session('nome');
				$form->input(['name' => 'dono', 'type' => 'hidden', 'value'=> $current_user]);
					
				$form->_col(4);
					$form->label("Nome");
					$form->input(['name' => 'nome', 'type' => 'text', 'class'=>'form-control', 'required'=>'true']);
				$form->col_();
				
				$form->_col(4);
					$form->label("Lv");
					$form->input(['name' => 'lv', 'type' => 'text', 'class'=>'form-control']);
				$form->col_();
					
				$form->_col(4);
					$form->label("Classe");
					$form->input(['name' => 'classe', 'type' => 'text', 'class'=>'form-control', 'required'=>'true']);
				$form->col_();
				
				$form->_col(4);
					$form->label("Sistema de Jogo");
					$form->select(['class'=>'form-control', 'name'=>'sistema'], ['ded'=>'Dungeons and Dragons', '3det'=>'3D&T', 'deamon'=>'Deamon']);
				$form->col_();
				
				$form->_col(4);
					$form->label("Pré-requisito");
					$form->input(['name' => 'pre_requisito', 'type' => 'text', 'class'=>'form-control']);
				$form->col_();
				
				$form->_col(12);
					$form->label("Descrição");
					$form->area(['name' => 'descricao', 'class'=>'form-control', 'rows'=>'5']);
				$form->col_();
				
				$form->_col(4);
					$form->br();
					$form->link_button("Voltar", ROOTPATHURL.TALENTOSPATH);
					echo "  ";
					$form->input_submit(['class'=>'btn btn-default', 'type'=>'submit', 'name'=>'action', 'value'=>'Cadastrar']);
				$form->col_();
			$form->form_();
			
		$form->_container();
	$form->row_();

require_once '../../../footer.php';