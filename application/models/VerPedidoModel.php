<?php

class VerPedidoModel extends CI_Model{
	
	public function obterPedidos(){
    $this->db->select("clientes.nome, pedido.id_pedido, pedido.preco, pedido.data_criacao, pedido.status,estatus.descricao");
		$this->db->from("pedido");
		$this->db->join("clientes","pedido.id_cliente = clientes.id");
    $this->db->join("estatus","estatus.id = pedido.status");
    
		$query = $this->db->get();
		if($query){
			return $query->result();
		}
		else{
			return false;
		}
	}
	
		
	
	
}