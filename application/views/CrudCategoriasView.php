
<div id="formCrudCategoria" class="row col-12 form-group border">
  <div class="col-12 col-sm-4 border">
  <form name="cadastrarCategoria" method="post" action="<?php echo base_url("categorias/crud");?>">
    <div id="formCategoria">
      <div class="form-group my-2  ">
        <div class="form-group"><!-- INICIO Categorias produtos-->
        <div class="input-group mb-3">
        </div>
        </div><!-- FIM Categorias produtos-->
         <label for="categoria">Categoria</label>
         <input type="hidden" value="Cadastrar" id="acao" name="acao"/>
        <input type="hidden" value="" id="idCat" name="idCat"/>
        <input type="text" name="categoria" id="categoria" class="form-control"/>
      </div>
         <div class="form-group">
       <label for="descricaoCategoria" >Descrição: </label>
        <input type="text" name="descricaoCategoria" id="descricaoCategoria" class="form-control"/>
        </div>
   
    </div>
   <div class="form-group form-row">    
      <input id="btnCadastrarCat" name="cad" type="submit" class="btn crud-mesa btn-primary mr-2" value="Cadastrar"/>
     <input id="btnEditarCat" name="edit" style="display:none" type="submit" class="btn btn-primary crud-mesa mr-2" value="Editar"/>
     <input id="btnExcluirCat" name="edit" style="display:none" type="submit" class="btn btn-primary crud-mesa mr-2" value="Excluir"/>
      <input id="limparForm" type="reset" class="btn btn-primary" value="Limpar"/>
  </div>
 </form>
     </div>
  
  <div class="col-12 col-sm-8 border">
     <?php 
      echo $categorias;
    ?>
  
  </div>
 
    
</div>
<script>

      
</script>