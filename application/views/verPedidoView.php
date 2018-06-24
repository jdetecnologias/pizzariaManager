<div class="col-md-12 row">


<?php
if(isset($pedidos)){
	foreach($pedidos as $pedido){
?>
    
    <div class="box-pedido col-sm-3 border" style="background-color:yellow;" numeroPedido="<?php echo $pedido->id_pedido;?>">
        <div class="col-xs-12 border">
            <div class="nome_cliente col-xs-12">nome:<?php echo $pedido->nome;?></div>
            <div class="telefone col-xs-12">Telefone: <?php echo $pedido->telefone;?></div>
            <div class="HoraData col-xs-12">End:<?php echo $pedido->endereco;?></div>
        </div>
        <div class="col-md-12 row text-center border">
            <div class="tempoPreparo col-xs-4 col-sm-4 no-padding"><div>Tempo de preparo</div></div>
            <div class="verItens col-xs-4 col-sm-4">Ver pedido</div>
            <div class="status col-xs-4 col-sm-4">
                <div>Situação</div>
                <div><a href="#" data-toggle="tooltip" data-placement="top" title="Clique aqui, para mudar o status do pedido.">
                    <?php echo $pedido->descricao;?></a>
                </div>    
            </div>
        </div>
        <div class="col-xs-12 row">
            <button class="btn  btn-primary btn-finalizar">Finalizar</button>
        </div>
    </div>
	
<?php
	}
}
else{
	echo "Nenhum pedido a ser mostrado";
}
?>
    
</div>
    