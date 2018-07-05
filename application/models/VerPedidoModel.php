<?php

class VerPedidoModel extends CI_Model{

	public function obterPedidos($codigoStatus,$dataMenor){
		
		$this->db->select("clientes.nome, pedido.id_pedido, pedido.preco, pedido.data_criacao,pedido.status,estatus.descricao"); 
		$this->db->from("pedido");
		$this->db->join("clientes","pedido.id_cliente = clientes.id","left");
		$this->db->join("estatus","pedido.status = estatus.codigo","left");
		$this->db->where("pedido.status",$codigoStatus);
		$this->db->where("pedido.data_criacao >=",$dataMenor);
		$query = $this->db->get();
		if($query){
			
			return $query->result();
			
			
		
		}
		else{
			return false;
		}
	}
	
		
	
	
}
