<?php
class Musico {
	private $id;
	private $nome;
	private $id_banda;
	private $cpf;
	private $instrumento;
	private $nome_artistico;

	function getId(){
		return $this->id;
	}
	function setId($id){
		$this->id=$id;
	}
	function getNome(){
		return $this->nome;
	}
	function setNome($nome){
		$this->nome=$nome;
	}
	function getId_banda(){
		return $this->id_banda;
	}
	function setId_banda($id_banda){
		$this->id_banda=$id_banda;
	}
	function getCpf(){
		return $this->cpf;
	}
	function setCpf($cpf){
		$this->cpf=$cpf;
	}
	function getInstrumento(){
		return $this->instrumento;
	}
	function setInstrumento($instrumento){
		$this->instrumento=$instrumento;
	}
	function getNome_artistico(){
		return $this->nome_artistico;
	}
	function setNome_artistico($nome_artistico){
		$this->nome_artistico=$nome_artistico;
	}

}
?>