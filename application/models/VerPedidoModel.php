<?php

class VerPedidoModel extends CI_Model{

	public function obterPedidos($codigoStatus,$dataMenor){
		
		$this->db->select("clientes.nome as nome, pedido.id_pedido as id_pedido, pedido.preco as preco, pedido.data_criacao as data_criacao,pedido.status as status,estatus.descricao as descricao"); 
		$this->db->from("pedido");
		$this->db->join("clientes","pedido.id_cliente = clientes.id","left");
		$this->db->join("estatus","pedido.status = estatus.codigo","left");
		$this->db->where("pedido.status",$codigoStatus);
		$this->db->where("pedido.data_criacao >=",$dataMenor);
    $this->db->where("pedido.tipoCliente",2);
    $query1 = $this->db->get_compiled_select();
    $this->db->select("mesas.numero, pedido.id_pedido, pedido.preco, pedido.data_criacao,pedido.status,estatus.descricao"); 
    $this->db->from("pedido");
		$this->db->join("mesas","pedido.id_cliente = mesas.id_mesa","left");
		$this->db->join("estatus","pedido.status = estatus.codigo","left");
		$this->db->where("pedido.status",$codigoStatus);
		$this->db->where("pedido.data_criacao >=",$dataMenor);
    $this->db->where("pedido.tipoCliente",1);
    $query2 = $this->db->get_compiled_select();
		$queries = $this->db->query($query1. ' UNION '. $query2);
    
		if($queries){
			
			return $queries->result();
			
			
		
		}
		else{
   
			return false;
		}
	}
	
		
	
	
}
