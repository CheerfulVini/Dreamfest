<?php
require_once("../dao/VisitanteDao.php");
require_once("../dao/BandaDao.php");

$titulo = "Display Visitante";
$caminhoCss = "../styles.css";
$caminhoIndex = "../index.php";

include_once("../include/header.php");

$visitanteDao = new VisitanteDao();
$bandaDao = new BandaDao();

// Busca visitante pelo ID da URL
$visitante = $visitanteDao->buscar($_GET['id']);
$banda = $bandaDao->buscar($visitante['id_banda_ingresso']);

// Traduz sexo
$sexo = "";
switch ($visitante['sexo']) {
    case 'M':
        $sexo = "Masculino";
        break;
    case 'F':
        $sexo = "Feminino";
        break;
    default:
        $sexo = "Outro/Não informado";
        break;
}
?>

<main>
    <div class="card">
        <h1><?= htmlspecialchars($visitante['nome']) ?></h1>
        <div class="divisor"><strong>CPF:</strong><p><?= htmlspecialchars($visitante['cpf']) ?><br></p></div>
        <div class="divisor"><strong>Banda do ingresso:</strong>
            <p><a href="cardBanda.php?id=<?= $banda['id'] ?>"><?= htmlspecialchars($banda['nome']) ?></a><br></p>
        </div>
        <div class="divisor"><strong>Sexo:</strong><p><?= $sexo ?></p></div>
        <a href="Listavisitante.php">Voltar</a>
    </div>
</main>

<?php
include_once("../include/footer.php");
?>
