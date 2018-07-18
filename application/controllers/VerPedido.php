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
			$this->load->model("verPedidoModel");
			$get = new verPedidoModel();
    	$resultAberto = $get->obterPedidos(1,$dataMenor);
			$resultFinalizados = $get->obterPedidos(0,$dataMenor);
			$resultCancelados = $get->obterPedidos(2,$dataMenor);
				$this->load->view("verPedidoView",array("resultAberto"=>$resultAberto,"resultFinalizados"=>$resultFinalizados,"resultCancelados"=>$resultCancelados,"retorno"=>5));
  }
}

