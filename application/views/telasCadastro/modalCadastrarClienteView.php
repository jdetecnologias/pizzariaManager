<div id="dadosClienteCadastrar" class="modal border border-success">
   <div class="modal-dialog border border-danger">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Cadastrar Cliente</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body">
           <div class="form-group">
           <form name="CadastrarCliente" id="CadastrarClienteFo" method="post" action="<?= base_url('cadastroCliente/cadastrar');?>">
              <?php 
                $this->load->view("telasCadastro/formularioPadraoCadastro");
              ?>
           </div>
             <div>
               <button class="btn btn-primary" type="submit">
                 Salvar
               </button>
             </div>
          </form> 
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
         </div>
      </div>
   </div>
</div>







