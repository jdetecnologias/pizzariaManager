
<div id="listagemCliente" class="col-md-12 col-sm-12 border border-success">
   <form class="form-inline my-2">
          <input class="form-control mr-sm-2 col-md-3" type="search" placeholder="Numero ou nome do cliente" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
   </form>
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
              echo "<td class= 'idCliente'><input class='mx-2' type='radio' name='id' value='".$cliente->id."'/>".$cliente->id."</td>";
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
          console.log(ele.getAttribute("class"));
            acionarEl(campoEdit,function(elem){
             
              elem.querySelector("#"+ele.getAttribute("class")).value = ele.textContent;
              
            });
        });
          return;
        }
      });
   

});
</script>
