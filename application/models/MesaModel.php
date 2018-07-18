<?php

class MesaModel extends CI_Model{
  public function cadastrar($dados){
        $query = $this->db->insert("mesas",$dados);
          if($query){
            return true;
          }
          else{
            return false;
          }
  }
  public function getMesas(){
    $this->db->join("statusMesas","statusMesas.id_status = mesas.status","left");
    $query = $this->db->get("mesas");
   
    if($query){
      if($query->num_rows()<=0){
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