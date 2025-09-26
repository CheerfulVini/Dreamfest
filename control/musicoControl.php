<?php
require_once("../model/Musico.php");
require_once("../dao/MusicoDao.php");
require_once("../service/musicoService.php");
class MusicoControl {
    private $musico;
    private $acao;
    private $dao;
    private $service;
    public function __construct(){
       $this->musico=new Musico();
      $this->dao=new MusicoDao();
      $this->acao=$_GET["a"];
      $this->service = new MusicoService();
      $this->verificaAcao(); 
    }
    function verificaAcao(){
       switch($this->acao){
          case 1:
            $this->inserir();
          break;
          case 2:
            $this->excluir();
          break;
          case 3:
            $this->buscarId();
          break;
          case 4:
            $this->alterar();
          break;
       }
    }
    function inserir(){
      $this->musico->setNome($_POST['nome']);
      $this->musico->setId_banda($_POST['id_banda']);
      $this->musico->setCpf($_POST['cpf']);
      $this->musico->setInstrumento($_POST['instrumento']);
      $this->musico->setNome_artistico($_POST['nome_artistico']);

      $msgErro = $this->service->valida($this->musico);
    
      if($msgErro == ""){
        $this->dao->inserir($this->musico);
        header("Location: ../view/ListaMusico.php");
      }else{
        header("Location: ../view/musico.php?msgErro=$msgErro");
      }

    }
    function excluir(){
        $this->dao->excluir($_REQUEST['id']);
    }
    function alterar(){
      $this->musico->setId($_POST['id']);
      $this->musico->setNome($_POST['nome']);
      $this->musico->setId_banda($_POST['id_banda']);
      $this->musico->setCpf($_POST['cpf']);
      $this->musico->setInstrumento($_POST['instrumento']);
      $this->musico->setNome_artistico($_POST['nome_artistico']);
      
      $msgErro = $this->service->valida($this->musico);

      if($msgErro != ""){
        header("Location: ../view/alterarMusico.php?msgErro=$msgErro&id={$this->musico->getId()}");
      }else{
        $this->dao->alterar($this->musico);
        header("Location: ../view/Listamusico.php");
      }
    }
    function buscarId(){
      $this->dao->buscar($_REQUEST['id']);
    }
    function buscaTodos(){}

}
new MusicoControl();
?>