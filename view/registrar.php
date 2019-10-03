<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Registrar Ocorrência</title>
    
    <link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" type="text/css">
    <style>
      .map {
        height: 400px;
        width: 100%;
      }
    </style>
    <script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>
  </head>
  <body class="container">
    <h1 class="text-center">Registrar Boletim de Ocorrência</h1>
    <form action="../controller/OcorrenciaController.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="tipo">Tipo da ocorrência:</label>
            <select class="form-control form-control-lg" name="tipo">
                <option value="Roubo">Roubo</option>
                <option value="Furto">Furto</option>
                <option value="Agressão">Agressão</option>
                <option value="Outro">Outro</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="desc">Descreva a ocorrência com detalhes:</label>
            <textarea class="form-control" name="desc" rows="5" required></textarea>
        </div>
        
        <div class="form-group">
            <label for="horario">Informe a data e hora do ocorrido:</label>
            <input type="datetime-local" name="horario" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label id="file-label">Adicione anexos (ex.: imagens, vídeos):</label>
            <br><div id="btn-add" onclick="addCampoArquivo();" class="btn btn-secondary">Add anexo</div>
        </div>
        
        <div>
            <label>Informe o local do ocorrido: </label>
            <div id="map" class="map"></div>
            <input id="cx" name="cx" value="-9.75164" readonly>
            <input id="cy" name="cy" value="-36.6604" readonly>
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="Enviar"/>
        </div>
    </form>
    
    
    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="map/registro.js"></script>
  </body>
</html>

<script>
    var i = 0;
    
    function addCampoArquivo() {
        if(i == 0) {
            $("#file-label").after("<br><input id=\"f" + i +"\" name=\"arquivo" + i 
                + "\" type=\"file\" required>");
        }
        else {
            $("#f" + (i - 1)).after("<br><input id=\"f" + i +"\" name=\"arquivo" + i 
                + "\" type=\"file\" required>");
        }
        
        i++;
    }
</script>
