<?php

class visitanteService{
    function valida($visitante){
        $msgErro = "";

        if(!$visitante->getNome()){
            $msgErro .= "Insira um nome<br>";
        }if(!$visitante->getCpf()){
            $msgErro .= "Insira um CPF valido<br>";
        }if(!$visitante->getId_banda_ingresso() == "------------" || !$visitante->getId_banda_ingresso()){
            $msgErro .= "Selecione uma banda valida<br>";
        }if(!$visitante->getSexo() == "------------" || !$visitante->getSexo()){
            $msgErro .= "Selecione um Sexo<br>";
        }

        return $msgErro;
    }
}