<?php
class Banda {
	private $id;
	private $nome;
	private $horario;
	private $palco;
	private $musicas;

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
	function getHorario(){
		return $this->horario;
	}
	function setHorario($horario){
		$this->horario=$horario;
	}
	function getPalco(){
		return $this->palco;
	}
	function setPalco($palco){
		$this->palco=$palco;
	}
	function getMusicas(){
		return $this->musicas;
	}
	function setMusicas($musicas){
		$this->musicas=$musicas;
	}

}
?>