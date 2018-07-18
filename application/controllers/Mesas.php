<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mesas extends MY_Controller {
	public function index($var = null){
    $var["retorno"]=8;
    $var["mesas"]=$this->ComponenteMesas();
    $this->load->view("inicio",$var);
  }
  public function cadastrar(){
    $this->load->library("form_validation");
    $this->load->model("MesaModel");
    $this->form_validation->set_rules("numeMesa"," Mesa","required|is_unique[mesas.numero]",array("is_unique"=>"Já há %s cadastrada com este número","required"=>"O número da %s é necessário! "));
    if($this->form_validation->run()){
      $numMesa = $this->input->post("numeMesa");
       $descricao = $this->input->post("descricaoMesa");
       $qtdLugares = $this->input->post("qtdLugares");
      $dados = array("numero"=>$numMesa,"descricao"=>$descricao,"qtdLugares"=>$qtdLugares);
      $preparar = new MesaModel();
      $gravar = $preparar->cadastrar($dados);
      if($gravar){
          echo "<script>
            window.onload = function(){
            document.getElementById('mensagensValidacao').innerHTML = '<div class=\"alert alert-danger\">Mesa Cadastrada com Sucesso</div>';
            }
          </script>";
      }
   
  }
    else{
      
    }
     $this->index();
  }
  public function ComponenteMesas(){
    $this->load->model("MesaModel");
    $preparar = new MesaModel();
    $mesas = $preparar->getMesas();
  
    $componente = "<div class='col-12 row'>";
      if($mesas == 9){
       $componente .= "<div class='text-center'>Não há mesas cadastradas</div>";
    }
    else if(!$mesas){
      $componente .= "<div class='text-center'>Erro de conexão com o banco de dados. Favor contactar o administrador</div>";
    }
    else{
      foreach($mesas as $m){
        if($m->status == 1){
          $class="mesaOcupada";
        }
         else if($m->status == 2){
          $class="mesa";
        }
        $componente .= "<div class='col-2 ".$class." m-1 rounded-circle' >\n";
       
        $componente .= "<div class='text-center' >Mesa ".$m->numero."</div>";
        $componente .= "<div class='text-center' >".$m->qtdLugares." lugares</div>";  
         $componente .= "<div class='text-center'>Status: ".$m->descricao." </div>";    
        $componente .= "</div>\n";
    }
    }
    $componente .="</div>";
      return $componente;
  }

}

