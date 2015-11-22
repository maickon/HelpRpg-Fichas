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
				$create_arma = new Armas(ROOTPATH.ARMASIMGPATH);
				$_REQUEST['img'] =  $_FILES['img'];
				$create_arma->create($_REQUEST);
			$form->col_();
		endif;
		
		$form->_col(11);
			$tag->span('class="span_title"');
				$tag->imprime(ARMAS);
			$tag->span;
		$form->col_();
		$form->_col(1);
			$tag->a('href="'.ROOTPATHURL.ARMASPATH.'" class="btn btn-info"');
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
					$form->label("Imagem");
					$form->input(['name' => 'img', 'type' => 'file', 'class'=>'form-control']);
				$form->col_();
					
				$form->_col(4);
					$form->label("Nome");
					$form->input(['name' => 'nome', 'type' => 'text', 'class'=>'form-control', 'required'=>'true']);
				$form->col_();

				$form->_col(4);
					$form->label("Level indicado");
					$form->input(['name' => 'lv', 'type' => 'text', 'class'=>'form-control']);
				$form->col_();
				
				$form->_col(4);
					$form->label("Dano");
					$form->input(['name' => 'dano', 'type' => 'text', 'class'=>'form-control']);
				$form->col_();
				
				$form->_col(4);
					$form->label("Preço/Custo");
					$form->input(['name' => 'preco', 'type' => 'text', 'class'=>'form-control']);
				$form->col_();
				
				$form->_col(4);
					$form->label("Decisivo");
					$form->input(['name' => 'decisivo', 'type' => 'text', 'class'=>'form-control']);
				$form->col_();
				
				$form->_col(4);
					$form->label("Distância");
					$form->input(['name' => 'distancia', 'type' => 'text', 'class'=>'form-control']);
				$form->col_();
				
				$form->_col(4);
					$form->label("Peso");
					$form->input(['name' => 'peso', 'type' => 'text', 'class'=>'form-control']);
				$form->col_();
				
				$form->_col(4);
					$form->label("Tipo");
					$form->select(['class'=>'form-control', 'name'=>'tipo'], ['atq_distancia'=>'Armas de Ataque à Distância', 'leve'=>'Armas Leves - Corpo a Corpo', 'uma_mao'=>'Armas de Uma Mão - Corpo a Corpo', 'duas_maos'=>'Armas de Duas Mãos - Corpo a Corpo']);
				$form->col_();
				
				$form->_col(4);
					$form->label("Iniciativa");
					$form->input(['name' => 'iniciativa', 'type' => 'text', 'class'=>'form-control']);
				$form->col_();
				
				$form->_col(4);
					$form->label("Pente");
					$form->input(['name' => 'pente', 'type' => 'text', 'class'=>'form-control']);
				$form->col_();
				
				$form->_col(4);
					$form->label("Sistema de Jogo");
					$form->select(['class'=>'form-control', 'name'=>'sistema'], ['ded'=>'Dungeons and Dragons', '3det'=>'3D&T', 'deamon'=>'Deamon']);
				$form->col_();
				
				$form->_col(4);
					$form->label("Categoria");
					$form->select(['class'=>'form-control', 'name'=>'categoria'], ['comum'=>'Arma Comum', 'exotica'=>'Arma Exótica', 'simples'=>'Arma Simples', 'tecnologica'=>'Arma Tecnológica']);
				$form->col_();
				
				$form->_col(12);
					$form->label("Descrição");
					$form->area(['name' => 'descricao', 'class'=>'form-control', 'rows'=>'5']);
				$form->col_();
				
				$form->_col(4);
					$form->br();
					$form->link_button("Voltar", ROOTPATHURL.ARMASPATH);
					echo "  ";
					$form->input_submit(['class'=>'btn btn-default', 'type'=>'submit', 'name'=>'action', 'value'=>'Cadastrar']);
				$form->col_();
			$form->form_();
			
		$form->_container();
	$form->row_();

require_once '../../../footer.php';