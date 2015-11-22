<?php
require_once '../../../header.php';
require_once '../helper.php';

global $tag, $form, $s, $parametros;
$s->restricted_access();

$tag->body('role="document"');

new Components('menu', $parametros);
$tag->br();
$tag->br();
	$form->_container();
		if(isset($_REQUEST['action'])):
			$form->_col(12);
				$create_personagem = new Personagens(ROOTPATH.PERSONAGEMIMGPATH);
				//echo '<pre>';
					//$r = helper_params_personagem($_REQUEST);
					//print_r($r);
				//echo '</pre>';
				$_REQUEST['img'] =  $_FILES['img'];
				$create_personagem->create(helper_params_personagem($_REQUEST));
			$form->col_();
		endif;
		
		$form->_col(11);
			$tag->span('class="span_title"');
				$tag->imprime(PERSONAGEM);
			$tag->span;
		$form->col_();
		$form->_col(1);
			$tag->a('href="'.ROOTPATHURL.PERSONAGEMPATH.'" class="btn btn-info"');
				$tag->imprime(BACK);
			$tag->a;
		$form->col_();
		$tag->br();
		$tag->hr();
	
	
		$tag->imprime('
				<script type="text/javascript" charset="utf-8">
					$(\'#myTabs a\').click(function (e) {
					  e.preventDefault()
					  $(this).tab(\'show\')
					})
				
				$(\'#myTabs a[href="#profile"]\').tab(\'show\') // Select tab by name
				$(\'#myTabs a:first\').tab(\'show\') // Select first tab
				$(\'#myTabs a:last\').tab(\'show\') // Select last tab
				$(\'#myTabs li:eq(2) a\').tab(\'show\') // Select third tab (0-indexed)
				</script>');
		
		tabs( [
				['role' => 'D&d', 'href' => '#ded', 'aria-controls' => 'ded'],
				['role' => 'Deamon', 'href' => '#deamon', 'aria-controls' => 'deamon'],
				['role' => '3d&T', 'href' => '#3det', 'aria-controls' => '3det']
			  ]
			);
		panes([
				['id' => 'ded', 'active' => true, 'require' => 'form/d20-ded.php'],
				['id' => 'deamon', 'active' => false, 'require' => 'form/daemon.php'],
				['id' => '3det', 'active' => false, 'require' => 'form/3det.php']
			 ]);
		
		$tag->br();
		$tag->br();
		$tag->br();
	$form->container_();
require_once '../../../footer.php';