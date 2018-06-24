<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CadastrarProduto extends MY_Controller {
  
	
	public function index()
	{
    $this->load->model("ExibirModel");
    $prepararProduto = new ExibirModel();
    $produtos = $prepararProduto->listaProdutos();
		$this->load->view('inicio',array('formulario'=>'cadastrarProdutoView','produtos'=>$produtos));
	}
  public function finalizar(){
    $this->load->library("form_validation");
    $this->load->model("ProdutoModel");
    $this->form_validation->set_rules("categoria"," Categoria","required");
    $this->form_validation->set_rules("produto"," ","required");
    $this->form_validation->set_rules("sabor"," ","required");
    $categoria =  $this->input->post("categoria");
      $produto =  $this->input->post("produto");
      $sabor =  $this->input->post("sabor");
    if(isset($_POST['preco'])){
      $this->form_validation->set_rules("preco"," ","required");
      $preco = $this->input->post("preco");
    }
    else{
      $this->load->model("ExibirModel");
      $preparar = new ExibirModel();
      $result = $preparar->getPrecoPadrao();
      $preco = $result->preco;
    }
    $status = $this->form_validation->run();
    if(!$status){
      $this->load->view("inicio",array("retorno"=>7,"msn"=>"Favor preencher todos os campos!"));
    }
    else{
      
      
      $dadosDoProduto = array("tipoProduto"=>$produto,"sabor"=>$sabor,"categoria"=>$categoria,"valorUnitario"=>$preco);

      $preparar = new ProdutoModel();
      $status = $preparar->cadastrarProduto($dadosDoProduto);
      if($status){
        $this->load->view("inicio",array("retorno"=>7,"msn"=>"Produto Cadastrado com sucesso!"));
      }
        if($status){
        $this->load->view("inicio",array("retorno"=>7,"msn"=>"Erro ao cadastrar o produto!"));
      }
      
    }
  }
}