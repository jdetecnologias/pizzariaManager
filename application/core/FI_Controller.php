<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FI_Controller extends MY_Controller {
	public function finalizar($numeroPedido = null){

		$this->load->model("finalizarPreparoModel");
		$att = new finalizarPreparoModel();
    if($numeroPedido == null){
		$numeroPedido = $this->input->post("numeroPedido");
      }
		$status = $att->AtualizarStatus($numeroPedido);
		if($status == true){
			echo "1";
		}
		else{
			echo "0";
		}		
	}
	}

