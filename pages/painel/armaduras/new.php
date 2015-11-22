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
				$create_armadura = new Armaduras(ROOTPATH.ARMADURASIMGPATH);
				$_REQUEST['img'] =  $_FILES['img'];
				$create_armadura->create($_REQUEST);
			$form->col_();
		endif;
		
		$form->_col(11);
			$tag->span('class="span_title"');
				$tag->imprime(ARMADURAS);
			$tag->span;
		$form->col_();
		$form->_col(1);
			$tag->a('href="'.ROOTPATHURL.ARMADURASPATH.'" class="btn btn-info"');
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
					$form->label("Lv");
					$form->input(['name' => 'lv', 'type' => 'text', 'class'=>'form-control', 'required'=>'true']);
				$form->col_();
				
				$form->_col(4);
					$form->label("Preço/Custo");
					$form->input(['name' => 'custo', 'type' => 'text', 'class'=>'form-control']);
				$form->col_();
				
				$form->_col(4);
					$form->label("Bônus na CA/Defesa");
					$form->input(['name' => 'bonusNaCa', 'type' => 'text', 'class'=>'form-control']);
				$form->col_();
				
				$form->_col(4);
					$form->label("Destreza máxima");
					$form->input(['name' => 'destrezaMaxima', 'type' => 'text', 'class'=>'form-control']);
				$form->col_();
				
				$form->_col(4);
					$form->label("Penalidade em perícia");
					$form->input(['name' => 'penalidadeNaPericia', 'type' => 'text', 'class'=>'form-control']);
				$form->col_();
				
				$form->_col(4);
					$form->label("Falha de magia arcana");
					$form->input(['name' => 'falhaDeMagiaArcana', 'type' => 'text', 'class'=>'form-control']);
				$form->col_();
				
				$form->_col(4);
					$form->label("Deslocamento médio");
					$form->input(['name' => 'deslocamentoMedio', 'type' => 'text', 'class'=>'form-control']);
				$form->col_();
				
				$form->_col(4);
					$form->label("Deslocamento pequeno");
					$form->input(['name' => 'deslocamentoPequeno', 'type' => 'text', 'class'=>'form-control']);
				$form->col_();
				
				$form->_col(4);
					$form->label("Peso");
					$form->input(['name' => 'peso', 'type' => 'text', 'class'=>'form-control']);
				$form->col_();
				
				$form->_col(4);
					$form->label("Tipo");
					$form->select(['class'=>'form-control', 'name'=>'tipo'], ['simples'=>'Armadura simples', 'magica'=>'Armadura mágica']);
				$form->col_();
					
				$form->_col(4);
					$form->label("Sistema de Jogo");
					$form->select(['class'=>'form-control', 'name'=>'sistema'], ['ded'=>'Dungeons and Dragons', '3det'=>'3D&T', 'deamon'=>'Deamon']);
				$form->col_();
				
				$form->_col(4);
					$form->label("Categoria");
					$form->select(['class'=>'form-control', 'name'=>'categoria'], ['leve'=>'Armadura leve', 'media'=>'Armadura Média', 'pesada'=>'Armadura Pesada', 'exotica'=>'Armadura Exótica', 'tecnologica'=>'Armadura Tecnológica']);
				$form->col_();
				
				$form->_col(12);
					$form->label("Descrição");
					$form->area(['name' => 'descricao', 'class'=>'form-control', 'rows'=>'5']);
				$form->col_();
				
				$form->_col(4);
					$form->br();
					$form->link_button("Voltar", ROOTPATHURL.ARMADURASPATH);
					echo "  ";
					$form->input_submit(['class'=>'btn btn-default', 'type'=>'submit', 'name'=>'action', 'value'=>'Cadastrar']);
				$form->col_();
			$form->form_();
			
		$form->_container();
	$form->row_();

require_once '../../../footer.php';