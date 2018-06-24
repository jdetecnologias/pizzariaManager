<?php

class LoginModel extends CI_Model{
   public function logar($usuario,$senha){
     $this->db->select("id_usuario");
     $query = $this->db->get_where("usuarios",array("usuario"=>$usuario,"senha"=>$senha));
     $numLinhas = $query->num_rows();
      if($numLinhas > 0){
        return $query->result();
      }
      else{
      
        return false;
      }
                                     
     
     
   }

}

?>