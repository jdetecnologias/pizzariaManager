<?php

class FinalizarPreparoModel extends CI_Model{
	
	public function  atualizarStatus($numeroPedido){
		$this->db->where("id_pedido",$numeroPedido);
		$query = $this->db->update("pedido",array("status"=>0));
		if($query){
			return true;
		}
		else{
			return false;
		}
		
	}
		

	
}

?>