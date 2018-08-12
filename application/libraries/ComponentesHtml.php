<?php 
/* configuracao array (nome=>"",class=>, id="", trClass, tdClass, atributos=true or false)
$dados -> as informações necessárias a serem tabeladas

*/
Class ComponentesHtml{
  public function cardapioProdutos($cat = null, $result = null,$classeLinha = null){
    if($cat == null){
      $this->CI =& get_instance();
     $this->CI->load->model("CategoriaModel");
    $prep = new CategoriaModel();
    $categorias = $prep->getcategorias();
    }
    if($result == null){
       $this->CI =& get_instance();
     $this->CI->load->model("ProdutoModel");
    $prep = new ProdutoModel();
    $result = $prep->getProdutos();
}
    if($classeLinha == null or $classeLinha == "produto"){
      $idTr = "produto";
    }
 if($cat == 1){$idTr = "cardapioPizza";}
 if($classeLinha != "produto"){$idTr = "meia_pizza_controller";}
    $compontente = '<table class="table table-bordered table-hover my-2" id="'.$idTr.'">';
             foreach($result as $listaProd){
               
                                        if($listaProd->id == $cat){
                                          
                                        $compontente .= '<tr class="'.$classeLinha.'" codigo="'.$listaProd->id_produto.'">';
                                        $compontente .= '<input type="hidden" value="'.$listaProd->valorUnitario.'" id="preco">';
                                        $compontente .=  '<th class="tipoPizza" scope="row">1/2</th>';
                                        $compontente .= '<td class="descricao" sabor="'.$listaProd->sabor.'">';
                                        $compontente .= '<a href="#" style="text-decoration: none;" >'.$listaProd->sabor.'</a></td>';
                                        $compontente .= '<th scope="row" class="input-group-text pl-1 pr-">R$</th>';
                                        $compontente .= '<td class="preco">'.$listaProd->valorUnitario.'</td></tr>';
                                       }
                                      }
    $compontente .= '</table>';
    return $compontente;
  }
  public function botoesPedirMeiaPizza(){
    return '<div class="row">
                                   <div class="btn-group-toggle" data-toggle="buttons" >
                                   <label id="pedirMeiaPizza" class="btn btn-success active btn-sm my-2 mx-2" data-toggle="modal" 
                                   data-target="#meiaPizza">
                                   <input type="checkbox" checked autocomplete="off" data-toggle="modal" data-target="#meiaPizza">2-Sabores
                                   </label>
                                   
                                   </div>
                                   <div>
                                
                                     
                                   </div>
                                   <div id = "" namespace="cardapioPizza" class="btn-group btn-group-toggle my-2 controleTamanho" 
                                   data-toggle="buttons">
                                    <label tamanho="Media" class="btn selecionarPreco btn-secondary btn-sm active">
                                    <input type="radio"  name="options" id="option1" autocomplete="off" checked>
                                      Média
                                    </label>
                                    <label tamanho="Grande" class="btn selecionarPreco btn-sm btn-secondary">
                                    <input type="radio" name="options"  id="option2" autocomplete="off">
                                      Grande
                                    </label>
                                    <label  tamanho="Familia" class="btn selecionarPreco btn-sm btn-secondary">
                                    <input type="radio" name="options"  id="option3" autocomplete="off"> 
                                      Família
                                    </label>
                                    </div>
                                  </div>';
  }
  public function tabContentCategorias($categorias = null,$result = null){
    if($categorias == null){
      $this->CI =& get_instance();
     $this->CI->load->model("CategoriaModel");
    $prep = new CategoriaModel();
    $categorias = $prep->getcategorias();
    }
    if($result == null){
       $this->CI =& get_instance();
     $this->CI->load->model("ProdutoModel");
    $prep = new ProdutoModel();
    $result = $prep->getProdutos();
}
  $compontente = "";
    $x=0;
                      foreach($categorias as $cat){
                        if($x==0){$class = "active";}else{$class = "fade";}
                       
                        $compontente .= '<div id="'.$cat->categoria.'" idCategoria = "'.$cat->id.'"';
                        $compontente .= ' class="container tab-pane '.$class.'">';
                        if($cat->id == 1){
                          
                          $compontente .= $this->botoesPedirMeiaPizza();           
                          
                        } 
                        $compontente .= $this->cardapioProdutos($cat->id,$result,"produto");
                        
                     $compontente .='</div>';
                        
                        $x++;
                        
                      }
     
      return $compontente;       
   
  }
  public function AbasCategoria(){
    $this->CI =& get_instance();
     $this->CI->load->model("CategoriaModel");
    $prep = new CategoriaModel();
    $categorias = $prep->getCategorias();
    if($categorias == 9 || $categorias == false){
      return $categorias;
    }
    else{
    $componente = '<ul class="nav nav-pills btn-group btn-group-toggle" role="tablist" data-toggle="buttons">';
                    
      
                        foreach($categorias as $cat){
                     
                  $componente .= '<li class="btn nav-item border">';
                    $componente .= '<a class="nav-link" data-toggle="pill" idCategoria ="'.$cat->id.'" href="#'.$cat->categoria.'"> '.$cat->categoria.'</a>';
                   $componente .='</li>';
                    } 
                $componente .='</ul>';
return $componente;
}
    
  }
  
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
  public function ComponenteFormaPagamento(){
    $this->CI =& get_instance();
    $this->CI->load->library("HTML");
    $this->CI->load->model("PagamentoModel");
    $prep = new PagamentoModel();
    $html = new html();
    $formasPagamento = $prep->getFormasPagamento();
   
    if($formasPagamento == 9){
       $table = $html->gerarHtml("div","class='text-center'","Não há formas de pagamento cadastradas");
      
    }
    else if(!$formasPagamento){
      
            $table = $html->gerarHtml("div","class='text-center'","Erro de conexão com o banco de dados. Favor contactar o administrador");
    }
    else{
      $td = $html->gerarHtml("td",null,"Forma");
       $td .= $html->gerarHtml("td",null,"PrazoRecebimento");
      $tr = $html->gerarHtml("tr",null,$td);
      $td="";
      foreach($formasPagamento as $f){
        $td .= $html->gerarHtml("td",null,$f->descricao);
        $td .= $html->gerarHtml("td",null,$f->prazoRecebimento);
        $tr .= $html->gerarHtml("tr",null,$td);
        $td ="";
      }
      
      $table = $html->gerarHtml("table","class='table table-bordered'",$tr);
    }
    
    return $componente = $html->gerarHtml("div"," class='col-12 row'",$table);
  }
  
  public function selectFormaPagamento(){
    $this->CI =& get_instance();
    $this->CI->load->library("HTML");
    $this->CI->load->model("PagamentoModel");
    $prep = new PagamentoModel();
    $html = new html();
    $formasPagamento = $prep->getFormasPagamento();
    if($formasPagamento== false){
      $options = "";
      return false;
    }
    else if($formasPagamento == 9){
    $options = $html->gerarHtml("option","value='null'","sem formas de pagamento");
      return false;
    }
    else{
      $options = "";
      foreach($formasPagamento as $f){
        $options .= $html->gerarHtml("option","value='".$f->id."'",$f->descricao);
      }
      
    }
    return $componente = $html->gerarHtml("select","name='formaPagamento' id='formaPagamento'",$options);
    
  }
  public function PedidosView($status,$dataMenor){
    $this->CI =& get_instance();
   $this->CI->load->model("VerPedidoModel");
    $this->CI->load->library('HTML');
    $html = new HTML();
    $get = new verPedidoModel();
    $ped= $get->obterPedidos($status,$dataMenor);
    $divo = "";
    foreach($ped as $pedido){
      $divi = "";
      $div = "";
    $dataHora = mdate("%d/%m/%Y %H:%i:%s", $pedido->data_criacao);
    $tempoPassado = (now("America/Sao_paulo")-$pedido->data_criacao);
    $tempoEspera = ($tempoPassado-$tempoPassado%60)/60;
    if($tempoPassado > 80*60){
      $situacao = "atrasado";
      $classe = "bg-danger";
    }
    else{
      $situacao = "No prazo";
      $classe = "bg-success";
      
    }
      // $div .= $html->gerarHtml("div","class='col-6'","Nome");
    $div .= $html->gerarHtml("div","class='col-12'",$pedido->nome); 
    $div .= $html->gerarHtml("div","class='col-5 ".$classe."'","Pedido");
   // $div .= $html->gerarHtml("div","class='col-9'","Forma pagamento ");
    $div .= $html->gerarHtml("div","class='col-7'",$pedido->id_pedido);  
    //$div .= $html->gerarHtml("div","class='col-9'",$pedido->formaPagamento);    
   
    
    //$div .= $html->gerarHtml("div","class='col-6'","valor");    
     
       //$div .= $html->gerarHtml("div","class='col-6'",$pedido->preco); 
    //$div .= $html->gerarHtml("div","class='col-12'","data");  
   
    //$div .= $html->gerarHtml("div","class='col-12'",$dataHora);   
    $div .= $html->gerarHtml("div","class='col-5 ".$classe."'","Tempo");    
      $div .= $html->gerarHtml("div","class='col-7'",$tempoEspera." min."); 
    $div .= $html->gerarHtml("div","class='col-5  ".$classe."'","Status");     
    
    $div .= $html->gerarHtml("div","class='col-7 font-12px'",$pedido->descricao);
      $span = $html->gerarHtml("span","class='fa fa-times col-12'"," ");
       $span .= $html->gerarHtml("span","class='text-center col-12' no-padding","Cancelar");
      $spanV = $html->gerarHtml("div","class='col-4'",$span);
     
      $span = $html->gerarHtml("span","class='fa fa-check col-12'"," ");
      $span .= $html->gerarHtml("span","class='text-center col-12 no-padding'","Finalizar");
      $spanV .= $html->gerarHtml("div","class='col-4'",$span);
      $span = $html->gerarHtml("span","class='fa fa-eye col-12'"," ");
      $span .= $html->gerarHtml("span","class='text-center col-12' no-padding'","Ver");
       $spanV .= $html->gerarHtml("div","class='col-4 viewPedido'",$span);
      $divS = $html->gerarHtml("div","pedido='".$pedido->id_pedido."' class='text-center row controles'",$spanV);
      $div .= $html->gerarHtml("div","class='text-center col-12'",$divS);
     $divi .= $html->gerarHtml("div"," pedido='".$pedido->id_pedido."' class='header row col-12 '",$div);
      $divo .= $html->gerarHtml("div"," class='col-4'",$divi);
    
  }
      $grid = $html->gerarHtml("div","class='col-12 row text-center grid-de-pedidos'",$divo);
    return $grid;
}
}
?>
