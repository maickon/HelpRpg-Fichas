<?php
abstract class Item extends Db{
	protected $table;
	protected $path;
	protected $warning_msg;
	protected $danger_msg;
	protected $success_msg;
	protected $alert_msg;
	
	function __construct(
						$table, 
						$path, 
						$warning_msg, 
						$danger_msg = 'Um erro ocoreu, contate o administrador.', 
						$success_msg = 'Registro atualizado com sucesso.', 
						$alert = 'Já existe uma armadura com este nome!'
						){
		parent::__construct();
		$this->table = $table;
		$this->path = $path;
		$this->warning_msg = $warning_msg;
		$this->danger_msg = $danger_msg;
		$this->success_msg = $success_msg;
	}
	
	function create($params){
		$fields = [];
		$values = [];
		foreach($params as $key => $attr):
			if(!empty($attr) and ($attr != 'Cadastrar') and ($key != 'file_name')):
				if(!is_array($attr)):
					$this->$key = $attr;
					$fields[] = $key;
					$values[] = $attr;
				endif;
			endif;
		endforeach;
		
		if(isset($params['img']) && $params['img']['name'] != ''):
			$upload = new Upload($params['img'], 1000, 800, $this->path); 
			$upload->salvar();
	
			$fields[] = 'img';
			$values[] = $upload->getNome();
		endif;
			
		if($this->check_duplicate($values) != ' '):
			new Flashmsg('warning', $this->warning_msg);	
		elseif($this->insert($this->table, $fields, $values)):
			$this->save_file($params);
			new Flashmsg('success', $this->success_msg);
		else:
			new Flashmsg('danger', $this->danger_msg);
		endif;
	}
	
	function update_data($params, $file = true){
		$fields = [];
		$values = [];
		foreach($params as $key => $attr):
			if(!empty($attr) and ($attr != 'Atualizar') and ($key != 'old_file')):
				if(!is_array($attr)):
					$this->$key = $attr;
					$fields[] = $key;
					$values[] = $attr;
				endif;
			endif;
		endforeach;
		
		if($file):
			if(!empty($params['img'])):
				$upload = new Upload($params['img'], 1000, 800, $this->path); 
				$upload->salvar($params['old_file']);
				$fields[] = 'img';
				$values[] = $upload->getNome();
			elseif(!empty($params['old_file'])):
				if(empty($params['img'])):
					unlink($this->path.$params['old_file']);
					$fields[] = 'img';
					$values[] = '';
				endif;
			endif;
		endif;
		
		
		
		if($this->check_duplicate($values) != ' '):
			new Flashmsg('warning', $this->warning_msg);	
		elseif($this->update($this->table, $fields, $values, 'id', $params['id'])):
			$this->save_file($params);
			new Flashmsg('success', $this->success_msg);
		else:
			new Flashmsg('danger', $this->danger_msg);
		endif;
	}
	
	function delete_data($params){
		$msg = null;
		if($this->delete($this->table, [['id', '=', $params[0]['id']]])):
			if(isset($params[0]['img']) && !empty($params[0]['img']))
				unlink($this->path.$params[0]['img']);			
			$msg = 1;
		else:
			$msg = 0;
		endif;
		return $msg;;
	}
	
	function check_duplicate($values){
		$alert = ' ';
		$s = $this->select($this->table, ['nome']);
		for($i=0; $i<count($s); $i++):
			if($s[$i]['nome'] == $values[1]):
				$alert .= $this->alert_msg;
			endif;
		endfor;
		
		return $alert;
		
	}
	
	function save_file($params){
		$f = new Arquivo();
		$f->open_file(ROOTPATH.DOWNLOADPATH.$params['nome'].'.txt');
		$txt = "";
		foreach($params as $key => $value):
			if(empty($value) || $key == 'img' || $key == 'action'):
			else:
				$txt .= $key.': '.$value. "\n";
			endif;
		endforeach;
		$f->write_file($txt);
	}
	
	function destroy_file($name){
		if(unlink(ROOTPATH.DOWNLOADPATH.$name)):
			return true;
		else:
			trigger_error('Arquivo não foi salvo!',256);
		endif;
		
	}
}