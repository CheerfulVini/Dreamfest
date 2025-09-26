<?php
require_once("../dao/BandaDao.php");


class BandaService{
    private $dao;

    public function __construct(){
        $this->dao = new BandaDao();
    }

    function validar($banda){
        $msgErro = "";

        if(!$banda->getNome()){
            $msgErro .= "Insira um nome<br>";
        }if(!$banda->getHorario()){
            $msgErro .= "Insira um horário<br>";
        }if($banda->getPalco() == "------------" || !$banda->getPalco()){
            $msgErro .= "Selecione um palco valido<br>";
        }

        $bandas = $this->dao->listaGeral();
        foreach ($bandas as $b) {
            if($banda->getHorario() == $b['horario']){
                $msgErro .= "Uma banda já tem esse horário<br>";
                break;
            }
        }

        return $msgErro;
    }
}
