<?php
require_once("../dao/musicoDao.php");
require_once("../dao/BandaDao.php");
$bandaDao = new BandaDao();
$titulo = "Display Musico";
$caminhoCss = "../styles.css";
$caminhoIndex = "../index.php";
include_once("../include/header.php");
$dao = new MusicoDao();
$musico = $dao->buscar($_GET['id']);
$banda = $bandaDao->buscar($musico['id_banda']);
$instrumento = "";
switch ($musico['instrumento']) {
        case 'v':
            $instrumento = "Voz";
        break;
        case 'g':
            $instrumento = "Guitarra";
        break;
        case 'b':
            $instrumento = "Baixo";
        break;
        case 'd':
            $instrumento = "Bateria";
        break;
        case 't':
            $instrumento = "Teclado";
        break;
        case 'j':
            $instrumento = "DJ";
        break;
}
?>

<main>

<div class="card">
    <h1><?=$musico['nome']?></h1>
    <div class="divisor"><strong>Banda:</strong><p><a href="cardBanda.php?id=<?=$banda['id']?>"><?=$banda['nome']?></a><br></p></div>
    <div class="divisor"><strong>CPF:</strong><p><?=$musico['cpf']?><br></p></div>
    <div class="divisor"><strong>Instrumento:</strong><p><?=$instrumento?></p></div>
    <div class="divisor"><strong>Nome artistico:</strong><p><?=$musico['nome_artistico']?></p></div>
    <a href="Listamusico.php">Voltar</a>
</div>

</main>

<?php
include_once("../include/footer.php");