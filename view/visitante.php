<?php
require_once("../dao/VisitanteDao.php");
require_once("../dao/BandaDao.php");

$bandaDao = new BandaDao();
$bandas = $bandaDao->listaGeral();

$caminhoIndex = "../index.php";
$caminhoCss = "../styles.css";
$titulo = "Cadastrar Visitante";

include_once("../include/header.php");

$dao = new VisitanteDao();

if (isset($_GET["msgErro"])) {
    $msgErro = $_GET['msgErro'];
} else {
    $msgErro = "";
}
?>

<main>
    <?php
    if ($msgErro != "") {
        print("<div class='erro'>" . $msgErro . "</div>");
    }
    ?>

    <form action="../control/visitanteControl.php?a=1" method="post">
        <input type="hidden" name="id" value="">

        <label for="nome">Nome</label>
        <input type="text" name="nome" value=""><br>

        <label for="id_banda_ingresso">Banda (ingresso)</label>
        <select name="id_banda_ingresso" id="">
            <option value="">------------</option>
            <?php
            foreach ($bandas as $banda) {
                // escape para segurança
                $id = htmlspecialchars($banda['id']);
                $nome = htmlspecialchars($banda['nome']);
                print("<option value='{$id}'>{$nome}</option>");
            }
            ?>
        </select><br>

        <label for="cpf">CPF</label>
        <input type="number" name="cpf" value=""><br>

        <label for="sexo">Sexo</label>
        <select name="sexo" id="">
            <option value="">------------</option>
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
        </select><br>

        <button type="submit">Enviar</button>
        <a href="Listavisitante.php">Voltar</a>
    </form>
</main>

<?php
include_once("../include/footer.php");
?>
