<?php

define('SEPARETOR',"/");
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