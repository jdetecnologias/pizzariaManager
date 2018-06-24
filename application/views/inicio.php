<html lang="pt-br">
<head>
<title>Pizza Delivery</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("css/estilo.css");?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url("css/bootstrap.min.css");?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url("css/fontawesome-all.css");?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url("css/fa-brands.css");?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url("css/fa-regular.css");?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url("css/fa-solid.css");?>"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

<style>
	#t opo div {border:1px solid black;}
</style>	
</head>
<body>
<!--Topo com logo -->
	<nav class="navbar  navbar-expand-lg navbar-dark bg-primary" >
		<div class="container-fluid tipografia-navbar col-md-12"  style="bor der:1px solid yellow;">
     		  <?php $this->load->view("topoView");?>
      </div>
	</nav>
	<div id="principal" class="col-md-12 row">
    <div id="menu-lateral" class="col-md-2 my-5 border border-primary rounded">
   <?php $this->load->view("menuLateralView");?>   
    </div>
	 
    <div id="content" class="col-md-10 my-5 border border-primary rounded">             
			<div id="mensagens">
				<?php if(isset($msn)){echo $msn;}?>
			</div>
			<?php
			if(isset($retorno)){
				switch ($retorno){
					  case 1:
					  $this->load->view("anotarPedidoView");
					break;
            case 2:
            $this->load->view("cadastrarClienteView");
            break;
            case 3:
            $this->load->view("listarClientesView");
            break;
					case 5:
					  $this->load->view("verPedidoView");
					break;
          case 6:
					  $this->load->view("verPedidoView");
					break;
					
         case 7:
					  $this->load->view("cadastrarProdutoView");
					break;
					}
			}	
			if(isset ($dados)){
				$this->load->view("listarClientesView");
			}

			if(isset($formulario)){
				$this->load->view($formulario);
			}
			?>
		</div>
	</div>
    <!-- /Parte Principal-->
	<div id="footer" class="col-xs-12 row">
	  <div class="col-sm-12">JUlio Alves</div>
    
</div>

<script src="<?php echo base_url('/js/jquery3.3.1.js');?>"></script>
<script src="<?php echo base_url('/js/bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('/js/init.js');?>" text="javascript/text" language="javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/popper.min.js">/script>
