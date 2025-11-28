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
        <input type="text" name="nome" id="nome" onblur="buscaBandaNome(this.value)" placeholder="nome">
        <input type="text" maxlength="2" name="horario" id="horario" onblur="buscaBandaHorario(this.value)" placeholder="horario">
        <select name="palcos" id="palcos" placeholder="Palcos" onblur="buscaBandaPalco(this.value)">
            <option value="">------------------</option>
            <option value="a">Palco A</option>
            <option value="b">Palco B</option>
            <option value="c">Palco C</option>
        </select>
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
