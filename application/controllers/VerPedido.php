<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VerPedido extends MY_Controller {

		public function index(){
			$this->load->model("verPedidoModel");
			$get = new VerpedidoModel();
			$result = $get->obterPedidos();
			
			if($result == false){
			
				$this->load->view("inicio",array("retorno"=>5));
			}
			else{
				
				$this->load->view("inicio",array("pedidos"=>$result,"retorno"=>5));
			}
			
		}
  public function AtualizarPagina(){
			$this->load->model("verPedidoModel");
			$get = new VerpedidoModel();
			$result = $get->obterPedidos();
			
			if($result == false){
			
				$this->load->view("verPedidoView",array("retorno"=>5));
			}
			else{
				
				$this->load->view("verPedidoView",array("pedidos"=>$result,"retorno"=>5));
			}
			
		}
}
