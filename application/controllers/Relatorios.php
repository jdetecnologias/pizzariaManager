<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorios extends MY_Controller {
  public function index($var = null){
    $var["retorno"] = 11;
    $this->load->view("inicio",$var);
  }
	public function fin(){
    $this->load->model("RelatoriosModel");
    $this->load->library("componentesHtml");
    $com = new componentesHtml();
    $prep = new RelatoriosModel();
    $financeiro =  $com->tabelaRelatorios($prep->getFin()["tabela"]);
    $totais =  $com->tabelaRelatorios($prep->getFin()["tabela"]);
   
    $this->index(array("relatorio"=>$financeiro,"totais"=>$totais));
  }

}