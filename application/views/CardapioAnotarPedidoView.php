 <h2 class="bg-info btn-sm btn-block text-center  my-3">Cardápio</h2>
                <ul class="nav nav-pills btn-group btn-group-toggle" role="tablist" data-toggle="buttons">
                    <?php 
                        foreach($categorias as $cat){
                      ?>
                  <li class="btn nav-item border">
                    <a class="nav-link" data-toggle="pill" idCategoria = "<?php echo $cat->id;?>" href="#<?php echo $cat->descricao;?>"><?php echo $cat->descricao;?></a>
                  </li>
                     <?php } ?>
               </ul>
                    <div class="tab-content"> <!-- A estrututra desta div, deve permanecer inalterada, para que o navbar funcione corretamente. -->
                      <?php
                      $x=0;
                      foreach($categorias as $cat){
                      ?>
                      <div id="<?php echo $cat->descricao;?>" idCategoria = "<?php echo $cat->id;?>" class="container tab-pane <?php if($x==0){echo "active";}else{echo "fade";}?>">
                          <?php 
                        if($cat->id == 1){
                          
                          ?>
                       
                          
                        
                       <!-- <button class="btn btn-primary btn-sm my-2" data-toggle="modal" data-target="#meiaPizza">
                          2-SABORES
                        </button>--><div class="row">
                                   <div class="btn-group-toggle" data-toggle="buttons" >
                                   <label id="pedirMeiaPizza" class="btn btn-success active btn-sm my-2 mx-2" data-toggle="modal" data-target="#meiaPizza">
                                   <input type="checkbox" checked autocomplete="off" data-toggle="modal" data-target="#meiaPizza">2-Sabores
                                   </label>
                                   
                                   </div>
                                   <div>
                                
                                     
                                   </div>
                                   <div id = "" namespace="cardapioPizza" class="btn-group btn-group-toggle my-2 controleTamanho" data-toggle="buttons">
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
                                  </div>
                                    
                        <?php } ?>
                        <table class="table table-bordered table-hover my-2" id="<?php if($cat->id == 1){ echo "cardapioPizza"; }?>">
                       
                            <?php 
                                    
                                      /*foreach($result as $listaProd){
                                        if($listaProd->categoria == $cat->id){
                                          echo "<tr class='produto' codigo='".$listaProd->id_produto."'>
                                          <input type='hidden' value='".$listaProd->valorUnitario."' id='preco'><th scope='row'>1/2</th>
                                          <td class='descricao' sabor='".$listaProd->sabor."'>
                                          <a href='#' style='text-decoration: none;' >".$listaProd->tipoProduto." ".$listaProd->sabor."</a>
                                          </td><th scope='row'>R$</th><td class='preco'>" .$listaProd->valorUnitario."</td></tr>";
                                       }
                                      }*/
                          foreach($result as $listaProd){
                                        if($listaProd->categoria == $cat->id){
                                          echo "<tr class='produto' codigo='".$listaProd->id_produto."'>
                                          <input type='hidden' value='".$listaProd->valorUnitario."' id='preco'><th class="tipoPizza" scope='row'>1/2</th>
                                          <td class='descricao' sabor='".$listaProd->sabor."'>
                                          <a href='#' style='text-decoration: none;' ><!--".$listaProd->tipoProduto."--> ".$listaProd->sabor."</a>
                                          </td><th scope='row' class='input-group-text pl-1 pr-0'>R$</th><td class='preco'>".$listaProd->valorUnitario."</td></tr>";
                                       }
                                      }
                                   
                                    
                           
                          ?>
                       </table>
                     </div>
                     <?php 
                      $x++;
                      }
                      ?>
         
               </div>