<div class="row">
  <div class='col-12'>
    <ul id="menuConfig">
      <li>		<a class="borda btn btn-primary text-left text-md-left"   href="<?php echo base_url("pagamento");?>" >
               <p class="fas fa-cart-plus text-sm-left">
              Formas de pagamento</p>
								<span role="separator"></span>
						</a></li>
                  <li>
						<a class="borda btn btn-primary text-left text-md-left"   href="<?php echo base_url("categorias");?>" >
               <p class="fas fa-cart-plus text-sm-left">
              Categorias de produtos</p>
								<span role="separator"></span>
						</a>
					</li>
                <li>
						<a class="borda btn btn-primary text-left text-md-left"   href="<?php echo base_url("mesas");?>" >
               <p class="fas fa-cart-plus text-sm-left">
              Mesas</p>
								<span role="separator"></span>
						</a>
					</li>
              	<li>
						<a class="borda btn btn-primary text-left text-md-left"   href="<?php echo base_url("cadastrarProduto");?>">
								
              <p class="fas fa-cart-plus text-sm-left">
              Produtos</p> 
								<span role="separator"></span> 
						</a>
					</li>
    </ul>
  </div>
  <div class='col-12'>
    <?php 
      if(isset ($form)){
        switch($form){
          case 7:
					  $this->load->view("cadastrarProdutoView");
					break;
          case 8:
					  $this->load->view("cadastrarMesaView");
					break; 
           case 9:
					  $this->load->view("CrudCategoriasView");
					break;
          case 10:
					  $this->load->view("cadastrarFormaPagamentoView");
					break;
        }
      }
    ?>
  </div>
  
</div>

