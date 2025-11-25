<?php
require_once("../model/conexao.php");
class BandaDao {
    private $con;
    public function __construct(){
       $this->con=(new Conexao())->conectar();
    }
    function inserir($obj) {
        $sql = "INSERT INTO banda (id, nome, horario, palco, musicas, genero) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->con->prepare($sql);
        $id=$obj->getId();
        $nome=$obj->getNome();
        $horario=$obj->getHorario();
        $palco=$obj->getPalco();
        $musicas=$obj->getMusicas();
        $genero=$obj->getGenero();

        $stmt->execute([$id,$nome,$horario,$palco,$musicas,$genero]);
    }
    function listaGeral(){
        $sql = "select * from banda order by nome asc";
        $query = $this->con->query($sql);
        $dados = $query->fetchAll(PDO::FETCH_ASSOC);
        return $dados;
    }
    function excluir($id){
        $sql = "delete from banda where id = $id";
        $query = $this->con->query($sql);
        header("Location:../view/listaBanda.php");
    }
    function buscar($id){
        $sql = "SELECT * FROM banda WHERE id = :id";
        $stm = $this->con->prepare($sql);
        $stm->bindValue(":id", $id, PDO::PARAM_INT);
        $stm->execute();

        return $stm->fetch(PDO::FETCH_ASSOC); 
    }
    function alterar($banda){
        $sql = "UPDATE banda SET nome = ?, horario = ?, palco = ?, musicas = ?, genero = ? WHERE id = ?";
        $stm = $this->con->prepare($sql);
        $stm->execute([$banda->getNome(), $banda->getHorario(), $banda->getPalco(), $banda->getMusicas(), $banda->getGenero(), $banda->getId()]);
        return NULL;
    }

    function getIntegrantes($id_banda){
    $sql = "SELECT m.id, m.nome, m.nome_artistico, m.instrumento, m.cpf, m.id_banda
            FROM musico m
            WHERE m.id_banda = ?";

    $stm = $this->con->prepare($sql);
    $stm->execute([$id_banda]);

    return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    function buscaPorNome($busca){
        $sql = "SELECT * FROM banda WHERE nome LIKE ?";
        $stm = $this->con->prepare($sql);

        $busca = "%$busca%"; // <-- AQUI está a mágica

        $stm->execute([$busca]);

        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

}
