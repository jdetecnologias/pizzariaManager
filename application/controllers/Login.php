<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function index()
	{
    if($this->session->has_userdata("id") == null){
		$this->load->view('loginView');
      }
    else{
      $this->load->view('inicio');
    }
	}
  public function logarSistema(){
    $this->load->model("LoginModel");
      $usuario = $this->input->post("usuario");
      $senha = md5($this->input->post("senha")); 
    $instancia = new LoginModel();
    $logar = $instancia->logar($usuario,$senha);
      if($logar == false){
        $this->load->view("loginView",array("erro"=>"Dados de usuários ou senha incorretos"));
      }
      else{
         $this->session->set_userdata(array("id"=>$logar[0]->id_usuario));
         $this->load->view("inicio");
      }
    
  }
  public function deslogar(){
    $this->session->sess_destroy();
    $this->load->view("loginView");
      
  }
}