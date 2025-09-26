<?php
require_once("../dao/MusicoDao.php");
require_once("../dao/BandaDao.php");
$bandaDao = new BandaDao();
$bandas = $bandaDao->listaGeral();
$caminhoIndex = "../index.php";
$caminhoCss = "../styles.css";
$titulo = "Cadastrar Musico";

include_once("../include/header.php");
$dao = new MusicoDao();

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
    
    <form action="../control/musicoControl.php?a=1" method="post">
        <input type="hidden" name="id" value="">
        <label for='nome'>nome</label>
        <input type='text' name='nome' value=""><br>
        <label for="Banda">Banda</label>
        <select name="id_banda" id="">
            <option value="">------------</option>
            <?php
                foreach ($bandas as $banda) {
                    print("<option value='{$banda['id']}'>{$banda['nome']}</option>?");
                } 
            ?>
        </select><br>
        <label for="cpf">CPF</label>
        <input type='number' name='cpf' value=""><br>
        <label for="instrumento">Instrumento</label>
        <select name="instrumento" id="">
            <option value="">------------</option>
            <option value="v">Voz</option>
            <option value="g">Guitarra</option>
            <option value="b">Baixo</option>
            <option value="d">Bateria</option>
            <option value="t">Teclado</option>
            <option value="j">DJ</option>
        </select><br>
        <label for='nome_artistico'>Nome artistico</label>
        <input type='text' name='nome_artistico'><br>

        <button type="submit">Enviar</button>
        <a href="Listamusico.php">Voltar</a>
    </form>
</main>

<?php
include_once("../include/footer.php");
?>