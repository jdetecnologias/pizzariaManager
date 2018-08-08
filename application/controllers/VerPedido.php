<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VerPedido extends MY_Controller {
	public $dataMenor; 
	public function index(){
			$dataMenor = now("America/Sao_paulo")-86400;
			$this->load->model("verPedidoModel");
			$get = new verPedidoModel();
			$resultAberto = $get->obterPedidos(1,$dataMenor);
			$resultFinalizados = $get->obterPedidos(0,$dataMenor);
			$resultCancelados = $get->obterPedidos(2,$dataMenor);
				$this->load->view("gridPedidosView",array("resultAberto"=>$resultAberto,"resultFinalizados"=>$resultFinalizados,"resultCancelados"=>$resultCancelados,"retorno"=>5));
		}
	public function AtualizarPagina(){
		$dataMenor = now("America/Sao_paulo")-86400;
			$this->load->model("VerPedidoModel");
			$get = new VerPedidoModel();
    	$resultAberto = $get->obterPedidos(1,$dataMenor);
			$resultFinalizados = $get->obterPedidos(0,$dataMenor);
			$resultCancelados = $get->obterPedidos(2,$dataMenor);
				$this->load->view("verPedidoView",array("resultAberto"=>$resultAberto,"resultFinalizados"=>$resultFinalizados,"resultCancelados"=>$resultCancelados,"retorno"=>5));
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
    foreach ($pedido as $p){
    $td .= $html->gerarHtml("td",null,$p['tipoProduto'].$p['sabor']);
    $td .= $html->gerarHtml("td",null,$p['preco']);
    $total += $p['preco'];
      $tr .= $html->gerarHtml("tr",null,$td);
      $td="";
    }
    $td .= $html->gerarHtml("td",null,"Total");
    $td .= $html->gerarHtml("td",null,$total);
    $tr .= $html->gerarHtml("tr",null,$td);
    $table = $html->gerarHtml("table","class='table table-bordered'",$tr);
    echo $table;
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

