<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VerPedido extends MY_Controller {

		public function index(){
			$this->load->model("verPedidoModel");
			$get = new VerpedidoModel();
			$result = $get->obterPedidos();
			
			if($result == false){
			
				$this->load->view("inicio",array("msn"=>"Nenhum pedido a vista"));
			}
			else{
				
				$this->load->view("inicio",array("pedidos"=>$result,"retorno"=>5));
			}
			
		}
}
