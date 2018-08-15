<?php

class RelatoriosModel extends CI_Model{
  public function GetFin(){
    $this->db->select("numeroDocumento as DOC, Valor, formasPagamento.descricao as Pagamento");
    $this->db->join("formasPagamento","formasPagamento.id = financeiro.formaPagamento");
     $query1 = $this->db->get("financeiro");
    $return["tabela"] = $query1->result_array();
    
    $this->db->select("sum(valor) as Total");
     $query2 = $this->db->get("financeiro");
    
    $return["total"] = $query2->result_array();
    return $return;
    
  }

}

?>
