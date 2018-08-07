
<div id="container" class="row">
  <div class="col-12">
    <table id="tabelaGerFina" class="table table-borderless table-sm table-responsive" cellspacing="0" cellpadding="0">
      <tr>
        <td>
          <select id="mes">
            <option>Janeiro</option>
            <option>Fevereiro</option>
            <option>Março</option>
            <option>Abril</option>
            <option>Maio</option>
            <option>Junho</option>
            <option>Julho</option>
            <option>Agosto</option>
            <option>Setembro</option>
            <option>Outubro</option>
            <option>Novembro</option>
            <option>Dezembro</option>
          </select>
        </td>
                <td>
          <select id="ano">
            <option>2018</option>
            <option>2019</option>
            <option>2020</option>
            <option>2021</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Descrição</td>
        <td>Parceiro</td>
        <td>valor</td>
        <td>Data Vencimento</td>
        <td>Data Pagamento</td>
        <td>Tipo</td>
        <td>status</td>
        <td>Periodo</td>
      </tr>
      <?php echo $contas;?>
    </table>
  </div>
</div>
<script>
  window.addEventListener("load",function(){
    var $input = document.getElementsByTagName("input");
    var x = 0;
    while($input[x]){
   
       $input[x].addEventListener("change",function(){
       var v = this.value;
         var c = this.parentNode.getAttribute("campo");
         var a = this.parentNode.parentNode.getAttribute("st");
          var i = this.parentNode.parentNode.getAttribute("idConta");
        var ajax = new XMLHttpRequest();
         ajax.onreadystatechange = function(){
           if(this.readyState == 4 && this.status == 200){
                document.getElementsByTagName("body")[0].innerHTML = this.responseText;
           }
         }
         ajax.open("POST","<?php echo base_url("GerenciadorFinanceiroPessoal/mudarCampo");?>",true);
         ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax.send("id="+i+"&valor="+v+"&campo="+c+"&acao="+a);
      });
      x++;
    }
    
    
  });
</script>