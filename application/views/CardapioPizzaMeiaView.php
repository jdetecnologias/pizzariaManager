<div id = "" namespace="meia_pizza_controller" class="btn-group btn-group-toggle my-2 controleTamanho" data-toggle="buttons">
                                    <label tamanho="Media" class="btn selecionarPreco btn-secondary btn-sm active">
                                    <input type="radio"  name="options" id="option1" autocomplete="off" checked>
                                      Média
                                    </label>
                                    <label tamanho="Grande" class="btn selecionarPreco btn-sm btn-secondary">
                                    <input type="radio" name="options"  id="option2" autocomplete="off">
                                      Grande
                                    </label>
                                    <label  tamanho="Familia" class="btn selecionarPreco btn-sm btn-secondary">
                                    <input type="radio" name="options"  id="option3" autocomplete="off"> 
                                      Família
                                    </label>
                                    </div> 
<table class="table table-bordered my-2" id="meia_pizza_controller" produtoIncluso="false">
   <?php 
                                    
      foreach($result as $listaProd){
         if($listaProd->categoria == 1){
             echo "<tr class='meiaPizza' codigo='".$listaProd->id_produto."'>
             <input type='hidden' value='".$listaProd->valorUnitario."' id='preco'><td class='descricao' sabor='".$listaProd->sabor."'>
             <a href='#'>".$listaProd->tipoProduto." ".$listaProd->sabor."</a>
             </td><td class='preco'>".$listaProd->valorUnitario."</td></tr>";
                                       }
                                      }
                                    
                           
                          ?>
  </table>