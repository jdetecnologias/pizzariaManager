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
  	public function editarProduto($dados){
        $this->db->set($dados["dados"]);
        $this->db->where("id_produto",$dados["id"]);
        $query = $this->db->update("produto");
        
          if($query){
            return true;
          }
          else{
            return false;
          }
    
  }
  public function excluirProduto($id){
    $this->db->set("status",0);
    $this->db->where("id_produto",$id);
    $query = $this->db->update("produto");
      if($query){
        return true;
      }
      else{
        return false;
      }
    }
  public function getCategoriaProdutos(){
    $query = $this->db->get("categorias");
    if($query){
      return $query->result();
    }
    else{
      return false;
    }
  }
  
  public function getProdutos(){
    $this->db->where("produto.status",1);
    //$this->db->order_by('tipoProduto','asc');
    $this->db->join("categoriaProdutos","categoriaProdutos.id = produto.categoria","left");
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