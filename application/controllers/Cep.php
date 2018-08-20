<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cep extends MY_Controller {
	public function index(){
	 $this->load->library("ComponentesHtml");
   $prep = new ComponentesHtml();
   $array = array('retorno'=>13); 
	 $this->load->view('inicio',$array);  
  }
}