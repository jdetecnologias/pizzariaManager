
<table class="table table-bordered table-striped table-responsive text-center">
    <tr class="cabecalho">
        <td colspan="2">Nome Cliente</td>
        <td>Pedido</td>
        <td>Valor</td>
        <td>Fechar Pedido</td>
        <td>Data/hora pedido</td>
        <td>Tempo(min)</td>
        <td>Ação</td>
		    <td>Status</td>
        <td>Situação</td>
    </tr>
<?php
	foreach($ped as $pedido){
    $dataHora = mdate("%d/%m/%Y %H:%i:%s", $pedido->data_criacao);
    $tempoPassado = (now("America/Sao_paulo")-$pedido->data_criacao);
    $tempoEspera = ($tempoPassado-$tempoPassado%60)/60;
    if($tempoPassado > 80*60){
      $situacao = "atrasado";
      $classe = "atrasado";
    }
    else{
      $situacao = "No prazo";
      $classe = "noPrazo";
    }
      echo "<tr pedido='".$pedido->id_pedido."'>
              <td>&nbsp<i class='fas fa-flag-checkered ".$classe."'>&nbsp</i></td>
              <td>".$pedido->nome."</td>
              <td><a  data-toggle='modal' data-target='#verPedidoTable' class='viewPedido' href='#' >".$pedido->id_pedido."</a></td>
              <td>".$pedido->preco."</td>
              <td><button style='padding-top:0;padding-bottom:0;' class='btn-primary btn
              btn-sm'>Fechar Pedido</button></td>
              <td>".$dataHora."</td>
              <td>".$tempoEspera."</td>
              <td>
                <select class='btn-acao'>
                  <option>selecione: </option>
                  <option value='finalizar'>
                    <button  class='btn btn-sm btn-primary btn-finalizar' 
                    style='padding-top:0;adding-bottom:0;'>Finalizar Preparo</button>
                  </option>
                  <option value='cancelar'>
                    <button  class='btn btn-sm btn-danger btn-cancelar' 
                    style='padding-top:0;padding-bottom:0;'>Cancelar</button>
                  </option>
                  <option value='fecharPedido'>
                    <button  class='btn btn-sm btn-danger btn-cancelar' 
                    style='padding-top:0;padding-bottom:0;' '>Fechar Pedido</button>
                  </option>
                </select>
              </td>
              <td>".$pedido->descricao."</td>
              <td>".$situacao."</td>
           </tr>";
  }
?>
</table>