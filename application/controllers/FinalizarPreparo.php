<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FinalizarPreparo extends MY_Controller {
	public function finalizar(){

		$this->load->model("finalizarPreparoModel");
		$att = new finalizarPreparoModel();
		$numeroPedido = $this->input->post("numeroPedido");
		$status = $att->AtualizarStatus($numeroPedido);
		if($status){
			echo "1";
		}
		else{
			echo "0";
		}		
	}
	}

