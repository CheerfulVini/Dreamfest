<?php
require_once("../dao/MusicoDao.php");
require_once("../dao/BandaDao.php");
$bandaDao = new BandaDao();
$bandas = $bandaDao->listaGeral();
$caminhoIndex = "../index.php";
$caminhoCss = "../styles.css";
$titulo = "Alterar Musico";
$id = $_GET['id'];
include_once("../include/header.php");
$dao = new MusicoDao();
$musico = $dao->buscar($id);
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
    
    <form action="../control/musicoControl.php?a=4" method="post">
        <input type="hidden" name="id" value="<?= $musico['id'] ?>">
        <label for='nome'>nome</label>
        <input type='text' name='nome' value="<?=$musico['nome']?>"><br>
        <label for="Banda">Banda</label>
        <select name="id_banda" id="">
            <option value="">------------</option>
            <?php
                foreach ($bandas as $banda) {
                    if($banda['id'] == $musico['id_banda']){
                        print("<option value='{$banda['id']}' selected>{$banda['nome']}</option>?");
                    }else{
                        print("<option value='{$banda['id']}'>{$banda['nome']}</option>?");
                    }
                    
                } 
            ?>
        </select>
        <label for="cpf">CPF</label><br>
        <input type='number' name='cpf' value="<?=$musico['cpf']?>"><br>
        <label for="instrumento">Instrumento</label><br>
        <select name="instrumento" id="">
            <option value="">------------</option>
            <option value="v"<?= ($musico['instrumento'] == 'v') ? 'selected' : '' ?>>Voz</option>
            <option value="g"<?= ($musico['instrumento'] == 'g') ? 'selected' : '' ?>>Guitarra</option>
            <option value="b"<?= ($musico['instrumento'] == 'b') ? 'selected' : '' ?>>Baixo</option>
            <option value="d"<?= ($musico['instrumento'] == 'd') ? 'selected' : '' ?>>Bateria</option>
            <option value="t"<?= ($musico['instrumento'] == 't') ? 'selected' : '' ?>>Teclado</option>
            <option value="j"<?= ($musico['instrumento'] == 'j') ? 'selected' : '' ?>>DJ</option>
        </select><br>

        <label for='nome_artistico'>nome_artistico</label>
        <input type='text' name='nome_artistico'><br>

        <button type="submit">Enviar</button>
        <a href="Listamusico.php">Voltar</a>
    </form>
</main>

<?php
include_once("../include/footer.php");
?>