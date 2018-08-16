<?php

class PagamentoModel extends CI_Model{
  public function cadastrar($dados){
        $query = $this->db->insert("formasPagamento",$dados);
          if($query){
            return true;
          }
          else{
            return false;
          }
  }
  
  public function getFormasPagamento(){
   $this->db->where("status",1);
    $query = $this->db->get("formasPagamento");
   
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
  
  public function receber($dados){
    $this->db->select("status, preco, parcial");
    $this->db->where("id_pedido",$dados["numeroDocumento"]);
    $query = $this->db->get("pedido");
    $dadosPedido = $query->row();
    $status= $dadosPedido->status;
    $parcial = $dadosPedido->parcial;
    $valorPedido = $dadosPedido->preco;
    if($status == 1){
    $this->db->select("sum(valor) as valor");
    $this->db->where("numeroDocumento",$dados["numeroDocumento"]);
    $query = $this->db->get("financeiro");
    if($query->num_rows()<1){
      $valor = 0;
    }
    else{
      $valor =  $query->row();
      $valor = $valor->valor;
    }
      if($valor == $valorPedido){
        $this->db->set("status",0);
        $this->db->set("parcial",0);
        $this->db->where("id_pedido",$dados["numeroDocumento"]);
        $atualizar = $this->db->update("pedido");
        if($atualizar){
          $retorno["status"] = 0;
          $retorno["msn"] = "Não há mais saldos pendentes para este pedido";
        }
        else{
          $retorno["status"] = 0;
          $retorno["msn"] = "Não há mais saldos pendentes para este pedido de compra, mas o sistema não conseguiu atualizar a informação, tente novamente, se não conseguir, contactar o administrador!";
        }
      }
      else{
    $valorPendente =  $valorPedido - $valor;
       if($valorPendente == 0){
         $retorno["status"] = 0;
         $retorno["msn"] = "Não há valor a receber deste pedido";             }
      
      else if($valorPendente < 0){
         $retorno["status"] = 0;
         $retorno["msn"] = "Valor recebido superior ao valor do pedido, excesso de caixa";       
      }
      else{
         if($dados["valor"] <= $valorPendente){
           $receber = $this->db->insert("financeiro",$dados);
           if($receber){
             if($dados["valor"] == $valorPendente){
                $this->db->set("status",0);
               $this->db->set("parcial",0);
             }
             else{
                $this->db->set("status",1);
                $this->db->set("parcial",1);
             }
             $this->db->where("id_pedido",$dados["numeroDocumento"]);
             $atualizar = $this->db->update("pedido");
             if($atualizar){
               $retorno["status"] = 1;
               $retorno["msn"] = "Pedido recebido com sucesso";
               $retorno["valorPendente"] = round($valorPendente-$dados["valor"],2);
             }
           }
           else{
             $retorno["status"] = 0;
             $retorno["msn"] = "Não foi possível salvar os dados financeiro";
           }
         }
        else{
          $retorno["status"] = 0;
          $retorno["msn"] = "O valor a receber é superior ao valor pendente de pagamento";        }
      }
    }
  }
    else{
      $retorno["status"] = 0;
      $retorno["msn"] = "Pedido não está em aberto ou baixado parcial no sistema";
    }
    
    return $retorno;
  }
}

?>