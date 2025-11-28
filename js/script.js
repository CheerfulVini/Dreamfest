function buscaBandaNome(input){
    var tabela = document.getElementById("programacao");
    tabela.innerHTML = "<tr><td>Nome</td><td>Horario</td><td>Palco</td></tr>";
    tabela.innerHTML += `<tr><td colspan="3">Carregando...</td></tr>`;

    var url = "../api/pegaBandasNome.php?busca=" + input;
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", url);

    xhttp.onload = function() {
        try {
            var bandas = JSON.parse(xhttp.responseText);
            tabela.innerHTML = "<tr><td>Nome</td><td>Horario</td><td>Palco</td></tr>"; // limpa "carregando"
            if(bandas.length === 0){
                tabela.innerHTML += "<tr><td colspan='3'>Nenhuma banda encontrada</td></tr>";
            } else {
                bandas.forEach(b => adicionarBandaProgramacao(b));
            }
        } catch(e) {
            console.error("Erro ao processar JSON:", e, xhttp.responseText);
            tabela.innerHTML += "<tr><td colspan='3'>Erro ao carregar bandas</td></tr>";
        }
    };

    xhttp.onerror = function() {
        tabela.innerHTML += "<tr><td colspan='3'>Erro na requisição AJAX</td></tr>";
    };

    xhttp.send();
    console.log(url)

    limpa(document.getElementById("horario"))
    limpa(document.getElementById("palcos"))
}

function buscaBandaHorario(input) {
        var tabela = document.getElementById("programacao");
    tabela.innerHTML = "<tr><td>Nome</td><td>Horario</td><td>Palco</td></tr>";
    tabela.innerHTML += `<tr><td colspan="3">Carregando...</td></tr>`;

    var url = "../api/pegaBandasHorario.php?busca=" + input;
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", url);

    xhttp.onload = function() {
        try {
            var bandas = JSON.parse(xhttp.responseText);
            tabela.innerHTML = "<tr><td>Nome</td><td>Horario</td><td>Palco</td></tr>"; // limpa "carregando"
            if(bandas.length === 0){
                tabela.innerHTML += "<tr><td colspan='3'>Nenhuma banda encontrada</td></tr>";
            } else {
                bandas.forEach(b => adicionarBandaProgramacao(b));
            }
        } catch(e) {
            console.error("Erro ao processar JSON:", e, xhttp.responseText);
            tabela.innerHTML += "<tr><td colspan='3'>Erro ao carregar bandas</td></tr>";
        }
    };

    xhttp.onerror = function() {
        tabela.innerHTML += "<tr><td colspan='3'>Erro na requisição AJAX</td></tr>";
    };

    xhttp.send();
    console.log(url)
    limpa(document.getElementById("nome"))
    limpa(document.getElementById("palcos"))
}

function buscaBandaPalco(input) {
        var tabela = document.getElementById("programacao");
    tabela.innerHTML = "<tr><td>Nome</td><td>Horario</td><td>Palco</td></tr>";
    tabela.innerHTML += `<tr><td colspan="3">Carregando...</td></tr>`;

    var url = "../api/pegaBandasPalco.php?busca=" + input;
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", url);

    xhttp.onload = function() {
        try {
            var bandas = JSON.parse(xhttp.responseText);
            tabela.innerHTML = "<tr><td>Nome</td><td>Horario</td><td>Palco</td></tr>"; // limpa "carregando"
            if(bandas.length === 0){
                tabela.innerHTML += "<tr><td colspan='3'>Nenhuma banda encontrada</td></tr>";
            } else {
                bandas.forEach(b => adicionarBandaProgramacao(b));
            }
        } catch(e) {
            console.error("Erro ao processar JSON:", e, xhttp.responseText);
            tabela.innerHTML += "<tr><td colspan='3'>Erro ao carregar bandas</td></tr>";
        }
    };

    xhttp.onerror = function() {
        tabela.innerHTML += "<tr><td colspan='3'>Erro na requisição AJAX</td></tr>";
    };

    xhttp.send();
    console.log(url)
    limpa(document.getElementById("horario"))
    limpa(document.getElementById("nome"))
}

function buscaBanda(input) {
    var tabela = document.getElementById("tabela");

    

    var url = "../api/pegaBandasNome.php?busca=" + input;
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", url);

    xhttp.onload = function() {
        try {
            var bandas = JSON.parse(xhttp.responseText);

            if (bandas.length === 0) {
                tabela.innerHTML += "<tr><td colspan='9'>Nenhuma banda encontrada</td></tr>";
            } else {
                bandas.forEach(b => adicionarBanda(b));
            }
        } catch(e) {
            console.error("Erro ao processar JSON:", e, xhttp.responseText);
            tabela.innerHTML += "<tr><td colspan='9'>Erro ao carregar bandas</td></tr>";
        }
    };

    xhttp.onerror = function() {
        tabela.innerHTML += "<tr><td colspan='9'>Erro na requisição AJAX</td></tr>";
    };

    xhttp.send();
    console.log(url)
}


function adicionarBandaProgramacao(banda){
    var tabela = document.getElementById("programacao");
    tabela.innerHTML += `
        <tr>
            <td><a href='cardBanda.php?id=${banda.id}'>${banda.nome}</a></td>
            <td>${banda.horario}</td>
            <td>${banda.palco}</td>
        </tr>`;
}

function adicionarBanda(banda){
    
    var tabela = document.getElementById("tabela");
    
    if(tabela){
        tabela.innerHTML = `
        <tr>
            <td>Ver</td><td>ID</td><td>Nome</td><td>Horario</td>
            <td>Palco</td><td>Genero</td><td>Musicas</td>
            <td>Excluir</td><td>Alterar</td>
        </tr>
    `;
    tabela.innerHTML += `<tr><td><a href='cardBanda.php?id=${banda.id}'>Ver</a></td><td>${banda.id}</td><td>${banda.nome}</td><td>${banda.horario}</td><td>Palco ${banda.palco}</td><td>Genero ${banda.genero}</td><td>${banda.musicas}</td><td> <a href='../control/bandaControl.php?a=2&id=${banda.ID}'>excluir</a></td><td><a href='alterarBanda.php?a=3&id=${banda.ID}'>Alterar</a></td></tr>`;
    }else{
        alteraCardBanda(banda)
    }
    
}

function alteraCardBanda(banda){
    var card = document.getElementById("card");
    card.innerHTML = "<p>Carregando integrantes...</p>";

    var bandaId = (typeof banda === "object") ? banda.id : banda;
    var bandaObj = (typeof banda === "object") ? banda : null;

    var url = "../api/pegaMusicosBanda.php?busca=" + encodeURIComponent(bandaId);
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", url, true);

    xhttp.onload = function() {
        console.log("Resposta do PHP bruta:", xhttp.responseText);
        try {
            var musicos = JSON.parse(xhttp.responseText);

            
            if (musicos && musicos.error) {
                card.innerHTML = "<p>Erro no backend: " + musicos.error + "</p><pre>" + JSON.stringify(musicos, null, 2) + "</pre>";
                return;
            }

            var todosMusicos = "";
            if (!Array.isArray(musicos) || musicos.length === 0) {
                todosMusicos = "<p>Sem integrantes cadastrados</p>";
            } else {
                musicos.forEach(function(m) {
                    todosMusicos += "<a href='cardMusico.php?id=" + m.id + "'>" + m.nome + "</a><br>";
                });
            }

            
            var nome = bandaObj ? bandaObj.nome : "Nome da banda";
            var horario = bandaObj ? bandaObj.horario : "";
            var palco = bandaObj ? bandaObj.palco : "";
            var genero = bandaObj ? bandaObj.genero : "";
            var musicas_str = bandaObj ? bandaObj.musicas : "";

            card.innerHTML = `
                <h1>${nome}</h1>
                <div class="divisor"><strong>Horario:</strong><p>${horario}</p></div>
                <div class="divisor"><strong>Palco:</strong><p>${palco}</p></div>
                <div class="divisor"><strong>Genero:</strong><p>${genero}</p></div>
                <div class="divisor"><strong>Musicas:</strong><p>${musicas_str}</p></div>
                <div class="divisor"><strong>Integrantes:</strong></div>
                ${todosMusicos}
                <a href="ListaBanda.php">Voltar</a>
            `;
        } catch(e) {
            console.error("Erro ao parsear JSON:", e);
            card.innerHTML = "<p>Resposta inesperada do servidor. Veja console.</p>";
        }
    };

    xhttp.onerror = function() {
        console.error("Erro na requisição AJAX");
        card.innerHTML = "<p>Erro na requisição AJAX</p>";
    };

    xhttp.send();
}



function limpa(input){
    input.value = ""
}
