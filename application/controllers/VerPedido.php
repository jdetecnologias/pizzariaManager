<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VerPedido extends MY_Controller {
	public $dataMenor; 
	public function index(){
			$dataMenor = now("America/Sao_paulo")-8640000;
		
      $this->load->library("componentesHtml");
    
        $get = new componentesHtml();
      $selectFormaPgto = $get->selectFormaPagamento();
			$resultAberto = $get->pedidosView(1,$dataMenor);
			$resultFinalizados = $get->pedidosView(0,$dataMenor);
			$resultCancelados = $get->pedidosView(2,$dataMenor);
				$this->load->view("gridPedidosView",array("resultAberto"=>$resultAberto,"resultFinalizados"=>$resultFinalizados,"resultCancelados"=>$resultCancelados,"formaPgto"=>$selectFormaPgto,"retorno"=>5));
		}
	public function AtualizarPagina(){
		$dataMenor = now("America/Sao_paulo")-8640000;
		
			  $this->load->library("componentesHtml");
    
        $get = new componentesHtml();
     $selectFormaPgto = $get->selectFormaPagamento();
			$resultAberto = $get->pedidosView(1,$dataMenor);
			$resultFinalizados = $get->pedidosView(0,$dataMenor);
			$resultCancelados = $get->pedidosView(2,$dataMenor);
				$this->load->view("verPedidoView",array("resultAberto"=>$resultAberto,"formaPgto"=>$selectFormaPgto,"resultFinalizados"=>$resultFinalizados,"resultCancelados"=>$resultCancelados,"retorno"=>5));
  }
  public function getPedido(){
    $this->load->model("VerPedidoModel");
    $this->load->library("HTML");
    $html = new HTML();
    $id = $this->input->post("id");   
    $prep = new VerPedidoModel();
    $pedido = $prep->getPedido($id);
    $col = array("Descricao","Preco");
    $td = "";
    $tr = "";
    for($i=0;$i<count($col);$i++){
      $td .= $html->gerarHtml("td","coluna='".$col[$i]."'",$col[$i]);
    }
    $tr .= $html->gerarHtml("tr",null,$td);
    $td = "";
   $total = 0;
    foreach ($pedido["dados"] as $p){
    $td .= $html->gerarHtml("td",null,$p['tipoProduto'].$p['sabor']);
    $td .= $html->gerarHtml("td",null,$p['preco']);
    $total += $p['preco'];
      $tr .= $html->gerarHtml("tr",null,$td);
      $td="";
    }
    $td .= $html->gerarHtml("td",null,"Total");
    $td .= $html->gerarHtml("td"," id='valorTotal' ",$total);
    $tr .= $html->gerarHtml("tr",null,$td);
    $table = $html->gerarHtml("table","class='table table-bordered'",$tr);
    $retorno["table"] = $table;
    $retorno["valorPendente"] = $pedido["valorPendente"];
    echo json_encode($retorno);
  }
  public function cancelarPedido(){
    $this->load->model("VerPedidoModel");
    $prep = new VerPedidoModel();
    $id =$this->input->post("id");
   
    $cancelar = $prep->cancelarPedido($id);
    if($cancelar){
      echo "1";
    }
    else{
      echo "0";
    }
  }
}

