<div id="visualizarPedidos" class="col-md-12 row">
<div class="col-md-12">
	<ul class="nav nav-pills" role="tablist" data-toggle="buttons">
        <li  class="nav-item">
            <a id="aberto" class="nav-link" data-toggle="pill"  href="#emAberto">Em aberto</a>
        </li>
        <li class="nav-item">
            <a class="nav-link limparIntervalo"data-toggle="pill"  href="#finalizados">Finalizados</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="pill" href="#cancelados">cancelados</a>
        </li>
	</ul> 
	</div>
	<div class="tab-content col-md-12 my-5">
	<div id="emAberto" class="tab-pane active">
	<h5>Em aberto</h5>
<?php
	if(isset($resultAberto) and $resultAberto != false){
		$this->load->view("telasVerPedido/formListaPedidos",array("ped"=>$resultAberto,"nomeTabeça"=>"Em aberto"));
	}
?>
	  </div>
	   <div id="finalizados" class="tab-pane">
	   <h5>Finalizados</h5>
<?php
	if(isset($resultFinalizados) and $resultFinalizados != false){
		$this->load->view("telasVerPedido/formListaPedidos",array("ped"=>$resultFinalizados,"nomeTabeça"=>"Finalizados"));
	}
?>
	  </div>
	  <div id="cancelados" class="tab-pane">
	  <h5>Cancelados</h5>
<?php
	if(isset($resultCancelados) and $resultCancelados != false){
		$this->load -> view("telasVerPedido/formListaPedidos",array("ped"=>$resultCancelados,"nomeTabeça"=>"Cancelados"));
	}
?>

	  </div>
	  </div>
</div>

<div id="verPedidoTable" class="modal">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Dados do Pedido</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <div id="dadosDoPedido" class="modal-body">
    
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>

