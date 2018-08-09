
<div id="formCadastrarMesa" class="row col-12 form-group border">
  <div class="col-12 col-sm-4 border">
  <form name="cadastroFormaPagamento" method="post" action="<?php echo base_url("pagamento/crud");?>">
    <div id="caracDosProdutos">
      <div class="form-group my-2  ">
        <div class="form-group"><!-- INICIO Categorias produtos-->
        <div class="input-group mb-3">
        </div>
        </div><!-- FIM Categorias produtos-->
         <label for="Mesa">Forma Pagamento </label>
         <input type="hidden" value="Cadastrar" id="acao" name="acao"/>
        <input type="hidden" value="" id="idForma" name="id"/>
        <input type="text" name="descricao" id="descricao" class="form-control"/>
      </div>
         <div class="form-group">
       <label for="sabor" >Prazo Pagamento em dias(0 - Imediato) </label>
        <input type="text" name="qtdDiasReceber" id="qtdDiasReceber" class="form-control"/>
        </div>
    </div>
   <div class="form-group form-row">    
      <input id="btnCadastrarFormaPagamento" name="cad" type="submit" class="btn crud-mesa btn-primary mr-2" value="Cadastrar"/>
     <input id="btnEditarFormaPagamento" name="edit" style="display:none" type="submit" class="btn btn-primary crud-mesa mr-2" value="Editar"/>
     <input id="btnExcluirFormaPagamento" name="edit" style="display:none" type="submit" class="btn btn-primary crud-mesa mr-2" value="Excluir"/>
      <input type="reset" class="btn btn-primary" value="Limpar"/>
  </div>
 </form>
     </div>
  
  <div class="col-12 col-sm-8 border">
  <?php 
    echo $formasPagamento;
    ?>
  
  </div>
 
    
</div>
<script>

      
</script>