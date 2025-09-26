<?php
require_once("../dao/VisitanteDao.php");
require_once("../dao/BandaDao.php");

$bandaDao = new BandaDao();
$bandas = $bandaDao->listaGeral();

$caminhoIndex = "../index.php";
$caminhoCss = "../styles.css";
$titulo = "Alterar Visitante";

$id = $_GET['id'];

include_once("../include/header.php");

$dao = new VisitanteDao();
$visitante = $dao->buscar($id);

if (isset($_GET["msgErro"])) {
    $msgErro = $_GET['msgErro'];
} else {
    $msgErro = "";
}
?>

<main>
    <?php
    if ($msgErro != "") {
        print("<div class='erro'>$msgErro</div>");
    }
    ?>

    <form action="../control/visitanteControl.php?a=4" method="post">
        <input type="hidden" name="id" value="<?= $visitante['id'] ?>">

        <label for="nome">Nome</label>
        <input type="text" name="nome" value="<?= $visitante['nome'] ?>"><br>

        <label for="id_banda_ingresso">Banda (ingresso)</label>
        <select name="id_banda_ingresso" id="">
            <option value="">------------</option>
            <?php
            foreach ($bandas as $banda) {
                if ($banda['id'] == $visitante['id_banda_ingresso']) {
                    print("<option value='{$banda['id']}' selected>{$banda['nome']}</option>");
                } else {
                    print("<option value='{$banda['id']}'>{$banda['nome']}</option>");
                }
            }
            ?>
        </select><br>

        <label for="cpf">CPF</label><br>
        <input type="number" name="cpf" value="<?= $visitante['cpf'] ?>"><br>

        <label for="sexo">Sexo</label><br>
        <select name="sexo" id="">
            <option value="">------------</option>
            <option value="M" <?= ($visitante['sexo'] == 'M') ? 'selected' : '' ?>>Masculino</option>
            <option value="F" <?= ($visitante['sexo'] == 'F') ? 'selected' : '' ?>>Feminino</option>
        </select><br>

        <button type="submit">Enviar</button>
        <a href="Listavisitante.php">Voltar</a>
    </form>
</main>

<?php
include_once("../include/footer.php");
?>
