<div>
  <form class="form-inline my-2">
          <input class="form-control mr-sm-2 col-md-3" type="search" placeholder="Numero ou nome do cliente" aria-label="Search">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalBuscar">Buscar</button>
   </form>
</div>
<div>
   <div class="form-row modal fade" id="modalBuscar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body form-row">
       <div class=" form-group col-12 col-md-6">
                <label for="nome">Nome: </label>
                <input type="text" id="nome" name="nome" class="form-control" status="0"/>
              </div>
              <div class="form-group col-12 col-md-6">
                <label for="idCliente">Telefone: </label>
                <input type="text" id="idCliente" name="idCliente" class="form-control" status="0"/>     
              </div>
              <div class="form-group col-12 col-md-6">
                  <label for="cep">CEP: </label>
                  <input type="text" id="cep" name="cep" class="cep form-control"> 
              </div>
              <div class="form-group col-12 col-md-6">
                  <label for="logradouro">Logradouro </label>
                  <input type="text" id="logradouro" name="end" class="end form-control">
              </div>
              <div class="form-group col-12 col-md-6">
                  <label for="bairro">Bairro: </label>
                  <input type="text" id="bairro" name="bairro" class="bairro form-control">  
              </div>
              <div class="form-group col-12 col-md-6">
                  <label for="cidade">Cidade</label>
                  <input type="text" id="cidade" name="cidade" class="cidade form form-control"> 
              </div>
              <div class="form-group col-12 col-md-6">
                  <label for="Lote">Lote:</label>
                 <input type="text" id="Lote" name="Lote" class="complemento form-control">
              </div>
              <div class="form-group col-12 col-md-6">
                 <label for="complemento">Complemento:</label>
                 <input type="text" id="complemento" name="complemento" class="complemento form-control">
              </div>
              <div class="form-group col-12 col-md-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d122260.93310722765!2d-49.2757494929017!3d-16.744099189444558!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x935efaab92023333%3A0x884774e4c8f0640b!2spizzaria+arte+e+sabor!3m2!1d-16.744111!2d-49.205709!5e0!3m2!1spt-BR!2sbr!4v1529623207659" 
                width="100%" height="50%" frameborder="0" style="border:0" allowfullscreen></iframe>
                
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Salvar</button>
      </div>
    </div>
  </div>     
   </div><!--  Modal -->
   
  
</div>

<div id="listagemCliente" class="col-md-12 col-sm-12 border border-success">
   
   <?php
  if(isset($dados)){
      echo "<table class='table table-bordered table-hover table-striped'>";
      	echo "<thead class='thead-light'>
                <tr>
                  <td colspan='2'>Nome</td>
                  <td>Telefone</td>
                  <td>Logradouro</td>
                  <td>complemento</td>
                  <td>Bairro</td>
                  <td>Cidade</td>
                  <td>UF</td>
                  <td>Cep</td>
                </tr>
              </thead>";
      		foreach($dados as $cliente){
      			
      			echo "<tr class='linha'>";
              echo "<th class= 'idCliente'><input class='mx-0 my-0'type='radio' name='id' value='".$cliente->id."'/>".$cliente->id."</th>";
              echo "<td class='nome'>".$cliente->nome."</td>\n";
              echo "<td class='tel'>".$cliente->telefone."</td>\n";
              echo "<td class='logradouro'> ".$cliente->logradouro."</td>\n";
             echo "<td class='complemento'> ".$cliente->complemento."</td>\n";
              echo "<td class='bairro'>".$cliente->bairro."</td>\n";
              echo "<td class='cidade'>".$cliente->cidade."</td>\n";
            echo "<td class='uf'>".$cliente->uf."</td>\n";
            echo "<td class='cep'>".$cliente->cep."</td>\n";
      			echo "</tr>";
      			
      			}
      				
      echo "</table>";
  }
      ?>
   <button id="cadastrarCliente" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#dadosClienteCadastrar">Cadastrar</button>
   <button id="editarCliente" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#dadosClienteEditar">Editar</button>
   <button id="deletarCliente" class="btn btn-primary btn-sm">Deletar</button>
</div>
<?php 
  $this->load->view("telasCadastro/modalEditarClienteView");
?>

<?php 
  $this->load->view("telasCadastro/modalCadastrarClienteView");
?>
<script>
  
function acionarEl(elemento,callback){
       var x = 0; 
      while(elemento[x]){
          callback(elemento[x]);
x++;
        }
       
    }
   var campoMensagem = document.getElementById("mensagens");
   var radio = document.querySelectorAll(".linha input[type=radio]");
    var deletarCliente = document.getElementById("deletarCliente");
    var editarCliente = document.getElementById("editarCliente");
    (function(){
      var id = null;
    
      
      deletarCliente.addEventListener("click",function(){
          acionarEl(radio,function(el){  
        if(el.checked){
            id = el.value;
           }
      });
       if(id != null){
           var resposta = confirm("Você deseja realmente deletar este cliente");    

          if(resposta){
            $.ajax({
              url: getURL('cadastroCliente/deletarViaAjax'),
              data    :{id:id},
              type    :"post",
              success : function(r){
                  if(r == 1){
                   alert("Cliente deletado com sucesso!");
                  }
                else if(r==0){
                   alert("Cliente não foi deletado!");
                }
                
              },
              error: function(){
                  alert("Erro ao tentar deletar o cliente");
              } 
            });
          }
        }
       
      });
      
    })();
  
  
  
  
  
  
  
    editarCliente.addEventListener("click",function(){
     
      var campoEdit = document.querySelectorAll("#dadosClienteEditar");
      acionarEl(radio,function(el){
        if(el.checked){
         var tr = el.parentNode.parentNode;
          var td = tr.querySelectorAll("td");
           
        acionarEl(td,function(ele){
          
            acionarEl(campoEdit,function(elem){
             
              elem.querySelector("#"+ele.getAttribute("class")).value = ele.textContent;
              
            });
        });
          return;
        }
      });
   

});
</script>
