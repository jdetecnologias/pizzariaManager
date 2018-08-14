<?php

class RelatoriosModel extends CI_Model{
  public function GetFin(){
    $this->db->select("numeroDocumento as DOC, Valor, formasPagamento.descricao as Pagamento");
    $this->db->join("formasPagamento","formasPagamento.id = financeiro.formaPagamento");
     $query = $this->db->get("financeiro");
    $return["tabela"] = $query->result_array();
    
    $this->db->select("sum(valor) as Total");
     $query = $this->db->get("financeiro");
    
    $return["total"] = $query->result_array();
    return $return;
    
  }

}

?>
