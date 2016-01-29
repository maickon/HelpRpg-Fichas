<?php
/**
 * @project Help rpg
 * @author Maickon Rangel
 * @date 02/07/2015
 * @contact maickon4developers@gmail.com
 * @version 1.0
 * @link https://github.com/helprpg-fichas
 * 
 * require_once 'config.php';
 * Chama o arquivo de configuracao
 **/

function config(){
	
	if(file_exists('config.php')):
		require_once 'config.php';
	elseif(file_exists('../../config.php')):
		require_once '../../config.php';
	else:
		require_once '../../../config.php';
	endif;
	/*
	$file = "config.php";
	$back_dir = "../";
	if(file_exists('config.php')):
		require_once 'config.php';
	else:
		while(!file_exists($file)):
			if(file_exists($file)):
				require_once $file;
			else:
				$file = $back_dir.$file;
				echo $file."<br>";
			endif;
		endwhile;
	endif;
	*/
}

/*
 * lib e uma pasta onde fica bibliotecas de terceiros 
 * a funcao lib faz o require de todos as  bibliotecas 
 * que estiverem especificadas no array $libs
 */

function lib(){
	$libs = ["fpdf/"];
	$lib_name = ["fpdf"];
	$out = 0;
	
	foreach($libs as $key => $file_name):
		if(file_exists('lib/'.$file_name.$lib_name[$key].'.php')):
			require_once 'lib/'.$file_name.$lib_name[$key].'.php';
		elseif(file_exists('../../lib/'.$file_name.$lib_name[$key].'.php')):
			require_once '../../lib/'.$file_name.$lib_name[$key].'.php';
		else:
			require_once '../../../lib/'.$file_name.$lib_name[$key].'.php';
		endif;
	endforeach;		
}

lib();
config();

/**
 * function __autoload()
 * Chama um arquivo de classe de forma automatica
 * no momento em que um objeto e instanciado
 * @class_name = nome do arquivo de classe. Este nome tem
 * que ser igual ao nome da classe.
 * CLASSPATH = Constante definida no arquivo config.php. Esta constante
 * contem o nome da pasta onde se encontram as classes.
 */
function __autoload($class_name){
	//lista de diretorios dentro de class/
	$class_dir = [
	"arquivo/","db/","rotas/","sessao/","view/","usuario/","armas/","upload/", 
	"armaduras/", "db_persistence/", "talentos/", "magias/", "pericias/", "personagens/",
	"artefatos/","aventuras/", "contos/","cenarios/","historias/","cronicas/", "bestiario/"];
	$out = 0;
	foreach($class_dir as $file_name):
		//verifica se existe o arquivo
		if(file_exists(ROOTPATH.CLASSPATH.$file_name.strtolower($class_name).'.class.php')):
			//O out verifica se houve carregamento, se sim ele recebe 1
			$out = 1;
			//se o arquivo existe, ele sera cerregado
			require_once ROOTPATH.CLASSPATH.$file_name.strtolower($class_name).'.class.php';
		elseif(file_exists(ROOTPATH.CLASSPATH.$file_name.strtolower($class_name).'.php')):
			//O out verifica se houve carregamento, se sim ele recebe 1
			$out = 1;
			//se o arquivo existe, ele sera cerregado - verifica arquivo de classe sem o .class
			require_once ROOTPATH.CLASSPATH.$file_name.strtolower($class_name).'.php';
		endif;
	endforeach;
	
	//Caso out seja 0 significa que a classe nao foi encontrada na lista de diretorios 
	//de $class_dir, dessa forma procuramos a classe um diretorio antes.
	if($out == 0):
		//se o arquivo nao existe, provavelmene ele nao esta sendo carregado da pasta raiz
		//por isso sera necessario voltar um diretorio, por isso os ../
		config();
		//verifica se o arquivo existe voltando um diretorio
		if(file_exists('../'.CLASSPATH.$class_name.'.class.php')):
			//se existe carrega
			require_once '../'.CLASSPATH.$class_name.'.class.php';
		else:
			//se nao conseguir carregar, exibe uma mensagem de erro
			echo '<br />';
			echo '<div class="alert alert-danger" role="alert">';
				echo 'Arquivo de classe não encontrado, verifique se a pasta da classe fui incluida na variável <b>$class_dir</b> dentro do arquivo <b>init.php</b>';
			echo '</div>';
		endif;
	endif;		
}

//instancia uma sessao
$s = new Session();
$tag = new Tags();
$form = new Form();