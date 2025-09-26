
<?php
$titulo = "Listagem de Musicos";
$caminhoCss = "../styles.css";
$caminhoIndex = "../index.php";
require_once("../dao/BandaDao.php");
$bandaDao = new BandaDao();
include_once("../include/header.php");
?>
<main>
    
    <div id="containerTabela">
        <a href="musico.php"><button>Inserir</button></a>
        <table>
            <tr>
                <td>Ver</td>
                <td>ID</td>
                <td>Nome</td>
                <td>Banda</td>
                <td>CPF</td>
                <td>Instrumento</td>
                <td>Nome artistico</td>
                <td>Excluir</td>
                <td>Alterar</td>
                
            </tr>
        <?php
        require_once("../dao/musicoDao.php");
    $dao=new MusicoDao();
    $dados=$dao->listaGeral();
        foreach($dados as $dado){
            $instrumento = "";
            switch ($dado['instrumento']) {
                    case 'v':
                        $instrumento = "Voz";
                    break;
                    case 'g':
                        $instrumento = "Guitarra";
                    break;
                    case 'b':
                        $instrumento = "Baixo";
                    break;
                    case 'd':
                        $instrumento = "Bateria";
                    break;
                    case 't':
                        $instrumento = "Teclado";
                    break;
                    case 'j':
                        $instrumento = "DJ";
                    break;
            }
            print("<tr>");
                print("<td><a href='cardMusico.php?id={$dado['id']}'>Ver<a></td>");
                echo "<td>{$dado['id']}</td>";
                echo "<td>{$dado['nome']}</td>";
                $nomeBanda = $bandaDao->buscar($dado['id_banda']);
                echo "<td>{$nomeBanda['nome']}</td>";
                echo "<td>{$dado['cpf']}</td>";
                echo "<td>{$instrumento}</td>";
                echo "<td>{$dado['nome_artistico']}</td>";
                print("<td> <a href='../control/musicoControl.php?a=2&id={$dado['id']}'>excluir</a></td>");
                print("<td><a href='alterarMusico.php?a=3&id={$dado['id']}'>Alterar</a></td>");
            print("</tr>");
        }
        ?>
        </table>  
     </div>
<main>

<?php

include_once("../include/footer.php");
?>