<?php
    require_once("../dao/BandaDao.php");
    $titulo = "Programação";
    $caminhoCss = "../styles.css";
    $caminhoIndex = "../index.php";
    include_once("../include/header.php");
    $dao = new BandaDao();
    $bandas = $dao->listaGeral();
?>
    <main>
        <label for="nome">Procure uma banda</label>
        <input type="text" name="nome" id="nome" onblur="buscaBanda(this.value)">
        <table id="programacao">
            <tr>
                <td>Nome</td>
                <td>Horario</td>
                <td>Palco</td>
            </tr>
            <?php
                foreach ($bandas as $banda) {
                    print("<tr>");
                        print("<td><a href='cardBanda.php?id={$banda['id']}'>{$banda['nome']}</a></td>");
                        print("<td>{$banda['horario']}</td>");
                        print("<td>Palco {$banda['palco']}</td>");
                    print("</td>");
                }
            ?>
        </table>
    </main>
    <script src="../js/script.js"></script>
<?php
    include_once("../include/footer.php");
?>
