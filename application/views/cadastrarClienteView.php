
<div class="row">
        <div id="dados-do-cliente" class="col-12 col-sm-4" status="0" style="bo rder:1px solid red;"> 
          <form class="form-inline">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
            <table class="table" style="bor der:1px solid black;">
                 <form method="post" action="#<?php /*echo base_url('anotarPedido/finalizar');*/?>">
                    <input type="hidden" name="id_cliente" id="id_cliente"/>
                        <tr>
                            <td>
                                <h2 class="btn-primary btn-lg btn-block text-center">
                                Cliente
                                </h2>
                                <label for="telefonePedido">Telefone</label>
                                    <input type="text" id="telefonePedido" name="telefone" class="form-control" status="0"/>
                                <label id="nome" for="nomeImput">Nome</label>
                                    <input type="text" id="nomeInput" class="form-control" readonly="true">
                                <label for="endInput">Endereco</label>
                                    <input type="text" id="endInput" class="form-control" readonly="true">
                                <label>Obs: </label>
                                    <textarea id="obsPedido" class="form-control"></textarea>
                             </td>
                        </tr>
                        <tr>
                              <td>
                                <input id="salvarPedido" class="btn btn-primary" type="submit" value="Finalizar">
                                <input type="reset" class="btn btn-primary" value="Cancelar">
                            </td>
                        </tr>
                    </form>
                </table>	
         </div>     
</div>    
