<?php

class FinalizarPreparoModel extends CI_Model{
	
	public function  atualizarStatus($numeroPedido){
      if(isset($numeroPedido)){
        $this->db->where("id_pedido",$numeroPedido);
        $this->db->set("status",0);
        $query = $this->db->update("pedido");
        if($query){
          return true;
        }
        else{
          return false;
        }

    }
    else{
        return false;
    }
  }
		

	
}

?>