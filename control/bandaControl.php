<?php
require_once("../model/Banda.php");
require_once("../dao/BandaDao.php");
require_once("../service/bandaService.php");
class BandaControl {
    private $banda;
    private $acao;
    private $dao;
    private $service;
    public function __construct(){
      $this->banda=new Banda();
      $this->dao=new BandaDao();
      $this->acao=$_GET["a"];
      $this->service = new BandaService();
      $this->verificaAcao(); 
    }
    function verificaAcao(){
       switch($this->acao){
          case 1:
            $this->inserir();
          break;
          case 2:
            $this->excluir();
            header("Location: ../view/ListaBanda.php");
          break;  
          case 3:
            return $this->dao->buscar($_REQUEST['id']);
          break;
          case 4:
            $this->alterar();
          break;
       }

       
    }
    function inserir(){
      $msgErro = "";

      $this->banda->setNome($_POST['nome']);
      $this->banda->setHorario($_POST['horario']);
      $this->banda->setPalco($_POST['palco']);
      $this->banda->setMusicas($_POST['musicas']);

      $msgErro = $this->service->validar($this->banda);

      if($msgErro == ""){
        $this->dao->inserir($this->banda);
        header("Location: ../view/ListaBanda.php");
      }else{
        header("Location: ../view/banda.php?msgErro=$msgErro");
      }
    }
    function excluir(){
        $this->dao->excluir($_REQUEST['id']);
    }
    function alterar(){
      $msgErro = "";

      $this->banda->setId($_POST['id']);
      $this->banda->setNome($_POST['nome']);
      $this->banda->setHorario($_POST['horario']);
      $this->banda->setPalco($_POST['palco']);
      $this->banda->setMusicas($_POST['musicas']);

      $msgErro = $this->service->validar($this->banda);

      if($msgErro != ""){
        header("Location: ../view/alterarBanda.php?msgErro=$msgErro&id={$this->banda->getId()}");
      }else{
        $this->dao->alterar($this->banda);
        header("Location: ../view/Listabanda.php");
      }
    }
    function buscar(int $id){
      $this->dao->buscar($id);
    }

}
new BandaControl();
?>
