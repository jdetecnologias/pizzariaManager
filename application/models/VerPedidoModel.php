<?php

class VerPedidoModel extends CI_Model{
	
	public function obterPedidos(){
    //$this->db->query("select clientes.nome , pedido.id_pedido, pedido.preco, pedido.data_criacao
   // from pedido inner join clientes on pedido.id_cliente = clientes.id");
		//$this->db->where("status",1);
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