<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <title>Ocorrências</title>
    </head>
    <body class="container">
        <a href="./registrar.php" class="btn btn-primary w-100">Registrar Ocorrência</a>
        <h6>Últimas ocorrências:</h6>
        <div id="lista_ocorrencias" class="border-bottom font-weight-bold">
            
        </div>


        <script>
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200) {
                    var xmlDoc = this.responseXML;
                    
                    var body = "Data - Tipo da ocorrência - ID<br>";

                    var ocorrencias = xmlDoc.getElementsByTagName("ocorrencia");
                    
                    for(i = 0; i < ocorrencias.length; i++) {
                        body += "<a class=\"border-bottom\" href=\"./boletim.php?id=" + ocorrencias[i].getElementsByTagName("id")[0].childNodes[0].nodeValue + "\">" 
                        + ocorrencias[i].getElementsByTagName("tipo")[0].childNodes[0].nodeValue
                        + " - " + ocorrencias[i].getElementsByTagName("horario")[0].childNodes[0].nodeValue
                        + " - " + ocorrencias[i].getElementsByTagName("id")[0].childNodes[0].nodeValue + "</a></br>";
                    }
                    document.getElementById("lista_ocorrencias").innerHTML = body;
                }
            };
            xhttp.open("GET", "../controller/carregaOcorrencias.php", true);
            xhttp.send();
        </script>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
    </body>
</html>
