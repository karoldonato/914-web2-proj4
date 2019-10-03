<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    </head>
    <body class="container">
        <div class="row">
            <label class="col-auto" for="input_id">Digite aqui o id desejado:</label>
            <input type="number" onchange="change();" class="col form-control" id="input_id" name="input_id" placeholder="Digite aqui o id desejado" value="">
            <a onclick="change();" class="col-auto btn btn-primary text-white">Buscar</a>
        </div>
        <h3 class="border-bottom">Boletim de Ocorrência</h3>
        <div id="erro">
            <h1>O id informado não existe!</h1>
        </div>
        <div id="content">
            <span class="font-weight-bold">Id: </span><span id="sid"></span><br>
            <span class="font-weight-bold">Descrição: </span><span id="sdesc"></span><br>
            <span class="font-weight-bold">Data/Hora: </span><span id="shorario"></span><br>
            <span class="font-weight-bold">Tipo: </span><span id="stipo"></span><br>
        </div>
        

        <script>
            
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200) {
                    var xmlDoc = this.responseXML;

                    var ocorrencia = xmlDoc.getElementsByTagName("ocorrencia");

                    if(ocorrencia[0].getElementsByTagName("existe")[0].childNodes[0].nodeValue == 'true') {
                        document.getElementById("erro").style.display = "none"; 
                        document.getElementById("content").style.display = "block"; 
                        document.getElementById("sid").innerHTML = ocorrencia[0].getElementsByTagName("id")[0].childNodes[0].nodeValue;
                        document.getElementById("sdesc").innerHTML = ocorrencia[0].getElementsByTagName("descricao")[0].childNodes[0].nodeValue;
                        document.getElementById("shorario").innerHTML = ocorrencia[0].getElementsByTagName("horario")[0].childNodes[0].nodeValue;
                        document.getElementById("stipo").innerHTML = ocorrencia[0].getElementsByTagName("tipo")[0].childNodes[0].nodeValue;
                        document.getElementById("input_id").value = ocorrencia[0].getElementsByTagName("id")[0].childNodes[0].nodeValue;
                    }
                    else {
                        document.getElementById("content").style.display = "none"; 
                        document.getElementById("erro").style.display = "block"; 
                    }
                }
            };
            function change() {
                enviar(document.getElementById("input_id").value);
            }
            function enviar(id) {
                xhttp.open("GET", "../controller/carregaOcorrenciaById.php?id=" + id, true);
                xhttp.send();
                document.getElementById("iframe").src = "./anexos.php?id=" + id;
            }
            enviar(new URL(window.location.href).searchParams.get("id"));

        </script>
        
        <iframe src="./anexos.php?id=" id="iframe" class="w-100 border">
        </iframe> 
        
                    
        <a href="./index.php" class="btn btn-secondary">Home</a>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
    </body>
</html>
