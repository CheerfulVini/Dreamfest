<?php
header("Content-Type: application/json; charset=utf-8");
ob_clean(); // limpa lixo anterior

require_once("../control/bandaControl.php");

$control = new BandaControl();
$bandas = $control->buscaPorPalco($_GET['busca']);

echo json_encode($bandas, JSON_UNESCAPED_UNICODE);
