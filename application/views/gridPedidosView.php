<html lang="pt-br">
<head>
<title>Pizza Delivery</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("css/estilo.css");?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url("css/bootstrap.min.css");?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url("css/fontawesome-all.css");?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url("css/fa-brands.css");?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url("css/fa-regular.css");?>"/>
<link rel="stylesheet" type="text/css" href="<?php //echo base_url("css/fa-solid.css");?>"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

</head>
<body>

	<div id="principal" class="container"> 
    <h1 class="text-center">
     Grid de pedidos 
    </h1>
    <div id="content" class="col-md-12 mt-3 border border-primary rounded">             
			<div id="mensagens">
				<?php if(isset($msn)){echo $msn;}?>
			</div>
			<?php
			if(isset($retorno)){
				switch ($retorno){
					case 5:
					  $this->load->view("verPedidoView");
					break;
					}
			}	
    ?>
		</div>
	</div>


<script src="<?php echo base_url('/js/jquery3.3.1.js');?>"></script>
<script src="<?php echo base_url('/js/bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('/js/init.js');?>" text="javascript/text" language="javascript"></script>


