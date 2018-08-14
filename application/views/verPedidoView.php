
<div id="visualizarPedidos" class="col-md-12 row">
<div class="col-md-12">
	<ul class="nav nav-pills" role="tablist" data-toggle="buttons">
        <li  class="nav-item" intervalo="true">
            <a id="abaAbertos" class="nav-link" data-toggle="pill"  href="#emAberto">Em aberto</a>
        </li>
        <li class="nav-item" intervalo="false">
            <a id="abaFinalizados" class="nav-link limparIntervalo"data-toggle="pill"  href="#finalizados">Finalizados</a>
        </li>
        <li class="nav-item" intervalo="false">
            <a id="abaCancelados" class="nav-link" data-toggle="pill" href="#cancelados">cancelados</a>
        </li>
	</ul> 
	</div>
	<div class="tab-content col-md-12 my-5">
	<div id="emAberto" class="tab-pane active">
	<h5>Em aberto</h5>
<?php
	if(isset($resultAberto) and $resultAberto != false){
	echo $resultAberto;
	}
?>
	  </div>
	   <div id="finalizados" class="tab-pane">
	   <h5>Finalizados</h5>
<?php
	if(isset($resultFinalizados) and $resultFinalizados != false){
		echo $resultFinalizados;
	}
?>
	  </div>
	  <div id="cancelados" class="tab-pane">
	  <h5>Cancelados</h5>
<?php
	if(isset($resultCancelados) and $resultCancelados != false){
		echo $resultCancelados;
	}
?>

	  </div>
	  </div>
</div>
<div id="verPedidoTable" class="col-12 d-none row">
  <h2>
    Dados do Pedido  </h2>
  <div id="controlePagina" class='col-12'>
  <button id="voltar" class='btn-sm btn btn-danger'>
    Voltar
  </button>
</div>
  
  <div id="info" class='col-12 col-sm-6'>
    <div id="dadosDoPedido" class="col-12">
    
  </div>
    <div id="botoes" class='col-12'>
      <button class='btn btn-success btn-sm'>
       Finalizar
      </button>
    </div>
  </div>
  
  <div id="dadosPagamento" class="col-12 col-sm-6">
    <table id="tabelaPagamento" class='table' pedido="">
      <tr><td>Valor a Receber</td><td><input class='form-control' name='aReceber' id="aReceber"/></td></tr>
      <tr><td>Forma de pagamento</td><td><?php echo $formaPgto; ?></td></tr>
      
    </table>
    <div id="fecharPagamento" class="col-12">
      <button id="receber" class="btn btn-success">
        Receber
      </button>
    </div>
  </div>
  
</div>
<figure id="loading">
  <img src="<?php echo base_url("imagens/35.gif");?>"
</div>
<!--<div id="verPedidoTable" class="modal" idPedido="">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Dados do Pedido</h4>
            <button type="button" class="close iniciarIntervalo" data-dismiss="modal">&times;</button>
         </div>
         <div id="dadosDoPedido" class="modal-body">
    
         </div>
         <div class="modal-footer">
           <button  type="button" class="btn btn-sm btn-danger iniciarIntervalo" data-dismiss="modal">Fechar Tela</button>
         </div>
      </div>
   </div>
</div>-->

