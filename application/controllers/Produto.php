<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends MY_Controller {
public function getProdutos(){
    $this->load->model('exibirModel');
		$listaProduto = new exibirModel();
		$prod = $listaProduto->listaProdutos();
    if($prod == false){
      return false;
    }
  else{
    return $prod;
  }
		
}
  public function getPrecosPizzaPorTamanho(){//para requisições ajax.
    $this->load->model('produtoModel');
    $tamanho = $this->input->post("tamanho");
		$preparar = new produtoModel();
		$result = $preparar->getPrecosPizzaPorTamanho($tamanho);
    if($result == false){
      echo 0;
    }
  else{
    echo $result;
  }
		
}
}