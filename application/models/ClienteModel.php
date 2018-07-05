<?php

class ClienteModel extends CI_Model{
	
	public function obterCliente(){
		
		$query = $this->db->get('clientes');
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return false;
		}
	}
		
	
	
}

?>
