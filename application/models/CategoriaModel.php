<?php

class CategoriaModel extends CI_Model{
  public function cadastrar($dados){
        $query = $this->db->insert("categoriaProdutos",$dados);
          if($query){
            return true;
          }
          else{
            return false;
          }
  }
  public function getcategorias(){
   $this->db->where("status",1);
    $query = $this->db->get("categoriaProdutos");
   
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
 
  public function editar($dados){
   $this->db->set("categoria",$dados["categoria"]);
    $this->db->set("descricao",$dados["descricao"]);
    $this->db->where("id",$dados["id"]);
    $query = $this->db->update("categoriaProdutos");
    if($query){
     return true;
    }
    else{
      return false;
    } 
  }
  public function deletar($id){
    		$this->db->where("id",$id);
    $this->db->set("status",0);
		$query = $this->db->update('categoriaProdutos');
		if($query){
			return true;
		}
		else{
			return false;
		}
  }
}

?>