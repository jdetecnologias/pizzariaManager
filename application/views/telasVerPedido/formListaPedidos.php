
<table class="table table-sm table-bordered table-striped text-center">
    <tr class="cabecalho">
        <td colspan="2">Nome Cliente</td>
        <td>Pedido</td>
        <td>Valor</td>
        <td>Data/hora pedido</td>
        <td>Tempo(min)</td>
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
              <td>".$pedido->id_pedido."</td>
              <td>".$pedido->preco."</td>
              <td>".$dataHora."</td>
              <td>".$tempoEspera."</td>
              <td><button style='padding-top:0;padding-bottom:0;' class='no-padding btn btn-sm btn-primary btn-finalizar'>".$pedido->descricao."</button></td>
              <td>".$situacao."</td>
           </tr>";
  }
?>
</table>