<?php
require_once("../model/conexao.php");
class MusicoDao {
    private $con;
    public function __construct(){
       $this->con=(new Conexao())->conectar();
    }
function inserir($obj) {
    $sql = "INSERT INTO musico (id, nome, id_banda, cpf, instrumento, nome_artistico) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $this->con->prepare($sql);
    $id=$obj->getId();
$nome=$obj->getNome();
$id_banda=$obj->getId_banda();
$cpf=$obj->getCpf();
$instrumento=$obj->getInstrumento();
$nome_artistico=$obj->getNome_artistico();

    $stmt->execute([$id,$nome,$id_banda,$cpf,$instrumento,$nome_artistico]);
}
function listaGeral(){
    $sql = "select * from musico";
    $query = $this->con->query($sql);
    $dados = $query->fetchAll(PDO::FETCH_ASSOC);
    return $dados;
}
function excluir($id){
    $sql = "delete from musico where id = $id";
    $query = $this->con->query($sql);
    header("Location:../view/listaMusico.php");
}
function buscar($id){
    $sql = "SELECT * FROM musico WHERE id = :id";
    $stm = $this->con->prepare($sql);
    $stm->bindValue(":id", $id, PDO::PARAM_INT);
    $stm->execute();

    return $stm->fetch(PDO::FETCH_ASSOC); 
}
function alterar($musico){
    $sql = "UPDATE musico SET nome = ?, id_banda = ?, cpf = ?, instrumento = ?, nome_artistico = ? WHERE id = ?";
    $stm = $this->con->prepare($sql);
    $stm->execute([$musico->getNome(), $musico->getId_banda(), $musico->getCpf(), $musico->getInstrumento(), $musico->getNome_artistico(), $musico->getId()]);
    return NULL;
}
}
?>