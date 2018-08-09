<?php

class VerPedidoModel extends CI_Model{

	public function obterPedidos($codigoStatus,$dataMenor){
		
		$this->db->select("clientes.nome as nome, pedido.id_pedido as id_pedido, pedido.preco as preco, pedido.data_criacao as data_criacao,pedido.status as status,estatus.descricao as descricao,formasPagamento.descricao as formaPagamento"); 
		$this->db->from("pedido");
		$this->db->join("clientes","pedido.id_cliente = clientes.id","left");
		$this->db->join("estatus","pedido.status = estatus.codigo","left");
    $this->db->join("formasPagamento","pedido.formaPagamento = formasPagamento.id","left");
		$this->db->where("pedido.status",$codigoStatus);
		$this->db->where("pedido.data_criacao >=",$dataMenor);
    $this->db->where("pedido.tipoCliente",2);
    $query1 = $this->db->get_compiled_select();
    $this->db->select("mesas.numero, pedido.id_pedido, pedido.preco, pedido.data_criacao,pedido.status,estatus.descricao,formasPagamento.descricao"); 
    $this->db->from("pedido");
		$this->db->join("mesas","pedido.id_cliente = mesas.id_mesa","left");
		$this->db->join("estatus","pedido.status = estatus.codigo","left");
     $this->db->join("formasPagamento","pedido.formaPagamento = formasPagamento.id","left");
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
  public function getPedido($id){
  $this->db->select("itens.preco, itens.id_produto, produto.tipoProduto, produto.sabor");
    $this->db->where("itens.id_pedido",$id);
    $this->db->from("itens");
    $this->db->join("pedido","itens.id_pedido = pedido.id_pedido");
    $this->db->join("produto","itens.id_produto = produto.id_produto");
    $query = $this->db->get();
    if(!$query){
      return false;
    }
    else if($query->num_rows()<=0){
      return 9;
    }
    else{
      return $query->result_array();
    }
    
  }
	
		
	public function cancelarPedido($id){
    $this->db->set("status",2);
    $this->db->where("id_pedido",$id);
    $query = $this->db->update("pedido");
    return $query;
  }
	
}
