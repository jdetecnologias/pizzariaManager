<?php

class AnotarPedidoModel extends CI_Model{
    private $insert_id= null;
    public function setInsertId($insert){
              $this->insert_id =  $insert;
        }
         public function getInsertId(){
                return $this->insert_id;
    }
	public function gravarPedido($dados){
			$query = $this->db->insert("pedido",$dados);
                        $this->setInsertId($this->db->insert_id());
			if($query){
			return true;
			}
			else{
			return false;
			}	
	}
	public function gravarItens($itens){
			$insert = $this->db->insert("itens",$itens);
			if($insert){
			return true;
			}
			else{
			return false;
			}
	}

}

?>