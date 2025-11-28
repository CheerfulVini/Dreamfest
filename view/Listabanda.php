<?php
$titulo = "Listagem de bandas";
$caminhoCss = "../styles.css";
$caminhoIndex = "../index.php";
include_once("../include/header.php");
?>
<main>
    
    <label for="nome">Busca por nome</label>
    <input type="text" name="nome" id="nome" onblur="buscaBanda(this.value)">
    <div id="containerTabela">
        <a href="banda.php"><button>Inserir</button></a>
        <table id="tabela">
            <tr>
                <td>Ver</td>
                <td>ID</td>
                <td>Nome</td>
                <td>Horario</td>
                <td>Palco</td>
                <td>Genero</td>
                <td>Musicas</td>
                <td>Excluir</td>
                <td>Alterar</td>
            </tr>
        <?php
        require_once("../dao/BandaDao.php");
    $dao=new bandaDAO();
    $dados=$dao->listaGeral();
        foreach($dados as $dado){
            print("<tr>");
    echo "<td><a href='cardBanda.php?id={$dado['id']}'>Ver</a></td>";
    echo "<td>{$dado['id']}</td>";
    echo "<td>{$dado['nome']}</td>";
    echo "<td>{$dado['horario']}</td>";
    echo "<td>Palco {$dado['palco']}</td>";
    echo "<td>Genero {$dado['genero']}</td>";
    echo "<td>{$dado['musicas']}</td>";
    ;
        print("<td> <a href='../control/bandaControl.php?a=2&id={$dado['id']}'>excluir</a></td>");
        print("<td><a href='alterarBanda.php?a=3&id={$dado['id']}'>Alterar</a></td>");
        print("</tr>");
        }
        ?>
        </table>  
     </div>
</main>
    <script src="../js/script.js"></script>

<?php

include_once("../include/footer.php");
?>
