
<div id="formCadastrarMesa" class="row col-12 form-group border">
  <div class="col-12 col-sm-4 border">
  <form name="cadastroMesa" method="post" action="<?php echo base_url("Mesas/crud");?>">
    <div id="caracDosProdutos">
      <div class="form-group my-2  ">
        <div class="form-group"><!-- INICIO Categorias produtos-->
        <div class="input-group mb-3">
        </div>
        </div><!-- FIM Categorias produtos-->
         <label for="Mesa">Número da Mesa: </label>
         <input type="hidden" value="Cadastrar" id="acao" name="acao"/>
        <input type="hidden" value="" id="idMesa" name="id"/>
        <input type="text" name="numeMesa" id="numeMesa" class="form-control"/>
      </div>
         <div class="form-group">
       <label for="sabor" >Descrição: </label>
        <input type="text" name="descricaoMesa" id="descricaoMesa" class="form-control"/>
        </div>
             <div class="form-group">
       <label for="sabor" >Qtd Lugares: </label>
        <input type="text" name="qtdLugares" id="qtdLugares" class="form-control"/>
        </div>
    </div>
   <div class="form-group form-row">    
      <input id="btnCadastrarMesa" name="cad" type="submit" class="btn crud-mesa btn-primary mr-2" value="Cadastrar"/>
     <input id="btnEditarMesa" name="edit" style="display:none" type="submit" class="btn btn-primary crud-mesa mr-2" value="Editar"/>
     <input id="btnExcluirMesa" name="edit" style="display:none" type="submit" class="btn btn-primary crud-mesa mr-2" value="Excluir"/>
      <input type="reset" class="btn btn-primary" value="Limpar"/>
  </div>
 </form>
     </div>
  
  <div class="col-12 col-sm-8 border">
  <?php 
    echo $mesas;
    ?>
  
  </div>
 
    
</div>
<script>

      
</script>