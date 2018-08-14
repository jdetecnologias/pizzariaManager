<div class="row">
  <div class='col-12'>
    <ul id="menuConfig">
      <li>		<a class="borda btn btn-primary text-left text-md-left"   href="<?php echo base_url("relatorios/fin");?>" >
               <p class="fas fa-cart-plus text-sm-left">
              Financeiro</p>
								<span role="separator"></span>
						</a></li>
                
    </ul>
  </div>
  <div class='col-12'>
    <?php 
      if(isset ($relatorio)){
        echo $relatorio;
        echo $totais;
      }
    ?>
  </div>
  
</div>

