<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exibir extends MY_Controller {
	public function clientes(){
		$this->load->model("exibirModel");
		$obterDados = new ExibirModel();
		$dados = $obterDados->clientes();
		
		if($dados == false){
			$this->load->view("inicio",array('retorno'=>'3','msn' => 'Não há clientes cadastrados'));
		}
		else{
			$this->load->view("inicio",array('dados' => $dados));
		}
	}
	
	public function getClienteByTel(){
		$telefone = $this->input->post("telefone");
		$this->load->model("exibirModel");
		$getCliente = new exibirModel();
		$cliente = $getCliente->getClienteByTelefone($telefone);
		$status = array("status"=>0);
		if($cliente){
			foreach($cliente as $data){
        
        $dados = array("status"=>1,"nome"=>$data->nome,
                       "id_cliente"=>$data->id,
                       "telefone"=>$data->telefone,
                      "logradouro"=>$data->logradouro,
                       "complemento"=>$data->complemento,
                       "bairro"=>$data->bairro,
                       "cidade"=>$data->cidade,
                       "uf"=>$data->uf
                      );
				echo json_encode($dados);
			}
			
		}
		else{
			echo json_encode($status);
		}
			
		
	}
  
  public function getPrecosBySize(){
    $this->load->model("ExibirModel");
    $preparar = new ExibirModel();
    $result = $preparar->getPrecos();
    if(!$result){}
    else{
      echo json_encode($result);
    }
    
  }
}
