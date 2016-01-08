<?php
require_once '../../../header.php';
require_once '../helper.php';

global $tag, $form, $s, $parametros, $unserialize_monstro;

$s->restricted_access();

$show_monstro = new Personagens(ROOTPATH.MONSTROIMGPATH);
$objeto = $show_monstro->select($show_monstro->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);
$unserialize_monstro = unserialize($objeto[0]['dados']);

// echo '<pre>';
// print_r($unserialize_personagem);
// echo '</pre>';
$pass = helper_check_permitions($objeto[0]['dono']);

if($pass != 1)
	header("Location: ".ROOTPATHURL.MONSTROPATH);	

$tag->body('role="document"');

new Components('menu', $parametros);
$tag->br();
$tag->br();
	$form->_container();
		
		$old_file = $objeto[0]['img'];
		
		if(isset($_REQUEST['action'])):
			$form->_col(12);
				$create_monstro = new Personagens(ROOTPATH.MONSTROIMGPATH);	
				if(empty($_FILES['img']['name'])):
					$_REQUEST['img'] = '';
					$_REQUEST['old_file'] = $old_file;
				else:
					$_REQUEST['img'] = $_FILES['img'];
					$_REQUEST['old_file'] = $old_file;
				endif;
				$create_monstro->update_data(helper_params_personagem($_REQUEST));
			$form->col_();
		endif;
		
		$form->_col(10);
			$tag->span('class="span_title"');
				$tag->imprime(MONSTRO);
			$tag->span;
		$form->col_();
		$form->_col(1);
			$tag->a('href="'.ROOTPATHURL.MONSTROPATH.'view.php?id='.$_GET['id'].'" class="btn btn-success"');
				$tag->imprime(VER);
			$tag->a;
		$form->col_();
		$form->_col(1);
			$tag->a('href="'.ROOTPATHURL.MONSTROPATH.'" class="btn btn-info"');
				$tag->imprime(BACK);
			$tag->a;
		$form->col_();
		$tag->br();
		$tag->hr();
	$form->container_();

	$form->_row();
		$form->_container();
			$form->_form(['method'=>'post', 'name'=>'new-user', 'enctype'=>'multipart/form-data', 'class'=>'form-group', 'data-toggle'=>'validator']);
					require_once 'form/'.$rpg_sistemas_arquivo_nome[$objeto[0]['sistema']];
					helper_form_button_update_and_back(ROOTPATHURL.MONSTROPATH);
			$form->form_();
		$form->_container();
	$form->row_();
	
	$tag->div;
require_once '../../../footer.php';