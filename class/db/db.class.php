<?php

/**
 * @project PainelAdm
 * @author Maickon Rangel
 * @date 02/07/2015
 * @contact maickon4developers@gmail.com
 * @version 1.0
 * @link https://github.com/maickon/PainelAdm
 *
 * Db.class.php
 * Esta classe estabelece um conex�o ativa com o banco de dados no seu construtor
 * e atrav�s dos seus m�todos podemos estabelecer opera��es b�sicas no banco de dados
 * como inserir, deletar, listar e buscar usu�rio.
 * 
 * Obs: As configura��es de usuario e senha do banco de dados est�o no arquivo de
 * configura��o. 
 */

class Db{
    private $conn, $dns, $db, $db_type, $host, $user, $pass;
    
    public function __construct(){
        if($this->checkDatabaseIsActive()):
            $this->db = DB_NAME;
            $this->db_type = "mysql";
            $this->host = DB_HOST;
            $this->user = DB_USER;
            $this->pass = DB_PASS;

            $this->dns = $this->db_type . ":host=" . $this->host . ";dbname=" . $this->db;

            try{
                $this->conn = new PDO($this->dns, $this->user, $this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"));
            }catch(PDOException $ex){
                die("Error to connect with Database");
            }
        endif;
    }
    
    public function checkDatabaseIsActive(){
        if(defined('DB_NAME') && defined('DB_HOST') && defined('DB_USER') && defined('DB_PASS') && (DB_NAME != '')):
            return true;
        else:
        	die("Database is not configured");
            return false;
        endif;
    }
    
    protected function __createTable($table, $columnsParams){
        $q = "CREATE TABLE IF NOT EXISTS $table (";
        
        foreach($columnsParams as $key => $columnParam):
            if($key > 0):
                $q .= ", ";
            endif;
            
            $q .= $columnParam;
        endforeach;
        
        $q .= ")";
       
        $result = ($this->conn->exec($q) == 0) ? ($this->conn->errorInfo()) : $this->conn->exec($q);
        print_r($result);
        if(is_array($result)):
            echo $result[2];
        else:
            return $result;
        endif;
    }

    protected function __checkTableExists($table){
        $tables = $this->conn->query("SHOW TABLES LIKE '$table'");
        if($tables->rowCount() > 0):
            return true;
        else:
            return false;
        endif;
    }

    protected function __insert($table, $fields, $values){
        if($this->__checkTableExists($table)):
            if(count($fields) == count($values)):
                $s = 'INSERT INTO ' . $table . ' (';

                foreach($fields as $key => $field):
                    if($key == 0):
                        $s .= $field;
                    else:
                        $s .= ", " . $field;
                    endif;
                endforeach;

                $s .= ') VALUES (';

                for($i = 0; $i < count($fields) - 1; $i++):
                    $s .= '?, ';
                endfor;

                $s .= '?)';
				
                $s = $this->conn->prepare($s);
       	
                foreach($values as $key => $value):
                    $s->bindValue($key + 1, $value);
                endforeach;
				
               if($s->execute()):
               		return true;
               else:
               		trigger_error('Ocorreu um erro ao inserir na tabela '.$table.'.', 256);
               endif;
            elseif(count($fields) != count($values)):
                trigger_error('__inser() erro: $fields e $values precisam ter o mesmo tamaho.', 256);
            	return false;           
            endif; 	
        else:
            trigger_error('Tabela <code>' . $table . '</code> não existe.', 256);
        	return false;
        endif;
    }
    
    protected function __update($table, $fields, $values, $whereField, $whereValue){
        if($this->__checkTableExists($table)):
            if(count($fields) == count($values)):
                $s = 'UPDATE ' . $table . ' SET ';

                foreach($fields as $key => $field):
                    if($key == 0):
                        $s .= $field . ' = ?';
                    else:
                        $s .= ", " . $field . ' = ?';
                    endif;
                endforeach;

                $s .= ' WHERE ' . $whereField . ' = ?';
               
                $s = $this->conn->prepare($s);

                foreach($values as $key => $value):
                    $s->bindValue($key + 1, $value);
                endforeach;
                
                $s->bindValue( count($values) + 1 , $whereValue);
                if($s->execute()):
                	return true;
                else:
                	trigger_error('Ocorreu um erro ao inserir na tabela '.$table.'.', 256);
                endif;
                
            elseif(count($fields) != count($values)):
                trigger_error('__update() error: $fields e $values deve ter o mesmo tamanho.');
            endif;
        else:
            trigger_error('Tabela <code>' . $table . '</code> não existe.');
        endif;
    }
    
    private function __select($table, $columns = null, $where = null, $logical = 'AND'){
        if($this->__checkTableExists($table)):
            $s = 'SELECT ';
            
            if($columns == null):
                $s .= '*';
            else:
                foreach ($columns as $key => $column):
                    if($key == 0):
                        $s .= $column;
                    else:
                        $s .= ", " . $column;
                    endif;
                endforeach;
            endif;
            
            $s .= ' FROM ' . $table;
           
            if($where == null):
                $s = $this->conn->prepare($s);
            else:
                if($logical != 'OR'):
                    $logical = 'AND';
                endif;
            
                $s .= ' WHERE ';
                
                $i = 1;
                if(isset( $where[0] ) && is_array( $where[0])):
                    foreach($where as $param):
                        if($i == 1):
                            $s .= $param[0] .' '. $param[1] . ' ? ';
                        else:
                            $s .= $logical .' '. $param[0] .' '. $param[1] . ' ? ';
                        endif;
                        $i++;
                    endforeach;
                    
                    $s = $this->conn->prepare($s);
                
                    $i = 1;
                    foreach($where as $param):
                        $s->bindValue($i, $param[2]);
                        $i++;
                    endforeach;

                else:
                    foreach($where as $field => $value):
                        if($i == 1):
                            $s .= $field . ' LIKE ? ';
                        else:
                            $s .= $logical . ' ' . $field . ' LIKE ? ';
                        endif;
                    $i++;
                    endforeach;

                    $s = $this->conn->prepare($s);

                    $i = 1;
                    foreach($where as $field => $value):
                        $s->bindValue($i, $value);
                        $i++;
                    endforeach;
                endif;
            endif;
            
          
            if($s->execute()):
                if($s->rowCount() > 0):
                    return $s->fetchAll(PDO::FETCH_ASSOC);
                else:
                    return array();
                endif;
            else:
                return array();
            endif;
        else:
            die('The table <code>' . $table . '</code> does not exist.');
        endif;
    }
    
    private function __delete($table, $where = null, $logical = 'AND'){
        if($this->__checkTableExists($table)):
            $s = 'DELETE FROM ' . $table;
                                    
            if($where == null):
                $s = $this->conn->prepare($s);
            else:
                if($logical != 'OR'):
                    $logical = 'AND';
                endif;
                
                $s .= ' WHERE ';
                
                $i = 1;
                if(isset( $where[0] ) && is_array( $where[0])):
                    foreach ($where as $param):
                        if($i == 1):
                            $s .= $param[0] .' '. $param[1] . ' ? ';
                        else:
                            $s .= $logical .' '. $param[0] .' '. $param[1] . ' ? ';
                        endif;
                        $i++;
                    endforeach; 

                    $s = $this->conn->prepare($s);
                
                    $i = 1;
                    foreach($where as $param):
                        $s->bindValue($i, $param[2]);
                        $i++;
                    endforeach;

                else:
                    foreach($where as $field => $value):
                        if($i == 1):
                            $s .= $field . ' LIKE ? ';
                        else:
                            $s .= $logical . ' ' . $field . ' LIKE ? ';
                        endif;
                    $i++;
                    endforeach;

                    $s = $this->conn->prepare($s);
                    
                    $i = 1;
                    foreach($where as $field => $value):
                        $s->bindValue($i, $value);
                        $i++;
                    endforeach;
                endif;
            endif;
                        
            if($s->execute()):
            	return true;
            else:
            	trigger_error('Ocorreu um erro ao deletar na tabela '.$table.'.', 256);
            endif;
            
        else:
            trigger_error('Tabela <code>' . $table . '</code> não existe.');
        endif;
    }
    
    function check_duplicate($table, $fields, $values){
    	if($this->__checkTableExists($table)):
    		$s = "SELECT count(*) from {$table} WHERE ";
    		
    		for($i=0; $i<count($fields); $i++):
    			if(end($fields) == $fields[$i]):
    				$s .= "$fields[$i] = '$values[$i]' ";
    			else:
    				$s .= " $fields[$i] = '$values[$i]' AND ";
    			endif;
    		endfor;
    		
    		return $this->conn->query($s)->fetchColumn();
    	 else:
         	trigger_error('Tabela <code>' . $table . '</code> não existe.');
        endif;
    }
      
    public function createTable($table, $columnsParams){        
        return $this->__createTable($table, $columnsParams);
    }
    
    public function insert($table, $fields, $values){        
        return $this->__insert($table, $fields, $values);
    }
    
    public function update($table, $fields, $values, $whereField, $whereValue){        
        return $this->__update($table, $fields, $values, $whereField, $whereValue);
    }
    
    public function select($table, $columns = null, $where = null, $logical = 'AND'){
        return $this->__select($table, $columns, $where, $logical);
    }
    
    public function delete($table, $where = null, $logical = 'AND'){
        return $this->__delete($table, $where, $logical);
    }
}