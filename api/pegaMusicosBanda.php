<?php
header("Content-Type: application/json; charset=utf-8");

// DEBUG TEMPORÁRIO — remover depois
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("../dao/MusicoDao.php");

$id = isset($_GET['busca']) ? $_GET['busca'] : null;

if($id === null || $id === "") {
    echo json_encode(["error" => "id vazio", "recebido" => $id], JSON_UNESCAPED_UNICODE);
    exit;
}

$dao = new MusicoDao();
$musicos = $dao->buscaPorBanda($id);

if ($musicos === null) $musicos = [];

echo json_encode($musicos, JSON_UNESCAPED_UNICODE);
