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
}