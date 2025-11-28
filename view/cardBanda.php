<?php
require_once("../dao/bandaDao.php");
require_once("../dao/MusicoDao.php");
$musicoDao = new MusicoDao();
$titulo = "Display Banda";
$caminhoCss = "../styles.css";
$caminhoIndex = "../index.php";
include_once("../include/header.php");
$dao = new BandaDao();
$banda = $dao->buscar($_GET['id']);
$musicos = $dao->getIntegrantes($_GET['id']);

?>

<main>

<label for="nome">Buscar Banda</label>
<input type="text" name="nome" id="nome" onblur="buscaBanda(this.value)">
<div id="card">
    <h1><?=$banda['nome']?></h1>
    <div class="divisor"><strong>Horario:</strong><p><?=$banda['horario']?><br></p></div>
    <div class="divisor"><strong>Palco:</strong><p><?=$banda['palco']?><br></p></div>
    <div class="divisor"><strong>Genero:</strong><p><?=$banda['genero']?><br></p></div>
    <div class="divisor"><strong>Musicas:</strong></div>
    <p><?=str_replace(";", "<br>", ($banda['musicas']))?><br></p>
    <div class="divisor"><strong>Integrantes</strong></div>
    <?php
        foreach ($musicos as $musico) {
            print("<a href='cardMusico.php?id={$musico['id']}'>{$musico['nome']}</a>");
        }
    ?>
    <br>
    <a href="Listabanda.php">Voltar</a>
</div>

</main>

<script src="../js/script.js"></script>

<?php
include_once("../include/footer.php");
