<?php

class ExibirModel extends CI_Model{
	
	public function clientes(){
		$query = $this->db->query("select * from clientes where status = 1");

		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return false;
		}
	}
	
	public function listaProdutos(){
		$this->db->order_by('sabor','asc');
		$query = $this->db->get('produto');
		
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return false;
		}
	}
	public function getTipo(){
			$this->db->select("tipoProduto");
			$this->db->distinct();
			$this->db->group_by("tipoProduto");
			$query = $this->db->get("produto");
			
			if($query){
				return $query->result();
			}
			else{
				return false;
			}
		
	}
	
	public function getClienteByTelefone($telefone){
		$this->db->where("telefone",$telefone);
    $this->db->where("status",1);
		$query = $this->db->get("clientes");
		if($query->num_rows() == 0){
			return false;
		}
		else{
			return $query->result();
		}
	}	
  
  public function getPrecos(){
		$query = $this->db->get("precos");
		if($query->num_rows() == 0){
			return false;
		}
		else{
			return $query->result();
		}
	}	
  
  public function getPrecoPadrao(){
    $this->db->where("tamanho","G");
		$query = $this->db->get("precos");
		if($query->num_rows() == 0){
			return false;
		}
		else{
			return $query->row();
		}
	}	
	
	
}

?>