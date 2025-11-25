function buscaBanda(input){
    var tabela = document.getElementById("programacao");
    tabela.innerHTML = "<tr><td>Nome</td><td>Horario</td><td>Palco</td></tr>";
    tabela.innerHTML += `<tr><td colspan="3">Carregando...</td></tr>`;

    var url = "../api/pegaBandas.php?busca=" + input;
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", url);

    xhttp.onload = function() {
        try {
            var bandas = JSON.parse(xhttp.responseText);
            tabela.innerHTML = "<tr><td>Nome</td><td>Horario</td><td>Palco</td></tr>"; // limpa "carregando"
            if(bandas.length === 0){
                tabela.innerHTML += "<tr><td colspan='3'>Nenhuma banda encontrada</td></tr>";
            } else {
                bandas.forEach(b => adicionarBanda(b));
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
}


function adicionarBanda(banda){
    var tabela = document.getElementById("programacao");
    tabela.innerHTML += `
        <tr>
            <td><a href='cardBanda.php?id=${banda.id}'>${banda.nome}</a></td>
            <td>${banda.horario}</td>
            <td>${banda.palco}</td>
        </tr>`;
}
