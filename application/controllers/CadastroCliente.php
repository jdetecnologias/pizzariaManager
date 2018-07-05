<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CadastroCliente extends MY_Controller {
  public function cad(){
    $this->load->library("form_validation");
		
    $this->form_validation->set_rules("nome","","required");
    $this->form_validation->set_rules("end","","required");
    $this->form_validation->set_rules("tel","","required");
     $this->form_validation->set_rules("complemento","","required");
    $this->form_validation->set_rules("bairro","","required");
    $this->form_validation->set_rules("cidade","","required");
    $this->form_validation->set_rules("uf","","required");
    $this->form_validation->set_rules("cep","","required");
      if($this->form_validation->run()){
        $nome = $this->input->post("nome");
        $end = $this->input->post("end");
        $complemento = $this->input->post("complemento");
        $tel = $this->input->post("tel");
        $bairro = $this->input->post("bairro");
        $cidade = $this->input->post("cidade");
        $uf = $this->input->post("uf");
        $cep = $this->input->post("cep");
        $dados = array("nome"=>$nome,
                       "complemento"=>$complemento,
                       "logradouro"=>$end,
                       "telefone"=>$tel,
                       "BAIRRO"=>$bairro,
                       "status"=>1,
                       "cep"=>$cep,
                        "uf"=>$uf,
                        "cidade"=>$cidade);
        return $dados;
      }
    else{
      return false;
    }
    
  }
	public function cadastrar(){
    $dados = $this->cad();
    if($dados != false){
		$this->load->model('CadastroModel');
    $cad = new cadastroModel();
		$result = $cad->cadastrarCliente($dados);
		if($result != false){
      echo 1;
			$msn = "cadastrado com sucesso";
		}	
		else{
      echo 0;
			$msn = "erro ao cadastrar";
		}
		
      }
    else{
      echo 9;
      $msn = "Favor preencher os dados corretamente";
    }
    $this->load->view('inicio',array("retorno"=>"3","msn"=>$msn));
	}
  public function cadastrarViaAjax(){
    $dados = $this->cad();
    if($dados != false){
      $this->load->model('CadastroModel');
        $cad = new cadastroModel();
        $result = $cad->cadastrarCliente($dados);
          if($result != false){
            echo $result;
          }	
          else{
            echo 0;

          }
      }
      else{
        echo 9;
      }
  }
	
	public function editar(){
    $dados = $this->cad();
    if($dados != false){
		$this->load->model('CadastroModel');
		
		$cad = new cadastroModel();
      $id = $this->input->post("idCliente");
		$result = $cad->editar($id,$dados);
		if($result){
			$msn = "Editado com sucesso";
		}	
		else{
			$msn = "erro ao editar";
		}
      }
    else{
      $msn = "Preencher todos os campos";
    }
		$this->load->view('inicio',array("retorno"=>3,"msn"=>$msn));
	}
  
	public function deletar($id){
		$this->load->model('cadastroModel');
		
		
		$cad = new cadastroModel();
		$result = $cad->deletar($id);
		if($result){
			$msn = "Deletador com sucesso";
		}	
		else{
			$msn = "erro ao deletar";
		}
		$this->load->view('inicio',array("msn"=>$msn));
	}

public function deletarViaAjax(){
    $id = $this->input->post("id");
    $this->load->model('cadastroModel');
		$cad = new cadastroModel();
		$result = $cad->deletar($id);// marca a tag
		if($result){
			echo 1;
		}	
		else{
			echo 0;
		}
	}
}