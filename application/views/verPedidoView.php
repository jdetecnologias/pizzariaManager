
<div id="visualizarPedidos" class="col-md-12 row">
  <table class="table table-sm table-bordered table-stripped text-center">
    <tr class="cabecalho">
        <td>Nome Cliente</td>
        <td>Pedido</td>
        <td>Valor</td>
        <td>Data/hora pedido</td>
        <td>Tempo(min)</td>
        <td>Status</td>
       <td>Situação</td>
    </tr>
<?php
if(isset($pedidos)){

	foreach($pedidos as $pedido){
    $dataHora = mdate("%d/%m/%Y %H:%i:%s", $pedido->data_criacao);
      echo "<tr>
              <td>".$pedido->nome."</td>
              <td>".$pedido->id_pedido."</td>
              <td>".$pedido->preco."</td>
              <td>".$dataHora."</td>
              <td></td>
              <td>".$pedido->status."</td>
              <td></td>
           </tr>";
  }
}
    /*
?>
    
      <tr></tr>
      

    <div class="box-pedido col-sm-3 border" style="background-color:yellow;" numeroPedido="<?php echo $pedido->id_pedido;?>">
        <div class="col-xs-12 border">
            <div class="nome_cliente col-xs-12">nome:<?php echo $pedido->nome;?></div>
            <div class="telefone col-xs-12">Telefone: <?php echo $pedido->telefone;?></div>
            <div class="HoraData col-xs-12">End:<?php echo $pedido->endereco;?></div>
        </div>
        <div class="col-md-12 row text-center border">
            <div class="tempoPreparo col-xs-4 col-sm-4 no-padding"><div>Tempo de preparo</div></div>
            <div class="verItens col-xs-4 col-sm-4">Ver pedido</div>
            <div class="status col-xs-4 col-sm-4">
                <div>Situação</div>
                <div><a href="#" data-toggle="tooltip" data-placement="top" title="Clique aqui, para mudar o status do pedido.">
                    <?php echo $pedido->descricao;?></a>
                </div>    
            </div>
        </div>
        <div class="col-xs-12 row">
            <button class="btn  btn-primary btn-finalizar">Finalizar</button>
        </div>
    </div>
	
<?php
	endforeach;
}
else{
	echo "Nenhum pedido a ser mostrado";
}*/
?>
      </table>
</div>
    