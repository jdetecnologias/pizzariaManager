<?php

class GerFinModel extends CI_Model{
   public function gravarBanco($dados){
    $query = $this->db->insert("fin",$dados);
  return $query;
  }
  public function AtualizarBanco($id,$campo,$valor){
    $this->db->set($campo,$valor);
    $this->db->where("id",$id);
    $this->db->update("fin");
  }
  public function getContas(){
    /* $mesVigente = $this->getMesAndAno();
    if($mesVigente == 9){
      
    }
    else if(!$mesVigente){
      
    }
    else{
   $mes = $mesVigente[0]->mes;
    $ano = $mesVigente[0]->ano;
    $this->db->where("mesAnoVigencia",$mes.$ano);*/
    $query = $this->db->get("fin");
    if($query->num_rows() <= 0){
      return 9;
    }
    else if(!$query){
      return false;
    }
    else{
      return $query->result_array();
    }
      
  }
  public function getMesAndAno(){
    $query = $this->db->get("mesVigente");
    if($query){
      if($query->num_rows() <= 0){
        return 9;
      }
      else{
       return $query->result();
      }
    }
    else{
      return false;
    }
   
  }
}

?>
