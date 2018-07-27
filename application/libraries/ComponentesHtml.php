<?php 
/* configuracao array (nome=>"",class=>, id="", trClass, tdClass, atributos=true or false)
$dados -> as informações necessárias a serem tabeladas

*/
Class ComponentesHtml{
  public function tableProdutos(){
    $this->CI =& get_instance();
    $this->CI->load->model("ProdutoModel");
     $componente = "<div class='col-12 row'>";
    $prep = new ProdutoModel();
    $produtos = $prep->getProdutos();
    if($produtos == 9){
        $componente .= "<div class='text-center'>Não há categorias cadastradas</div>";
    }
    else if(!$produtos){
      $componente .= "<div class='text-center'>Erro de conexão com o banco de dados. Favor contactar o administrador</div>";
    }
    else{
      $componente .= "<table id='tableProdutos' class='table table-bordered'>";
      $componente .= "<tr><td>Produto</td><td>Categoria</td></tr>";
      foreach($produtos as $p){
         $componente .= "<tr idProd='".$p->id_produto."'>";
         $componente .= "<td>";
         $componente .= $p->sabor;
         $componente .= "</td>";
        $componente .= "<td>";
         $componente .= $p->categoria;
         $componente .= "</td>";
         $componente .= "</tr>";
      }
      $componente .= "</table>";
      $componente .= "</div>";
    }
    return $componente;
  }
  
 public function tableCategorias(){
   $this->CI =& get_instance();
  $this->CI->load->model("CategoriaModel");
    $preparar = new CategoriaModel();
    $cat = $preparar->getCategorias();
    $componente = "<div class='col-12 row'>";
   if($cat == 9){
     $componente .= "<div class='text-center'>Não há categorias cadastradas</div>";
   }
   else if($cat){
   $componente .= "<table id='tableCategorias' class='table table-bordered'>";
    $componente .= "<tr><td>Categoria</td><td>Descricao</td></tr>";
    foreach($cat as $c){
      $componente .= "<tr idCat='".$c->id."'>";
       $componente .= "<td>";
      $componente .= $c->categoria;
      $componente .= "</td>";
       $componente .= "<td>";
      $componente .= $c->descricao;
      $componente .= "</td>";
      $componente .= "</tr>";
    }
   $componente .= "</table>";
   }
   else{
     $componente .= "<div class='text-center'>Erro de conexão com o banco de dados. Favor contactar o administrador</div>";
   }
   $componente .= "</div>";
     return $componente;
 }
  public function ComponenteMesas(){
    $this->CI =& get_instance();
  $this->CI->load->model("MesaModel");
    $preparar = new MesaModel();
    $mesas = $preparar->getMesas();
    $componente = "<div class='col-12 row'>";
      if($mesas == 9){
       $componente .= "<div class='text-center'>Não há mesas cadastradas</div>";
    }
    else if(!$mesas){
      $componente .= "<div class='text-center'>Erro de conexão com o banco de dados. Favor contactar o administrador</div>";
    }
    else{
      foreach($mesas as $m){
        if($m->status == 1){
          $class="mesaOcupada";
        }
         else if($m->status == 2){
          $class="mesa";
        }
        $componente .= "<a href='#'><div id-mesa='".$m->id_mesa."' class='col-2 ".$class." m-1 mesaClick' >\n";
       
        $componente .= "<div id='numeroMesa' class='text-center' >Mesa ".$m->numero."</div>";
        $componente .= "<div class='text-center' >".$m->qtdLugares." lugares</div>";  
         $componente .= "<div class='text-center'>Status: ".$m->descricao." </div>";    
        $componente .= "</div>\n";
    }
    }
    $componente .="</div></a>";
      return $componente;
  }
}
?>