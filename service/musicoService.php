<?php

class MusicoService{
    function valida($musico){
        $msgErro = "";

        if(!$musico->getNome()){
            $msgErro .= "Insira um nome<br>";
        }if(!$musico->getCpf()){
            $msgErro .= "Insira um CPF valido<br>";
        }if(!$musico->getId_banda() == "------------" || !$musico->getId_banda()){
            $msgErro .= "Selecione uma banda valida<br>";
        }if(!$musico->getInstrumento()){
            $msgErro .= "Insira um instrumento<br>";
        }

        return $msgErro;
    }
}