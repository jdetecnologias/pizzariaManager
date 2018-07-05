
<div id="formCadastrarProduto" class="row col-12 form-group border">
  <div class="col-12 col-sm-4 border">
    
  
  <form name="cadastroProduto" method="post" action="<?php echo base_url("CadastrarProduto/finalizar");?>">
    <div id="caracDosProdutos">
      <div class="form-group my-2  ">
        <div class="form-group"><!-- INICIO Categorias produtos-->
        <div class="input-group mb-3">
        <div class="input-group-prepend">
        <label class="input-group-text" for="categoria">Opções</label>
        </div>
        <select name="categoria" id="categoria" class="custom-select" id="categoria">
        <option selected>Escolha a categoria...</option>
        <option value="1">Pizzas</option>
        <option value="2">Bebidas</option>
        <option value="3">Adicionais</option>
        </select>
        </div>
        </div><!-- FIM Categorias produtos-->
         <label for="produto" >Produto</label>
        <input type="text" name="produto" id="produto" class="form-control"/>
      </div>
         <div class="form-group">
       <label for="sabor" >Sabor</label>
        <input type="text" name="sabor" id="sabor" class="form-control"/>
        </div>
    </div>
   <div class="form-group form-row">    
      <input id="btnCadastrarProduto" type="submit" class="btn btn-primary mr-2" value="Cadastrar"/>
      <input type="reset" class="btn btn-primary" value="Limpar"/>
  </div>
 </form>
     </div>
  
  <div class="col-12 col-sm-8 border">
   <?php $this->load->view("ListaProdutosCrua"); ?> 
  
  </div>
    
</div>
<script>

      
</script>