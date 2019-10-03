<?xml version="1.0" encoding="UTF-8"?>
<?php
header('Content-type: xml');
?>
<dados>
<?php

    require_once "../controller/OcorrenciaController.php";
    $ocorrencias = (new OcorrenciaController())->buscarOcorrencias();
                
    foreach($ocorrencias as $o) {
        ?>
        <ocorrencia>
            <id><?php echo $o->getId();?></id>
            <horario><?php echo  $o->getHorario();?></horario>
            <tipo><?php echo $o->getTipo();?></tipo>
            <id><?php echo $o->getId();?></id>
        </ocorrencia>
    <?php
    }
?>
</dados>