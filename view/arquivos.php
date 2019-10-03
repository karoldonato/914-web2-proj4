<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <title></title>
    </head>
    <body class="container">
        <?php
            require_once '../controller/OcorrenciaController.php';
            require_once '../model/Ocorrencia.php';
            $ocorrencia = (new OcorrenciaController())->buscarOcorrenciaPorId($_GET['id']);
        ?>
        
        <h3 class="border-bottom">Boletim de Ocorrência</h3>
        <div>
            <span class="font-weight-bold">Id: </span> <?php echo $ocorrencia->getId(); ?><br>
            <span class="font-weight-bold">Descrição: </span> <?php echo $ocorrencia->getDescricao(); ?><br>
            <span class="font-weight-bold">Data/Hora: </span><?php echo $ocorrencia->getHorario(); ?><br>
            <span class="font-weight-bold">Tipo: </span><?php echo $ocorrencia->getTipo() ?><br>
        </div>
        
        <h5 class="border-bottom">Anexos</h5>
        <div>
        <?php
            $path = "../anexos/";
            $diretorio = dir($path);
            $diretorio -> read();
            $diretorio -> read();
            while($arquivo = $diretorio -> read()){
                if(fnmatch($ocorrencia->getId() . "_*", $arquivo)) {?>
                    <a href="<?php echo $path.$arquivo ?> " target="_blank"><?php echo $arquivo ?></a><br />
                <?php
                }
            }
            $diretorio -> close();
        ?>
        </div>
                    
        <a href="./index.php" class="btn btn-secondary">Home</a>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
    </body>
</html>
