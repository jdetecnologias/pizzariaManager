<html lang="pt-br">
<head>
<title>Art Pizzaria</title>
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
<!--Topo com logo 
	<nav class="navbar  navbar-expand-lg navbar-dark bg-primary" >
		<div class="container-fluid tipografia-navbar"  style="bor der:1px solid yellow;">
		  <?php //$this->load->view("topoView");?>
	</nav>-->
	<div id="principal" class="limiter">
	
       <div class="container-login100">
         
			<div id="login" class="wrap-login100 border ">
    
         <div class="login100-form-title border img-fluid" style="background-image: url(../imagens/Websoft.png);">
           
       
         <!-- <h4><span>Login Sistema</span> </h4>-->
           
            <?php 
              if(isset($erro)){
               ?>
                  <p class="alert alert-danger">
                    
       
              <?php 
                echo $erro;
              }
            ?>
        </p>
            </div>
        <form class="login100-form" name="login" method="post" action="<?php echo base_url("login/logarSistema")?>">
          
         <div class="form-group">
          <label  for="usuario">Usuário:</label>
           <fieldset>
           <input class="form-control" type="text" name="usuario"/>
          </fieldset>
         </div>
          
          <div class="form-group">
          <label for="senha">Senha: </label>
          <fieldset>
           <input class="form-control" type="password" name="senha"/>
          </fieldset>
          </div>
          
       
        <div class="container-login100-form-btn">
      
        <button type="submit" class="btn btn-primary ml-2 mr-2">Entrar</button>
        <button type="reset" class="btn btn-primary">Limpar</button>
      </div>
        </div>
         <!-- <input class="btn btn-primary " type="submit" value="Entrar"/>
          <input class="btn btn-primary" type="reset" value="Limpar"/>*/
         </div>
          -->
            
          </form>
      
			
		</div>
  </div>
    
      
    </div>
    <!-- /Parte Principal-->
	<div id="footer" class="col-xs-12 row">
	  <div class="col-sm-12">Desenvolvido pela webSoft factory</div>
</div>

<script src="<?php echo base_url('/js/jquery3.3.1.js');?>"></script>
<script src="<?php echo base_url('/js/bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('/js/init.js');?>" text="javascript/text" language="javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/popper.min.js">/script>
