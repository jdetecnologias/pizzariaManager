<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mesas extends MY_Controller {
  private $dados;
  private $numMesa;// = $this->input->post("numeMesa");
  private $descricao;// $this->input->post("descricaoMesa");
  private $qtdLugares;// $this->input->post("qtdLugares"); private $dados;// array("numero"=>$numMesa,"descricao"=>$descricao,"qtdLugares"=>$qtdLugares);
  public function setVariaveis(){
   $this->numMesa = $this->input->post("numeMesa");
   $this->descricao = $this->input->post("descricaoMesa");
   $this->qtdLugares=  $this->input->post("qtdLugares"); 
   $this->dados = array(
                        "numero"=>$this->numMesa,
                        "descricao"=>$this->descricao,
                        "qtdLugares"=>$this->qtdLugares,
                        "status"=>2
                       );
    if($this->input->post("id")!=null){
      $this->dados["id"] = $this->input->post("id");
    }
  }
	public function index($var = null){
    $this->load->library("ComponentesHtml");
    
    $prep = new ComponentesHtml();
    $var["retorno"]=8;
    $var["mesas"]=$prep->ComponenteMesas();
    $this->load->view("inicio",$var);
  }
  public function validacao($tipo = null){
    switch($tipo){
       case "editar":
        $stringValid = "required";
        break;
      default:
        $stringValid = "required|is_unique[mesas.numero]";
    }
      $this->load->library("form_validation");
    $this->load->model("MesaModel");
    $this->form_validation->set_rules("numeMesa"," mesa",$stringValid,array("is_unique"=>"Já há %s cadastrada com este número","required"=>"O número da %s é necessário! "));
    if(!$this->form_validation->run()){
       $msn =   "<div class='alert alert-danger alert-dismissible'>".validation_errors()."</div>";
      $this->index(array("msn"=>$msn));
      return false;
    }
    else{
      return true;
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
    }
  }
  public function cadastrar(){
   $isValido = $this->validacao();
    if($isValido){
      $preparar = new MesaModel();
      $this->setVariaveis();
      $gravar = $preparar->cadastrar($this->dados);
      if($gravar){
        $msn = '<div class="alert alert-success alert-dismissible">Mesa Cadastrada com    
        Sucesso</div>';
        
      }// if $gravar
      else{
         $msn = '<div class="alert alert-danger alert-dismissible">Erro ao cadastrar mesa!   
        Sucesso</div>';
      }
      $this->index(array("msn"=>$msn));
   }// $isValid
 } // public function cadastrar()     
  
  public function getMesaViaAjax(){
    $this->load->model("MesaModel");
    $id=$this->input->post("id");
    $prep = new MesaModel();
    $result = $prep->getMesaViaAjax($id);
      if($result){
        $dados = array("id"=>$result[0]->id_mesa,"numero"=>$result[0]->numero,"descricao"=>$result[0]->descricao,"qtdLugares"=>$result[0]->qtdLugares);
        echo json_encode($dados);
      }
      else{
        echo json_encode(array("status"=>0));
      }
  }
   public function editar(){
     $isValido = $this->validacao("editar");
     if($isValido){
      $this->load->model("MesaModel");
      $id=$this->input->post("id");
      $prep = new MesaModel();
       $this->setVariaveis();
      $result = $prep->editarMesa($this->dados);
      if($result){
        $this->index(array("msn"=>'<div class="alert alert-success alert-dismissible">Mesa
        editada com sucesso</div>'));
      }
      else{
        $this->index(array("msn"=>'<div class="alert alert-danger alert-dismissible">Mesa não 
        foi modificada</div>'));
      } 
    }
  }
  public function deletarViaAjax(){
    $this->load->model("MesaModel");
    $id = $this->getId();
    $prep = new MesaModel();
    $del = $prep->deletarMesa($id);
    if($del){
      echo 1;
    }
    else{
      echo 0;
    }
    
  }
  public function getId(){
    return $this->input->post("id");
  }
}

