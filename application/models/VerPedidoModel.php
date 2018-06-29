<?php

class VerPedidoModel extends CI_Model{
	
	public function obterPedidos(){
		$this->db->where("status",1);
		$this->db->from("pedido");
		$this->db->join("clientes","pedido.id_cliente = clientes.id");
    
		$query = $this->db->get();
		if($query){
			return $query->result();
		}
		else{
			return false;
		}
	}
	
		
	
	
}