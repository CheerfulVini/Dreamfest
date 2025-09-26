<?php
require_once("../model/Visitante.php");
require_once("../dao/VisitanteDao.php");
require_once("../service/visitanteService.php");
class VisitanteControl {
    private $visitante;
    private $acao;
    private $dao;
    private $service;
    public function __construct(){
       $this->visitante=new Visitante();
      $this->dao=new VisitanteDao();
      $this->acao=$_GET["a"];
            $this->service = new visitanteService();
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
          case 4:
            $this->alterar();
          break;
       }
    }
    function inserir(){

      $this->visitante->setNome($_POST['nome']);
      $this->visitante->setCpf($_POST['cpf']);
      $this->visitante->setId_banda_ingresso($_POST['id_banda_ingresso']);
      $this->visitante->setSexo($_POST['sexo']);
      
      $msgErro = $this->service->valida($this->visitante);

      if($msgErro != ""){
        header("Location: ../view/visitante.php?msgErro=$msgErro");
      }else{
        $this->dao->inserir($this->visitante);
        header("Location: ../view/ListaVisitante");
      }
        
    }
    function excluir(){
        $this->dao->excluir($_REQUEST['id']);
    }
    function alterar(){
      $this->visitante->setId($_POST['id']);
      $this->visitante->setNome($_POST['nome']);
      $this->visitante->setCpf($_POST['cpf']);
      $this->visitante->setId_banda_ingresso($_POST['id_banda_ingresso']);
      $this->visitante->setSexo($_POST['sexo']);
      
      $msgErro = $this->service->valida($this->visitante);

      if($msgErro != ""){
        header("Location: ../view/alterarVisitante.php?msgErro=$msgErro&id={$this->visitante->getId()}");
      }else{
        $this->dao->alterar($this->visitante);
        header("Location: ../view/Listavisitante.php");
      }
    }
    function buscarId(Visitante $visitante){}
    function buscaTodos(){}

}
new VisitanteControl();
?>