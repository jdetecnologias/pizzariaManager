<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends MY_Controller {
	public function obterCLiente(){
		$this->load->library('xml');
		$this->load->model('clienteModel');
		$obter = new ClienteModel();
		$clientes = $obter->obterCLiente();
		if($clientes == false){
			
		}
		else{
			$createXML = new xml();
			
			foreach($clientes as $cliente){
				$createXML->addTag('cliente');
				$createXML->addCompleto('nome',$cliente->nome);
				$createXML->addCompleto('endereco',$cliente->endereco);
				$createXML->addCompleto('telefone',$cliente->telefone);
				$createXML->CloseTag('cliente');
			}
			echo $createXML;
		}
	}
}
