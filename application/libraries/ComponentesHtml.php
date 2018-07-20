<?php 
/* configuracao array (nome=>"",class=>, id="", trClass, tdClass, atributos=true or false)
$dados -> as informações necessárias a serem tabeladas

*/
Class ComponentesHtml{
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
        $componente .= "<div id-mesa='".$m->id_mesa."' class='col-2 ".$class." m-1 mesaClick' >\n";
       
        $componente .= "<div id='numeroMesa' class='text-center' >Mesa ".$m->numero."</div>";
        $componente .= "<div class='text-center' >".$m->qtdLugares." lugares</div>";  
         $componente .= "<div class='text-center'>Status: ".$m->descricao." </div>";    
        $componente .= "</div>\n";
    }
    }
    $componente .="</div>";
      return $componente;
  }
}
?>