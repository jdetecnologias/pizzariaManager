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
     $this->db->where("status<>",0);
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
  public function getMesaViaAjax($id){
    $this->db->select("numero, qtdLugares, descricao, id_mesa");
    $this->db->where("id_mesa",$id);
    
    $query = $this->db->get("mesas");
    if($query){
      return $query->result();
    }
    else{
      return false;
    } 
  }
  public function editarMesa($dados){
   $this->db->set("numero",$dados["numero"]);
    $this->db->set("qtdLugares",$dados["qtdLugares"]);
    $this->db->set("descricao",$dados["descricao"]);
    $this->db->where("id_mesa",$dados["id"]);
    $query = $this->db->update("mesas");
    if($query){
     return true;
    }
    else{
      return false;
    } 
  }
  public function deletarMesa($id){
    		$this->db->where("id_mesa",$id);
    
		$query = $this->db->update('mesas',array('status'=>'0'));
		if($query){
			return true;
		}
		else{
			return false;
		}
  }
}

?>