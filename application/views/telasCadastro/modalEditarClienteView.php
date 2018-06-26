<div id="dadosClienteEditar" class="modal">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Dados do Cliente</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body">
           <div class="form-group">
           <form name="editarCliente" method="post" action="<?= base_url('cadastroCliente/editar');?>">
              
              <?php $this->load->view("telasCadastro/formularioPadraoCadastro");?>
             </div>
             <div>
               <button class="btn btn-primary" type="submit">
                 Salvar
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