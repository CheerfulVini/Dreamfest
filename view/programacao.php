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
        <table>
            <tr>
                <td>Nome</td>
                <td>Horario</td>
                <td>Palco</td>
            </tr>
            <?php
                foreach ($bandas as $banda) {
                    print("<tr>");
                        print("<td><a href='view/cardBanda.php?id={$banda['id']}'>{$banda['nome']}</a></td>");
                        print("<td>{$banda['horario']}</td>");
                        print("<td>Palco {$banda['palco']}</td>");
                    print("</td>");
                }
            ?>
        </table>
    </main>
<?php
    include_once("../include/footer.php");
?>
