<?php
class Visitante {
	private $id;
	private $nome;
	private $cpf;
	private $id_banda_ingresso;
	private $sexo;

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
	function getCpf(){
		return $this->cpf;
	}
	function setCpf($cpf){
		$this->cpf=$cpf;
	}
	function getId_banda_ingresso(){
		return $this->id_banda_ingresso;
	}
	function setId_banda_ingresso($id_banda_ingresso){
		$this->id_banda_ingresso=$id_banda_ingresso;
	}
	function getSexo(){
		return $this->sexo;
	}
	function setSexo($sexo){
		$this->sexo=$sexo;
	}

}
?>