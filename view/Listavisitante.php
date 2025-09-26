



<?php
$titulo = "Listagem de Visitantes";
$caminhoCss = "../styles.css";
$caminhoIndex = "../index.php";
require_once("../dao/VisitanteDao.php");
$VisitanteDao = new VisitanteDao();
include_once("../include/header.php");
?>
<main>
    
    <div id="containerTabela">
        <a href="Visitante.php"><button>Inserir</button></a>
        <table>
            <tr>
                <td>Ver</td>
                <td>ID</td>
                <td>Nome</td>
                <td>CPF</td>
                <td>Ingresso da Banda</td>
                <td>Sexo</td>
                <td>Excluir</td>
                <td>Alterar</td>
                
            </tr>
        <?php
        require_once("../dao/BandaDao.php");
    $bandaDao=new BandaDao();
    $dados = $VisitanteDao->listaGeral();
        foreach($dados as $dado){
            print("<tr>");
                print("<td><a href='cardVisitante.php?id={$dado['id']}'>Ver<a></td>");
                echo "<td>{$dado['id']}</td>";
                echo "<td>{$dado['nome']}</td>";
                echo "<td>{$dado['cpf']}</td>";
                $nomeBanda = $bandaDao->buscar($dado['id_banda_ingresso']);
                echo "<td>{$nomeBanda['nome']}</td>";
                echo "<td>{$dado['sexo']}</td>";
                print("<td> <a href='../control/VisitanteControl.php?a=2&id={$dado['id']}'>excluir</a></td>");
                print("<td><a href='alterarVisitante.php?a=3&id={$dado['id']}'>Alterar</a></td>");
            print("</tr>");
        }
        ?>
        </table>  
     </div>
<main>

<?php

include_once("../include/footer.php");
?>