<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends MY_Controller {
  private $categoria;
  private $descricao;
  private $dados;
  public function index($var = null){
    $this->load->library("ComponentesHtml");
    $html = new ComponentesHtml();
    $var["retorno"] = 12;
    $var["form"] = 9;
    $var["categorias"]  = $html->tableCategorias();
    $this->load->view("inicio",$var);
  }
  
 public function validacao(){
      $this->load->library("form_validation");
    $this->load->model("CategoriaModel");
    $acao = $this->input->post("acao");
   switch($acao){
     case "Cadastrar":
       $rule = "required|is_unique[categorias.categoria]";
     break;
     case "Editar":
       $rule = "required";
     break;
       
   }
    $this->form_validation->set_rules("categoria","Categoria",$rule,array("is_unique"=>"Já há  %s cadastrada com esse nome","required"=>"É Necessário preenchimento da %s"));
     $this->form_validation->set_rules("descricaoCategoria","Descrição","required",array("required"=>"É Necessário preenchimento da %s"));
    if(!$this->form_validation->run()){
       $msn =   "<div class='alert alert-danger alert-dismissible'>".validation_errors()."</div>";
      $this->index(array("msn"=>$msn));
      return false;
    }
    else{
      return true;
    }
  }
  public function setVariaveis(){
   $this->categoria = $this->input->post("categoria");
   $this->descricao = $this->input->post("descricaoCategoria");
   
   $this->dados = array(
                        "categoria"=>$this->categoria,
                        "descricao"=>$this->descricao,
                        "status"=>1,
                       );
    if($this->input->post("idCat")!=null){
      $this->dados["id"] = $this->input->post("idCat");
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
    if($this->validacao()){
      $this->setVariaveis();
      $this->load->model("CategoriaModel");
      $prep = new CategoriaModel();
      $gravar = $prep->cadastrar($this->dados);
      if($gravar){
        $msn = '<div class="alert alert-success alert-dismissible">categoria cadastrada com    
        Sucesso!</div>';
      }
      else{
         $msn = '<div class="alert alert-danger alert-dismissible">Erro ao cadastrar a categoria</div>';
      }
      $this->index(array("msn"=>$msn));
    }
  }
  public function editar(){
    if($this->validacao()){
      $this->setVariaveis();
      $this->load->model("CategoriaModel");
      $prep = new CategoriaModel();
      $gravar = $prep->editar($this->dados);
      if($gravar){
        $msn = '<div class="alert alert-success alert-dismissible">categoria modificada com    
        Sucesso!</div>';
      }
      else{
         $msn = '<div class="alert alert-danger alert-dismissible">Erro ao modificar a categoria</div>';
      }
      $this->index(array("msn"=>$msn));
    }
  }
  public function deletar(){
   
      $this->setVariaveis();
      $this->load->model("CategoriaModel");
      $prep = new CategoriaModel();
      $deletar = $prep->deletar($this->dados["id"]);
      if($deletar){
        $msn = '<div class="alert alert-success alert-dismissible">categoria excluida com    
        Sucesso!</div>';
      }
      else{
         $msn = '<div class="alert alert-danger alert-dismissible">Erro ao excluir a categoria</div>';
      }
      $this->index(array("msn"=>$msn));
  }
}

