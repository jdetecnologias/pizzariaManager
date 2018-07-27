<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CadastrarProduto extends MY_Controller {
  private $produto;
  private $sabor;
  private $categoria;
  private $dados;
  private $preco;
  private $id;
  	public function index($var = null){
  $this->load->library("ComponentesHtml");
    $html = new ComponentesHtml();
    $produtos = $html->tableProdutos();
    $var["retorno"] = 7;
    $var["produtos"] = $produtos;
		$this->load->view('inicio',$var);
	}
  public function setVariaveis(){
    $this->produto = $this->input->post("produto");
    $this->sabor = $this->input->post("sabor");
    $this->categoria = $this->input->post("categoria");
    if($this->input->post("idProd")!== null){
      $this->id = $this->input->post("idProd");
    }
     if($this->input->post("preco") !== null){
      $this->preco = $this->input->post("preco");
    }
    else{
      $this->load->model("ExibirModel");
      $preparar = new ExibirModel();
      $result = $preparar->getPrecoPadrao();
      $this->preco = $result->preco;
    }
    $this->dados = array("dados"=>array("tipoProduto"=>$this->produto,"sabor"=>$this->sabor,"categoria"=>$this->categoria,"valorUnitario"=>$this->preco),"id"=>$this->id);
  }
  
  public function validacao(){
    $this->form_validation->set_rules("categoria","Categoria","required",array("required"=>"É obrigatório a %s do produto"));
    $this->form_validation->set_rules("produto","Produto","required",array("required"=>"É obrigatório a descrição do %s"));
    $this->form_validation->set_rules("sabor","Sabor","required",array("required"=>"É obrigatório o %s do produto"));
    if($this->input->post("preco") !== null){
      $this->form_validation->set_rules("preco"," ","required",array("required"=>"O campo %s deve ser preenchido"));
    }
    if($this->form_validation->run()){
      return true;
    }
    else{
      $erro = validation_errors();
      $msn = "<div class='alert alert-danger'>".$erro."</div>";
      $this->index(array("msn"=>$msn));
      return false;
    }
    
  }
	public function crud(){
    $acao = $this->input->post("acao");
    switch($acao){
      case "Cadastrar":
        $this->cadastrar();
        break;
      case "Editar":
        $this->editar();
        break;
         case "Deletar":
        $this->deletar();
        break;
    }
  }

  public function cadastrar(){
    if(!$this->validacao()){}
    else{
      $this->load->model("ProdutoModel");
      $this->setVariaveis();
      $preparar = new ProdutoModel();
      $status = $preparar->cadastrarProduto($this->dados);
      if($status){
        $msn = "<div class='alert alert-success'>Produto Cadastrado com sucesso</div>";
      }
        else{
        $msn = "<div class='alert alert-danger'Erro ao cadastrar o produto</div>";
      }
      $this->index(array("msn"=>$msn));
      
    }
  }
    public function editar(){
    if(!$this->validacao()){}
    else{
      $this->load->model("ProdutoModel");
      $this->setVariaveis();
      $preparar = new ProdutoModel();
      $status = $preparar->editarProduto($this->dados);
       if($status){
        $msn = "<div class='alert alert-success'>Produto alterado com sucesso</div>";
      }
        else{
        $msn = "<div class='alert alert-danger'Erro ao alterar o produto</div>";
      }
      $this->index(array("msn"=>$msn));
      
    }
  }
  public function deletar(){
     $this->setVariaveis();
      $this->load->model("ProdutoModel");
      $this->setVariaveis();
      $preparar = new ProdutoModel();
      $status = $preparar->excluirProduto($this->dados["id"]);
       if($status){
        $msn = "<div class='alert alert-success'>Produto excluído com sucesso</div>";
      }
        else{
        $msn = "<div class='alert alert-danger'Erro ao excluir o produto</div>";
      }
      $this->index(array("msn"=>$msn));
  }
}