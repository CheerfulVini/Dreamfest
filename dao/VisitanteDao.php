<?php
require_once("../model/conexao.php");
class VisitanteDao {
    private $con;
    public function __construct(){
       $this->con=(new Conexao())->conectar();
    }
function inserir($obj) {
    $sql = "INSERT INTO visitante (id, nome, cpf, id_banda_ingresso, sexo) VALUES (?, ?, ?, ?, ?)";
    $stmt = $this->con->prepare($sql);
    $id=$obj->getId();
$nome=$obj->getNome();
$cpf=$obj->getCpf();
$id_banda_ingresso=$obj->getId_banda_ingresso();
$sexo=$obj->getSexo();

    $stmt->execute([$id,$nome,$cpf,$id_banda_ingresso,$sexo]);
}
function listaGeral(){
    $sql = "select * from visitante";
    $query = $this->con->query($sql);
    $dados = $query->fetchAll(PDO::FETCH_ASSOC);
    return $dados;
}
function excluir($id){
    $sql = "delete from visitante where id = $id";
    $query = $this->con->query($sql);
    header("Location:../view/listaVisitante.php");
}
function buscar($id){
    $sql = "SELECT * FROM visitante WHERE id = :id";
    $stm = $this->con->prepare($sql);
    $stm->bindValue(":id", $id, PDO::PARAM_INT);
    $stm->execute();

    return $stm->fetch(PDO::FETCH_ASSOC); 
}

function alterar($visitante){
    $sql = "UPDATE visitante SET nome = ?, cpf = ?, id_banda_ingresso = ?, sexo = ? WHERE id = ?";
    $stm = $this->con->prepare($sql);
    $stm->execute([$visitante->getNome(), $visitante->getcpf(), $visitante->getId_banda_ingresso(), $visitante->getSexo(), $visitante->getId()]);
    return NULL;
}
}
?>