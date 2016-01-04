	<?php
require_once '../../../header.php';
require_once '../helper.php';

global $tag, $form, $s, $parametros, $rpg_sistemas_labels;
$s->restricted_access();

$tag->body('role="document"');

$tag->imprime('
	<script type="text/javascript" charset="utf-8">
		function get_info(sistema){
			if(sistema){
				//consele.log(sistema);
				chosed = sistema;
				var url = "?sistema="+sistema;
				request_http("GET", url, true);
			}
		}
	</script>');

new Components('menu', $parametros);
$tag->br();
$tag->br();
	$form->_container();
		if(isset($_REQUEST['action'])):
			$form->_col(12);
				$create_personagem = new Personagens(ROOTPATH.PERSONAGEMIMGPATH);
				$_REQUEST['img'] =  $_FILES['img'];
				$create_personagem->create(helper_params_personagem($_REQUEST));
			$form->col_();
		endif;
		
		$form->_col(5);
			$tag->span('class="span_title"');
				$sistema = '';
				isset($_GET['sistema']) ? $sistema = $rpg_sistemas_labels[$_GET['sistema']] : $sistema = 'Dungeons and Dragons 3.5';
				$tag->imprime(PERSONAGEM. ' <smal id="sistema-title"> Sistema: '. $sistema.'</smal>');
			$tag->span;
		$form->col_();
		
		$form->_col(5);
			$tag->form("onSubmit=\"get_info(maickon); return false\"");
				$form->_col(1);
				$form->col_();
				$form->_col(9);
					helper_form_select_options("", ["name" => "sistema", "id" => "sistema", "class" => "selectpicker", "data-live-search" => "true"], $rpg_sistemas);
				$form->col_();
				$form->_col(2);
					$form->input_submit(["value" => "Carregar", "type" => "submit", "class" => "btn btn-default"]);	
				$form->col_();
			$tag->form;
		$form->col_();
		
		$form->_col(2);
			$objeto = null;
			$tag->a('href="'.ROOTPATHURL.PERSONAGEMPATH.'" class="btn btn-info"');
				$tag->imprime(BACK);
			$tag->a;
		$form->col_();
		
		helper_new_line_in_form();
		
		$tag->br();
		$tag->hr();
		
		$tag->br();
		$form->_row();
			$form->_container();
				$form->_form(['method'=>'post', 'name'=>'new-user', 'enctype'=>'multipart/form-data', 'class'=>'form-group', 'data-toggle'=>'validator']);
					$file  = helper_name_of_form_file(isset($_GET['sistema'])?$_GET['sistema']:'Dungeons and Dragons 3.5');
					
					require_once "form/{$file}";
					helper_form_button_submit_and_back(ROOTPATHURL.PERSONAGEMPATH);
				$form->form_();	
			$form->_container();
		$form->row_();
					
	$form->container_();
	$tag->div;
require_once '../../../footer.php';