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
              <?php 
                $this->load->view("telasCadastro/formularioPadraoCadastro");
              ?>
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







