<?php

$titulo = "Inserir Banda";
$caminhoCss = "../styles.css";
$caminhoIndex = "../index.php";
if(isset($_GET["msgErro"])){
    $msgErro = $_GET['msgErro'];
}else{
    $msgErro = "";
}

include_once("../include/header.php");
?>
    <main>
        <?php
        if($msgErro != ""){
            print("<div class='erro'>$msgErro</div>");
        }
        ?>
        
        <form action="../control/bandaControl.php?a=1" method="post">
            <label for='nome'>nome</label>
            <input type='text' name='nome' placeholder=""><br>
            <label for='horario'>horario</label>
            <input type='text' name='horario'><br>
            <label for='palco'>palco</label>
            <select name="palco" id="palco">
                <option value="">------------</option>
                <option value="a">Palco Principal</option>
                <option value="b">Palco Secundario</option>
                <option value="c">Palco Terciário</option>
            </select><br>
            <label for='musicas'>musicas</label>
            <input type='text' name='musicas'><br>

             <button type="submit">Enviar</button>
             <a href="Listabanda.php">Voltar</a>
        </form>
    </main>
<?php
include_once("../include/footer.php");
?>