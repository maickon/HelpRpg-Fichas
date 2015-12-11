<?php
	
//Definindo constantes para os caminhos base
define('CLASSPATH', "class/");
define('JSPATH', "js/");
define('CSSPATH', "css/");
define('IMGPATH', "img/");
define('HOMEPATH', "pages/home");
define('ROOTPATH',"C:/xampp/htdocs/HelpRpg/"); 			
define('ROOTPATHURL',"http://127.0.0.1/HelpRpg/");		
define('SEPARETOR',"/");
define('ABOUTPATH', ROOTPATHURL."pages/sobre/");
define('HOWTOUSE', 'pages/como-usar/');
define('DOWNLOADPATH','arquivos/');
define('NPCGENERATEPATH','http://helprpg.com.br/old/index.php?p=fichas');
define('MONSTERGENERATEPATH','http://helprpg.com.br/old/index.php?p=monstros');
define('ROLLDICE','http://helprpg.com.br/roll-dice');

//url login
define('LOGINPATH', ROOTPATHURL."pages/login");

//URL - Usuarios
define('USERPATH',ROOTPATHURL."pages/usuario/");
define('USERSLISTPATH',ROOTPATHURL."pages/usuario/users.php");
define('USERNEWPATH',ROOTPATHURL."pages/usuario/new.php");
define('USEREDITPATH',ROOTPATHURL."pages/usuario/edit.php");
define('USERDELETEPATH',ROOTPATHURL."pages/usuario/delete.php");
define('USEREVIEWPATH',ROOTPATHURL."pages/usuario/view.php");
define('USERPASSPATH',ROOTPATHURL."pages/usuario/pass.php");

// Retorna o dominio do servidor
define('SERVER_NAME',$_SERVER['SERVER_NAME'].SEPARETOR); //127.0.0.1

// Retorna o path do arquivo onde esta sendo executado
define('PHP_SELF',$_SERVER['PHP_SELF']); //PainelAdm/index.php

// Retorna o path do pasta onde esta sendo executado
define('DOCUMENT_ROOT',$_SERVER['DOCUMENT_ROOT']); //C:/xampp/htdocs

// Retorna o path do arquivo onde esta sendo executado o script
define('SCRIPT_FILENAME',$_SERVER['SCRIPT_FILENAME']); //C:/xampp/htdocs/PainelAdm/index.php

// Retorna o path e nome do arquivo que esta executando
define('SCRIPT_NAME',$_SERVER['SCRIPT_NAME']); ///PainelAdm/index.php
	
$path = $_SERVER['SCRIPT_FILENAME'];
$path_parts = pathinfo($path);
// retorna o path absoluto do diretorio no servidor
define('DIRNAME',$path_parts['dirname']."/"); //C:/xampp/htdocs/helpRpg

// retorna o nome do arquivo com extensão
define('BASENAME',$path_parts['basename']); //index.php

// retorna a extensao do arquivo
define('EXTENSION',$path_parts['extension']); //php

// retorna o nome do arquivo sem extensão
define('FILENAME',$path_parts['filename']); //index

//Actions - links de acao do sistema
define('ACTION_LOGIN', "login");

//File - Links de arquivos do sistemas
define('LOGIN_PATH', ROOTPATHURL.'pages/login/');
define('LOGIN_VALIDATION_PATH', ROOTPATHURL.'pages/login/login.php');
define('LOGOFF_PATH', 'pages/login/logoff.php');
define('HOME_PATH', 'pages/home/');
define('PAINEL_PATH', ROOTPATHURL.'pages/painel/');
define('BASE_PATH', 'http://127.0.0.1/HelpRpg/'); //http://helprpg.com.br

//Usu�rio e senha do banco de dados
define('DB_USER', "root");		
define('DB_PASS', "");	  		
define('DB_NAME', "helprpg"); 	
define('DB_HOST', "localhost");


//msgs para usuarios
define('U4004', 'Usuário não encontrado!');
define('U4005', 'Cadastro realizado com sucesso!');
define('U4006', 'Email ou login já está em uso.');
define('U4007', 'Dados deletado com sucesso!');
define('U4008', 'Alteração feita com sucesso!');


//Nome/Titulo do site/projeto
define('PROJECTTITLE', "Help RPG Fichas");
define('PROGRAMER', 'Desenvolvido por <a href="http://www.mrcurriculo.orgfree.com/" target="blank">Maickon Rangel</a> todos os direitos reservados');
define('COPY', "&copy 2013-2015");

//Labels de menu no painel adm
define('NOVO', "Novo");
define('EDITAR', "Editar");
define('DELETAR', "Apagar");
define('VER', "Visualizar");
define('DOWNLOAD','Baixar');
//botoes
define("BACK", "Voltar");


define('CADASTRAR', "Cadastrar");
define('AVENTURAS', "Aventuras");

//lista de superusuarios do sistema
global $permit, $rpg_sistemas, $rpg_sistemas_arquivo_nome;

//variaveis globas no sitema
$permit  = ['root','Maickon'];
$rpg_sistemas_arquivo_nome = [
							'ded'=>'d20-ded.php',
							'ded-4.0'=>'d20-ded-4.0.php',
							'ded-5.0'=>'d20-ded-5.0.php',
							'fate'=>'fate.php',
							'savage_worlds'=>'savage_worlds.php',
							'3det'=>'3det.php', 
							'deamon'=>'daemon.php'];

$rpg_sistemas = [
				'ded'=>'Dungeons and Dragons 3.5',
				'ded-4.0'=>'Dungeons and Dragons 4.0',
				'ded-5.0'=>'Dungeons and Dragons 5.0',
				'fate'=>'FATE',
				'savage_worlds'=>'Savage Worlds',
				'3det'=>'3D&T', 
				'deamon'=>'Deamon'];

require_once 'termos/3det.php';
require_once 'termos/d20.php';
require_once 'termos/deamon.php';
require_once 'termos/d20-ded-4.0.php';
require_once 'termos/d20-ded-5.0.php';
require_once 'termos/fate.php';
require_once 'termos/itens.php';
require_once 'termos/magias.php';
require_once 'termos/pericias.php';