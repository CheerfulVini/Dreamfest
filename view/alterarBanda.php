<?php
require_once("../dao/BandaDao.php");
$caminhoIndex = "../index.php";
$caminhoCss = "../styles.css";
$titulo = "Alterar Banda";
$id = $_GET['id'];
include_once("../include/header.php");
$dao = new BandaDao();
$banda = $dao->buscar($id);
if(isset($_GET["msgErro"])){
    $msgErro = $_GET['msgErro'];
}else{
    $msgErro = "";
}
?>

<main>
    <?php
    if($msgErro != ""){
        print("<div class='erro'>$msgErro</div>");
    }
    ?>
    
    <form action="../control/bandaControl.php?a=4" method="post">
        <input type="hidden" name="id" value="<?= $banda['id'] ?>">
        <label for='nome'>nome</label>
        <input type='text' name='nome' value="<?=$banda['nome']?>"><br>
        <label for='horario'>horario</label>
        <input type='text' name='horario' value="<?=$banda['horario']?>"><br>
        <label for='palco'>palco</label>
        <select name="palco" id="palco">
            <option value="">------------</option>
            <option value="a" <?= ($banda['palco'] == 'a') ? 'selected' : '' ?>>Palco Principal</option>
            <option value="b" <?= ($banda['palco'] == 'b') ? 'selected' : '' ?>>Palco Secundario</option>
            <option value="c" <?= ($banda['palco'] == 'c') ? 'selected' : '' ?>>Palco Terciário</option>
        </select><br>
        <label for="musicas">Músicas</label><br>
        <textarea name="musicas" id="musicas" rows="5" cols="40">
<?= $banda['musicas']?>
        </textarea>

            <button type="submit">Enviar</button>
            <a href="Listabanda.php">Voltar</a>
    </form>
</main>

<?php
include_once("../include/footer.php");
?>