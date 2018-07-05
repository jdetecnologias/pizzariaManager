<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Xml extends CI_Controller {
	public $arquivoXml = "<>";

	public function __construct(){
		$version = "1.0";
	}
	public function addTag($nome)
	{
		return $this->arquivoXml .= "<".$nome.">";
	}
	public function closeTag($nome){
		return $this->$arquivoXml .= "</".$nome.">";
	}
	public function addContent($content){
		return $this->$arquivoXml .= $content;
	}
	
	public function addCompleto($nome,$content){
		$this->addTag($nome);
		$this->addContent($content);
		$this->closeTag($nome);
		echo $this->$arquivoXml;
	}
}
