<?php 
/* configuracao array (nome=>"",class=>, id="", trClass, tdClass, atributos=true or false)
$dados -> as informações necessárias a serem tabeladas

*/
Class ComponentesHtml{
  private $retorno = "";
  public function table($configuracao){
    $retorno += "<table";
    if(isset($configuracao['nome'])){
     $retorno += " name=".$configuracao['nome'];
    }
     if(isset($configuracao['class'])){
     $retorno += " class=".$configuracao['class'];           
  
    }
     if(isset($configuracao['id'])){
     $retorno += " id=".$configuracao['id'].">\n";       
    }
  }
  public function tr($dados){
    $dados = array_keys($dados);
     foreach($dados as $d){
      
        $retorno += "<tr>\n";   
    
       $retorno += "<td>".$d[1]."</td>/n</tr>";   
    }
  }
  
  public function getTable(){
    return $retorno;
  }
}
?>