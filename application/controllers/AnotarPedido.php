<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnotarPedido extends MY_Controller {
	public function formulario(){
		
     $this->load->model("ProdutoModel");
		
    $preparar = new ProdutoModel();
		$prod = $preparar->getProdutos();

    $categorias = $preparar->getCategoriaProdutos();
		$this->load->view('inicio',array('retorno'=>1,'prod'=>$prod,'categorias'=>$categorias));
   
   
  }
	
	public function finalizar(){
		$id_cliente = $this->input->post("id_cliente");
               $dadosDoPedido = $this->input->post("dadosDoPedido");
              // $dadosDoPedido[0] = array("codigo"=>5,"preco"=>20.0);
                $x = 0;
                $erro = 0;
                $precoTotal = 0.0;
                while($x<  sizeof($dadosDoPedido)){
                    $precoTotal += $dadosDoPedido[$x]["preco"];
                    $x++;  
                }
	            	$data = now('America/Sao_Paulo');
                $pedido = array("id_cliente"=>$id_cliente,"preco"=>$precoTotal,"status"=>1,"data_criacao"=>$data);
                $this->load->model("anotarPedidoModel");
                $gravar = new AnotarPedidoModel();
                $isTrue = $gravar->gravarPedido($pedido);
                if($isTrue){
                    $id_pedido = $gravar->getInsertId();
                    $x = 0;
                    while($x <  sizeof($dadosDoPedido)){
                            $item = array("id_pedido"=>$id_pedido,
                                "id_produto"=>$dadosDoPedido[$x]["codigo"],
                                "preco"=>$dadosDoPedido[$x]["preco"]);
                                
                            $isTrue = null;
                            $gravar = null;
                            $gravar = new AnotarPedidoModel();
                            $isTrue = $gravar->gravarItens($item);
                            if(!$isTrue){
                                $erro++;
                            }
                        $x++;
                    }
                    if($erro>0){
                        echo 0;
                    }
                    else{
                        echo 1;
                    }
                }
                
                
                /*$imp = "";
                try{
                    $x=0;
                while($x<  sizeof($dadosDoPedido)){
                    $imp .= $dadosDoPedido[$x]["preco"]."<br>";
                    
                    $x++;
                   
                }
                 throw new Exception($imp);
               
                }  catch (Exception $e){
                    echo $e->getMessage();
                    
                }9*/
                   
               
    }

}