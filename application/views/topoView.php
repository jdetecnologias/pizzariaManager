<div id="topo" class="col-12 row">
<div class="col-2" style="bo rder:1px solid black;" id="div-logo">
   <a href="" class="navbar-brand h1 ml-0"><span class="img-logo "></span></a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite"><span class="navbar-toggler-icon"></span></button>
</div>
<div class="collapse navbar-collapse col-5" id="navbarSite" style="bo rder:1px solid red;">
<ul id="menuPrincipal" class="nav nav-tabs">
   <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">Home</a>
   </li>
   <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#exibir">Exibir</a>
   </li>
   <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#cadastrar">Cadastrar</a>
   </li>
   <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#pedido">Pedidos</a>
   </li>
   <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#">Social</a>
   </li>
</ul>
<div class="tab-content">
<div id="pedido" class="tab-pane container">
   Pedido
</div>
<div id="home" class="tab-pane fade">
   <div class="row text-center">
      <div class="col-sm-2" style="margin-top:10px">
        <a href="<?php echo base_url("anotarPedido/formulario");?>">
         <div>
            
               <i class="fa fa-cart-plus"> </i>
         </div>
         <div>
         Vendas
         </div>
         </a>
      </div>
      <div class="col-sm-2" style="margin-top:10px">
        <a href="<?php echo base_url("VerPedido");?>">
         <div>
            
               <i class="fa fa-list"> </i>
         </div>
         <div>
         Grid de pedidos
         </div> 
         </a>
      </div>
   </div>
  </div>
   <div id="exibir" class="tab-pane fade">
      <div class="row text-center">
         <div class="col-sm-2" style="margin-top:10px">
           <a href="<?php echo base_url("exibir/clientes");?>">
            <div>
               
                  <i class="fa fa-address-book"> </i>
            </div>
            <div>
            Clientes
            </div> 
            </a>
         </div>
         <div class="col-sm-2" style="margin-top:10px">
           <a href="<?php echo base_url("cadastrarProduto");?>">
            <div>
               
                  <i class="fa fa-truck"> </i> 
            </div>
            <div>
            Produtos
            </div> 
            </a>
         </div>
      </div>
  </div>
      <div id="cadastrar" class="tab-pane fade">
         <div class="row text-center">
            <div class="col-sm-2" style="margin-top:10px">
              <a href="#">
               <div>
                  
                     <i class="fa fa-user-plus"> </i> 
               </div>
               <div>
               Cliente
               </div> 
               </a>
            </div>
            <div class="col-sm-2" style="margin-top:10px">
               <a href="<?php echo base_url("cadastrarProduto");?>">
               <div>
                 
                     <i class="fa fa-user-plus"> </i> 
               </div>
               <div>
               Produto
               </div> 
               </a>
            </div>
         </div>
      </div>
      <!--<ul class="navbar-nav drop">
         <li class="nav-item dropdown">
         	<a href="" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navDrop">Social
         	</a>
         	<div class="dropdown-menu">
         		<a href="" class="dropdown-item">Facebook</a>
         		<a href="" class="dropdown-item">Instagran</a>
         		<a href="" class="dropdown-item">Adworks</a>
         	</div>
         </li>
         
         </ul>-->
   </div>
   <!-- Navbar site -->
</div>
<!-- id top-->