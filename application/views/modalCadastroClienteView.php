
 
<div id="dadosClienteCadastrar" class="modal">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Cadastrar Cliente</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body">
           <div class="form-group">
           <form name="CadastrarCliente" id="CadastrarClienteFo" method="post" action="<?= base_url('cadastroCliente/cadastrar');?>">
              <label for="tel">Telefone: </label>
              <input type="text" id="tel" name="tel" class="form-control" status="0"/>
              <label for="nome">Nome: </label>
              <input type="text" id="nome" name="nome" class="form-control">
              <label for="cepInput">CEP: </label>
              <input type="text" id="cep" name="cep" class="cep form-control">
              <label for="endInput">Logradouro: </label>
              <input type="text" id="logradouro" name="end" class="end form-control">
              <label for="bairro">Bairro: </label>
              <input type="text" id="setor" name="bairro" class="bairro form-control">
             <label for="bairro">Cidade</label>
              <input type="text" id="cidade" name="cidade" class="cidade form-control">
             <label for="bairro">Estado: </label>
              <select id="uf" name="uf" class="uf form-control">
                 <option value="">Selecione: </option>
                <option value="GO">GO</option>
             </select>
             
               
             <!--<select class="form-control border border-success" type="text" id="bairro" name="bairro">
               <option>Parque Atheneu</option>
               <option>Jardim marilizar</option>
               <option>Parque trindade 1</option>
               <option>Parque Trindade 2</option>
               
             </select>-->
             
             </div>
             <div>
               <button class="btn btn-primary" type="submit">
                 Gravar
               </button>
             </div>
          </form> 
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>







