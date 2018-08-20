<div class="row">
  <h2>
    Cadastrar CEP automaticamente
  </h2>
  
    <table class="table bordered col-12 col-sm-6 my-9">
     
      <tr>
        <td>Cep inicial</td>
        <td><input type="text" class="form-group" id="cepInicio" name="cepInicio" /></td>
      </tr>
      <tr>
        <td>Cep Final</td>
        <td><input type="text" class="form-group" id="cepFinal" name="cepFinal" /></td>
      </tr>
      <tr>
        <td><button type="submit" id="cadastrarCep" class="btn btn-primary">
      Cadastrar
      </button></td>
        <td><button type="reset" class="btn btn-danger">
      Limpar
      </button></td>
      </tr>
      
    </table>
 


</div>
<script>
 window.onload = function(){
   $("#cadastrarCep").on("click",function(){
    var cepInicio = $("#cepInicio").val();
     var cepFim =  $("#cepFinal").val();
     var arr = [];
     var erros = [];
      console.log(cepInicio);
    for(cepInicio;cepInicio<=cepFim;cepInicio++){
          $.ajax({
        url: "https://viacep.com.br/ws/" + cepInicio + "/json/",
        dataType: "json",
        type: "get",
        success: function(end) {
          if(end.erro){
            
          }
          else{
         arr.push(end);
            }
        },
        error: function() {
          erros.push(cepInicio);
        }
      });
    }
    console.log(arr);
     console.log(erros);
  });
  
 } 
</script>