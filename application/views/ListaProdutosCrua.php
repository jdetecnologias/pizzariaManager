  <!-- Para chamar esta classe precisa definar o id da categoria de produtos e o nome da 
classe principal, este último para que não haja conflito com o javascrip, portanto favor
definir anter de chamar está view as variáveis $produto(o produto) $idCategoria e 
$classePrincLinha -->
                        
<table class="table table-bordered">
  <?php
    $this->load->model("ProdutoModel");
    $preparar = new ProdutoModel();
    $result = $preparar->getProdutos();
    if(!$result){
      echo "Erro ao conseguir os produtos";
    }
    else if($result == 9){
      echo "Não ha produtos cadastrados";
    }
    else{
      foreach ($result as $l){
        echo "<tr class='produto meiaPizza' codigo='".$l->id_produto."'>";
        echo "<td class='desc'>".$l->tipoProduto."  ".$l->sabor."</td>";
        echo "</tr>";
      }
    }
    
                      
  ?>
</table>
                     
                   
            