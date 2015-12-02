<?php
function helper_check_admin(){
	global $permit, $s;
	$super = null;
	//verificando permiçoes
	foreach($permit as $p):
		if($s->get_session('nome') == $p):
			$super = 1;
			return $super;
		else:
			$super = 0;
		endif;
	endforeach;
	
	return $super;
}