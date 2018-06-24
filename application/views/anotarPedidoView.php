
<div class="row">
        <div id="dados-do-cliente" class="col-9 col-sm-5 border" status="0" style="bo rder:1px solid red;"> 
            <table class="table border" style="bor der:1px solid black;">
               
                    <input type="hidden" name="id_cliente" id="id_cliente"/>
                        <div class="col-12 row">
                            <div class="col-5">
                                <button class="btn-primary btn-sm btn-block text-center mt-2" data-toggle="modal" data-target="#dadosCliente">
                                    <i class="far fa-address-card fa-lg"></i> CLIENTE
                                </button>
                            </div> 
                           <div id="nomeCliente" class="col-7 text-center">
                          
                            </div> 
                       </col>   
                           <form method="post" action="#<?php /*echo base_url('anotarPedido/finalizar');*/?>">
                              <div id="dadosCliente" class="modal">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                     <div class="modal-header">
                                      <h4 class="modal-title">Dados do Cliente</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                     </div>
                                    <div class="modal-body">

                                    <label for="telefonePedido">Telefone</label>
                                        <input type="text" id="telefonePedido" name="telefone" class="form-control" status="0"/>
                                    <label id="nome" for="nomeImput">Nome</label>
                                        <input type="text" id="nomeInput" class="form-control" readonly="true">
                                    <label for="endInput">Endereco</label>
                                        <input type="text" id="endInput" class="form-control" readonly="true">
                                    
                                      <label for="endInput">bairro</label>
                                        <input type="text" id="bairroInput" class="form-control" readonly="true">
                                    
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Confirmar</button>
                                    </div>
                                  </div>
                                </div>     
                             </div>
                             </table>
                             <div id="pedido" class="COL-12" style="bor der:1px solid red;">  
          
                              <table id ="corpo_pedido" class="table table-bordered" style="bor der:1px solid black;">


                                  <tr class="cabecalho">

                                  <h2 class="bg-info btn-sm border btn-sm btn-block text-center my-3">
                               Pedido do cliente
                                    </h2>
                                
                                      <td colspan="2">total a pagar </td>
                                      <td  id="valor_total">R$:</td>
                                  </tr>

                                  <tr class="cabecalho">
                                      <td style="bor der:1px solid black;" class="my-auto"><label  style="bo rder:1px solid black;"><span class="">produto</span></label></td>
                                      <td style="bor der:1px solid black;" class="my-0"><label style="bo rder:1px solid black;"><span class="">R$</span></label></td>
                                      <td style="bor der:1px solid black;" class="my-0"><label class="" ><span class="fas fa-trash-alt btn-sm btn-block "></span></label> </td>
                                  </tr>
                              </table>
                      </div>
                    <table>
                        <tr>
                              <td>
                                <input id="salvarPedido" class="btn btn-primary" type="submit" value="Finalizar">
                                <input type="reset" class="btn btn-primary" value="Cancelar">
                            </td>
                        </tr>
                    </form>
                </table>	
         </div>
    <div class="col-12 col-sm-7 border" style="bor der:1px solid red;">
     	  <?php 
          $this->load->view("CardapioAnotarPedidoView",array("result"=>$prod,"categorias"=>$categorias));
         ?>
     </div> 
            <div id="meiaPizza" class="modal">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                
                                  <h5 class="model-title">Favor selecionar os Sabores da pizza meia</h5>
                                   <button type="button" class="close fecharMeiaPizza" data-dismiss="modal">&times;</button>
                                    
                                </div>
                              <div id="corpoPedidoPizzaMeia" class="modal-body">
                                
                                <table id="pedidoPizzaMeia" class="table">
                                 
                                  
                                </table>
                                <table id="tabelaValoresTotais" class="table">
                                 <tr><td id="descricaoPizzaMeia"></td><td id="valorTotalPizzaMeia"></td></tr>
                                  
                                </table>
                                 <?php 
                                   $this->load->view("CardapioPizzaMeiaView",array("result"=>$prod));
                                  ?>
                              </div>
                               <div class="modal-footer">
                                        <button type="button" class="btn btn-danger fecharMeiaPizza" data-dismiss="modal">Fechar</button>
                               </div>
                            </div>
                          </div> 
                        </div>
