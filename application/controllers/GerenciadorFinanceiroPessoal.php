<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GerenciadorFinanceiroPessoal extends MY_Controller {
	public function index(){
    $ar['contas'] = $this->gerarHtml();
    $this->load->view("GerMaster",$ar);
  }
  	public function loadTable(){
    $ar['contas'] = $this->gerarHtml();
    $this->load->view("GerenciadorFinanceiroView",$ar);
  }
 public function gerarHtml(){
   $this->load->library("HTML");
   $this->load->model("GerFinModel");
    $tds[0] ='descricao';
    $tds[1] ='parceiro';
    $tds[2] ='valor';
    $tds[3] ='data_venc';
    $tds[4] ='data_pgto';
    $tds[5] ='tipo';
    $tds[6] ='status';
    $tds[7] ='mesAnoVigencia';
   $prep = new GerFinModel();
   $contas = $prep->getContas();
   
   if($contas == 9){
     
   }
   else if(!$contas){
     
   }
   else {
     
   }
   $html = new HTML();
   $tr = "";
   for($i = 0;$i<100;$i++){
     $td ="";
      foreach($tds as $t){
        if(isset($contas[$i])){
        $attr = "idConta = '".$contas[$i]['id']."' st='atualizar'";
           $input =  $html->gerarHtml("input","type='text' style='padding:0;' value='".$contas[$i][$t]."'");
      }
      else{
        $attr = "st = 'cadastrar'";
         $input =  $html->gerarHtml("input","type='text' style='padding:0;' value=''");
      }
  
    
    $td .= $html->gerarHtml("td","campo = '".$t."'style='padding:0;margin:0';width:50px;",$input);
     }
   
     
   $tr .= $html->gerarHtml("tr",$attr,$td);
    }
   return $tr;
 }
  public function setVariaveis(){
    $parceiro = $this->input->post('parceiro');
    $descricao = $this->input->post('descricao');
    $valor = $this->input->post('valor');
    $data_venc = $this->input->post('data_venc');
    $data_pgto = $this->input->post('data_pgto');
    $status = $this->input->post('status');
    $tipo = $this->input->post('tipo');
    $mesAnoVigencia = $this->input->post('mesAnoVigencia'); 
    $dados['parceiro'] =  $parceiro;
$dados['descricao'] =  $descricao;
$dados['valor'] =  $valor;
$dados['data_venc'] =  $data_venc;
$dados['data_pgto'] =  $data_pgto;
$dados['status'] =  $status;
$dados['tipo'] =  $tipo;
$dados['mesAnoVigencia'] =  $mesAnoVigencia;
    return $dados;
  }
  public function mudarCampo(){
    $valor = $this->input->post("valor");
    $campo =$this->input->post("campo");
    $acao = $this->input->post("acao");
    
      $this->load->model("GerFinModel");
    $prep = new GerFinModel();
      
      switch($acao){
        case "cadastrar":
          $dados[$campo] = $valor;
          
          $gravar = $prep->gravarBanco($dados);
          echo $gravar;
          $this->loadTable();
          break;
        case "atualizar":
          $id =$this->input->post("id");
          $atualizar = $prep->atualizarBanco($id,$campo,$valor);
           $this->loadTable();
            break;
      }
   
    
    $campo = $this->input->post("campo");
    $valor = $this->input->post("valor");
    $dados['campo'] = $campo;
    $dados['valor'] = $valor;
  }
}