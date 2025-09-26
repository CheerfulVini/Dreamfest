<?php
$titulo = "Gerenciador de Festival";
$caminhoCss = "styles.css";
$caminhoIndex = "index.php";
include_once("include/header.php");
?>

    <main>
      <div id="organiza">
        <div class="container col-4">
          <h2>Visitantes</h2>
          <div class="imagem"><img src="imagens/plateia.jpg" alt=""></div>
          <a href="view/Listavisitante.php"><button>visualizar</button></a>
        </div>

        <div class="container col-4">
          <h2>Bandas</h2>
          <div class="imagem"><img src="imagens/bandas.jpg" alt=""></div>
          <a href="view/Listabanda.php"><button>visualizar</button></a>
        </div>

        <div class="container col-4">
          <h2>Músicos</h2>
          <div class="imagem"><img src="imagens/ozzy.webp" alt=""></div>
          <a href="view/Listamusico.php"><button>visualizar</button></a>
        </div>
      </div>
      <a href="view/programacao.php"><button id="ver">Ver Programação</button></a>
    </main>

<?php
include_once("include/footer.php");
?>