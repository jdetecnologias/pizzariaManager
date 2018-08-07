<?php 
/* configuracao array (nome=>"",class=>, id="", trClass, tdClass, atributos=true or false)
$dados -> as informações necessárias a serem tabeladas

*/
Class HTML{
  private $tag;
  private $attr;
  private $conteudo;
  private $html;
  private $fechaTag;
  public function criarTag($tag,$fechaTag = true){
    //$tag é a string da tag html, lembre-se, apenas a tag, não precisa incluir os sinais <>
    $this->tag = $tag;
    $this->fechaTag = $fechaTag;
  }
  
  public function criarAtributos($attr){
    //$attr string dos atributos do elemento, exemplo: id='teste' class='teste' e etc;
    $this->attr = $attr;
  }
  public function criarConteudo($conteudo){
    //$attr string dos atributos do elemento, exemplo: id='teste' class='teste' e etc;
    $this->conteudo = $conteudo;
  }
  public function gerarHtml($tag = null ,$attr = null,$conteudo =null){
    if($tag != null){
      $this->criarTag($tag);
    }
       if($attr != null){
       $this->criarAtributos($attr);
    }
       if($conteudo != null){
       $this->criarConteudo($conteudo);
    }
    
    
    if($this->tag == null){
      return false;
    }
    else{
    $this->html = "<".$this->tag;
      if($this->attr == null){
        $this->html .= ">\n";
    }
    else{
      $this->html .= " ".$this->attr.">\n";
    }
    if($this->conteudo == null){
      
    }
    else{
      $this->html .= $this->conteudo."\n";
    }
     if($this->fechaTag){
    $this->html .="</".$this->tag.">\n";
       }
    $this->tag = "";
    $this->attr = "";
    $this->conteudo = "";
    return $this->html;
      
 
  }
}
}
