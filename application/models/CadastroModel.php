<?php

class CadastroModel extends CI_Model{
	
	public function cadastrarCliente($dados){
		$query = $this->db->insert('clientes',$dados);
		if($query){
			return $this->db->insert_id();
		}
		else{
			return false;
		}
		
	}
	
	public function editar($id,$dados){
		$this->db->where("id",$id);
		$query = $this->db->update('clientes',$dados);
		if($query){
			return true;
		}
		else{
			return false;
		}
	}
	public function deletar($id){
		$this->db->where("id",$id);
		$query = $this->db->update('clientes',array('status'=>'0'));
		if($query){
			return true;
		}
		else{
			return false;
		}
	}
	
	
		
	
	
}

?>