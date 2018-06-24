<?php

class ProdutoModel extends CI_Model{

	public function cadastrarProduto($dados){
        $query = $this->db->insert("produto",$dados);
        
          if($query){
            return true;
          }
          else{
            return false;
          }
    
  }
  public function getCategoriaProdutos(){
    $query = $this->db->get("categoriaProdutos");
    if($query){
      return $query->result();
    }
    else{
      return false;
    }
  }
  
  public function getProdutos(){
    
    $this->db->order_by('tipoProduto','asc');
    
    $query = $this->db->get("produto");
    
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
  public function getPrecosPizzaPorTamanho($tamanho){
    $this->db->where("tamanho",$tamanho);
    $query = $this->db->get("precos");
    if($query){
      $linha =  $query->row();
      return $linha->preco;
    }
    else{
      return false;
    }
  }
	
}

?>